<?php
	//Conexió
    // $con = new mysqli();
    // $con->connect('localhost', 'root', '', 'practica_immobiliaria_m7uf3'); 
    // if ($con->connect_errno) {
    //     printf("Connect failed: %s\n", $mysqli->connect_error);
    //     exit();
    // }
    try {
        //$con = new PDO("mysql:host=localhost;dbname=84556", "84556", "Independencia47!");
        $con = new PDO("mysql:host=localhost;dbname=practica_immobiliaria_m7uf3", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->exec("SET CHARACTER SET UTF8");
        return ($con);
    }
    catch (PDOException $e) {
        die ($e->getMessage());
    } 
?>