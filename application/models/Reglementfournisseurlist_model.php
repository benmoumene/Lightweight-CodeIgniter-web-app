<?php

class ReglementFournisseurlist_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
        $this->table = 'view_achat';
    }
    
    function add_reglement($data){

        $data = json_decode($data, true);
		    $this->db->set('REG_MONTANT', $data[0]["REG_MONTANT"]);
        $this->db->set('REG_ACHAT_ID', $data[0]["REG_ACHAT_ID"]);
        $this->db->set('REG_MODE_PAIEMENT', $data[0]["REG_MODE_PAIEMENT"]);
        $this->db->set('REG_BANQUE', $data[0]["REG_BANQUE"]);
        $this->db->set('REG_NUM_REFERENCE', $data[0]["REG_NUM_REFERENCE"]);
        $this->db->insert('reglement_achat');  

        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-dismissable    alert-success"><h4>Règlement ajouté avec succès</h4></div>';
//            $this->addHistory($item_id, $created);
        }
        else{
            echo'<div class="alert alert-dismissable alert-danger"><h4>Erreur! Veuillez réessayer plus tard</h4></div>';
        }
    }

    function fetchReglementsRequest($id){
       $id = trim($id);
       $sql = "SELECT REG_ID, REG_CODE, ACH_ID, ACH_CODE, REG_CREATED, REG_MONTANT, MOD_DESIGNATION, REG_NUM_REFERENCE, REG_COMMENT
                       FROM reglement_achat 
                       INNER JOIN achat ON reglement_achat.REG_ACHAT_ID = achat.ACH_ID
                       LEFT JOIN mode_paiement ON mode_paiement.MOD_ID= reglement_achat.REG_MODE_PAIEMENT
                       WHERE achat.ACH_ID = $id";        
        $query = $this->db->query($sql);
        return $query; 
    }

    
    function fetchReglements($id){
       $query = $this->fetchReglementsRequest($id);
       $sno = 1;

       if(count($query->result()) != 0){
           foreach ($query->result() as $row)
           {    
               echo'<tr><td>'.$sno.'</td><td>'.$row->REG_CODE.'</td><td>'.$row->MOD_DESIGNATION.'</td><td>'.$row->REG_NUM_REFERENCE.'</td><td>'.$row->REG_CREATED.'</td><td align="right">'.$row->REG_MONTANT.'</td><td>'.$row->REG_COMMENT.'</td><td>
                    <a href="'.base_url().'reglementfournisseurlist/printReceiptFourn/'.$row->ACH_ID.'/'.$row->REG_ID.'" class="btn btn-info btn-sm" title="Imprimer Reçu"><i class="fa fa-print"></i></a>
                    </td></tr>';
               
               $sno = $sno+1; 
           }
        }else{
            echo'<tr><td>Aucun enregistrement trouvé</td></tr>';
        }
    }

    function delete_reglement($id){
        if($this->session->userdata('role') == 'admin'){
            if($this->db->delete('reglement_achat',  array('id'=>$id))){
                echo'<div class="alert alert-dismissable alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h6> Enregistrement supprimé avec succès </h6> 
                    </div>';
            }
            else{
               echo' <div class="alert alert-dismissable alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h6>Sorry un problème est survenu</h6> 
                    </div>';
            }
        }
        else{
            echo' <div class="alert alert-dismissable alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h6>Utilisateur invalide</h6> 
                    </div>';
            
        }
    }
    
    function load_edit_view($id){
       $data['query'] =   $this->db->query("SELECT * FROM reglement_achat where REG_ID = '$id' ");
    }
            
    function do_edit($code, $designation,$valeurremise,$typeremise, $id){
        $data = array(
               'code' => $code,
               'designation' => $designation,
      			   'valeurremise' => $valeurremise,
      			   'typeremise' => $typeremise
            );

        $this->db->where('id', $id);
        $this->db->update('reglement_achat', $data); 
 
        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-success alert-dismissible" role="alert" style="margin-top: -18px; padding: 10px;">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
            <strong>Succès!</strong> Règlement mis à jour avec succès.
            </div>';
        }
        else{
            echo'<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: -18px; padding: 10px;">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
            <strong>Avertissement:</strong> Vous n\'avez effectué aucun changement.
            </div>';
        }
   }
   
    function addHistory($categorie, $created){
       /*$this->db->set('professor', $prof);
       $this->db->set('classe', 0);
       $this->db->set('courseName', 0);
       $this->db->set('created', $created);
       $this->db->insert('report');*/
   }
    
}