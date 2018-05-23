<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('header'); ?>
<body>


	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>Contact Us</h2>
					<ul class="breadcumb">
						<li><a href="<?php echo base_url();?>">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>Contact Us</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>


	<section class="contact-content sec-padding">
		<div class="container">
			
			
			<div class="row">
				<div class="col-md-8">
					<h2>Contact Form</h2>
					<form action="http://wp1.themexlab.com/html/charity-home/inc/sendemail.php" class="contact-form row" id="contact-page-contact-form">
						<div class="col-md-6">
							<input type="text" name="name" placeholder="Name">
							<input type="text" name="email" placeholder="Email">
							<input type="text" name="phone" placeholder="Phone">
							
						</div>
						<div class="col-md-6">
							<textarea name="message" placeholder="Message" cols="30" rows="10"></textarea>
						</div>
						<div class="col-md-12"><button class="thm-btn" type="submit">Send</button></div>
					</form>
				</div>
				<div class="col-md-4">
					<h2>Address</h2>
					<ul class="contact-info">
						<li>
							<div class="icon-box">
								<div class="inner">
									<i class="fa fa-map-marker"></i>
								</div>
							</div>
							<div class="content-box">
								<h4>Address</h4>
								<p>Mirpur New Bazar Road, Block-c, <br>Uttara, Dhaka-1210</p>
							</div>
						</li>
						<li>
							<div class="icon-box">
								<div class="inner">
									<i class="fa fa-phone"></i>
								</div>
							</div>
							<div class="content-box">
								<h4>Phone</h4>
								<p>(732) 803-01 03, (732) 806-01 04, (880)172380129</p>
							</div>
						</li>
						<li>
							<div class="icon-box">
								<div class="inner">
									<i class="fa fa-envelope-o"></i>
								</div>
							</div>
							<div class="content-box">
								<h4>Email</h4>
								<p>indiaglads@gmail.com</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>


	<?php $this->load->view('footer'); ?>



</body>

<!-- Mirrored from wp1.themexlab.com/html/charity-home/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Aug 2016 11:51:48 GMT -->
</html>