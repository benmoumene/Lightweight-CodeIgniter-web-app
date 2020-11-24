<?php 
	namespace classes\Objects;
	use classes\Objects\Inheritables\abstractObjectFactory;
	
	include_once('Inheritables\abstractObjectFactory.php');
	
	class lecturer extends abstractObjectFactory{
	
	    private $_code;
		public function __construct(array $f){
			parent::__construct($f['id'],$f['name']);
			$this->_code = substr($f['name'],0,4);
		}
		
		public function toString(){
			printf("Id Enseignant: %s <br/> Nom de l'Enseignant: %s <br/><br/> Code: %s
			",$this->_Id,$this->_Name,$this->_code);			
		}
		
		public function getCode(){
			return $this->_code;
		}
	}
	
?>