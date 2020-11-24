<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8 SANS BOM">
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
  <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
  <META HTTP-EQUIV="EXPIRES" CONTENT=0>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gescom 1 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.min.css">
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
        <li class="active">Liste des Achats</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row clearfix">
	  <div class="col-xs-12">
	    <div class="row clearfix" style="padding-bottom: 4px;margin-bottom: 5px">
		<div class="col-md-12 column">
                        <a id="addVente" href="<?php echo base_url() ?>home" role="button" class="btn bg-maroon btn-flat btn-sm"><i class="glyphicon glyphicon-plus"></i> Nouvel achat</a>&nbsp;
						<form style="display: inline" action="<?php echo base_url() ?>init/exportCategorieExcel">
									<button class="btn btn-success btn-flat btn-sm" type="submit"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Enregistrer Excel</button>
						</form>
			</div>
		</div>
		<div class="box">
            <div class="box-header">
             
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
          <table id = "example1" class="table display">
            <thead>
            <tr>
              <th>Code</th><th>Nom Client</th><th>Prénom</th><th>Montant</th><th>Payé</th><th>Reste</th><th>Remise</th><th>Créé le</th><th></th>
            </tr>
          </thead>
          <tbody>
            <?php $sno = 1; ?>
                                     <?php foreach ($query->result() as $row): ?>
                                    
                                    <tr class="tbl_view">
            <td>
              <strong><?php echo $sno; ?></strong>
            </td>
            <td>
              <strong><?=$row->FOURN_NOM?></strong>
            </td>
            <td>
              <strong><?php echo $row->FOURN_PRENOM ?></strong>
            </td>
            <td style="text-align: right">
              <strong style="color:#0080ff;"><?=$row->ACH_A_PAYER?></strong>
            </td>
            <td style="text-align: right">
              <strong style="color:#46CB18;"><?=$row->ACH_PAYE?></strong>
            </td>
            <td style="text-align: right">
              <strong style="color:red;"><?=$row->ACH_A_PAYER - $row->ACH_PAYE ?></strong>
            </td>
            <td style="text-align: right">
              <strong><?php echo $row->ACH_REMISE ?></strong>
            </td>
            <td>
              <strong><?php echo $row->ACH_CREATED ?></strong>
            </td>

                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url() ?>reglementfournisseurlist/load_edit_view/<?=$row->ACH_ID?>"  role="button" data-toggle="modal" class="btn btn-default btn-sm" title="Modifier"><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <a class="btn btn-default btn-sm" onclick="toggleReglementPane(<?php echo $row->ACH_ID ?>)" title="Régler"><i class="fa fa-money" ></i></a>
                                                        <a db_id="<?php echo $row->ACH_ID ?>" class="btn btn-default btn-sm print_btn" title="Imprimer" href="<?php echo base_url() ?>home/reportReceiptPdf"><i class="fa fa-print"></i></a>
                                                        <a db_id='<?php echo $row->ACH_ID ?>' onclick="toggleReglementsPane(<?php echo $row->ACH_ID ?>)"  class="btn btn-default btn-sm btn_list" title="Règlements"><i class="fa fa-list"></i></a>
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

    <section class="content" id="regler" style="display: none;">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">

              <h3 class="box-title">Règlement de facture</h3>
            </div>
            <div class="box-body pad table-responsive">
                      
                              <table class="table table-responsive">
                                <tr>
                                <td>
                                  <label>Mode de paiement</label>
                                  <select id="modepaiement" name="modepaiement" class="form-control input-sm">
                                    <option selected="selected" value=""></option>
                                    <?php foreach ($listmodepaiementquery->result() as $row): ?>
                                        <option value="<?=$row->MOD_ID ?>"><?php echo $row->MOD_DESIGNATION ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </td>
                                <td id="banquecell">
                                  <label>Banque</label>
                                  <select id="banque" name="banque" class="form-control input-sm">
                                    <option selected="selected" value=""></option>
                                    <?php foreach ($listbanquequery->result() as $row): ?>
                                        <option value="<?=$row->BAN_ID ?>"><?php echo $row->BAN_NOM ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </td>
                                <td id="referencecell">
                                  <label>Numéro référence</label>
                                  <input type="text" id="noreference" name="noreference" class="form-control input-sm"/>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                  <label>Montant</label>
                                  <input type="text" id="montant" name="montant" class="form-control input-sm"/>
                                </td>
                                <td>
                                  <label>Reste</label>
                                  <input type="text" id="reste" name="reste" class="form-control input-sm"/>
                                </td>
                                </tr>
                              
                               <tr>
                                 <td>
                                  <button id="cancle" name="cancle" class="btn btn-warning">Annuler</button>
                                 </td>
                                 <td>
                                  <button name="" class="btn btn-success btn_regler">Enregistrer</button>
                                 </td>
                               </tr>
                          </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /. row -->
    </section>
    <section class="content" id="reglements" style="display: none;">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">

              <h3 class="box-title">Liste des règlements</h3>
            </div>
            <div class="box-body pad table-responsive">
                      
                    <table id = "example2" class="table display">
                            <thead>
                            <tr>
                              <th>S. No</th><th>Code</th><th>Mode paiement</th><th>Numéro référence</th><th>Date</th><th>Montant</th>
                            </tr>
                          </thead>
                          <tbody>

                        </tbody>
                                                   
                      </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /. row -->
    </section>

    <!-- /.content -->
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
      <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2019 <a href="http://inix.com">Inix Inc.</a>.</strong> Tous droits réservés.
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

  $("#modepaiement").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
      var modepaiement = $(this).val(); /* GET THE VALUE OF THE SELECTED DATA */
      var x = document.getElementById("referencecell");
      var y = document.getElementById("banquecell");
          
      if(modepaiement==1){
        x.style.display = "none";
        y.style.display = "none";
      }else if (modepaiement==2) {
        x.style.display = "table-cell";
        y.style.display = "table-cell";
      }

    });

  /*$(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });*/
