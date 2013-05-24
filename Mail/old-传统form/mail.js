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
		//alert(editor.getAllHtml());

	    $.post("send.php", {
	                htmlContent:editor.getAllHtml()
	            }, function (data, textStatus){   
	                   //$("#content").html($("#content").html()+data);
	            }   
	    );   
		  }) ;     

});

function getContacts(){
	$.get("getContacts.php", {    
            id :  $("#select_id").val() 
        }, function (data, textStatus){   
                     $("#contacts").val(data); 
   }); 
}

function send(){
	$.post("temp1.php",{
		htmlContent : editor.getAllHtml()
	},function(data,textStatus){
		$("#content").val(data);
	});
}