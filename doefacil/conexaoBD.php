<?php

    $hostBD = "localhost"; //Localização de servidor de BD
    $userBD = "root"; //Usuário do BD
    $senhaBD = "root"; //Senha do BD
    $database = "sistemainf3"; //Nome do BD no qual se deseja afetuar a conexão

    //Função do PHP responsável por estabelecer conexão com o BD
    $conn = mysqli_connect($hostBD, $userBD, $senhaBD, $database);
    
    //Se não conectar, exibe alerta de errro
    if(!$conn){
        echo "<p>Erro ao tentar conectar à Base de Dados <strong>$database</strong></p>";
    }

?>
