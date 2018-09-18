<?php 
class admin{
	private $db;
		function __construct($DB_con){
			$this->db = $DB_con;
		}


public function movie_create($name, $link, $descr, $date, $img){ 
        try{ 
       $sqls = $this->db->prepare('INSERT INTO movie (name, full_movie, descri, date_time,  image) VALUES (:name, :link, :descr, :mdate, :img)');
               $sqls->bindParam(':name',$name);
               $sqls->bindParam(':link', $link);
               $sqls->bindParam(':descr', $descr);
               $sqls->bindParam(':mdate', $date);
               $sqls->bindParam(':img', $img);
               $sqls->execute();
          } catch(PDOException $e) {
             echo $e->getMessage(); 
             return false;
          }
   }

public function music_create($name, $link, $descr, $date, $img){ 
        try{ 
       $sqls = $this->db->prepare('INSERT INTO music (music_name, music_link, music_desc, music_date, music_image) VALUES (:name, :link, :descr, :mdate, :img)');
               $sqls->bindParam(':name',$name);
               $sqls->bindParam(':link', $link);
               $sqls->bindParam(':descr', $descr);
               $sqls->bindParam(':mdate', $date);
               $sqls->bindParam(':img', $img);
               $sqls->execute();
           return true;
          } catch(PDOException $e) {
             echo $e->getMessage(); 
             return false;
          }
   }


public function tv_show_create($name, $link, $descr, $date, $img){ 
        try{ 
       $sqls = $this->db->prepare('INSERT INTO tv_show (tv_show_name, tv_show_link, tv_show_descri, tv_show_date, tv_show_img) VALUES (:name, :link, :descr, :mdate, :img)');
               $sqls->bindParam(':name',$name);
               $sqls->bindParam(':link', $link);
               $sqls->bindParam(':descr', $descr);
               $sqls->bindParam(':mdate', $date);
               $sqls->bindParam(':img', $img);
               $sqls->execute();
          } catch(PDOException $e) {
             echo $e->getMessage(); 
             return false;
          }
   }

   public function chk_empty($user, $password){
        if (empty($user)) {
                  return false;
               }elseif (empty($password)) {
                   return false;
               } elseif(!empty($user) && !empty($password)) {
                return true;
               }
      }

   public function chk_input($user, $password){
    $q = $this->db-> prepare('SELECT id FROM admin WHERE admin_name= :user AND admin_password= :password');
    $q->bindParam(':user', $user);
    $q->bindParam(':password', $password);
    $q->execute();
    $row=$q->fetch(PDO::FETCH_ASSOC);
    $rst = $row['id'];
    return $rst;
   }

}

?>