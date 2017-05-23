	<main>
				<ul>
					<!--S'enregistrer-->
					<li>
						<a href="#!">Sign in</a>
						<form action="03-controler/check-signin.php" method="post" >
							<input type="text" placeholder="pseudo" name="pseudo"/>
							<input type="password" placeholder="password "name="password"/>
							<input type="submit" value="Submit"/>
						</form action="" method="post">
					</li>
					
						<!--S'inscrire -->
					<li>
						<a href="#!">Sign Up</a>
						<form action="03-controler/check-signup.php" method="post" >
							<input type="text" required placeholder="pseudo" name="pseudo" />
							<input type="text" required placeholder="First name" name="firstName"/>
							<input type="text" required placeholder="Last name" name="lastName"/>
							<input type="email" required placeholder="mail" name="email"/>
							<input type="password" required placeholder="password "name="password"/>
							<input type="submit" value="Submit" name="validation"/>
						</form action="" method="post">
					</li>
					
						<!--FREE TOUR -->
					<li><a href="index.php?page=game">Anonimous Try</a></li>					
				</ul>

		</main>
	</body>