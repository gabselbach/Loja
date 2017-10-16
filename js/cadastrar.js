$(function() {
$("#formu").submit(function(e){
				e.preventDefault();
		      	$.ajax({
		      	 type:"POST",
		      	 async: true,
		         url: "controllers/InserirCliente.php",
		         data:$("#formu").serialize(),
		          success: function(data) {
		            $(".saida").html(data);
		          
			         }
			      });
				});
});