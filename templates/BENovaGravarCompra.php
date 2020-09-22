<?php  session_start();
include_once("../templates/BEconexao_pdo.php");
system("TZ=BRT date");
//date_default_timezone_set('America/Sao_Paulo');
ini_set('date.timezone','America/Sao_Paulo');
//include_once "BEvalidalogim.php";

//$email = $_REQUEST['email'];
//$email = $_SESSION['Semail'];

//$existeCadastro = $_SESSION['ExisteCadastro'];


 
 if(isset($_POST['seleciona'])){
   echo "nao achei";
 }   

$selecionado = $_GET['seleciona'];

?>
<?php

$tipoplano = $selecionado;
echo $tipoplano;

$conn=getconexao();
$sql = "SELECT * FROM plano WHERE codigo = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $tipoplano);// , PDO::PARAM_INT);
$user = $stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
// pegar os valores dos campos do whiel
$tip        = $user['TipoPlano'];
$duracao    = $user['Duracao'];
$vlo        = $user['Valor']; 
$datainicio = date('d-m-y');

echo $tip;
 // colocar os valores em variaveis de sessao
$_SESSION['Tplano']       = $tip;
$_SESSION['Duracao']      = $duracao; // pega o valor da tabela plano (nao é vencimento)
$_SESSION['valor']        = $vlo;
$_SESSION['DataAbertura'] = $datainicio;

$email = $_SESSION['Semail'];

//----------------------------------------------------------
$result_msg_cont = "SELECT email FROM cadastro where email = '$email'";// and senha = '$senha'";
      $resultado_msg_cont = $conn->prepare($result_msg_cont);
      $resultado_msg_cont->execute();
          while ($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)) {
           // echo "E-mail: " . $row_msg_cont['email'] . "<br>" ;
            $emailbc   = $row_msg_cont['email'];
            $senhabc   = $row_msg_cont['senha'];
            $data_venc = $row_msg_cont['data_venc']; // e o vencimento do plano na tabela 

           echo $emailbc."<br>";
           echo $senhabc."<br>";   
           echo $data_venc;

      
          }// fim DO WHILE  

//-----------------------------------------------------------


if (!is_array($user))
{
    echo "Nenhum plano encontrado";
    exit;
}else{
     
     echo 'enviado email';
     header("location:FRNovaCompraCadastro.php");
}

 
?>





