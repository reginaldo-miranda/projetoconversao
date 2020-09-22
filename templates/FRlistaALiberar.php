<?php include("../templates/BEconexao_pdo.php");
include("../templates/BEfecha_conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>conversao</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="../static/css/stilo.css" rel="stylesheet" type="text/css">
  <script src="../static/js/forminput.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/f48343b6a3.js" crossorigin="anonymous"></script>
</head>
<header>
  <div id="TEXTO">Conversão de dados para venda - SIMPLES NACIONAL - Comercio-Revenda</div>
  <div id="saida">
  <!--  <button id="btn-fecharSistema" type="button" onClick="fecharLAliberar()">Sair <i class="fas fa-times"></i></button>
--> <button type="button" id="btnfechali" onclick="simnao('a')">Voltar</button>
  </div>
</header>
<body>
  <form action="/templates/FReditarMoviemtno.php" method="GET">
    <!-- <div> -->
    <h1>cabecalho</h1>
    <section class="grid grid-row-1">
      <div class="item item-1">codigo</div>
      <div class="item item-2">email</div>
      <div class="item item-3">empresa</div>
      <div class="item item-4">datacompra</div>
      <div class="item item-5">vencimento</div>
      <div class="item item-6">valor</div>
      <div class="item item-7">Tipoplano</div>
    </section>
    <!--   </div> -->
    <?php //include_once "topo.php" 
    ?>
    <?php
    $conn = getconexao();
    $result_msg_cont = "SELECT * FROM cadastro INNER JOIN movimento ON movimento.email = cadastro.email where movimento.data_venc = '000-00-00'";
    $resultado_msg_cont = $conn->prepare($result_msg_cont);
    $resultado_msg_cont->execute();
    while ($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)) {
      $codigo      = $row_msg_cont['codigo'];
      $email       = $row_msg_cont['email'];
      $empresa     = $row_msg_cont['empresa'];
      $data_compra = $row_msg_cont['data_compra'];
      $data_venc   = $row_msg_cont['data_venc'];
      $valor       = $row_msg_cont['valor'];
      $tipoplano = $row_msg_cont['tipo_plano'];
      //   echo "<a href='FRliberarAcesso.php?id=".$row_msg_cont['codigo']."'>Liberar acesso</a><hr>";
    ?> <html>
      <!-- <div> -->
      <section class="grid grid-row7">
        <div class="item item-1">
          <input type="text" class="inputeAliberar" name="codigo" placeholder="codigo" value="<?php echo  $codigo; ?>">
        </div>
        <div class="item item-2">
          <input type="text" id="email" class="inputeAliberar" name="email" placeholder="Email" value="<?php echo $email; ?>">
        </div>
        <div class="item item-3">
          <input type="text" id="empresa" class="inputeAliberar" name="empresa" topo.phpname="empresa" placeholder="Empresa" value="<?php echo $empresa; ?>">
        </div>
        <div class="item item-4">
          <input type="text" id="data_abertura" class="inputeAliberar" name="data_abertura" placeholder="data" value="<?php echo $data_compra; ?>">
        </div>
        <div class="item item-5">
          <input type="text" id="vencimento" class="inputeAliberar" name="vencimento" readonly=true placeholder="liberado apos o pagto" value="<?php echo $data_venc; ?>">
        </div>
        <div class="item item-6">
          <input type="text" id="valor" class="inputeAliberar" name="valor" readonly=true placeholder="valor " value="<?php echo $valor; ?>">
        </div>
        <div class="item item-7">
          <input type="text" id="tipo_plano" class="inputeAliberar" name="tipo_plano" readonly=true placeholder="tipo_plano" value="<?php echo $tipoplano; ?>">
        </div>
        <?php
           echo "<a href='FRliberarAcesso.php?id=" . $row_msg_cont['codigo'] . "'>Liberar acesso</a><hr>";
        ?>
      </section>
      <!--  </div> -->
      </html>
    <?php
    }
    ?>
  </form>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
