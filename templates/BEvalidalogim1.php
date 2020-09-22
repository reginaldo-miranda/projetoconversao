<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Conversao</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="../static/css/stilo.css" rel="stylesheet" type="text/css">
  <script src="../static/js/forminput.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/f48343b6a3.js" crossorigin="anonymous"></script>
</head>
<?php  //primeiro php
      date_default_timezone_set('America/Sao_Paulo');
      include("BEconexao_pdo.php");

      if ((isset($_POST['email'])) && (isset($_POST['senha']))) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senhabc = '';
        $verifica = '';
        $data_venc = strtotime("0000-00-00");
        $_SESSION['ssenha'] = $senha;

        echo ("email vindo de post :" . $email) . "<br>";
        echo ("senha vindo de post :" . $senha) . "<br>";

        function verdata($email, $senha, $senhabc, $data_venc){

          if ($email == "reginaldobrain@gmail.com" and $senha == "123") {
            // header("location:FRadministrativo.php");
            // break; 
            echo "<script type='text/javascript'>window.top.location='https://conversao.000webhostapp.com/templates/FRadministrativo.php';</script>";
            exit;
          } else { // if reginado

            $pdo = getconexao();
            $sql = "SELECT senha,data_venc,email FROM dados_logim where email = '$email'"; // and senha = '$senha'";
            $result = $pdo->prepare($sql);
            $result->execute();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              $emailbc     = $row['email'];
              $senhabc     = $row['senha'];
              $data_venc = $row['data_venc'];
            } // fim DO WHILE  
            echo ("fim wihile email vindo do banco:" . $emailbc) . "<br>";
            echo ("fim do whiel senha vindo do banco:" . $senhabc) . "<br>";
            echo ("fim do whiel data_venc vindo do banco:" . $data_venc) . "<br>";

            if ($emailbc == $email and  $senhabc == $senha) {
              echo ("exite o email e senha") . "<br>";
          
              $dt_atual               = date("Y-m-d"); // data atual
              $timestamp_dt_atual     = strtotime($dt_atual); // converte para timestamp Unix
              $dt_expira              =  $data_venc; //"2012-10-05"; // data de expiração do anúncio
              //$timestamp_dt_expira  = strtotime($dt_expira); // converte para timestamp Unix
              $data_venc              = strtotime($dt_expira); // converte para timestamp Unix
              $dtz = date('0000-00-00');
              $dtzero = strtotime($dtz);

              if ($data_venc == $dtzero) {
                echo ("data zero passei aqui");

              } else { //else data zero
                if ($timestamp_dt_atual > $data_venc) { //true
                  //header("location:Frmsg.php");
                  echo  "Sua senha expirou! Deseja renovar ?" . "<br>";
                  $_SESSION['semail'] = $email;
                  $_SESSION['ssenha'] = $senha;
                  $verifica = 'sim';
                  $_SESSION['ExisteCadastro'] = $verifica;
      ?>
                  <hml>
                    <div id="btncontainer">
                      <h5>Sua senha expirou! Deseja renovar ?</h5>
                      <div>----------------------------------</div>
                      <div id="btnsn">
                        <input type="button" onclick="simnao('s')" value="Sim">
                        <input type="button" onclick="simnao('n')" value="Não">
                      </div> <!-- btnsn -->
                    </div>
                <?php


                } //fim da checagem expirou


              } //  fim data zero
              $_SESSION['email'] = $email;
              echo "<script type='text/javascript'>window.top.location='https://conversao.000webhostapp.com/templates/FRconversao.php';</script>";


            } else { // else teste de email e senha do bco
              echo ("nao existe a senha no banco");

              // cria as variaveis de sessao
              $_SESSION['semail'] = $email;
              $_SESSION['ssenha'] = $senha;
              $verifica = 'nao';
              $_SESSION['ExisteCadastro'] = $verifica;
          ?>
          <html>
          <!-- abre a caixa de confirma para compra de plano -->
          <div id="btncontainerc">
            <h5>Clique em comprar para escolher o plano</h5>
            <div id="btnsn">
              <input type="button" onclick="simnao('s')" value="Comprar ?">
              <input type="button" onclick="simnao('n')" value="Não">
            </div> <!-- btnsn -->
          </div>
          </html>
  <?php
      } // fim do else teste bco
    } // fim do else if reginaldo
  } // fim da function
  verdata($email, $senha, $senhabc, $data_venc);
}else{ // else isset
  echo "<script type='text/javascript'>window.top.location='https://conversao.000webhostapp.com/templates/FRlogin.php';</script>";

} // fecha isset  

  ?>
 </hml>

