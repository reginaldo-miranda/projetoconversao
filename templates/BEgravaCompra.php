<?php  session_start();?>
<?php
        include_once("BEconexao_pdo.php");
        if(isset($_POST['seleciona'])){
          echo "nao achei";
        }   
         // pega a variavel do FRcompraPlanos
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
        $tipoplano     = $user['TipoPlano'];
        $duracao       = $user['Duracao'];
        $valor         = $user['Valor'];
        $dataabertura = '' ;//date('d-m-y');
        $emailbc = '';

       
        // colocar os valores em variaveis de sessao
        $_SESSION['tipoplano']    = $tipoplano;
        $_SESSION['duracao']      = $duracao; // pega o valor da tabela plano (nao é vencimento)
        $_SESSION['valor']        = $valor;
        $_SESSION['dataabertura'] = DATE('Y-m-d');// pegar data do sistema
        // pega as variaveis de sessao de outras paginas

        $verifica = $_SESSION['ExisteCadastro']; // variavel vem do BEvalidaLogin
        $email = $_SESSION['semail'];
        //$senhabc = '';
        $data_venc = '';

        echo $email;
        echo $tipplano;
        echo $dataabertura;
        //----------------------------------------------------------
        $result_msg_cont = "SELECT * FROM cadastro where email = '$email'";// and senha = '$senha'";
            $resultado_msg_cont = $conn->prepare($result_msg_cont);
            $resultado_msg_cont->execute();
                while ($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)) {
                    // echo "E-mail: " . $row_msg_cont['email'] . "<br>" ;
                    $emailbc   = $row_msg_cont['email'];
                    $data_venc = $row_msg_cont['data_venc']; // e o vencimento do plano na tabela 

                }// fim DO WHILE  
                echo $emailbc;
                echo $senhabc;
        //-----------------------------------------------------------
        if (!is_array($user))
        {
            echo "Nenhum plano encontrado";
            exit;
        }else{
            
            echo 'enviado email';
            if( $verifica == 'sim'){
             //   header("location:FRNovaCompraCadastro.php");
        echo "<script type='text/javascript'>window.top.location='https://conversao.000webhostapp.com/templates/FRNovaCompraCadastro.php';</script>";
            }else{
               // header("location:FRcadastro.php");
        echo "<script type='text/javascript'>window.top.location='https://conversao.000webhostapp.com/templates/FRcadastro.php';</script>";
        exit;
            }
           
        }
?>





