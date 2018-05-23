<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="hayertech">

    <title>Ace - Admin</title>

   <?php $this->load->view('admin/meta'); ?>

</head>

<body>

    <div id="wrapper">

       <?php $this->load->view('admin/nav'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Categories</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<div class="col-sm-6">
								Manage Categories
							</div>	
							<div class="text-right col-sm-6">
								<button type="button" id="call-add-cat" class="btn btn-primary"><i class="fa fa-plus"></i> Add Category</button>
							</div>
							<div class="col-sm-12 text-center">
								<?php echo $this->session->flashdata('category'); ?>
							</div>
							<div class="clearfix"></div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i = 1; foreach($categories as $row) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['name']; ?> </td>
                                            <td>
												<button type="button" cat="<?php echo $row['name']; ?>" data="<?php echo $row['id']; ?>" class="btn btn-primary call-edit-cat"><i class="fa fa-pencil"></i> Edit</button>
												<button type="button" data="<?php echo $row['id']; ?>" class="btn btn-danger del-cat"><i class="fa fa-trash"></i> Delete</button>
											</td>
                                        </tr>
									<?php } ?>	
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   

    <div id="myModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- dialog body -->
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <div class="clearfix"></div>
				  <br />
                  <div class="row mar20">
                      <div class="col-md-12">
                          <form class="form-horizontal col-md-12" method="POST" name="" action="<?php echo base_url('admin/add_category'); ?>" id="addnewcat" enctype="multipart/form-data">  
                        <div class="form-group">
                             <input class="form-control" type="text" name="cat" placeholder="Category Name" id="form-cat-name">
                            
                        </div>
                        <div class="form-group text-right">
                            <span id="loader"></span> 
                            <button type="button" id="add-new-cat" class="btn btn-primary">Submit</button>
                        </div>  
                        </form> 
                        <div class="clearfix"></div>  
                      </div>    
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        <!--Delete category model-->
        <div id="edit-cat-modal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- dialog body -->
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <div class="clearfix"></div>
				  <br />
                  <div class="row mar20">
                      <div class="col-md-12">
                        <form class="form-horizontal col-md-12" method="POST" name="" action="<?php echo base_url('admin/edit_category'); ?>" id="editcat" enctype="multipart/form-data">  
                        <div class="form-group">
                            <input class="form-control" type="text" name="cat" placeholder="Category Name" id="form-cat-edit-name">
                            <input class="form-control" type="hidden" name="id" id="form-cat-edit-id">
                        </div>
                        <div class="form-group text-right">
                            <span id="loader"></span> 
                            <button type="button" id="edit-cat" class="btn btn-primary">Submit</button>
                        </div>  
                        </form> 
                        <div class="clearfix"></div>  
                      </div>    
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        
        <script>
            $(document).on('click','#call-add-cat',function(){
               // bootbox.alert('hello');
                $('#myModal').modal('show');
            });
            $(document).on('click','.call-edit-cat',function(){
               // bootbox.alert('hello');
                var cid = $(this).attr('data');
                var cname = $(this).attr('cat');
                $('#form-cat-edit-name').val(cname);
                $('#form-cat-edit-id').val(cid);
                $('#edit-cat-modal').modal('show');
            });
              $(document).on('click','#add-new-cat',function(){
               // bootbox.alert('hello');
                var cat = $.trim($('#form-cat-name').val());
                if(cat==''){
                   $('#form-cat-name').css({'border':'1px solid red'});
                   $('#form-cat-name').focus();
                   return false();
               } else {
                   $('#form-cat-name').css({'border':''});
               }
               $('#loader').html('<img id="loader" src="<?php echo base_url(); ?>admin_assets/img/Preloader.gif">');
               $('#addnewcat').submit();
                /*
                $.ajax({
                    type: "POST",
                    url: "admin/add_category",
                    data: 'cat='+cat,
                    success: function(result){
                        //alert(result);
                        $('#loader').html('');
                        if($.trim(result)=='success'){
                           $('#add-error-msg').html(''); 
                           $('#myModal').modal('hide');
                           $('#form-cat-name').val('');
                           bootbox.alert('category added successfully')
                        } else {
                            $('#add-error-msg').html('Something went wrong, please try again');
                        }
                    }
                });
                */
            });
             $(document).on('click','#edit-cat',function(){
               // bootbox.alert('hello');
                var cat = $.trim($('#form-cat-edit-name').val());
                var cid = $('#form-cat-edit-id').val();
                if(cat==''){
                   $('#form-cat-edit-name').css({'border':'1px solid red'});
                   $('#form-cat-edit-name').focus();
                   return false;
               } else {
                   $('#form-cat-edit-name').css({'border':''});
               }
              // $('#loader').html('<img id="loader" src="<?php echo base_url(); ?>admin_assets/img/Preloader.gif">');
               $('#editcat').submit();
           });   
            $(document).on('click','.del-cat',function(){
                var cid = $(this).attr('data');
                //alert(cid);
                bootbox.confirm("Are you sure?", function(result) {
                    if(result==true){
                        window.location.href='<?php echo base_url(); ?>admin/delete_category?id='+cid;
                    }
                }); 
            })
        </script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>admin_assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>admin_assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>admin_assets/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
