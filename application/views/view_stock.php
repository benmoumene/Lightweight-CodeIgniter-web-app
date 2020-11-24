<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
  <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
  <META HTTP-EQUIV="EXPIRES" CONTENT=0>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gescom | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/AdminLTE.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/editable_table.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-icons/font-awesome/css/font-awesome.min.css">

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
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
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
        <li><a href="<?php echo base_url() ?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Stock</li>
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
        <div class="col-md-11">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#tab_1" aria-expanded="true" data-toggle="tab">Etat du stock</a></li>
              <li><a href="#tab_2" aria-expanded="false" data-toggle="tab">Inventaires</a></li>
              <li><a href="#tab_3" aria-expanded="false" data-toggle="tab">Transfert de stock</a></li>
              <li class="pull-left header"><i class="fa fa-th"></i> </li>
            </ul>
            <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                      <div id='ret' style="margin:20px;"></div>
                        
                      <form class="form-horizontal cus-form" id="Add_transaction" method="POST" action="">
                        
                        <table class="table table-bordered">
                        <tr>
                            <td colspan="4">
                                <label>Rechercher par:</label>
                                <div class="form-group" style="margin-left: 20px">
                                  <div class="radio">
                                    <label>
                                      <input name="optionsRadios" id="optionsRadios1" type="radio" checked="" value="option1">
                                      Magasin
                                    </label>
                                  </div>
                                  <div class="radio">
                                    <label>
                                      <input name="optionsRadios" id="optionsRadios2" type="radio" value="option2">
                                      Catégorie
                                    </label>
                                  </div>
                                </div>
                            </td>
                            <td colspan="4">                                
                                <select id="magasin" name="magasin" class="form-control input-sm">
                                    <option selected="selected" value=""></option>
                                <?php foreach ($listmagasinquery->result() as $row): ?>
                                    <option value="<?=$row->MAG_ID ?>"><?php echo $row->MAG_NOM ?></option>
                                <?php endforeach; ?>
                                </select>
                            </td>
                            
                            <td colspan="4">
                                <select id="article" name="article" class="form-control input-sm">
                                    <option selected="selected" value=""></option>
                                <?php foreach ($listcategoriequery->result() as $row): ?>
                                    <option value="<?=$row->CATEG_ID ?>"><?php echo $row->CATEG_DESIGNATION ?></option>
                                <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                          
                    </table>

                    <table id = "example1" class="table table-bordered table-striped display">
                          <thead>
                          <tr>
                            <th style="display: none;">Id</th><th>Catégorie</th><th>Quantité</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                          <tr>
                            <th style="display: none;">Id</th><th>Catégorie</th><th>Quantité</th>
                          </tr>
                        </tfoot>
                    </table>

                    <table id = "example2" class="table table-bordered table-striped" style="display: none;">
                        <thead>
                          <tr>
                            <th style="display: none;">Id</th><th>Magasin</th><th>Quantité</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                          <tr>
                            <th style="display: none;">Id</th><th>Magasin</th><th>Quantité</th>
                          </tr>
                        </tfoot>
                    </table>
                    
                        <!--label>Commentaire</label>
                        <textarea class="form-control" id="comment" name="comment" placeholder="Une note quelconque"></textarea-->

                    <div style="padding-left: 10px; padding-bottom: 10px; margin-top: 5px;">
                         <button id="cancle" name="cancle" class="btn btn-warning">Annuler</button>
                         <button id="creerfacture" name="" class="btn btn-success">Enregistrer</button>
                         <button style="margin-left: 1px;" class="btn btn-primary">Imprimer</button>
                    </div>
                        
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="row clearfix">
                 <div class="col-xs-12">
                  <div class="row clearfix" style="padding-bottom: 4px;margin-bottom: 5px">
                <div class="col-md-12 column">
                    <a id="modal-666931" href="#modal-container-666931" role="button" class="btn bg-maroon btn-flat btn-sm" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Faire l'Inventaire</a>&nbsp;
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
                    <th style="text-align: center;">
                      Code
                    </th>
                    <th>
                      Magasin
                    </th>
                    <th>
                      Date
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody><?php $sno = 1; ?>
                   <?php foreach ($listinventairequery->result() as $row): ?>
                  
                  <tr class="tbl_view">
                    <td>
                      <?php echo $sno; ?>
                    </td>
                    <td>
                      <?=$row->INV_NUMERO ?>
                    </td>
                    <td>
                      <?=$row->MAG_NOM?>
                    </td>
                    <td>
                      <?=$row->INV_CREATED?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a db_id="<?php echo $row->INV_ID ?>" class="btn btn-default btn-sm print_btn" title="Imprimer" href="<?php echo base_url() ?>home/reportReceiptPdf"><i class="fa fa-print"></i></a>
                            <a db_id='<?php echo $row->INV_ID ?>'  class="btn btn-default btn-sm btn_list" title="Magasins"><i class="fa fa-list"></i></a>
                         </div>                                                            
                    </td>
                  </tr>
                        <?php $sno = $sno+1;  endforeach; ?>

                    </tbody>
                  </table>
                </div>
              <!-- /.box-body -->
              </div>
            <!-- /.box -->
           </div>
          <!-- ./col -->
         </div>
			  </div>
        <div class="tab-pane" id="tab_3">
          <div class="row clearfix">
            <div class="col-xs-12">
              <div class="row clearfix" style="padding-bottom: 4px;margin-bottom: 5px">
                <div class="col-md-12 column">
                    <a id="modal-666931" href="#modal-container-666932" role="button" class="btn bg-maroon btn-flat btn-sm" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Transférer stock</a>&nbsp;
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
                    <th style="text-align: center;">
                      Code
                    </th>
                    <th>
                      Magasin d'Origine
                    </th>
                    <th>
                      Magasin d'Arrivée
                    </th>
                    <th>
                      Date
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody><?php $sno = 1; ?>
                   <?php foreach ($listtransfertquery->result() as $row): ?>
                  
                  <tr class="tbl_view">
                    <td>
                      <?php echo $sno; ?>
                    </td>
                    <td>
                      <?=$row->TRANS_CODE ?>
                    </td>
                    <td>
                      <?=$row->MAG1 ?>
                    </td>
                    <td>
                      <?=$row->MAG2 ?>
                    </td>
                    <td>
                      <?=$row->TRANS_CREATED?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a db_id="<?php echo $row->TRANS_ID ?>" class="btn btn-default btn-sm print_btn" title="Imprimer" href="<?php echo base_url() ?>home/reportReceiptPdf"><i class="fa fa-print"></i></a>
                            <a db_id='<?php echo $row->TRANS_ID ?>'  class="btn btn-default btn-sm btn_list" title="Détails"><i class="fa fa-list"></i></a>
                         </div>                                                            
                    </td>
                  </tr>
                        <?php $sno = $sno+1;  endforeach; ?>

                    </tbody>
                  </table>
                </div>
              <!-- /.box-body -->
              </div>
            <!-- /.box -->
           </div>
          <!-- ./col -->
         </div>
        </div>      
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

