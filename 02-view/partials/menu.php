<?php session_start() ?>

<!-- HEADER -->
		<header>
			<h1>SUPA CHI KUNG FU MI <span>FURY</span></h1>


			<!-- En CONSTRUCTION -->
			<nav>
				<ul>
					<li><a href="index.php?page=home">Home</a></li>
					<li><a href="index.php?page=game">Game</a></li>
					<li><a href="index.php?page=score">Score</a></li>
					
					<?php if($_SESSION['pseudo']): ?>
						<li><a href="03-controler/deconnexion.php">Deconnexion</a></li>
					<?php endif; ?>
					
					<li><a href="#!">About</a></li>
					
				</ul>
				
				<aside>
					<h5>Welcome</h5>
					<p>This is a awesome great (in-progress) game that will improve your skill in chi fu mi. You will train your mind throught stressfull situation and progress step by step to become a real fighter</p>
					<h5>How to play</h5>
					<p>Each time you click an action button, your rival choose randomly an action at the same and cpu calculate the result</p>
					<ul>
						<li>PAPER icon("quick slap") deals strenght + 1 dice of 6</li>
						<li>ROCK icon ("Grosse Patate" ) deals the same as paper *2</li>
						<li>KUNG FU LIZARD HAND has two behaviour ! Against Paper, damaged and divided by two. Against Rock, dodge and counter with Rock ! Wow ! Too powerfull !</li>
					</ul>
					<h5>Credit</h5>
					<ul>
						<li>The dear unknow guy who make this great background image</li>
						<li>Newdround who produce cool sound</li>
						<li>Special thank : You for playing \o/ (I allways dream to write such a thing !)</li>
					</ul>
					<p>Please sends cookies for support !</p>
				</aside>

			</nav>
		</header>