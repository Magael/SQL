<?php

include "data.php";
Auth();

	$id= $_GET["id"];
	if(isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['distance'])&& isset($_POST['duration'])&& isset($_POST['height_difference'])&& isset($_POST['Available'])){ 
		$form=$bdd->prepare('update hiking set name=?, difficulty=?, distance=?, duration=?, height_difference=?,Available=? where id= ?');
		$form->execute([$_POST["name"],$_POST["difficulty"],$_POST["distance"],$_POST["duration"],$_POST["height_difference"],$_POST["Available"], $id]);
		echo '<script>alert("Randonnée bien modifiée!")</script>';
	}
	
	
	$resultat = $bdd->prepare('SELECT * FROM hiking where id=?');
	$resultat->execute ([$id]);
	$donnees=$resultat->fetch();
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/randonnee/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $donnees['name'];?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
			<option <?php if($donnees['difficulty']=="très facile"){?>selected<?php }?>value="très facile">Très facile</option>
				<option <?php if($donnees['difficulty']=="facile"){?>selected<?php }?>value="facile">Facile</option>
				<option <?php if($donnees['difficulty']=="moyen"){?>selected<?php }?>value="moyen">Moyen</option>
				<option <?php if($donnees['difficulty']=="difficile"){?>selected<?php }?>value="difficile">Difficile</option>
				<option <?php if($donnees['difficulty']=="très difficile"){?>selected<?php }?>value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $donnees['distance'];?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo $donnees['duration'];?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $donnees['height_difference'];?>">
		</div>
		<div>
			<label for="Available">Valable</label>
			<input type="text" name="Available" value="<?php echo $donnees['Available'];?>">
		</div>
		<button type="submit" name="mod">Envoyer</button>
	</form>
</body>
</html>
