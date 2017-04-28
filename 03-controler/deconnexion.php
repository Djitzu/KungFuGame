<?php 

session_start();
$_SESSION = [];
session_destroy();

header('Location:https://ajax-training-jeromepisi.c9users.io/KungFu/02-view/index.php?page=home&logout=ok');


?>
