<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=weather-app;charset=utf8', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
if(isset($_POST['ville']) && isset($_POST['haut']) && isset($_POST['bas'])){ 
  $form=$bdd->prepare('insert into météo (ville, haut, bas) values (?,?,?)');
  $form->execute([$_POST["ville"],$_POST["haut"],$_POST["bas"]]);
}
if(!empty($_POST["delete_submit"]) && !empty($_POST["ville"]) && !empty($_POST["check"])){
  $form=$bdd->prepare('delete from météo where ville= ? or ville= " "');
  $form->execute([$_POST["ville"]]);
}
$resultat = $bdd->query('SELECT * FROM météo');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="weather-app" content="SQL training"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Weather App</title>
</head>
<body>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Ville</th>
          <th scope="col">Haut</th>
          <th scope="col">Bas</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach ($resultat->fetchAll()as $donnee){?>
        <tr>
          <td><?php echo $donnee['ville'];?> </td>
          <td><?php echo $donnee['haut'];?></td>
          <td><?php echo $donnee['bas'];?></td>
          <td>
          <form method="post" action="">
              <input type="checkbox" class="box" name="check">
              <input type="hidden" name="ville" value= "<?php echo $donnee['ville'];?>">
              <input type="submit" name="delete_submit" value="delete">
            </form>
          </td> 
        </tr>
         <?php }?>
      </tbody>
    </table>
    <br>
    <form method="post" action="">
      <div class="mb-3">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville" style = width:250px>
      </div>
      <div class="mb-3">
        <label for="haut" class="form-label">Haut</label>
        <input type="number" class="form-control" id="haut" name="haut" style = width:250px>
      </div>
      <div class="mb-3">
        <label for="bas" class="form-label">Bas</label>
        <input type="number" class="form-control" id="bas" name="bas"style = width:250px>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>

