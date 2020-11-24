<?php

class Fournisseurlist_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }
    
    function add_fournisseur($nom,$prenom,$tel1,$tel2,$whatsapp){
        $this->db->set('FOURN_NOM', $nom);
        $this->db->set('FOURN_PRENOM', $prenom);
        $this->db->set('FOURN_TEL1', $tel1);
        $this->db->set('FOURN_TEL2', $tel2);
        $this->db->set('FOURN_WHATSAPP', $whatsapp);
        $this->db->insert('fournisseur');
        $item_id = $this->db->insert_id();
        
        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-dismissable alert-success"><h4>Fournisseur ajouté avec succès</h4></div>';
//            $this->addHistory($item_id, $created);
            exit;
        }
        else{
            echo'<div class="alert alert-dismissable alert-danger"><h4>Erreur! Veuillez réessayer plus tard</h4></div>';
            exit;
        }
    }
    
    function delete_client($id){
        if($this->session->userdata('role') == 'admin'){
            if($this->db->delete('article',  array('id'=>$id))){
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
       $data['query'] =   $this->db->query("SELECT * FROM fournisseur where FOURN_ID = '$id' ");
    }
            
    function do_edit($code, $name, $id){
        $data = array(
               'name' => $name,
               'code' => $code
            );

        $this->db->where('id', $id);
        $this->db->update('fournisseur', $data); 
 
        if($this->db->affected_rows()>0){
            echo'<div class="alert alert-success alert-dismissible" role="alert" style="margin-top: -18px; padding: 10px;">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
            <strong>Succès!</strong> Fournisseur mis à jour avec succès.
            </div>';
        }
        else{
            echo'<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: -18px; padding: 10px;">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
            <strong>Avertissement:</strong> Vous n\'avez effectué aucun changement.
            </div>';
        }
   }
   
    function addHistory($client, $created){
       /*$this->db->set('professor', $prof);
       $this->db->set('classe', 0);
       $this->db->set('courseName', 0);
       $this->db->set('created', $created);
       $this->db->insert('report');*/
   }
    
}