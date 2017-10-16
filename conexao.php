<?php
	$mysqli = new mysqli('localhost', 'root', '1234', 'SAEE');
    if ($mysqli->connect_error) {
        die('Erro na Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}
    $mysqli->query("SET NAMES 'utf8'");
    $mysqli->query('SET character_set_connection=utf8');
    $mysqli->query('SET character_set_client=utf8');
    $mysqli->query('SET character_set_results=utf8');
         // Consulta
?>
