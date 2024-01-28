<?php

$mysqli = require __DIR__ ."/database_con.php";

$sql = "INSERT INTO feedback (name, email, message)
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();
if ( !$stmt->prepare($sql)) {
    die("SQL error:" . $mysql->error);
}

$stmt->bind_param("sss",$_POST["Name"],$_POST["Email"],$_POST["Message"]);

if($stmt->execute()){
    header("Location: concert_manage.php");
    exit;
}



?>