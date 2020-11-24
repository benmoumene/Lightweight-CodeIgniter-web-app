<?php 
	namespace classes\Objects;
	use classes\Objects\Inheritables\abstractObjectFactory;
	
	include_once('Inheritables\abstractObjectFactory.php');
	
	class classroom extends abstractObjectFactory{		
		
		public function __construct(array $f){
			parent::__construct($f['id'],$f['name']);
		}
		
		public function toString(){
			printf("Id de la Classe: %s <br/> Nom de la classe: %s",$this->_Id,$this->_Name);			
		}
	}
?>