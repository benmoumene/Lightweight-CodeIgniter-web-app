<?php

class Dashbord_model extends CI_Model
{
    
   function __construct() {
        parent::__construct();
        $this->load->model('Init_model');
    }
    
   function add_vente($data){
		//echo 'entered';
    $data = json_decode($data, true);
    //$string = var_dump($data);

    //log_message('debug', 'vardump'.$data["vente"]["VEN_CLI"]);
    //echo print $data;

    $vente = $data["vente"];
    $ligne_commande = $data["ligne_commande"];

    $this->db->trans_start();

		$this->db->set('VEN_CLI', $vente["VEN_CLI"]);
    $this->db->set('VEN_MAGASIN', $vente["VEN_MAGASIN"]);
		$this->db->set('VEN_A_PAYER', $vente["VEN_A_PAYER"]);
    $this->db->set('VEN_REMISE', $vente["VEN_REMISE"]);
    $this->db->set('VEN_MONTANT_TOTAL', $vente["VEN_MONTANT_TOTAL"]);

    //$this->db->set('VEN_CODE', $vente["VEN_CODE"]);
    //$this->db->set('VEN_COMMENT', $vente["VEN_COMMENT"]);

    $id = $this->db->insert('vente');

    $insert_id = $this->db->insert_id();
    

    if($insert_id){

      foreach ($ligne_commande as $key => $value) {
        $this->db->set('LC_VENTE_ID', $insert_id);
        $this->db->set('LC_ARTICLE_ID', $ligne_commande[$key]["LC_ARTICLE_ID"]);
        $this->db->set('LC_QUANTITE', $ligne_commande[$key]["LC_QUANTITE"]);
        $this->db->set('LC_MONTANT', $ligne_commande[$key]["LC_MONTANT"]);
        $this->db->set('LC_REMISE', $ligne_commande[$key]["LC_REMISE"]);
        $this->db->insert('ligne_commande');
      }

         $this->db->trans_complete();
  		
         if($this->db->trans_status() === TRUE){
              echo'<div class="alert alert-dismissable alert-success"><h4>vente ajoutée avec succès</h4></div>';
              //exit;
  //            Set course history
  //            $this->updateReport($coursename, $weight, $nug, $course_type, $date);              
         }
         else
         {
              echo'<div class="alert alert-dismissable alert-danger"><h4>Opération échouée</h4></div>';
              //exit;
         }
     } 
  }
    
   function delete_post($id){
     if($this->session->userdata('role') == 'admin'){
          $this->db->delete('vente',  array('VEN_ID'=>$id));
          }
          else{
          echo'utilisateur invalide'; 
          exit;
      }
    }
    

  /*function createlignesCommande ($data){
      $this->db->trans_start(); # Starting Transaction
      //$this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well 

      for($i=0; $i<$data.length;$i++) {
        $this->db->insert('ligne_commande', $data[$i]->id);        
      }
      
      $this->db->trans_complete(); # Completing transaction
  }*/  
   
   function check_license(){
        
   }
   
   function cloture(){
        
   }
   
   function searcharticleRequest($article)
   {
	   $id = trim($article);
	   $sql = "SELECT t.code as typeventeCode, t.id as typeventeId , r.id, d.name AS articleName,  d.code AS articleCode, g.name AS groupeName, d.id AS articleId, REPLACE(FORMAT (r.valeur,0),',',' ')AS valeur, r.created, r.comment
                       FROM article d 
					   INNER JOIN groupe g ON d.groupe = g.id
					   RIGHT JOIN vente r ON r.article = d.id 
	                   LEFT JOIN type_vente t
	                   ON t.id = r.type
					   WHERE d.id = $id";        
        $query = $this->db->query($sql);
		return $query; 
   }
   
   function searcharticleRequestForExcel($article)
   {
	   $id = trim($article);
	   $sql = "SELECT t.code as typeventeCode, d.name AS articleName,  d.code AS articleCode, g.name AS groupeName, REPLACE(FORMAT (r.valeur,0),',',' ')AS valeur, r.created, r.comment
                       FROM article d 
					   INNER JOIN groupe g ON d.groupe = g.id
					   RIGHT JOIN vente r ON r.article = d.id 
	                   LEFT JOIN type_vente t
	                   ON t.id = r.type
					   WHERE d.id = $id";        
        $query = $this->db->query($sql);
		return $query; 
   }
   
   function searcharticle($article){
       $query = $this->searcharticleRequest($article);
       $sno = 1;
	   foreach ($query->result() as $row)
       {    
           $created = strtotime($row->created);
		   $created = strftime("%d %b %Y", $created );
           echo'<tr><td>'.$sno.'</td><td>'.$row->articleName.'</td><td>'.$row->groupeName.'</td><td>'.$row->typeventeCode.'</td><td align="right">'.$row->valeur.'</td><td>'.$created.'</td><td>'.$row->comment.'</td><td>
                <div class="btn-group"><a href="'.base_url().'dashbord/edit_entry/'.$row->id.'/'.$row->articleCode.'/'.$row->typeventeCode.'" class="btn btn-info btn-sm" title="Modifier"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="#" db_id="'.$row->id.'" class="btn btn-danger btn-sm btn_delete" title="Mettre dans la corbeille"><i class="glyphicon glyphicon-trash"></i></a></div>
                </td></tr>';
           
           $sno = $sno+1; 
       }
   }
   
