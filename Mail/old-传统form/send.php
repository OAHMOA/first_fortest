<?php
  if (@$_POST['Submit']=="发送"){
      require("PHPMailer/class.phpmailer.php");   
      $mail = new PHPMailer(); 
      $mail->IsSMTP();    
      $mail->Host = "smtp.163.com"; 
      $mail->SMTPAuth = true;   
      $mail->Username = "brubeno@163.com";    
      $mail->Password = "dongtianhen0301";  
      $mail->From = "brubeno@163.com";   
      $mail->FromName = "Zhangyan"; 

      $address = explode(";", $_POST['contacts']);
      foreach ($address as $addr) {
            $mail->AddAddress("$addr","");
      }  
      
      $mail->CharSet = "GB2312";//设置字符集编码   
      $mail->Subject = $_POST['subject'];   
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
      echo "Message has been sent";//发送成功显示的信息   
    }
else{
      echo "dddd";
}
?>