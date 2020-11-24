<?php

class Categorielist_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }
    
    function add_categorie($code,$designation,$remise,$prix_unitaire,$file_name){
        $this->db->set('CATEG_CODE', $code);
		$this->db->set('CATEG_DESIGNATION', $designation);
		$this->db->set('CATEG_REMISE_POURCENTAGE', $remise);
        $this->db->set('CATEG_PRIX_UNITAIRE', $prix_unitaire);
        $this->db->set('CATEG_IMG_URL', 'upload_categ_images/'.$file_name);
        $this->db->insert('categorie');
        $item_id = $this->db->insert_id();  

        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-dismissable alert-success"><h4>Catégorie ajoutée avec succès</h4></div>';
//            $this->addHistory($item_id, $created);
            exit;
        }
        else{
            echo'<div class="alert alert-dismissable alert-danger"><h4>Erreur! Veuillez réessayer plus tard</h4></div>';
            exit;
        }
    }
    
    function delete_categorie($id){
        if($this->session->userdata('role') == 'admin'){
            if($this->db->delete('categorie',  array('CATEG_ID'=>$id))){
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
       $data['query'] =   $this->db->query("SELECT * FROM categorie where CATEG_ID = '$id' ");
    }
            
    function do_edit($code, $designation,$valeurremise,$typeremise, $id){
        $data = array(
               'code' => $code,
               'designation' => $designation,
			   'valeurremise' => $valeurremise,
			   'typeremise' => $typeremise
            );

        $this->db->where('id', $id);
        $this->db->update('categorie', $data); 
 
        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-success alert-dismissible" role="alert" style="margin-top: -18px; padding: 10px;">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
            <strong>Succès!</strong> categorie mis à jour avec succès.
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