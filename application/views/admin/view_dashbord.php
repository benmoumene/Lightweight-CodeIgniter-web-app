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
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/datatable.css">
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
        <li class="active">Enregistrement des ventes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row clearfix">
	  <div class="col-xs-12">
	    <div class="row clearfix" style="border-bottom: 1px solid #ddd; padding-bottom: 4px;margin-bottom: 5px">
                <div class="col-md-12 column">
                    <a id="modal-666931" href="#modal-container-666931" role="button" class="btn bg-maroon btn-flat btn-sm" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Ajouter un vente</a>&nbsp;
                    <form style="display: inline" action="<?php echo base_url() ?>init/exportventeExcel">
                                <button class="btn btn-success btn-flat btn-sm" type="submit"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Enregistrer au format Excel</button>
                    </form>
					<a href="<?php echo base_url() ?>dashbord/searchvente" class="btn bg-orange btn-flat btn-sm pull-right"><i class="glyphicon glyphicon-search"></i>&nbsp;&nbsp;Recherche avancée</a>
                </div>
                
        </div>
		<?php $i = 0; foreach ($typevente->result() as $row): $i++;?>
      <div class="box">
            <div class="box-header">
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			   <table id = "<?php echo 'example'.$row->id?>" class="table display">
				    <thead>
						<tr>
							<th></th><th>Nom du Categorie</th><th>Type de vente</th><th>Total</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
					<tfoot>
						<tr>
							<th></th><th>Nom du Categorie</th><th>Type de vente</th><th>Total</th>
						</tr>
					</tfoot>
			    </table>
				<hr style="margin-bottom: 5px;"/>
                   <table  cellspacing="10">
                       <tr>
                           <td><form style="display: inline" action="<?php echo base_url() ?>init/exportventeExcel">
                                <button class="btn btn-success btn-flat btn-sm" type="submit"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Enregistrer Excel</button>
                                </form>
                           </td>
                       </tr>
                   </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  <?php endforeach; ?>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
    </section>
    <!-- /.content -->
  

   <div class="modal fade" id="modal-container-666931" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Encaissement d'un vente</h4>
                    </div>

                    <div class="modal-body">
                        <div id='ret'></div>
                        
                          <form class="form-horizontal cus-form" id="Add_transaction" method="POST" action="<?php echo base_url().'dashbord/add_vente' ?>">
                        
                        <table class="table table-bordered">
                        <tr>
                            <td colspan="2">
                                <label>Sélectionner le article</label>
                                <select id="article" name="article" class="form-control input-sm">
                                    <option selected="selected" value=""></option>
                                <?php foreach ($listarticlequery->result() as $row): ?>
                                    <option value="<?=$row->id ?>"><?=$row->name ?></option>
                                <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
						<tr>
                            <td colspan="2">
                                <label>Sélectionner le type de vente</label>
                                <select id="typevente" name="typevente" class="form-control input-sm">
                                    <option selected="selected" value=""></option>
                                <?php foreach ($listtypeventequery->result() as $row): ?>
                                    <option value="<?=$row->id ?>"><?=$row->name ?></option>
                                <?php endforeach; ?>
                                </select></td>
                        </tr>
						<tr>
                            <td colspan="2">
                                <label>Montant</label>
                                <input type="text" id="valeur" name="valeur" class="form-control input-sm"/>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label>Date</label>
                                <input type="text" id="datepicker" name="created" class="form-control input-sm"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label>Commentaire</label>
                                <textarea class="form-control" id="comment" name="comment" placeholder="Une note quelconque"></textarea>
                            </td>
                        </tr>
                        
                        
                    </table>
                    <div style="padding-left: 10px; padding-bottom: 10px; margin-top: -8px;">
                        <button type="submit" name="submit" class="btn btn-success">Enregistrer</button>
                        <button id="cancle" name="cancle" class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Annuler</button>                
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

 <!--Add item script-->       
 <script>
    $(function(){
        $( "#Add_transaction" ).submit(function( event ) {
           var url = $(this).attr('action');
                $.ajax({
                url: url,
                data: $("#Add_transaction").serialize(),
                type: $(this).attr('method')
              }).done(function(data) {
                  $('#ret').html(data);
//                  window.location.reload();
                $('#Add_transaction')[0].reset();
              });
            event.preventDefault();
        });
 
$("#article").select2({
placeholder: "Sélectionner le article",
allowClear: true
});

$("#typevente").select2({
placeholder: "Sélectionner le type de vente",
allowClear: true
});
 
$( "#datepicker" ).datepicker({
defaultDate: "+1w",
changeMonth: true,
numberOfMonths: 1,
format: 'dd-mm-yyyy',
onClose: function( selectedDate ) {
$( "#to" ).datepicker( "option", "minDate", selectedDate );
}
});

});
</script>
<script>
/* Formatting function for row details - modify as you need */

