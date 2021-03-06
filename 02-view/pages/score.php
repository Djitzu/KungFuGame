<?php include_once('03-controler/request-score.php'); ?>

		<main>
			<h2>This is the scoring page</h1>
			<h4>Let's see who have the bigger !</h4>
			
			<!--AFFICHE CE TABLEAU QUE SI L'UTILISATEUR EST CONNECTÉ-->
			<?php if(!empty($_SESSION)): ?>
				<table>
						<caption>Your 5 best score !</caption>
					<tr>
						<th>Date</th>
						<th>Score</th>
					</tr>
					
					<?php foreach($allUserScore as $userScore) : ?>
						<tr>
							<td><?= date('d/m/Y', strtotime($userScore['date'])) ?></td>
							<td><?= $userScore['score'] ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			<?php endif; ?>

		
			<!--AFFICHAGE DES 5 MEULLEURS SCORES-->
			<table>
				<caption>Best Score of all time !</caption>
				<tr>
					<th>Player</th>
					<th>Date</th>
					<th>Score</th>
				</tr>
				
				<?php foreach($allScore as $bestScore) : ?>
					<tr>
						<td><?= $bestScore['pseudo'] ?></td>
						<td><?= date('d/m/Y', strtotime($bestScore['date'])) ?></td>
						<td><?= $bestScore['score'] ?></td>
	
					</tr>
				<?php endforeach; ?>
			</table>
			
			
			<!--SCORE DE LA SEMAINE-->
			<table>
				<caption>Heroes of the Week !</caption>
				<tr>
					<th>Player</th>
					<th>Date</th>
					<th>Score</th>
				</tr>
				<?php foreach($allWeekScore as $weekScore): ?>
					<tr>
						<td><?= $weekScore['pseudo']?></td>
						<td><?= date('d/m/Y', strtotime($weekScore['date'])) ?></td>
						<td><?= $weekScore['score']?></td>
					</tr>
				<?php endforeach; ?>
			</table>

		</main>
	</body>