	<main>
			<!--Si le joueur est conencté-->
			<?php if (($_GET['connexion'] === 'ok') || ($_SESSION['pseudo'])) : ?>
				<a href="index.php?page=game" class="fight">FIGHT NOW !</a>
		
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
								<input type="text" required placeholder="pseudo" name="pseudo" />
							</p>
							<p>
								<label for="firstName">FIRST NAME</label>
								<input type="text" required placeholder="First name" name="firstName"/>
							</p>
							<p>
								<label for="lastName">LAST NAME</label>
								<input type="text" required placeholder="Last name" name="lastName"/>
							</p>
							<p>
								<label for="email">EMAIL</label>
								<input type="email" required placeholder="mail" name="email"/>
							</p>
							<p>
								<label for="password">PASSWORD</label>
								<input type="password" required placeholder="password "name="password"/>
							</p>
								<input type="submit" value="Inscription" name="validation"/>
						</form action="" method="post">
					</li>
					
						<!--FREE TOUR -->
					<li><a href="index.php?page=game">Anonimous Try</a></li>					
				</ul>
			<?php endif; ?>

		</main>
	</body>
	
	<?php if(!$_SESSION[pseudo]):?>
	<script type="text/javascript" src="02-view/js/home.js"></script>
	<?php endif; ?>