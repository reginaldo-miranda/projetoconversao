<?php include("../templates/BEconexao_pdo.php");
      include("../templates/BEfecha_conexao.php");
      $conn = getconexao();
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
 <!--<form action="" method="GET"> -->
 <?php //include_once "topo.php" ?> 
 <?php

$codigo = addslashes(trim($_GET['codigo']));
$dataabertura = addslashes(trim($_GET['data_abertura']));
$empresa = addslashes(trim($_GET['empresa'])); //`` VARCHAR(80) NULL DEFAULT NULL,
$cnpj = addslashes(trim($_GET['cnpj'])); //`cnpj` VARCHAR(20) NULL DEFAULT NULL,
$nomecontato = addslashes(trim($_GET['nome_contato'])); //`nome_contato` VARCHAR(50) NULL DEFAULT NULL,
$fone = addslashes(trim($_GET['fone']));
$fone2 = addslashes(trim($_GET['fone2'])); //`fone2` VARCHAR(20) NULL DEFAULT NULL,
$email = addslashes(trim($_GET['email'])); //`email` VARCHAR(80) NULL DEFAULT NULL,

$ncontrato = addslashes(trim($_GET['n_contrato'])); //`n_contrato` VARCHAR(20) NULL DEFAULT NULL,
$vencimento = addslashes(trim($_GET['vencimento']));//`vencimento` DATE NOT NULL,
$tipoplano = addslashes(trim($_GET['tipo_plano'])); //`tipo_plano` VARCHAR(20) NOT NULL DEFAULT '',
 var_dump($empresa);


$result_msg_cont = "UPDATE cadastro SET data_abertura=:data_abertura, empresa=:empresa, cnpj=:cnpj,
 nome_contato=:nome_contato, fone=:fone, fone2=:fone2, email=:email, n_contrato=:n_contrato,vencimento=:vencimento,
 tipo_plano=:tipo_plano WHERE codigo=:codigo";

$resultado_msg_cont = $conn->prepare($result_msg_cont);
//$resultado_msg_cont = $conn->prepare($result_msg_cont);
$resultado_msg_cont->bindValue(':data_abertura', $dataabertura);
$resultado_msg_cont->bindValue(':empresa', $empresa);
$resultado_msg_cont->bindValue(':cnpj', $cnpj);
$resultado_msg_cont->bindValue(':nome_contato', $nomecontato);
$resultado_msg_cont->bindValue(':fone', $fone);
$resultado_msg_cont->bindValue(':fone2', $fone2);
$resultado_msg_cont->bindValue(':email', $email);

$resultado_msg_cont->bindValue(':n_contrato', $ncontrato);
$resultado_msg_cont->bindValue(':vencimento', $vencimento);
$resultado_msg_cont->bindValue(':tipo_plano', $tipoplano);

$resultado_msg_cont->bindValue(':codigo',$codigo);


$resultado_msg_cont->execute();
if($resultado_msg_cont->rowCount() > 0){
    echo 'atualizado';
}else{
    echo 'erro ao atualizar';
}

?>

	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </body>
</html>



