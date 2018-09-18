<?php
error_reporting( ~E_NOTICE );
require("includes/header.php");
require("includes/conDb.php");
require("includes/session.php");
require("includes/functions.php");
		if (isset($_POST['comm_btn'])) {
			$Comment = check_variable($_POST['Comment']);
			$com_user_id = $_SESSION['user_id'];
			 if (!empty($session->check_session())) {
			
			$chek= $crud->check_coment_empity($Comment);
            	if ($chek) {
            	 	$crud->inserting($Comment, $com_user_id );
            	} else{
				$err = '<label class="text-success" style="color: red; text-align: center; width:100%; font-size: 30px; margin-top: -900px; background-color: black; margin-bottom: 100px;">Empity Comment .</label>';
			}
			}else{
			$err = '<label class="text-success" style="color: red; text-align: center; width:100%; font-size: 30px; margin-top: -900px; margin-bottom: 100px;">Sorry you have to login first.</label>';
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
						<h1 class="text-center">HDMONA NEBARIT</h1>
						<p>Entertainment community</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="testimonial1" class="testimonial1" style="margin-top: -30px; background-color: #736F6F;">
		<?php echo $err; ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center" id="Comments_view">
						<h2>Comments from viewers</h2>
					</div>
				</div>
			</div>
	<?php
		$qu ="SELECT hd_comm.id, hd_comm.comm, hd_comm.user , users.id , users.usr_img, users.name FROM hd_comm , users WHERE hd_comm.user= users.id ORDER BY hd_comm.id DESC";
						$stm=  $DB_con->query($qu);
						$count= $stm->rowcount();
						if ($count>0) {
						  	while ($c_row=$stm->fetch(PDO::FETCH_ASSOC)) {
				?>
					<div class="col-md-4" style="min-height: 200px;" >
						<div class="testimony">
							<blockquote>
								&ldquo;<?php echo $c_row['comm']; ?>&rdquo;
							</blockquote>
							<p class="author">
							<img src="images/usr_img/<?php echo $c_row['usr_img'];?>" width="30px" height="30px">
							<cite><?php echo $c_row['name'];?></cite></p>
						</div>
					</div>
					<?php }} ?>
	</div>
	
		<div class="container">
				<div class="row" >
					<div id="availability" style="margin-top: -5px;">
						<form action="#" method="post" >
							<div class="a-col" style="width: 90%;">
								<input type="text" name="Comment" id="search_inp" class="form-control" placeholder="Comment here" style="background-color: white;color: black; width: 100%;" >
							</div>
							<div class="a-col action">
								<button name="comm_btn" class="btn btn-primary" id="search">SEND</button>
							</div>
						</form>
					</div>
				</div>
		   </div>
	</div>

	<?php
	
	require("includes/footer.php");

?>