<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorielist extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
       $this->is_logged_in();
        $this->load->model('Categorielist_model');
    }
    
    
    public function index(){
       $this->get_pagination();
       $this->db->order_by('CATEG_NUM'); 
       $data['query'] = $this->db->get('categorie', 4, $this->uri->segment(3));
       //$this->load->view('admin/view_header');
       $this->load->view('admin/view_categorielist', $data);
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
    
    
    public function add_Categorie(){

        $config['upload_path'] = './upload_categ_images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        // validate the POST data 
        // http://codeigniter.com/user_guide/libraries/form_validation.html
        $this->form_validation->set_rules('code','Code value','trim|required|min_length[2]|max_length[30]');
        $this->form_validation->set_rules('designation','Libelle Value','trim|min_length[2]|max_length[30]');

        if ($this->form_validation->run() == FALSE)
        {   
            //$this->load->view('admin/view_categorielist', $data);

            echo '<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><small>'.  validation_errors().'</small></div>';

            // quit here
            return false;
        }

        if (!$this->upload->do_upload('photo'))
        {
            // no file uploaded or failed upload
            echo '<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><small>'.  $this->upload->display_errors().'</small></div>';
            //$this->load->view('upload_form', $error);
        }
        else
        {
            // success
            $data = $this->upload->data();
            //log_message('debug', print_r ($data));
            $code = $this->input->post('code');
            $designation = $this->input->post('designation');
            $remise = $this->input->post('remise');
            $prix_unitaire = $this->input->post('prix_unitaire');

            // a model that deals with your image data (you have to create this)
            $this->Categorielist_model->add_categorie($code, $designation, $remise, $prix_unitaire, $data["file_name"]);

            //$this->load->view('upload_success', $data);
        }

    }
            
    public function do_edit(){
                $code = $this->input->post('code');
                $designation = $this->input->post('designation');
                $id = $this->input->post('id');
                $this->Categorielist_model->do_edit($code, $designation, $id);
    }

    public function load_edit_view(){
//              $this->articlelist_model->load_edit_view($this->input->post('id'));
                $id = $this->uri->segment(3);
                $data['query'] =   $this->db->get_where('categorie', array('id'=>$id));
                // $this->load->view('admin/view_header');
                $this->load->view('admin/view_editCategorielist',$data);
    }
            
    public function delete_categorie(){
                $this->Categorielist_model->delete_categorie($this->input->post('id'));
    }
            
    public function get_pagination(){
            $config['base_url'] = base_url().'categorielist/index/';
            $config['total_rows'] = $this->db->get('categorie')->num_rows();
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
   

