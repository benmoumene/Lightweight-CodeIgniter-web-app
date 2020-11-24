<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
  <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
  <META HTTP-EQUIV="EXPIRES" CONTENT=0>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gescom 1 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/datatables/dataTables.bootstrap.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- Morris charts -->
  <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/morris.js/morris.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
       <span class="logo-mini"><b>I</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Inix</b>Commercial</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <?php $alerte = $this->session->userdata('alerte');
                      $count = 0;
                    foreach($alerte as $row){
                      $count++;
                    }
              ?>
              <span class="label label-warning"><?php echo $count;?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Vous avez <?php echo $count;?> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php foreach($alerte as $row){
                      echo '<li>
                            <a href="#">
                              <i class="fa fa-users text-aqua"></i>'.$row->CLI_NOM.' '.$row->CLI_PRENOM.'
                              n\'a pas payé depuis 2 semaines
                            </a>
                            </li>';
                    }
                  ?>
                </ul>
              </li>
              <li class="footer"><a href="#">Tout afficher</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('username');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('username');?>
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
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
       <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
    <a href="<?php echo base_url() ?>home/">          
            <i class="fa fa-arrow-down"></i> <span>Ventes</span>
      <span class="pull-right-container">
              <small class="label pull-right bg-yellow">4</small>
            </span>
          </a>
        </li>

        <li>
    <a href="<?php echo base_url() ?>achatlist/">          
            <i class="fa fa-arrow-up"></i> <span>Achats</span>
      <span class="pull-right-container">
              <small class="label pull-right bg-red">4</small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url() ?>categorielist">
            <i class="fa fa-male"></i> <span>Catégories d'Articles</span>
          </a>
        </li>
        <!--li>
          <a href="<?php //echo base_url() ?>articlelist">
            <i class="fa fa-home"></i> <span>Articles
      <span class="pull-right-container">
              <small class="label pull-right bg-blue">3</small>
            </span>
          </a>
        </li-->
        <li>
          <a href="<?php echo base_url() ?>clientlist">
            <i class="fa fa-group"></i> <span>Clients</span>
      <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php echo $this->session->userdata('client');?></small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url() ?>fournisseurlist">
            <i class="fa fa-group"></i> <span>Fournisseurs</span>
      <span class="pull-right-container">
              <small class="label pull-right bg-maroon"><?php echo $this->session->userdata('fournisseur');?></small>
            </span>
          </a>
        </li>
        
        <li>
          <a href="<?php echo base_url() ?>inventairelist/">

            <i class="fa fa-fw fa-database"></i> <span>Stock</span>
      <span class="pull-right-container">
              <small class="label pull-right bg-orange"><?php echo $this->session->userdata('categorie');?></small>
            </span>
          </a>
        </li>

        <?php if($this->session->userdata('role') == 'admin'):?>
             <li><a href="<?php echo base_url() ?>depotlist"><i class="fa fa-book"></i> <span>Dépôts</span></a></li>
              <li><a href="<?php echo base_url() ?>reglementlist"><i class="fa fa-stack-overflow"></i> <span>Règlements Clients</span></a></li>
              <li><a href="<?php echo base_url() ?>reglementfournisseurlist"><i class="fa fa-stack-overflow-o"></i> <span>Règlements Fournisseurs</span></a></li>
        <?php endif;?>
        <!--li>
          <a href="<?php //echo base_url() ?>magasinlist/">

            <i class="fa fa-building-o"></i> <span>Magasins
            </span>
          </a>
        </li-->
        <li>
          <a href="#">
            <i class="fa fa-gear"></i> <span>Paramètres</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>typeClientlist"><i class="fa fa-circle-o"></i> Types de clients</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url() ?>dashbord/getDocumentation"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <?php if($this->session->userdata('role') == 'admin'):?>
              <li><a href="<?php echo base_url() ?>bilan"><i class="fa fa-pie-chart"></i> <span>Bilans</span></a></li>
          <li><a href="<?php echo base_url() ?>depenselist"><i class="fa fa-book"></i> <span>Dépenses</span></a></li>
        <?php endif;?>
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $this->session->userdata('name_eglise');
		 if($this->session->userdata('role') == 'admin'):?>
        <small>Administrateur financier</small>
		<?php else:?>
		<small>Caisse</small>
		<?php endif;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Documentation</li>
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
              <div class="row clearfix">
              <div class="col-md-6">
               <div class="form-group">
                
            </div>
            </div>
              <div class="col-md-6">
			         <div class="form-group">
                <label>Date:</label>

                <div class="input-group">
                  <button type="button" class="btn btn-default" id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Choix de date
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                  <a id="date-search" class="btn btn-maroon"><i class="fa fa-search"></i></a>
                </div>
              </div>
            </div>
            </div>
              <div class="row clearfix">
                        <div class="col-md-6">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#tab_1-1" data-toggle="tab">Tab 1</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">Par Montant</a></li>
              <li><a href="#tab_3-2" data-toggle="tab">Par Quantité</a></li>
              <li class="pull-left header"><i class="fa fa-th"></i> Bilan périodique</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1-1">
                <b>Mode d'utilisation:</b>
                
                </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                <div id="graph-container2" class="container">
                  <canvas id="pieChart2" style="width: 570px; height: 285px;"></canvas>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3-2">
                <div id="graph-container" class="container">
                  <canvas id="pieChart" style="width: 570px; height: 285px;"></canvas>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
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
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <a href="http://inix.com">Inix Inc.</a>.</strong> Tous droits réservés.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url() ?>bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>bower_components/chart.js/Chart.js"></script>
<!--script src="<?php //echo base_url() ?>bower_components/chart.js/chartjs-plugin-doughnutlabel.js"></script-->
<!-- date-range-picker -->
<script src="<?php echo base_url() ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>dist/js/demo.js"></script>

