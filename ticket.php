<?php

$mysqli = require __DIR__ ."/database_con.php";

$sql = "INSERT INTO tickets (number, email)
        VALUES (?, ?)";

$stmt = $mysqli->stmt_init();
if ( !$stmt->prepare($sql)) {
    die("SQL error:" . $mysql->error);
}

$stmt->bind_param("ss",$_POST["number"],$_POST["email"]);

if($stmt->execute()){
    header("Location: concert_manage.php");
    exit;
}


?>