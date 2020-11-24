<?php

class Depotlist_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }
    
    function add_depot($code,$montant,$banque){
        $this->db->set('DEP_CODE', $code);
		$this->db->set('DEP_MONTANT', $montant);
		$this->db->set('DEP_BANQUE', $banque);
        $this->db->insert('depot');
        $item_id = $this->db->insert_id();  

        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-dismissable alert-success"><h4>Dépôt ajouté avec succès</h4></div>';
//            $this->addHistory($item_id, $created);
            exit;
        }
        else{
            echo'<div class="alert alert-dismissable alert-danger"><h4>Erreur! Veuillez réessayer plus tard</h4></div>';
            exit;
        }
    }
    
    function delete_depot($id){
        if($this->session->userdata('role') == 'admin'){
            if($this->db->delete('depot',  array('DEP_ID'=>$id))){
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
       $data['query'] =   $this->db->query("SELECT * FROM categorie where DEP_ID = '$id' ");
    }
    
}