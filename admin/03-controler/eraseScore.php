<?php

require_once'../01-model/class-members.php';
$deleteScore = new DataMember();

//si rien n'est coché (javscript ?!)
//Si admin appuit sur "erase Selection"
if (isset($_POST['eraseSelection']))
{
    $i=0;
    while ($i < count($_POST['del']))
    {
        $deleteScore->eraseOneScore($_POST['del'][$i]);
        $i++;
    }
    header('Location:../index.php?page=index&selectedScoreDeleted#anchorSearch');
//Si admin appuit sur "Erase all score"
} else {
    $deleteScore->eraseAllMemberScore($_GET['memberId']);
    echo 'erase all scoreok';
    header('Location:../index.php?page=index&allScoreMemberDeleted#anchorSearch');
}


?>