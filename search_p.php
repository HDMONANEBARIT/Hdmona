<?php 
    error_reporting( ~E_NOTICE );
    require("includes/header.php");
	require_once("includes/conDb.php");
	require_once("includes/session.php");
	require_once("includes/functions.php");
	require_once("crud.php");
if (isset($_POST['search_btn'])) {
		$search_txt=check_variable($_POST['search_txt']);
			$chk_empty_searchs = $crud->chk_empty_search($search_txt);
			if ($chk_empty_searchs==true) {
				header("Location: search_p.php?searchres=$search_txt");
	}else{
		
	}
}

?>
<div id="fh5co-wrapper">
  <div id="fh5co-page">
	<?php  require("includes/header_topics.php"); ?>
	<!-- end:fh5co-header -->
	<div class="fh5co-parallax" style="background-image: url(images/assetes/hdmona_nebarit.png);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
					<div class="fh5co-intro fh5co-table-cell">
						<h1 class="text-center"> Search Results </h1>
						<p> For :- <?php $search = $_GET['searchres']; echo $search; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="wrap">
		<div class="container">
			<div class="row">
				<div id="availability" style="margin-bottom: 200px; margin-top: 10px;">
					<form action="#" method="post">
						<div class="a-col" style="width: 90%;">
<input type="text" name="search_txt" id="search_inp" class="form-control" style="color:black; width: 100%;" placeholder="<?php $search = $_GET['searchres']; echo $search; ?>">
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
	<div id="fh5co-hdmona-section">
			<div class="container">
				<div class="row">
				 <h1 style="font-weight: bold;">MUSIC</h1>
				  <div style="clear:both; border: 0; border-top: 1px solid black; margin-bottom: 10px;">
	                <hr class="hr40">
	            </div>
					<?php 

						 $search = $_GET['searchres'];
						 if (empty($search)) {
						 $err = "<div style= 'background-color: transparent; font-size: 25px; text-align: center;'>Empity words</div>";
								echo $err;
						 }else{
						 $query = "SELECT * FROM music WHERE music_desc LIKE '%$search%' || music_name LIKE '%$search%' ";
								 $Query = $crud->query_sele($query);
								 $count = $Query->rowCount();
								 if ($count>0) {
								while ($rows=$Query->fetch(PDO::FETCH_ASSOC)) {
					 ?>

					<div class="col-md-4">
						<div class="hdmona-content">
						<h3><?php echo $rows['music_name']; ?></h3>
							<div class="hdmona-grid" style="background-image: url(images/music/<?php echo $rows['music_image'];?>);">
								<div class="price"><small>NEW</small><text><?php echo $rows['music_date'];?></text></div>
								<a class="book-now text-center" href="#"> Play </a>
							</div>
							<div class="desc">
								 <div class="tests">
									<div class="container">
										<div class="row">
											<div class="col-md-3">
												<p class="descri" >
													<h10><?php echo$rows['music_desc']; ?> </h10></p>
													<?php		
													$music_id_number = $rows['id'];
														 $qu ="SELECT music_user_com.music_com_id , music_user_com.music_user_id, music_user_com.music_com_date, music_user_com.music_comment, users.id, users.usr_img, users.name FROM music_user_com, users WHERE users.id= music_user_com.music_user_id && music_user_com.music_pro_id= $music_id_number ORDER BY  music_user_com.music_com_date DESC";
																$stm=  $DB_con->query($qu);
																$s=$stm->rowCount();
																
													?>
												<p class="comment_class">comment : <?php echo $s;?></p>
												<div style="overflow: auto; width: 330px; max-height: 300px; color: black; margin-left: -30px; background-color: #CDCED1;"> 
													<?php
														
													while ($com_row=$stm->fetch(PDO::FETCH_ASSOC)) {

												?>
												<div class="comment_section" >
													<p class="author"><cite>
														<img src="images/usr_img/<?php echo $com_row['usr_img'];?>" class="imgimg"> 
														<p class="name" ><?php echo $com_row['name'];?> </p>
														<p class= "d"> <?php echo $com_row['music_com_date']?></p></cite></p>
													<div class="message">
														<img src="images/assetes/arrow_point.png" width="12px" height="25px" >
													<?php 
														$str = $com_row['music_comment']; 
															if (strlen($str) > 25) {
															$trimstring = substr($str, 0, 50). '... <a href="#" >View More</a>';
															echo $trimstring;
															} else {
															echo $str;
															}
															?> 
													</div>
													<hr class="hr40">
												</div>
												<?php  } ?>
											</div>
											</div>
										</div>
									</div>
								</div>
								<ul class="social-icons" id="social-icons-id">
										<li>
											<a href="<?php echo $com_row['music_link'];?>"><i class="icon-twitter-with-circle"></i></a>
											<a href="http://shar.com/<?php echo $com_row['full_movie'];?>"><i class="icon-facebook-with-circle"></i></a>
											<a href="<?php echo $com_row['music_link'];?>"><i class="icon-instagram-with-circle"></i></a>
											<a href="<?php echo $com_row['music_link'];?>"><i class="icon-linkedin-with-circle"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					<?php }
				}elseif($count==0) {
						$err = "<div style= 'background-color: transparent; font-size: 25px; text-align: center;'>No music / check your words</div>";
							echo $err;
					}
				}
					?>
				</div>

			</div>

		<div class="container">
				<div class="row">
			 <h1 style="font-weight: bold;">MOVIES</h1>
				  <div style=" border: 0; border-top: 1px solid black; ">
	                <hr class="hr40">
	            	</div>

					<?php 

					 $search = $_GET['searchres'];
					 if (empty($search)) {
					 	$err = "<div style= 'background-color: transparent; font-size: 25px; text-align: center; margin-bottom: 80px;'>Empity words</div>";
							echo $err;
					 }else{
					 $query = "SELECT * FROM movie WHERE name LIKE '%$search%' || descri LIKE '%$search%' ";
							 $Query = $crud->query_sele($query);
							 $count = $Query->rowCount();
							 if ($count>0) {
							while ($rows=$Query->fetch(PDO::FETCH_ASSOC)) {
							 		
					 ?>

					<div class="col-md-4">
						<div class="hdmona-content">
						<h3><?php echo $rows['name']; ?></h3>
							<div class="hdmona-grid" style="background-image: url(images/movies/<?php echo $rows['image'];?>);">
								<div class="price"><small>NEW</small><text><?php echo $rows['date_time'];?></text></div>
								<a class="book-now text-center" href="full_movie"> Play </a>
							</div>
							<div class="desc" >
								 <div class="tests"  ">
									<div class="container">
										<div class="row">
											<div class="col-md-3">
												<p class="descri" >
													<h10><?php 
														 $stri= $rows['descri'];
																if (strlen($stri) > 25) {
																	$trimstring = substr($stri, 0, 150).'... <p onclick="div_view_more_show()" style="margin-top: -30px; color: black; cursor: pointer; font-size:13px;"> View More ... </p>';
																	echo $trimstring;
																	} else {
																	echo $stri;
																	}
																	?>
																		
													</h10></p>
													
													<?php		
													$movie_id_number = $rows['id'];
													$qu ="SELECT user_comm.user_id, user_comm.com_date, user_comm.comment, users.id, users.name, users.usr_img FROM user_comm, users WHERE users.id = user_comm.user_id && user_comm.pro_id= $movie_id_number";
																$stm=  $crud->query_sele($qu);
																$s=$stm->rowCount();
																
													?>
												<p class="comment_class">comment : <?php echo $s;?></p>
												<div  id="coment_div" style="overflow: auto; width: 330px; max-height: 300px; color: black; margin-left: -30px; background-color: #CDCED1;"> 
													<?php
														
													while ($com_row=$stm->fetch(PDO::FETCH_ASSOC)) {

												?>
												<div class="comment_section" >
													<p class="author"><cite>
														<img src="images/usr_img/<?php echo $com_row['usr_img'];?>" class="imgimg"> 
														<p class="name" ><?php echo $com_row['name'];?> </p>
														<p class= "d"> <?php echo $com_row['com_date']?></p></cite></p>
													<div class="message">
														<img src="images/assetes/arrow_point.png" width="12px" height="25px" >
													<?php 
														$str = $com_row['comment']; 
															if (strlen($str) > 25) {
															$trimstring = substr($str, 0, 50). '... <a href="#" >View More</a>';
															echo $trimstring;
															} else {
															echo $str;
															}
															?> 
													</div>
													<hr class="hr40">
												</div>
												<?php  } ?>
											</div>
											</div>
										</div>
									</div>
								</div>
								<ul class="social-icons" id="social-icons-id">
										<li>
											<a href="<?php echo $row['music_link'];?>"><i class="icon-twitter-with-circle"></i></a>
											<a href="http://shar.com/<?php echo $row['full_movie'];?>"><i class="icon-facebook-with-circle"></i></a>
											<a href="<?php echo $row['music_link'];?>"><i class="icon-instagram-with-circle"></i></a>
											<a href="<?php echo $row['music_link'];?>"><i class="icon-linkedin-with-circle"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					<?php }
				}elseif ($count == 0) {
						$err = "<div style= ' margin-bottom: 100px; background-color: transparent; font-size: 25px; text-align: center;'>No movie / check your words</div>";
							echo $err;
					}
				}
					?>
				</div>

			</div>

			<div class="container">
				<div class="row">
			 <h1 style="font-weight: bold;">TV SHOWS</h1>
				  <div style=" border: 0; border-top: 1px solid black; ">
	                <hr class="hr40">
	            	</div>

					<?php 

					 $search = $_GET['searchres'];
					 if (empty($search)) {
					 	$err = "<div style= 'background-color: transparent; font-size: 25px; text-align: center; margin-bottom: 80px;'>Empity words</div>";
							echo $err;
					 }else{
					 $query = "SELECT * FROM tv_show WHERE tv_show_name LIKE '%$search%' || tv_show_descri LIKE '%$search%' ";
							 $Query = $crud->query_sele($query);
							 $count = $Query->rowCount();
							 if ($count>0) {
							while ($rows=$Query->fetch(PDO::FETCH_ASSOC)) {
							 		
					 ?>

					<div class="col-md-4">
						<div class="hdmona-content">
						<h3><?php echo $rows['tv_show_name']; ?></h3>
							<div class="hdmona-grid" style="background-image: url(images/movies/<?php echo $rows['tv_show_img'];?>);">
								<div class="price"><small>NEW</small><text><?php echo $rows['tv_show_date'];?></text></div>
								<a class="book-now text-center" href="<?php echo $rows['tv_show_link']; ?>"> Play </a>
							</div>
							<div class="desc" >
								 <div class="tests"  ">
									<div class="container">
										<div class="row">
											<div class="col-md-3">
												<p class="descri" >
													<h10><?php  echo $rows['tv_show_descri']; ?> </h10></p>
													
													<?php		
													$tv_show_id = $rows['tv_show_id'];
													$qu ="SELECT tv_show_comm.id, tv_show_comm.tv_show_pro_id, tv_show_comm.tv_show_date, tv_show_comm.tv_show_comment, users.id, users.name, users.usr_img FROM tv_show_comm, users WHERE users.id = tv_show_comm.user_id && tv_show_comm.tv_show_pro_id = $tv_show_id ORDER BY tv_show_comm.tv_show_date DESC";
																$stm=  $crud->query_sele($qu);
																$s=$stm->rowCount();
																
													?>
												<p class="comment_class">comment : <?php echo $s;?></p>
												<div  id="coment_div" style="overflow: auto; width: 330px; max-height: 300px; color: black; margin-left: -30px; background-color: #CDCED1;"> 
													<?php
														
													while ($com_row=$stm->fetch(PDO::FETCH_ASSOC)) {

												?>
												<div class="comment_section" >
													<p class="author"><cite>
														<img src="images/usr_img/<?php echo $com_row['usr_img'];?>" class="imgimg"> 
														<p class="name" ><?php echo $com_row['name'];?> </p>
														<p class= "d"> <?php echo $com_row['tv_show_date']?></p></cite></p>
													<div class="message">
														<img src="images/assetes/arrow_point.png" width="12px" height="25px" >
													<?php 
													echo $com_row['tv_show_comment']; ?> 
													</div>
													<hr class="hr40">
												</div>
												<?php  } ?>
											</div>
											</div>
										</div>
									</div>
								</div>
								<ul class="social-icons" id="social-icons-id">
										<li>
											<a href="<?php echo $row['music_link'];?>"><i class="icon-twitter-with-circle"></i></a>
											<a href="http://shar.com/<?php echo $row['full_movie'];?>"><i class="icon-facebook-with-circle"></i></a>
											<a href="<?php echo $row['music_link'];?>"><i class="icon-instagram-with-circle"></i></a>
											<a href="<?php echo $row['music_link'];?>"><i class="icon-linkedin-with-circle"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					<?php }
				}elseif ($count == 0) {
						$err = "<div style= ' margin-bottom: 100px; background-color: transparent; font-size: 25px; text-align: center;'>No movie / check your words</div>";
							echo $err;
					}
				}
					?>
				</div>

			</div>
		
<?php
	
	require("includes/footer.php");
	
	
	?>