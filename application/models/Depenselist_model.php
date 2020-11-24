<?php

class Depenselist_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }
    
    function add_depense($montant,$raison){
        $this->db->set('DEPE_MONTANT', $montant);
		$this->db->set('DEPE_RAISON', $raison);
        //$this->db->set('CATEG_PRIX_UNITAIRE', $prix_unitaire);
        //$this->db->set('CATEG_IMG_URL', $remise);
        $this->db->insert('depense');
        $item_id = $this->db->insert_id();  

        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-dismissable alert-success"><h4>Dépense ajoutée avec succès</h4></div>';
//            $this->addHistory($item_id, $created);
            exit;
        }
        else{
            echo'<div class="alert alert-dismissable alert-danger"><h4>Erreur! Veuillez réessayer plus tard</h4></div>';
            exit;
        }
    }
    
    function delete_depense($id){
        if($this->session->userdata('role') == 'admin'){
            if($this->db->delete('depense',  array('DEPE_ID'=>$id))){
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
       $data['query'] =   $this->db->query("SELECT * FROM depense where DEPE_ID = '$id' ");
    }
    
}