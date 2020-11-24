<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Init extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
       $this->is_logged_in();
        $this->load->model('Init_model');
        $this->load->model('Auth_model');
        $this->load->library('excel');
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
    
    public function index(){
    
    }
    
//    public function itemExcel(){
//        $header = '';
//        $result ='';
//        $query = $this->db->get('item');
//        $fields = $this->db->list_fields('item');
//        
//        foreach ($fields as $field)
//            {
//               $header .=  $field . "\t";
//            } 
//        foreach ($query->result() as $row)
//            {
//            $line = '';
//            foreach( $row as $value )
//                {
//                if ( ( !isset( $value ) ) || ( $value == "" ) )
//                {
//                $value = "\t";
//                }
//                else
//                {
//                $value = str_replace( '"' , '""' , $value );
//                $value = '"' . $value . '"' . "\t";
//                }
//                $line .= (string)$value;
//                }
//                 $result .= trim( $line ) . "\n";
//            }
//            $result = str_replace( "\r" , "" , $result );
//            
//            if ( $result == "" )
//                {
//                 $result = "\nNo Record(s) Found!\n";
//                }
//                $file_name = 'item-'.date('d/m/y');
//                header("Content-type: application/octet-stream");
//                header("Content-Disposition: attachment; filename=$file_name.xls");
//                header("Pragma: no-cache");
//                header("Expires: 0");
//                print "$header\n$result";
//    }
//    
//    
//    public function transactionExcel(){
//        $header = '';
//        $result ='';
//        $sql = "SELECT transaction.id, item.item,  transaction.weight, transaction.nug, transaction.total_weight, transaction.transaction_type, transaction.comment, transaction.created from transaction LEFT JOIN item ON transaction.item_id = item.id  ";        
//        $query = $this->db->query($sql);
//        $fields = $this->db->list_fields('transaction');
//        
//        foreach ($fields as $field)
//            {
//               $header .=  $field . "\t";
//            } 
//        foreach ($query->result() as $row)
//            {
//            $line = '';
//            foreach( $row as $value )
//                {
//                if ( ( !isset( $value ) ) || ( $value == "" ) )
//                {
//                $value = "\t";
//                }
//                else
//                {
//                $value = str_replace( '"' , '""' , $value );
//                $value = '"' . $value . '"' . "\t";
//                }
//                $line .= (string)$value;
//                }
//                 $result .= trim( $line ) . "\n";
//            }
//            $result = str_replace( "\r" , "" , $result );
//            
//            if ( $result == "" )
//                {
//                 $result = "\nNo Record(s) Found!\n";
//                }
//                 $file_name = 'transaction-'.date('d/m/y');
//                header("Content-type: application/octet-stream");
//                header("Content-Disposition: attachment; filename=$file_name.xls");
//                header("Pragma: no-cache");
//                header("Expires: 0");
//                print "$header\n$result";
//    }


    public function exportventeExcel(){
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('ventes par article');
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'Liste des ventes');
        
        $this->excel->getActiveSheet()->setCellValue('A4', 'article');
        $this->excel->getActiveSheet()->setCellValue('B4', 'Categorie');
        $this->excel->getActiveSheet()->setCellValue('C4', 'T. vente');
        $this->excel->getActiveSheet()->setCellValue('D4', 'Valeur');
		$this->excel->getActiveSheet()->setCellValue('E4', 'Tot. Categorie');
		$this->excel->getActiveSheet()->setCellValue('F4', 'Date');
        $this->excel->getActiveSheet()->setCellValue('G4', 'Notes');
        
        //merge cell A1 until C1
        $this->excel->getActiveSheet()->mergeCells('A1:G1');
        //set aligment to center for that merged cell (A1 to C1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
        
        for($col = ord('A'); $col <= ord('G'); $col++){
            //set column dimension
			$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
			 //change the font size
			$this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

			$this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		}
        //retrive contries table data
        $sql = "SELECT no_cpte, name, code, Categorie_name, categorie_name FROM article_view  ";        
        $rs = $this->db->query($sql);
