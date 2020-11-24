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
  <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/ui/jquery-ui.min.css">
        
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
	<?php if($this->session->userdata('role') == 'admin'):?>
        <a href="<?php echo base_url() ?>home" class="logo">
		<?php else:?>
		<a href="<?php echo base_url() ?>dashbord" class="logo">
		<?php endif;?>
    
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
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
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
              <small class="label pull-right bg-green">2</small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url() ?>fournisseurlist">
            <i class="fa fa-group"></i> <span>Fournisseurs</span>
      <span class="pull-right-container">
              <small class="label pull-right bg-maroon">2</small>
            </span>
          </a>
        </li>
        
        <li>
          <a href="<?php echo base_url() ?>inventairelist/">

            <i class="fa fa-fw fa-database"></i> <span>Stock</span>
      <span class="pull-right-container">
              <small class="label pull-right bg-orange">4</small>
            </span>
          </a>
        </li>

        <?php if($this->session->userdata('role') == 'admin'):?>
             <li><a href="<?php echo base_url() ?>depotlist"><i class="fa fa-book"></i> <span>Dépôts</span></a></li>
              <li><a href="<?php echo base_url() ?>reglementlist"><i class="fa fa-stack-overflow"></i> <span>Règlements Clients</span></a></li>
              <li><a href="<?php echo base_url() ?>reglementfournisseurlist"><i class="fa fa-stack-overflow-o"></i> <span>Règlements Fournisseurs</span></a></li>
        <?php endif;?>
        <li>
          <a href="<?php echo base_url() ?>magasinlist/">

            <i class="fa fa-building-o"></i> <span>Magasins
            </span>
          </a>
        </li>
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
        <li class="active">Liste des articles</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row clearfix">
	  <div class="col-xs-12">
	    <div class="row clearfix" style="padding-bottom: 4px;margin-bottom: 5px">
		<div class="col-md-12 column">
                        <a id="modal-666931" href="#modal-container-666931" role="button" class="btn bg-maroon btn-flat btn-sm" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Nouvel article</a>&nbsp;
						<form style="display: inline" action="<?php echo base_url() ?>init/exportarticleExcel">
									<button class="btn btn-success btn-flat btn-sm" type="submit"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Enregistrer Excel</button>
						</form>&nbsp;
            <a id="modal-666932" href="#modal-container-666932" role="button" class="btn bg-red btn-flat btn-sm" data-toggle="modal"><i class="glyphicon glyphicon-count"></i> Faire l'inventaire</a>
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
							Désignation
						</th>
						<th>
							Code
						</th>
                        <th>
							Prix Unitaire
						</th>
						<th>
							Code catégorie
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
							<?=$row->DESIGNATION ?>
						</td>
						<td>
							<?=$row->CODE ?>
						</td>
						<td>
							<?=$row->PRIX_UNITAIRE?>
						</td>
						<td>
							<?=$row->CODE_CATEGORIE ?>
						</td>
                          <td>
							<div class="btn-group">
								<a  db_id ='<?php echo $row->ID ?>' href="<?php echo base_url() ?>articlelist/load_edit_view/<?=$row->ID?>"  role="button" data-toggle="modal" class="btn btn-default btn-sm" title="Modifier"><i class="glyphicon glyphicon-pencil"></i></a>
								<a db_id='<?php echo $row->ID ?>' href="#delete" class="btn btn-default btn-sm btn_delete" title="Supprimer"><i class="glyphicon glyphicon-remove"></i></a>
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
                        <h4 class="modal-title" id="myModalLabel">Ajouter un article</h4>
                    </div>

                    <div class="modal-body">
                        <div id='ret'></div>
                        
                        <form class="form-horizontal" role="form" id="addItem" action="<?php echo base_url().'articlelist/add_article' ?>" method="POST">
                          <div class="form-group">
                              <label class="col-sm-3 control-label">CODE</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="code" id="code" placeholder="Code de l'article">
                              </div>
                            </div>
						  <div class="form-group">
                              <label class="col-sm-3 control-label">DESIGNATION</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="designation" id="designation" placeholder="Désignation de l'article">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">PRIX UNITAIRE</label>
                              <div class="col-sm-9">
							  <input type="text" class="form-control" name="prix_unit" id="prix_unit" placeholder="Prix unitaire">
                              </div>
                            </div>
							<div class="form-group">
							    <label class="col-sm-3 control-label">CATEGORIE</label>
                                <div class="col-sm-9">
								<select id="categorie" name="categorie" class="form-control input-sm">
                                    <?php foreach ($listcategquery->result() as $row2): ?>
										<option value="<?=$row2->CATEG_ID ?>"><?=$row2->CATEG_DESIGNATION ?></option>
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
            var url = '<?php echo base_url() ?>articlelist/delete_article';
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