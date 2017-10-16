$(function() {
$("#form").submit(function(e){
			 
				e.preventDefault();
		      	$.ajax({
		      	 type:"POST",
		      	 async: true,
		         url: "../controllers/ConfereAdm.php",
		         data:$("#form").serialize(),
		          success: function(data){
			            if(data==0){
			            	location.href='administrativo.php'
			            	
			            }else{
			            	$(".erro").html(data);
			            }
			         }
			      });
				});
	});