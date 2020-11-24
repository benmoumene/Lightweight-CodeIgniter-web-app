<?php 
define('CLASS_DIR','classes\\');
define('OBJECT_DIR','classes\\Objects\\');
$cls_files = array(CLASS_DIR.'randomGenerator',
					OBJECT_DIR.'lecturer',
					OBJECT_DIR.'classe',
					OBJECT_DIR.'course',
					CLASS_DIR.'objectRespository',
					CLASS_DIR.'fitnessFixedConstraint',
					CLASS_DIR.'hospital',
					CLASS_DIR.'display',
					CLASS_DIR.'display_college',
					CLASS_DIR.'display_lycee',
					OBJECT_DIR.'courseName');

function file_includer($fl){
	for($i =0;$i<count($fl);$i++){
		include_once($fl[$i].'.php');
	}
}
file_includer($cls_files);
?>



<?php  
use	classes\randomGenerator,
	classes\Objects\lecturer,
	classes\Objects\classe,
	classes\Objects\course,
	classes\objectRespository,
	classes\fitnessFixedConstraint,
	classes\hospital,
	classes\display,
	classes\Objects\courseName;
	
class index {	
	
	const DAYS_OF_WEEK = 5;
	const HOURS_PER_DAY_SECONDARY = 5;
	const HOURS_PER_DAY_HIGHSCHOOL = 7;
	const NBRE_DE_CLASSES = 19;
	
	const CLASSE_1 = 0;
	const CLASSE_2 = 1;
	const CLASSE_3 = 2;
	const CLASSE_4 = 3;
	const CLASSE_5 = 4;
	const CLASSE_6 = 5;
	const CLASSE_7 = 6;
	const CLASSE_8 = 7;
	const CLASSE_9 = 8;
	const CLASSE_10 = 9;
	const CLASSE_11 = 10;
	const CLASSE_12 = 11;
	const CLASSE_13 = 12;
	const CLASSE_14 = 13;
	const CLASSE_15 = 14;
	const CLASSE_16 = 15;
	const CLASSE_17 = 16;
	const CLASSE_18 = 17;
	const CLASSE_19 = 18;

	private $file_location;
	private $ob;
	private $schedule_type;

	public function __construct($aData){
		$this->aData = $aData;
	}

	public function rndGen($min_x,$max_x,$qty){
		$rnds = randomGenerator::generate($min_x,$max_x,$qty);
		return $rnds;
	}	

	private function brkLine(){
		echo '<br/>';
	}
	
	private function echoBrkLine($a){
		echo $a.$this->brkLine();
	}
	
	private function map_class_to_hours($cls_hours){
		$sched = array(	self::CLASSE_1 => array(),
						self::CLASSE_2 => array(),
						self::CLASSE_3 => array(),
						self::CLASSE_4 => array(),
						self::CLASSE_5 => array(),
						self::CLASSE_6 => array(),
						self::CLASSE_7 => array(),
						self::CLASSE_8 => array(),
						self::CLASSE_9 => array(),
						self::CLASSE_10 => array(),
						self::CLASSE_11 => array(),
						self::CLASSE_12 => array(),
						self::CLASSE_13 => array(),
						self::CLASSE_14 => array(),
						self::CLASSE_15 => array(),
						self::CLASSE_16 => array(),
						self::CLASSE_17 => array(),
						self::CLASSE_18 => array(),
						self::CLASSE_19 => array());
						
		for($i=0; $i < count($cls_hours); $i++){
			for($j = 0;$j<count($cls_hours[$i]); $j++){
				if(is_object($cls_hours[$i][$j])){
					   $sched[$i][$j] = $cls_hours[$i][$j];
					   $temp = $j;
					   $j+=$sched[$i][$j]->getDuration()-1;
					   if($temp!=$j){
						$sched[$i][$j] = $cls_hours[$i][$temp];
					   }
				}
			}
		}
		
		//var_dump($cls_hours);
		//echo'---------------------------------';
		//var_dump($sched);
		
		return $sched;
		
	}
	
