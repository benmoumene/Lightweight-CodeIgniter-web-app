<?php
	namespace classes;
	
	class display {
		
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
		//var_dump($this->_classe);
		$this->_lecturer = $ob->getLecturers();
		$this->_courseName = $ob->getCourseName();
		$this->_lectures = $ob->getCourse_Classes();
		$this->create_css();
	}	
	
	private function create_css(){
		$css = '<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; charset="windows-1252">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IncApp 1 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/skins/_all-skins.min.css">
<!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-icons/font-awesome/css/font-awesome.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head><body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Inc</b>App</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Frère Faustin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Frère Faustin - Comptable
                  <small>Membre depuis Nov. 2018</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url() ?>auth/change_password" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url() ?>admin/logout" class="btn btn-default btn-flat">Se Déconnecter</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Frère Faustin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Connecte</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">NAVIGATION PRINCIPALE</li>
        <?php if($this->session->userdata('role') == 'admin'):?><li class="treeview">
          <a href="<?php echo base_url() ?>">
            <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="active">
          <a href="<?php echo base_url() ?>dashbord/">
            <i class="fa fa-money"></i> <span>ventes</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>dashboard">
            <i class="fa fa-calendar"></i> <span>Evenements</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>articlelist">
            <i class="fa fa-home"></i> <span>articles</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>Categorielist">
            <i class="fa fa-group"></i> <span>Categories</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>Categorielist">
            <i class="fa fa-gear"></i> <span>Paramètres</span>
          </a>
        </li>
        <li><a href="#"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Emploi du temps(Ctrl+P pour imprimer ou enregistrer)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Emploi du temps</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row clearfix">
	  <div class="col-xs-12">
		<div class="box">
            <div class="box-header">
             
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
            ';
		echo $css;
	}
	
	private function startTable(){		
		echo '<table class="table table-responsive table-striped table-bordered">';
	}
	
	private function endTable(){
		echo '</tbody></table>';
	}
	
	function myShuffle($arr){
		$keys = array_keys($arr);
		shuffle($keys);
		$result = array();
		foreach($keys as $k => $key){
			$result[$key] = $arr[$k];
		}
		//var_dump($result);
		return $result;
	}
	
	public function populateClasses($k){
		//var_dump($this->_classes);
		$pos = 0;
		for($u = 0; $u < 5; $u++){
			for($v = 0; $v < 5; $v++){ // 7 pour lycée
				$clsRoom[$u][$v] = $this->_classes[$k][$pos];
				$pos++;			
			}			
		}
		$clsRoom = $this->myShuffle($clsRoom);
		return $clsRoom;
	}
	
	public function cleanClasses($k){
		//$pos = 0;
		$nbCourses=count($this->_classes[$k]);
        for($i=0;$i<$nbCourses;$i++){
			if(is_object($this->_classes[$k][$i])){
				if($this->_classes[$k][$i]->getDuration()==2){
					for($j=0;$j<count($this->_classes[$k]);$j++){
						if(!is_object($this->_classes[$k][$j])){
							$this->_classes[$k][$j] = $this->_classes[$k][$i];
							//echo $i.'--'.$j.'<br/>';
							break;
						}
					}
				}
			}
			if($i==16)
				break;
		}
		//var_dump($this->_classes[$k]);
	}
	
		public function refineClasses($k){
		//$pos = 0;
		$nbCourses=count($this->_classes[$k]);
        for($i=0;$i<$nbCourses;$i++){
			if($i%7!=0&&$i%7!=4&&$i%7!=6){
				if(is_object($this->_classes[$k][$i])){
					if($this->_classes[$k][$i]->getDuration()==2){
						if(is_object($this->_classes[$k][$i])&&
							!($this->_classes[$k][$i-1]==$this->_classes[$k][$i])
							&&!($this->_classes[$k][$i+1]==$this->_classes[$k][$i])){
							for($j=0;$j<count($this->_classes[$k]);$j++){
								if(is_object($this->_classes[$k][$j])&&
								$this->_classes[$k][$j]==$this->_classes[$k][$i]){
									$temp = $this->_classes[$k][$j];
									$this->_classes[$k][$j] = $this->_classes[$k][$i+1];
									$this->_classes[$k][$i+1] = $temp;
									//echo $i.'--'.$j.'<br/>';
									break;
								}
							}
						}
					}
				}
				if($i==16)
					break;
				}
		    }
		//var_dump($this->_classes[$k]);
	    }
	
	public function populateClasses2($k){
		$this->cleanClasses($k);
		$this->refineClasses($k);
		$clsRoom = array();
		$pos = 0;
		for($u = 0; $u < 5; $u++){
			for($v = 0; $v < 7; $v++){ // 7 pour lycée
			     $clsRoom[$u][$v] = $this->_classes[$k][$pos];
				 $pos++;			
			}			
		}
		/*$cpt = 0;
		if(7 < count($clsRoom[4])){
			for($u = 0; $u < 5; $u++){
				for($v = 0; $v < 7; $v++){ // 7 pour lycée
					if(!is_object($clsRoom[$u][$v])){
					   $clsRoom[$u][$v] = $clsRoom[4][6+$cpt];
					}			
				}			
		    }
			$cpt++;
		}
		//$clsRoom = $this->myShuffle($clsRoom);
		
		//echo $k.'</br>';*/
		//if($k==18)
		//var_dump($clsRoom);
		return $clsRoom;
	}
	
	public function inputCourses(){
		//$this->cleanClasses(18);
		setLocale(LC_TIME, 'fr_FR.UTF8','fra');
            for($u =0;$u<19;$u++){
				if($u < 13){
					$course[$u] = $this->populateClasses($u);
				}else{
					$course[$u] = $this->populateClasses2($u);
				}
				$cl_det = '<table align="center"><thead>';
				$cl_det .= '<tr align="center"><th colspan="2">';			 
				$cl_det .= '<h3>Classe: '.$this->_classe[$u]->getName().'</h3></th></tr></thead>';
				$cl_det .= '</table>';
				echo $cl_det;
                //echo $u;				
				$this->startTable();
				echo '<thead><tr><th>Jr/Hr</th>';
				for($v=1;$v<8;$v++){
					echo '<th>'.$v.'e h</th>';
				}
				
				echo '</tr></thead><tbody>';
					for($i=0;$i<5;$i++){
						echo '<tr><td><h4>'.strftime('%a',mktime(0,0,0,0,$i)).'</h4></td>';
						if($u < 13){
							for($j=1;$j<6;$j++){ //8 pour lycée
								echo '<td><h4>'.$this->getCourseComponents($course[$u][$i][$j-1],0).'</h4></td>';
							}
							echo '<td></td><td></td>';
						}else{
							for($j=1;$j<8;$j++){ //8 pour lycée
								echo '<td><h4>'.$this->getCourseComponents($course[$u][$i][$j-1],0).'</h4></td>';	
						    }
						}
						echo '</tr>';
					}
			}
			echo '</tbody>';
			$this->endTable();
			echo '</div>
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->
				</div>
				<!-- ./col -->
			  </div>
			  <!-- /.row -->
			  <!-- Main row -->
			  <div class="row">

				<!-- right col -->
			  </div>
			  <!-- /.row (main row) -->

			</section>
			<!-- /.content -->
		  </div>
		  <!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge(\'uibutton\', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script --><!-- datepicker -->
<script src="<?php echo base_url() ?>plugins/datepicker/bootstrap-datepicker.js"></script>

<!-- SlimScroll -->
<script src="<?php echo base_url() ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>dist/js/demo.js"></script>

			</body>
			';
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
			//echo 'Not an object';
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
