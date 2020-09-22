<?php
    include_once('BEconexao_pdo.php');

   $cursos = $_GET['palavra'];

   $cursos = "SELECT * FROM logim WHERE email like '%$cursos%'";
   $resultados_curso=mysqli_query($mysqli, $cursos);

   if(mysqli_num_rows($resultados_curso) <= 0){
       echo ("nao tem email cadastrado com esse nome");
   }else{
 
       while($rows = mysqli_fetch_assoc( $resultados_curso)){
          echo "<li>".$rows['email']."</li>";
       }
    
   }


?>