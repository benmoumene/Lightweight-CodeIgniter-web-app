<?php 
	namespace classes\Objects;
	use classes\Objects\Inheritables\abstractObjectFactory;
	
	include_once('Inheritables\abstractObjectFactory.php');
	
	class course {		
		
		private $_prof;
		private $_duration;	
		private $_course_name;
		private $_classe;
		
		public function __construct(array $f){
			//parent::__construct($f['id'],$f['name']);			
			$this->_prof = $f['prof'];
			$this->_course_name = $f['courseName'];
			$this->_duration = $f['duration'];
			$this->_classe = $f['classe'];		
		}
		
		public function getProf(){
			return $this->_prof;
		}
		
		public function setProf($p){
			$this->_prof = $p;
		}

		public function getCourseName(){
			return $this->_course_name;
		}
		
		public function getDuration(){
			return (int)$this->_duration;
		}
		
		public function setDuration($d){
			$this->_duration = $d;
		}
		
		public function setClasse($r){
			$this->_classe = $r;
		}
		
		public function getClasse(){
			return $this->_classe;
		}
		
		public function toString(){
			printf("Prof: %s <br/> Nom du cours: %s <br/> Durée du cours: %s Hours <br/>  Classe: %s",
											$this->_prof,$this->_course_name,$this->_duration,$this->_classe);			
		}
	}
?>