<?php
include("../templates/BEconexao_pdo.php");
include("../templates/BEfecha_conexao.php");
$conn = getconexao();

$id =  filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$listagem = $conn->prepare("SELECT * FROM cadastro WHERE CODIGO = $id ");
$listagem->execute();
$linha = $listagem->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
  <title>Converter CFOP</title>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link href="../static/css/stilo.css" rel="stylesheet" type="text/css">

  <script src="../static/js/forminput.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script src="https://kit.fontawesome.com/f48343b6a3.js" crossorigin="anonymous"></script>
</head>
<header>
  <div id="TEXTO">Conversão de dados para venda - SIMPLES NACIONAL - Comercio-Revenda Editar Cadastro</div>

  <!-- <div id="saida">Sair <i class="fas fa-times"></i></div> -->
  <div id="saida">
    <button id="btn-fecharSistema" type="button" onClick="fechar()">Sair <i class="fas fa-times"></i></button>
  </div>

</header>

<body>

  <!----------------------------------inicio div conteiner------------------------------>
  <div class="conteiner">

    <form action="BEupdateCadastro.php" method="GET">
      <div id="inputsEditarCadastro">
        <label>Codigo</label>
        <div id="inputCodigoEC">
          <input type="text" class="inputeEC" name="codigo" placeholder="codigo" value="<?php echo $linha['codigo']; ?>">
          <input type="date" id="data_abertura" class="inputeEC" name="data_abertura" placeholder="data" value="<?php echo $linha['data_abertura']; ?> ">
        </div>

        <label>Empresa:</label>
        <label>Cnpj</label>
        <div id="inputEmpresa">
          <input type="text" id="empresa" class="inputeEC" name="empresa" placeholder="Empresa" value="<?php echo $linha['empresa']; ?> ">
          <input type="text" id="cnpj" class="inputeEC" name="cnpj" placeholder="cnpj" value="<?php echo $linha['cnpj']; ?> ">
        </div>

        <label>Nome:</label>
        <div id="inputNome">
          <input type="text" id="nome_contato" class="inputeEC" name="nome_contato" placeholder="nome" value="<?php echo $linha['nome_contato']; ?> ">
        </div>


        <label>Fone:</label>
        <label>Fone 2:</label>

        <div id="inputFone">
          <input type="text" id="fone" class="inputeEC" name="fone" placeholder="fone" value="<?php echo $linha['fone']; ?> ">
          <input type="text" id="fone2" class="inputeEC" name="fone2" placeholder="fone 2" value="<?php echo $linha['fone2']; ?> ">

        </div>

          <label>Email:</label>
          <div id="inputEmail">
            <input type="text" id="email" class="inputeEC" name="email" placeholder="Email" value="<?php echo $linha['email']; ?> ">
          </div>


          <label>Tipo de plano</label>
          <label>vencimento</label>

          <div id="inputTipoplano">
            <input type="text" id="tipo_plano" class="inputeEC" name="tipo_plano" readonly=true placeholder="tipo_plano" value="<?php echo $linha['tipo_plano']; ?> ">
            <input type="date" id="vencimento" class="inputeEC" name="vencimento" readonly=true placeholder="vencimento" value="<?php echo $linha['data_venc'] ?> ">
          </div>
          <label>Valor</label>
          <div id="inputValor">
            <input type="text" id="valor" class="inputeEC" name="valor" readonly=true placeholder="valor" value="<?php echo $linha['valor'] ?> ">
          </div>

          <button type="submit" name="enviar">Alterar</button>

        </div>

    </form>
  </div>

  <!----------------------------------fim da div conteiner------------------------------>
  <?php include_once "BEfooter.php" ?>


  <!----------------------------------fim rodape------------------------------------------>
  <script>
    var retornocfop = localStorage.getItem('cfopenco');
    /*	document.getElementById('cfopnfe').value=retornocfop; */
    localStorage.clear();
  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>