<?php
  $link=mysql_connect("localhost","root","") or die("数据库连接失败".mysql_error());
  mysql_select_db("mail",$link);
  mysql_query("set names gb2312");
  $sql=mysql_query("select * from contacts where id=".$_REQUEST['id']);
  $result=mysql_fetch_object($sql);
               
  if($result==false){//如果检索的信息不存在，则输出相应的提示信息
      echo "<div align='center' style='color:#FF0000; font-size:12px'>对不起,Fault</div>";
    }
  else{
      echo $result->contacts;
  }
?>