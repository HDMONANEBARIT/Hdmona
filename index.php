<?php 

	error_reporting( ~E_NOTICE );
	require("includes/header.php");
	require_once("includes/conDb.php");
	require_once("includes/session.php");
	require_once("includes/functions.php");
	require_once("crud.php");
	

	// this is from pop up sighn in 
	 if (isset($_POST['login_user'])) {

		if ($session->check_session() == true) {
			 $ses = $session->logout();
				$user_name = check_variable($_POST['sign_name']);
				$user_password = check_variable($_POST['sign_password']);
				
					
				$chk_emp_user = $crud->check_empity_user($user_name, $user_password);
			
				if ($chk_emp_user == true) {
					$check_status -> check_status($user_name);
							if ($check_status) {
								$chk_in_db = $crud->check_sign_in_exist($user_name, $user_password);
							if ($chk_in_db == 1) {
									 $user = $crud->getID($user_name);
									 
									 $ses = $session->login($user);
							}else{
							  echo "<script> alert('r u sure u are not new');</script>";
							} 
						} else{
							echo "<script> alert('your Hdmona Nebarit account is not Activated');</script>";
						}
						}else{
						echo "<script language='text/javascript'> alert('Empity input'); </script>";
				}
			}elseif ($session->check_session() == false) {

			$user_name = check_variable($_POST['sign_name']);
			$user_password = check_variable($_POST['sign_password']);
				
			$chk_emp_user = $crud->check_empity_user($user_name, $user_password);
			
				if ($chk_emp_user == true) {
					$check_status = $crud-> check_status($user_name);
							if ($check_status = true) {
								
						$chk_in_db = $crud->check_sign_in_exist($user_name, $user_password);
							if ($chk_in_db == 1) {
									 $user = $crud->getID($user_name);
									  	 $ses = $session->login($user);
									  // header("Location: index.php");
							   }else{
							  echo "<script> alert('No such user');</script>";
							}
						}else{
								echo "<script> alert('your Hdmona Nebarit account is not Activated');</script>";
							}
						}else{
						echo "<script language='text/javascript'> alert('Empity input'); </script>";
				}
		 }
	}
