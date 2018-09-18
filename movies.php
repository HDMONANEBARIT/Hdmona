
<?php 
error_reporting( ~E_NOTICE );
	require("includes/header.php");
	require_once("includes/conDb.php");
	require_once("includes/session.php");
	require_once("includes/functions.php");
	require_once("crud.php");


	if (isset($_POST['commenting'])) {
		if ($session->check_session()==false) {
			$err = '<label class="text-success" style="color: red; text-align: center; width:100%; font-size: 30px;">Sorry you have to login first.</label>';
		}elseif($session->check_session()==true) {
			  $pro_id =$_POST['pro_id'];
				$comment = check_variable($_POST['comment_user']);
				$user_id =$_SESSION['user_id'];
				$com_date = date("Y-m-d");
				$com_availa= $crud->check_coment_empity($comment);
			
				if ($com_availa==true) {
					$inserting = $crud->inserting_com($user_id, $pro_id, $com_date, $comment);
				}else{
					$emp_po = '<label class="text-success" style="color: red; text-align: center; width:100%; font-size: 15px; margin-bottom -50px;">Empity comment</label>';
				}
		}	
	}
	if (isset($_POST['likes'])) {		
		if ($session->check_session()==false) {			
        }else{
        	$comm_id = $_POST['movie_com_id'];
			$user_id = $_SESSION['user_id'];
			$q = $crud->ins_lik($comm_id, $user_id);	
			echo $q;
        }
	}
?>
<body>
	<div id="fh5co-wrapper">
	<div id="fh5co-page">
	<?php  require("includes/header_topics.php") ?>
	<!-- end:fh5co-header -->
	<div class="fh5co-parallax" style="background-image: url(images/assetes/hdmona_nebarit_3.png);" class="img-responsive"data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
					<div class="fh5co-intro fh5co-table-cell">
						<h1 class="text-center">MOVIES</h1>
						<p>Entertainment  delivered at its time</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="fh5co-hdmona-section">
		<div class="container">
			<?php echo $err; ?>
			<div class="row">

				<?php 
				$ps = "page";
				$pages = pager($ps);
					$query="SELECT id, full_movie, name, descri, date_time, image  FROM movie limit $pages,15";
					$st=  $crud->query_sele($query);
					$st -> execute();
					$counter= $st->rowCount();

						if ($counter>0) {
							while ($row=$st->fetch(PDO::FETCH_ASSOC)) {
								
				 ?>
				<div class="col-md-4">
					<div class="hdmona-content">
					<h3><?php echo $row['name']; ?></h3>
						<div class="hdmona-grid" style="background-image: url(images/movies/<?php echo $row['image'];?>);">
							<div class="price"><small>NEW</small><text><?php echo $row['date_time'];?></text></div>
							<a class="book-now text-center" href="<?php echo $row['full_movie'];?>"> Play </a>
						</div>
						<div class="desc">
							 <div class="tests" >
								<div class="container">
									<div class="row">
										<div class="col-md-3">
											<p class="descri">
												<h10 ><?php echo $row['descri'];?>
													</h10></p>
											<?php		
												$movie_id_number = $row['id'];
													$qu ="SELECT user_comm.com_id, user_comm.user_id, user_comm.com_date, user_comm.comment, users.id, users.name, users.usr_img FROM user_comm, users WHERE users.id = user_comm.user_id && user_comm.pro_id= $movie_id_number ORDER BY user_comm.com_date DESC";
															$stetment = $crud->query_sele($qu);	
															$s=$stetment->rowCount();
											?>
										<p class="comment_class" style="margin-bottom: 0px;"> comment : 
											<?php echo $s;?>										
											</p>
											<div class="comm" style="overflow: auto; max-height: 300px; color: black; margin-left: -30px;"> 
												<?php
												while ($com_row=$stetment->fetch(PDO::FETCH_ASSOC)) {
											?>
											<div class="comment_section" style="">
													<p class="author"><cite>
														<?php if( !$com_row['usr_img'] ==""){?>
												<img src='images/usr_img/<?php echo $com_row['usr_img'];?>' class='imgimg'/>
												<?php   }elseif ($com_row['usr_img'] =="") {
													
												} ?>
												 <p class="name"><?php echo $com_row['name'];?>
													<p class= "d"> <?php echo $com_row['com_date']?></p></cite></p>
												<div class="message">
													<img src="images/assetes/arrow_point.png" width="12px" height="25px" >
												<?php 
													$str = $com_row['comment']; 
														echo $str;
												?>												
												</div>	
												<hr class="hr">

											</div>

											<?php  }?>
										</div>
									</div>
								</div>
							</div>
						</div>						
							<div class="form-group"  style="margin-bottom: 0px;">
								<FORM method="post"> 
									<?php echo $emp_po;?>
									<input type="hidden" name="date_user" value="<?php echo date('Y m d', time());?>">
									<input type="hidden" name="pro_id" value="<?php echo $row['id'];?>"/>
									<input type="text" name="comment_user" style="height: 35px; width: 250px;" />
									<button type="submit" name="commenting" class="btn btn-default" style="margin-top:0px; height: 40px; width:52px; font-size:15px; padding: 1px; background-color:#000; color: #fff;"> Send </button> 
								</FORM>
							</div>
								<ul class="social-icons" id="social-icons-id">
									<li>
										<a href="<?php echo $row['full_movie'];?>"><i class="icon-twitter-with-circle"></i></a>
										<a href="<?php echo $row['full_movie'];?>"><i class="icon-facebook-with-circle"></i></a>
										<a href="<?php echo $row['full_movie'];?>"><i class="icon-instagram-with-circle"></i></a>
										<a href="<?php echo $row['full_movie'];?>"><i class="icon-linkedin-with-circle"></i></a>
									</li>
								</ul>
								
							</div>
					</div>
				</div>

				<?php } } 
				       $pr = $_GET['p'];
						$pre = prv($pr);
								$qur="SELECT id  FROM movie";
								$st=  $crud->query_sele($qur);
			  					$st -> execute();

								$c= $st->rowCount();

								$lim = com($c);
								
           				 
           				  if ($lim > 1) {
           				  
				  ?>
		<div class="count_numbers" style="width:100%;  background-color: green;">

				<ul class="pagination pager"><li class="previous"><a href="movies.php?p=<?php echo $pre;?>#fh5co-hdmona-section" > &laquo; &laquo; Previous</a></li></ul>
				<?php
				 	for ($b=1; $b<= $lim ; $b++) { 
					?>
					<ul class="pagination pager col-xs-offset-3"> <li><a href="movies.php?p=<?php echo $b;?>#fh5co-hdmona-section"> <?php echo $b; ?></a></li></ul>
					<?php	
						} 
							$nex = $_GET['p'];
							$nx = nxt($nex, $lim);
					?> 
					<ul class="pagination pager"> <li class="next"><a href="movies.php?p=<?php echo $nx;?>#fh5co-hdmona-section" >Next &raquo;&raquo;</a></li></ul>
			</div>
			<?php } ?>
		</div>
	</div>
   </div>
</div>
<?php  require("includes/footer.php"); ?>
