<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>PHP与Web表单的综合应用</title>

    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="mail.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor/editor_config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor/editor_all_min.js"></script>
    <link type="text/css" href="ueditor/themes/default/css/ueditor.css"/>

  </head>

  <body>
    
      <div id="mail_frame">
        <label>发件人 ：<input name="fajian" type="text" id="fajian"/></label><br/>
        <label>请选择群组</label>
          <select name="select" id="select_id">
            <?php
              $link=mysql_connect("localhost","root","") or die("数据库连接失败".mysql_error());
              mysql_select_db("mail",$link);
              mysql_query("set names gb2312");
              $sql=mysql_query("select * from contacts");
              $info=mysql_fetch_array($sql);
               
              if($info==false){          //如果检索的信息不存在，则输出相应的提示信息
                  echo "<div align='center' style='color:#FF0000; font-size:12px'>对不起，尚未添加任何群组</div>";
              }
              else{
                do{
                  echo "<option value=".$info["id"].">".$info["group"]."</option>";
                }
                while($info = mysql_fetch_array($sql));
              }
            ?>
          </select>
        <p>收件人:<input name="contacts" id="contacts"></input></p>
        主题：<input name="subject" type="text" id="subject" size="25"/><br /> 
        
        <script type="text/plain" id="myEditor" class="myEditor"></script>

        <button id ="send1" name="Submit" >发送</button>
        <p id="xxx"></p>
      </div>
  </body>

</html>

