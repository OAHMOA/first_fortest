$(function(){
	getContacts();

	$("#select_id").change(function(){
		getContacts();
	});

	var editor = new baidu.editor.ui.Editor();
    editor.render('myEditor');
    editor.ready(function(){
     	editor.setContent("");
    });


	$("#send1").click(function(){   

		if( editor.getContent() ){
			popUp();
		    $.post("send.php", {
		    			fajian : $("#fajian").val(),
		    			contacts : $("#contacts").val(),
		    			subject : $("#subject").val(),
		                htmlContent:editor.getAllHtml()
		            }, function (data, textStatus){   
		            	
		            	editor.setContent("");
		            	$("#subject").val("");
		                $("#success").html(data);
		            }   
		    );  
		} else{
			alert("不能发送空邮件!");
		}
	});  
/*
	$("#send1").click(function(){
		alert(editor.getAllHtml());
		$("#xxx").html(editor.getAllHtml());
	});
*/
});

function getContacts(){
	$.get("getContacts.php", {    
            id :  $("#select_id").val() 
        }, function (data, textStatus){   
                     $("#contacts").val(data); 
   }); 
}

function popUp(){
	 easyDialog.open({
		container : {
			content : '正在发送，请稍候...'
		},
		autoClose : 1500
	});
}