<div class="modal fade" id="modal-container-666931" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Inventaire</h4>
                    </div>

                    <div class="modal-body" style="overflow-x: auto;">
                            <div class="container">
                              <h1>Inventaire ce <?php echo date('d/m/Y') ?></h1>
                              <p><strong>Toutes les quantités en stock seront remplacées par celles-ci</strong></p>
                              <table class="table">
                              <tr>
                                <td colspan="2">
                                <select id="magasin2" name="magasin2" class="form-control input-sm" style="width:150px; margin-bottom: 30px;">
                                      <option selected="selected" value=""></option>
                                        <?php foreach ($listmagasinquery->result() as $row): ?>
                                      <option value="<?=$row->MAG_ID ?>"><?php echo $row->MAG_NOM ?></option>
                                  <?php endforeach; ?>
                                  </select>
                                </td>
                                <td colspan="2">
                                    <a id ="rechercher" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="8">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="2">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="2">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="2">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="2">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="2">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="2">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                              </tr>
                            </table>
                              <div id="table" class="table-editable">
                                <table id="table_insert" class="table">
                                  <thead>
                                  <tr>
                                    <th style="display: none;">Categ_Id</th>
                                    <th>Categorie</th>
                                    <th>Quantite</th>
                                    <th></th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    
                                  </tbody>
                                </table>
                              </div>
                              
                              <button id="export-btn" class="btn btn-primary">Valider et Enregistrer</button>
                              <p id="export"></p>
                            </div>
                          </div>

                    </div>
                    
                </div>

            </div>



