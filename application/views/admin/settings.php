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
                    <h4 class="page-header">Settings</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="row">
                 <div class="col-sm-12">
                  <!-- START panel-->
                  <div class="panel panel-default">
                     <div class="panel-heading">change Password</div>
                     <div class="panel-body">
                        <form class="form-horizontal" method="POST" name="" action="<?php echo base_url('admin/change_password'); ?>" id="" enctype="multipart/form-data">
                           <div class="text-center text-danger" id="error-msg"><?php echo $this->session->flashdata('change_password'); ?></div> 
                           <div class="form-group">
                              <div class="col-lg-12">
                                 <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                              </div>
                           </div> 
                           <div class="form-group">
                              <div class="col-lg-12">
                                 <input type="password" name="npassword" id="npassword" placeholder="New Password" class="form-control">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-lg-12">
                                 <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="form-control">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-lg-12">
                                 <button type="submit" id="change-password" class="btn btn-sm btn-default">Update</button> <span id="loader"></span>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <!-- END panel-->
               </div>
                 <div class="clearfix"></div>
             </div>
            <!-- /.row -->
			
			 <div class="row">
                 <div class="col-sm-12">
                  <!-- START panel-->
                  <div class="panel panel-default">
                     <div class="panel-heading">Change Contact Email</div>
                     <div class="panel-body">
                        <form class="form-horizontal" method="POST" name="" action="<?php echo base_url('admin/change_email'); ?>" id="" enctype="multipart/form-data">
                           <div class="text-center text-danger error-div"><?php echo $this->session->flashdata('change_email'); ?></div>
                           
                           <div class="form-group">
                              <div class="col-lg-12">
                                 <input type="email" name="email" required id="email"  value="<?php echo $email; ?>" placeholder="Email" class="form-control">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-lg-12">
                                 <button type="submit" class="btn btn-sm btn-default">Update</button> <span id="loader"></span>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <!-- END panel-->
               </div>
                 <div class="clearfix"></div>
             </div>
        </div>
        <!-- /#page-wrapper -->
         <!-- START Page footer-->
         
         <script>
			setInterval(function(){$('.msg-overlay').fadeOut(); }, 2000);
            $(document).on('click','#change-password',function(e){
               var password = $.trim($('#password').val()); 
                var npassword = $.trim($('#npassword').val()); 
               var cpassword = $.trim($('#cpassword').val());
                if(password == ''){
                   $('#password').css({'border':'1px solid red'});
                   $('#password').focus();
                   return false;
               } else {
                   $('#password').css({'border':''});
               }
               if(npassword == ''){
                   $('#npassword').css({'border':'1px solid red'});
                   $('#npassword').focus();
                   return false;
               } else {
                   $('#npassword').css({'border':''});
               }
               if(cpassword == ''){
                   $('#cpassword').css({'border':'1px solid red'});
                   $('#cpassword').focus();
                   return false;
               }
               if(npassword != cpassword){
                    $('#cpassword').css({'border':'1px solid red'});
                    $('#cpassword').focus();   
                    $('#error-msg').html("password don't match");
                    return false; 
               }
               else {
                   $('#error-msg').html("");
                   $('#cpassword').css({'border':''});
               }
               $('#loader').html('<img id="loader" src="<?php echo base_url(); ?>admin_assets/img/Preloader.gif">');
               // $.ajax({
                // type: "POST",
                // url: "admin/change_password",
                // data: 'password='+password+'&cpassword='+cpassword+'&npassword='+npassword,
                // success: function(result){
                    //alert(result);
                    // $('#loader').html('');
                    // if(result == 'invalid'){
                       // $('#error-msg').html('Enterd wrong password');
                    // }
                    // else if($.trim(result) == 'success'){
                        // $('#password').val('');
                        // $('#npassword').val('');
                        // $('#cpassword').val('');
                       // bootbox.alert('Password has been changed successfully');
                    // } else {
                        // $('#error-msg').html('Please try again, some went wrong');
                    // }
                // }
            // });
            });
        </script>
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