   function searchTypevente($type){
       $id = trim($type);
       $sql = "SELECT t.code as typeventeCode, t.id as typeventeId , r.id, d.name AS articleName,  d.code AS articleCode, g.name AS groupeName, d.id AS articleId, REPLACE(FORMAT (r.valeur,0),',',' ')AS valeur, r.created, r.comment
                       FROM article d 
					   INNER JOIN groupe g ON d.groupe = g.id
					   RIGHT JOIN vente r ON r.article = d.id 
	                   LEFT JOIN type_vente t
	                   ON t.id = r.type
					   WHERE t.id = $id";        
        $query = $this->db->query($sql);
       $sno = 1;
       foreach ($query->result() as $row)
       {    
           $created = strtotime($row->created);
		   $created = strftime("%d %b %Y", $created );
           echo'<tr><td>'.$sno.'</td><td>'.$row->articleName.'</td><td>'.$row->groupeName.'</td><td>'.$row->typeventeCode.'</td><td align="right">'.$row->valeur.'</td><td>'.$created.'</td><td>'.$row->comment.'</td><td>
                <div class="btn-group"><a href="'.base_url().'dashbord/edit_entry/'.$row->id.'/'.$row->articleCode.'/'.$row->typeventeCode.'" class="btn btn-info btn-sm" title="Modifier"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="#" db_id="'.$row->id.'" class="btn btn-danger btn-sm btn_delete" title="Mettre dans la corbeille"><i class="glyphicon glyphicon-trash"></i></a></div>
                </td></tr>';
           
           $sno = $sno+1; 
       }
       
       
   }
   
   function searchAdvanceRequest($from,$to){
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
       
       
       $sql = "SELECT t.code as typeventeCode, d.name AS articleName,  d.code AS articleCode, g.name AS groupeName, REPLACE(FORMAT (r.valeur,0),',',' ')AS valeur, r.created, r.comment
                       FROM article d 
					   INNER JOIN groupe g ON d.groupe = g.id
					   RIGHT JOIN vente r ON r.article = d.id 
	                   LEFT JOIN type_vente t
	                   ON t.id = r.type
		       WHERE r.created $condition ";        
       $query = $this->db->query($sql);
	   return $query;
   }   
   
   function searchAdvance($from , $to){
       $query = $this->searchAdvanceRequest($from, $to);
       $sno = 1;
       foreach ($query->result() as $row)
       {    
           $created = strtotime($row->created);
		   $created = strftime("%d %b %Y", $created );
           echo'<tr><td>'.$sno.'</td><td>'.$row->articleName.'</td><td>'.$row->groupeName.'</td><td>'.$row->typeventeCode.'</td><td align="right">'.$row->valeur.'</td><td>'.$created.'</td><td>'.$row->comment.'</td><td>
                <div class="btn-group"><a href="'.base_url().'dashbord/edit_entry/'.$row->id.'/'.$row->articleCode.'/'.$row->typeventeCode.'" class="btn btn-info btn-sm" title="Modifier"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="#" db_id="'.$row->id.'" class="btn btn-danger btn-sm btn_delete" title="Mettre dans la corbeille"><i class="glyphicon glyphicon-trash"></i></a></div>
                </td></tr>';
           $sno = $sno+1; 
       }
   }
   
   public function exportSearchExcel($article=null,$from=null,$to=null){
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('ventes article');
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'Liste des ventes');
        
        $this->excel->getActiveSheet()->setCellValue('A4', 'article');
        $this->excel->getActiveSheet()->setCellValue('B4', 'Groupe');
        $this->excel->getActiveSheet()->setCellValue('C4', 'T. vente');
        $this->excel->getActiveSheet()->setCellValue('D4', 'Valeur');
		$this->excel->getActiveSheet()->setCellValue('E4', 'Tot. groupe');
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
		if(!empty($article)){
			$sql = $this->searcharticleRequestForExcel($article);
		}else{
			if(!empty($from)&&!empty($to)){
				$sql = $this->searchAdvanceRequest($from,$to);
			}
		}			
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
   
   //  update transction history every time
   public function updateReport($coursename, $weight, $quantity, $type, $date){
       
        $get_histoty =  $this->db->get_where('report', array('courseName'=>$coursename),1);
        $u_weight = 0;
		$u_prof = 0;
        $u_quantity = 0;
        foreach ($get_histoty->result() as $row){
        $u_weight = $row->weight;
		$u_prof = $row->prof;
        $u_quantity = $row->quantity;
        }
        if($type == 'achat'){
            $u_weight = ($weight + $u_weight);
			$u_prof = ($prof + $u_prof);
            $u_quantity = ($quantity + $u_quantity);
            }
        if($type == 'vente'){
            if(($u_prof > $prof) && ($u_quantity > $quantity)){
				 $u_prof = ($u_prof - $prof );
				 $u_quantity = ($u_quantity - $quantity);
            }
            else{
            echo' Sorry ! Pas suffisamment de sock pour la vente ';
            exit;
            }
        }
        $data = array(
        'prof' => $u_weight,
		'courseName' => $u_prof,
        'classeName' => $u_quantity,
        'created' => $date
        );

        $this->db->where('coursename_id', $coursename);
        $this->db->update('report', $data); 


        if($this->db->affected_rows()>0){
        echo'updated';
        }
       exit;
   }
   
   function createUser(){
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = sha1($this->input->post('cpassword'));
        $role = $this->input->post('role');
        $is_active = $this->input->post('is_active');
        $created = date("Y/m/d");
        
        $data = array('user_name'=>$name,
            'user_email'=>$email,
            'password'=>$password,
            'role'=>$role,
            'is_active'=>$is_active,
            'd_o_c'=>$created);
        $this->db->insert('auth', $data);
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return FALSE;
		}
   }    
}