<?php session_start();?>
<?php
include_once("templates/BEfuncao_inserirPDO.php");
include_once("templates/FRcadastroPlano.php");
include_once("templates/BEconexao_pdo.php");
echo ('entrei na pagina depois dos includes');
$tipoplano = $_REQUEST['tipo_plano'];
$validade_plano = $_REQUEST['validade_plano'];
$valor = $_REQUEST['valor'];
echo ($tipoplano);
echo ($validade_plano);
echo ($valor);
getconexao();
echo ('entrei na pagina depois dos get');
inserir(
        array("TipoPlano","Duracao","Valor"),
        array($tipoplano,$validade_plano,$valor),
        "plano"
);
echo ('fim gravei');

// header("location:cadastro.php?info=ok");
//header("location:cadastroplanos.php")
// https://webdevacademy.com.br/tutoriais/crud-bootstrap-php-mysql-parte1/ criar um crud
?>

