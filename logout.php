<?php

session_start();

session_destroy();

header("Location: concert_manage.php");
exit;

?>