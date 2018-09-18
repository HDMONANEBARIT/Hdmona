<?php 

error_reporting( ~E_NOTICE );

	require("includes/header.php");
	require_once("includes/conDb.php");
	require_once("includes/session.php");
	require_once("includes/functions.php");
	require_once("crud.php");

$q =$_GET['p'];
		$q = "SELECT * FROM user_comm , movie WHERE user_comm.pro_id = '$q' AND movie.id= '$q'";
			$st =  $crud->query_sele($q);
			$counter= $st->rowCount();
			$row=$st->fetch(PDO::FETCH_ASSOC);
echo "find" .$counter;
echo $row['name'];

?>
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
						<h1 class="text-center"><strong>HDMONA NEBARIT</strong></h1>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-content" style="margin-bottom: 10px;">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<img src="images/<?php echo $row['image'];?>.jpg" class="img-responsive" alt="Image">
				</div>
				<div class="col-md-6">
					<h1 class="heading"><strong><?php echo $row['name'];?> </strong></h1>
					<p><?php echo $row['descri'];?></p>
				</div>
			</div>                          
		</div>
	</div>
	 <div id="testimonial1" class="ppl_com" style="margin-bottom: -30px; ">
		<div class="container" style="margin-top:-600px; width: 100%; background-color: #C0C0C0;">
			<?php 
				$q =$_GET['p'];
					$qr ="SELECT * FROM user_comm WHERE pro_id= '$q'";
					$stm =  $crud->query_sele($qr);
					$counter= $st->rowCount();
					if ($counter>0) {
						  	while ($c_row=$stm->fetch(PDO::FETCH_ASSOC)) {
			?>
				<div class="col-md-4" style="margin-top: 50px; color: black;">
					<div class="testimony">
						<blockquote >
							&ldquo; <?php echo $c_row['comment'];?> &rdquo;
						</blockquote>
						<p class="author" style="color: black;"><cite>yonas gezaie</cite></p>
					</div>
				</div>
			<?php } }?>
			</div>
		</div>	
	<!--fooer begin-->
	<?php require("includes/footer.php")?>