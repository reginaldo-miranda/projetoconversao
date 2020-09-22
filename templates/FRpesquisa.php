<?php
 
    include("../templates/BEconexao_pdo.php");

    $buscar = $_GET['pesquisar'];
   
    $result_busca = "select * from logim where email like '%$buscar%' limit 5"; 
    $resultado = mysqli_query($mysqli,$result_busca);

    while($row_busca = mysqli_fetch_array($resultado)){
        echo"email :".$row_busca['email']."<br>";

    }

    
?>    

<!-- https://www.youtube.com/watch?v=cvLaqZQnIEo 

 https://www.youtube.com/watch?v=IdyTXcTAa68
 
https://www.youtube.com/watch?v=4JwUZnhE4fM-->
