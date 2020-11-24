<?php

class Auth_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Init_model');
    }
    
    function auth($name,$password){
		//Vérifier l type d'utilisation i.e. si c'est pour une utilisation locale, régionale ou nationale
		$tu_query = $this->db->get('informations_commerce');
        log_message('debug','Entered auth function');
		foreach ($tu_query->result() as $row1){
            log_message('debug','Entered loop');
		   $typeUtilisation = $row1->type;
		   $name_eglise = $row1->name;
		   $logo = $row1->logo;
           //$client = $row1->client;
           //$fournisseur = $row1->fournisseur;
           //$categorie = $row1->categorie;
		}
		//var_dump($typeUtilisation);
        $password = sha1($password);
        $this->db->where('user_name',$name);
        $this->db->where('password',$password);
        $this->db->where('is_active',1);
        $query = $this->db->get('auth');
		// var_dump($name,$password);
        if($query->num_rows()==1){

            $client=$fournisseur=$categorie=0;

            foreach ($this->getCountClients()->result() as $row) {
                $client=$row->count;
            }

            foreach ($this->getCountFournisseurs()->result() as $row) {
                $fournisseur=$row->count;
            }

            foreach ($this->getCountCategories()->result() as $row) {
                $categorie=$row->count;
            }

            foreach ($query->result() as $row){
				// if(!(time()>=mktime(0,0,0,12,26,2018))){
                $data = array(
                            'username'=> $row->user_name,
                            'logged_in'=>TRUE,
							'type'=> $typeUtilisation,
							'name_eglise'=> $name_eglise,
							'logo'=> $logo,
                            'role'=>$row->role,
                            'client'=>$client,
                            'fournisseur'=>$fournisseur,
                            'categorie'=>$categorie,
                            'alerte'=>$this->getClientsAlertes()->result(),
                            'alerte2'=>$this->getEtatsStockMagasins()
                        );
				// }else{
					// return FALSE;
				// }					
            }
            $this->session->set_userdata($data);
            return TRUE;
        }
        else{
            return FALSE;
        }
        
    }

    function getClientsAlertes(){
        $query='SELECT * FROM (SELECT client.CLI_ID AS CLI_ID1, client.CLI_NOM, client.CLI_PRENOM, client.CLI_CREATED, client.CLI_TEL1, client.CLI_WHATSAPP, SUM(vente.VEN_MONTANT_TOTAL) AS VENTE_TOTALE, 
            SUM(reglement.REG_MONTANT) AS REGLEMENT_TOTAL, 
            SUM(vente.VEN_MONTANT_TOTAL) - SUM(reglement.REG_MONTANT) 
            AS RESTE_TOTAL FROM client 
            LEFT JOIN vente
            ON client.CLI_ID=vente.VEN_CLI 
            LEFT JOIN reglement 
            ON vente.VEN_ID=reglement.REG_VENTE_ID
            GROUP BY client.CLI_NOM,client.CLI_PRENOM, client.CLI_CREATED)TABLE1

            INNER JOIN

            (SELECT DATE(MAX(reglement.REG_CREATED)) AS date_dernier_reglement, client.CLI_ID FROM reglement INNER JOIN vente
            ON vente.VEN_ID=reglement.REG_VENTE_ID INNER JOIN client ON
            client.CLI_ID=vente.VEN_CLI
            GROUP BY client.CLI_ID)TABLE2

            ON TABLE1.CLI_ID1=TABLE2.CLI_ID
            WHERE TABLE1.RESTE_TOTAL>0 AND DATEDIFF(DATE(CURRENT_TIMESTAMP),date_dernier_reglement)>15;';

        $query=$this->db->query($query);
        return $query;
    }

    function getCountClients(){
        $query='SELECT count(*) AS count FROM client';

        $query=$this->db->query($query);
        return $query;
    }
    function getCountFournisseurs(){
        $query='SELECT count(*) AS count FROM fournisseur';

        $query=$this->db->query($query);
        return $query;
    }
    function getCountCategories(){
        $query='SELECT count(*) AS count FROM categorie';

        $query=$this->db->query($query);
        return $query;
    }

    function getEtatsStockMagasins(){

        $magasin_categorie = [];
        $qte_dernier_inventaire=0;
        $qte_vendue=0;
        $qte_achetee=0;
        $qte_transfertoriginating=0;
        $qte_transfertterminating=0;

        $magasins = $this->Init_model->listMagasin()->result();
        $categories = $this->Init_model->listCategorie()->result();

            foreach ($magasins as $row)
            {

                $magasin = $row->MAG_ID;

                foreach ($categories as $row2)
                {
                    $article=$row2->CATEG_ID;

                    foreach ($this->Init_model->getQteMinCategMag($magasin,$article)->result() as $row3)
                    {
                        $qte_min=$row3->CM_STOCK_MIN;
                    }

                    foreach ($this->Init_model->getVentDepInv($magasin,$article)->result() as $row4)
                    {
                        $qte_vendue=$row4->qte_vendue;
                    }

                    foreach ($this->Init_model->getAchDepInv($magasin,$article)->result() as $row5)
                    {
                        $qte_achetee=$row5->qte_achetee;
                    }

                    foreach ($this->Init_model->getTransfertOriginatingDepuisInv($magasin,$article)->result() as $row6)
                    {
                        $qte_transfertoriginating=$row6->qte_transferee;
                        if(!$qte_transfertoriginating)
                            $qte_transfertoriginating=0;
                    }

                    foreach ($this->Init_model->getTransfertTerminatingDepuisInv($magasin,$article)->result() as $row7)
                    {
                        $qte_transfertterminating=$row7->qte_transferee;
                        if(!$qte_transfertterminating)
                            $qte_transfertterminating=0;
                    }

                    foreach ($this->Init_model->getDernierInv($magasin,$article)->result() as $row8)
                    {
                        $qte_dernier_inventaire=$row8->qte_dernier_inventaire;
                    }

                       if(($qte_dernier_inventaire+$qte_achetee-$qte_vendue+$qte_transfertterminating-$qte_transfertoriginating-$qte_min)<5)
                        {
                            //$magasin_categorie[] = (object) array('magasin' => ''.$row->MAG_NOM, 'categorie' => ''.$row2->CATEG_DESIGNATION);
                        }
                            
                }
            }

            return $magasin_categorie;
    }
    
}