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
    <div id="TEXTO">"Conversão de dados para venda - SIMPLES NACIONAL - teste";</div>
    <div id="saida">
        <button id="btn-fecharSistema" type="button" onClick="fechar()">Sair <i class="fas fa-times"></i></button>
    </div>
</header>

<body>
    <!----------------------------------inicio div conteiner------------------------------>
    <div class="conteiner">
        <form>
            <div id="inputs">
                <div id="inputCodigo">
                    <label>Tipo do Plano : </label>
                    <input type="text" id="tipo_plano" class="inpute" name="tipo_plano" placeholder="Tipo do plano">
                    <label>Validade (dias): </label>
                    <input type="text" id="validade_plano" class="inpute" name="validade_plano" placeholder="qde dias">
                    <label>Valor :</label>
                    <input type="text" id="valor" class="inpute" name="valor" placeholder="valor do contrato">
                </div>
                <button type="button" name="enviar" onclick="inserir()">Enviar</button>
            </div>
        </form>
    </div>
    <!----------------------------------fim da div conteiner------------------------------>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

<?php

function inserir($coluna, $valor, $tabela)
{
    $conn = getconexao();
    if ((is_array($coluna)) and (is_array($valor))) {
        if (count($coluna) == count($valor)) {
            $inserir = "insert into {$tabela} (" . implode(', ', $coluna) . ")
            values('" . implode('\',\'', $valor) . "')";
            //------------------------------------
            $stmt = $conn->prepare($inserir);
            if ($stmt->execute()) {
                //echo"salvo";
               
            } else {
                echo "nao salvou";
            }
        } else {
            return false;
        }

        //-----------------------------------------
    } else {
        $inserir = "INSERT INTO {$tabela} ({$coluna}) VALUES ('{$valor}')";
        $stmt = $conn->prepare($inserir);
        if ($stmt->execute()) {
            echo "salvo sem arry";
        } else {
            echo "nao salvou sem arry";
        }
        return false;
    }
}

//-----------------------------------


$tipoplano = 'plano teste'; //$_REQUEST['tipo_plano'];
$validade_plano = '30 dd'; //$_REQUEST['validade_plano'];
$valor = '30'; //$_REQUEST['valor'];

echo ($tipoplano);
inserir(array("TipoPlano", "Duracao", "Valor"), array($tipoplano, $validade_plano, $valor), "plano");

// header("location:cadastro.php?info=ok");
//header("location:cadastroplanos.php");

function getconexao()
{

    $dsn = 'mysql:host=localhost;dbname=id13607804_conversao;charset=utf8';
    $username = 'id13607804_reginaldo';
    $pass = 'n@mCVvsfsFF|>r7V';

    /*
    $dsn = 'mysql:host=localhost;dbname=conversoa;charset=utf8';
    $username = 'root';
    $pass = '';*/

    try {
        $pdo = new PDO($dsn, $username, $pass);
        return $pdo;
    } catch (PDOException $ex) {
        echo 'Erro :' . $ex->getMessage();
    }
}
?>