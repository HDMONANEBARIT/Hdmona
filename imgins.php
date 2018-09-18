<?php
 error_reporting( ~E_NOTICE ); // avoid notice
  require_once("includes/conDb.php");
  require_once("includes/conDb.php");
 if(isset($_POST['btnsave']))
 {
  $username = $_POST['user_name'];// user name
  $userjob = $_POST['user_job'];// user email
  
  $imgFile = $_FILES['user_image']['name'];
  $tmp_dir = $_FILES['user_image']['tmp_name'];
  $imgSize = $_FILES['user_image']['size'];
  
  
 
   $upload_dir = 'images/usr_img/user'; 
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
   echo $imgExt;
  
  
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 

   $userpic = rand(1000,1000000).".".$imgExt;
    
    
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);

            $crud->insertionm($username, $userjob, $userpic);
 }
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<form method="post" enctype="multipart/form-data" class="form-horizontal">
     
 <table class="table table-bordered table-responsive">
 
    <tr>
     <td><label class="control-label">Username.</label></td>
        <td><input class="form-control" type="text" name="user_name" placeholder="Enter Username" value="sd" /></td>
    </tr>
    
    <tr>
     <td><label class="control-label">Profession(Job).</label></td>
        <td><input class="form-control" type="text" name="user_job" placeholder="Your Profession" value="as" /></td>
    </tr>
    <tr>
     <td><label class="control-label">Profession(Job).</label></td>
        <td><input class="form-control" type="text" name="email" placeholder="Your Profession" value="asd" /></td>
    </tr>
    
    <tr>
     <td><label class="control-label">Profile Img.</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>
</body>
</html>