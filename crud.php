<?php
/**
*   // database
*/


 // include("includes/session.php");

   

          // use PHPMailer\PHPMailer\PHPMailer;
          // use PHPMailer\PHPMailer\Exception;

          require 'PHPMailer/PHPMailer/Exception.php';
          require 'PHPMailer/PHPMailer/PHPMailer.php';
          require 'PHPMailer/PHPMailer/SMTP.php';

class crud{
	private $db;
function __construct($DB_con){
		$this->db = $DB_con;
	}
  	public function create($user, $email, $password, $hdmona_user_activation_code, $stut, $userpic){ 
        try{ 
               $sqls = $this->db->prepare('INSERT INTO users (name, email, password, hdmona_user_activation_code, status, usr_img) VALUES (:user, :email, :password, :hdmona_user_activation_code, :stut, :userpic)');
               $sqls->bindParam(':user',$user);
               $sqls->bindParam(':email', $email);
               $sqls->bindParam(':password', $password);
               $sqls->bindParam(':hdmona_user_activation_code', $hdmona_user_activation_code);
               $sqls->bindParam(':stut', $stut);
               $sqls->bindParam(':userpic', $userpic);
               $sqls->execute();
           $last_id = $this->db->lastInsertId();
              return $last_id;
          } catch(PDOException $e) {
             echo $e->getMessage(); 
             return false;
          }
   }
   public function check_status($user_name){
      $check_activation =$this->db->prepare( 'SELECT status FROM users WHERE name =:user_name');
        $check_activation-> bindParam(':user_name', $user_name);
        $check_activation->execute();
         $row=$check_activation->fetch(PDO::FETCH_ASSOC);
        $stts = $row['status'];
        if ($stts == "activated") {
         return true;
        }else if ($stts = "not activated") {
          return false;
        }
    }
   public function inserting($comment, $com_user_id ){
       try{
        $ins = $this->db->prepare('INSERT INTO hd_comm (comm, user) VALUES (:comment, :com_user_id)');
          $ins ->bindParam(':comment', $comment);
          $ins ->bindParam(':com_user_id', $com_user_id);
           $ins ->execute();
              return true;
       }catch(PDOException $e) {
             return false;
      }
    }

  public function check_user_exist($user, $email){
      try{
      $check = "SELECT name, email FROM users WHERE name= :user AND email= :email";
      $chck=$this->db->prepare($check);
      $chck ->execute([':user' => $user, ':email' => $email]);
      $cou= $this->rowCount($chck);
      return $cou;
    }catch (Exception $e) {
    echo "Failed: this is yours" . $e->getMessage();
     }
  }
      public function check_user_exist_update($user, $email, $password, $ses_id){
          try{
          $check = "SELECT name, email, password FROM users WHERE name= :user AND email= :email AND password= :password AND id= :ses_id";
          $chck=$this->db->prepare($check);
          $chck ->execute([':user' => $user, 
                            ':email' => $email,
                            ':password'=> $password,
                            ':ses_id'=> $ses_id]);
          $cou= $this->rowCount($chck);
          return $cou;
        }catch (Exception $e) {
        echo "Failed: this is yours" . $e->getMessage();
        return false;
         }
      }

   public function rowCount($chck){
          $cou= $chck->rowCount();
              return $cou;
   }


   public function check_sign_in_exist($name, $password){
    $check = "SELECT name, password FROM users WHERE name= :name && password= :password LIMIT 1";
    $ch=$this->db->prepare($check);
    $ch ->execute(['name' => $name, 'password' => $password]);
    $c= $this->rowCount($ch);
    return $c;
   }

    public function getID($name){
      $query = "SELECT id FROM users WHERE name= '$name'";
     $stm= $this->db->query($query);
           $stm ->execute();
      $row=$stm->fetch(PDO::FETCH_ASSOC);
      $user_id = $row['id'];
      return $user_id;
     }


