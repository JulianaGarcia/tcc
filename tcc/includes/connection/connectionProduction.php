<?php
    $connection = mysqli_connect('35.197.23.85', 'root', 'ong1406') or die('Não foi possível acessar o Servidor de Banco de Dados!!!' . mysqli_error());

    // echo 'Connected successfully';

    $db_selected = mysqli_select_db($connection, 'ong') or die ('Não foi possível acessar a Base de Dados das Ongs!' . mysqli_error());

    // mysqli_close($connection);
?>