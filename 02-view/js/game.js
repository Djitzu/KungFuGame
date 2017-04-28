//Fichier gérant le systéème de jeu de game.php

/******************* DONNEES ********************/
// Déclaration d un constructeur d objets de personnages
var perso = function()
{
	this.pv = dice(90, 110); //90-110
	this.att = dice(5, 7);
};

// Création des personnage
var player = new perso;
var rival = new perso;

//Variabales stockant les pv max pour modifier la barre de vie.
var hpMaxRival = rival.pv;
var hpMaxPlayer = player.pv;


// querySelector des boutons
var quickStrikePlayer = document.querySelector('section a:first-of-type');
var grossePatate = document.querySelector('section a:nth-of-type(2)');
var block = document.querySelector('section a:last-of-type');

// querySelector des zone de textes infos joueur
var statePlayer = document.querySelector('h4:first-of-type');
var stateRival = document.querySelector('h4:last-of-type');
var textPlayer = document.querySelector('article p:first-of-type');
var textRival = document.querySelector('article p:last-of-type');

//querySelector image
var kameSennin = document.querySelector('aside img:first-of-type');
var ken = document.querySelector('aside img:last-of-type');

//querySelector lifebar
var hpPlayer = document.querySelector('.playerLife');
var hpRival = document.querySelector('.rivalLife');


/****************** FONCTIONS ***************/


//infos joueurs et rival
statePlayer.textContent = "- PLAYER - HP : " + player.pv + " STR : " + player.att;
stateRival.textContent = "- CPU - HP : " + rival.pv + " STR : " + rival.att;


// Fonction générant un nombre entier entre un mini et un max inclus
function dice(min, max)
{
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min +1)) + min;
}

// --------------------LIGHT ATTACK
function attackRival()
{
	var damage = dice(1, 6) + rival.att;
	player.pv -= damage;

	//Produit en croix pour modifie la width, 100 est sa taille en pourcentage 
	var x = Math.round(100 * player.pv / hpMaxPlayer);
	document.querySelector('.playerLife').style.width = x + '%';
	return textRival.textContent = "Ken use Quick Slap !";
}

function lightAttackPlayer()
{
	var damage = dice(1, 6) + player.att;
	rival.pv -= damage;

	//Ca marche pas top mais pas trouvé mieux 
	var x = Math.round(100 * rival.pv / hpMaxRival);
	document.querySelector('.rivalLife').style.width = x + '%';
	return textPlayer.textContent = "Kame Sennin use Quick Slap !";
}


//---------------------HEAVY ATTACK
function heavyAttackRival()
{
	var damage = (dice(1, 6) + rival.att) *2;
	player.pv -= damage;
		var x = Math.round(100 * player.pv / hpMaxPlayer);
	document.querySelector('.playerLife').style.width = x + '%';
	return textRival.textContent = "Ken use Grosse Patate !";
}

function grandCoup()
{
	var damage = (dice(1, 6) + player.att) *2;
	rival.pv -= damage;
		var x = Math.round(100 * rival.pv / hpMaxRival);
	document.querySelector('.rivalLife').style.width = x + '%';
	return textPlayer.textContent = "Kame Sennin use Grosse Patate !";
}

//---------------------Détermine le choix de Rival
function rivalChoice()
{
	return dice(1, 3);
}


//--------------------Victoire ou Défaite
function deathOrGlory()
{
	if (rival.pv <= 0) 
	{
			ken.classList.add('defeatedRival');
			kameSennin.classList.add('grow');

			quickStrikePlayer.classList.add('smashedButtonTopKen');
			grossePatate.classList.add('smashedButtonMiddleKen');
			block.classList.add('smashedButtonBelowKen');


			//pour vider la barre de vie qui ne l était pas vide à la defaite d un perso.
			document.querySelector('.rivalLife').style.width = 0 + "%";
			textPlayer.textContent =('Kame Sennin : \"he he he !\"')
			return textRival.textContent = "Ken is defeated : You win !";
		} else if (player.pv <= 0) {
			kameSennin.classList.add('defeatedPlayer');
			ken.classList.add('grow');


			quickStrikePlayer.classList.add('smashedButtonTopKame');
			grossePatate.classList.add('smashedButtonMiddleKame');
			block.classList.add('smashedButtonBelowKame');


			document.querySelector('.playerLife').style.width = 0 + "%";
			textRival.textContent = "Ken : \"Your dojo belong to me !\" ";
			return textPlayer.textContent = "Ho no ! ... You loose. Sorry for you wounded ego.";
	}
}


//---------------------GESION DES DIFFERENTS CAS DE ROUND

//SI LE JOUEUR CLIQUE SUR "QUICK SLAP"
function attackPlayer()
{
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
				var x = Math.round(100 * rival.pv / hpMaxRival);
				document.querySelector('.rivalLife').style.width = x + '%';
				textPlayer.textContent = "Kame Sennin's Quick Slap deals half damage.";	
				textRival.textContent = "Ken defends !";
				break;
		}
		deathOrGlory();
}

// SI LE JOUEUR CLIQUE SUR "Grosse Patate"
function heavyAttackPlayer()
{
		switch (rivalChoice())
		{
			case 1:
				attackRival();
				grandCoup();
				break;
			case 2:
				heavyAttackRival();
				grandCoup();
				break;
			case 3:
				heavyAttackRival();
				textRival.textContent = "Ken dodges and counters ! Watch your teeth !";
				var x = Math.round(100 * player.pv / hpMaxPlayer);
				document.querySelector('.playerLife').style.width = x + '%';				
				textPlayer.textContent = "Kame Sennin strikes the wind because ...";
				break;
		}
		deathOrGlory();
}


//SI LE JOUEUR CLIQUE SUR "DEFEND"

function dodgeCounter()
{
		switch (rivalChoice())
		{
			case 1:
				var damage = (dice(1, 6) + rival.att) /2;
				player.pv -= damage;
				var x = Math.round(100 * player.pv / hpMaxPlayer);
				document.querySelector('.playerLife').style.width = x + '%';		
				textPlayer.textContent = "Kame Sennin defends !";
				textRival.textContent = "Ken's Quick Slap deals half damage.";
				break;
			case 2:
				grandCoup();						
				textPlayer.textContent = "Kame Sennin dodges and counters like a master !";
				textRival.textContent = "Ken stroke the wind like a noob !";
				break;
			case 3:
				textPlayer.textContent = "Duellists defend at the same time...";
				textRival.textContent = "Pussies..."
				break;
		}
		deathOrGlory();
}


/************ CODE PRINCIPAL **************/


//GAME : Bouton cliquable
quickStrikePlayer.addEventListener('click', attackPlayer);
grossePatate.addEventListener('click', heavyAttackPlayer);
block.addEventListener('click', dodgeCounter);