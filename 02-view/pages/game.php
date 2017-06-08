		<main>
			<!-- LIFEBAR -->
			<div class="states" id="ancre">
				<div class="playerBar">
					<div class="playerLife"></div>
				</div>
				<div class="rivalBar">
					<div class="rivalLife"></div>
				</div>
			</div>

			<!-- STATS VIA JS -->
			
			<h4></h4><!--
			--><h4></h4>
			
			<!--PLAYER & RIVAL-->
			<aside>
				<!-- HERO -->
				<img src="02-view/image/tortuegeniale.jpg" alt="Hero">
				
				<!--BULLE DE BD AU CLIC, AFFICHE CHOIX JOUEUR-->
				<div>
					<i aria-hidden="true"></i>
				</div>
				
				<!--Victoire joueur-->
				<div>
					Again ?
				</div>
				<!--Victoire rival-->
				<div>
					More ?!
				</div>
				
				<!--RIVAL-->
				<img src="02-view/image/ken.jpg" alt="Rival">
				
				<!--BULLE DE BD AU CLIC, AFFICHE CHOIX CPU-->
				<div>
					<i aria-hidden="true"></i>
				</div>
			
			</aside>

			<!-- GAMEPAD -->
			<section>
				<a href="#ancre" title="Quick Slap"><i class="fa fa-hand-paper-o" aria-hidden="true"></i></a>
				<a href="#ancre" title="Grosse Patate"><i class="fa fa-hand-rock-o" aria-hidden="true"></i></a>
				<a href="#ancre" title="Defend vs Quick Slap or Counter vs Grosse Patate"><i class="fa fa-hand-lizard-o" aria-hidden="true"></i></a>
			</section>

			<!-- INFOGAMES VIA JS-->
			<article>
				<p></p>
				<p></p>
				
				<!--Formulaire contenant le score z-index opacity:0 ...-->
				<?php if($_SESSION['pseudo']): ?>
					<form action="03-controler/send-score.php" method="post" >
						<p></p>
						<input for="score" type="hidden" name="score"/>
						<input type="submit" value="Save my score !"/>
					</form>
				<?php endif; ?>
				
			</article>
			
			<audio source src="02-view/music/guileTheme.mp3" controls="controls" loop preload="auto"></audio>
			<audio src="02-view/sounds/slap.mp3"></audio>
			<audio src="02-view/sounds/right-cross.mp3"></audio>
			<audio src="02-view/sounds/kick.mp3"></audio>
			<audio src="02-view/sounds/toasty.mp3"></audio>
			<audio src="02-view/sounds/wilhelm-scream.mp3"></audio>
			
		</main>
	</body>
		<script type="text/javascript" src="02-view/js/game.js"></script>