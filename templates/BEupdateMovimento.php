<?php include("../templates/BEconexao_pdo.php");
      include("../templates/BEfecha_conexao.php");
      $conn = getconexao();
      system("TZ=BRT date");
      date_default_timezone_set('America/Sao_Paulo');
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
 <?php //include_once "topo.php" ?>

 <?php


// $codigo = addcslashes(trim($_GET['codigo']));

$codigo = $_GET['codigo'];
$tipoplano = $_GET['tipo_plano'];
// $email = addcslashes(trim($_GET['email']));
$email = $_GET['email'];
// $data_venc = addslashes(trim($_GET['vencimento']));
$data_venc = $_GET['vencimento'];
// $data_compra = addcslashes(trim($_GET['datacompra']));
$data_compra = $_GET['datacompra'];
$valor = $_GET['valor'];

echo $data_venc;

$result_msg_cont = "UPDATE movimento SET tipo_plano=:TipoPlano, email =:email,
data_compra=:data_compra, data_venc=:data_venc, valor=:valor WHERE codigo=:codigo";

$resultado_msg_cont = $conn->prepare($result_msg_cont);
$resultado_msg_cont->bindValue(':TipoPlano', $tipoplano);
$resultado_msg_cont->bindValue(':email', $email);
$resultado_msg_cont->bindValue(':data_compra', $data_compra);
$resultado_msg_cont->bindValue(':data_venc', $data_venc);
$resultado_msg_cont->bindValue(':valor', $valor);
$resultado_msg_cont->bindValue(':codigo', $codigo);
$resultado_msg_cont->execute();
if($resultado_msg_cont->rowCount() > 0){
    echo $email;
    echo 'data do vencimento :   '.$data_venc;
    echo '    Movimento atualizado   :';
}else{
    echo 'erro ao atualizar  movimento';
}

/*

$result_msg_cont = "SELECT * FROM dados_logim where email= '$email'";
$resultado_msg_cont = $conn->prepare($result_msg_cont);
$resultado_msg_cont->execute();

while ($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)) {
    echo "Codigo:  " . $row_msg_cont['codigo'];
    echo "data venc ". $result_msg_cont['data_venc']."<br>";
    $query->bindValue(":username", $username, PDO::PARAM_STR);
    

    echo "E-mail: " . $row_msg_cont['email'] . "<br>" ;
    echo "senha ". $row_msg_cont['senha'] . "<br>" ;
    echo "<a href='FReditarMovimento.php?id=".$row_msg_cont['codigo']."'>Editar</a><hr>";

} */



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
    echo $email;
    echo $data_venc;
}else{
    echo 'erro ao atualizar cadastro';
}










/*
while ($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: " . $row_msg_cont['TipoPlano'] . "<br>";
    echo "Nome: " . $row_msg_cont['ValidadePlano'] . "<br>";
    echo "E-mail: " . $row_msg_cont['Valor'] . "<br>" ;
    echo "<a href='FReditarplanos.php?id=".$row_msg_cont['codigo']."'>Editar</a><hr>";
  
}*/




  
    


       /*
       // terceiro exemplo com fetch_obj - retorna objeto
       $linha=$listagem->fetchAll(PDO::FETCH_OBJ);
       foreach($linha as $listar){
    //    echo "Cnpj :" .$listar->cnpj."<br>";

      } */
?>

 <!-- </form>     -->
       
     
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



           /*
        $conn = getconexao();
        $listagem = $conn->prepare("SELECT * FROM plano");
        $listagem->execute();
            
     // segundo exemplos com fethcAll - retorna todos os registro do banco em forma de array
        $linha=$listagem->fetchAll(PDO::FETCH_OBJ);
        foreach($linha as $listar){
       echo "plano :" .$listar->TipoPlano ."<br>";

         } */


       </section> -->
	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </body>
</html>



