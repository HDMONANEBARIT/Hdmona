<?php
error_reporting( ~E_NOTICE );
	require("includes/header.php");
	require_once("includes/conDb.php");
	require_once("includes/session.php");
	require_once("includes/functions.php");
	require_once("crud.php");

	// if (!empty($_SESSION['user_id'])) {
	// 	echo "session";
	// 	echo $_SESSION['user_id'];
	// }else{
	// 	echo "no session";
	// }


	// this is from pop up sighn in 
	 if (isset($_POST['login_user'])) {

		if ($session->check_session()==true) {
			 $ses = $session->logout();
				$user_name = check_variable($_POST['sign_name']);
				$user_password = check_variable($_POST['sign_password']);
					
				$chk_emp_user = $crud->check_empity_user($user_name, $user_password);
			
				if ($chk_emp_user == true) {
						$chk_in_db = $crud->check_sign_in_exist($user_name, $user_password);
							if ($chk_in_db == 1) {
									 $user = $crud->getID($user_name);
									 
									 $ses = $session->login($user);
							}else{
							  echo "<script> alert('r u sure u are not new');</script>";
							} 
						}else{
						echo "<script language='text/javascript'> alert('fill them all please'); </script>";
				}
			}elseif (empty($_SESSION['user_id'])) {

			$user_name = check_variable($_POST['sign_name']);
			$user_password = check_variable($_POST['sign_password']);
				
			$chk_emp_user = $crud->check_empity_user($user_name, $user_password);
			
				if ($chk_emp_user == true) {
						$chk_in_db = $crud->check_sign_in_exist($user_name, $user_password);
							if ($chk_in_db == 1) {
									 $user = $crud->getID($user_name);
									  //$_SESSION['user_id'] = $user;
										 $ses = $session->login($user);
									  header("Location: update_account.php");
							   }else{
							  echo "<script> alert('check Again Please');</script>";
							} 
						}else{
						echo "<script language='text/javascript'> alert('fill them all please'); </script>";
				}
		 }
	} 

 	$ses_id = $_SESSION['user_id'];
	
  	  $query = "SELECT * FROM users WHERE id = '$ses_id'";
      $stmt = $crud->query_sele($query);
      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $user_id = $row['name'];
      
	  if (isset($_POST['send_it'])) {
	  		if ($session->check_session()== true) {
	  			

  			//function check special chars 
			$user = check_variable($_POST['user_name']);
			$email = check_variable($_POST['user_email']);
			$re_password = check_variable($_POST['ruser_password']);
			$password = check_variable($_POST['user_password']);
			$imgFile = $_FILES['user_image']['name'];
			$tmp_dir = $_FILES['user_image']['tmp_name'];
			$imgSize = $_FILES['user_image']['size'];

			if ($password == $re_password) {
				
			
				  $upload_dir = 'images/usr_img/'; 
					$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
					$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
					$userpic = rand(1000,1000000).".".$imgExt;
						move_uploaded_file($tmp_dir, $upload_dir.$userpic);
					// check empity user input 
				$chk_empty = $crud->check_empity_UPDATE($user, $email, $password, $imgFile);

				if ($chk_empty == true) {
					//sending image
						$updating= $crud->update_insert($user, $email, $password, $userpic, $ses_id);
							if ($updating == "asd") {
								 echo  $updating; 
								echo "<script type='text/javascript'>alert('SORRY!!! ERROR IN UPDATING ')</script>";
							}
					}elseif ($chk_empty == "empity"){
						$chk_db= $crud->check_user_exist_update($user, $email, $password, $ses_id);
						if ($chk_db > 0) {
									echo "<script type='text/javascript'>alert('NO change !!!')</script>";
							 }elseif ($chk_db == 0) {
							$insert_updated->$crud-> update($user, $email, $password); 		
						} 
					}elseif ($chk_empty == false) {
					$upsd = $crud->update_insert($user_id, $email, $password, $userpic);
				}	
			  }	else{
			  	$lopaserr = '<h10 style="color: red;">wrong password</h10>';
			  }				
			}else {
				$login = '<h1 style="color: red; text-align: center;">Login First Please</h1>';

			}
}


