<?php

?>


<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>confirma</title>
        
        <meta charset="UTF-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	   
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	   
		<link href="../static/css/stilo.css" rel="stylesheet" type="text/css">

        <script src="../static/js/forminput.js"></script>	
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<script src="https://kit.fontawesome.com/f48343b6a3.js" crossorigin="anonymous"></script>
    </head>
  
 <body>
	   
		<header>
       
			 
		</header>
 		<script>
			    
		   var retornoSessao = sessionStorage.getItem('SessaAberta');
		 
			if(retornoSessao != 1){
				console.log(retornoSessao);
				$(document).ready(function() {
				$('#myModal').modal('show');
				})

			}   
			
	  	 </script>

		<div class="modal" id="myModal"  data-backdrop="static" data-keyboard="false"> 
			<div class="modal-dialog">
				<div class="modal-content">
			
					<!-- Modal Header -->
					<div class="modal-header">
					<h4 class="modal-title">Confirma ?</h4>
					<button type="button" class="close" data-dismiss="modal ">&times;</button >
					</div>
			
					<!-- Modal body -->
					<div class="modal-body">
					Ao aceitar os termos, fica de resposabilidade do usuario dados cadastrado no sistema
					</div>
			
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button"  id="btn-aceitar" onClick="aceitar()"data-dismiss="modal" >Sim</button> 
				
						<button type="button" id="btn-fechar" onclick="FecharModal()" data-toggle="modal" data-target="#btn-fechar" data-backdrop="static">Não</button> 
						
						<div class="modal hide" data-backdrop="static" ></div> <!--data-keyboard="false"></div>-->
					</div>
				</div>
			</div>
		</div>
		
		<script>
			var retornocfop = localStorage.getItem('cfopenco');
		    localStorage.clear(); 
		</script>
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </body>
</html>

