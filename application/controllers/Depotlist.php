<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Depotlist extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('Depotlist_model');
		$this->load->model('Init_model');
    }
    
    
    public function index(){
       $this->get_pagination();
       $this->db->order_by('DEP_CREATED'); 
       $data['query'] = $this->db->get('depot_view', 4, $this->uri->segment(3));
       //$data['listCategoriequery'] = $this->Init_model->listCategorie();
	   $data['listbanquequery'] = $this->Init_model->listBanque();
	   //$this->load->view('admin/view_header');
       $this->load->view('admin/view_depotlist', $data);
    }
    
    public function is_logged_in(){
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        $is_logged_in = $this->session->userdata('logged_in');
        
        if(!isset($is_logged_in) || $is_logged_in!==TRUE){
            redirect('admin/');
        }
    }
    
    
    public function add_depot(){	
            //$this->form_validation->set_rules('code','Code','required|min_length[5]|max_length[10]');	
            $this->form_validation->set_rules('montant','Montant','required|min_length[5]|max_length[30]');
			$this->form_validation->set_rules('banque','Banque','required');

            if($this->form_validation->run()==FALSE){
                echo '<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><small>'.  validation_errors().'</small></div>';
            }
            else {
				$montant = $this->input->post('montant');
                $banque = $this->input->post('banque');
				$code = $this->input->post('code');
                $this->Depotlist_model->add_depot($code,$montant,$banque);
                        
			}
    }
            
    public function do_edit(){
                
    }

    public function load_edit_view(){
//              $this->Articlelist_model->load_edit_view($this->input->post('id'));
                $id = $this->uri->segment(3);
                $data['query'] =   $this->db->get_where('depot', array('DEP_ID'=>$id));
                //$this->load->view('admin/view_header');
                $this->load->view('admin/view_editDepotlist',$data);
    }
            
    public function delete_depot(){
                $this->Depotlist_model->delete_depot($this->input->post('id'));
    }
            
    public function get_pagination(){
            $config['base_url'] = base_url().'depotlist/index/';
            $config['total_rows'] = $this->db->get('depot_view')->num_rows();
            $config['per_page'] = 4;
            $config['num_links'] = 5;
            
            //appy css on pagination
            
//            $config['page_query_string'] = TRUE;
//            // $config['use_page_numbers'] = TRUE;
//            $config['query_string_segment'] = 'page';

            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul><!--pagination-->';

            $config['first_link'] = '&laquo;';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';
//
            $config['last_link'] = '&raquo;';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';
//
            $config['next_link'] = '&rarr;';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';
//
            $config['prev_link'] = '&larr;';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active"><a href="">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';

            //   $config['display_pages'] = FALSE;
            // 
//          $config['anchor_class'] = 'follow_link';
            
            $this->pagination->initialize($config);
    }
}
   