?>
<div id="testimonial2">
		<div id="section4">
			<!-- Start Contact Area -->
			<section id="contact-area" class="contact-section" >
				<div class="container" style="background-color: black; border: 1px solid white;">
					<div class="row" >
						<div class="col-sm-12 text-center inner">
							<div class="contact-content section-title text-center">
								<h2>Login</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<form action="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="contact-form" id="contact-form">
								<div class="form-group">
									<input name="sign_name" type="text" class="form-control me " id="name" placeholder="Name" />
									<input name="sign_password" type="password" class="form-control" id="subject" placeholder="Password"/>
									<button name="login_user" type="submit" class="btn btn-primary" style="margin-top: 30px; height: 40px; width: 280px; background-color: black; color: white; border: 1px solid white;border-radius: 100px;">Submit</button>
									<div class="col-md-6" style="margin-top: 0px; width: 100%">
										<div class="col-md-12">
										<button onclick="div_hide()"name="cancel" type="submit" class="btn btn-primary" style="margin-top: 10px; height: 40px; width: 280px; background-color: black; color: white; border: 1px solid white;border-radius: 100px; margin-left: -40px;">cancel</button>
											<ul class="contact-info">
												<a href="resetaccount.php" style="color: white; font-size: 13px;">lost password ?</a></br>
												<a href="#" onclick="div_show()" style="color: #f8e69f; font-size: 13px;">Not here before</a></li>
											</ul>
									</div>
								</div>
							  </div>
							</form>    
						</div>                
					</div>
				</div>
			</section>
			<!-- End Contact Area -->
		</div>
	</div>
<body>
	<div id="fh5co-wrapper">
	<div id="fh5co-page">
	<?php require("includes/header_topics.php");?>
	<!-- end:fh5co-header -->

	<div class="fh5co-parallax" style="background-image: url(images/assetes/hdmona_nebarit_4.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
					<div class="fh5co-intro fh5co-table-cell">
						<h1 class="text-center"><strong>Account Update </strong></h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="testimonial" style="background-color: gray; margin-top: -30px;">
		<div id="section4">
			<!-- Start Contact Area -->
			<section id="contact-area" class="contact-section" >
				<div class="container" >
					<div class="row">
						<div><?php echo $login; ?></div>
						<div class="col-lg-12">
							<form action="update_account.php" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="contact-form" id="contact-form" enctype="multipart/form-data"/>
								<div class="form-group">
								<label>Name : </label>
								<input name="user_name" type="text" class="form-control" id="name" placeholder="<?php echo  $row['name'];?>" />
								<label>email :</label>
								<input  name="user_email"type="email" class="form-control" placeholder="<?php echo  $row['email'];?>" id="email" />
								<label>password :</label>
								<input name="user_password" type="password" class="form-control" id="subject" placeholder="<?php echo $row['password'];?>"/>

								<label>repeat password :</br></label> 
								<label><?php echo '</br>'.$lopaserr.'</br>'; ?></label>
								<input name="ruser_password" type="password" class="form-control" id="subject" placeholder="repeat password"/>
								<img src="images/assetes/pro_image.png" hreff="" style="margin-top: 10px; width: 50px;"> 
								<input  type="file" name="user_image" class="imgs input-group"  accept="image/*" />
								<button name="send_it" type="submit" class="btn btn-defult" style="margin-top: 30px; height: 40px; width: 280px; background-color: #4b4b4b; color: black; border: 1px solid white;">Submit</button>
								<div class="col-md-6" style="margin-top: 0px; width: 100%">
									<div class="col-md-12">
										<ul class="contact-info">
											<a href="resetaccount.php" style="color: white; font-size: 13px;">forget my password ?</a></br>
											<a id="pop_up" onclick="div_show()" style="color: #f8e69f; font-size: 13px; cursor: pointer;">Login In</a></li>
										</ul>
									</div>
								</div>
							</div>
							</form>    
						</div>                
					</div>
				</div>
			</section>
			<!-- End Contact Area -->
		</div>
	</div>
</div>
	<!--forbegin-->
	<?php require("includes/footer.php")?>
