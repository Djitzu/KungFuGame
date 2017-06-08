  _____ __ __  ____   ____ 
 / ___/|  |  ||    \ /    |
(   \_ |  |  ||  o  )  o  |
 \__  ||  |  ||   _/|     |
 /  \ ||  :  ||  |  |  _  |
 \    ||     ||  |  |  |  |
  \___| \__,_||__|  |__|__|
                           

Correction affichage : position relative aggrandissait la page. Résolu pour tablette, partiellement pour smartphone (relatvie conservé car trop d'imbrications)
nouveau fichier css contenant les classes js
ajout d'effet sonore et de musique
aside styliser et fini

styliser : formulaire :
	-page accueil : (smartphone)
	-game.php : save score
	
styliser : tableau score



A faire :


-Ecran de téléphone
	-si bulles "again" apparait, elle n'est pas cliquable
	-affichage par en cacahuete sur chrome (overflow hidden) : scrolling horizontal !!!
	-affichage sur firefox : barre blanche en bas, comme sur chrome.
	-Faire un if (device <= 500px) pour ne pas afficher certins éléments ? => Pas possible :s 
	
	-sur firefox : musique se lance en auto-play mais sound fx ne marchent pas
	-sur chrome : musique ne se lance pas mais soundfx fonctionnent.
<!--
____________________
RESPONSIVE 100%		|
	->cf agenda \o/	|
____________________|

--> 
icone son : toggle on/mute.


 ______  __ __    ___  ___ ___   ____ 
|      ||  |  |  /  _]|   |   | /    |
|      ||  |  | /  [_ | _   _ ||  o  |
|_|  |_||  _  ||    _]|  \_/  ||     |
  |  |  |  |  ||   [_ |   |   ||  _  |
  |  |  |  |  ||     ||   |   ||  |  |
  |__|  |__|__||_____||___|___||__|__|
                                      



<!-- *PAGE ACCUEIL -->
	<!-- ->FORMULAIRE -->
	<!-- -SIGN IN -->
		<!-- -SIGN UP -->
		<!-- -FREE TOUR -->

	<!-- ->INSTRUCTION via click js, position absolute par dessus tous les autres. Click croix => disparition -->

*PAGE GAME
	<!-- ->IMAGE PERSO EN %
	->NOM DU RIVAL
	->BRUITAGE
	->MUSIQUE
	->REMATCH (VIA BULLE CLICQUABLE)
	->BOUTON NEXT MATCH -->

	BONUS
	->PLUSIEURS PERSO AVEC COMPROTEMENT (DEF, ATT, TANKY, REGEN ?)
	->BULLES DE DIALOGUES CPU POUR 'PREVOIR' ATTAQUE A VENIR
	->ANIMER IMAGE À CHAQUE COUPS
	->LEVELING

<!--
*PAGE ABOUT
	-EN ABSOLU
	-SUR LA MEME PAGE (DANS HEADER ?)
-->
<!--
*PAGE SIGN UP
	->FORMULAIRE D INSCRIPTION
	<!--	-PSEUDO-->
	<!--	-NOM-->
	<!--	-PRENOM-->
	<!--	-MAIL-->
	<!--	-PASSWORD-->
	

*PAGE SCORE
		<!---HISTORIQUES DE MES SCORE : waiting for session-->
		<!---BEST EVER-->
		<!---BEST OF THE WEEK-->


*PAGE ADMIN
	->EDIT COMPTE
	->SUPPRESSION COMPTE
	->RESET SCORE
	->CREER PERSO
	->EDIT PERSO
	->SUPP PERSO





  _____   __   ___   ____     ___ 
 / ___/  /  ] /   \ |    \   /  _]
(   \_  /  / |     ||  D  ) /  [_ 
 \__  |/  /  |  O  ||    / |    _]
 /  \ /   \_ |     ||    \ |   [_ 
 \    \     ||     ||  .  \|     |
  \___|\____| \___/ |__|\_||_____|
                                  

<!--
	->Détailler le scoring

créer var score = 0;

*Points obtenus en fonction du nombre de pv restant?
Les pv sont exprimés en absolu puis en %.
-Modifier le retour des fontions pour qu'il renvoit player.pv (en absolu).
-Multiplier ce chiffre par 1000 pour obtenir le score.
	exemple : var score = player.pv * 1000


*Bonus : Modifier le score en fonction du nombre de clic effectués.
Moins de clics sont faits, plus le score est haut.
-creer une variable globale clicCount = 0
-rajouter clicCount ++ dans chacune des fonctions
-T1 : multiples test pour établir une moyenne clic/combat
-T2 : générer un tableau style : 
		5 clics => + 10000pt
		6 clics => + 8000pt
		7 clics => + 6000pt
		etc.


*Afficher le score qui sera une addition des points issues de la vie et du nombre de clic

*Enregistrer le score dans la base de données avec la date.

-->

<!--*Requete bd et affichage des scores en dynamique sur score.phtml-->

 _         _     _ 
| |       | |   | |
| |__   __| | __| |
| '_ \ / _` |/ _` |
| |_) | (_| | (_| |
|_.__/ \__,_|\__,_| 
                   
                   


<!-- - table user :
	id
	pseudo
	firstName
	lastName
	mail
	password

- table score :
	id
	date
	#id_user -->


<!-- - CF BONUS EN BAS table pnj :
	nom
	image(1~4)
	phrase attaque 1
	phrase attaque 2
	phrase def
	phrase victoire
	phrase defaite
 -->


 _                           
| |                          
| |__   ___  _ __  _   _ ___ 
| '_ \ / _ \| '_ \| | | / __|
| |_) | (_) | | | | |_| \__ \
|_.__/ \___/|_| |_|\__,_|___/
                             
                             

             _ 
            (_)
 _ __  _ __  _ 
| '_ \| '_ \| |
| |_) | | | | |
| .__/|_| |_| |
| |        _/ |
|_|       |__/ 


BONUS
	->Détailler l'ajout de personnage

*Dans la partie Admin : creer un formulaire permettant d'ajouter/editer un personnage.
Le formulaire doit contenir un champs nom et un champs image (voire 4 pour images ensanglantée)

SUPA BONUS AJAX ET PHP->JS: un champs permettant de modifier le comportant du cpu
- modifier la fonction dice pour influencer le choix du cpu.
- modifier le nombre de pv et l'attaque.




