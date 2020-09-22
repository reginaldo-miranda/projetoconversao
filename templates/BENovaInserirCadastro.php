<?php session_start();?>
<?php
        include_once("BEfuncao_inserirPDO.php");
        //include_once("FRcadastro");
        include_once("BEemail.php");
        //system("TZ=BRT date");
        $conn = getconexao();
        //$data_abertura = $_REQUEST['data_abertura'];
        $data_abertura   =  $_REQUEST['data_abertura'];
        $empresa         = $_REQUEST['empresa'];
        $cnpj            = $_REQUEST['cnpj'];
        $nome_contato    = $_REQUEST['nome_contato'];
        $fone            = $_REQUEST['fone'];
        $fone2           = $_REQUEST['fone2'];
        $email           = $_REQUEST['email'];
        echo $email;
        $tipoplano      = $_REQUEST['tipo_plano'];
     // $vencimento     = $_REQUEST['vencimento'];
        $vencimento     = '000-00-00';
        $valor          = $_REQUEST['valor'];
        $n_acessos      = '';
        //$senha        = '';
        $datasistema    = date("Y-m-d");
        $data_abertura  = date("Y-m-d");
        $texto = "Obrigado por adquerir o novamente sistema, o plano adquerido foi :".$tipoplano."   faça um deposito na conta 26000 ag 51888 bco Itau, para liberar a sua senha";
//--------------------------------------update cadastro
        //$result_msg_cont = "UPDATE cadastro SET vencimento=:vencimento, tipo_plano=:tipo_plano, valor =:valor WHERE codigo=:codigo";
        $result_msg_cont = "UPDATE cadastro SET data_venc=:vencimento, tipo_plano=:tipo_plano, valor=:valor WHERE email = '$email'";
        $resultado_msg_cont = $conn->prepare($result_msg_cont);
        $resultado_msg_cont->bindValue(':vencimento', $vencimento);
        $resultado_msg_cont->bindValue(':tipo_plano', $tipoplano);
        $resultado_msg_cont->bindValue(':valor', $valor);
        $resultado_msg_cont->execute();
        if($resultado_msg_cont->rowCount() > 0){
            echo '- Cadastro atualizado - ';
        }else{
            echo '- erro ao atualizar cadastro -';
        }
//---------------------------------fim uddate cadastro
//----------------------------------update login-------------------
        $result_msg_cont = "UPDATE dados_logim SET data_venc=:vencimento WHERE email = '$email'";
        $resultado_msg_cont = $conn->prepare($result_msg_cont);
        $resultado_msg_cont->bindValue(':vencimento', $vencimento);
        //$resultado_msg_cont->bindValue(':codigo',$codigo);
        $resultado_msg_cont->execute();
        if($resultado_msg_cont->rowCount() > 0){
            echo ' - Login atualizado - ';
        }else{
            echo 'erro ao atualizar login ';
        }
//----------------------------------------------fim update login --------
        inserir(array("email","tipo_plano","data_compra","data_venc","valor"),
        array($email,$tipoplano,$datasistema,$vencimento,$valor),"movimento");
        //envia($email,$texto);

?>