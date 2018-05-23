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
			<section class="latest-work white-bg light-port padding-bottom-150">
			  <div class=""> 
				
				<!-- Work -->
				<br />
				<div class="heading text-left">
				  <h3> Event <span>Details</span></h3>
				  <hr>
				</div>
				<div class="row">
				  <div class="col-md-8"> <img class="img-responsive" src="<?php echo  base_url('uploads/'.$project['image']); ?>" alt=""> </div>
				  
				  <!-- INTRO INTRO -->
				  <div class="col-md-4">
					<ul class="services-intro">
					  <!-- Architecture -->
					  <li>
						<div class="media-left">
						  <div class="icon"><img src="<?php echo base_url();?>front_assets/images/intro-icon-3.png" alt=""></div>
						</div>
						<div class="media-body">
						  <h6 class="font-normal margin-bottom-10">Event Name</h6>
						  <p><?php echo $project['name']; ?></p>
						</div>
					  </li>
					  <!-- Interior Design -->
					  <li>
						<div class="media-left">
						  <div class="icon"><img src="<?php echo base_url();?>front_assets/images/item-icon-1.png" alt=""></div>
						</div>
						<div class="media-body">
						  <h6 class="font-normal margin-bottom-10">Venue</h6>
						  <p><?php echo $project['venue']; ?></p>
						</div>
					  </li>
					  <!-- Consulting -->
					  <li>
						<div class="media-left">
						  <div class="icon"><img src="<?php echo base_url();?>front_assets/images/item-icon-2.png" alt=""></div>
						</div>
						<div class="media-body">
						  <h6 class="font-normal margin-bottom-10">Date</h6>
						  <p><?php echo date('d-M-Y', strtotime($project['date'])); ?> </p>
						</div>
					  </li>
					  <!-- Special Projects -->
					  <li>
						<div class="media-left">
						  <div class="icon"><img src="<?php echo base_url();?>front_assets/images/item-icon-3.png" alt=""></div>
						</div>
						<div class="media-body">
						  <h6 class="font-normal margin-bottom-10">Duration</h6>
						  <p><?php echo $project['duration']; ?></p>
						</div>
					  </li>
					</ul>
				  </div>
				</div>
				<div class="project-detail margin-top-50 margin-bottom-50">
				  <h3 class="font-normal margin-bottom-30">Project <span class="primary-color">Description</span></h3>
				  <div>
				  <?php echo $project['description']; ?>
				  </div>
				</div>
			  </div>
			</section>
			</div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   
    

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
