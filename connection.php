<?php
    session_start();

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'cgpa_calc';

    $conn = mysqli_connect($server, $username, $password, $database);
?>