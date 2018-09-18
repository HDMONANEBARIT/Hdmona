<div id="fh5co-header">
		<header id="fh5co-header-section">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
					<h1 id="fh5co-logo"><a href="index.php"><img src="images/assetes/logo.png" style="margin-top: -15px;" width="80px" height="80px" alt="HDMONA NEBARIT"></a></h1>
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li><a class="active" href="index.php">Home</a></li>
							<li>
								<a href="movies.php" class="fh5co-sub-ddown">MOVIES</a>
							</li>
							<li>
								<a href="music.php" class="fh5co-sub-ddown">MUSIC</a>
							</li>
							<li>
								<a href="tv_show.php" class="fh5co-sub-ddown">Tv shows</a>
							</li>
							<li><a href="blog.php">COMMENTS</a></li>
							<li><a href="about_us.php">About us</a></li>
							<li> 
								<a href="" >My Account</a>
								<ul class="fh5co-sub-menu">
								<li>
							  <?php 
								error_reporting( ~E_NOTICE );
								$ses = $_SESSION['user_id'];
								if (empty($ses)) {
									echo "<li><a onclick='div_show()' style='cursor: pointer'>Login<img src='images/assetes/login.png' style='width: 20px; height: 20px; margin-left: 20px;'></a></li>";

								}else{
									echo "<li><a href='logout.php'>Logout<img src='images/assetes/logout.png' style='width: 20px; height: 20px; margin-left: 20px;'></a></li>";
								}

							  ?></li>
						 	<li><a href="update_account.php">Upadate<img src="images/assetes/update.png" style=" width: 20px; height: 20px; margin-left: 20px;"></a></li>
						 	<?php $ses = $_SESSION['user_id'];
								if (empty($ses)) {?>
							<li><a href="index.php#testimonial" style="cursor: pointer;">Create<img src="images/assetes/locker.png" style=" width: 30px; height: 30px; margin-left: 20px;"></a></li>
							<?php }?>
							<li><a href='delet.php?delete=delete' id="delete" style="cursor: pointer;" >Delet Account<img src="images/assetes/delete.png" style=" width: 25px; height: 20px; margin-left: 20px;"></a></li>
								 </ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>		
		</header>
	</div>
	
<!--pop up div -->
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
							<form action="index.php" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="contact-form" id="contact-form">
								<div class="form-group">
									<input name="sign_name" type="text" class="form-control me " id="name" placeholder="Name" />
									<input name="sign_password" type="password" class="form-control" id="subject" placeholder="Password"/>
									<button name="login_user" type="submit" class="btn btn-primary" style="margin-top: 30px; height: 40px; width: 280px; background-color: black; color: white; border: 1px solid white;border-radius: 100px;">Submit</button>
									<div class="col-md-6" style="margin-top: 0px; width: 100%">
										<div class="col-md-12">
											<button onclick="div_hide()"name="cancel" type="submit" class="btn btn-primary" style="margin-top: 10px; height: 40px; width: 280px; background-color: black; color: white; border: 1px solid white;border-radius: 100px; margin-left: -40px;">cancel</button>
											
											<ul class="contact-info">
												<a href="resetaccount.php" style="color: white; font-size: 13px;">lost password ?</a></br>
												<a href="index.php" style="color: #f8e69f; font-size: 13px;">Not here before</a></li>
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

						