//        $rs = $this->db->get('countries');
        $exceldata="";
        foreach ($rs->result_array() as $row){
                $exceldata[] = $row;
        }
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');
                
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                $filename='ventesRecherche-'.date('d/m/y').'.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache

                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
    }
    
    public function exportarticleExcel(){
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('article');
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'Liste des articles');
        
        $this->excel->getActiveSheet()->setCellValue('A4', 'No. de compte');
        $this->excel->getActiveSheet()->setCellValue('B4', 'Nom');
        $this->excel->getActiveSheet()->setCellValue('C4', 'Code');
        $this->excel->getActiveSheet()->setCellValue('D4', 'Categorie');
		$this->excel->getActiveSheet()->setCellValue('E4', 'categorie');
        //merge cell A1 until C1
        $this->excel->getActiveSheet()->mergeCells('A1:E1');
        //set aligment to center for that merged cell (A1 to C1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
        
       for($col = ord('A'); $col <= ord('E'); $col++){
                //set column dimension
        $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
         //change the font size
        $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

        $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    }
        //retrive contries table data
        $sql = "SELECT no_cpte, name, code, Categorie_name, categorie_name FROM article_view  ";        
        $rs = $this->db->query($sql);
//        $rs = $this->db->get('countries');
        $exceldata="";
        foreach ($rs->result_array() as $row){
                $exceldata[] = $row;
        }
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');
                
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                $filename='articles-'.date('d/m/y').'.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache

                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
    }
    
    public function exportCategorieExcel(){
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Categorie');
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'Liste des Categories');
        
        $this->excel->getActiveSheet()->setCellValue('A4', 'Nom');
        $this->excel->getActiveSheet()->setCellValue('B4', 'Code');
        $this->excel->getActiveSheet()->setCellValue('C4', 'Créé le');
        //merge cell A1 until C1
        $this->excel->getActiveSheet()->mergeCells('A1:C1');
        //set aligment to center for that merged cell (A1 to C1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
        
       for($col = ord('A'); $col <= ord('C'); $col++){
                //set column dimension
        $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
         //change the font size
        $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

        $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    }
        //retrive contries table data
        $sql = "SELECT name, code, created FROM Categorie  ";        
        $rs = $this->db->query($sql);
//        $rs = $this->db->get('countries');
        $exceldata="";
        foreach ($rs->result_array() as $row){
                $exceldata[] = $row;
        }
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');
                
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                $filename='Categories-'.date('d/m/y').'.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache

                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
    }
    
    public function resetData(){
         if($this->session->userdata('role') == 'admin'){
            $this->load->view('admin/view_resetData');
         }
         else{
         $this->load->view('head_section');
         $this->load->view('invaliduser');
         }
    }
    
    public function resetTransactionItem(){
        $password =  $this->input->get_post('password');
        $table =  $this->input->get_post('tabl');
        $uname =  $this->session->userdata('username');
        if($this->Auth_model->auth($uname, $password)){
            if($table == 'course'){
            $this->db->truncate($table);
            echo '<p class="alert alert-success"><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;'.$table.' reset successfully ! Thanks</p>';
            exit;
            }
            else{
                $sql = "ALTER TABLE course  DROP FOREIGN KEY fk";
                $sql1 = "DROP TABLE IF EXISTS vente, article";
                $sql2 = sprintf("CREATE TABLE IF NOT EXISTS `article` (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `code` varchar(11) NOT NULL,
                            `name` varchar(30) NOT NULL,
                            `Categorie` int(11) NOT NULL,
							`created` date NOT NULL,
                            PRIMARY KEY (`id`),
                            KEY `name` (`name`)
                          )");
                $sql3 = sprintf("CREATE TABLE IF NOT EXISTS `vente` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
						`article` int(11) NOT NULL,
                        `type` int(11) NOT NULL,
						`valeur` int(11) NOT NULL,
						`created` date NOT NULL,
						`comment` text NOT NULL,
                        PRIMARY KEY (`id`),
                        KEY `article-id` (`article`)
						KEY `type-id` (`type`)
                      )");
                $sql4 = "ALTER TABLE vente  ADD CONSTRAINT fk FOREIGN KEY (article) REFERENCES article (id) ON DELETE CASCADE ON UPDATE CASCADE;";
                $sql5 = "ALTER TABLE vente  ADD CONSTRAINT fk2 FOREIGN KEY (type) REFERENCES type (id) ON DELETE CASCADE ON UPDATE CASCADE;";

                $this->db->trans_start();
                $this->db->query($sql);
                $this->db->query($sql1);
                $this->db->query($sql2);
                $this->db->query($sql3);
                $this->db->query($sql4);
				$this->db->query($sql5);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE)
                    {
                    $this->db->query($sql);
                    echo '<p class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i>&nbsp;&nbsp; Sorry! réinitialisation échouée !</p>';
                    exit;
                    }
                    else{
                        echo '<p class="alert alert-success"><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp; Réinitialisé avec succès ! Merci</p>';
                        exit;
                    }
                
            }
        }
        else{			
            echo'<p class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i>&nbsp;&nbsp;Invalid User</p>';
            exit;
        }
    }
   
}
