<?php 
	namespace classes\Objects;
	use classes\Objects\Inheritables\abstractObjectFactory;
	
	include_once('Inheritables\abstractObjectFactory.php');
	
	class courseName extends abstractObjectFactory{
	
	    private $_Code;
		public function __construct(array $f){
			parent::__construct($f['id'],$f['name']);
			$this->_Code = $f['code'];
		}
		
		public function toString(){
			printf("Id Cours: %s <br/> Nom du cours: %s <br/>",$this->_Id,$this->_Name);			
		}
		
		public function getCode(){
			return $this->_Code;
		}
	}
?>