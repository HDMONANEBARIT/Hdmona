<?php 
//error_reporting( ~E_NOTICE );
	require("includes/header.php");	
	require("includes/conDb.php");
	require_once("includes/functions.php");
	require_once("crud.php");
// $stmt= $DB_con->prepare('SELECT * FROM movie');
// $stmt->execute();
// $count = $stmt->rowCount();
// echo $count;
		if (isset($_POST['restbtn'])) {
			$email = check_variable($_POST['user_email']);
			$password = check_variable($_POST['user_password']);
			$sec_password = check_variable($_POST['sec_user_password']);
			if ($sec_password == $password) {
				
			$chkempty = $crud->check_empity_user($email, $password);
			if ($chkempty== true) {
				$chk_email = $crud->check_email($email);
				if ($chk_email == true) {
					$hdmona_user_reset_code = md5(rand());
					$update = $crud->update_reset($email, $password, $hdmona_user_reset_code);
					$base_url = "http://localhost/hdmona/";
					$message = "<div style='margin-left: 300px; width:700px; height: 350px;'>
					<p style='background-color:; margin-top:20px; font-size: 30px;'>Please Open this to verify your email address -</br> <a href='".$base_url."resetaccount.php?hdmona_user_reset_code=".$hdmona_user_reset_code."' style='text-decoration:underline;'>Hdmona Activation code</a></div>";
					
						$sending_mail=$crud->send_mail($email, $user, $message);
						if($sending_mail== true){
							 	$mess = '<label class="text-success" style="color: green;">Reset Done, Please check your mail.</label>';
						   } else{
						   		$mess = '<label class="text-error" style="color: red;">Sorry we couldn\'t Send u Confermation Code.</label>';
						   }
				}
			}
		}else {
			$email = check_variable($_POST['user_email']);
			$messs = '<label class="text-error" style="color: red;">your passwords are different!!!</label>';
		}
	}
?>


<body>	
	<?php  require("includes/header_topics.php") ?>
		<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/assetes/hdmona_nebarit_2.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-12 col-md-offset-0 text-center slider-text">
		   				<div class="slider-text-inner js-fullheight">
		   					<div class="desc">
		   						<p><span></span></p>
		   						<h2> Account Reset</h2>
			   					<p>
			   						<a href="#email" class="btn btn-primary btn-lg" style="background-color: #000000; margin-top: -150px">Subscribe Now</a>
			   					</p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/assetes/slider2.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-12 col-md-offset-0 text-center slider-text">
		   				<div class="slider-text-inner js-fullheight">
		   					<div class="desc">
		   						<p><span>MOVIES AT A TIME</span></p>
		   						<h2>Watch The Latest Movies </h2>
			   					<p>
			   						<a href="#email" class="btn btn-primary btn-lg" style="background-color: #000000; margin-top: -150px">Subscribe Now</a>
			   					</p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>  
		   	<li style="background-image: url(images/assetes/image-3.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-12 col-md-offset-0 text-center slider-text">
		   				<div class="slider-text-inner js-fullheight">
		   					<div class="desc">
		   						<p><span>MOVIES AT A TIME</span></p>
		   						<h2>Watch The Latest Movies </h2>
			   					<p>
			   						<a href="#email" class="btn btn-primary btn-lg" style="background-color: #000000; margin-top: -150px">Subscribe Now</a>
			   					</p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li> 
		   	<li style="background-image: url(images/assetes/image-1.png);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-12 col-md-offset-0 text-center slider-text">
		   				<div class="slider-text-inner js-fullheight">
		   					<div class="desc">
		   					<p><span>MOVIES AT A TIME</span></p>
		   						<h2>Watch The Latest Movies </h2>
			   					<p>
			   						<a href="#email" class="btn btn-primary btn-lg" style="background-color: #000000; margin-top: -150px">Subscribe Now</a>
			   					</p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/assetes/hdmona_nebarit.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-12 col-md-offset-0 text-center slider-text">
		   				<div class="slider-text-inner js-fullheight">
		   					<div class="desc">
		   					<p><span>LATEST MUSIC</span></p>
		   						<h2> Enjoy Your Life With Music</h2>
			   					<p>
			   						<a href="#email" class="btn btn-primary btn-lg" style="background-color: #000000; margin-top: -150px">Subscribe Now</a>
			   					</p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>		   	
		  	</ul>
	  	</div>
	</aside>
		</div>	
			
   	 <div id="testimonial" style="background-color:transparent ; margin-top: 100px;">
		<div id="section4">
			<!-- Start Contact Area -->
			<section id="contact-area" class="contact-section" >
				<div class="container" >
					<div class="row" >
						<div class="col-sm-12 text-center inner">
							<div class="contact-content section-title text-center">
								<h2 style="color: black; font-size: 27px;font-style: bold; text-decoration: underline;">Forgot your password ?</h2>
								<p>To reset your password, enter your email address, you use to sign in to site. We will then send you conformation to use new password. </p>
							</div>
						</div>
					</div>
					<?php echo $mess; ?>
					<div class="row">
						<div class="col-lg-12">
							<form action="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="contact-form" id="contact-form">
								<div class="form-group">
									
									<label> Email:- </label><input type="email" name="user_email" class="form-control" id="name" value="<?php echo $email;?>" style="color: black;" />
									<label> Password:- </label><input type="password" name="user_password" class="form-control" id="password" placeholder="password" style="color: black;" />
									<label> Reapeat Password:- <?php echo $messs;?> </label><input type="password" name="sec_user_password" class="form-control" id="password" placeholder="password" style="color: black;" />
									<button name="restbtn" type="submit" onclick="pass_equal();"class="btn btn-primary" style="margin-top: 30px; height: 40px; width: 280px; background-color: black; color: white; border: 1px solid white;">Reset</button>
								</div>
							</form>    
						</div>                
					</div>
				</div>
			</section>
			<!-- End Contact Area -->
		</div>
	</div>
<?php  require("includes/footer.php"); ?>