<?php
    session_start();
    //include("../templates/BEconexao_pdo.php");
    include("/templates/BEfuncao_inserirpdo.php");
    $email = $_GET['email'];
    $senha = $_GET['senha'];
    $data = '';
    system("TZ=BRT date");
    date_default_timezone_set('America/Sao_Paulo');
    consultaUsuario($email,$senha,$data);


  //  $cripsenha = crypt($senha); criptograr senha
    echo"$email"."<br>";
    echo"$senha"."<br>";
    function consultaUsuario($email,$senha,$data){
        $pdo = getconexao();
        try{

            $dadosUsuario = $pdo->prepare('SELECT * FROM DADOS_LOGIM WHERE email = ? and senha = ?');
            $dadosUsuario->bindValue(1, $email, PDO::FETCH_ASSOC);
            $dadosUsuario->bindValue(2, $senha, PDO::FETCH_ASSOC);
            $dadosUsuario->execute();
            if($dadosUsuario->rowCount()===1){


              //  echo 'LOGADO'."<BR>";

              //  return $dadosUsuario->fetch(PDO::FETCH_ASSOC);
               header("location:FRconversao.php");
               
                
            }else{
              echo $senha;
              /*
                inserir(array("email","senha","data"),
                array($email,$senha,$data),"dados_logim"); 
                echo 'nao cadastrado'; */
                $_SESSION['semail'] = $email;
                $_SESSION['ssenha'] = $senha;
                header("location:frcompraPlanos.php");
               // throw new Exception('usuario nao cadastrado');
            }
    }catch (PDOException $error){
        echo "erro na consulta";
        
    }
}

?>

