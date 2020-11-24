<?php
	namespace classes;
	
	class fitnessFixedConstraint {
	
		private $_classes = array();
		private $_ob;
		private $_classe;
		private $_num_of_classes;
		
		public function __construct(array $c,$cl_count,$objectRepo){		
			$this->_classes = $c;
			$this->_ob = $objectRepo;
			$this->_classe = $this->_ob->getClasses();
			$this->_num_of_classes = $cl_count;
		}			
	
	/*
	|--------------------------------------------------------------------------
	|	Consecutive Hours 
	|--------------------------------------------------------------------------
	|	This function checks if the current lecture is being held at thesame venue for the entire duration.
	|	It increases the score if the class is held at thesame venue for the duration and doesn't if the class does not.
	*/
		public function consecutiveHours($s){
			$cnt = 0;	
			$clsDurationCount = 0;
			$score_counter = 0;
			
			foreach($this->_classes as $k => $v){
				foreach($v as $p => $c){				
					$crses = array_slice($s[$k],$p,$c->getDuration());	//Remove the number of elements for the duration in the array
					if(count($crses) == $c->getDuration()){
						$score_counter++;
					}
				}
			}
			//echo $score_counter;
			return $score_counter;			
		}
	/*
	|--------------------------------------------------------------------------
	|	Clashing Classes 
	|--------------------------------------------------------------------------
	|	This function checks the students and lecturers that have classes that clash with other classes
	|	It increases the score if the class don't clash and doesn't if the class clashes.
	*/
		public function clashingClasses($tag){
			$score_counter = $this->_num_of_classes;	
			$totalClash = 0;
			$stdGroup = '';
			$buff = '';
			//echo 'count'.count($this->_classes);
			foreach($this->_classes as $k => $v){
				$clss = array(); //Declare array for each of the other classes we are comparing
                //var_dump($v); 				
				if($this->classToCompare($k) == null){
					break;
				}
				$clss = $this->classToCompare($k);
				
					for($i=0;$i<count($clss)-1;$i++){	//for each class found for comparison
					
						$intersect = array_intersect_key($v,$this->_classes[$clss[$i]]); //check if any of the keys match, since key represent time
						
						if($intersect != null){	//if any of the keys match
                            //$t = 0;						
							foreach($intersect as $ke => $va){									
								if($tag == '#prof'){ //If lecturers with clashes
									$buff = $this->lecturerToCompare($clss[$i],$k,$ke);
									//echo $t++;
								}					
								elseif($tag == '#classe'){	//if students with clashes
									$buff = $this->studentToCompare($clss[$i],$k,$ke);
								}								
								$st = $buff[0];	//The student group or lecturer we are comparing against								
								if(substr_count($buff[1],'-') != 0){	
									$stdGroup = explode('-',$buff[1]);	
								}
								else{
									$stdGroup[] = $buff[1];
								}
                                //$this->sameDayToCompare();								
								/*foreach($stdGroup as $s){
									if(substr_count($st,$s) != 0){	//if the student or lecturer group number exists
										$totalClash++;			//Total number of clashes
										break;
									}
								}*/
							}
						}						
					}				
			}				
				return $score_counter - $totalClash;										
		}

		private function classToCompare($cur_class){
			$clss = array();
			switch($cur_class){
				case 0:
				   for($i=1;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 1:
				   for($i=2;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 2:
				   for($i=3;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 3:
				   for($i=4;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 4:
				   for($i=5;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 5:
				   for($i=6;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 6:
				   for($i=7;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
			    case 7:
				   for($i=8;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 8:
				   for($i=9;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 9:
				   for($i=10;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 10:
				   for($i=11;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 11:
				   for($i=12;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 12:
				   for($i=13;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 13:
				   for($i=14;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 14:
				   for($i=15;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 15:
				   for($i=16;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
			    case 16:
				   for($i=17;$i<19;$i++){
				       $clss[] = $i;	//if first class then we compare to second and third
				   }
				   break;
				case 17:
				   $clss[] = 18;	//if first class then we compare to second and third
				   break;
				case 18:
				   $clss[] = null;	//if first class then we compare to second and third
				   break;
			}	   
			return $clss;
		}
		
		private function studentToCompare($class_to_comp,$cur_class,$time){
			$buff = array();
			$st = $this->_classes[$class_to_comp][$time]->getClasse();	
			$stdGroup = $this->_classes[$cur_class][$time]->getClasse();				
			$buff[] = $st;
			$buff[] = $stdGroup;
			return $buff;
		}
		
		private function lecturerToCompare($class_to_comp,$cur_class,$time){
			$buff = array();
			$lct = $this->_classes[$class_to_comp][$time]->getProf();	//Get the lecturer at the intersection
			$lctGroup = $this->_classes[$cur_class][$time]->getProf();	//Get the lecturer at the current time
			$buff[] = $lct;
			$buff[] = $lctGroup;
			return $buff;
		}
		
        private function sameDayToCompare($class_to_comp,$cur_class,$time){
			$buff = array();
			$firstDay = $this->_classes[$class_to_comp][$time]->getHour();	//Get the lecturer at the intersection
			$secondDay = $this->_classes[$cur_class][$time]->getHour();	//Get the lecturer at the current time
			$buff[] = $firstDay;
			$buff[] = $secondDay;
			return $buff;
		}		
	}
?>