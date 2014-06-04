<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
    $codigo = strip_tags($codigo);
    $locationError = "http://micorazon.wp:8888/?error=true";
    try {
        $conn = new PDO('mysql:host=localhost;dbname=micorazon', "root", "root");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmnt = $conn->query("SELECT * FROM empresa WHERE codigo='{$codigo}' LIMIT 1");

        $array = $stmnt->fetchAll();
        if (count($array) > 0) {
            foreach ($array as $row) {
                header("Location: {$row['url']}?codigo=" . $codigo . "&empresa=" . $row['nombre']);
            }
            $conn = null;
        } else {

            header("Location: {$locationError}");
        }
    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
        die();
    }
}
?>
