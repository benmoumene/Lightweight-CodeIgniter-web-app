<?php

class Articlelist_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }
    
    function add_article($code,$designation,$categ,$prix_unit){
        $created = date("Y/m/d");
		$this->db->set('AR_CODE', $code);
        $this->db->set('AR_DESIGNATION', $designation);
        $this->db->set('AR_CATEG', $categ);
		$this->db->set('AR_PRIX_UNITAIRE', $prix_unit);
        $this->db->set('AR_CREATED', $created);
        $this->db->insert('article');
        $item_id = $this->db->insert_id();
        
        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-dismissable alert-success"><h4>Article ajouté avec succès</h4></div>';
//            $this->addHistory($item_id, $created);
            exit;
        }
        else{
            echo'<div class="alert alert-dismissable alert-danger"><h4>Erreur! Veuillez réessayer plus tard</h4></div>';
            exit;
        }
    }
    
    function delete_article($id){
        if($this->session->userdata('role') == 'admin'){
            if($this->db->delete('article',  array('id'=>$id))){
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
       $data['query'] =   $this->db->query("SELECT * FROM article where AR_ID = '$id' ");
    }
            
    function do_edit($code, $designation, $categ, $prix_unit, $id){
        $data = array(
               'AR_CODE' => $code,
               'AR_DESIGNATION' => $designation,
			   'AR_CATEGORIE' => $categ,
               'AR_PRIX_UNITAIRE' => $prix_unit,
            );

        $this->db->where('AR_ID', $id);
        $this->db->update('article', $data); 
 
        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-success alert-dismissible" role="alert" style="margin-top: -18px; padding: 10px;">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
            <strong>Succès!</strong> Article mis à jour avec succès.
            </div>';
        }
        else{
            echo'<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: -18px; padding: 10px;">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
            <strong>Avertissement:</strong> Vous n\'avez effectué aucun changement.
            </div>';
        }
   }
   
    function addHistory($article, $created){
       /*$this->db->set('professor', $prof);
       $this->db->set('classe', 0);
       $this->db->set('courseName', 0);
       $this->db->set('created', $created);
       $this->db->insert('report');*/
   }
    
}