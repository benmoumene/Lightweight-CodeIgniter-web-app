<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReglementFournisseurlist extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('ReglementFournisseurlist_model');
		$this->load->model('Init_model');
        $this->load->library('pagination');
        $this->load->library('pdf');
    }
    
    
    public function index(){
       $this->get_pagination();
        $this->db->order_by('ACH_CREATED','desc'); 
        $data['query'] = $this->db->get('view_achat', 4, $this->uri->segment(3));
        $data['listmodepaiementquery'] = $this->Init_model->listModePaiement();
        $data['listbanquequery'] = $this->Init_model->listBanque();
	   //$this->load->view('admin/view_header');
       $this->load->view('admin/view_reglementfournisseurlist', $data);
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
    
    
    public function add_reglement(){
    	$json = file_get_contents('php://input');       
        $this->ReglementFournisseurlist_model->add_reglement($json);
    }
            
    public function load_edit_view(){
//              $this->Articlelist_model->load_edit_view($this->input->post('id'));
                $id = $this->uri->segment(3);
                $data['query'] =   $this->db->get_where('reglement_achat', array('VEN_ID'=>$id));
                //$this->load->view('admin/view_header');
                $this->load->view('admin/view_editReglementlist',$data);
    }
            
    public function delete_reglement(){
                $this->ReglementFournisseurlist_model->delete_reglement($this->input->post('id'));
    }

    public function fetchReglements(){
                $this->ReglementFournisseurlist_model->fetchReglements($this->input->post('id'));
    }

    public function getFournisseurReceiptData($id){
        return $this->Init_model->getFournisseurReceiptData($id);
    }

    public function getFournisseurLcData($id){
        return $this->Init_model->getFournisseurLcData($id);
    }

    public function printReceiptFourn(){
        // boost the memory limit if it's low ;)
        $achat_id = $this->uri->segment(3);
        $reg_id = $this->uri->segment(4);

        ini_set('memory_limit', '256M');
        // load library
        $pdf = $this->pdf->load();
        // retrieve data from model or just static date

        $data["receiptFourn"] = $this->getFournisseurReceiptData($reg_id);
        $data["ligne_commande_achat"] = $this->getFournisseurLcData($achat_id);

        $pdf->allow_charset_conversion=true;  // Set by default to TRUE
        $pdf->charset_in='UTF-8';
     //   $pdf->SetDirectionality('rtl'); // Set lang direction for rtl lang
        $pdf->autoLangToFont = true;
        $html = $this->load->view('receiptFourn', $data, true);
        // render the view into HTML
        $pdf->WriteHTML($html);
        // write the HTML into the PDF
        $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
        // save to file because we can exit();
    }
            
    public function get_pagination(){
            $config['base_url'] = base_url().'reglementfournisseurlist/index/';
            $config['total_rows'] = $this->db->get('view_achat')->num_rows();
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
   