	public function initialise_schedule(){//'C:\wamp\www\Ga_time_table\config.csv'
		$t_space_secondary = self::DAYS_OF_WEEK * self::HOURS_PER_DAY_SECONDARY;
        $t_space_highschool = self::DAYS_OF_WEEK * self::HOURS_PER_DAY_HIGHSCHOOL; 		
		$this->ob = new objectRespository($this->aData);				
		$nb_cours_classe = $this->ob->getNbCoursClasses();
		//var_dump($nb_cours_classe);
        $clsRoom = array(self::CLASSE_1 => array(),
						self::CLASSE_2 => array(),
						self::CLASSE_3 => array(),
						self::CLASSE_4 => array(),
						self::CLASSE_5 => array(),
						self::CLASSE_6 => array(),
						self::CLASSE_7 => array(),
						self::CLASSE_8 => array(),
						self::CLASSE_9 => array(),
						self::CLASSE_10 => array(),
						self::CLASSE_11 => array(),
						self::CLASSE_12 => array(),
						self::CLASSE_13 => array(),
						self::CLASSE_14 => array(),
						self::CLASSE_15 => array(),
						self::CLASSE_16 => array(),
						self::CLASSE_17 => array(),
						self::CLASSE_18 => array(),
						self::CLASSE_19 => array());
						 
		$schedule = $clsRoom; //DRY concept (don't repeat yourself)
		
		$randNums = $clsRoom;
		
		$randNums[self::CLASSE_1] = $this->rndGen(0,$t_space_secondary,$nb_cours_classe[0]); //Generate 35 random numbers
		$randNums[self::CLASSE_2] = $this->rndGen(0,$t_space_secondary,$nb_cours_classe[1]);
		$randNums[self::CLASSE_3] = $this->rndGen(0,$t_space_secondary,$nb_cours_classe[2]);
		$randNums[self::CLASSE_4] = $this->rndGen(0,$t_space_secondary,$nb_cours_classe[3]); //Generate 35 random numbers
		$randNums[self::CLASSE_5] = $this->rndGen(0,$t_space_secondary,$nb_cours_classe[4]);
		$randNums[self::CLASSE_6] = $this->rndGen(0,$t_space_secondary,$nb_cours_classe[5]);
		$randNums[self::CLASSE_7] = $this->rndGen(0,$t_space_secondary,$nb_cours_classe[6]); //Generate 35 random numbers
		$randNums[self::CLASSE_8] = $this->rndGen(0,$t_space_secondary,$nb_cours_classe[7]);
		$randNums[self::CLASSE_9] = $this->rndGen(0,$t_space_secondary,$nb_cours_classe[8]);
		$randNums[self::CLASSE_10] = $this->rndGen(0,$t_space_secondary,$nb_cours_classe[9]); //Generate 35 random numbers
		$randNums[self::CLASSE_11] = $this->rndGen(0,$t_space_secondary,$nb_cours_classe[10]);
		$randNums[self::CLASSE_12] = $this->rndGen(0,$t_space_secondary,$nb_cours_classe[11]);
		$randNums[self::CLASSE_13] = $this->rndGen(0,$t_space_secondary,$nb_cours_classe[12]); //Generate 35 random numbers
		
		
		$randNums[self::CLASSE_14] = $this->rndGen(0,$t_space_highschool,$nb_cours_classe[13]);
		$randNums[self::CLASSE_15] = $this->rndGen(0,$t_space_highschool,$nb_cours_classe[14]);
		$randNums[self::CLASSE_16] = $this->rndGen(0,$t_space_highschool,$nb_cours_classe[15]); //Generate 35 random numbers
		$randNums[self::CLASSE_17] = $this->rndGen(0,$t_space_highschool,$nb_cours_classe[16]);
		$randNums[self::CLASSE_18] = $this->rndGen(0,$t_space_highschool,$nb_cours_classe[17]);
		$randNums[self::CLASSE_19] = $this->rndGen(0,$t_space_highschool,$nb_cours_classe[18]);
		
		//clsRoom equals courses
		
		$clsRoom[self::CLASSE_1] = array_fill(0,$t_space_secondary,0);	//Fill each room with 0's 
		$clsRoom[self::CLASSE_2] = array_fill(0,$t_space_secondary,0);
		$clsRoom[self::CLASSE_3] = array_fill(0,$t_space_secondary,0);
		$clsRoom[self::CLASSE_4] = array_fill(0,$t_space_secondary,0);	//Fill each room with 0's 
		$clsRoom[self::CLASSE_5] = array_fill(0,$t_space_secondary,0);
		$clsRoom[self::CLASSE_6] = array_fill(0,$t_space_secondary,0);
		$clsRoom[self::CLASSE_7] = array_fill(0,$t_space_secondary,0);	//Fill each room with 0's 
		$clsRoom[self::CLASSE_8] = array_fill(0,$t_space_secondary,0);
		$clsRoom[self::CLASSE_9] = array_fill(0,$t_space_secondary,0);
		$clsRoom[self::CLASSE_10] = array_fill(0,$t_space_secondary,0);	//Fill each room with 0's 
		$clsRoom[self::CLASSE_11] = array_fill(0,$t_space_secondary,0);
		$clsRoom[self::CLASSE_12] = array_fill(0,$t_space_secondary,0);
		$clsRoom[self::CLASSE_13] = array_fill(0,$t_space_secondary,0);	//Fill each room with 0's
		
		$clsRoom[self::CLASSE_14] = array_fill(0,$t_space_highschool,0);
		$clsRoom[self::CLASSE_15] = array_fill(0,$t_space_highschool,0);
		$clsRoom[self::CLASSE_16] = array_fill(0,$t_space_highschool,0);	//Fill each room with 0's 
		$clsRoom[self::CLASSE_17] = array_fill(0,$t_space_highschool,0);
		$clsRoom[self::CLASSE_18] = array_fill(0,$t_space_highschool,0);		
		$clsRoom[self::CLASSE_19] = array_fill(0,$t_space_highschool,0);
		
		//383 éléments course_classe
		
		$course_class = $this->ob->getCourse_Classes();	//Get the lectures
		$classes = $this->ob->getClasses();
		
		for($u = 0; $u < count($classes); $u++){
			$pos = 0;
			if($u<13){
				for($v = 0; $v < $t_space_secondary; $v++){
					for($i = $pos; $i < count($course_class); $i++){
						$classe = $course_class[$i]->getClasse();		
						if(($u+1)==$classe){
							$clsRoom[$u][$v] = $course_class[$i];// si duration = 2 décaler
							$pos = $i+1;
							break;
						}
					}				
				}
			}else{
				for($v = 0; $v < $t_space_highschool; $v++){
					for($i = $pos; $i < count($course_class); $i++){
						$classe = $course_class[$i]->getClasse();		
						if(($u+1)==$classe){
							$clsRoom[$u][$v] = $course_class[$i];// si duration = 2 décaler
							$pos = $i+1;
							break;
						}
					}				
				}
			}				
		}
		
		//------------------------------------------------------------------------
		//------------------------------------------------------------------------
		/*for($i = 0; $i < count($course_class); $i++){
			$buff = array();
			$test = array();
					
			$dur = $course_class[$i]->getDuration();				
			$cls = rand()%19;	
			$time = abs($randNums[$cls][$i]);					
			//var_dump($randNums[$cls]);
			echo $time.'</br>';
			while(is_object($clsRoom[$cls][$time])){
				if($cls < 13){
					$time = rand()%30;
			    }else{
					$time = rand()%40;
				}
				if(!is_object($clsRoom[$cls][$time])){
						break;
				}
			}

			$buff = $clsRoom[$cls];
			$test = array_fill(0,$dur,$course_class[$i]);			
			array_splice($buff,$time,0,$test);
			$clsRoom[$cls] = $buff;						
		}*/
		
		//var_dump($clsRoom[18]);
		$schedule = $this->map_class_to_hours($clsRoom);
		//var_dump($schedule);
		//var_dump($schedule[18]);
		$fit = $this->calculateFitness($schedule,$clsRoom,count($course_class));		
		$dr = new hospital();	
		$generations = 1;	//Initial generation is the first generation
		$crossovers = 0;
		$elite = array();	//Store the elite, any chromosome above 0.95
		$mutations = 0;
		$new_fit = 0;
		//var_dump($clsRoom[18]);
		/*while(($fit >= 1) || ($generations < 1000)){
			$dr->set_class_hours($clsRoom);
			$dr->set_schedule($schedule);
			
			if($generations == 1 || rand()%3 == 2){				
				$dr->do_crossover();
				$copy_cls_hrs = $dr->get_class_hours();
				$copy_cls_sch = $dr->get_schedule();
				$new_fit = $this->calculateFitness($copy_cls_sch,$copy_cls_hrs,count($course_class));
				$crossovers++;	
			}
			
			if(rand()%3 == 2){	//Perform mutation
				$dr->mutation();
				$mutations++;
			}
			
			if($new_fit > $fit){
				if($fit >= 0.95){
					$elite[] = $clsRoom;
				}
				$schedule = $copy_cls_sch;
				$clsRoom = $copy_cls_hrs;
				$fit = $new_fit;	
			}	
			$generations++;			
		}*/
		//echo '<h2 style="font-align:center"><u> Fitness Statistics </u></h2>';
		$fit = $this->calculateFitness($schedule,$clsRoom,count($course_class),true);
		
		//$this->brkLine();
		//$this->echoBrkLine('Chromosomes Elus: '.count($elite));
		//$this->brkLine();
		//$this->echoBrkLine('Nombre de Generations: '. $generations);
		//$this->brkLine();
		//$this->echoBrkLine('Nombre de Croisements: '. $crossovers);
		//$this->brkLine();
		//$this->echoBrkLine('Nombre de Mutations: '. $mutations);		
		
		$ds = new display($schedule,$clsRoom,$this->ob);		
		$ds->inputCourses();	
	}
	
