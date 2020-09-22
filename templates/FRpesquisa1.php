<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>SISTEMA DE BUSCA SEM REFRESH</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="../static/js/forminput.js"></script>
    </head>
  <body>
      <h1>Pesquisa incremental<h1>
      <form method="get" id="form_pesquisa1" action="">
          Pesquisar:<input type="text" name="pesquisa1" id="pesquisa1" placeholder="pesquisar">
          <!-- <input type="submit" name="enviar" value="pesquisar">  -->
      </form>   
      <ul class="resultado">
      </ul>         
  </body>  
</html>