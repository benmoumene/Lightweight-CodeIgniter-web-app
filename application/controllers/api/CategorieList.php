<?php
   
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;
     
class CategorieList extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 1)
	{
        if(!empty($id)){
            $data = $this->db->get_where("categorie", ['CATEG_ID' => $id])->row_array();
        }else{
            $data = $this->db->get("categorie")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('categorie',$input);
     
        $this->response(['Catégorie créée avec succès.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('categorie', $input, array('CATEG_ID'=>$id));
     
        $this->response(['Catégorie modifiée avec succès.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('categorie', array('CATEG_ID'=>$id));
       
        $this->response(['Catégorie modifiée avec succès.'], REST_Controller::HTTP_OK);
    }
    	
}