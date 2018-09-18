
<?php 
//error_reporting( ~E_NOTICE );
	require("includes/header.php");
	require_once("includes/conDb.php");
	require_once("includes/session.php");
	require_once("includes/functions.php");
	require_once("crud.php");


	if (isset($_POST['commenting'])) {
		if ($session->check_session()==false) {
			$singnin = '<label class="text-success" style="color: red; text-align: center; width:100%; font-size: 30px;">login first please.</label>';
		}elseif($session->check_session()==true) {
			  $pro_id =$_POST['pro_id'];
				$comment = check_variable($_POST['comment_user']);
				$comenter_id =$_SESSION['user_id'];
				$com_date = date("Y-m-d");
				$com_availa= $crud->check_coment_empity($comment);
					if ($com_availa==true) {
					$crud->inserting_tv_show_com($comenter_id, $pro_id, $com_date, $comment);
				}else{
					$err_sending ='<label class="text-success" style="color: red;">Empity Comment.</label>';
				}
		}	
	}
?>
<body>
	<div id="fh5co-wrapper">
	<div id="fh5co-page">
	<?php  require("includes/header_topics.php") ?>
	<!-- end:fh5co-header -->
	<div class="fh5co-parallax" style="background-image: url(images/assetes/hdmona_nebarit_3.png);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
					<div class="fh5co-intro fh5co-table-cell">
						<h1 class="text-center">TV SHOWS </h1>
						<p>Entertainment  delivered at its time</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="fh5co-hdmona-section">
		<div class="container">
			<?php echo $singnin; ?>
			<div class="row">

				<?php 
				$ps = "page";
				$pages = pager($ps);
					$query="SELECT tv_show_id, tv_show_link,  tv_show_name, tv_show_descri, tv_show_date, tv_show_img  FROM tv_show limit $pages,15";
					$st=  $crud->query_sele($query);
					$st -> execute();
					$counter= $st->rowCount();
						if ($counter>0) {
							while ($row=$st->fetch(PDO::FETCH_ASSOC)) {								
				 ?>
				<div class="col-md-4">
					<div class="hdmona-content">
					<h3><?php echo $row['name']; ?></h3>
						<div class="hdmona-grid" style="background-image: url(images/movies/<?php echo $row['tv_show_img'];?>);">
							<div class="price"><small>NEW</small><text><?php echo $row['tv_show_date'];?></text></div>
							<a class="book-now text-center" href="<?php echo $row['tv_show_link'];?>"> Play </a>
						</div>
						<div class="desc" >
							 <div class="tests" >
								<div class="container">
									<div class="row">
										<div class="col-md-3">
											<p class="descri">
												<h10 ><?php echo $row['tv_show_descri'];?>
													</h10></p>
											<?php		
												$tv_show_id = $row['tv_show_id'];
												
												$qu ="SELECT tv_show_comm.id, tv_show_comm.tv_show_pro_id, tv_show_comm.tv_show_date, tv_show_comm.tv_show_comment, users.id, users.name, users.usr_img FROM tv_show_comm, users WHERE users.id = tv_show_comm.user_id && tv_show_comm.tv_show_pro_id = $tv_show_id ORDER BY tv_show_comm.tv_show_date DESC";
															$stetment = $crud->query_sele($qu);	
															$s=$stetment->rowCount();   
											?>
										<p class="comment_class"> comment : <?php echo $s;?></p>
											<div class="comm" style="overflow: auto; max-height: 300px; color: black; margin-left: -30px;"> 
												<?php
												while ($com_row=$stetment->fetch(PDO::FETCH_ASSOC)) {
											?>										
											<div class="comment_section">												
													<p class="author"><cite>
												<img src="images/usr_img/<?php echo $com_row['usr_img'];?>" class="imgimg">
												 <p class="name"><?php echo $com_row['name'];?></p>													
													<p class= "d"> <?php echo $com_row['tv_show_date']?></p></cite></p>
												<div class="message">
													<img src="images/assetes/arrow_point.png" width="12px" height="25px" >
												<?php 
													$str = $com_row['tv_show_comment']; 
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
								<FORM action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="contact-form" id="contact-form" enctype="multipart/form-data"> 
									<?php echo $err_sending; ?>
									<input type="hidden" name="pro_id" value="<?php echo $row['tv_show_id'];?>"/>
									<input type="text" name="comment_user" style="height: 35px; width: 250px;" />
									<button type="submit" name="commenting" class="btn btn-default" style="margin-top:0px; height: 40px; width:52px; font-size:15px; padding: 1px; background-color:#000; color: #fff;"> Send </button> 
								</FORM>
							</div>
								<ul class="social-icons" id="social-icons-id">
									<li>
										<a href="<?php echo $row['tv_show_link'];?>"><i class="icon-twitter-with-circle"></i></a>
										<a href="<?php echo $row['tv_show_link'];?>"><i class="icon-facebook-with-circle"></i></a>
										<a href="<?php echo $row['tv_show_link'];?>"><i class="icon-instagram-with-circle"></i></a>
										<a href="<?php echo $row['tv_show_link'];?>"><i class="icon-linkedin-with-circle"></i></a>
									</li>
								</ul>
								
							</div>
					</div>
				</div>

				<?php } } 
				       $pr = $_GET['p'];
						$pre = prv($pr);
								$qur="SELECT id  FROM movie";
								$st= $crud->query_sele($qur);
			  					$st->execute();

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
