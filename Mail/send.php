<?php
      require("PHPMailer/class.phpmailer.php");   
      $mail = new PHPMailer(); 
      $mail->IsSMTP();    
      $mail->Host = "smtp.163.com"; 
      $mail->SMTPAuth = true;   
	  
	  //设置邮箱用户名和密码
      $mail->Username = "brubeno@163.com";    
      $mail->Password = "dongtianhen0301";  
      
	  
	  $mail->From = "brubeno@163.com";   
      $mail->FromName = $_REQUEST['fajian']; 

      $address = explode(";", $_REQUEST['contacts']);
      foreach ($address as $addr) {
            $mail->AddAddress("$addr","");
      }  
      
      $mail->CharSet = "utf-8";//设置字符集编码   
      $mail->Subject = $_REQUEST['subject'];   
      //$mail->Body = $_POST['content'];//邮件内容（可以是HTML邮件）   
      $mail->IsHTML(true);
      $mail->Body = $_REQUEST['htmlContent'];

      $mail->AltBody = "This is the body in plain text for non-HTML mail clients";   
      if(!$mail->Send())   
      {   
      echo "Message could not be sent. <p>";   
      echo "Mailer Error: " . $mail->ErrorInfo;   
      exit;   
      }   
      echo "发送成功，您可以再发送一封！";//发送成功显示的信息   
      //echo $_REQUEST['htmlContent'];

?>