	private function calculateFitness($schedule_array,$class_hours_array,$number_of_courses,$rpt=false){
		$schScore =0;
		$fit = new fitnessFixedConstraint($schedule_array,$number_of_courses,$this->ob);		
		//$schScore += $fit->consecutiveHours($class_hours_array); 
		$schScore += $fit->clashingClasses('#classe'); 		
		$schScore += $fit->clashingClasses('#prof'); 		
		if($rpt == true){
			//$this->echoBrkLine('Consecutive Hours: '. $fit->consecutiveHours($class_hours_array));
			//$this->echoBrkLine('Clashing course students: '.$fit->clashingClasses('#classe'));
			//$this->echoBrkLine('Clashing course lecturers: '.$fit->clashingClasses('#prof'));
			//$this->echoBrkLine('Total Courses = '.$number_of_courses);
			//$this->echoBrkLine('Fitness Score = ' .$schScore/($number_of_courses * self::DAYS_OF_WEEK));
		}
        //echo $number_of_courses;
		return ($schScore/($number_of_courses * self::DAYS_OF_WEEK));
	}
	
	private function get_lecturer_count(){		
		$lecturers = $this->ob->getLecturers();
		$lect_count = 0;
		foreach($lecturers as $k => $p){
			$lect_count++;
		}
		return $lect_count;
	}
}
        $aData = array();
        $aProf = array();
		$aClasse = array();
		$aCoursename = array();
		$aCourse = array();
		$db = mysqli_connect('localhost', 'root', '', 'timetable_db');
		$prof = mysqli_query($db,"SELECT * FROM professor");
		$classe = mysqli_query($db,"SELECT * FROM classe");
		$coursename = mysqli_query($db,"SELECT * FROM courseName");
		$course = mysqli_query($db,"SELECT classe , courseName, prof, duration
                            FROM course INNER JOIN coursename_classe ON course.coursenameClasse = coursename_classe.id
                           ");
		while($ligne = mysqli_fetch_assoc($prof)){
			 $aProf[] = $ligne;
			 //var_dump($ligne);
        }
		
        while($ligne = mysqli_fetch_assoc($classe)){
			$aClasse[] = $ligne;
        }
		
		while($ligne = mysqli_fetch_assoc($coursename)){
            
			$aCoursename[] = $ligne;
        }
		while($ligne = mysqli_fetch_assoc($course)){
            
		    $aCourse[] = $ligne;
        }
		
		//var_dump($aCourse);
		
		//var_dump($aProf);
		
		mysqli_free_result($prof);
		mysqli_free_result($classe);
		mysqli_free_result($coursename);
		mysqli_free_result($course);
		
		$aData[0] = $aProf;
		$aData[1] = $aClasse;
		$aData[2] = $aCoursename;
		$aData[3] = $aCourse;
		
    	$start_time = microtime(true);
		$start_memory = memory_get_peak_usage(false);

		$id = new index($aData);
		$id->initialise_schedule();
		
		$end_memory = memory_get_peak_usage(false);
		$end_time = microtime(true);
	
?>