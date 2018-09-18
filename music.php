<?php
error_reporting( ~E_NOTICE );

	require("includes/header.php");
	require_once("includes/conDb.php");
	require_once("includes/session.php");
	require_once("includes/functions.php");
	require_once("crud.php");

/**GET DATAS*/

	if (isset($_POST['music_coms'])) {

			if ($session->check_session()==true) {
				$pro_id = $_POST['pro_id'];
				$comment = check_variable($_POST['comment_user']);
				$user_id = $_SESSION['user_id'];
				$com_date =date("Y-m-d");
					$com_availa= $crud->check_coment_empity($comment);
				
					if ($com_availa==true) {
						$inserting = $crud->inserting_music_com($user_id, $pro_id, $com_date, $comment);
					}elseif ($com_availa==false) {
							echo "<script >alert('Put your Comment Please !!!')</script>";
					}
			}else {
					$err = '<label class="text-success" style="color: red; text-align: center; width:100%; font-size: 30px;">Sorry you have to login first.</label>';
			}
	 }
?>

<body>
	<div id="fh5co-wrapper">
	<div id="fh5co-page">
	<?php  require("includes/header_topics.php"); ?>
	<!-- end:fh5co-header -->
	<div class="fh5co-parallax" style="background-image: url(images/assetes/hdmona_nebarit_3.png);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
					<div class="fh5co-intro fh5co-table-cell">
						<h1 class="text-center">MUSIC</h1>
						<p>Entertainment  delivered at its time</p>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--joie-->	
	<div id="fh5co-hdmona-section">
		<div class="container">
			<?php echo $err; ?>
			<div class="row">
				<?php 
					$p=p;
					$pages = music_pager($p);
						$query="SELECT id, music_link, music_name, music_desc, music_date, music_image  FROM music ORDER BY id DESC LIMIT $pages,6";
						$st=  $DB_con->prepare($query);
						$st -> execute();
						$counter= $st->rowCount();
							if ($counter>0) {
							 	while ($row=$st->fetch(PDO::FETCH_ASSOC)) {
				?>
				<div class="col-md-4">
					<div class="hdmona-content">
					<h3><?php echo $row['music_name']; ?></h3>
					

						<div class="hdmona-grid" style="background-image: url(images/music/<?php echo $row['music_image'];?>);">
							<div class="price"><small>NEW</small><text><?php echo $row['music_date'];?></text></div>
							<a class="book-now text-center" href="<?php echo $row['music_link'];?>"> Play </a>
						</div>
						<div class="desc">
							 <div class="tests"  ">
								<div class="container">
									<div class="row">
										<div class="col-md-3">
											<p class="descri" >
												<h10>
											<?php 
												 $stri= $row['music_desc'];
													echo $stri;
											?>
												</h10>
											</p>
											<?php		
												$music_id_number = $row['id'];
													 $qu ="SELECT music_user_com.music_com_id , music_user_com.music_user_id, music_user_com.music_com_date, music_user_com.music_comment, users.id,users.name, users.usr_img FROM music_user_com, users WHERE users.id= music_user_com.music_user_id && music_user_com.music_pro_id= $music_id_number ORDER BY  music_user_com.music_com_date DESC";
															$stm=  $DB_con->query($qu);
															$s=$stm->rowCount();
												?>
											<p class="comment_class">comment : <?php echo $s;?></p>
											<div class="comm" style="overflow: auto; max-height: 300px; color: black; margin-left: -30px;"> 
												<?php													
												while ($com_row=$stm->fetch(PDO::FETCH_ASSOC)) {
											?>
											<div class="comment_section">
												<p class="author"><cite>
												<img src="images/usr_img/<?php echo $com_row['usr_img'];?>" class="imgimg">
													<p class="name" ><?php echo $com_row['name'];?> </p>
													<p class= "d"> <?php echo $com_row['music_com_date']?></p></cite></p>
												<div class="message">
													<img src="images/assetes/arrow_point.png" width="12px" height="25px" >
												<?php 
													$str = $com_row['music_comment']; 
														echo $str;
												?> 
												</div>
												<hr class="hr40">
											</div>
											<?php  }?>
										</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group" >
								<form action="music.php" method="post">  
									<input type="hidden" name="date_user" value="<?php echo date('Y m d', time());?>"/>
									<input type="hidden" name="pro_id" value="<?php echo $row['id'];?>"/> 
									<input type="text" name="comment_user" style="height: 35px; width: 250px;" />
									<input type="submit" name="music_coms" value="Send" class="btn btn-default" style="margin-top:0px; width:50px; font-size:10px; padding: 10px; background-color:#000; color: #fff;"/>
								</form>
							</div>
								<ul class="social-icons" id="social-icons-id">
									<li>
										<a href="<?php echo $row['music_link'];?>"><i class="icon-twitter-with-circle"></i></a>
										<a href="<?php echo $row['music_link'];?>"><i class="icon-facebook-with-circle"></i></a>
										<a href="<?php echo $row['music_link'];?>"><i class="icon-instagram-with-circle"></i></a>
										<a href="<?php echo $row['music_link'];?>"><i class="icon-linkedin-with-circle"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				<?php } } 
				?>
			</div>
		</div>
	</div>
			<?php
						$pr = $_GET['p'];
						$pre = prv($pr);
				 $qur="SELECT id  FROM music";
							$st=  $crud->query_sele($qur);
		  					$st -> execute();
							$c= $st->rowCount();
							$limiter = $c/6;
		           		 $lim = ceil($limiter);
		           		 
						if ($lim>=2) {
			       ?>
		<div class="count_numbers" style="width:100%; margin-bottom: 50px; align-items: right;">
			<?php
					$pr = $_GET['p'];
						$pre = prv($pr);
						if ($pr>=2) {
			?>
				<ul class="pagination pager"><li class="previous"><a href="music.php?p=<?php echo $pre;?>#fh5co-hdmona-section" > &laquo; &laquo; Previous</a></li></ul>
				<?php } ?>
					<?php
								for ($b=1; $b<= $lim ; $b++) { 
					?>
					<ul class="pagination pager"> <li><a href="music.php?p=<?php echo $b;?>#fh5co-hdmona-section"> <?php echo $b; ?></a></li></ul>
					<?php	
							} 
							$nex = $_GET['p'];
							$nx = nxt($nex);

						
						if ($nx<=$lim) {
							?> 
					<ul class="pagination pager"> <li class="next"><a href="music.php?p=<?php echo $nx;?>#fh5co-hdmona-section" >Next &raquo;&raquo;</a></li></ul>
					<?php }else{
				  	
				  }?>
			</div>
<?php }?>
		</div>
	<!---joieend-->

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
	<?php
	
	require("includes/footer.php");
	
	
	?>