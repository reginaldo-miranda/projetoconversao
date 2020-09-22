<?php
include("../templates/BEconexao_pdo.php");
include("../templates/BEfecha_conexao.php");
date_default_timezone_set('America/Sao_Paulo');
$conn = getconexao();

$id =  filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

/*
SELECT v.product_id, 
       presentation 
FROM Variant v 
INNER JOIN productCategory p 
ON v.product_id = p.product_id LIMIT 10;

SELECT empresa, cnpj FROM movimento  INNER JOIN cadastro ON cadastro.codigo = movimento.codigo WHERE codigo = 1
*/



$listagem = $conn->prepare("SELECT * FROM movimento INNER JOIN cadastro ON cadastro.codigo = movimento.codigo where cadastro.codigo = $id ");
// $listagem = $conn->prepare("SELECT * FROM movimento WHERE CODIGO = $id ");
$listagem->execute();

    // segundo exemplos com fethcAll - retorna todos os registro do banco em forma de array
$linha=$listagem->fetch(PDO::FETCH_ASSOC);

   //  echo "Cnpj :" .$linha['TipoPlano'];

?>



<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>Ediar Movimento</title>
        
        <meta charset="UTF-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	   
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	   
		<link href="../static/css/stilo.css" rel="stylesheet" type="text/css">

        <script src="../static/js/forminput.js"></script>	
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<script src="https://kit.fontawesome.com/f48343b6a3.js" crossorigin="anonymous"></script>
    </head>
  
 <body>
	   <?php include_once "BEtopo.php" ?>
       <script> MudaTextoTopo6()<script>
		
 		<!----------------------------------inicio div conteiner------------------------------>
   	    <div class="conteiner">
      
            <form action="BEupdateMovimento.php" method="GET">
                <div id="inputs">

                      <div id="inputCodigo">
                            <label>Codigo</label> 
                            <input type="text" id="codigo" class="inpute" name="codigo" placeholder="codigo"
                            value="<?php echo $linha['codigo']; ?>" readonly> <br>
                       
                            <label>Empresa : </label>
                            <input type="text" id="empresa" class="inpute" name="empresa" placeholder="Empresa" 
                            value="<?php  echo $linha['empresa'];?>" readonly> <br>

                            <label>Email:</label> 
                            <input type="text" id="email" class="inpute" name="email" placeholder="Email"
                            value="<?php echo $linha['email'];?>"> <br>
                           
                           
                           
                            <label>Tipo do Plano : </label>
                            <input type="text" id="tipo_plano" class="inpute" name="tipo_plano" placeholder="Tipo do plano" 
                            value="<?php  echo $linha['tipo_plano'];?>"> <br>


                            <label>Data da compra : </label>
                            <input type="text" id="datacompra" class="inpute" name="datacompra" placeholder="Data da compra"
                            value="<?php echo $linha['data_compra'];?>">  

                            <label>Vencimento : </label>
                            <input type="date" id="vencimento" class="inpute" name="vencimento" placeholder="vencimento"
                            value="<?php echo $linha['data_venc'];?>"> <br> 

                            <label>Valor :</label> 
                            <input type="text" id="valor" class="inpute" name="valor" placeholder="valor"
                            value="<?php echo $linha['valor']; ?>">
                      </div>

                      <button type="submit" name="enviar">Alterar</button>
                     
                </div>
         
            </form>
       </div>

		<!----------------------------------fim da div conteiner------------------------------>
		<?php include_once "BEfooter.php" ?>
	
	
		<!----------------------------------fim rodape------------------------------------------>
		<script>
			var retornocfop = localStorage.getItem('cfopenco');
			/*	document.getElementById('cfopnfe').value=retornocfop; */
			localStorage.clear(); 
		</script>
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </body>
</html>



<!-- https://pt.stackoverflow.com/questions/154065/como-passar-dados-de-um-input-para-outro-com-html-e-javascript  -->

<!--https://www.youtube.com/watch?v=x-4z_u8LcGc&t=769s-->

<!--site de cores site fletuicolors-->

<!---https://cosmos.bluesoft.com.br/  site de pesquisas cfop ncm csosn-->

<!--https://www.youtube.com/watch?v=GtsNZtzZiec-->


<!-- funcao de inserir dados https://www.youtube.com/watch?v=DUCFWR4WoUU 

ESTUDAR SOBRE ORM PARA PHP -- INSERIR DADOS NO BANCO site ponto canal curso php intemediario
https://www.youtube.com/watch?v=o9ZACVLbZ3s&list=PLIZ0d6lKIbVpOxc0x1c4HpEWyK0JMsL49 playlist
https://www.youtube.com/watch?v=n9LsDAOEkSo&list=PLIZ0d6lKIbVpOxc0x1c4HpEWyK0JMsL49&index=7 video sobre cookies 
https://www.youtube.com/watch?v=j5VkFhbE-j8&list=PLIZ0d6lKIbVpOxc0x1c4HpEWyK0JMsL49&index=8 vairaveis de sessoes 
https://www.youtube.com/watch?v=PA-IuGdu07U&list=PLIZ0d6lKIbVpOxc0x1c4HpEWyK0JMsL49&index=10 enviar email 
https://www.youtube.com/watch?v=7T87u6WSo8U&list=PLIZ0d6lKIbVpOxc0x1c4HpEWyK0JMsL49&index=12 fazer funcao de conexao bd
https://www.youtube.com/watch?v=DUCFWR4WoUU&list=PLIZ0d6lKIbVpOxc0x1c4HpEWyK0JMsL49&index=13 funcao inserir
https://www.youtube.com/watch?v=iR0czIMgCKo&list=PLIZ0d6lKIbVpOxc0x1c4HpEWyK0JMsL49&index=15 corrigir e cripitografar senha
https://www.youtube.com/watch?v=25cg4kaEdXs&list=PLIZ0d6lKIbVo5K2TM62F0pkaZ0ZaBJ9Nl&index=3 url-amigavel 
https://www.youtube.com/watch?v=EStDCGdLQ0s&list=PLIZ0d6lKIbVpOxc0x1c4HpEWyK0JMsL49&index=19 listar na tela os dados
https://www.youtube.com/watch?v=IgXObygz6K4&list=PLIZ0d6lKIbVpOxc0x1c4HpEWyK0JMsL49&index=21 update atualizar-->
