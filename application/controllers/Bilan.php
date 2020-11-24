<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bilan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		//setLocale(LC_TIME, 'fr_FR.UTF8','fra');		
        $this->load->model('Bilan_model');
        $this->load->model('Init_model');
        $this->load->library('session');	

		    $this->is_logged_in();
    }
    
    public function index(){

        //$data['listBilanCategoriequery'] = $this->bilanCategorie($date1,$date2);

        $this->load->view('admin/view_bilan');	
    }

    function bilanCategorieQuantiteRequest($from,$to){
      $fromdate = date("Y-m-d",strtotime(trim($from)));
      $todate = date("Y-m-d",strtotime(trim($to)));
      $condition = "between '$fromdate' And '$todate' ";
      if(empty($from)){
           echo'<tr><td colspan="9"><h2 style="color: #9F6000;">Sorry ! Date invalide</h2></td></tr>';
           exit;
      }
      if(!empty($from) AND empty($to)){
           $condition = "='$fromdate'";
      }
       
       
      $sql = "SELECT CATEG_ID, CATEG_DESIGNATION, SUM(LC_QUANTITE) AS CATEG_QUANTITE
            FROM CATEGORIE INNER JOIN LIGNE_COMMANDE 
            ON CATEGORIE.CATEG_ID=LIGNE_COMMANDE.LC_ARTICLE_ID
            WHERE DATE(LC_CREATED) $condition
           GROUP BY CATEG_ID, CATEG_DESIGNATION";        
      $query = $this->db->query($sql);
      return $query;
   }   
   
   function bilanCategorie(){
       $from = $this->input->post('from');
       $to = $this->input->post('to');
       $data = $this->bilanCategorieQuantiteRequest($from, $to)->result();
       $data2 = $this->bilanCategorieMontantRequest($from, $to)->result();

       $array =  array($data,$data2);
       echo json_encode($array);
   }

   function bilanCategorieMontantRequest($from,$to){
      $fromdate = date("Y-m-d",strtotime(trim($from)));
      $todate = date("Y-m-d",strtotime(trim($to)));
      $condition = "between '$fromdate' And '$todate' ";
      if(empty($from)){
           echo'<tr><td colspan="9"><h2 style="color: #9F6000;">Sorry ! Date invalide</h2></td></tr>';
           exit;
      }
      if(!empty($from) AND empty($to)){
           $condition = "='$fromdate'";
      }
       
       
      $sql = "SELECT CATEG_ID, CATEG_DESIGNATION, SUM(LC_MONTANT) AS CATEG_MONTANT
            FROM CATEGORIE INNER JOIN LIGNE_COMMANDE 
            ON CATEGORIE.CATEG_ID=LIGNE_COMMANDE.LC_ARTICLE_ID
            WHERE DATE(LC_CREATED) $condition
           GROUP BY CATEG_ID, CATEG_DESIGNATION";        
      $query = $this->db->query($sql);
      return $query;
   }   


    public function is_logged_in(){
        
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
		    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        $is_logged_in = $this->session->userdata('logged_in');
        
        if(!isset($is_logged_in) || $is_logged_in!==TRUE)
        {
            redirect('admin/');
        }
    }
}
   