</script>

 <!--Add item script-->       
 <script>
        var vente_id, jsondata;
          function toggleReglementPane(id) {
            vente_id = id;
            var x = document.getElementById("regler");
            var y = document.getElementById("reglements");
            if (x.style.display === "none") {              
              y.style.display = "none";
              x.style.display = "block";
            } else {
              x.style.display = "none";
            }
          }

          function toggleReglementsPane(id) {
            achat_id = id;
            var x = document.getElementById("reglements");
            var y = document.getElementById("regler");
            if (x.style.display === "none") {
              y.style.display = "none";
              x.style.display = "block";
              var url = '<?php echo base_url() ?>reglementfournisseurlist/fetchReglements';
              $.ajax({
                  url:url,
                  type:"POST",
                  data:'id='+achat_id
              }).done(function(data){
                  $("#example2 tbody").html(data);
              });
            } else {
              x.style.display = "none";
            }
          }

    $(function(){
        $( "#addItem" ).submit(function( event ) {
           var url = $(this).attr('action');
                $.ajax({
                url: url,
                data: $("#addItem").serialize(),
                type: $(this).attr('method')
              }).done(function(data) {
                  $('#ret').html(data);
//                  window.location.reload();
                $('#addItem')[0].reset();
              });
            event.preventDefault();
        });
    });
</script>

<!--Edit enrty script-->
<script>
$('.edit_btn').on('click', function(e) {
        e.preventDefault();
        //var data = $(this).attr('db_id');
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type:"POST",
            data:'id='+data
        }).done(function(data){
            
        });
 });
</script>

<script>
$("#cancle").on('click', function(e) {
        e.preventDefault();
        var x = document.getElementById("regler");
        x.style.display = "none";
 });
</script>

<script>
$('.print_btn').on('click', function(e) {
        e.preventDefault();
        //alert("entered");
        var data = $(this).attr('db_id');
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type:"POST",
            data:'id='+data
        }).done(function(data){
            //alert("outered");
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
         regfun();
          
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
$('.btn_regler').on('click', function(e) {
        e.preventDefault();
        //alert("cliqué");
        montant  = Number($("#montant").val());
        modepaiement  = $("#modepaiement").val();
        banque  = $("#banque").val();
        noreference  = $("#noreference").val();
        jsondata  = [{"REG_ACHAT_ID":""+vente_id ,"REG_MONTANT":""+montant,"REG_MODE_PAIEMENT":""+modepaiement,"REG_BANQUE":""+banque,
        "REG_NUM_REFERENCE":""+noreference}];
        $('.confirmLink').trigger('click'); return false;
        });
        
        var regfun = function(){
            var url = '<?php echo base_url() ?>reglementfournisseurlist/add_reglement';
            var data = JSON.stringify(jsondata);
            alert(data);
            $.ajax({
                url: url,
                type:"POST",
                dataType: "html",
                contentType: "application/json",
                data:data
                }).done(function(data){
                window.location.reload();

                });
        };
        
 
 
</script>
</body>
</html>