<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reglementlist extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('Reglementlist_model');
		$this->load->model('Init_model');
        $this->load->library('pagination');
        $this->load->library('pdf');
    }
    
    
    public function index(){
       $this->get_pagination();
        $this->db->order_by('VEN_CREATED', 'desc'); 
        $data['query'] = $this->db->get('view_vente', 4, $this->uri->segment(3));
        $data['listclientquery'] = $this->Init_model->listClient();
	   //$this->load->view('admin/view_header');
       $this->load->view('admin/view_reglementlist', $data);
    }

     public function view($id){
        $data = array();
        
        // Check whether member id is not empty
        if(!empty($id)){
            $data['query'] = $this->Reglementlist_model->getRows(array('id' => $id));
            $data['listclientquery'] = $this->Init_model->listClient();
            $data['title']  = 'Détails Ventes';
            
            // Load the details page view
            $this->load->view('admin/view_reglementlist', $data);
        }else{
            redirect('reglementlist');
        }
    }

    public function fetchData(){

        $json = file_get_contents('php://input');
        

        $data = json_decode($json, true);

        $from = $data["from"];
        $to = $data["to"];
        $from = date("Y-m-d",strtotime(trim($from)));
        $to = date("Y-m-d",strtotime(trim($to)));
        $client = $data["client"];
        $soldee = $data["soldee"];

        if(empty($client)){
            if(empty($from)){
                if(!empty($soldee)&&$soldee=1){
                    $condition="WHERE VEN_A_PAYER=0";
                }else{
                    $condition="WHERE VEN_A_PAYER<>0";
                }
            }else{
                if(!empty($soldee)&&$soldee=1){
                    $condition="WHERE VEN_A_PAYER=0 AND VEN_CREATED between '$from' and '$to'";
                }elseif(!empty($soldee)&&$soldee>1){
                    $condition="WHERE VEN_A_PAYER<>0 AND VEN_CREATED between '$from' and '$to'";
                }elseif(empty($soldee)){
                    $condition="WHERE VEN_CREATED between '$from' and '$to'";
                }
            }
        }else{
            if(empty($from)){
                if(!empty($soldee)&&$soldee=1){
                    $condition="WHERE VEN_A_PAYER=0 AND CLI_ID=".$client;
                }else{
                    $condition="WHERE VEN_A_PAYER<>0 AND CLI_ID=".$client;
                }
            }else{
                if(!empty($soldee)&&$soldee=1){
                    $condition="WHERE VEN_A_PAYER=0 AND VEN_CREATED between '$from' and '$to' AND CLI_ID=".$client;
                }elseif(!empty($soldee)&&$soldee>1){
                    $condition="WHERE VEN_A_PAYER<>0 AND VEN_CREATED between '$from' and '$to' AND CLI_ID=".$client;
                }elseif(empty($soldee)){
                    $condition="WHERE VEN_CREATED between '$from' and '$to'AND CLI_ID=".$client;
                }
            }
        }

        $sql = "SELECT * from view_vente $condition ORDER BY VEN_CREATED desc";  
        log_message("error",$sql);      
        $data['query'] = $this->db->query($sql);

            /*$config['base_url'] = base_url().'reglementlist/fetchData/';

            $config['total_rows'] = $data['query']->num_rows();
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
            
            $this->pagination->initialize($config);*/
        $data['listclientquery'] = $this->Init_model->listClient();
           //$this->load->view('admin/view_header');
        $this->load->view('admin/view_reglementlist', $data);
        
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
        $this->Reglementlist_model->add_reglement($json);
    }
            
    public function do_edit(){
                $code = $this->input->post('code');
                $designation = $this->input->post('designation');
				$categ = $this->input->post('categ');
				$prix_unit = $this->input->post('prix_unit');
                $id = $this->input->post('id');
                $this->Articlelist_model->do_edit($code,$designation,$categ,$prix_unit,$id);
    }

    public function load_edit_view(){
//              $this->Articlelist_model->load_edit_view($this->input->post('id'));
                $id = $this->uri->segment(3);
                $data['query'] =   $this->db->get_where('reglement', array('VEN_ID'=>$id));
                //$this->load->view('admin/view_header');
                $this->load->view('admin/view_editReglementlist',$data);
    }
            
    public function delete_reglement(){
                $this->Depotlist_model->delete_reglement($this->input->post('id'));
    }

    public function fetchReglements(){
                $this->Reglementlist_model->fetchReglements($this->input->post('id'));
    }

    public function getReceiptData($id){
        return $this->Init_model->getReceiptData($id);
    }

    public function getLcData($id){
        return $this->Init_model->getLcData($id);
    }

    public function printReceipt(){
        // boost the memory limit if it's low ;)
        $vente_id = $this->uri->segment(3);
        $reg_id = $this->uri->segment(4);

        ini_set('memory_limit', '256M');
        // load library
        $pdf = $this->pdf->load();
        // retrieve data from model or just static date

        $data["receipt"] = $this->getReceiptData($reg_id);
        $data["ligne_commande"] = $this->getLcData($vente_id);

        $pdf->allow_charset_conversion=true;  // Set by default to TRUE
        $pdf->charset_in='UTF-8';
     //   $pdf->SetDirectionality('rtl'); // Set lang direction for rtl lang
        $pdf->autoLangToFont = true;
        $html = $this->load->view('receipt', $data, true);
        // render the view into HTML
        $pdf->WriteHTML($html);
        // write the HTML into the PDF
        $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
        // save to file because we can exit();
    }
            
    public function get_pagination(){
            $config['base_url'] = base_url().'reglementlist/index/';
            $config['total_rows'] = $this->db->get('view_vente')->num_rows();
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

    public function get_search_pagination(){
            $config['base_url'] = base_url().'reglementlist/fetchData/';
            $config['total_rows'] = $this->db->query('select * from view_vente')->num_rows();
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
   

