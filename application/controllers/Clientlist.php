<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientlist extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('Clientlist_model');
		$this->load->model('Init_model');
        $this->load->library('pagination');
    }
    
    
    public function index(){
       $this->get_pagination();
       $this->db->order_by('CLI_NOM'); 
       $data['query'] = $this->db->get('client_view', 4, $this->uri->segment(3));
       $this->load->view('admin/view_clientlist', $data);
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
    
    
    public function add_client(){
		    $this->form_validation->set_rules('nom','Nom','min_length[2]|max_length[10]');		
            $this->form_validation->set_rules('prenom','Prénom','required|min_length[3]|max_length[30]');
            $this->form_validation->set_rules('tel1','Téléphone 1','required|min_length[3]|max_length[30]');
            
            $config['upload_path'] = './upload_user_images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '100';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';

            $this->load->library('upload', $config);

            if($this->form_validation->run()==FALSE){
                echo '<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><small>'.  validation_errors().'</small></div>';
            }
            else {
				$nom = $this->input->post('nom');
                $prenom = $this->input->post('prenom');
                $tel1 = $this->input->post('tel1');
                $tel2 = $this->input->post('tel2');
                $whatsapp = $this->input->post('whatsapp');
                if($this->Clientlist_model->add_client($nom,$prenom,$tel1,$tel2,$whatsapp)){
                    if ( ! $this->upload->do_upload('photo'))
                        {
                                $error = array('error' => $this->upload->display_errors());

                                $this->load->view('upload_form', $error);
                        }
                        else
                        {
                            echo'<div class="alert alert-dismissable alert-success"><h4>Client ajouté avec succès</h4></div>';
                                //$data = array('upload_data' => $this->upload->data());

                                //$this->load->view('upload_success', $data);
                        }
                    
                }else{
                    echo'<div class="alert alert-dismissable alert-danger"><h4>Erreur! Veuillez réessayer plus tard</h4></div>';
                }                        
			}
    }
            
    public function do_edit(){
                $nom = $this->input->post('nom');
                $prenom = $this->input->post('prenom');
				$remise = $this->input->post('remise');
				$typeremise = $this->input->post('typeremise');
                $id = $this->input->post('CLI_ID');
                $this->clientlist_model->do_edit($nom,$prenom,$remise,$typeremise,$id);
    }

    public function load_edit_view(){
//              $this->clientlist_model->load_edit_view($this->input->post('id'));
                $id = $this->uri->segment(3);
                $data['query'] =   $this->db->get_where('client', array('CLI_ID'=>$id));
                //$this->load->view('admin/view_header');
                $this->load->view('admin/view_editClientlist',$data);
    }
            
    public function delete_client(){
                $this->clientlist_model->delete_client($this->input->post('CLI_ID'));
    }
            
    public function get_pagination(){
            $config['base_url'] = base_url().'clientlist/index/';
            $config['total_rows'] = $this->db->get('client')->num_rows();
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
   

