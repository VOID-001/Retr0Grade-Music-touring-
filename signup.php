<?php

if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
    die("Validate email is required");
}

$password_hash=password_hash($_POST["password"],PASSWORD_DEFAULT);

$mysqli = require __DIR__ ."/database_con.php";

$sql = "INSERT INTO  users (name, email, password)
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( !$stmt->prepare($sql)) {
    die("SQL error:" . $mysql->error);
}

$stmt->bind_param("sss",$_POST["name"],$_POST["email"],$password_hash);

if($stmt->execute()){
    header("Location: concert_manage.php");
    exit;
}

?>