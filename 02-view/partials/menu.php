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
					<p>This non-commercial game is my end-of-study project and I hope you will appreciate it.</p>
					<p>"You are Kame Sennin and must defend your dojo from Ken. This opponent is full of jealousy because Hadoken is all rotten against The Kamehameha ! But there is a problem, Kame Sennin has the flu and can't fight with all his power !"</p>
					<h5>How to play</h5>
					<p>Each time you click an action button (circled by red), Ken randomly selects one and the cpu calculates the result. Here the effect :</p>
					<ul>
						<li>PAPER icon("Quick Slap") beats KUNG FU LIZARD HAND</li>
						<li>KUNG FU LIZARD HAND beats ROCK ("Grosse Patate")</li>
						<li>ROCK icon ("Grosse Patate" ) beats "Quick Slap"</li>
					</ul>
					<h5>Scoring</h5>
					<p>Try to make the best score of all time ! Its calculation is simple: the life remaining multiplied by 1000 less the number of clicks multiplied by 100. And don't forget, it's a game of chance (largely).</p>
					<h5>Credit</h5>
					<p>And thanks go to :</p>
					<ul>
						<li>Suikoden's made by Konami :I use their duellling rules system</li>
						<li>Capcom for Street fighter picture (Ken) and music (Guile Theme).</li>
						<li>SoundFX : Mike Koenig @ soundbible.com.</li>
						<li>The dear unknow guy who make this great background image.</li>
						<li>Toei & Akira Toriyama & the unknow artist for the picture of Kame Sennin.</li>
						<li>My professors : Lior Chamla and Fred Mulet.</li>
						<li>A tous les béta-testeurs : big bisous !</li>
						<li>Special thanks : \o/ You for playing \o/ !</li>
					</ul>
					<p>Please sends cookies for support !</p>
				</aside>

			</nav>
		</header>