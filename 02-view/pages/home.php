	<main>
			<!--Si le joueur est conencté-->
			<?php if (($_GET['connexion'] === 'ok') || ($_SESSION['pseudo'])) : ?>
				<a href="index.php?page=game" class="fight">Press start button !</a>
		
			<!--Sinon, formulaire complet-->
			<?php else : ?>
				<ul>
					<!--S'enregistrer-->
					<li>
						<a href="#!">Sign in</a>
						<form action="03-controler/check-signin.php" method="post" >
							<p>
								<label for="pseudo">PSEUDO</label>
								<input type="text" placeholder="pseudo" name="pseudo"/>
							</p>
							<p>
								<label for="password">PASSWORD</label>
								<input type="password" placeholder="password "name="password"/>
							</p>
							<input type="submit" value="connexion"/>
						</form action="" method="post">
					</li>
					
						<!--S'inscrire -->
					<li>
						<a href="#!">Sign Up</a>
						<form action="03-controler/check-signup.php" method="post" >
							<p>
								<label for="pseudo">PSEUDO</label>
								<input type="text" required name="pseudo" autocomplete="off" placeholder="Darkvador" title="Only letters (including uppercase), max 20 characters"/>
							</p>
							<p>
								<label for="firstName">FIRST NAME</label>
								<input type="text" autocomplete="off" name="firstName" placeholder="Dark" title="Only letters (including uppercase), max 20 characters"/>
							</p>
							<p>
								<label for="lastName">LAST NAME</label>
								<input type="text" required name="lastName" autocomplete="off" placeholder="Vador" title="Only letters (including uppercase), max 20 characters"/>
							</p>
							<p>
								<label for="email">EMAIL</label>
								<input type="email" name="email" autocomplete="off" placeholder="dark.vador@empire.gal"/>
							</p>
							<p>
								<label for="password">PASSWORD</label>
								<input type="password" required name="password" autocomplete="off" placeholder="8-15 characters"/>
							</p>
								<input type="submit" value="Inscription" name="validation"/>
						</form action="" method="post">
					</li>
					
						<!--FREE TOUR -->
					<li><a href="index.php?page=game">Anonymous Try</a></li>					
				</ul>
			<?php endif; ?>

		</main>
	</body>
	
	<?php if(!$_SESSION[pseudo]):?>
	<script type="text/javascript" src="02-view/js/home.js"></script>
	<?php endif; ?>