<div class="modal fade" id="modal-container-666932" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel2">Transfert de stock</h4>
                    </div>

                    <div class="modal-body" style="overflow-x: auto;">
                            <div class="container">
                              <h1>Transfert de stock ce <?php echo date('d/m/Y') ?></h1>
                              <p><strong>Ce processus est irréversible</strong></p>
                              <table class="table">
                              <tr>
                                <td colspan="2">
                                  De:
                                <select id="magasin3" name="magasin3" class="form-control input-sm" style="width:150px; margin-bottom: 30px;">
                                      <option selected="selected" value=""></option>
                                        <?php foreach ($listmagasinquery->result() as $row): ?>
                                      <option value="<?=$row->MAG_ID ?>"><?php echo $row->MAG_NOM ?></option>
                                  <?php endforeach; ?>
                                  </select>
                                </td>
                                <td colspan="2">
                                  A:
                                <select id="magasin4" name="magasin4" class="form-control input-sm" style="width:150px; margin-bottom: 30px;">
                                      <option selected="selected" value=""></option>
                                        <?php foreach ($listmagasinquery->result() as $row): ?>
                                      <option value="<?=$row->MAG_ID ?>"><?php echo $row->MAG_NOM ?></option>
                                  <?php endforeach; ?>
                                  </select>
                                </td>
                                <td colspan="2">
                                    </br>
                                    <a id ="rechercher2" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="6">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="2">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="2">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="2">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="2">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="2">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                                <td colspan="2">
                                    <a style="display:none;" class="btn btn-default btn-sm" title="Rechercher">Rechercher</a>
                                </td>
                              </tr>
                            </table>
                              <div id="table2" class="table-editable">
                                <table id="table_insert2" class="table">
                                  <thead>
                                  <tr>
                                    <th style="display: none;">Categ_Id</th>
                                    <th>Categorie</th>
                                    <th>Quantite</th>
                                    <th></th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    
                                  </tbody>
                                </table>
                              </div>
                              
                              <button id="export-btn2" class="btn btn-primary">Valider et Enregistrer</button>
                              <p id="export2"></p>
                            </div>
                          </div>

                    </div>
                    
                </div>

            </div>








  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2019 <a href="http://inix.com">Inix Inc.</a>.</strong> Tous droits réservés.
  </footer>
 
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url() ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables/dataTables.bootstrap.min.js"></script><!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>bootstrap/js/bootstrap.min.js"></script>

<!-- FastClick -->
<!--script src="<?php //echo base_url() ?>plugins/fastclick/fastclick.js"></script-->
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script>
    
    var $TABLE = $('#table');
    var $BTN = $('#export-btn');
    var $EXPORT = $('#export');

    $BTN.hide();

    $("#rechercher").click(function(){
      
      var id = Number(document.getElementById("magasin2").value);   
      //alert(id); 
      $.ajax({
        url: "<?php echo base_url().'inventairelist/fetchCategories'?>",
        type: "POST",
        dataType: "json",
        success: function (data) {
            var content='';
            //alert(data.length);
            for (let i=0;i<data.length;i++) { 

                content+='<tr><td style=\"display:none;\">'+data[i].CATEG_ID+'</td><td>'+data[i].CATEG_DESIGNATION+'</td><td contenteditable=\"true\"></td></tr>';

            }
            //alert(content);
            $('#table_insert tbody').html(content);
            $BTN.show();
        }
      });
    });

$('.table-add').click(function () {
  var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
  $TABLE.find('table').append($clone);
});

$('.table-remove').click(function () {
  $(this).parents('tr').detach();
});

