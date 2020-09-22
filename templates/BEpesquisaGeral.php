<?php
include("../templates/conexao_pdo.php");
include("../templates/fecha_conexao.php");

function selecionarTudo($tabela,$coluna="*"){// ,$coluna="fone", $where=NULL,$ordem=NULL,$limite=NULL){

    $tabela1 = $tabela;
    $coluna1 = $coluna;
  //  echo $tabela1;
    $conn= getconexao();
 
    try{
     $listagem = $conn->prepare("SELECT * FROM $tabela1 order by $coluna1");
       // $listagem = $conn->prepare('SELECT {$coluna1} FROM {$tabela1} ');
     

        $listagem->execute();
        $linha=$listagem->fetchAll(PDO::FETCH_OBJ);
        return $linha;
       // foreach($linha as $listar){
        // echo "Cnpj :" .$listar->cnpj."<br>";
       // }

        //$listagem = $conn->prepare('{$coluna} FROM {$tabela} {$where} {$ordem} {$limite}');
     //   $listagem = $conn->prepare('SELECT {$coluna} FROM {$tabela} ');
     
    //    $listagem->execute();
       // $dados = $pdo->query('{$coluna} FROM {$tabela} {$where} {$ordem} {$limite}');
      //  $listagem->execute();
     //   $linha=$listagem->fetchAll(PDO::FETCH_OBJ);

         // if(isset($_POST[$listagem])){
           // echo "<br>Existe Variavel";
         // return $dados->fetchAll(PDO::FETCH_OBJ);
       //   var_dump($listagem);

  //  } 
    }catch (PDOException $error){
        echo "Erro ao consultar as tags: ". $error->getMessage();
    }
    /*
        //$dadosUsuario = $pdo->prepare('SELECT * FROM DADOS_LOGIM WHERE email = ? and senha = ?');
        $dadosUsuario->bindValue(1, $email, PDO::FETCH_ASSOC);
        $dadosUsuario->bindValue(2, $senha, PDO::FETCH_ASSOC);
        $dadosUsuario->execute();
        if($dadosUsuario->rowCount()===1){
            echo 'LOGADO'."<BR>";
            return $dadosUsuario->fetch(PDO::FETCH_ASSOC);
           
            
        }else{
            echo 'nao cadastrado';
            header("location:compraPlanos.php");
           // throw new Exception('usuario nao cadastrado');
        }
}catch (PDOException $error){
    echo "erro na consulta";
    
}
        

            $sql = "SELECT {$coluna} FROM {$tabela} {$where} {$ordem} {$limite}";
                  
            $resultado = getconexao()->prepare($sql);
            $resultado ->execute();
    
           if($resultado = true){
                
            echo "deu certo achei  :";
            return $resultado ->fetchALL(PDO::FETCH_ASSOC);
        }else{
             echo "deu certo " ;
        }
    
    }
   
 }
    
//-----------------------------
include("../templates/conexao_pdo.php");
$email = $_POST['email'];
$senha = $_POST['senha'];
consultaUsuario($email,$senha);


//  $cripsenha = crypt($senha); criptograr senha
echo"$email"."<br>";
echo"$senha"."<br>";


/*
$sql = "INSERT INTO dados_logim (email,senha) values ('$email','$senha')";

mysqli_query($mysqli,$sql);

if (!mysqli_commit($mysqli)) {
    print("Transaction commit failed\n");
    exit();
}else{
    echo"ok";
}
mysqli_close($mysqli);
*/

function consultaUsuario($email,$senha){
  
    $pdo = getconexao();
    try{

        $dadosUsuario = $pdo->prepare('SELECT * FROM DADOS_LOGIM WHERE email = ? and senha = ?');
        $dadosUsuario->bindValue(1, $email, PDO::FETCH_ASSOC);
        $dadosUsuario->bindValue(2, $senha, PDO::FETCH_ASSOC);
        $dadosUsuario->execute();
        if($dadosUsuario->rowCount()===1){
            echo 'LOGADO'."<BR>";
            return $dadosUsuario->fetch(PDO::FETCH_ASSOC);
           
            
        }else{
            echo 'nao cadastrado';
            header("location:compraPlanos.php");
           // throw new Exception('usuario nao cadastrado');
        }
}catch (PDOException $error){
    echo "erro na consulta";
    
}
}
}



?>