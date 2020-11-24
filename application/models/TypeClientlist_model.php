<?php

class Typeventelist_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }
    
    function add_typevente($name, $code){
		$created = date("Y/m/d");
        $this->db->set('name', $name);
        $this->db->set('code', $code);
		$this->db->set('created', $created);
        $this->db->insert('type_vente');
        $item_id = $this->db->insert_id();
        
        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-dismissable alert-success"><h4>Type ajouté avec succès</h4></div>';
//            $this->addHistory($item_id, $created);
            exit;
        }
        else{
            echo'<div class="alert alert-dismissable alert-danger"><h4>Erreur! Veuillez réessayer plus tard</h4></div>';
            exit;
        }
    }
    
    function delete_classe($id){
        if($this->session->userdata('role') == 'admin'){
            if($this->db->delete('classe',  array('id'=>$id))){
                echo'<div class="alert alert-dismissable alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h6> Un enregistrement supprimé avec succès </h6> 
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
       $data['query'] =   $this->db->query("SELECT * FROM type_vente where id = '$id' ");
    }
            
    function do_edit($name,$code, $id){
        $data = array(
               'name' => $name,
               'code' => $code
            );

        $this->db->where('id', $id);
        $this->db->update('type_vente', $data); 
 
        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-success alert-dismissible" role="alert" style="margin-top: -18px; padding: 10px;">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
            <strong>Succès!</strong> Type mise à jour avec succès.
            </div>';
        }
        else{
            echo'<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: -18px; padding: 10px;">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
            <strong>Avertissement:</strong> Vous n\'avez effectué aucun changement.
            </div>';
        }
   }
   
    function addHistory($classe, $created){
       /*$this->db->set('classe', $classe);
       $this->db->set('classe', 0);
       $this->db->set('courseName', 0);
       $this->db->set('created', $created);
       $this->db->insert('report');*/
   }
    
}