<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
  <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
  <META HTTP-EQUIV="EXPIRES" CONTENT=0>
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
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/UX/select2.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/UX/select2-bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/ui/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap-editable.css" rel="stylesheet"/>

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
              <span class="hidden-xs">Fr??re Faustin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Fr??re Faustin - Comptable
                  <small>Membre depuis Nov. 2018</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url() ?>admin/logout" class="btn btn-default btn-flat">Se D??connecter</a>
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
          <p>Fr??re Faustin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Connect??</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">NAVIGATION PRINCIPALE</li>
        <?php if($this->session->userdata('role') == 'admin'):?><li class="treeview">
          <a href="<?php echo base_url() ?>home/">
            <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
		<?php endif;?>
        <li class="active ">
          <a href="<?php echo base_url() ?>dashbord/">
            <i class="fa fa-money"></i> <span>ventes</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>categorielist">
            <i class="fa fa-male"></i> <span>categories</span>
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
          <a href="#">
            <i class="fa fa-gear"></i> <span>Param??tres</span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>typeventelist"><i class="fa fa-circle-o"></i> Types de ventes</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url() ?>dashbord/getDocumentation"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
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
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class=""><a href='<?php echo base_url() ?>dashbord'>Tableau de bord</a></li>
        <li class="active">Recherche avanc??e</li>
      </ol>
	  <div id="ret">
            
            </div>
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
		<div class="col-md-12 column">
                    <div class="form-inline" role="form" style="border-bottom: 1px solid #ddd; padding-bottom: 70px; margin-bottom: 10px;">
                        
						 <div class="form-group">
                            <div class="input-group">
                                <select class="form-control" placeholder="No de compte" id='nocompte' name="nocompte">
                                    <option value=""></option>
									<?php foreach ($query->result() as $row): ?>
                                    <option value="<?=$row->id ?>"><?=$row->no_cpte ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit" id='nocompte-search'><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>                              
                        </div> <!-- form group [rows] -->
						
						<div class="form-group">
                            <div class="input-group">
                                <select class="form-control" placeholder="Nom du article" id='item' name="item">
                                    <option value=""></option>
									<?php foreach ($query->result() as $row): ?>
                                    <option value="<?=$row->id ?>"><?=$row->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit" id='item-search'><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>                              
                        </div> <!-- form group [rows] -->
                        
						<div class="form-group">
                            <div class="input-group">
                                <select class="form-control" placeholder="Type de vente" id='classe' name="classe">
                                    <option value=""></option>
									<?php foreach ($query2->result() as $row): ?>
                                    <option value="<?=$row->id ?>"><?=$row->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit" id='classe-search'><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>                              
                        </div> <!-- form group [rows] -->
						
                        <div class="pull-right">
                        <div class="form-group">
                            <label>Du</label>
                            <input type="text" class="form-control" id='from' placeholder="Date de d??but" name="from">
                        </div><!-- form group [search] -->
                        <div class="form-group">
                            <label>au</label>
                            <input type="text" class="form-control" id='to' placeholder="Date de fin" name="to">                         
                            <button class="btn btn-default" type="submit" id='date-search'><i class="glyphicon glyphicon-search"></i></button>
                        </div> <!-- form group [order by] --> 
                        </div>
                    </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>S. NO.</th><th>article</th><th>Categorie</th><th>T. de vente</th><th>Valeur</th><th>Tot. Categorie</th>
                        <th>Date</th><th>Notes</th><th>Action</th>
                    </tr>
                </thead>
                <tbody id='response-table'>
                    <tr><td colspan="9"><h2 style="color: #f5b149">Recherchez un enregistrement sp??cifique ici.</h2></td></tr>

                </tbody>
            </table>
			<form style="display: inline" action="<?php echo base_url() ?>init/exportventeExcel">
			<button class="btn btn-success btn-flat btn-sm" type="submit"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Enregistrer au format Excel</button>
		</form>
		</div>
             
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
    <strong>Copyright &copy; 2018 <a href="http://inix.com">Inix Inc.</a>.</strong> Tous droits r??serv??s.
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo base_url() ?>bootstrap/ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>bootstrap/UX/select2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>bootstrap/Parsley/dist/parsley.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>bootstrap/js/bootstrap-editable.min.js"></script>
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
<script>
$(function() {
$( "#from" ).datepicker({
defaultDate: "+1w",
changeMonth: true,
numberOfMonths: 1,
dateFormat: "yy-mm-dd",
onClose: function( selectedDate ) {
$( "#to" ).datepicker( "option", "minDate", selectedDate );
}
});
$( "#to" ).datepicker({
defaultDate: "+1w",
changeMonth: true,
numberOfMonths: 1,
dateFormat: "yy-mm-dd",
onClose: function( selectedDate ) {
$( "#from" ).datepicker( "option", "maxDate", selectedDate );
}
});

// search particular transaction
$("#nocompte-search").on('click', function (e){
    e.preventDefault();
    var nocompte = $("#nocompte").val();
    console.log(item);
        $.ajax({
            type:'POST',
            url:'<?php echo base_url() ?>dashbord/searcharticle',
            data:'q='+nocompte
        }).done(function (data){
            $("#response-table").html(data);
        });
    
});

// search particular transaction
$("#item-search").on('click', function (e){
    e.preventDefault();
    var item = $("#item").val();
    console.log(item);
        $.ajax({
            type:'POST',
            url:'<?php echo base_url() ?>dashbord/searcharticle',
            data:'q='+item
        }).done(function (data){
            $("#response-table").html(data);
        });
    
});

// search particular transaction
$("#classe-search").on('click', function (e){
    e.preventDefault();
    var classe = $("#classe").val();
    console.log(item);
        $.ajax({
            type:'POST',
            url:'<?php echo base_url() ?>dashbord/searchTypevente',
            data:'q='+classe
        }).done(function (data){
            $("#response-table").html(data);
        });
    
});

// search transaction in a range
$("#date-search").on('click', function (e){
    e.preventDefault();
    var from = $("#from").val();
    var to = $("#to").val();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url() ?>dashbord/searchAdvance',
            data:'from='+from+'&to='+to
        }).done(function (data){
            $("#response-table").html(data);
        });
    
});

$("#item").select2({
placeholder: "Selectionner le article",
allowClear: true
});

$("#classe").select2({
placeholder: "Selectionner le type de vente",
allowClear: true
});

$("#nocompte").select2({
placeholder: "Selectionner un no. de compte",
allowClear: true
});

$('.btn_delete').on('click', function(e) {
        e.preventDefault();
        console.log('Bouton ajouter ?? la corbeille cliqu??');
        if (confirm('Etes-vous s??r?')){
            var url = '<?php echo base_url() ?>dashbord/delete_post';
            var data = $(this).attr('db_id');
            $.ajax({
                url: url,
                method: "POST",
                data: 'id=' + data
                }).done(function(data) {
                    window.location.reload();
                });
        }
        else{
            return false;
        }
});

});
</script>
</body>
</html>        