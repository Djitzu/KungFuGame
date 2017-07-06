<?php
require_once'../01-model/class-erase-score.php';

$deleteAllScore = new SetEraseScore();

$deleteAllScore->DeleteAllScore();

header('Location:../index.php?page=parameters&scoreDeleted');


?>