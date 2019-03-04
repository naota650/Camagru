<?php
    session_start();

    include_once '/config/database.php'; 

    $mail = strtolower($mail);
    
try {
    $dsn = "mysql:host=$DB_DSN;dbname=$DB_NAME;";
    $conn = new PDO($dsn, $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = $conn->prepare("SELECT id FROM users WHERE username=:username OR email=:email");
    $query = execute(array(':username' => $username, ':mail' => $mail));

    if ($val = $query->fetch()){
        $_SESSION['error'] = "user already exists";
        $query->closeCursor();
        return (-1);
    }
    $query->closeCursor();

    $password = hash("whirlpool", $password);

    $query = $conn->prepare("INSERT INTO users (username, email, pswd, token) VALUES (:username, :mail, :pswd, :token)");
    $token = uniqid(rand(), true);
    $query->execute(array(':username' => $username, ':mail' => $mail, ':pswd' => $password, ':token' => $token));

    $_SESSION['signup_success'] = true;
    return (0);
} catch (PDOException $e){
    $_SESSION['error'] = "ERROR: ".$e->getMessage();
}
