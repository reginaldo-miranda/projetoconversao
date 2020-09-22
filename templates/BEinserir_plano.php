<?php session_start();?>
<?php
include_once("BEfuncao_inserirPDO.php");
include_once("FRcadastroPlano.php");
include_once("BEconexao_pdo.php"); 
include_once("BEfecha_conexao.php");

$tipoplano      = $_REQUEST['tipo_plano'];
$validade_plano = $_REQUEST['validade_plano'];
$valor          = $_REQUEST['valor'];
inserir(
        array("TipoPlano","Duracao","Valor"),
        array($tipoplano,$validade_plano,$valor),
        "plano"
);
echo ('fim gravei');
fechaConexao($conn);



// header("location:cadastro.php?info=ok");
//header("location:cadastroplanos.php")
// https://webdevacademy.com.br/tutoriais/crud-bootstrap-php-mysql-parte1/ criar um crud
?>