    public function update_verify($user_id){
      try{
            $update_query = $this->db->prepare('UPDATE users SET status = "verified" WHERE id = :user_id');

           $update_query ->bindParam(':user_id', $user_id);
           $update_query ->execute();
            $result = $stmt->fetchAll();
            return  $result; 
          }  catch(PDOException $e){
              echo $e->getMessage();
              echo "here it is johnnny"; 
             return false;
            }
       }
        
        public function update_insert($user, $email, $password, $userpic, $ses_id){
        try{
              $update_query = $this->db->prepare('UPDATE users SET name= :user, email= :email, password= :password, usr_img= :userpic WHERE id = :ses');
               $update_query->bindParam(':user',$user);
               $update_query->bindParam(':email', $email);
               $update_query->bindParam(':password', $password);
               $update_query->bindParam(':userpic', $userpic);
                $update_query->bindParam(':ses', $ses_id);
               $update_query->execute();
           $last_id = $this->db->lastInsertId();
              return $last_id;
         }catch(PDOException $e){
                $asd= $e->getMessage();
               return  $asd;
              }
       }

    public function update_reset($email, $password, $hdmona_user_reset_code){
      $update_reset_q = $this->db->prepare('UPDATE users SET  password= :password, hdmona_user_activation_code= :hdmona_user_reset_code WHERE email = :email');
               $update_reset_q->bindParam(':email', $email);
               $update_reset_q->bindParam(':password', $password);
               $update_reset_q->bindParam(':hdmona_user_reset_code', $hdmona_user_reset_code);
               $update_reset_q->execute();
               return true;
    }

  public function update($user, $email, $password){ 
                 try{
                       $sqls = $this->db->prepare('UPDATE users SET(name, email, password, hdmona_user_activation_code, status, usr_img) VALUES (:user, :email, :password, :hdmona_user_activation_code, :stut, :userpic)');
                       $sqls->bindParam(':user',$user);
                       $sqls->bindParam(':email', $email);
                       $sqls->bindParam(':password', $password);
                       $sqls->execute();
                   $last_id = $this->db->lastInsertId();
                      return $last_id;
                  } catch(PDOException $e) {
                     echo $e->getMessage(); 
                     return false;
                  }
           }

  public function delete($id){
    $id_rep = user_Account_Deleted;
      $stmt = $this->db->prepare("UPDATE users SET users.password=:id_rep WHERE id=:id");
      $stmt->bindParam(":id_rep", $id_rep);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      return true;
     }
  public function ins_lik($comm_id, $user_id){
    $ins = $this->db->prepare('INSERT INTO movie_com_likes (movie_com_id , user_id) VALUES (:comm_id, :user_id)');
             $ins->bindParam(':comm_id', $comm_id);
             $ins->bindParam(':user_id', $user_id);
             $ins->execute();
           $cou= $ins->rowCount();
          return $cou;

  }
    public function getlikes(){
      $stmt = $this->db->prepare('SELECT id FROM movie_com_likes WHERE movie_com_id= :id');
              $stmt->bindParam(':id', $id);
              $stmt->execute();
              $cou= $stmt->rowCount();
              return $cou;
        
  }
    public function query_sele($query){
      $stm= $this->db->query($query);
      $stm ->execute();
      return $stm;
    }
  public function inserting_com($user_id, $pro_id, $com_date, $comment){
    $movie_com = $this->db->prepare('INSERT INTO user_comm (user_id, pro_id , com_date, comment) VALUES (:user_id, :pro_id, :com_date, :comment)');
   $movie_com ->bindParam(':user_id', $user_id);
    $movie_com->bindParam(':pro_id', $pro_id);
    $movie_com ->bindParam(':com_date', $com_date);
    $movie_com ->bindParam(':comment', $comment);
      $movie_com ->execute();
    return true;
    
  } 

