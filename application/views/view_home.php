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
        <li class="active">Dashboard</li>
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
              <li class="active"><a href="#tab_1" aria-expanded="true" data-toggle="tab">Vendre</a></li>
              <li ><a href="#tab_3" aria-expanded="false" data-toggle="tab">Bilan</a></li>
              <li><a href="#tab_2" aria-expanded="false" data-toggle="tab">Liste des ventes</a></li>
              <li class="pull-left header"><i class="fa fa-th"></i> </li>
            </ul>
            <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                      <div id='ret' style="margin:20px;"></div>
                      <div id='ret2' style="margin:20px;"></div>
                        
                      <form class="form-horizontal cus-form" id="Add_transaction" method="POST" action="">
                        
                        <table class="table table-bordered">
                        <tr>
                            <td colspan="4">
                                <label>Client</label>
                                <select id="client" name="client" class="form-control input-sm">
                                    <option selected="selected" value=""></option>
                                <?php foreach ($listclientquery->result() as $row): ?>
                                    <option value="<?=$row->CLI_ID ?>"><?php echo $row->CLI_NOM ?></option>
                                <?php endforeach; ?>
                                </select>
                            </td>
                            <td colspan="2">
                                <label>Magasin</label>
                                <select id="magasin" name="magasin" class="form-control input-sm">
                                    <option selected="selected" value=""></option>
                                <?php foreach ($listmagasinquery->result() as $row): ?>
                                    <option value="<?=$row->MAG_ID ?>"><?php echo $row->MAG_NOM ?></option>
                                <?php endforeach; ?>
                                </select>
                            </td>
                            <td colspan="2">
                                <label>Montant total:</label>
                                <h4><label id="montanttotal" style="color:#40dab2;"></label></h4>
                            </td>
                            <td colspan="2">
                              <label >Remise totale:</label>
                                <h4><label id="remisetotale" style="color:#40dab2;"></label></h4>
                            </td>
                            <td colspan="2">
                              <label >Montant à payer:</label>
                                <h4><label id="apayer" style="color:#f95959;"></label></h4>
                            </td>                            
                        </tr>
                          <tr>
                            <td colspan="4">
                                <label>Catégorie d'Articles</label>
                                <select id="article" name="article" class="form-control input-sm">
                                    <option selected="selected" value=""></option>
                                <?php foreach ($listcategoriequery->result() as $row2): ?>
                                    <option value="<?=$row2->CATEG_ID ?>"><?php echo $row2->CATEG_DESIGNATION ?></option>
                                <?php endforeach; ?>
                                </select>
                            </td>

                            <td colspan="2">
                                <label>Quantité</label>
                                <select id="quantite" name="quantite" class="form-control input-sm">
                                    <option selected="selected" value=""></option>
                                
                                </select>
                                <!--input type="text" id="quantite" name="quantite" class="form-control input-sm"/-->
                            </td>

                            <td colspan="2">
                                <label>Montant</label>
                                <input type="text" id="montant" name="montant" class="form-control input-sm"/>
                            </td>

                            <td colspan="2">
                                <label>Remise ponctuelle</label>
                                <input type="text" id="remise" name="remise" class="form-control input-sm"/>
                            </td>
                            <td colspan="2">
                              </br>
                               <a type="button" name="savearticle" id = "addrows" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></a>
                               <a type="button" name="removearticle" id = "removerow" class="btn btn-default"><i class="glyphicon glyphicon-minus"></i></a>
                            </td>
                            </tr>
                        
                    </table>

                    <table id = "example2" class="table table-bordered table-striped display">
                          <thead>
                          <tr>
                            <th style="display: none;">Id</th><th>Article</th><th>Qté</th><th>Prix</th><th>Prix total</th><th>Remise</th><th>Remise Totale</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                          <tr>
                            <th style="display: none;">Id</th><th>Article</th><th>Qté</th><th>Prix</th><th>Prix total</th><th>Remise</th><th>Remise Totale</th>
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
                    
                </div>
                
        </div>
      <div class="box">
            <div class="box-header">
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                        </div>
              <!-- /.box-body -->
             </div>
            <!-- /.box -->
           </div>
          <!-- ./col -->
         </div>
			  </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <b>Mode d'utilisation:</b>
                
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
   $(function () {

    $("#article").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
      var categorie = $(this).val(); /* GET THE VALUE OF THE SELECTED DATA */
      var magasin = $("#magasin").val();

      $('#quantite').empty().append('<option selected="selected" value=""></option>');
      
      var dataString = JSON.stringify({"categorie":categorie,"magasin":magasin}); /* STORE THAT TO A DATA STRING */
      //alert(categorie);
      $.ajax({ /* THEN THE AJAX CALL */
        type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
        url: "<?php echo base_url() ?>home/getQuantite", /* PAGE WHERE WE WILL PASS THE DATA */
        data: dataString, /* THE DATA WE WILL BE PASSING */
        success: function(result){ /* GET THE TO BE RETURNED DATA */

          alert(result);

          for(let index=1;index<=result;index++)
          {
             var opt = document.createElement("option");
             opt.value= index;
             opt.innerHTML = index; // whatever property it has

             // then append it to the select element
             document.getElementById('quantite').appendChild(opt);
          }
        }
      });

    });

    /*$('#example1').DataTable({
      "ajax":{"url":"<?php //echo base_url() ?>dashbord/fetchVentes",
              "dataSrc": "",
              type:'POST'
            },
  'columns': [
      {"data" : "VEN_CODE"},
      {"data" : "CLI_NOM"},
      {"data" : "CLI_PRENOM"},
      {"data" : "VEN_REMISE"},
      {"data" : "VEN_A_PAYER"},
      {"data" : "VEN_CREATED"}
    ]
    });*/
    

  var article = '';
  var value = '';
  var rowdata = [];
  var quantite;
  var montant;
  var montanttotal;
  var remise;
  var remisetotale;

  var elt1 = document.getElementById('client'); 
  var elt2 = document.getElementById('magasin');

