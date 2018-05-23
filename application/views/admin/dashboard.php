<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="hayertech">

    <title>GLADS - Admin</title>

   <?php $this->load->view('admin/meta'); ?>

</head>

<body>

    <div id="wrapper">

       <?php $this->load->view('admin/nav'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<div class="col-sm-6">
								Manage Events
							</div>	
							<div class="text-right col-sm-6">
								<a href="<?php echo base_url('admin/add_project'); ?>" type="button" id="call-add-cat" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Event</a>
							</div>
							<div class="col-sm-12 text-center">
								<?php echo $this->session->flashdata('project'); ?>
							</div>
							<div class="clearfix"></div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="row">
						   <?php foreach($projects as $row){ ?>
								<div class="col-sm-12 col-md-4 col-lg-4">
								
									<div class="mi-project">
										<div class="mi-project-img">
											<img src="<?php echo  base_url('uploads/thumbnails/'.$row['image']); ?>" alt="" height="" width="">
										</div>
										<div class="mi-project-name">
											<?php echo $row['name']; ?>
										</div>
										<div class="mi-project-buttons">
											<ul>
												<li><a href="<?php echo base_url('admin/view_project/'.$row['id']); ?>"><span class="glyphicon glyphicon-picture"></span> View</a></li>
												<li><a href="<?php echo base_url('admin/edit_project/'.$row['id']); ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a></li>
												<li><a class="del-cat" href="#" data="<?php echo base_url('admin/delete_project/'.$row['id']); ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a></li>
											</ul>
										</div>
									</div>
									
								</div>
							 <?php } ?>	
						   </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	 <script>
    $(document).on('click','.del-cat',function(e){
				e.preventDefault();
                var cid = $(this).attr('data');
                //alert(cid);
                bootbox.confirm("Are you sure?", function(result) {
                    if(result==true){
                        window.location.href=cid;
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
