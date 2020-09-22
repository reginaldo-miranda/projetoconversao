<?php include("../templates/BEconexao_pdo.php");
      include("../templates/BEfecha_conexao.php");
      $conn = getconexao();
      //date_default_timezone_set('America/Sao_Paulo');
      ini_set('date.timezone','America/Sao_Paulo');
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
    <!-- <form action="inserir_plano.php" method="GET"> -->
    <?php
            $codigo = $_GET['codigo'];
            $tipoplano = $_GET['tipo_plano'];
            // $email = addcslashes(trim($_GET['email']));
            $email = $_GET['email'];
            // $data_venc = addslashes(trim($_GET['vencimento']));
            $data_venc = $_GET['vencimento'];
            // $data_compra = addcslashes(trim($_GET['datacompra']));
            $data_compra = $_GET['datacompra'];
            $valor = $_GET['valor'];
            $texto = 'Olá sua senha foi liberada, o vencimento de seu plano é:'. $data_venc;
            $emailCli =  $email;
            $result_msg_cont = "UPDATE movimento SET data_venc = :data_venc WHERE email = '$email'";
            $resultado_msg_cont = $conn->prepare($result_msg_cont);
            $resultado_msg_cont->bindValue(':data_venc', $data_venc);
            $resultado_msg_cont->execute();
            if($resultado_msg_cont->rowCount() > 0){
                echo 'logim atualizado';
            }else{
                echo 'erro ao atualizar logim';
            }
            $result_msg_cont = "UPDATE dados_logim SET data_venc = :data_venc WHERE email = '$email'";
            $resultado_msg_cont = $conn->prepare($result_msg_cont);
            $resultado_msg_cont->bindValue(':data_venc', $data_venc);
            $resultado_msg_cont->execute();
            if($resultado_msg_cont->rowCount() > 0){
                echo 'logim atualizado';
            }else{
                echo 'erro ao atualizar logim';
            }
            $result_msg_cont = "UPDATE cadastro SET data_venc =:data_venc WHERE email = '$email'";
            $resultado_msg_cont = $conn->prepare($result_msg_cont);
            $resultado_msg_cont->bindValue(':data_venc',$data_venc);
            $resultado_msg_cont->execute();
            if($resultado_msg_cont->rowCount() > 0){
                echo ' cadastro atualizado ';
            }else{
                echo 'erro ao atualizar cadastro';
            }
           // envia($emailCli,$texto);
    ?>
	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </body>
</html>



