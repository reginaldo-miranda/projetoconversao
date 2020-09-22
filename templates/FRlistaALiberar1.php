<?php include("../templates/BEconexao_pdo.php");
      include("../templates/BEfecha_conexao.php");
      ?>   



<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>Editar movimento</title>
        
        <meta charset="UTF-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	   
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	   
		<link href="../static/css/stilo.css" rel="stylesheet" type="text/css">

        <script src="../static/js/forminput.js"></script>	
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<script src="https://kit.fontawesome.com/f48343b6a3.js" crossorigin="anonymous"></script>
    </head>
  
 <body>
<!-- <form action="inserir_plano.php" method="GET"> -->
<form action="FReditarMoviemtno.php" method="GET">
 <?php //include_once "topo.php" ?> 
 <?php
 
$conn = getconexao();
// $result_msg_cont = "SELECT * FROM movimento";
// $result_msg_cont = "SELECT * FROM CADASTRO INNER JOIN MOVIMENTO ON MOVIMENTO.EMAIL = CADASTRO.EMAIL";
$result_msg_cont = "SELECT * FROM CADASTRO INNER JOIN MOVIMENTO ON MOVIMENTO.EMAIL = CADASTRO.EMAIL where movimento.data_venc = '000-00-00'";
// $result_msg_cont = "SELECT * FROM movimento WHERE data_venc = '000-00-00'";
$resultado_msg_cont = $conn->prepare($result_msg_cont);
$resultado_msg_cont->execute();

while ($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)) {
    echo "Codigo:  " . $row_msg_cont['codigo'];
    echo "  Empresa: ".$row_msg_cont['empresa'] . "<br>";
    echo "Tipo plano: " . $row_msg_cont['tipo_plano'] . "<br>";
    echo "E-mail: " . $row_msg_cont['email'] . "<br>" ;
    echo "Data da compra: ". $row_msg_cont['data_compra'] . "<br>" ;
    echo "Data do vencimento: ". $row_msg_cont['data_venc'] . "<br>" ;
    echo "Valor :". $row_msg_cont['valor'] . "<br>" ;
    echo "<a href='FRliberarAcesso.php?id=".$row_msg_cont['codigo']."'>Liberar acesso</a><hr>";
  
}
?>

 </form>     
 
	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </body>
</html>



