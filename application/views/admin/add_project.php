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
   
   <script src="<?php echo base_url('ckeditor/ckeditor.js'); ?>"></script> 
	<script src="js/bootstrap-datepicker.min.js"></script>
</head>

<body>

    <div id="wrapper">

       <?php $this->load->view('admin/nav'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ADD EVENT</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<form action="<?php echo base_url('admin/add_new_project'); ?>" method="post" enctype="multipart/form-data">
                <div class="col-lg-12"> 
                    <div class="col-md-6">
						<div class="form-group">
							<label>Event Name<span class="text-danger">*</span></label>
							<input name="project_name" required class="form-control">
						</div>
					</div>
					<!--<div class="col-md-6">
						<div class="form-group">
							<label>Category<span class="text-danger">*</span></label>
							<select name="category" required class="form-control">
								<option>select</option>
								<?php foreach($categories as $row){ ?> 
									<option value="<?php echo $row['id']; ?>"><?php echo ucfirst($row['name']);?></option> 
								<?php  }?>
							</select>
						</div>
					</div>-->
					<div class="col-md-6">
						<div class="form-group">
							<label>Venue<span class="text-danger">*</span></label>
							<input name="client" required class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Date<span class="text-danger">*</span></label>
							<!--<input name="location" required class="form-control">-->
							<input type="text" name="txtDate" id="txtDate" maxlength="10" required class="form-control" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Duration<span class="text-danger">*</span></label>
							<input name="duration" required class="form-control">
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group">
							<label>Description<span class="text-danger">*</span></label>
							<textarea  class="ckeditor" name="description" class="form-control"></textarea>
						</div>
					</div> 
					<div class="col-md-12 form-group">
						<div class="">
							<label>Feature Image<span class="text-danger">*</span></label>
							<div id="feature-img-div"> 
								<div class="feature-img-block">   
									<input id="feature-img" class="photoimgat" name="userfile[]" onchange="ShowPreview(this)" data="1" type="file">
								</div>
							</div>    
						</div> 
					</div> 
					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div> 
					</div> 
                </div>
				</form>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script>
	$(document).ready(function(){
	
	$('#txtDate').datepicker({
                format: "yyyy-mm-dd",
                orientation: "top auto",
                autoclose: true,
                todayHighlight: true,
                clearBtn:false,
            }).on("changeDate",function(e){changed=true;}).on("clearDate",function(e){changed=true;});

});
	function ShowPreview(input) {
        var data = $(input).attr('data'); 
        //alert(data);
        if (input.files && input.files[0]) {
            var data_name = input.files[0]['name'];
            var name_length = data_name.length;
            if(name_length > 8){
                var name_trim = data_name.substring(0,8) + '..';
            } else {
                name_trim = data_name;
            } 
            //alert(name_trim);
            var extension = $.trim( data_name.substr( (data_name.lastIndexOf('.') +1) ) );
            //var 
            
            if(extension == 'jpg' || extension == 'jpeg'){
                var ImageDir = new FileReader();
                ImageDir.onload = function (e) {
                    //$('#impPrev').attr('src', e.target.result);
                    if(data == '1'){
                        $('.feature-img-block').hide(); 
                        $('#feature-img-div').append('<div class="block-thumb-feature"><a class="change-img" type="fimg" data="'+data+'" ><img src="'+ e.target.result +'" alt="" width="100%" ></a></div>');
                        $('.feature-img-block').css('border','');
                    } 
                }
                ImageDir.readAsDataURL(input.files[0]);
            } else{
               alert('Please upload only JPG or JPEG image files.')
                return false;
            }
        }
    }
	
	$(document).on('click','.change-img', function(){
        var data = $(this).attr('data');
        var type = $(this).attr('type');      
        if(type == 'img'){
            $('#upThumb-li-'+data).html('<div id="upThumb-'+data+'" class="upThumb"><input onchange="ShowPreview(this)" name="userfile[]" data="'+data+'" type="file"></div>');
        } else if(type == 'file'){
            $('#upThumb-file-li-'+data).html('<div id="upThumb-file-'+data+'" class="upThumb"><input onchange="ShowFilePreview(this)" name="file[]" data="'+data+'" type="file"></div>');
        } else if(type == 'fimg'){
            $('#feature-img-div').html('<div class="feature-img-block"><input id="feature-img" class="photoimgat" name="userfile[]" onchange="ShowPreview(this)" data="1" type="file"></div>');
        }
    });
	
	
	
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
