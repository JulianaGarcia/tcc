<?php
    $connection = mysqli_connect('localhost', 'root', '') or die('Não foi possível acessar o Servidor de Banco de Dados!!!' . mysqli_error());

    // echo 'Connected successfully';

    $db_selected = mysqli_select_db($connection, 'ong') or die ('Não foi possível acessar a Base de Dados das Ongs!' . mysqli_error());

    // mysqli_close($connection);
?>