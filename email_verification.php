<?php
	
  error_reporting( ~E_NOTICE );
	require('includes/conDb.php');
  require("includes/header.php");
  $activation_code = $_GET['hdmona_user_activation_code'];
  
	if (isset($activation_code)) {
		
		$statement = $crud->check_activation_code($activation_code);
		$row=$statement->fetch(PDO::FETCH_ASSOC);
    $c= $statement->rowCount($statement);
     $id = $row['status'];

    echo $id;
		if ($c>0) {
  			if ($row['status'] =='not activat') {
          $user_id = $row['id'];
        $rslt = $crud->update_verify($user_id);
    
    if(isset($rslt)){
     $mess = '<label class="text-success">Your Email Address Successfully Verified <br />You can login Now - <a href="index.php">Login</a></label>';
    }
   }else{
    $mess = '<label class="text-info" style="min-height: 600px; margin-top: 200px;">Your Email Address Already Verified you can login</label>
   <div style="background-color: transparent;  color: white; margin-top: 50px;  margin-bottom: 200px; text-align: center; font-size: 20px;"> <a href="index.php"><img src="images/assetes/back2.png"/> Continue To First Page</a>  </div>';
   }
  
 }else{
  $mess = '<label class="text-danger">Invalid Link</label>
   <div style="background-color: transparent;  color: white; margin-top: 50px;  margin-bottom: 200px; text-align: center; font-size: 20px;"> <a href="index.php"><img src="images/assetes/back2.png"/> Continue To First Page</a>  </div>';
 }
}

?>

 <body>
  <div id="fh5co-wrapper">
  <div id="fh5co-page">
  <?php  require("includes/header_topics.php") ?>
  <!-- end:fh5co-header -->
  <div class="fh5co-parallax" style="background-image: url(images/assetes/hdmona_nebarit_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
          <div class="fh5co-intro fh5co-table-cell">
            <h1 class="text-center" style="background-color:gren">Registration</h1>
            <p> Hdmona Nebarit Entertainment </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container">
<div class="row">
  
            <?php  
            $message = "<div style='margin-top: 100px; width: 1000px; hieght: 100%;  border: 2px inset rgba(0, 0, 0, 0.7);'>
                          
                           <h1 style=' width: 700px; background-image:url(images/assetes/blue.png); font-size: 30px; margin-top: 10px;'>Hdmona Nebarit</h1>
                          
                        <p style='background-color:; margin-top: 20px; width: 200px; font-size: 20px;'>Hi !!!".$user."</p><p>Wellcome to Hdmona Nebarit Entertainment. </br></br>We are excited you are here.  just a little bump </br> your hdmona account will only work after your email verification.</p>
                        <p>Please Open this link to verify your email address -</br></br> <a href='".$base_url."email_verification.php?hdmona_user_activation_code=".$hdmona_user_activation_code."' style='text-decoration:underline;'>Hdmona Activation code</a> <p>Again Wellcome and Enjoy !!! <br/>Hdmona Nebarit Entertainment</p> 
                    </div>";
            ?>
   <h1 align="center" style="height: 400px;"><?php echo $mess; ?></h1>
  
   <h3></h3>
   
  </div>
 </div>  
<?php require("includes/footer.php"); ?>