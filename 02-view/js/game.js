//FICHIER GÉRANT LE SYSTEME DE JEU GAME.PHP



/************************************************/
/******************* DONNEES ********************/
/************************************************/

// Déclaration d un constructeur d objet de personnages
var perso = function()
{
	this.pv = dice(90, 110);
	this.att = dice(5, 7);
};

// Création des personnage
var player = new perso;
var rival = new perso;

//Variabales stockant les pv max pour modifier la barre de vie.
var hpMaxRival = rival.pv;
var hpMaxPlayer = player.pv;

//Variables recevant le score, son modificateur (le nombre de clic impacte négativement le score) et le formulaire d'enregistrement du score
var score = 0;
var clicCount = 0;
var totalScore;
var formScore = document.querySelector('article form');
var inputScoreHidden = document.querySelector('article form input[type="hidden"]');
var showScoreInP = document.querySelector('form p');


// Boutons
var quickStrikePlayer = document.querySelector('section a:first-of-type');
var grossePatate = document.querySelector('section a:nth-of-type(2)');
var block = document.querySelector('section a:last-of-type');

// Zone de textes infos joueur
var statePlayer = document.querySelector('h4:first-of-type');
var stateRival = document.querySelector('h4:last-of-type');
var infoTextUp = document.querySelector('article p:first-of-type');
var infoTextDown = document.querySelector('article p:last-of-type');

// Image
var kameSennin = document.querySelector('aside img:first-of-type');
var ken = document.querySelector('aside img:last-of-type');

// Barre de vie
var hpPlayer = document.querySelector('.playerLife');
var hpRival = document.querySelector('.rivalLife');


// Bulles de BD et leur contenu
var playerBubbleChoice = document.querySelector('aside div:first-of-type');
var RivalBubbleChoice = document.querySelector('aside div:last-of-type');
var BubblePlayerContent = document.querySelector('aside div:first-of-type i');
var BubbleRivalContent = document.querySelector('aside div:last-of-type i');




/***********************************************/
/****************** FONCTIONS ******************/
/***********************************************/



// Fonction générant un nombre entier entre un mini et un max inclus
function dice(min, max)
{
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min +1)) + min;
}

//Modification de la barre de vie durant le combat
function lifeBarHited (pvActual, pvMax, element)
{
	//Produit en croix pour modifie la width, 100 est sa taille en pourcentage
	var lifeRemainig = Math.round(100 * pvActual / pvMax);
	element.style.width = lifeRemainig + '%';
}


//Ecriture et apparition des bulles des BD pour chaque perso
function makeBubble (element1, attack, element2)
{
	element1.className=(attack);
	element2.classList.add('bubble');
}


// --------------------LIGHT ATTACK
function attackRival()
{
	var damage = dice(1, 6) + rival.att;
	player.pv -= damage;

	//Modification de la barre de vie
	lifeBarHited(player.pv, hpMaxPlayer, hpPlayer);
	
	//Bulle Rival
	makeBubble(BubbleRivalContent,  "fa fa-hand-paper-o", RivalBubbleChoice);

	infoTextDown.textContent = "Ken use Quick Slap !";
}


function lightAttackPlayer()
{
	
	
	//MODIF ICI  !!!!!!!!!!!!!!!!!!!!!
	var damage = dice(1, 6) + player.att;
	rival.pv -= damage;
	lifeBarHited(rival.pv, hpMaxRival, hpRival);
	makeBubble(BubblePlayerContent, "fa fa-hand-paper-o", playerBubbleChoice);
	infoTextUp.textContent = "Kame Sennin use Quick Slap !";
}



//---------------------HEAVY ATTACK
function heavyAttackRival()
{
	var damage = (dice(1, 6) + rival.att) *2;
	player.pv -= damage;
	lifeBarHited(player.pv, hpMaxPlayer, hpPlayer);
	makeBubble(BubbleRivalContent, "fa fa-hand-rock-o", RivalBubbleChoice);
	infoTextDown.textContent = "Ken use Grosse Patate !";
}

function GrossePatate()
{
	var damage = (dice(1, 6) + player.att) *2;
	rival.pv -= damage;
	lifeBarHited(rival.pv, hpMaxRival, hpRival);
	makeBubble(BubblePlayerContent, "fa fa-hand-rock-o", playerBubbleChoice);
	infoTextUp.textContent = "Kame Sennin use Grosse Patate !";
}

//---------------------Détermine le choix de Rival
function rivalChoice()
{
	return dice(1, 3);
}