function getDetailObjectsjQuery(obj){
	var result = "";
	$.each(obj, function(k,v){
		if(!isNaN(k)){
			
		}
	});
}

function format ( d ) {
    // `d` is the original data object for the row
    table = '<table id = "detail_table" class="table table-striped table-bordered"><tr><td></td><td style="color:#f94877;">Nom du article:</td><td style="color:#f94877;">Type de vente:</td><td style="color:#f94877;">Montant:</td><td style="color:#f94877;">Date:</td><td style="color:#f94877;">Commentaire:</td></tr>';
	cpt = 0;
	Object.keys(d).forEach(function(key){
		console.log(Object.keys(d));
		if(d.hasOwnProperty(key)){
			if(!isNaN(Number(key))){	
				table+='<tr>'+
				    '<td></td>'+
					'<td>'+d[key].articleName+'</td>'+
					'<td>'+d[key].typeventeName+'</td>'+
					'<td align="right">'+d[key].valeur+'</td>'+
					'<td>'+d[key].created+'</td>'+
					'<td>'+d[key].comment+'</td>'+
					'</tr>';
			}
		}
	});
    table+'</table>';
	return table;
}

  /*$(function () {
	$("tr").each(function(){
		var col_val = $(this).find("td:eq(2)").text();
		if(col_val == "Don"){
			$this.addClass('don');
		}else if(col_val == "Offrande"){
			$this.addClass('offrande');
		}else{
			$this.addClass('dime');
		}
	}); 
  });*/
  
  $(function () {
	<?php $i = 0; foreach ($typevente->result() as $row): $i++;?>
	  var dt<?php echo $row->id?>;
	<?php endforeach; ?>
	
	<?php $i = 0; foreach ($typevente->result() as $row): $i++;?>
		  dt<?php echo $row->id?> = $('<?php echo '#example'.$row->id?>').DataTable({
      "processing":true,
      "serverSide":true,
		  "ajax":{"url":"<?php echo base_url() ?>dashbord/fetchMasterDetailventee/<?php echo $row->id?>"
    }
		});	
		
	// Array to track the ids of the details displayed rows
		var detailRows = [];
	 
		$('<?php echo '#example'.$row->id?> tbody').on( 'click', 'tr td.details-control', function () {
			var tr = $(this).closest('tr');
			var row = dt<?php echo $row->id?>.row( tr );
			var idx = $.inArray( tr.attr('id'), detailRows );
	 
			if ( row.child.isShown() ) {
				tr.removeClass( 'shown' );
				row.child.hide();
	 
				// Remove from the 'open' array
				detailRows.splice( idx, 1 );
			}
			else {
				tr.addClass( 'shown' );
				row.child( format( row.data() ) ).show();
	 
				// Add to the 'open' array
				if ( idx === -1 ) {
					detailRows.push( tr.attr('id') );
				}
			}
		} );
	 
		// On each draw, loop over the `detailRows` array and show any child rows
		dt<?php echo $row->id?>.on( 'draw', function () {
			$.each( detailRows, function ( i, id ) {
				$('#'+id+' td.details-control').trigger( 'click' );
			} );
		} );  
  	<?php endforeach; ?>
	});
</script>
<!--Refresh window when modal close-->
<script>
$("#modal-container-666931").on('hidden.bs.modal', function(e){window.location.reload();});
</script>

<!--Edit enrty script-->
<script>
    $(document).ready(function (){
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
	});
</script>


<a class="confirmLink" href="#"></a>
<div id="dialog" title="Confirmation Requise">
  Etes-vous sûr d'effectuer cette opération?
</div>
<script>
$(document).ready(function (){
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
  
});
</script>

<!--Delete enrty script-->
<script>
$(document).ready(function (){
$('.btn_delete').on('click', function(e) {
        e.preventDefault();
        delid = $(this).attr('db_id');
        $('.confirmLink').trigger('click'); return false;
        });
        
 delfun = function(){
    var url = '<?php echo base_url() ?>dashbord/delete_entry';
    var data = delid
    $.ajax({
        url: url,
        type:"POST",
        data:'id='+data
        }).done(function(data){
        window.location.reload();
        });
};
});  
</script>
</body>
</html>