    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventairelist extends CI_Controller {

    
        function __construct() {
            parent::__construct();
            $this->load->model('Inventairelist_model');
            $this->load->model('Init_model');
            $this->load->library('session');
            $this->load->library('pdf');
            $this->is_logged_in();
        }
        
        
    function index(){
    //$data['query'] = $this->Init_model->init();
    //$data['typevente'] = $this->db->query("SELECT id, name FROM type_vente");
      


    $data['listcategoriequery'] = $this->Init_model->listCategorie();
    $data['listmagasinquery'] = $this->Init_model->listMagasin();
    $data['liststockquery'] = $this->Init_model->getStock();
    $data['listinventairequery'] = $this->Init_model->listInventaire();
    $data['listtransfertquery'] = $this->Init_model->listTransfert();
    $data['listcategoriequantitequery'] = $this->db->get_where('view_categorie_quantite',array('IAM_MAG_ID'=>1));

    $this->load->view('view_stock',$data);          
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
                
    function add_inventaire(){
            
            //$this->form_validation->set_rules('article','Article Id','required');
            //$this->form_validation->set_rules('client','Client Id','required');
            //$this->form_validation->set_rules('montant','Montant','required');
      //$this->form_validation->set_rules('remise','Remise','');
      //$this->form_validation->set_rules('typeremise','Type remise','');
            /*if($this->form_validation->run()==FALSE){
                    
                echo '<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><small>'.  validation_errors().'</small></div>';
                exit;
            }
            else {*/
                //$article = $this->input->post('article');
                $json = file_get_contents('php://input');
                //log_message('debug',''.$json);
                //var_dump($data);
                //exit;
                $this->Inventairelist_model->add_inventaire($json);               
            //}                
    }

    function add_transfert(){

                $json = file_get_contents('php://input');
                $this->Inventairelist_model->add_transfert($json);                               
    }

    public function fetchCategories(){
        $id = $this->input->post('id');
        
        $query = $this->db->query('SELECT CATEGORIE.CATEG_ID,CATEGORIE.CATEG_DESIGNATION FROM CATEGORIE');
        //log_message("debug", "dataaaaaaaaaaaaaaaaaaaaa  ".json_encode($data));
        echo json_encode($query->result());
    }

    public function saveQuantites(){
        $json = file_get_contents('php://input');
        $this->Inventairelist_model->saveQuantites($json);
    }
  
  
  function reportInvoicePdf(){
    // As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
    $pdfFilePath = FCPATH."/downloads/reports/$filename.pdf";
    $data['page_title'] = 'Facture'; // pass data to the view

    if (file_exists($pdfFilePath) == FALSE)
    {
      ini_set('memory_limit','32M'); // boost the memory limit if it's low <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley">
      $html = $this->load->view('pdf_invoice_report', $data, true); // render the view into HTML

      $this->load->library('pdf');
      $pdf = $this->pdf->load();
      $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley">
      $pdf->WriteHTML($html); // write the HTML into the PDF
      $pdf->Output($pdfFilePath, 'F'); // save to file because we can
    }

    redirect("/downloads/reports/$filename.pdf"); 
  }

  function receiptPdf(){
    // As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
    $pdfFilePath = FCPATH."/downloads/reports/$filename.pdf";
    $data['page_title'] = 'Reçu de caisse'; // pass data to the view

    if (file_exists($pdfFilePath) == FALSE)
    {
      ini_set('memory_limit','32M'); // boost the memory limit if it's low <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley">
      $html = $this->load->view('receipt_pdf_report', $data, true); // render the view into HTML

      $this->load->library('pdf');
      $pdf = $this->pdf->load();
      $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley">
      $pdf->WriteHTML($html); // write the HTML into the PDF
      $pdf->Output($pdfFilePath, 'F'); // save to file because we can
    }

    redirect("/downloads/reports/$filename.pdf"); 
  }

  function reportReceiptPdf(){
        // boost the memory limit if it's low ;)
        $id = $this->input->post('id');

        ini_set('memory_limit', '256M');
        // load library
        $pdf = $this->pdf->load();
        // retrieve data from model or just static date
        $data['title'] = "items";
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
      
  function get_pagination()
  {
    $config['base_url'] = base_url().'/inventairelist/index/';
    
    $config['total_rows'] = $this->db->get('view_stock')->num_rows();
    
    $config['per_page'] = 4;
    
    $config['num_links'] = 5;
    
    //appy css on pagination
    
//            $config['page_query_string'] = TRUE;
//            // $config['use_page_numbers'] = TRUE;
//            $config['query_string_segment'] = 'page';

    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul><!--pagination-->';

    $config['first_link'] = '&laquo; First';
    $config['first_tag_open'] = '<li class="prev page">';
    $config['first_tag_close'] = '</li>';
//
    $config['last_link'] = 'Last &raquo;';
    $config['last_tag_open'] = '<li class="next page">';
    $config['last_tag_close'] = '</li>';
//
    $config['next_link'] = 'Next &rarr;';
    $config['next_tag_open'] = '<li class="next page">';
    $config['next_tag_close'] = '</li>';
//
    $config['prev_link'] = '&larr; Previous';
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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */