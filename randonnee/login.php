<?php

include "data.php";


// on teste si nos variables sont définies
if (isset($_POST['login']) && isset($_POST['pwd'])) {
    // On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
    $login = $bdd->prepare ("SELECT userName,userpwd FROM users Where userName=? and userpwd=?");
    $login->execute([$_POST["login"],sha1($_POST['pwd'])]);
    $users=$login->fetch();

	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
	if ($users["userName"] == $_POST['login'] && $users["userpwd"] == sha1($_POST['pwd'])) {
		// dans ce cas, tout est ok, on peut démarrer notre session

		// on la démarre :)
		session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['pwd'] = sha1($_POST['pwd']);

		// on redirige notre visiteur vers une page de notre section membre
		header ('location: read.php');
	}
	else {
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
		// puis on le redirige vers la page d'accueil
		header ('location: index.html');
	}
}
else {
	header("location: index.html");
}
?>