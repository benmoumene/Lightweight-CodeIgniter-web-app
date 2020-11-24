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
          <a href="#"><i class="fa fa-circle text-success"></i> Connecté</a>
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
        <li>
          <a href="<?php echo base_url() ?>dashbord/">
            <i class="fa fa-money"></i> <span>ventes</span>
          </a>
        </li>
        <li class="active ">
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
            <i class="fa fa-gear"></i> <span>Paramètres</span>
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
        <li><a href="<?php echo base_url() ?>home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Liste des categories</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row clearfix">
	  <div class="col-xs-12">
	    <div class="row clearfix" style="border-bottom: 1px solid #ddd; padding-bottom: 4px;margin-bottom: 5px">
		<div class="col-md-12 column">
            <a id="modal-666931" href="#modal-container-666931" role="button" class="btn bg-maroon btn-flat btn-sm" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Ajouter un nouveau categorie</a>&nbsp;
		    <form style="display: inline" action="<?php echo base_url() ?>init/exportTransactionExcel">
				<button class="btn btn-success btn-flat btn-sm" type="submit"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Enregistrer au format Excel</button>
		    </form>
		</div>
		</div>
		<div class="box">
            <div class="box-header">
             
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
			<table class="table">
				<thead>
					<tr>
						<th>
							S. NO.
						</th>
						<th>
							Nom du categorie
						</th>
						<th>
							Prénom(s)
						</th>
						<th>
							Téléphone 1
						</th>
						<th>
							Téléphone 2
						</th>
						<th>
							article
						</th>
                                                
                        <th>
							Action
						</th>
					</tr>
				</thead>
				<tbody><?php $sno = 1; ?>
                                     <?php foreach ($query->result() as $row): ?>
                                    
                                    <tr class="tbl_view">
						<td>
							<?php echo $sno; ?>
						</td>
						<td>
							<?=$row->name ?>
						</td>
						<td>
							<?=$row->prenom?>
						</td>
						<td>
							<?php echo $row->telephone1 ?>
						</td>
						<td>
							<?php echo $row->telephone2 ?>
						</td>
						<td>
							<?php echo $row->article_name ?>
						</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a  db_id ='<?php echo $row->id ?>' href="<?php echo base_url() ?>categorielist/load_edit_view/<?=$row->id?>"  role="button" data-toggle="modal" class="btn btn-default btn-sm" title="Modifier"><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <a db_id='<?php echo $row->id ?>' href="#delete" class="btn btn-default btn-sm btn_delete" title="Supprimer"><i class="glyphicon glyphicon-remove"></i></a>
                                                     </div>
                                                    
						</td>
					</tr>
                                        <?php $sno = $sno+1;  endforeach; ?>
					
                                        
                                    
					
				</tbody>
                                   
			</table>
			<div class="pull-right" style="text-align: center"><?php echo $this->pagination->create_links();  ?></div>
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
        
        <!-- Add new item Model -->
        

       
        <div class="modal fade" id="modal-container-666931" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Ajouter un categorie</h4>
                    </div>

                    <div class="modal-body">
                        <div id='ret'></div>
                        
                        <form class="form-horizontal" role="form" id="addItem" action="<?php echo base_url().'categorielist/add_categorie' ?>" method="POST">
                          <div class="form-group">
                              <label class="col-sm-3 control-label">Nom du categorie</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nom du categorie">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Prénom du categorie</label>
                              <div class="col-sm-9">
							  <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom du categorie">
                              </div>
                            </div>
							<div class="form-group">
							    <label class="col-sm-3 control-label">Sélectionner le article</label>
                                <div class="col-sm-9">
								<select id="article" name="article" class="form-control input-sm">
								    <option selected="selected" value=""></option>
                                    <?php foreach ($listarticlequery->result() as $row2): ?>
										<option value="<?=$row2->id ?>"><?=$row2->name ?></option>
									<?php endforeach; ?>
								</select>
								</div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-9">
                                  <button type="submit" class="btn btn-success" name="submit" id="submit">Enregistrer</button>
                              </div>
                            </div>
                          
                        </form>
                    </div>

                    </div>
                    
                </div>

            </div>

        
        
        <!-- Load Edit Model -->             
        
<div class="modal fade" id="edit_model" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div>
    </div>
</div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <a href="http://inix.com">Inix Inc.</a>.</strong> Tous droits réservés.
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
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
	$("#article").select2({
	placeholder: "Sélectionner le article",
	allowClear: true
	});

    $(function(){
        $( "#addItem" ).submit(function( event ) {
           event.preventDefault();
            var url = $(this).attr('action');
            console.log(url);
            
            $.ajax({
                url: url,
                data: $("#addItem").serialize(),
                type: $(this).attr('method')
              }).done(function(data) {
                  $('#ret').html(data);
//                  window.location.reload();
//                $('#do_edit_post')[0].reset();
              });
            
        });
    });

</script>

<!--Refresh window when modal close-->
<script>
$("#modal-container-666931").on('hidden.bs.modal', function(e){window.location.reload();});
</script>
<!--Edit enrty script-->
<script>
$('.edit_btn').on('click', function(e) {
        e.preventDefault();
        var data = $(this).attr('db_id');
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type:"POST",
            data:'id='+data
        }).done(function(data){
            
        });
 });
</script>


<a class="confirmLink" href="#"></a>
<div id="dialog" title="Confirmation Requise">
  Etes-vous sûr d'effectuer cette opération?
</div>
<script>
$("#dialog").dialog({
      autoOpen: false,
      modal: true
    });


  $(".confirmLink").click(function(e) {
    e.preventDefault();
    var targetUrl = $(this).attr("href");

    $("#dialog").dialog({
      buttons : {
        "Confirmer" : function() {
         $(this).dialog("close");
         delfun();
          
        },
        "Annuler" : function() {
          $(this).dialog("close");
          return false;
        }
      }
    });

    $("#dialog").dialog("open");
  });
</script>

<!--Delete enrty script-->
<script>
$('.btn_delete').on('click', function(e) {
        e.preventDefault();
        delid = $(this).attr('db_id');
        $('.confirmLink').trigger('click'); return false;
        });
        
        var delfun = function(){
            var url = '<?php echo base_url() ?>categorielist/delete_categorie';
            var data = delid
            $.ajax({
                url: url,
                type:"POST",
                data:'id='+data
                }).done(function(data){
                window.location.reload();
                });
        };
        
 
 
</script>
</body>
</html>                        