$('.table-up').click(function () {
  var $row = $(this).parents('tr');
  if ($row.index() === 1) return; // Don't go above the header
  $row.prev().before($row.get(0));
});

$('.table-down').click(function () {
  var $row = $(this).parents('tr');
  $row.next().after($row.get(0));
});

// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$BTN.click(function () {

  $BTN.hide();

  var $rows = $TABLE.find('tr:not(:hidden)');
  var headers = [];
  var data = [];
  data.push({"magasin": Number(document.getElementById("magasin2").value)});
  // Get the headers (add special header logic here)
  $($rows.shift()).find('th:not(:empty)').each(function () {
    headers.push($(this).text().toLowerCase());
  });
  
  // Turn all existing rows into a loopable array
  $rows.each(function () {
    var $td = $(this).find('td');
    var h = {};
    //h['magasin']= Number(document.getElementById("magasin2").value);
    
    // Use the headers from earlier to name our hash keys
    headers.forEach(function (header, i) {
      h[header] = $td.eq(i).text();   
    });
    
    data.push(h);
  });
  
  // Output the result
  //$EXPORT.text(JSON.stringify(data));

  $.ajax({
        url: "<?php echo base_url().'inventairelist/saveQuantites'?>",
        type: "POST",
        dataType: "html",
        success: function (data) {
            $('#table_insert tbody').html(data);
        },
        data:JSON.stringify(data)
      })
});

</script>
<script>

   $TABLE2 = $('#table2');
    $BTN2 = $('#export-btn2');
    $EXPORT2 = $('#export2');

    $BTN2.hide();

    $("#rechercher2").click(function(){
      
      var m1 = Number(document.getElementById("magasin3").value);
      var m2 = Number(document.getElementById("magasin4").value);   
      //alert(id); 
      $.ajax({
        url: "<?php echo base_url().'inventairelist/fetchCategories'?>",
        type: "POST",
        dataType: "json",
        success: function (data) {
            var content='';
            //alert(data.length);
            for (let i=0;i<data.length;i++) { 

                content+='<tr><td style=\"display:none;\">'+data[i].CATEG_ID+'</td><td>'+data[i].CATEG_DESIGNATION+'</td><td contenteditable=\"true\"></td></tr>';

            }
            //alert(content);
            $('#table_insert2 tbody').html(content);
            $BTN2.show();
        }
      });
    });

    $('.table-add').click(function () {
  var $clone = $TABLE2.find('tr.hide').clone(true).removeClass('hide table-line');
  $TABLE2.find('table').append($clone);
});

$('.table-remove').click(function () {
  $(this).parents('tr').detach();
});

$('.table-up').click(function () {
  var $row = $(this).parents('tr');
  if ($row.index() === 1) return; // Don't go above the header
  $row.prev().before($row.get(0));
});

$('.table-down').click(function () {
  var $row = $(this).parents('tr');
  $row.next().after($row.get(0));
});

// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$BTN2.click(function () {

  $BTN2.hide();

  var $rows = $TABLE2.find('tr:not(:hidden)');
  var headers = [];
  var data = [];
  data.push({"magasin1": Number(document.getElementById("magasin3").value)});
  data.push({"magasin2": Number(document.getElementById("magasin4").value)})
  // Get the headers (add special header logic here)
  $($rows.shift()).find('th:not(:empty)').each(function () {
    headers.push($(this).text().toLowerCase());
  });
  
  // Turn all existing rows into a loopable array
  $rows.each(function () {
    var $td = $(this).find('td');
    var h = {};
    
    // Use the headers from earlier to name our hash keys
    headers.forEach(function (header, i) {
      h[header] = $td.eq(i).text();   
    });
    
    data.push(h);
  });
  
  // Output the result
  //$EXPORT.text(JSON.stringify(data));

  $.ajax({
        url: "<?php echo base_url().'inventairelist/add_transfert'?>",
        type: "POST",
        dataType: "html",
        success: function (data) {
            $('#table_insert2 tbody').html(data);
        },
        data:JSON.stringify(data)
      })
});

</script>

</body>
</html>
