<?php

class Reglementlist_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
        $this->table = 'view_vente';
    }
    
    function add_reglement($data){

        $data = json_decode($data, true);
		$this->db->set('REG_MONTANT', $data[0]["REG_MONTANT"]);
        $this->db->set('REG_VENTE_ID', $data[0]["REG_VENTE_ID"]);
        $this->db->insert('reglement');  

        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-dismissable    alert-success"><h4>Règlement ajouté avec succès</h4></div>';
//            $this->addHistory($item_id, $created);
        }
        else{
            echo'<div class="alert alert-dismissable alert-danger"><h4>Erreur! Veuillez réessayer plus tard</h4></div>';
        }
    }

        /*
     * Fetch members data from the database
     * @param array filter data based on the passed parameters
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        
        if(array_key_exists("conditions", $params)){
            foreach($params['conditions'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        
        if(!empty($params['searchKeyword'])){
            $search = $params['searchKeyword'];
            $likeArr = array('CLI_ID' => $search, 'VEN_CREATED' => $search, 'CLI_SOLDE' => $search);
            $this->db->or_like($likeArr);
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("id", $params)){
                $this->db->where('id', $params['id']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('CLI_NOM', 'asc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        
        // Return fetched data
        return $result;
    }

    function fetchReglementsRequest($id){
       $id = trim($id);
       $sql = "SELECT REG_ID, REG_CODE, VEN_ID, VEN_CODE, REG_CREATED, REG_MONTANT, REG_COMMENT
                       FROM reglement 
                       INNER JOIN vente ON reglement.REG_VENTE_ID = vente.VEN_ID 
                       WHERE vente.VEN_ID = $id";        
        $query = $this->db->query($sql);
        return $query; 
    }

    
    function fetchReglements($id){
       $query = $this->fetchReglementsRequest($id);
       $sno = 1;

       if(count($query->result()) != 0){
           foreach ($query->result() as $row)
           {    
               echo'<tr><td>'.$sno.'</td><td>'.$row->REG_CODE.'</td><td>'.$row->VEN_CODE.'</td><td>'.$row->REG_CREATED.'</td><td align="right">'.$row->REG_MONTANT.'</td><td>'.$row->REG_COMMENT.'</td><td>
                    <a href="'.base_url().'reglementlist/printReceipt/'.$row->VEN_ID.'/'.$row->REG_ID.'" class="btn btn-info btn-sm" title="Imprimer Reçu"><i class="fa fa-print"></i></a>
                    </td></tr>';
               
               $sno = $sno+1; 
           }
        }else{
            echo'<tr><td>Aucun enregistrement trouvé</td></tr>';
        }
    }

    function delete_reglement($id){
        if($this->session->userdata('role') == 'admin'){
            if($this->db->delete('categorie',  array('id'=>$id))){
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
       $data['query'] =   $this->db->query("SELECT * FROM reglement where REG_ID = '$id' ");
    }
            
    function do_edit($code, $designation,$valeurremise,$typeremise, $id){
        $data = array(
               'code' => $code,
               'designation' => $designation,
			   'valeurremise' => $valeurremise,
			   'typeremise' => $typeremise
            );

        $this->db->where('id', $id);
        $this->db->update('reglement', $data); 
 
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