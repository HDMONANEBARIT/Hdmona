<?php 
			error_reporting( ~E_NOTICE );
			require_once("includes/functions.php");
			require_once("includes/admin_crud.php");
			require_once("includes/conDb.php");
			require_once("includes/session.php");

		if (isset($_POST{'login_admin'})) {
			
			$admin_name = check_variable($_POST['admin_name']);
			$admin_password = check_variable($_POST['admin_password']);

			$chk_emp_user = $admin_crud->chk_empty($admin_name, $admin_password);
			if ($chk_emp_user= true) {
				$chec_inpt = $admin_crud->chk_input($admin_name, $admin_password);
				
				if ($chec_inpt == 1 ) {
					header("Location: admin_upload_page.php");
				}else{
					$err= '<label class="text-success" style="color: red; width: 100opx; font-size: 30px;"> Wrong !!!</label>';
				}
			}
		}
?>
<!--pop up div -->
	<div id="testimonial2">
		<div id="section4">
			<!-- Start Contact Area -->
			<section id="contact-area" class="contact-section" >
				<div class="container" style="height: 100%; background-image: url(images/assetes/backgr.png); border: 1px solid black;">
					<div class="row"> 

						<div class="col-lg-12" style="width: 80%; height: 40%; background-color: transparent; margin-top: 200px; margin-left: 50px;  border: 1px solid white; ">
							<?php echo $err; ?>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="contact-form" id="contact-form">
									<input name="admin_name" type="text" class="form-control" id="name" placeholder="Name" style="width: 50%; margin-top: 70px; margin-left: 80px;" />
									<input name="admin_password" type="password" class="form-control" id="subject" placeholder="Password" style="width: 50%; margin-top: 10px; margin-left: 80px;" />
									<div style="margin-left: 100px;">
									
									<button name="login_admin" type="submit" class="btn btn-primary" style="margin-top: 30px; height: 30px; width: 100px; background-color: black; color: white; border: 1px solid white; border-radius: 100px;">Submit</button>
									</div>
							</form>    
						</div>                
					</div>
				</div>
			</section>
			<!-- End Contact Area -->
		</div>
	</div>
