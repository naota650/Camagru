<?php
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    //has to match dbname made on mySQL
    $dbName = "testdb";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    //$conn = new PDO("mysql:host=$dbServername;dbname=myDB", $dbUsername, $dbPassword);