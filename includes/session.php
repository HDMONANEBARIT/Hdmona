<?php

class Session{

	private $logged_in=false;
	public $user;


	function __construct(){
		session_start();
		}

//login after it is found in database
	public function login($users){
			 $_SESSION['user_id'] = $users;
			$this->logged_in=true;
	}
	public function logout(){
		unset($_SESSION['user_id']);
		$this -> logged_in = false;
	}
	public function is_logged_in(){
		return $this->logged_in;
	}
	
	public function check_session(){
		if (!empty($_SESSION['user_id'])) {
			return true;
		}else {
			return false;
		}
	}	
} 

$session = new Session();

?>