// user sighn up                        
	if (isset($_POST['submit_it'])) {
		if ($session->check_session() == false) {

			 $ses = $session->logout();
			//function check special chars 
			$stut = "not activated";
			$hdmona_user_activation_code = md5(rand());
			$user = check_variable($_POST['user_name']);
			$email = check_variable($_POST['user_email']);
			$password = check_variable($_POST['user_password']);
			$repassword = check_variable($_POST['reuser_password']);
			$comment = check_variable($_POST['hd_comment']);
			
			$imgFile = $_FILES['user_image']['name'];
			$tmp_dir = $_FILES['user_image']['tmp_name'];
			$imgSize = $_FILES['user_image']['size'];
			//password confer
			if ($password == $repassword) {
			
  				// check empity user input 
				$chk_empty = $crud->check_empity($user, $email, $password, $imgFile);

				if ($chk_empty == true) {
					// check user in database
					$chk_db= $crud->check_user_exist($user, $email);
						if ($chk_db > 0) {
								echo "<script>alert('User name Already exists')</script>";
						   }elseif ($chk_db == 0) {
						   		//sending image
						   		$upload_dir = 'images/usr_img/'; 
								$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
								$valid_extensions = array('jpeg','jpg','png','gif'); 
								$userpic = rand(1000,1000000).".".$imgExt;
								if ($imgSize<1000000) {
									move_uploaded_file($tmp_dir, $upload_dir.$userpic);
								}elseif ($imgSize>1000000) {
									echo "<script> alert('Image is way too big')</script>";
								}
							    $usrins = $crud->create($user, $email, $password, $hdmona_user_activation_code, $stut, $userpic);
								if ($usrins>0) {
									$get_id = $crud->getID($user);
								   		$users = $get_id;
										//sending maile
									   	if ($get_id) {
									   		$session->login($users);
					            $com_user_id = $get_id;
					            $com_not_emp=$crud->check_coment_empity($comment);

					            	if ($com_not_emp) {
					            	 	$crud->inserting($comment, $com_user_id );
					            	} 
				              	}elseif ($usrins==false) {
				              		echo "<script> alert('no insert')</script>";
				              	}
							 $base_url = "http://localhost/hdmona/";
					 $message = "<div style='margin-top: 100px; width: 1000px; hieght: 100%;  border: 2px inset rgba(0, 0, 0, 0.7);'>
                          
                           <h1 style=' width: 700px; background-image:url(images/assetes/blue.png); font-size: 30px; margin-top: 10px;'>Hdmona Nebarit</h1>                          
                        <p style='background-color:; margin-top: 20px; width: 200px; font-size: 20px;'>Hi !!!".$user."</p><p>Wellcome to Hdmona Nebarit Entertainment. </br></br>We are excited you are here.  just a little bump </br> your hdmona account will only work after your email verification.</p>
                        <p>Please Open this link to verify your email address -</br></br> <a href='".$base_url."email_verification.php?hdmona_user_activation_code=".$hdmona_user_activation_code."' style='text-decoration:underline;'>Hdmona Activation code</a> <p>Again Wellcome and Enjoy !!! <br/>Hdmona Nebarit Entertainment</p> 
                    </div>";


		  										$sending_mail=$crud->send_mail($email, $user, $message);
		  										 if($sending_mail){
		  										 	$mess = '<label class="text-success">Register Done, Please check your mail.</label>';
												   
												   } else{
												   	
												   	$mess = '<label class="text-success" style="color: red;">Sorry we couldn\'t Send u Confermation Code.</label>';
												   }
									   	}	
				           } 
						} else{
							 	$err = '<h10 style="color: red;">Required Fields *</h10>';
							 	$er = '<label style="color: red;">*</label>';
						}
					}else{
						$err_pass = '<label style="color: red;">password wrong</label>';
					}
				}
		}
	//searching part
	if (isset($_POST['search_btn'])) {
		$search_txt=check_variable($_POST['search_txt']);
			$chk_empty_searchs = $crud->chk_empty_search($search_txt);
			if ($chk_empty_searchs==true) {
				header("Location: search_p.php?searchres=$search_txt");
	}else{
		$err_mess = '<label class="text-success" style="color: red; font-size: 30px;">Empity search.</label>';
	}
}
?>
<body>
	<div id="fh5co-wrapper">
	<div id="fh5co-page">
		<?php require("includes/header_topics.php"); ?>
		<!-- end:fh5co-header -->
		<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/assetes/hdmona_nebarit_2.png);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-12 col-md-offset-0 text-center slider-text">
		   				<div class="slider-text-inner js-fullheight">
		   					<div class="desc">
		   						<p><span>Home Of The Eritrean Movies</span></p>
		   						<h2> HDMONA NEBARIT</h2>
			   					<p>
			   						<a href="#sub_email" class="btn btn-primary btn-lg" style="background-color: #000000; margin-top: -150px">Subscribe Now</a>
			   					</p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/assetes/slider2.png);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-12 col-md-offset-0 text-center slider-text">
		   				<div class="slider-text-inner js-fullheight">
		   					<div class="desc">
		   						<p><span>MOVIES AT A TIME</span></p>
		   						<h2>Watch The Latest Movies </h2>
			   					<p>
			   						<a href="#sub_email" class="btn btn-primary btn-lg" style="background-color: #000000; margin-top: -150px">Subscribe Now</a>
			   					</p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>  
		   	<li style="background-image: url(images/assetes/image-3.png);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-12 col-md-offset-0 text-center slider-text">
		   				<div class="slider-text-inner js-fullheight">
		   					<div class="desc">
		   						<p><span>MOVIES AT A TIME</span></p>
		   						<h2>Watch The Latest Movies </h2>
			   					<p>
			   						<a href="#sub_email" class="btn btn-primary btn-lg" style="background-color: #000000; margin-top: -150px">Subscribe Now</a>
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
			   						<a href="#sub_email" class="btn btn-primary btn-lg" style="background-color: #000000; margin-top: -150px">Subscribe Now</a>
			   					</p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/assetes/hdmona_nebarit.png);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-12 col-md-offset-0 text-center slider-text">
		   				<div class="slider-text-inner js-fullheight">
		   					<div class="desc">
		   					<p><span>LATEST MUSIC</span></p>
		   						<h2> Enjoy Your Life With Music</h2>
			   					<p>
			   						<a href="#sub_email" class="btn btn-primary btn-lg" style="background-color: #000000; margin-top: -150px">Subscribe Now</a>
			   					</p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>		   	
		  	</ul>
	  	</div>
	</aside>
	<div class="wrap">
		<div class="container">
			<div class="row">
				<div id="availability"><?php echo $err_mess; ?>
					<form action="#" method="post">
						<div class="a-col" style="width: 90%;">
							<input type="text" name="search_txt" id="search_inp" class="form-control" style="color:black; width: 100%;">
						</div>
						<div class="a-col action">
							<button name="search_btn" class="btn btn-primary" id="search">SEARCH</button>
						</div>
					</form>
					 <div class ="results_div" id="results_div" style="display: none;">
					</div>
				</div>
			</div>
		</div>
	</div>
		<div id="fh5co-counter-section" class="fh5co-counters" >
			<div class="container">
				<div class="row" >
					<div class="col-md-3 text-center"  >
						<span  class="fh5co-counter js-counter" data-from="0" data-to="190501040" data-speed="5000" data-refresh-interval="50" ></span>
						<span class="fh5co-counter-label" >Youtube Subscribtion</span>
					</div>
					<div class="col-md-3 text-center">
						<span class="fh5co-counter js-counter" data-from="0" data-to="15501" data-speed="5000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">Facebook Likes</span>
					</div>
					<div class="col-md-3 text-center" >
						<span class="fh5co-counter js-counter" data-from="0" data-to="8200" data-speed="5000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">Instagram Followers</span>
					</div>
					<div class="col-md-3 text-center">
						<span class="fh5co-counter js-counter" data-from="0" data-to="8763" data-speed="5000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">Twittes</span>
					</div>
				</div>
			</div>
		</div>		
		<div id="featured-hdmona" class="fh5co-bg-color col-md-12">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center" id="week_realse">
							<h1>This Week Realese</h1>
						</div>
					</div>
				</div>
					<?php 
					$ps = "p";
					$pages = pager($ps); 
						$query="SELECT id, full_movie, name, descri, date_time, image  FROM movie limit $pages,5";
						$st =  $crud->query_sele($query);
						$counter= $st->rowCount();
							if ($counter>0) {
							 	while ($row=$st->fetch(PDO::FETCH_ASSOC)) {						 		
					 ?>
				<div class="row">
					<div class="feature-full-1col" id="movie_page">
						<div class="image" style="background-image: url(images/movies/<?php echo $row["image"];?>);">
							<div class="descrip text-center">
								<p><small>New</small><span>Date <?php echo $row["date_time"];?></span></p>
							</div>
						</div>
						<div class="desc">
							<h3><?php echo $row["name"];?></h3>
							<p><?php echo $row["descri"]?></p>
							<p><a href="<?php echo $row["full_movie"];?>" class="btn btn-primary btn-hdmona-primary">Play<i class="ti-angle-right"></i></a></p>
						</div>
					</div>
				</div>
				<?php }}?>
				<div class="count_numbers" style="color: BLACK;">
					<?php
						$qur="SELECT id  FROM movie";
							$st=  $crud->query_sele($qur);
		  					$c= $st->rowCount();
							$lim = cropin($c);
							if ($lim>=2) {
							$pr = $_GET['p'];
							$pre = prv($pr);
							if ($pr>=2) {
					?> 
				<ul class="pagination pager"><li class="previous"><a href="index.php?p=<?php echo $pre;?>#week_realse" > &laquo; Previous</a></li></ul>
				<?php }?>
			 			<?php
			 			 	for ($b=1; $b<= $lim ; $b++) { 
						?>
								<ul class="pagination pager"> <li><a href="index.php?p=<?php echo $b;?>#week_realse"> <?php echo $b; ?></a></li></ul>
					  	<?php	}	
						  	$nex = $_GET['p'];
							$nx = nxt($nex);
							
							if ($nx<=$lim) {
						 ?>
					  	 <ul class="pagination pager" id="next" style="display:"> <li class="next"><a href="index.php?p=<?php echo $nx;?>#week_realse"" >Next &raquo; </a></li></ul>
					  <?php }else{
					  	
					  }
					}?>
				</div>
			</div>
		</div>
	 <div id="hdmona-facilities">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
					  <h1><strong> TOP</strong> 5  SERIES</h1>
					</div>
				</div>
			</div>
			<?php
			$q = "SELECT * FROM top_5 ";
			$st =  $crud->query_sele($q);
			$counter= $st->rowCount();
			$row=$st->fetch(PDO::FETCH_ASSOC);
			?>
			<div id="tabs">
				<nav class="tabs-nav">
					<a href="" class="active" data-tab="tab"><span><?php echo $row['top_name'];?></span> </a> 
					<a href="" data-tab="tab2"> <span><?php echo $row['top_name'];?></span> </a> 
					<a href="" data-tab="tab3"> <span><?php echo $row['top_name'];?></span> </a> 
					<a href="" data-tab="tab4"> <span><?php echo $row['top_name'];?></span></a>
					<a href="" data-tab="tab5"><span><?php echo $row['top_name'];?></span> </a>
					</nav>
				<div class="tab-content-container">
					<div class="tab-content active show" data-tab-content="tab<?php echo $row['id'];?>">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<a href='<?php echo $row['top_link'];?>''><img src="images/movies/<?php echo $row['top_image'];?>" class="img-responsive" alt="Image"></a>
								</div>
								<div class="col-md-6">
									<span class="super-heading-sm">Part three</span>
									<h3 class="heading"><strong> <?php echo $row['top_topic'];?> </strong></h3>
									<p><?php echo $row['top_description'];?> </p>
									<p class="service-hour">
										<span>Release Hours</span>
										<strong><?php echo $row['release_hours_from'];?> - <?php echo $row['realese_hours_to'];?></strong>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" data-tab-content="tab2">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<a href="<?php echo $row['top_link'];?>"><img src="images/movies/<?php echo $row['top_image'];?>" class="img-responsive" alt="Image"></a>
								</div>
								<div class="col-md-6">
									<span class="super-heading-sm">Part Four</span>
									<h3 class="heading"><strong> <?php echo $row['top_topic'];?></strong></h3>
									<p><?php echo $row['top_description'];?></p>
									<p class="service-hour">
										<span>Realese Hours</span>
										<strong><?php echo $row['release_hours_from'];?> - <?php echo $row['realese_hours_to'];?></strong>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" data-tab-content="tab3">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<a href="<?php echo $row['top_link'];?>"><img src="images/movies/<?php echo $row['top_image'];?>" class="img-responsive" alt="Image"></a>
								</div>
								<div class="col-md-6">
									<span class="super-heading-sm">Comedy</span>
									<h3 class="heading"><strong><?php echo $row['top_topic'];?> </strong></h3>
									<p><?php echo $row['top_description'];?></p>
									<p class="service-hour">
										<span>Realese Hours</span>
										<strong><?php echo $row['release_hours_from'];?> - <?php echo $row['realese_hours_to'];?></strong>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" data-tab-content="tab4">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<a href="<?php echo $row['top_link'];?>"><img src="images/movies/<?php echo $row['top_image'];?>" class="img-responsive" alt="Image"></a>
								</div>
								<div class="col-md-6">
									<span class="super-heading-sm">Comedy</span>
									<h3 class="heading"><strong> <?php echo $row['top_topic'];?></strong></h3>
									<p><?php echo $row['top_description'];?></p>
									<p class="service-hour">
										<span>Reales Hours</span>
										<strong><?php echo $row['release_hours_from'];?> - <?php echo $row['realese_hours_to'];?></strong>
									</p>
								</div>
							</div>
						</div>
					</div>
						<div class="tab-content" data-tab-content="tab5">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<a href="<?php echo $row['top_link'];?>"><img src="images/movies/<?php echo $row['top_image'];?>" class="img-responsive" alt="Image"></a>
									</div>
									<div class="col-md-6">
										<span class="super-heading-sm">Comedy</span>
										<h3 class="heading"><strong><?php echo $row['top_topic'];?> </strong></h3>
										<p><?php echo $row['top_description'];?></p>
										<p class="service-hour">
											<span>Reales Hours</span>
											<strong><?php echo $row['release_hours_from'];?> - <?php echo $row['realese_hours_to'];?></strong>
										</p>
									</div>
								</div>
							</div>
						</div>
				    </div>
			      </div>
		        </div>
		   	</div>
		</div>
		<?php 
			$ps = $_GET['com'];
				$pages= pager($ps);
				$offset =18;
					$qu ="SELECT hd_comm.id, hd_comm.comm, hd_comm.user , users.id , users.name FROM hd_comm , users WHERE hd_comm.user= users.id limit $pages, $offset ";
						$stm=  $DB_con->query($qu);
						$count= $stm->rowcount();
						if ($count>0) {
		?>
	 <div id="testimonial1" class="testimonial1">
	 	<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center" id="Comments_view">
						<h2>Comments from viewers</h2>
					</div>
				</div>
			</div>
			<?php 
					while ($c_row=$stm->fetch(PDO::FETCH_ASSOC)) {
				?>
				<div class="col-md-4" >
					<div class="testimony">
						<blockquote>
							&ldquo;<?php echo $c_row['comm']; ?>&rdquo;
						</blockquote>
						<p class="author"><cite><?php echo $c_row['name'];?></cite></p>
					</div>
				</div>
					<?php } 
							
						$pre = prv($ps);
						
							$hd_cm  ="SELECT id  FROM hd_comm";
								$st=  $DB_con->prepare($hd_cm);
								$st -> execute();
								$c= $st->rowCount();
								$limits = com($c);
							
								if ($limits>1) {
						?>
					<div class="count_numbers" > 
						<?php 

							if ($ps>=2) {
								
						?>
					<ul class="pagination pager"><li class="previous"><a href="index.php?com=<?php echo $pre;?>#testimonial1" > &laquo; Previous</a></li></ul>
					<?php }?>
						<?php
								for ($d=1; $d<= $limits; $d++) { 
						?>
								<ul class="pagination pager"> 
									<li><a href="index.php?com=<?php echo $d;?>#Comments_view"> <?php echo $d; ?></a></li>
								</ul>
				 		<?php	}  ?>

						<?php 
							
							$nxt = nxt($ps);
							if ($nxt<=$limits) {
								?>
								<ul class="pagination pager"> <li class="next"><a href="index.php?com=<?php echo $nxt;?>#testimonial1" >Next &raquo;</a></li></ul>
							<?php 
									}elseif ($nxt>$limits) {
											
										} 
								?>
					 </div>
					 <?php } ?>
				</div>
			</div>	
			<?php }?>
	<div id="fh5co-blog-section" class="coming_soon_class">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
					  <h1 ><strong>Coming Up</strong></h1>
					</div>
				</div>
			</div>
			<div class="row">

				<?php
					$pas = "pg";
					$pas= pager($pas);
					$com_qu= "SELECT coming_image, coming_topic, coming_date, coming_link FROM coming_up limit $pas,3";
					$sttt= $DB_con->query($com_qu);
					$co = $sttt->rowcount();
					if ($co>0) {
				while ( $coming_row = $sttt->fetch(PDO::FETCH_ASSOC)) {
			 ?>
				<div class="col-md-4">
					<div class="blog-grid" style="background-image: url(images/movies/<?php echo $coming_row['coming_image'];?>); width: 350px;">
						<div class="date text-center" style="width: 100px;">
							<small style="margin-left: -10px;"><?php echo $coming_row['coming_date'];?></small>
						</div>
					</div>
					<div class="desc">
						<h3><a href="#"><?php echo $coming_row['coming_topic'];?></a></h3>
					</div>
				</div>
				<?php } }
						?>
			</div>
					<?php
					$hd_cm  ="SELECT coming_id  FROM coming_up";
						$st=  $DB_con->prepare($hd_cm);
						$st -> execute();
						$cd = $st->rowCount();
						$limi = cropin($cd);

						if ($limi > 1 ) {

					?> 
			<div class="count_numbers" >
				<?php 
					$pr = $_GET['soon'];
						$soonpre = prv($pr);
						
						if($soonpre>=2){
				?>
				<ul class="pagination pager" ><li class="previous"><a href="index.php?soon=<?php echo $soonpre;?>#fh5co-blog-section" > &laquo; Previous</a></li></ul>
				<?php } ?>
						<?php
							for ($coming=1; $coming<= $limi; $coming++) { 
						?>
			<ul class="pagination pager"> <li><a href="index.php?soon=<?php echo $coming;?>#fh5co-blog-section"> <?php echo $coming; ?></a></li></ul>
						<?php	} 
							$nex = $_GET['soon'];
							$soonnx = nxt($nex, $lim);
							echo $lim;
							if ($soonnx<=$lim) {
							
						?>
						<ul class="pagination pager"> <li class="next"><a href="index.php?soon=<?php echo $soonnx;?>#fh5co-blog-section" >Next &raquo; </a></li></ul>
						<?php }?>
			</div>
			<?php }?>
		</div>
	</div>	  
	<div id="testimonial" style="background-color:#4e2c2c; margin-top: -10px;">
		<div id="section4">
			<!-- Start Contact Area -->
			<section id="contact-area" class="contact-section" >
				<div class="container" >
					<div class="row" >
						<div class="col-sm-12 text-center inner">
							<div class="contact-content section-title text-center">
								<h2>Give us your feedback</h2>
							</div>
						</div>
					</div>
					<?php  echo $mess;?>
					<div class="row">
						<div class="col-lg-12">
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="contact-form" id="contact-form" enctype="multipart/form-data"/>
								<?php echo $err;?>
								<div class="form-group">
								<?php echo $er;?><input name="user_name" type="text" class="form-control" id="name" placeholder="Name" />
								<?php echo $er;?><input  name="user_email"type="email" class="form-control" placeholder="Email" id="email" />
								
							<?php echo $er;?><input name="user_password" type="password" class="form-control" id="subject" placeholder="Password"/>
							<input name="reuser_password" type="password" class="form-control" id="subject" placeholder="Reapeat Password"/>
							<input name="hd_comment" type="text" class="form-control" placeholder="Message" style="height: 200px; text-align: top;"/>
									<img src="images/assetes/pro_image.png" hreff="" style="margin-top: 10px; width: 50px;"/> 
								<input  type="file" name="user_image" class="imgs input-group"  accept="image/*" placeholder="<?php $_FILES['user_image']['name'];?> " />
									<button name="submit_it" type="submit" class="btn btn-defult" style="margin-top: 30px; height: 40px; width: 280px; background-color: #4b4b4b; color: black; border: 1px solid white;">Submit</button>
								<div class="col-md-6" style="margin-top: 0px; width: 100%">
									<div class="col-md-12">
										<ul class="contact-info">
											<a href="resetaccount.php" style="color: white; font-size: 13px;">forget my password ?</a></br>
											<a id="pop_up" onclick="div_show()" style="color: #f8e69f; font-size: 13px; cursor: pointer;">Already member?Sign in</a></li>
										</ul>
									</div>
									
								</div>
							</div>
						  </form>    
						</div>                
					</div>
				</div>
			</section>
		</div>
	</div>
  	
	<?php
	require("includes/footer.php");
	?>