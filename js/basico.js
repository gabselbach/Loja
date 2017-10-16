$(function() {
	 if(sessionStorage.getItem("quantidade")){
	 	var field=sessionStorage.getItem("quantidade");
		var valor=sessionStorage.getItem("valor");
		var novo=parseInt(field)+parseInt(1);
		var total = (parseInt(novo)* parseFloat(valor).toFixed(2)).toFixed(2);
				
					$("#total").text(total);
	 }
$("#formulario").submit(function(e){
			 
				e.preventDefault();
		      	$.ajax({
		      	 type:"POST",
		      	 async: true,
		         url: "controllers/AlterarInformacao.php",
		         data:$("#formulario").serialize(),
		          success: function(data){
			            if(data){
			            		$(".saida").html("Dados Alterados com Sucesso!");
			            }else{
			            	
			            }
			         }
			      });
				});
$("#logar").submit(function(e){
			 
				e.preventDefault();
		      	$.ajax({
		      	 type:"POST",
		      	 async: true,
		         url: "controllers/ConfereCliente.php",
		         data:$("#logar").serialize(),
		          success: function(data){
			            if(data==0){
			            	location.href='index.php'
			            }else{
			            	$(".erro").html(data);
			            }
			         }
			      });
				});
$(".but").click(function(e){
			 var field,cont,valor,novo;
				e.preventDefault();
		      if(sessionStorage.getItem("quantidade")){
					field=sessionStorage.getItem("quantidade");
					valor=sessionStorage.getItem("valor");
					 var quantidade = document.getElementById('qt');
					quantidade.value=parseInt(field)+parseInt(1);
					novo=parseInt(field)+parseInt(1);
					 sessionStorage.setItem("quantidade",quantidade.value);
					var total = (parseInt(novo)* parseFloat(valor).toFixed(2)).toFixed(2);
					document.getElementById('qtescolhida').value = novo;
					document.getElementById('tot').value = total;
					$("#total").text(total);
					  
				}else{
					 var quantidade = document.getElementById('qt');
					quantidade.value=parseInt(quantidade.value)+parseInt(1);
					 sessionStorage.setItem("quantidade",quantidade.value);
					  var v1 = document.getElementById('inicio');
					  sessionStorage.setItem("valor",v1.value);
				}
	});
$(".buti").click(function(e){
			 
				var field,cont;
				e.preventDefault();
		      if(sessionStorage.getItem("quantidade")){
					field=sessionStorage.getItem("quantidade");
					valor=sessionStorage.getItem("valor");
					if(field!=0){
					 var quantidade = document.getElementById('qt');
					quantidade.value=parseInt(field)-parseInt(1);
					novo=parseInt(field)-parseInt(1);
					 sessionStorage.setItem("quantidade",quantidade.value);
					 var total = (parseInt(novo)* parseFloat(valor).toFixed(2)).toFixed(2);
					document.getElementById('qtescolhida').value = novo;
					document.getElementById('tot').value = total;
					$("#total").text(total);
					}

					
					  
				}else{
					//Fazer isso tirando o produto do ar
					 var quantidade = document.getElementById('qt');
					quantidade.value=parseInt(quantidade.value)+parseInt(1);
					 sessionStorage.setItem("quantidade",quantidade.value);


				}
		      
	});
});