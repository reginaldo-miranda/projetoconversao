<?php
 include_once "BEtopo.php";
 include("../templates/BEconexao_pdo.php");
      include("../templates/BEfecha_conexao.php");
    

        $conn = getconexao();
        $listagem = $conn->prepare("SELECT * FROM CADASTRO");
        $listagem->execute();
            // segundo exemplos com fethcAll - retorna todos os registro do banco em forma de array
            $linha=$listagem->fetchAll(PDO::FETCH_OBJ);
            foreach($linha as $listar){
             echo "Codigo   :  " .$listar->codigo;
             echo "   empresa  :" .$listar->empresa;
             echo "    Cnpj :" .$listar->cnpj."<br>";
             echo "<a href='FReditarCadastro.php?id=".$listar->codigo."'>Editar</a><hr>";
             
          
     }
  

      
    
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>Logim</title>
        
        <meta charset="UTF-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	   
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	   
		<link href="../static/css/stilo.css" rel="stylesheet" type="text/css">

        <script src="../static/js/forminput.js"></script>	
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<script src="https://kit.fontawesome.com/f48343b6a3.js" crossorigin="anonymous"></script>
    </head>
  
 <body>

 <?php

  
    


       /*
       // terceiro exemplo com fetch_obj - retorna objeto
       $linha=$listagem->fetchAll(PDO::FETCH_OBJ);
       foreach($linha as $listar){
    //    echo "Cnpj :" .$listar->cnpj."<br>";

      } */
?>

     
       
     
<!--

       <section class="centro">
           <h1>lista de email</h1>
           <div class="tabela">
               <div class="linha">
                   <div class="coluna">Cnpj</div>
                   <div class="coluna">Email</div>
                   <div class="coluna">fone</div>
                   <div class="coluna">Editar/Excluir</div>
               </div>
               <div class="linha">

                   <div class="coluna">1</div>
                   <div class="coluna">2</div>
                   <div class="coluna">3</div>
                   <div class="coluna">4</div>
               </div>
           </div>

       </section> -->
	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </body>
</html>



