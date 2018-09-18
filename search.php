<?php 
	require_once("includes/conDb.php");
	require_once("crud.php");
		$q = $_GET['q'];
		 if (!empty($q)) {

			$query = "SELECT * FROM movie, music WHERE music_desc LIKE '%$q%'|| music_name LIKE '%$q%' || name LIKE '%$q%' || descri LIKE '%$q%'";
			 $execQuery = $crud->query_sele($query);
			 $count = $execQuery->rowCount();
		 if ($count>0) {
			 	while ($row=$execQuery->fetch(PDO::FETCH_ASSOC)) {

			 	$s ="<div id='searched' syle='margin-top: 30px;'>
			 	<div id='img_div'><img src='images/movies/".$row['image']."'/></div>
			 	<div id='name'>".$row['name']."</div>";
			 	echo $s;

			 	$ss ="<div id='searched' syle='margin-top: 30px;' >
			 	<div id='img_div'><img src='images/music/".$row['music_image']."'/></div>
			 	<div id='name'>".$row['music_name']."</div></div>";
			 	echo $ss;
			 	}
			 }else{
			 	$err = "<div id='searched' style='margin-top:-100px; background-color:black;'> We dont think we have that check word again </div>";
					echo $err;
		}
	}

?>
