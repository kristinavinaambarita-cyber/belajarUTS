<?php 
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'kisi_uts_web';
    $port = 3307;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$database;port=$port", $user, $pass);
    } catch (PDOException $error) {
        die("Koneksi DB Error : ".$error->getMessage());
    }
?>