//--------------------Victoire ou Défaite
function deathOrGlory()
{
	if ((rival.pv <= 0) && (player.pv <=0))
	{
		//Ejection des images
		ken.classList.add('defeatedRival');
		kameSennin.classList.add('defeatedPlayer');
		
		//Ejection des boutons
		quickStrikePlayer.classList.add('smashedButtonTopKen');
		grossePatate.classList.add('smashedButtonMiddleKame');
		block.classList.add('smashedButtonBelowKen');
		
		//pour vider la barre de vie qui ne l était pas à la defaite d un perso.
		document.querySelector('.rivalLife').style.width = 0 + "%";
		document.querySelector('.playerLife').style.width = 0 + "%";
		
		//Apparition bulle de in de combat
		victoryPlayerBubble.classList.add('bubble');

		//infos de jeu
		infoTextUp.textContent = "Double KO !";
		infoTextDown.textContent = "Clics on the bubble above or refresh the page(mobile) to wash your honor";
		
	} else if (rival.pv <= 0) {
			ken.classList.add('defeatedRival');
			quickStrikePlayer.classList.add('smashedButtonTopKen');
			grossePatate.classList.add('smashedButtonMiddleKen');
			block.classList.add('smashedButtonBelowKen');
			document.querySelector('.rivalLife').style.width = 0 + "%";
			
			//calcul du score
			score = player.pv;
			clicCount = clicCount*100;
			totalScore = score * 1000 - clicCount;
			
			//affichage du score dans le 'artcle p' et dans 'input hidden'
			showScoreInP.textContent = "You made " + totalScore + " points in " + clicCount/100 + " hits (clics) !!!";
			inputScoreHidden.value = totalScore;
			
			//Apparition du formulaire contenant le score
			formScore.classList.add('bubble');
			
			victoryPlayerBubble.classList.add('bubble');
			
			//Dialogues différents selon victoire
			if (player.pv >= 60){
				infoTextUp.textContent ='Kame Sennin : \"Did you bleed ? I can\'t see with your red clothes... Noob ! \"';
			} else if ((player.pv < 60) && (player.pv >= 20)) {
				infoTextUp.textContent ='Kame Sennin : \"You have some skills but I have the high ground\"';
			} else if (player.pv < 20) {
				infoTextUp.textContent ='Kame Sennin : \"Ouch ! That was closed...\"';
			}
			infoTextDown.textContent = "You win ! Click on \"Again\" or refresh to humiliate Ken again" ;
			
		} else if (player.pv <= 0) {
			kameSennin.classList.add('defeatedPlayer');
			quickStrikePlayer.classList.add('smashedButtonTopKame');
			grossePatate.classList.add('smashedButtonMiddleKame');
			block.classList.add('smashedButtonBelowKame');
			document.querySelector('.playerLife').style.width = 0 + "%";
			victoryRivalBubble.classList.add('bubble');
			if (rival.pv >= 60){
				infoTextUp.textContent = "Ken : \"Don't tell me you're actually unconscious.\" ";
			} else if ((rival.pv < 60) && (rival.pv >= 20)) {
				infoTextUp.textContent = "Ken : \"Shoryouken !\" ";
			} else if (rival.pv < 20) {
				infoTextUp.textContent = "Ken : \"You're better than you look. Try harder.\" ";
			}
			infoTextDown.textContent = "You loose ! Clicking \"more\" or refresh the page to avenge yourself !";
	}
}


//---------------------GESION DES DIFFERENTS CAS DE ROUND

//SI LE JOUEUR CLIQUE SUR "QUICK SLAP (Paper)"
function attackPlayer()
{
	//Incrémentation de la variable contenant le nombre de clics (hits) => score
	clicCount++;
		switch (rivalChoice())
		{
			case 1:
				attackRival();
				lightAttackPlayer();
				break;
			case 2:
				heavyAttackRival();
				lightAttackPlayer();
				break;
			case 3:
				var damage = (dice(1, 6) + player.att) /2;
				rival.pv -= damage;	
				lifeBarHited(rival.pv, hpMaxRival, hpRival);
				makeBubble(BubblePlayerContent, "fa fa-hand-paper-o",playerBubbleChoice);
				makeBubble(BubbleRivalContent, "fa fa-hand-lizard-o", RivalBubbleChoice);
				infoTextUp.textContent = "Kame Sennin's Quick Slap deals half damage.";	
				infoTextDown.textContent = "Ken defends !";
				break;
		}
		deathOrGlory();
}

// SI LE JOUEUR CLIQUE SUR "Grosse Patate/rock"
function heavyAttackPlayer()
{
	clicCount++;
		switch (rivalChoice())
		{
			case 1:
				attackRival();
				GrossePatate();
				break;
			case 2:
				heavyAttackRival();
				GrossePatate();
				break;
			case 3:
				heavyAttackRival();
				infoTextDown.textContent = "Ken dodges and counters ! Watch your teeth !";
				lifeBarHited(player.pv, hpMaxPlayer, hpPlayer);
				makeBubble(BubblePlayerContent, "fa fa-hand-rock-o", playerBubbleChoice);
				makeBubble(BubbleRivalContent, "fa fa-hand-lizard-o", RivalBubbleChoice);
				infoTextUp.textContent = "Kame Sennin strikes the wind because ...";
				break;
		}
		deathOrGlory();
}


