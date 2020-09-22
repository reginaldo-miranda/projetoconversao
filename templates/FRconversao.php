<?php

session_start();
if (isset($_SESSION['email'])) : ?>

	<h1>logodo</h1>
<?php else : ?>
	<h1>nao logodo</h1>
	echo "<script type='text/javascript'>
		window.top.location = 'https://conversao.000webhostapp.com/templates/FRlogin.php';
	</script>";
<?php endif; ?>



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

<body>
	<header>
		<div id="TEXTO">Conversão de dados para venda - SIMPLES NACIONAL - Comercio-Revenda - </div>

		<!-- <div id="saida">Sair <i class="fas fa-times"></i></div> -->
		<div id="saida">
			<button id="btn-fecharSistema" type="button" onClick="fechar()">Sair <i class="fas fa-times"></i></button>
		</div>

	</header>
	<!----------------------------------inicio modal logim --------------------------
   		<script>
			    
		   var retornoSessao = sessionStorage.getItem('SessaAberta');
		 
			if(retornoSessao != 1){
				console.log(retornoSessao);
				$(document).ready(function() {
				$('#myModal').modal('show');
				})

			}   
			
	  	 </script>

		<div class="modal" id="myModal"  data-backdrop="static" data-keyboard="false"> 
			<div class="modal-dialog">
				<div class="modal-content">
			
					 Modal Header 
					<div class="modal-header">
					<h4 class="modal-title">Termos de aceitação</h4>
					<button type="button" class="close" data-dismiss="modal ">&times;</button >
					</div>
			
					 Modal body 
					<div class="modal-body">
					Ao aceitar os termos, fica de resposabilidade do usuario dados cadastrado no sistema
					</div>
			
					Modal footer 
					<div class="modal-footer">
						<button type="button"  id="btn-aceitar" onClick="aceitar()"data-dismiss="modal" >Aceito</button> 
						<span>
							<input id="myCheckAceito"  type="checkbox" data-toggle="tooltip" data-placement="bottom" title="Clicar na Caixa para marcar" name="myCheckAceito">
						</span>    
						<button type="button" id="btn-fechar" onclick="fechar()" data-toggle="modal" data-target="#btn-fechar" data-backdrop="static">Sair</button> 
						
						<div class="modal hide" data-backdrop="static" data-keyboard="false"></div>
					</div>
				</div>
			</div>
		</div>

	     ----------------------------fim modal logim ----------------------------------->
	<div class="containerCv">
		<div class="botoes">

			<!--  <div id="blocoBotoes1"> -->
			<input type="text" id="cfopdigitado" placeholder="Digite cfop">

			<button id="btn-repasse" onClick="BtnRepasse()" data-toggle="tooltip" title="Repassar icms é quando a venda é feita para revendedor, que vair usar o credito de icms">Repassar icms

				<input id="myCheck" type="checkbox" data-toggle="tooltip" data-placement="bottom" title="Clicar na Caixa para marcar" name="myCheck">

			</button>

			<button id="btn-converte" onClick="checarRep()" data-toggle="tooltip" title="Clique no botão para converter os dados">Converte cfop</button>

			<!-- <button id="btn-pesquisa-cfop" onclick="buscacfop()">Pesquisa cfop</button> -->

			<button id="btn-busca" onclick="buscatabela()" data-toggle="tooltip" title="Busca uma tabela com todos os cfop">busca tabela</button>
			<!-- <a href="busca.html" type="button" value="busca" target="_blank" class="btn btn-info">busca tabela</a> -->
			<!--	</div>	<!-- blocoBotoes -->
		</div>

		<section class="c-img">

			<div id="envelope">

				<div class="inputs1">
					<div class="grid1-item1">
						<!-- <input id="unidadeMed" type="text" name="unidadeMed" placeholder="und med" > -->
						<input id="unidadeMed" type="text" name="unidadeMed" placeholder="Obrigado" data-toggle="tooltip" title="Unidade de Medida é: A grandeza física que serve de referência para uma determinada medição.">
					</div>
				</div>

				<div class="inputs2">

					<div class="grid2-item1">
						<input id="ncm" type="text" name="ncm" placeholder="ncm " data-toggle="tooltip" title="NCM significa :Nomenclatura Comum do Mercosul e trata-se de um código de oito dígitos estabelecido pelo Governo Brasileiro para identificar a natureza das mercadorias">
					</div>

					<div class="grid2-item2">
						<input id="csosnDentro" type="text" name="csosnDentro" placeholder="csosn d" data-toggle="tooltip" title="O significado de CSOSN vem da abreviação de Código de Situação da Operação do Simples Nacional,O código CSOSN nada mais é do que uma numeração utilizada para identificar operações realizadas por empresas optantes pelo Simples Nacional na emissão de uma Nota Fiscal Eletrônica, de acordo com o § 5º da cláusula terceira do Ajuste SINIEF 07/05.">
						<input id="csosnFora" type="text" name="csosnFora" placeholder="csosn f" data-toggle="tooltip" title="O significado de CSOSN vem da abreviação de Código de Situação da Operação do Simples Nacional,O código CSOSN nada mais é do que uma numeração utilizada para identificar operações realizadas por empresas optantes pelo Simples Nacional na emissão de uma Nota Fiscal Eletrônica, de acordo com o § 5º da cláusula terceira do Ajuste SINIEF 07/05.">
					</div>

					<div class="grid2-item3">
						<input type="text" id="cfopDento" name="cfopDento" placeholder="cfop d" data-toggle="tooltip" title="CFOP é a sigla de Código Fiscal de Operações e Prestações, das entradas e saídas de mercadorias, intermunicipal e interestadual. Trata-se de um código numérico que identifica a natureza de circulação da mercadoria ou a prestação de serviço de transportes">
						<input type="text" id="cfopFora" name="cfopFora" placeholder="cfop fora">
						<input type="text" id="Pis" name="Pis" placeholder="pis" data-toggle="tooltip" title="PIS é a sigla para Programa de Integração Social, uma contribuição tributária de caráter social, que tem como objetivo financiar o pagamento do seguro-desemprego, abono e participação na receita dos órgãos e entidades, tanto para os trabalhadores de empresas públicas, como privadas.">
						<input type="text" id="Cofins" name="Cofins" placeholder="cofi" data-toggle="tooltip" title="COFINS é a sigla de Contribuição para o Financiamento da Seguridade Social, que é uma contribuição social aplicada sobre o valor bruto apresentado por uma empresa.">
					</div>

				</div>
				<img id="image" src="../static/images/cadastroProdutos.jpg" alt="">
			</div>
		</section>
	</div>

	<!----------------------------------inicio rodape------------------------------------->


	<footer id="rodap">
		<div id="copy">
			&copy; Copyright 2019. Desenvolvido por: Reginaldo Miranda -- SISTEMA PARA SER USADO EM REVENDA DE PRODUTOS - ;
		</div>
	</footer>
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



<!-- https://pt.stackoverflow.com/questions/154065/como-passar-dados-de-um-input-para-outro-com-html-e-javascript  -->

<!--https://www.youtube.com/watch?v=x-4z_u8LcGc&t=769s-->

<!--site de cores site fletuicolors-->

<!---https://cosmos.bluesoft.com.br/  site de pesquisas cfop ncm csosn-->

<!--https://www.youtube.com/watch?v=GtsNZtzZiec-->