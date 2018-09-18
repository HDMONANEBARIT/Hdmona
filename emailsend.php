<?php

require 'PHPMailer/PHPMailer/PHPMailer.php';  
            	//$mail = new PHPMailer();
                 $mail->IsSMTP();        
                 $mail->Host = 'smtp.gmail.com';  
                 $mail->SMTPAuth = true;       
                 $mail->Username ='joieama2017@gmail.com';     
                 $mail->Password ='meandtheworld';    
                 $mail->SMTPSecure ='ssl';      
                 $mail->Port = 465;
                 $mail->From = 'joieama2017@gmail.com';   
                 $mail->FromName = 'Hdmona Nebarit Entertainment'; 
                 $mail->AddAddress('joieama2017@gmail.com');  
                 //$mail->WordWrap = 70;       
                 $mail->isHTML(true);       
                 $mail->Subject = 'Test Email Verification';   
                 $mail->Body = "the test Body"; 
                 
                 if ($mail->Send()) {
                 	echo "sent";
                 }else {
                 	echo "not sent";
                 }


?>