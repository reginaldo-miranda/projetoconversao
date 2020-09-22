<?php session_start();?>
<?php
        include_once("BEfuncao_inserirPDO.php");
        include_once("BEconexao_pdo.php"); 
        include_once("BEfecha_conexao");
       // include_once("FRcadastro.php");
         include_once("BEemail.php");
        echo('estou na inserir cadstro'). "<br>";
        $data_abertura    = $_REQUEST['data_abertura'];
        $existeCadastro   = $_SESSION['ExisteCadastro'];
        $data_abertura    = $_REQUEST['data_abertura'];
        $empresa          = $_REQUEST['empresa'];
        $cnpj             = $_REQUEST['cnpj'];
        $nome_contato     = $_REQUEST['nome_contato'];
        $fone             = $_REQUEST['fone'];
        $fone2            = $_REQUEST['fone2'];
        $email            = $_REQUEST['email'];
        $tipoplano        = $_REQUEST['tipo_plano'];
        $dataabertura     = $_REQUEST['dataabertura'];
        $valor            = $_REQUEST['valor'];
        $n_acessos        = '';
        $senha             = $_SESSION['ssenha'];
        $data_abertura    = date("Y-m-d");
        $data_venc        = '000-00-00';
        echo ($data_abertura) . "<br>";

        echo ('antes de funcao inserir')."<br>";
        echo('senha :'.$senha)."<br>";
        
        inserir(array('data_venc','email','senha'),array($data_venc,$email,$senha),'dados_logim');
        
     
        inserir(
                array('data_abertura','empresa','cnpj','nome_contato','fone','fone2','email','tipo_plano','data_venc','valor'),
                array($data_abertura,$empresa,$cnpj,$nome_contato,$fone,$fone2,$email,$tipoplano, $data_venc,$valor),
                "cadastro");
/*
        $senha = $_SESSION['Ssenha'];
       

        inserir(
                array('data_venc', 'email', 'senha', 'n_acessos'),
                array($data_abertura, $email, $senha, $n_acessos),
                'dados_logim'
        );*/
       

        inserir(array('email','tipo_plano','data_compra','data_venc','valor'),
                array($email,$tipoplano, $data_abertura, $data_venc,$valor),"movimento");

        $texto  = "Obrigado por adquerir o sistema, o plano adquerido foi :" . $tipoplano . "   faça um deposito na conta 26000 ag 51888 bco Itau, para liberar a sua senha";
envia($email,$texto);
fechaConexao($conn);
        echo('final do inserir');
?>