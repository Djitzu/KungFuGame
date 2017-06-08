<?php 
//-------------HEAD
include'02-view/partials/head.php';

//-------------HEADER (titre, nav, instructions)
include'02-view/partials/menu.php';



//---ZONE INFO CONEXION/INSCRIPTION

//Si Inscription réussie, afficher un message
if ($_GET['page'] === 'home' && $_GET['inscription'] === 'ok')
{
    echo'<h1>AAaaww yeah ! You can Sign In now !</h1>';
}

//Si Connexion réussie, afficher un message de joie, sinon d'erreur
if ($_GET['page'] === 'home' && $_GET['connexion'] === 'ok')
{
    session_start();
    echo'<h1>Good to see you ' . $_SESSION['pseudo'] .  ' ! Push Game Button just Above !</h1>';
} elseif ($_GET['page'] === 'home' && $_GET['connexion'] === 'error') {
    echo'<h1>Oops ! Wrong login or password.</h1>';
}

//Message de déconnextion
if ($_GET['page'] === 'home' && $_GET['logout'] === 'ok')
{
     echo'<h1>See you soon !</h1>';
}



//---DETERMINATION DE LA PAGE A AFFICHER DANS LE BODY

//Valeur par défaut (/erreur)
$page = 'home';

/*Protection url : si $_GET['page'] = Home ou game ou index*/
if (isset($_GET['page']) && ($_GET['page'] === 'home') || ($_GET['page'] === 'game') || ($_GET['page'] === 'score') || ($_GET['page'] === 'cheater'))
{
    $page = $_GET['page'];
} else {
    echo'<h1>Laisse mon url tranquille petit margoulin !!</h1>';
}

//----------------BODY
include('02-view/pages/' . $page . '.php');


//----------------FOOTER
include'02-view/partials/footer.php';
?>