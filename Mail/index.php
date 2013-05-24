<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title>群发邮件</title>
	
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="mail.js"></script>
	<script type="text/javascript" charset="utf-8" src="ueditor/editor_config.js"></script>
	<script type="text/javascript" charset="utf-8" src="ueditor/editor_all_min.js"></script>

	<link type="text/css" href="ueditor/themes/default/css/ueditor.css"/>
	<link rel="stylesheet" type="text/css" media="all" href="css/style.css">
	<link rel="stylesheet" type="text/css" media="all" href="css/responsive.css">
</head>

<body>

	<section id="container">
		<h2>群发邮件</h2>
		<h3 id="success" style="color:red"><h3>
		<div name="hongkiat" id="hongkiat-form">
			<div id="wrapping" class="clearfix">


				<input type="text" name="fajian" id="fajian" placeholder="发件人姓名(默认为邮箱名)" autocomplete="off" tabindex="1" class="txtinput">
				<input  name="subject" id="subject" placeholder="主题" autocomplete="off" tabindex="3" class="txtinput">
				
				<div  id="sel" class="txtinput">
					<label >请选择群组</label>
					<select name="select" id="select_id">
					
					<?php
					  $link=mysql_connect("localhost","root","") or die("数据库连接失败".mysql_error());
					  mysql_select_db("mail",$link);
					  mysql_query("set names gb2312");
					  $sql=mysql_query("select * from contacts");
					  $info=mysql_fetch_array($sql);
					   
					  if($info==false){ 
					      echo "<div align='center' style='color:#FF0000; font-size:12px'>对不起，请刷新页面</div>";
					  }
					  else{
					    do{
					      echo "<option value=".$info["id"].">".$info["group"]."</option>";
					    }
					    while($info = mysql_fetch_array($sql));
					  }
					?>
					</select>
				</div>

				<input type="email" name="contacts" id="contacts" placeholder="收件人地址列表" autocomplete="off" tabindex="2" class="txtinput">

				
				<script type="text/plain" id="myEditor" class="myEditor"></script>
			</div>

			<section id="buttons">
				<button id="send1">发送</button>
				<br style="clear:both;">
			</section>
		</div>
	</section>

</body>
<link rel="stylesheet" type="text/css" media="all" href="css/easydialog.css">
<script type="text/javascript" src="js/easydialog.min.js" ></script>
</html>