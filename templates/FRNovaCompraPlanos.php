<?php session_start();
  $plano = '';
  system("TZ=BRT date");
  //date_default_timezone_set('America/Sao_Paulo');
  ini_set('date.timezone','America/Sao_Paulo');
  include_once ('BEtopo.php');

 
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
	 
		<header>
			<div></div>
			 
           <script>MudaTextoTopo1()</script>
        </header>  
        <div class="conteiner"> 
          <form id="compraplano "name="BENovaGravaCompra.php" action="BENovaGravaCompra.php" method="POST">
              
                <div id="container">
                    <div id="divisao">
                  
                       <div id="bplanos1">
                           <div id="1plano">
                           
                            <a href='BENovaGravarCompra.php?seleciona=<?php echo $plano= '1'; ?>'>Plano 1</a> 
                                                     
                           </div>
                        </div>
                        <div id="2plano">
                           <div id="plano2">
                           <a href='BENovaGravarCompra.php?seleciona=<?php echo $plano='2'; ?>'>Plano 2</a>
                           </div>
                        </div>
                        <div id="3plano">
                           <div id=plano3>
                           <a href='BENovaGravarCompra.php?seleciona=<?php echo $plano='3'; ?>'>Plano 3</a>
                           </div> 
                        </div>
                    </div>

                </div> 
          </form>
       </div> <!-- fim conteiner -->

		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </body>
</html>



<!-- https://pt.stackoverflow.com/questions/154065/como-passar-dados-de-um-input-para-outro-com-html-e-javascript  -->

<!--https://www.youtube.com/watch?v=x-4z_u8LcGc&t=769s-->

<!--site de cores site fletuicolors-->

<!---https://cosmos.bluesoft.com.br/  site de pesquisas cfop ncm csosn-->

<!--https://www.youtube.com/watch?v=GtsNZtzZiec
https://www.youtube.com/watch?v=Kk-awYRtPZg pesquisa dados com pdo (yotube descomplica)-->
