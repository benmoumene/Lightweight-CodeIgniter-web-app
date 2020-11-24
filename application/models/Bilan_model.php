<?php

class Bilan_model extends CI_Model
{
    
   function __construct() {
        parent::__construct();
        $this->load->model('Init_model');
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
}