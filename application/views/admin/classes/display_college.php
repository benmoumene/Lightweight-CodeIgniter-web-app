<?php
	namespace classes;
	
	class display_college {
		
	private $_classes = array();
	private $_sched = array();	
	private $_lecturer = array();
	private $_courseName = array();
	private $_classe = array();
	private $_lectures = array();
	
	public function __construct(array $s,array $c,$objectRepo){		
		$this->_classes = $c;		
		$this->_sched = $s;
		
		$ob = $objectRepo;
		
		$this->_classe = $ob->getClasses();
		$this->_lecturer = $ob->getLecturers();
		$this->_courseName = $ob->getCourseName();
		$this->_lectures = $ob->getCourse_Classes();
		$this->create_css();
	}	
	
	private function create_css(){
		$css = '<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <title>LyCoP - Planificateur de cours pour collèges et lycées</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/ui/jquery-ui.min.css">
        <script src="<?php echo base_url() ?>bootstrap/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>bootstrap/ui/jquery-ui.min.js" type="text/javascript"></script>

        <!-- Latest compiled and minified JavaScript -->

    </head><body>';
		echo $css;
	}
	
	private function startTable(){		
		echo '<table class="table table-responsive table-bordered">';
	}
	
	private function endTable(){
		echo '</tbody></table>';
	}
	
	public function populateClasses($k){
		$pos = 0;
		for($u = 0; $u < 5; $u++){
			for($v = 0; $v < 5; $v++){ // 7 pour lycée
				$clsRoom[$u][$v] = $this->_classes[$k][$pos];
				$pos++;			
			}			
		}
		//var_dump($clsRoom);
		return $clsRoom;
	}
	
	public function inputCourses(){
		setLocale(LC_TIME, 'fr_FR.UTF8','fra');
            for($u =0;$u<13;$u++){
				$cl_det = '<table align="center"><thead>';
				$cl_det .= '<tr align="center"><th colspan="2">';			 
				$cl_det .= '<h3>Classe: '.$this->_classe[$u]->getName().'</h3></th></tr></thead>';
				$cl_det .= '</table>';
				echo $cl_det;		
				$this->startTable();
				echo '<thead><tr><th>Jour/Heure</th>';
				for($v=1;$v<8;$v++){
					echo '<th>'.$v.' e h</th>';
				}
				
				echo '</tr></thead><tbody>';
					for($i=0;$i<5;$i++){
						echo '<tr class=bg-primary><td><h4>'.strftime('%a',mktime(0,0,0,0,$i)).'</h4></td>';
						for($j=1;$j<6;$j++){ //8 pour lycée
						echo '<td><h3>'.$this->getCourseComponents($this->populateClasses($u)[$i][$j-1],0).'</h3></td>';
						}
						echo '<td></td><td></td>';
						echo '</tr>';
					}
			}
			echo '</tbody>';
			$this->endTable();
			echo '</body>';
		}
	
	private function brkLine(){
		return '<br/>';
	}
	
	private function getClasse($grps){
		$stdGroup = array();
		$grp_arr = array();
		$result = '';
		
		if(substr_count($grps,'-') != 0){	
			$stdGroup = explode('-',$grps);
		}
		else{
			$stdGroup[] = $grps;
		}
		
		foreach($stdGroup as $g){
			$grp_arr[] = $this->_classe[(int)$g-1]->getName();			
		}
		return implode('|',$grp_arr);
	}
	
	private function getCourseComponents($course,$cls){
		if(is_object($course)){
		$c = $this->_courseName[($course->getCourseName()-1)]->getCode().'/';
		$c .= $this->sortLecturers($course);
		}else{
			return '';
		}
		
		//$c .= '<b>Classe:  </b>'.$this->getClasseName($course->getClasse());
		return $c;
	}

	private function sortLecturers($c){
		if(is_object($c)){
			$bunch = $c->getProf();

			if(substr_count($bunch,'-') != 0){
				$bunch = explode('-',$bunch);
			}
			else{
				$a = $bunch;
				$bunch = array();
				$bunch[] = $a;
			}
			$l = '';

			foreach($bunch as $k){
				$l .= $this->_lecturer[ $k-1 ]->getCode() .',';		
				
			}		
			$l = substr_replace($l, '', strlen($l)-1);	
		}else{
			return '';
		}
		return $l;
	}
		
}
?>
