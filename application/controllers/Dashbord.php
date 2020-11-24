<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashbord extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		//setLocale(LC_TIME, 'fr_FR.UTF8','fra');		
        $this->load->model('Dashbord_model');
        $this->load->model('Init_model');
        $this->load->library('session');	
		$this->load->library('excel');
		$this->is_logged_in();
    }
    
    public function index(){
      //$data['query'] = $this->db->query("SELECT item.`item`, transaction.`id`, transaction.`comment`, transaction.`created` FROM item  RIGHT JOIN TRANSACTION ON item.`id` = transaction.`item-id` LIMIT 0,5");
        $data['query'] = $this->Init_model->init();
		    $data['typevente'] = $this->db->query("SELECT id, name FROM type_vente");
        $data['listArticlequery'] = $this->Init_model->listArticle();
		    $data['listtypeventequery'] = $this->Init_model->listTypevente();
        $this->load->view('admin/view_dashbord',$data);	
    }
    
    public function fetchVentes(){
		    
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
    
    function add_vente(){
            
            //$this->form_validation->set_rules('Article','Article Id','required');
            //$this->form_validation->set_rules('typevente','Typevente Id','required');
			      //$this->form_validation->set_rules('valeur','Valeur','required');
			      $this->form_validation->set_rules('created','Created','required');
            if($this->form_validation->run()==FALSE){
                    
                echo '<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><small>'.  validation_errors().'</small></div>';
                exit;
            }
            else {
                //$Article = $this->input->post('Article');
                //$typevente = $this->input->post('typevente');
        				//$value = $this->input->post('valeur');
        				$created = $this->input->post('created');
        				$comment = $this->input->post('comment');
                $this->Dashbord_model->add_vente($Article,$typevente,$value,$created,$comment);               
            }                
    }
            
    function do_edit(){
        
        $Article = $this->input->post('Article');
				$typevente = $this->input->post('typevente');
				$created = $this->input->post('created');
				$comment = $this->input->post('comment');
        $id = $this->input->post('id');
        $this->Dashbord_model->do_edit($Article, $typevente,$created,$comment,$id);
    }
			
	function cloture(){
                $this->Dashbord_model->cloture();
            }		

    function edit_entry(){
               $id = $this->uri->segment(3);
               $data['Article_val'] = str_replace("%20"," ",$this->uri->segment(4));
               $data['typevente_val'] = str_replace("%20"," ",$this->uri->segment(5));
               
			   $sql = "SELECT t.name as typeventeName, t.id as typeventeId , r.id, d.name AS ArticleName, d.code AS ArticleCode, d.id AS ArticleId, r.created, r.comment
                       FROM Article d 
					   INNER JOIN Categorie g ON g.id = d.Categorie
					   RIGHT JOIN vente r ON r.Article = d.id 
	                   LEFT JOIN type_vente t
	                   ON t.id = r.type
					   WHERE r.id = $id
		              ";        
       $query = $this->db->query($sql);
	   $data['query'] =   $query;
	   $data['listArticlequery'] = $this->Init_model->listArticle();
	   $data['listtypeventequery'] = $this->Init_model->listtypevente();
	   // $this->load->view('admin/view_header');
	   $this->load->view('admin/view_edit_entry',$data);
	}
            
    function delete_entry(){
                $this->Dashbord_model->delete_post($this->input->post('id'));
            }
	
	function exportSearchExcel(){
		$id = $this->input->post('id');
		if(!empty($id)){
			$this->Dashbord_model->exportSearchExcel($id);
		}
		else{
			 $from = $this->input->post('from');
             $to = $this->input->post('to');
			$this->Dashbord_model->exportSearchExcel(null, $from, $to);
		}
    }
            
    function searchvente(){
      $data['query'] = $this->db->get('Article');
      $data['query2'] = $this->db->get('type_vente');
      //$this->load->view('admin/view_header');
      $this->load->view('admin/view_searchEntry', $data);
    }

    /*function createlignesCommande($data){
      $data = json_decode($data);
      $this->Dashbord_model->createlignesCommande($data);
    }*/
			    
    function searchArticle(){
		$id = $this->input->post('q');
		if(!empty($id)){
			$this->Dashbord_model->searchArticle($id);
		}
		else{
			echo'<tr><td colspan="9"><h2 style="color: #9F6000;">Sorry ! Aucun résultat trouvé</h2></td></tr>';
		}
    }
			
	function searchTypevente(){
		$id = $this->input->post('q');
		if(!empty($id)){
			$this->Dashbord_model->searchTypevente($id);
		}
		else{
			echo'<tr><td colspan="9"><h2 style="color: #9F6000;">Sorry ! Aucun résultat trouvé</h2></td></tr>';
		}
    }
	
	function searchTypeventeByNoCompte(){
		$id = $this->input->post('q');
		 if(!empty($id)){
			 $this->Dashbord_model->searchTypeventeByNoCompte($id);
		 }
		 else{
			 echo'<tr><td colspan="9"><h2 style="color: #9F6000;">Sorry ! Aucun résultat trouvé</h2></td></tr>';
		 }
	}
     
    function getDocumentation(){
        $this->load->view('admin/view_documentation');
    }
	 
    function searchAdvance(){
             $from = $this->input->post('from');
             $to = $this->input->post('to');
             if(empty($from) && empty($to)){
                 echo'<tr><td colspan="9"><h2 style="color: #9F6000;">Sorry ! Aucun résultat trouvé</h2></td></tr>';
                 exit;
             }
             else{
                 $this->Dashbord_model->searchAdvance($from , $to);
             }
   }
   
   function  batchDelete(){
        if($this->session->userdata('role') == 'admin'){
       
       $ids = ( explode( ',', $this->input->get_post('ids') ));
       
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('id', $did);
            $this->db->update('vente');  
       }
       if($this->db->affected_rows()>0){
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$this->db->affected_rows().'Enregistrement annulé avec succès
            </div>';
        exit;
       }
       else{
           echo'<div class="alert alert-danger" style="margin-top:-17px;font-weight:bold">
            Sorry! Une erreur s\'est produite lors de l\'annulation ! Veuillez réessayer.
            </div>';
           exit;
       }
   }
   else{
       echo'<div class="alert alert-danger" style="margin-top:-17px;font-weight:bold">
            UTILISATEUR INVALIDE
            </div>';
           exit;
   }
   }
   
   function manageUser(){
       if($this->session->userdata('role') == 'admin'){
        $data['query'] =  $this->db->get('auth');
        //$this->load->view('admin/view_header');
        $this->load->view('admin/viewuser', $data);
       }
       else{
         //$this->load->view('head_section');
         $this->load->view('invaliduser');
       }
   }
   
   function delUser(){
        if($this->session->userdata('role') == 'admin'){
       $id = $this->input->get_post('id');
       $this->db->where('id', $id);
       $this->db->delete('auth');
       if($this->db->affected_rows()>0){
       $this->session->set_flashdata('falsh', '<p class="alert alert-success">Un élément supprimé avec succès</p>');    
       }
       else{
           $this->session->set_flashdata('falsh', '<p class="alert alert-danger">Sorry! Suppression non effectuée</p>');    
       }
       
        }
        else{
            $this->session->set_flashdata('falsh', '<p class="alert alert-danger">Sorry! Vous n\'avez pas le droit de supprimer</p>');    
            
        }
        redirect('dashbord/manageUser');
       exit;
   }
   
   function createUser(){
       if($this->session->userdata('role') == 'admin'){
        $this->form_validation->set_rules('name', 'Username', 'callback_username_check');
        $this->form_validation->set_rules('email', 'Email Address', 'callback_email_check');
        
                if ($this->form_validation->run() == FALSE){       
                    echo validation_errors('<div class="alert alert-danger">', '</div>');
                        exit;
		}
		else{
                    if($this->Dashbord_model->createUser()){
                        echo '<div class="alert alert-success">Utilisateur créé avec succès</div>';
                        exit;
                    }
                    else{
                        echo '<div class="alert alert-danger">Sorry ! une erreur s\'est produite </div>';
                        exit;
                    }
                }
       }
       else{
           echo '<div class="alert alert-danger">Invalid user</div>';
                        exit;
       }
   }
   
   public function username_check($str){       
               $query =  $this->db->get_where('auth', array('user_name'=>$str));
               
		if (count($query->result())>0)
		{
			$this->form_validation->set_message('username_check', 'The %s already exists');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
        
   public function email_check($str){
            $query =  $this->db->get_where('auth', array('user_email'=>$str));
		if (count($query->result())>0)
		{
                    	$this->form_validation->set_message('email_check', 'The %s already exists');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
    }
    
    function updateUserPass(){
        if($this->session->userdata('role') == 'admin'){
        $val = sha1($this->input->post('value'));
        $pk =  $this->input->post('pk');
        $data = array(
               'password' => $val
            );

            $this->db->where('id', $pk);
            $this->db->update('auth', $data); 
        }
        
    }
    
    function updateUserStstus(){
        if($this->session->userdata('role') == 'admin'){
        $val = $this->input->post('value');
        $pk =  $this->input->post('pk');
        
        $data = array(
               'is_active' => $val
            );

            $this->db->where('id', $pk);
            $this->db->update('auth', $data); 
        
        }
    }
    
    
    
    function evaluate(){
        $rs =  $this->db->get('vente');
        $operation1 = 0;
        $operation2 = 0.0000;
        foreach ($rs->result() as $row){
            $type =  ($row->transaction_type =='achat')?'+':'-';
            $operation1 =$operation1 . $type.$row->nug;
            $operation2 =$operation2 . $type.$row->total_prix;
        }
        echo 'Total Quantity = '. $operation1 = eval("return($operation1);");
        echo '<br> Prix total = '. $operation2 = eval("return($operation2);");
    }
}
   

