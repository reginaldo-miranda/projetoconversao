<?php session_start(); ?>
<?php
include_once "LicensaDeUso.php";
if (isset($_SESSION['semail'])) : ?>
    <h1>logodo</h1>
<?php else : ?>
    <h1>nao logodo</h1>
    echo "<script type='text/javascript'>
        window.top.location = 'https://conversao.000webhostapp.com/templates/FRlogin.php';
    </script>";
<?php endif; 
//system("TZ=BRT date");
//date_default_timezone_set('America/Sao_Paulo');
ini_set('date.timezone', 'America/Sao_Paulo');
$plano = '';
$senha = $_SESSION['ssenha'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Logim</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../static/css/stilo.css" rel="stylesheet" type="text/css">
    <script src="../static/js/forminput.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/f48343b6a3.js" crossorigin="anonymous"></script>
</head>
<header>
    <div id="TEXTO">Conversão de dados para venda - SIMPLES NACIONAL - Comercio-Revenda - Escolhe o plano</div>
    <div id="saida">
        <button id="btn-fecharSistema" type="button" onClick="fechar()">Sair <i class="fas fa-times"></i></button>
    </div>
</header>

<body>
    <form id="compraplano " name="BEgravaCompra.php" action="BEgravaCompra.php" method="post">
        <div id="containerplano">
            <div id="caixacontrato">
                <h3 id="tituloContrato"><strong>Termo de aceitação</strong></h3>
                <div id="contrato">
                    <p><?php echo $TextoLicensa; ?></p>
                </div> <!-- fecha div contrato -->
                <div id="liberarBotoes">
                    <input type="button" value="Aceitar contrato" onclick="aceitar1()">
                    <!--   <input id="myCheckAceito" type="checkbox" data-toggle="tooltip" data-placement="bottom" title="Clicar na Caixa para marcar" name="myCheckAceito"> -->
                    <input id="myCheckAceito" type="checkbox">
                </div> <!-- liberar botoes -->
            </div> <!-- caixa contrato -->
            <div id="boxPlanos">
                <div id="btncheck">
                </div>
                <!--- btncheck -->
                <div id="esquerda">
                    <div id="plano1">
                        <p class="textoplano"> Plano 1 é o plano ecônomico, porém sua duração e de trinta dias, valor de R$ 40,00 reais </p>
                        <a id="pla" class="ativarHR" href='BEgravaCompra.php?seleciona=<?php echo $plano = '1'; ?>'>Plano 1</a>
                    </div>
                </div> <!-- div esquerda -->
                <div id="centro">
                    <div id="plano2">
                        <p class="textoplano"> Plano 2 ecônomico, sua duração é de sessenta dias, valor de R$ 70,00 reais</p>
                        <a id="plac" class="ativarHR" href='BEgravaCompra.php?seleciona=<?php echo $plano = '2'; ?> '>Plano 2</a>
                        <!--  <a   href='BEgravaCompra.php class="ativarHR">?seleciona=<?php echo $plano = '2'; ?>'>Plano 2</a> -->
                    </div>
                </div> <!-- div centro -->
                <div id="direita">
                    <div id=plano3>
                        <p class="textoplano"> Plano 3 é o plano mais longo, sua duração e de 100 dias, valor de R$ 90,00 reais </p>
                        <a id="plad" class="ativarHR" href='BEgravaCompra.php?seleciona=<?php echo $plano = '3'; ?>'>Plano 3</a>
                    </div>
                </div> <!-- div direita -->
            </div> <!-- boxPlanos -->
    </form>
    </div> <!-- fim conteiner -->
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