<?php

class Init_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
        $this->index();
    }
    
    function index(){
//        $this->init();
    }
    
    function init(){
//        $query = 'SELECT item.id as itemID, item.item, course.comment, course.created';        
//        $this->db->from('item');
//        $this->db->join('course', 'course.item_id = item.id', 'right');
//        $this->db->limit(4, $this->uri->segment(3));
//        //$this->db->order_by("course.id", "desc"); 
//        $query = $this->db->get();
          //$segment = intval($this->uri->segment(3));  
          //return $query;
    }

    function countVentes(){ 
        $query = $this->db->query('select count(*) as nbVentes from vente');      
        return $query;
    }

    function countAchats(){ 
        $query = $this->db->query('select count(*) as nbAchats from achat');      
        return $query;
    }

    function countCategories(){ 
        $query = $this->db->query('select count(*) as nbCategories from categorie');      
        return $query;
    }

    function countClients(){ 
        $query = $this->db->query('select count(*) as nbClients from client');      
        return $query;
    }

    function countFournisseurs(){ 
        $query = $this->db->query('select count(*) as nbFournisseurs from fournisseur');      
        return $query;
    }
    
    function listArticle(){
        $this->db->order_by("AR_DESIGNATION"); 
        $query = $this->db->get('article');
        
        return $query;
    }
	
	function listtypeClient(){
        $this->db->order_by("name"); 
        $query = $this->db->get('type_client');
        
        return $query;
    }
	
	function listClient(){
        $this->db->order_by("CLI_NOM"); 
        $query = $this->db->get('client');
        
        return $query;
    }

    function listFournisseur(){
        $this->db->order_by("FOURN_NOM"); 
        $query = $this->db->get('fournisseur');
        
        return $query;
    }
	
	function listCategorie(){
        $this->db->order_by("CATEG_DESIGNATION"); 
        $query = $this->db->get('categorie');
        
        return $query;
    }

    function listMagasin(){
        $this->db->order_by("MAG_ID"); 
        $query = $this->db->get('magasin');
        
        return $query;
    }

    function listBanque(){
        $this->db->order_by("BAN_ID"); 
        $query = $this->db->get('banque');
        
        return $query;
    }

    function listModePaiement(){
        $this->db->order_by("MOD_ID"); 
        $query = $this->db->get('mode_paiement');
        
        return $query;
    }

    function listInventaire(){
        //$this->db->order_by("INV_CREATED"); 
        $query = $this->db->get('inventaire_view');
        
        return $query;
    }

    function listTransfert(){ 
        $query = $this->db->get('transfert_view');
        
        return $query;
    }

    function getStock(){
        $this->db->order_by("CATEG_DESIGNATION"); 
        $query = $this->db->get('categorie');
        
        return $query;
    }

    function getQteMinCategMag($magasin, $categorie){

        $query = 'SELECT CM_STOCK_MIN from categorie_magasin where CM_CATEG_ID='.$categorie.' and CM_MAGASIN_ID='.$magasin;

        //log_message('debug',$query);

        $query = $this->db->query($query);
        
        return $query; 
    }

    function getQteMaxCategMag($magasin, $categorie){
 
        $query = 'SELECT CM_STOCK_MAX from categorie_magasin where CM_CATEG_ID='.$categorie.' and CM_MAGASIN_ID='.$magasin;

        //log_message('debug',$query);

        $query = $this->db->query($query);

        return $query;
    }

    function getTransfertOriginatingDepuisInv($magasin,$categorie){

        $query = 'SELECT ta.TAM_CATEG_ID, t.TRANS_MAG1_ID, COALESCE(SUM(TAM_QUANTITE),0) AS qte_transferee 
                                    FROM transfert_article ta INNER JOIN transfert t
                                    ON t.TRANS_ID=ta.TAM_TRANS_ID
                                    WHERE DATE(ta.TAM_CREATED)>=(SELECT DATE(MAX(inventaire.INV_CREATED)) FROM inventaire)
                                    AND t.TRANS_MAG1_ID='.$magasin.' AND ta.TAM_CATEG_ID='.$categorie.' GROUP BY ta.TAM_CATEG_ID, t.TRANS_MAG1_ID';

        //log_message('debug',$query);

        $query = $this->db->query($query);

        return $query;
    }

    function getTransfertTerminatingDepuisInv($magasin,$categorie){

        $query = 'SELECT ta.TAM_CATEG_ID, t.TRANS_MAG2_ID, COALESCE(SUM(TAM_QUANTITE),0) AS qte_transferee 
                                    FROM transfert_article ta INNER JOIN transfert t
                                    ON t.TRANS_ID=ta.TAM_TRANS_ID
                                    WHERE DATE(ta.TAM_CREATED)>=(SELECT DATE(MAX(inventaire.INV_CREATED)) FROM inventaire)
                                    AND t.TRANS_MAG2_ID='.$magasin.' AND ta.TAM_CATEG_ID='.$categorie.' GROUP BY ta.TAM_CATEG_ID, t.TRANS_MAG2_ID';

        //log_message('debug',$query);

        $query = $this->db->query($query);

        return $query;
    }

    function getVentDepInv($magasin,$article){
        $query='SELECT lc.LC_ARTICLE_ID, v.VEN_MAGASIN, SUM(LC_QUANTITE) AS qte_vendue 
                                    FROM ligne_commande lc INNER JOIN vente v
                                    ON v.VEN_ID=lc.LC_VENTE_ID
                                    WHERE DATE(lc.LC_CREATED)>=(SELECT DATE(MAX(inventaire.INV_CREATED)) FROM inventaire)
                                    AND v.VEN_MAGASIN='.$magasin.' AND lc.LC_ARTICLE_ID='.$article.' GROUP BY lc.LC_ARTICLE_ID, v.VEN_MAGASIN' ;
        log_message('debug',$query);
        
        $query = $this->db->query($query);
        
        return $query;
    }

    function getAchDepInv($magasin,$article){
        $query = $this->db->query('SELECT lca.LCA_ARTICLE_ID, a.ACH_MAGASIN, SUM(LCA_QUANTITE) AS qte_achetee 
                                    FROM ligne_commande_achat lca INNER JOIN achat a
                                    ON a.ACH_ID=lca.LCA_ACHAT_ID
                                    WHERE DATE(lca.LCA_CREATED)>=(SELECT DATE(MAX(inventaire.INV_CREATED)) FROM inventaire)
                                    AND a.ACH_MAGASIN='.$magasin.' AND lca.LCA_ARTICLE_ID='.$article.' GROUP BY lca.LCA_ARTICLE_ID, a.ACH_MAGASIN');

        return $query;
    }

    function getDernierInv($magasin,$article){ 
        $query ='SELECT iam.IAM_CATEG_ID, iam.IAM_MAG_ID, SUM(iam.IAM_QUANTITE) AS qte_dernier_inventaire 
                FROM INVENTAIRE_ARTICLE_MAGASIN iam 
                WHERE DATE(iam.IAM_DATE_CREATION)=(SELECT DATE(MAX(inventaire.INV_CREATED)) 
                FROM inventaire)
                AND iam.IAM_MAG_ID='.$magasin.' AND iam.IAM_CATEG_ID='.$article.' GROUP BY iam.IAM_CATEG_ID, iam.IAM_MAG_ID';
                
        log_message('debug',$query);
        $query=$this->db->query($query);
        return $query;
    }

    function getReceiptData($id){ 
        $query ='SELECT vente.VEN_ID, vente.VEN_CREATED, vente.VEN_MONTANT_TOTAL, vente.VEN_REMISE, 
                    vente.VEN_A_PAYER,
                    reglement.REG_ID, reglement.REG_MONTANT, 
                    client.CLI_ID, client.CLI_NOM, client.CLI_PRENOM, client.CLI_SOLDE
                    FROM reglement INNER JOIN vente ON vente.VEN_ID=reglement.REG_VENTE_ID
                    INNER JOIN client ON client.CLI_ID=vente.VEN_CLI
                    WHERE reglement.REG_ID='.$id;
                
        //log_message('debug',$query);
        $query=$this->db->query($query);
        return $query;
    }

    function getLcData($id){ 
        $query ='SELECT ligne_commande.LC_ID, ligne_commande.LC_VENTE_ID, categorie.CATEG_CODE,
                    ligne_commande.LC_QUANTITE, ligne_commande.LC_MONTANT, ligne_commande.LC_REMISE 
                    FROM ligne_commande INNER JOIN categorie ON ligne_commande.LC_ARTICLE_ID=categorie.CATEG_ID
                    WHERE ligne_commande.LC_VENTE_ID='.$id;
                
        //log_message('debug',$query);
        $query=$this->db->query($query);
        return $query;
    }

    function getFournisseurReceiptData($id){ 
        $query ='SELECT achat.ACH_ID, achat.ACH_CREATED, achat.ACH_MONTANT_TOTAL, achat.ACH_REMISE, 
                    achat.ACH_A_PAYER,
                    reglement_achat.REG_ID, reglement_achat.REG_MONTANT, 
                    fournisseur.FOURN_ID, fournisseur.FOURN_NOM, fournisseur.FOURN_PRENOM, fournisseur.FOURN_SOLDE
                    FROM reglement_achat INNER JOIN achat ON achat.ACH_ID=reglement_achat.REG_ACHAT_ID
                    INNER JOIN fournisseur ON fournisseur.FOURN_ID=achat.ACH_FOURN
                    WHERE reglement_achat.REG_ID='.$id;
                
        //log_message('debug',$query);
        $query=$this->db->query($query);
        return $query;
    }

    function getFournisseurLcData($id){ 
        $query ='SELECT ligne_commande_achat.LCA_ID, ligne_commande_achat.LCA_ACHAT_ID, categorie.CATEG_CODE,
                    ligne_commande_achat.LCA_QUANTITE, ligne_commande_achat.LCA_MONTANT, ligne_commande_achat.LCA_REMISE 
                    FROM ligne_commande_achat INNER JOIN categorie ON ligne_commande_achat.LCA_ARTICLE_ID=categorie.CATEG_ID
                    WHERE ligne_commande_achat.LCA_ACHAT_ID='.$id;
                
        //log_message('debug',$query);
        $query=$this->db->query($query);
        return $query;
    }
}