  public function inserting_tv_show_com($user_id, $pro_id, $com_date, $comment){
    $movie_com = $this->db->prepare('INSERT INTO tv_show_comm (user_id,tv_show_pro_id , tv_show_date, tv_show_comment) VALUES (:user_id, :pro_id, :com_date, :comment)');
        $movie_com ->bindParam(':user_id', $user_id);
        $movie_com ->bindParam(':pro_id', $pro_id);
        $movie_com ->bindParam(':com_date', $com_date);
        $movie_com ->bindParam(':comment', $comment);
       $movie_com ->execute();
    return true;
    }
   public function inserting_music_com($comenter_id, $pro_id, $com_date, $comment){
    $music_com = $this->db->prepare('INSERT INTO music_user_com (music_user_id, music_pro_id, music_com_date, music_comment) VALUES (:comenter_id, :pro_id, :com_date, :comment)');
      $music_com -> bindParam(':comenter_id', $comenter_id);
      $music_com -> bindParam(':pro_id', $pro_id); 
      $music_com -> bindParam(':com_date', $com_date);
      $music_com -> bindParam(':comment', $comment);
      $music_com ->execute();
    return true;
  }

  public function check_activation_code($activation_code){
    $query = "SELECT * FROM users WHERE hdmona_user_activation_code = :activation_code";
    $ch=$this->db->prepare($query);
    $ch ->execute([':activation_code' => $activation_code]);
    return $ch;
  }

  public function check_empity($user, $email, $password, $imgFile){
              $nameErr = "";
    if (empty($user)) {
          return false;
           }elseif (empty($email)) {
           return false;
           }elseif (empty($password)) {
              return false; 
            }elseif (empty($imgFile)) {
              return false; 
            }elseif(!empty($user) || !empty($email) || !empty($password || !empty($imgFile))){
            return true;
           }
           
    }

    public function check_empity_UPDATE($user, $email, $password, $imgFile){
    if (empty($user)) {
          return false;
           }elseif (empty($email)) {
           return false;
           }elseif (empty($password)) {
              return false; 
            }elseif (empty($imgFile)) {
              $noimgFile="empity";
              return $noimgFile; 
            }elseif(!empty($user) || !empty($email) || !empty($password || !empty($imgFile))){
            return true;
           } 
    }
    
    public function check_email($email){
       $check = "SELECT email FROM users WHERE email= :email";
      $chck=$this->db->prepare($check);
      $chck ->execute([':email' => $email]);
           $chck->execute();
           return true;
    }

  public function check_empity_user($user, $password){
        if (empty($user)) {
                  return false;
               }elseif (empty($password)) {
                   return false;
               } elseif(!empty($user) && !empty($password)) {
                return true;
               }
      }

  public function check_coment_empity($comment){
      if (empty($comment)) {
             
              return false;
             } elseif(!empty($comment)) {
              return true;
             }
    }
    public function chk_empty_search($search_txt){
      if (empty($search_txt)) {
        return false;
      }elseif (!empty($search_txt)) {
        return true;
      }
    }

   public function send_mail($email, $user, $message) {  
         
           try{
              $mail = new PHPMailer\PHPMailer\PHPMailer();
                 $mail->SMTPDebug = 2;
                 $mail->isSMTP();        
                 $mail->Host = 'smtp.gmail.com';  
                 $mail->SMTPAuth = true;       
                 $mail->Username ='joieama2017@gmail.com';     
                 $mail->Password ='meandtheworld';    
                 $mail->SMTPSecure ='ssl';      
                 $mail->Port = 465;
                 $mail->From = 'joieama2017@gmail.com';   
                 $mail->FromName = 'Hdmona Nebarit Entertainment'; 
                 $mail->AddAddress($email);  
                 $mail->WordWrap = 70;       
                 $mail->isHTML(true);       
                 $mail->Subject = 'Test Email Verification';   
                 $mail->Body = $message; 
                if ($mail-> send()) {
                   return true;
                 } else{
                 return false;
                 }
           } catch (Exception $e) {
                  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }
  } 
}
   


?>