<?php
            /*-------------------------------------------------- 
        <?php session_start(); ?>
        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
          <title>Conversao</title>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <link href="../static/css/stilo.css" rel="stylesheet" type="text/css">
          <script src="../static/js/forminput.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
          <script src="https://kit.fontawesome.com/f48343b6a3.js" crossorigin="anonymous"></script>
        </head>
        <?php
        include("BEconexao_pdo.php");

        if ((isset($_POST['email'])) && (isset($_POST['senha']))) {
          $email = $_POST['email'];
          $senha = $_POST['senha'];

          $_SESSION['ssenha'] = $senha;

          $senhabc = '';
          $verifica = '';
          $datafinal = '';
          $datazero  = strtotime("000-00-00");
          $datazero1  = strtotime("000-00-00");


          echo ('senha linha 30 :' . $senha) . "<br>";

          function verdata($email, $senha, $senhabc, $datafinal)
          {
            echo ('dentro da function ') . "<br>";

            $emailbc = '';
            $datazero  = strtotime("000-00-00");
            $datazero1  = strtotime("000-00-00");


            $pdo = getconexao();
            $sql = "SELECT senha,data_venc,email FROM dados_logim where email = '$email'"; // and senha = '$senha'";
            $result = $pdo->prepare($sql);
            $result->execute();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              $emailbc  =  $row['email'];
              $senhabc   = $row['senha'];
              $datafinal = $row['data_venc'];
            } // fim DO WHILE  
            echo ("datafinal = data_venc bco" . $datafinal);


            $dt_atual               = date("Y-m-d"); // data atual
            $timestamp_dt_atual     = strtotime($dt_atual); // converte para timestamp Unix
            $dt_expira              =  $datafinal; //"2012-10-05"; // data de expiração do anúncio
            $timestamp_dt_expira    = strtotime($dt_expira); // converte para timestamp Unix

            if ($email == "reginaldobrain@gmail.com" and $senha == "123") {
              // header("location:/templates/FRadministrativo.php", true, 301); exit; 
              echo "<script type='text/javascript'>window.top.location='https://conversao.000webhostapp.com/templates/FRadministrativo.php';</script>";
              exit;
            }
            if ($emailbc == $email and  $senhabc == $senha) {
              if ($datafinal == $datazero1) {
        ?>
                <html>
                <div id="aliberar">
                  <p>Sua senha será liberada após o pagamento, verifique seu Email obrigado !<p>
                      <input type="button" id="BtnSairAliberar" onclick="simnao('n')" value="Ok">

                </html>
              <?php
              }
            } else {
              // echo 'data venc nao e == 0 '.$datafinal;
              if ($timestamp_dt_atual > $timestamp_dt_expira) { //true
                //header("location:Frmsg.php");
                // echo  "Sua senha expirou! Deseja renovar ?"."<br>";
                $_SESSION['semail'] = $email;
                $_SESSION['ssenha'] = $senha;
                $verifica = 'sim';
                $_SESSION['ExisteCadastro'] = $verifica;
              ?>
                <hml>
                  <div id="btncontainer">
                    <h5>Sua senha expirou! Deseja renovar ?</h5>
                    <div>----------------------------------</div>
                    <div id="btnsn">
                      <input type="button" onclick="simnao('s')" value="Sim">
                      <input type="button" onclick="simnao('n')" value="Não">
                    </div> <!-- btnsn -->
                  </div>
                <?php
              }

              // echo 'vai para conversao ';
              //  header("location:/templates/FRconversao.php");
              echo "<script type='text/javascript'>window.top.location='https://conversao.000webhostapp.com/templates/FRconversao.php';</script>";
              exit;
              $_SESSION['semail'] = $email;
              $_SESSION['ssenha'] = $senha;
              $verifica = 'nao';
              $_SESSION['ExisteCadastro'] = $verifica;
                ?>
                <html>
                <div id="btncontainerc">
                  <h5>Clique em comprar para escolher o plano</h5>
                  <div id="btnsn">
                    <input type="button" onclick="simnao('s')" value="Comprar ?">
                    <input type="button" onclick="simnao('n')" value="Não">
                  </div> <!-- btnsn -->
                </div>

                </html>
          <?php
            } // funcao verdata

          } // if isset
        }
        verdata($email, $senha, $senhabc, $datafinal);
          ?>

                </hml>





/*---------------------------------------------------- */
            ?>