//SI LE JOUEUR CLIQUE SUR "DEFEND"

function dodgeCounter()
{
	clicCount++;
	makeBubble(BubblePlayerContent, "fa fa-hand-lizard-o", playerBubbleChoice);
	switch (rivalChoice())
	{
		case 1:
			var damage = (dice(1, 6) + rival.att) /2;
			player.pv -= damage;
			lifeBarHited(player.pv, hpMaxPlayer, hpPlayer);
			makeBubble(BubbleRivalContent, "fa fa-hand-paper-o", RivalBubbleChoice);
			infoTextUp.textContent = "Kame Sennin defends !";
			infoTextDown.textContent = "Ken's Quick Slap deals half damage.";
			break;
		case 2:
			GrossePatate();	
			
			//ecraser dom GrossePatate
			makeBubble(BubblePlayerContent, "fa fa-hand-lizard-o", playerBubbleChoice);
			makeBubble(BubbleRivalContent, "fa fa-hand-rock-o", RivalBubbleChoice);
			infoTextUp.textContent = "Kame Sennin dodges and counters like a master !";
			infoTextDown.textContent = "Ken stroke the wind like a noob !";
			break;
		case 3:
			makeBubble(BubbleRivalContent, "fa fa-hand-lizard-o", RivalBubbleChoice);
			infoTextUp.textContent = "Duellists defend at the same time...";
			infoTextDown.textContent = "Pussies...";
			break;
	}
	deathOrGlory();
}



/************ CODE PRINCIPAL **************/

//infos joueurs et rival
statePlayer.textContent = "- PLAYER - HP : " + player.pv + " STR : " + player.att;
stateRival.textContent = "- CPU - HP : " + rival.pv + " STR : " + rival.att;

//GAME : Bouton cliquable
quickStrikePlayer.addEventListener('click', attackPlayer);
grossePatate.addEventListener('click', heavyAttackPlayer);
block.addEventListener('click', dodgeCounter);

//Disparition bulles bd
playerBubbleChoice.addEventListener('transitionend', function()
{
	this.classList.remove('bubble');
});
	
RivalBubbleChoice.addEventListener('transitionend', function()
{
	this.classList.remove('bubble');
});


//Dissuation
formScore.addEventListener("submit", function(e)
{
	if (inputScoreHidden.value != totalScore)
	{
		e.preventDefault();
	}
});

var victoryPlayerBubble = document.querySelector('aside div:nth-of-type(2)');
var victoryRivalBubble = document.querySelector('aside div:nth-of-type(3)');



/*TESTZONE-TESTZONE-TESTZONE-TESTZONE-TESTZONE-TESTZONE-TESTZONE*/



victoryPlayerBubble.addEventListener('click', function()
{
	//On defait deathOrGlory
			ken.classList.remove('defeatedRival');
			quickStrikePlayer.classList.remove('smashedButtonTopKen');
			grossePatate.classList.remove('smashedButtonMiddleKen');
			block.classList.remove('smashedButtonBelowKen');
				//En cas du double chaos
				kameSennin.classList.remove('defeatedPlayer');
				grossePatate.classList.remove('smashedButtonMiddleKame');
			
	//remplir les barres de vie
			document.querySelector('.playerLife').style.width = 100 + "%";
			document.querySelector('.rivalLife').style.width = 100 + "%";

	//redefinir les variables de vie au max
			player.pv= hpMaxPlayer;
			rival.pv=hpMaxRival;

	//vider les champs infos article p
			infoTextUp.textContent =('');
			infoTextDown.textContent = "";
			
	//remises des elements du score à zero
			score = 0;
			clicCount = 0;
			totalScore = 0;
			
	//effacer le contenu de score info
			showScoreInP.textContent = "";
			inputScoreHidden.value = 0;
			
	//faire disparaitre le formulaire de score
			formScore.classList.remove('bubble');
			
	//faire disparaitre la bulle de victoire
			victoryPlayerBubble.classList.remove('bubble');
	
});

victoryRivalBubble.addEventListener('click', function()
{
			kameSennin.classList.remove('defeatedPlayer');
			quickStrikePlayer.classList.remove('smashedButtonTopKame');
			grossePatate.classList.remove('smashedButtonMiddleKame');
			block.classList.remove('smashedButtonBelowKame');
			document.querySelector('.playerLife').style.width = 100 + "%";
			document.querySelector('.rivalLife').style.width = 100 + "%";
			player.pv= hpMaxPlayer;
			rival.pv=hpMaxRival;
			infoTextUp.textContent =('');
			infoTextDown.textContent = "";
			score = 0;
			clicCount = 0;
			totalScore = 0;
			showScoreInP.textContent = "";
			inputScoreHidden.value = 0;
			formScore.classList.remove('bubble');
			victoryRivalBubble.classList.remove('bubble');
	
});
