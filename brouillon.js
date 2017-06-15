//ken.classList.add('defeatedRival');
//quickStrikePlayer.classList.add('smashedButtonTopKen');
//grossePatate.classList.add('smashedButtonMiddleKen');
//block.classList.add('smashedButtonBelowKen');

//pour vider la barre de vie qui ne l était pas à la defaite d un perso.
//document.querySelector('.rivalLife').style.width = 0 + "%";
//textPlayer.textContent =('Kame Sennin : \"he he he !\"');
//textRival.textContent = "Ken is defeated : You win ! Your score :" + totalScore;

//score = player.pv;
//clicCount = clicCount*100;
//totalScore = score * 1000 - clicCount;

//affichage du score dans le 'artcle p' et dans 'input hidden'
//showScoreInP.textContent = "You made " + totalScore + " points in " + clicCount/100 + " hits (clics) !!!";
//inputScoreHidden.value = totalScore;
//Apparition du formulaire contenant le score
//formScore.classList.add('bubble');


//victoryPlayerBubble.classList.add('bubble');



CSS
GENERAL 50
HEADER 140
MAIN 240
    ->lifebar 250
    ->stats 292
    ->buttons 307
    ->infogames 330
    ->images 355
    ->bulles bd 386
    ->formulaire 466
    ->tableau 538
MEDIA QUERIES 579
    ->below 865px 588
    ->below 500px 655
CLASSES JS 808

GAME.JS
donnes 32
fonction 97
    ->dice 102
    ->lifeBarHited 110
    ->makeBubble (bulle BD) 119
    ->Quick Slap 127
    ->Grosse Patate 154
    ->rivalChoice() 164
    -> deathOrGlory 180 (victoirre ou defeaite
Different round cases 256
    ->attackPlayer()258
    ->heavyAttackPlayer()288
    ->dodgeCounter() 316
Code principal 354
    ->generate stats 356
    ->clickables buttons 360
    ->Dispariton bulle de bd 365
    ->dissuation 377
    ->Victory's bubble 387
    ->Defeat's bubble  428
    