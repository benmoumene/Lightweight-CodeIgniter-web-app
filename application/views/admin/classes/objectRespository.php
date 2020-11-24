<?php 
	namespace classes;
	use classes\file_parser as fpass,
		classes\Objects\course,
		classes\Objects\lecturer,
		classes\Objects\classe,
		classes\Objects\courseName;
		
	include_once('file_parser.php');
	
	class objectRespository {		
		private $rows;		
		private $user_file;
		private $course_class;
		private $classes;
		private $prof;
		private $coursename;
		private $aData;
		
		
		public function __construct($aData){
			$this->aData = $aData;
			$this->course_class = $this->createObjects('#course');
			$this->classes = $this->createObjects('#classe'); //rooms
			$this->prof = $this->createObjects('#prof');
			$this->coursename = $this->createObjects('#coursename');
			//$this->getClasseCourses(19);
			$this->arrangeCourses();
			//$this->getClasseCourses(19);
			//var_dump($this->course_class);
		}
		
		public function getNameById(array $haystack,$id){
			for($i = 0; $i < count($haystack); $i++){
				if($haystack[$i]['id'] == $id){
					return $haystack[$i]['name'];
				}
			}			
		}
		
		//This function get's all items of a particular hashtag
		public function getAll($tag){
			switch($tag){
				case '#prof':
					return $this->aData[0];
				case '#classe':
				    return $this->aData[1];
				case '#course':
					return $this->aData[3];
				case '#coursename':
					return $this->aData[2];
			}	
		}

		public function getCourse_Classes(){
			return $this->course_class;
		}
		
		public function getClasses(){
			return $this->classes;
		}
		
		public function getLecturers(){
			return $this->prof;
		}
		
		public function getCourseName(){
			return $this->coursename;
		}
		
		private function createObjects($tag){			
			$anArr = $this->getAll($tag);
			$aObj = array();
			for($i = 0;$i <count($anArr); $i++){
				switch($tag){
					case '#prof':
						$aObj[] = new lecturer($anArr[$i]);
						break;
					case '#classe':
						$aObj[] = new classe($anArr[$i]);
						break;
					case '#course':
						$aObj[] = new course($anArr[$i]);
						break;
					case '#coursename':
						$aObj[] = new courseName($anArr[$i]);
						break;
				}
			}
			
			//echo count($aObj);
            //var_dump($aObj);			
			return $aObj;		
		}

        private function arrangeCourses(){
			//var_dump($this->course_class);
			$debut_course_class=0;
			for($i = $debut_course_class;$i <count($this->course_class); $i++){
				try{
					$course = $this->course_class[$i];
					if($course->getDuration()>1){
						$classe = $course->getClasse();
						for($j = 0;$j <count($this->classes); $j++){
							if($this->classes[$j]->getId()==$classe){
								$duration = $course->getDuration();
								if($this->classes[$j]->getHighschool()==1){
								  if($duration>1){
									  $course->setDuration(2);
									  $duration-=2;
										if($duration>0){
											$temp = clone $course;
											$temp->setDuration($duration);
											array_push($this->course_class,clone $temp);
											$debut_course_class = count($this->course_class);
										}
								  }else{
									 $course->setDuration(1); 
								  }
								}else
								{
								  if($duration>1){
									  $course->setDuration(1);
									  $duration-=1;
									  $temp = clone $course;
									  $temp->setDuration($duration);
									  array_push($this->course_class,clone $temp);
									  $debut_course_class = count($this->course_class);
								  }else{
									  $course->setDuration(1);
								  }
								}
								break;
						    }
						}
				    }
					
				}catch(Exception $e){
					echo 'Erreur:'.$e->getMessage();
				}	
			}
		}

		public function getNbCoursClasses(){
			for($i = 0; $i <count($this->classes); $i++){
				$tableau[$i] = 0;
				for($j = 0; $j < count($this->course_class); $j++){
					if($this->course_class[$j]->getClasse() == $i+1)
					$tableau[$i]++; 
				}
			}
			return $tableau;
		}
		
		public function getClasseCourses($k){
			$tableau = array();
			for($j = 0; $j < count($this->course_class); $j++){
				if($this->course_class[$j]->getClasse() == $k)
				$tableau[]=$this->course_class[$j]; 
			}
			var_dump($tableau);
		}
		
	}
?>