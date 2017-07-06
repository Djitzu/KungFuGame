<?php 

session_start();
$_SESSION = [];
session_destroy();

header('Location:../index.php?page=home&logout=ok');


?>
