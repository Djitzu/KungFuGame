<?php 
//Head + header
include'02-view/partials/head.php';
//Nav+About
include'02-view/partials/menu.php';

//Valeur par défaut (/erreur)
$page = 'home';

/*Protection url : si $_GET['page'] = Home ou game ou index*/
if (isset($_GET['page']) && ($_GET['page'] === 'home') || ($_GET['page'] === 'game') || ($_GET['page'] === 'score'))
{
    $page = $_GET['page'];
} else {
    echo'<h1>Laisse mon url tranquille petit margoulin !!</h1>';
}

//Inscription réussie !
if ($_GET['page'] === 'home' && $_GET['inscription'] === 'ok')
{
    echo'<h1>AAaaww yeah ! You can Sign In now !</h1>';
}

//Connexion réussie !
if ($_GET['page'] === 'home' && $_GET['connexion'] === 'ok')
{
    session_start();
    echo'<h1>Good to see you ' . $_SESSION['pseudo'] .  ' ! Push Game Button just Above !</h1>';
} elseif ($_GET['page'] === 'home' && $_GET['connexion'] === 'error') {
    echo'<h1>Aye ! Wrong login or password.</h1>';
}

//Message de déconnextion
if ($_GET['page'] === 'home' && $_GET['logout'] === 'ok')
{
     echo'<h1>See you soon !</h1>';
}

//body
include('02-view/pages/' . $page . '.php');


//footer
include'02-view/partials/footer.php';
?>