$("#addrows").click(function () {

  if(elt1.selectedIndex < 1 || elt2.selectedIndex < 1){
    alert("Séléctionner le client et le magasin");
  }else{
    document.getElementById('client').disabled=true; document.getElementById('magasin').disabled=true;
  
  var elt = document.getElementById('article');

  if(elt.selectedIndex == -1){
      article = null;
      value = null;
  }else{
    article = elt.options[elt.selectedIndex].text;
    value = elt.options[elt.selectedIndex].value;
  }

  if(article && $("#montant").val()&& $("#quantite").val()){

      quantite = Number($("#quantite").val());
      montant = Number($("#montant").val());
      remise = Number($("#remise").val());

      /*var data = {
        "article":article,
        "quantite":quantite
      };*/

      /*$.ajax({
        url: "<?php //echo base_url().'home/checkQuantite'?>",
        type: "POST",
        dataType: "html",
        success: function (data) {
            $('#ret2').eq(0).html(data);
        },
        data: JSON.stringify(data);
      });*/


      montanttotal = Number($("#montant").val())*Number($("#quantite").val());
      remisetotale = Number($("#remise").val())*Number($("#quantite").val());
      $("#example2 tbody").append("<tr><td style=\"display: none;\">"+value+"</td> <td style=\"color:#00c;\">"+article+"</td> <td style=\"color:#ff527f;\">"+quantite+"</td> <td style=\"color:#602080;\">"+$("#montant").val()+"</td> <td style=\"color:#0000FF;\">"+montanttotal+"</td> <td style=\"color:#602080;\">"+remise+"</td> <td style=\"color:#602080;\">"+remisetotale+"</td> <tr>");



      rowdata.push(
      {
        "LC_ARTICLE_ID":""+value,
        "LC_QUANTITE":""+quantite,
        "LC_MONTANT":""+montant,
        "LC_REMISE":""+remise
      });

     //alert(JSON.stringify(rowdata));
     $('#montanttotal').html(Number($('#montanttotal').text())+Number($('#montant').val())*Number($("#quantite").val()));
     $('#remisetotale').html(Number($('#remisetotale').text())+Number($('#remise').val())*Number($("#quantite").val()));
     $('#apayer').html(Number($('#montanttotal').text())-Number($('#remisetotale').text()));
 }
 }
});

$("#creerfacture").click(function(){
  //alert();
  /*request= new XMLHttpRequest();
  request.open("POST", "<?php //echo base_url().'home/add_vente' ?>", true);
  request.setRequestHeader("Content-type", "application/json")*/

  

  if(elt1.selectedIndex === -1){
      client = null;
      clientvalue = null;
  }else{
    client = elt1.options[elt1.selectedIndex].text;
    clientvalue = elt1.options[elt1.selectedIndex].value;
  } 

  if(elt2.selectedIndex === -1){
      magasin = null;
      magasinvalue = null;
  }else{
    magasin = elt2.options[elt2.selectedIndex].text;
    magasinvalue = elt2.options[elt2.selectedIndex].value;
  }

  if(clientvalue !== null || magasinvalue !== null){

  $("#ret").html('<img src="<?php echo base_url() ?>bootstrap/images/loader.GIF"/>');
  rowdata = 
  {"vente":
    {
      "VEN_CLI": clientvalue,
      "VEN_MAGASIN": magasinvalue,
      "VEN_A_PAYER":Number(document.getElementById('apayer').textContent),
      "VEN_REMISE":Number(document.getElementById('remisetotale').textContent),
      "VEN_MONTANT_TOTAL":Number(document.getElementById('montanttotal').textContent) 
    },
    "ligne_commande": rowdata

  };
  //request.send(JSON.stringify(rowdata));

  $.ajax({
    url: "<?php echo base_url().'home/add_vente'?>",
    type: "POST",
    dataType: "html",
    contentType: "application/json",
    success: function (data) {
        $('#ret').eq(0).html(data);
        //throw new Error("Stop talking!");
        //$(div).find('#ret').html(data).end().appendTo($('body'));
        //alert(data);
    },
    data: JSON.stringify(rowdata)
    });
}else{
  alert("Veuillez sélectionner le client et le magasin");
}
    //alert(JSON.stringify(rowdata));
  });



$("#removerow").click(function () {
     var table = document.getElementById("example2");
     var tbody = document.getElementById("example2").getElementsByTagName("tbody")[0].getElementsByTagName("tr");

     tbody = $("#example2 tbody");

     var rowCount = tbody.length;
     alert(rowCount);
    if(rowCount > 2){
     $('#montanttotal').html(Number($('#montanttotal').text())-Number(table.rows[rowCount-2].cells[3].innerHTML));
     $('#remisetotale').html(Number($('#remisetotale').text())-Number(table.rows[rowCount-2].cells[5].innerHTML));
     $('#apayer').html(Number($('#montanttotal').text())-Number($('#remisetotale').text()));
     table.deleteRow(rowCount -2);
   }
    //document.getElementById('client').disabled=true; document.getElementById('magasin').disabled=true;
 });
});
</script>
</body>
</html>
