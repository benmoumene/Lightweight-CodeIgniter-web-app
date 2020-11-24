<?php

class Achatlist_model extends CI_Model
{
    
   function __construct() {
        parent::__construct();
        $this->load->model('Init_model');
    }
    
   function add_achat($data){
		//echo 'entered';
    $data = json_decode($data, true);
    //$string = var_dump($data);

    //log_message('debug', 'vardump'.$data["vente"]["VEN_CLI"]);
    //echo print $data;

    $vente = $data["achat"];
    $ligne_commande_achat = $data["ligne_commande_achat"];

    $this->db->trans_start();

		$this->db->set('ACH_FOURN', $vente["ACH_FOURN"]);
    $this->db->set('ACH_MAGASIN', $vente["ACH_MAGASIN"]);
		$this->db->set('ACH_A_PAYER', $vente["ACH_A_PAYER"]);
    $this->db->set('ACH_REMISE', $vente["ACH_REMISE"]);
    $this->db->set('ACH_MONTANT_TOTAL', $vente["ACH_MONTANT_TOTAL"]);

    //$this->db->set('VEN_CODE', $vente["VEN_CODE"]);
    //$this->db->set('VEN_COMMENT', $vente["VEN_COMMENT"]);

    $id = $this->db->insert('achat');

    $insert_id = $this->db->insert_id();
    

    if($insert_id){

      foreach ($ligne_commande_achat as $key => $value) {
        $this->db->set('LCA_ACHAT_ID', $insert_id);
        $this->db->set('LCA_ARTICLE_ID', $ligne_commande_achat[$key]["LCA_ARTICLE_ID"]);
        $this->db->set('LCA_QUANTITE', $ligne_commande_achat[$key]["LCA_QUANTITE"]);
        $this->db->set('LCA_MONTANT', $ligne_commande_achat[$key]["LCA_MONTANT"]);
        $this->db->set('LCA_REMISE', $ligne_commande_achat[$key]["LCA_REMISE"]);
        $this->db->insert('ligne_commande_achat');
      }

         $this->db->trans_complete();
  		
         if($this->db->trans_status() === TRUE){
              echo'<div class="alert alert-dismissable alert-success"><h4>Achat ajouté avec succès</h4></div>';
              //exit;
  //            Set course history
  //            $this->updateReport($coursename, $weight, $nug, $course_type, $date);              
         }
         else
         {
              echo'<div class="alert alert-dismissable alert-danger"><h4>Opération échouée</h4></div>';
              //exit;
         }
     } 
  }
 
}