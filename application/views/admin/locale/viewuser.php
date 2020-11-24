<div class="container conbre">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . 'dashbord/manageUser' ?>">Paramètre</a></li>
        <li class="active">Gérer Utilisateur</li></li>
        
    </ol>
    <?php
    if($this->session->flashdata('falsh'))
            echo $this->session->flashdata('falsh');
            ?>
</div>
        
        
        <div class="container well" style="margin-top: -15px; width: 83.5%">
            <div class="row clearfix" style="border-bottom: 1px solid #ddd; padding-bottom: 4px;margin-bottom: 5px">
                <div class="col-md-12 column">
                    <a id="modal-666931" href="#modal-container-666931" role="button" class="btn btn-default btn-sm" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i>Ajouter</a>&nbsp;
                        
                </div>
                
            </div>
	<div class="row clearfix">
		<div class="col-md-12 column">
                        <table class="table">
				<thead>
                                    <tr>
                                        <th>S. NO.</th><th>Nom d'utilisateur</th><th>Addresse Email</th><th>Role</th><th>Est Actif</th><th>Mot de passe</th><th>Créé</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
				<tbody><?php $sno = 1; ?>
                                     <?php foreach ($query->result() as $row): ?>
                                    
                                    <tr class="tbl_view">
                                        
						<td>
							<?php echo $sno; ?>
						</td>
						<td>
							<?=$row->user_name ?>
						</td>

						<td>
							<?=$row->user_email?>
						</td>
                                                <td>
							<?=$row->role?>
						</td>
                                                
                                                <td>
                                                    <a href="#" class="is_active" data-type="select" data-pk="<?= $row->id?>" data-url="<?php echo base_url() ?>dashbord/updateUserStstus" data-title="Select status"><?php echo $row->is_active ?></a>
						</td>
                                                <td>
                                                    <a href="#" name="password" class="password" data-type="text" data-pk="<?= $row->id?>" data-url="<?php echo base_url() ?>dashbord/updateUserPass" data-title="Enter new Password">********</a>
                                                </td>
                                                
						<td>
							<?php 
                                                        $created = strtotime($row->d_o_c);
                                                        echo date('F jS Y', $created )?>
						</td>
                                                
                                                <td>
                                                    <div class="btn-group">
                                                        <form method="POST" id='deluser' action="<?php echo base_url() ?>dashbord/delUser" ><input type="hidden" name="id" value="<?php echo $row->id ?>"/> <button  class="btn btn-default btn-sm btn_delete"  type="submit" title="Supprimer"><i class="glyphicon glyphicon-remove"></i></button></form>
                                                     </div>
                                                    
						</td>
					</tr>
                                        <?php $sno = $sno+1;  endforeach; ?>
					
                                        
                                    
					
				</tbody>
                                   
			</table>
                   <hr style="margin: 0"/>
                   <table  cellspacing="10">
                       <tr>
                           <td><form style="display: inline" action="<?php echo base_url() ?>init/transactionExcel">
                                <button class="btn btn-warning btn-sm" type="submit">Enregistrer au format Excel</button>
                                </form>
                           </td>
                       </tr>
                   </table>
                   
                </div>
             
	</div>
</div>



<div class="modal fade" id="modal-container-666931" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Ajouter</h4>
                    </div>

                    <div class="modal-body">
                        <div id='ret'></div>
                        
                          <form class="form-horizontal cus-form" id="Add_transaction" method="POST" action="<?php echo base_url().'dashbord/createUser' ?>"  data-parsley-validate>
                        
                        <table class="table table-bordered">
                        <tr>
                            <td colspan="2">
                                <label>Nom d'utilisateur</label>
                                <input type="text" name="name" id='name' class="form-control input-group-sm" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Adresse Email</label>
                                <input type="email" name="email" id='email' class="form-control input-group-sm" required/>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <label>Créer mot de passe</label>
                                <input type="password" name="password" id='password' class="form-control  input-group-sm" required data-parsley-minlength="6"/>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <label>Confirmer le mot de passe</label>
                                <input type="password" name="cpassword" id='cpassword' class="form-control  input-group-sm" required />
                            </td>
                            
                        </tr>
                        
                        <tr>
                            <td>
                                <label>Choisir le Role</label>
                                <select id="role" name="role" class="form-control input-sm">
                                    <option selected="selected" value="regular">Normal</option>
                                    <option  value="admin">Admin</option>
                                </select>
                            </td>
                            
                        </tr>
                        
                        <tr>
                            <td>
                                <div>
                                <label>Est Actif</label>  
                                </div>
                                <div class="tran-type">
                                    <label>Oui</label>
                                        <input type="radio" value="1" name="is_active" style="display: inline">
                                    
                                    <label>Non</label>
                                    <input type="radio" checked="checked" value="0" name="is_active" style="display: inline">
                                    
                                
                                </div>
                            </td>
                            
                        </tr>
                        
                        
                        
                        
                    </table>
                    <div style="padding-left: 10px; padding-bottom: 10px; margin-top: -8px;">
                        <button type="submit" name="submit" class="btn btn-success">Enregistrer</button>
                        <button id="cancle" name="cancle" class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</button>                
                    </div>
                        
                </form>
                    </div>

                    </div>
                    
                </div>

            </div>



<a class="confirmLink" href="#"></a>
<div id="dialog" title="Confirmation Required">
  Voulez-vous vraiment procéder à la suppression?
</div>

<!--Refresh window when modal close-->
<script>
$("#modal-container-666931").on('hidden.bs.modal', function(e){window.location.reload();});
</script>

<script>
$(document).ready(function (){
$('.password').editable();
$('.is_active').editable({
     source: [
        {value: 1, text: '1'},
        {value: 0, text: '0'}
        
    ]
});

$(".btn_delete").on('click', function (e){
e.preventDefault();
console.log('dele');
$('.confirmLink').trigger('click'); return false;
});    
    

$("#dialog").dialog({
autoOpen: false,
modal: true
});


$(".confirmLink").click(function(e) {
e.preventDefault();
var targetUrl = $(this).attr("href");

$("#dialog").dialog({
buttons : {
"Confirm" : function() {
$(this).dialog("close");
delfun();
          
},
"Cancel" : function() {
$(this).dialog("close");
return false;
}
}
});

$("#dialog").dialog("open");
});
  
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


var delfun = function(){
    $("#deluser").submit();
};
  
  
});
</script>

  </body>
</html>