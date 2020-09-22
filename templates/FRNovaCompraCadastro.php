<?php
session_start();
include_once "BEvalidalogim.php";
if (isset($_SESSION['$email'])) : ?>

      <h1>logodo</h1>
    <?php else : ?>
      <h1>nao logodo</h1>
      echo "<script type='text/javascript'>
        window.top.location = 'https://conversao.000webhostapp.com/templates/FRlogin.php';
      </script>";
    <?php endif; 
// system("TZ=BRT date");
//date_default_timezone_set('America/Sao_Paulo');
ini_set('date.timezone','America/Sao_Paulo');
$tipoplano = $_SESSION['tipoplano'];
$duracao = $_SESSION['duracao']; // vem da tabela plano
$valor = $_SESSION['valor'];
$email = $_SESSION['semail'];
$senha = $_SESSION['ssenha'];
$dataabertura = $_SESSION['databertura']; //$datainicio $dataabertura
$verifica = $_SESSION['ExisteCadastro'];
// $data_venc = $_SESSION['data_venc'];// $row['data_venc'];
// $datafinal = $_SESSION['data_venc'];
$empresa = '';
$cnpj = '';
// echo $verifica;

if($verifica == 'sim'){
$pdo = getconexao();

$sql = "SELECT * FROM cadastro where email = '$email'";// and senha = '$senha'";
$resultado = $pdo->prepare($sql);
$resultado->execute();
while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
// echo "E-mail: " . $row['email'] . "<br>" ;
$acodigo = $row['codigo'];
$adata_abertura = $row['data_abertura'];
$aempresa = $row['empresa'];
$acnpj = $row['cnpj'];
$anome_contato = $row['nome_contato'];
$afone = $row['fone'];
$afone2 = $row['fone2'];
$aemailbc = $row['email'];
$avalor = $row['valor'];
$adata_venc = $row['data_venc'];
$atipo_plano = $row['tipo_plano'];
$aduracao = $row['duracao'];

}// fim DO WHILE

}
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
  <div id="TEXTO">Conversão de dados para venda - SIMPLES NACIONAL - Comercio-Revenda - Compra de planos</div>

  <!-- <div id="saida">Sair <i class="fas fa-times"></i></div> -->
  <div id="saida">
    <button id="btn-fecharSistema" type="button" onClick="fechar()">Sair <i class="fas fa-times"></i></button>
  </div>

</header>

<body>


  <!----------------------------------inicio div conteiner------------------------------>
  <div class="conteiner">
    <form action="BENovaInserirCadastro.php" method="GET">
      <div id=containergeral>
        <div id="telaesquerda">

          <div id="inputesesquerda">
            <div id="antiga">
              <p>Dados Antigo</p>
            </div>
            <label>Codigo</label>

            <div id="ecodigo">
              <input type="text" class="inputeNCC" name="codigo" placeholder="codigo" value="<?php echo  $acodigo; ?>">
              <input type="text" id="data_abertura" class="inputeNCC" name="data_abertura" placeholder="data" value="<?php echo $adata_abertura; ?>">
            </div>

            <label>Empresa:</label>
            <div id="einputEmpresa">
              <input type="text" id="empresa" class="inputeNCC" name="empresa" topo.phpname="empresa" placeholder="Empresa" value="<?php echo $aempresa; ?>">
              <input type="text" id="cnpj" class="inputeNCC" name="cnpj" placeholder="cnpj" value="<?php echo $acnpj; ?>">
            </div>

            <label>Nome:</label>
            <div id="einputNome">
              <input type="text" id="nome_contato" class="inputeNCC" name="nome_contato" placeholder="nome" value="<?php echo $anome_contato; ?>">
            </div>

            <label>Fone:</label>
            <div id="einputFone">
              <input type="text" id="fone" class="inputeNCC" name="fone" placeholder="fone" value="<?php echo $afone; ?>">
              <input type="text" id="fone2" class="inputeNCC" name="fone2" placeholder="fone 2" value="<?php echo $afone2; ?>">
            </div>

            <label>Email:</label>
            <div id="einputEmail">
              <input type="text" id="email" class="inputeNCC" name="email" placeholder="Email" value="<?php echo $aemailbc; ?>">
            </div>

            <label>Tipo de Plano</label>
            <div id="einputplano">
              <input type="text" id="tipo_plano" class="inputeNCC" name="tipo_plano" readonly=true placeholder="tipo_plano" value="<?php echo $atipo_plano; ?>">
            </div>

            <label>Valor</label>
            <div id="evalor">
              <input type="text" id="valor" class="inputeNCC" name="valor" readonly=true placeholder="valor " value="<?php echo $avalor; ?>">
            </div>

            <label>duracao</label>
            <div id="evencimento">
              <input type="text" id="vencimento" class="inputeNCC" name="vencimento" readonly=true placeholder="liberado apos o pagto" value="<?php echo $aduracao; ?>"><br><br>
            </div>

          </div>

        </div>
        <!--fim div telaesquerda ---------------------------->

        <div id="teladireita">
          <div id="inputesdireita">
            <div id="novos">
              <p>Dados Novos</p>
            </div>
            <label>Codigo</label>
            <div id="dcodigo">
              <input type="text" class="inputeNCC" name="codigo" placeholder="codigo" value="<?php echo  $acodigo; ?>">
              <input type="text" id="data_abertura" class="inputeNCC" name="data_abertura" placeholder="data" value="<?php echo $adata_abertura; ?>">
            </div>

            <label>Empresa:</label>
            <div id="dinputEmpresa">
              <input type="text" id="empresa" class="inputeNCC" name="empresa" topo.phpname="empresa" placeholder="Empresa" value="<?php echo $aempresa; ?>">
              <input type="text" id="cnpj" class="inputeNCC" name="cnpj" placeholder="cnpj" value="<?php echo $acnpj; ?>">
            </div>

            <label>Nome:</label>
            <div id="dinputNome">
              <input type="text" id="nome_contato" class="inputeNCC" name="nome_contato" placeholder="nome" value="<?php echo $anome_contato; ?>">
            </div>
            <label>Fone:</label>
            <div id="dinputFone">
              <input type="text" id="fone" class="inputeNCC" name="fone" placeholder="fone" value="<?php echo $afone; ?>">
              <input type="text" id="fone2" class="inputeNCC" name="fone2" placeholder="fone 2" value="<?php echo $afone2; ?>">
            </div>

            <label>Email:</label>
            <div id="dinputEmail">
              <input type="text" id="email" class="inputeNCC" name="email" placeholder="Email" value="<?php echo $email; ?>">
            </div>

            <label>Tipo de Plano</label>
            <div id="dinputplano">
              <input type="text" id="tipo_plano" class="inputeNCC" name="tipo_plano" readonly=true placeholder="tipo_plano" value="<?php echo $tipoplano; ?>">
            </div>

            <label>Valor</label>
            <div id="dvalor">
              <input type="text" id="valor" class="inputeNCC" name="valor" readonly=true placeholder="valor " value="<?php echo $valor; ?>">
            </div>


            <label>duracao</label>
            <div id="dvencimento">
              <input type="text" id="vencimento" class="inputeNCC" name="vencimento" readonly=true placeholder="liberado apos o pagto" value="<?php echo  $duracao; ?>">
            </div>
          </div>
          <!--inputesesquera -->
        </div> <!-- div teladireita --->

      </div> <!-- div geral --->
      <div id="btnEnviar">
        <button type="submit" name="enviar">Enviar</button>
      </div>
    </form>

  </div>
  <!--fim da div conteiner-->



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