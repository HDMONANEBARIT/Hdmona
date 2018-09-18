<?php 
	  function cropin($cd){
	    $limiter = $cd/5;
	            $limits= ceil($limiter);
	            return $limits;
	  }

	 function com($c){
	    $limiter = $c/18;
	            $limits= ceil($limiter);
	            return $limits;
	  }
	 function pager($ps){

	  $p =$_GET[$ps];
	          if ($p=="" || $p=="1") {
	            $pages = 0;
	          } else {
	            $pages=($p*6)-6;
	          }
	          return $pages;
	}

	 function music_pager($ps){

	  $p =$_GET[$ps];
	          if ($p=="" || $p=="1") {
	            $pages = 0;
	          } else {
	            $pages=($p*6)-6;
	          }
	          return $pages;
	}

	function show_older($p){
 		$p =$_GET[$p];
 		if ($p=="" || $p=="1") {
 			 $pag = 0;
 		}else{
 			$pag= $p-1;
 		}
 		return $pag;
	}

	function show_newer($p){
 		$p =$_GET[$p];
 		if ($p=="" || $p=="1") {
 			 $pag = 0;
 		}else{
 			$pag= $p+1;
 		}
 		return $pag;
	}
	
	function more_num($nu){
	    $numbers = $nu/5;
	            $limits= ceil($numbers);
	            return $limits;
	  }

	function check_variable($data){
		$dat = trim($data);
		$da = stripslashes($dat);
  		$d = htmlspecialchars($da);
  			return $d;
	}

	function image_format($imgExt, $valid_extensions, $tmp_dir, $upload_dir, $userpic){
		if(in_array($imgExt, $valid_extensions)){   
	   
	    if($imgSize < 5000000){
	    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
	      return true;
	    	}
	    else{
	     $errMSG = "Sorry, your file is too large.";
	     return $errMSG;
	    	}
	   	  }else{
	    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
	     return $errMSG;
	   }
	  }


	function nxt($nex){
			$nex++;
			return $nex;
	 }

	 function prv($pr){
			if ($pr==0||$pr==1) {
				$pr == 1;
				return $pr;
			}elseif ($pr>1) {
				$pr -= 1;
				return $pr;
			}
	 }
?>