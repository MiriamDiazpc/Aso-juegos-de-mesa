<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'asociacionjuegosmesa';

    /*Creamos la conexión con mysqlite*/ 
    $conn = new mysqli($host, $user, $password, $database); 

    if($conn -> connect_error){
        die("Error de conexión: ".$conn -> connect_error);
    }
?>