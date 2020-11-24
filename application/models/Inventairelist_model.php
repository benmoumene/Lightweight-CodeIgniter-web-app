<?php

class Inventairelist_model extends CI_Model
{
    /*******************************************************
    * Ce fichier contient la logique métier de l'Inventory *
    *******************************************************/

   function __construct() {
        parent::__construct();
        $this->load->model('Init_model');
    }
    
   function add_inventaire($data){
		//echo 'entered';
    $data = json_decode($data, true);
    //$string = var_dump($data);

    //log_message('debug', 'vardump'.$data["vente"]["VEN_CLI"]);
    //echo print $data;

    $inventaire = $data["inventaire"];
    $ligne_inventaire = $data["ligne_inventaire"];

    $this->db->trans_start();

		$this->db->set('INV_NUMERO', $inventaire["INV_NUMERO"]);
		$this->db->set('INV_DESCRIPTION', $inventaire["INV_DESCRIPTION"]);

    //$this->db->set('VEN_CODE', $vente["VEN_CODE"]);
    //$this->db->set('VEN_COMMENT', $vente["VEN_COMMENT"]);

    $id = $this->db->insert('inventaire');

    $insert_id = $this->db->insert_id();
    

    if($insert_id){

      foreach ($ligne_inventaire as $key => $value) {
        $this->db->set('IAM_INVENTAIRE_ID', $insert_id);
        $this->db->set('IAM_MAG_ID', $ligne_inventaire[$key]["IAM_MAG_ID"]);
        $this->db->set('IAM_CATEG_ID', $ligne_inventaire[$key]["IAM_CATEG_ID"]);
        $this->db->set('IAM_CATEG_PRIX', $ligne_inventaire[$key]["IAM_CATEG_PRIX"]);
        $this->db->set('IAM_QUANTITE', $ligne_inventaire[$key]["IAM_QUANTITE"]);
        $this->db->insert('inventaire_article_magasin');
      }

         $this->db->trans_complete();
  		
         if($this->db->trans_status() === TRUE){
              echo'<div class="alert alert-dismissable alert-success"><h4>Inventaire ajouté avec succès</h4></div>';
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

  function saveQuantites($data){

    $data = json_decode($data, true);

    $this->db->trans_start();

    $this->db->set('INV_NUMERO', "INV");
    $this->db->set('INV_MAGASIN', $data[0]["magasin"]);

    //$this->db->set('VEN_CODE', $vente["VEN_CODE"]);
    //$this->db->set('VEN_COMMENT', $vente["VEN_COMMENT"]);

    $this->db->insert('inventaire');

    $insert_id = $this->db->insert_id();
    

    if($insert_id){

    for($i=1;$i<count($data);$i++){

      $this->db->set('IAM_INVENTAIRE_ID', $insert_id);
      $this->db->set('IAM_CATEG_ID', $data[$i]["categ_id"]);
      $this->db->set('IAM_QUANTITE', $data[$i]["quantite"]);
      $this->db->insert('inventaire_article_magasin');  
    }

    $this->db->trans_complete();

    if($this->db->trans_status() === TRUE){
          echo'<div class="alert alert-dismissable    alert-success"><h4>Inventaire ajouté avec succès</h4></div>';
  //            $this->addHistory($item_id, $created);
    }
    else{
          echo'<div class="alert alert-dismissable alert-danger"><h4>Erreur! Veuillez réessayer plus tard</h4></div>';
    }
  }
}

  function add_transfert($data){

    $data = json_decode($data, true);

    $this->db->trans_start();

    $this->db->set('TRANS_CODE', "TRANS");
    $this->db->set('TRANS_MAG1_ID', $data[0]["magasin1"]);
    $this->db->set('TRANS_MAG2_ID', $data[1]["magasin2"]);

    //$this->db->set('VEN_CODE', $vente["VEN_CODE"]);
    //$this->db->set('VEN_COMMENT', $vente["VEN_COMMENT"]);

    $this->db->insert('transfert');

    $insert_id = $this->db->insert_id();
    

    if($insert_id){

    for($i=2;$i<count($data);$i++){

        $this->db->set('TAM_TRANS_ID', $insert_id);     
        $this->db->set('TAM_CATEG_ID', $data[$i]["categ_id"]);
        $this->db->set('TAM_QUANTITE', $data[$i]["quantite"]);
        $this->db->insert('transfert_article');  
    }

    $this->db->trans_complete();

    if($this->db->trans_status() === TRUE){
          echo'<div class="alert alert-dismissable    alert-success"><h4>Transfert effectué avec succès</h4></div>';
  //            $this->addHistory($item_id, $created);
    }
    else{
          echo'<div class="alert alert-dismissable alert-danger"><h4>Erreur! Veuillez réessayer plus tard</h4></div>';
    }
  }
}
 
}