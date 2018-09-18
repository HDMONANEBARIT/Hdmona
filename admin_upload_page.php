<?php 
	error_reporting( ~E_NOTICE );
		require_once("includes/admin_crud.php");
		require_once("includes/conDb.php");

		if (isset($_POST['movie_submit'])) {
			$name = $_POST['movie_name'];
			$link =$_POST['movie_link'];
			$descr = $_POST['movie_descri'];
			$date = $_POST['movie_date'];


			$imgFile = $_FILES['movie_img']['name'];
			$tmp_dir = $_FILES['movie_img']['tmp_name'];
			$imgSize = $_FILES['movie_img']['size'];
			$upload_dir = 'images/movies/'; 
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
			$img_up = "hdmona".rand(1000,1000000).".".$imgExt;
				
				move_uploaded_file($tmp_dir, $upload_dir.$img_up);
			
			$sub = $admin_crud->movie_create($name, $link, $descr, $date, $img_up);
						if ($sub== true) {
							$mess = '<label class="text-error" style="color: red;">movie inserted </label>';
						}
		} 

		if (isset($_POST['music_submit'])) {
			$name = $_POST['music_name'];
			$link =$_POST['music_link'];
			$descr = $_POST['music_descri'];
			$date = $_POST['music_date'];
		
			$imgFile = $_FILES['music_img']['name'];
			$tmp_dir = $_FILES['music_img']['tmp_name'];
			$imgSize = $_FILES['music_img']['size'];
			$upload_dir = 'images/music/'; 
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
			$img_up = "hdmona".rand(1000,1000000).".".$imgExt;
				$moved = move_uploaded_file($tmp_dir, $upload_dir.$img_up);
						
			$sub = $admin_crud->music_create($name, $link, $descr, $date, $img_up);
						if ($sub== true) {
							$mess = '<label class="text-error" style="color: red;">Music inserted </label>';
						}
		} 
				
		if (isset($_POST['tv_show_submit'])) {
					$name = $_POST['tv_show_name'];
					$link =$_POST['tv_show_link'];
					$descr = $_POST['tv_show_descri'];
					$date = $_POST['tv_show_date'];
					
						$imgFile = $_FILES['tv_show_img']['name'];
						$tmp_dir = $_FILES['tv_show_img']['tmp_name'];
						$imgSize = $_FILES['tv_show_img']['size'];
						$upload_dir = 'images/tv_show/'; 
						$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
						$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
						$img_up = "hdmona".rand(1000,1000000).".".$imgExt;
						move_uploaded_file($tmp_dir, $upload_dir.$img_up);
					$sub = $admin_crud->tv_show_create($name, $link, $descr, $date, $img_up);
					if ($sub) {
						$mess = '<label class="text-error" style="color: red;">Tv Show inserted </label>';
					}
		}
?>
<html>
<head>
	<title> Admin Upload</title>
</head>
<body>
	<div class="container" style=" margin-left: 100px;">
		<FORM action="" method="post" class="contact-form" id="contact-form" enctype="multipart/form-data">
		<table>
			<!-- <tr> 
				<td> <?php echo $mess; ?> </td>
			</tr> -->
			<tr> 
				<td> <h1> MOVIE</h1></td>
				<tr>
					<td>
						<label>movie name:</label> <input type="text" name="movie_name">

					</td>
				</tr>
				<tr>
					<td>
						<label>movie link :</label> <input type="text" name="movie_link">
					</td>
				</tr>
				<tr>
					<td>
						<label>movie describtion:</label> <input type="text" name="movie_descri">
					</td>
				</tr>
				<tr>
					<td>
						<label>realse Date:</label> <input type="date" name="movie_date">
					</td>
				</tr>
				<tr>
					<td>
						<label>movie image:</label> <input type="file" name="movie_img" class="imgs input-group"  accept="image/*"/>
					</td>
					
				</tr>
				<tr>
					<td>
						<button name="movie_submit" type="submit" class="btn btn-primary" style="margin-left: 230px; background-color: black; color: white; border: 1px solid white;border-radius: 100px;">Submit</button>
					</td>
				</tr>
				<tr>
					<td>
						<button name="movie_submit" type="submit" class="btn btn-primary" style="margin-left: 230px; background-color: black; color: white; border: 1px solid white;border-radius: 100px;">DELETE</button>
					</td>
				</tr>
			</tr>
			<!-- <tr> 
				<td> <?php echo $mess; ?> </td>
			</tr> -->
			<tr>

				<td> <h1> MUSIC</h1></td>
				<tr>
					<td>
						<label>music name:</label> <input type="text" name="music_name">
					</td>
				</tr>
				<tr>
					<td>
						<label>music link :</label> <input type="text" name="music_link">
					</td>
				</tr>
				<tr>
					<td>
						<label>music describtion:</label> <input type="text" name="music_descri">
					</td>
				</tr>
				<tr>
					<td>
						<label>realse Date:</label> <input type="date" name="music_date">
					</td>
				</tr>
				<tr>
					<td>
						<label>music image:</label> <input type="file" name="music_img">
					</td>
					
				</tr>
				<tr>
					<td>
						<button name="music_submit" type="submit" class="btn btn-primary" style="margin-left: 230px; background-color: black; color: white; border: 1px solid white;border-radius: 100px;">Submit</button>
					</td>
				</tr>
			</tr>
			<tr> 
				<td> <?php echo $mess; ?> </td>
			</tr> 
			<tr> 
				
				<td> <h1> TV SHOW</h1></td>
				<tr>
					<td>
						<label>TV SHOW name:</label> <input type="text" name="tv_show_name">
					</td>
				</tr>
				<tr>
					<td>
						<label>TV SHOW link :</label> <input type="text" name="tv_show_link">
					</td>
				</tr>
				<tr>
					<td>
						<label>TV SHOW describtion:</label> <input type="text" name="tv_show_descri">
					</td>
				</tr>
				<tr>
					<td>
						<label>realse Date:</label> <input type="date" name="tv_show_date">
					</td>
				</tr>
				<tr>
					<td>
						<label>TV SHOW image:</label> <input type="file" name="tv_show_img">
					</td>
					
				</tr>
				<tr>
					<td>
						<button name="tv_show_submit" type="submit" class="btn btn-primary" style="margin-left: 230px; background-color: black; color: white; border: 1px solid white;border-radius: 100px;">Submit</button>
					</td>
				</tr>
			</tr>
		</table>
	</FORM>
  </div>
</body>
</html>