<script>
      $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Aujourd\'hui'       : [moment(), moment()],
          'Hier'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Les 7 derniers jours' : [moment().subtract(6, 'days'), moment()],
          'Les 30 derniers jours': [moment().subtract(29, 'days'), moment()],
          'Ce mois-ci'  : [moment().startOf('month'), moment().endOf('month')],
          'Le mois passé'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    );

      $("#date-search").on('click', function (e){
        e.preventDefault();
        $('#pieChart').remove(); // this is my <canvas> element
        $('#graph-container').append('<canvas id="pieChart"><canvas>');
        $('#pieChart2').remove(); // this is my <canvas> element
        $('#graph-container2').append('<canvas id="pieChart2"><canvas>');
        //alert($('#daterange-btn').data('daterangepicker').startDate.format('YYYY-MM-DD'));
        $.ajax({
            type:'POST',
            url:'<?php echo base_url() ?>bilan/bilanCategorie',
            data:'from='+$('#daterange-btn').data('daterangepicker').startDate.format('DD-MM-YYYY')+'&to='+$('#daterange-btn').data('daterangepicker').endDate.format('YYYY-MM-DD')
        }).done(function (data){
            //alert(data);
            data = jQuery.parseJSON(data);
            
              data[0].forEach(function(item){
              
                var obj = item;
                obj.label = obj.CATEG_DESIGNATION;
                obj.value = obj.CATEG_QUANTITE;
                let text = Math.floor(Math.random()*16777216).toString(16); //256^3
                //text = ('00000')+text.substr(-6);
                text='#'+text.toUpperCase();
                let text2 = Math.floor(Math.random()*16777216).toString(16); //256^3
                //text2 = ('00000')+text2.substr(-6);
                text2='#'+text2.toUpperCase();
                obj.color = text;
                obj.highlight = text2;

                delete obj.CATEG_DESIGNATION;
                delete obj.CATEG_QUANTITE;
                item=obj;

                //alert(item.label);
              });

              data[1].forEach(function(item){
              
                var obj = item;
                obj.label = obj.CATEG_DESIGNATION;
                obj.value = obj.CATEG_MONTANT;
                let text = Math.floor(Math.random()*16777216).toString(16); //256^3
                //text = ('00000')+text.substr(-6);
                text='#'+text.toUpperCase();
                let text2 = Math.floor(Math.random()*16777216).toString(16); //256^3
                //text2 = ('00000')+text2.substr(-6);
                text2='#'+text2.toUpperCase();
                obj.color = text;
                obj.highlight = text2;

                delete obj.CATEG_DESIGNATION;
                delete obj.CATEG_MONTANT;
                item=obj;

                //alert(item.label);
              });          
             //-------------
    //- PIE CHART 1-
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = data[0]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'  
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)



    //- PIE CHART 1-
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas2 = $('#pieChart2').get(0).getContext('2d')
    var pieChart2       = new Chart(pieChartCanvas2)
    var PieData2        = data[1]
    var pieOptions2     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'  
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart2.Doughnut(PieData2, pieOptions2)
        
        });
      });

</script>


</body>
</html>