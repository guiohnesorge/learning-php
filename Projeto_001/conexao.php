<?php

$usuario = 'root';
$senha = '';
$dbaname = 'projeto1_php';
$host = 'localhost';

    $mysqli = new mysqli($host, $usuario, $senha, $dbaname);

    if($mysqli->error){
        die('Falha ao se conectar com o banco de dados: ' . $mysqli->error);
    }
?>


<?php
    $con = new PDO("mysql:host=localhost;dbname=projeto1_php","root","");
?>