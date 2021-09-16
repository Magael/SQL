<?php

  include "data.php";
  Auth();
  
if(isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['distance'])&& isset($_POST['duration'])&& isset($_POST['height_difference'])&& isset($_POST['Available'])){ 
  $form=$bdd->prepare('INSERT into hiking (name, difficulty, distance, duration, height_difference,Available) values (?,?,?,?,?,?)');
  $form->execute([$_POST["name"],$_POST["difficulty"],$_POST["distance"],$_POST["duration"],$_POST["height_difference"], $_POST["Available"]]);
  echo '<script>alert("Randonnée bien ajoutée!")</script>';
}

 

    $resultat = $bdd->query('SELECT * FROM hiking');
 
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="randonnee" content="SQL training"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
<title>Randonnées</title>
</head>
<body>

<h1>Liste des randonnées</h1>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Difficulté</th>
          <th scope="col">Distance</th>
          <th scope="col">Duration</th>
          <th scope="col">Height Difference</th>
          <th scope="col">Available</th>
         <!-- <th>Action</th>-->
        </tr>
      </thead>
      <tbody>
          <?php foreach ($resultat->fetchAll()as $donnees){?>
        <tr>
          <td><a href="update.php?id=<?php echo $donnees['id']?>"><?php echo $donnees['name'];?> </td>
          <td><?php echo $donnees['difficulty'];?></td>
          <td><?php echo $donnees['distance'];?></td>
          <td><?php echo $donnees['duration'];?></td>
          <td><?php echo $donnees['height_difference'];?></td>
          <td><?php echo $donnees['Available'];?></td>
          <td>  <form method="post" action="delete.php">
              <input type="hidden" name="id" value= "<?php echo $donnees['id'];?>">
              <input type="submit" name="delete_submit" value="delete">
            </form>
            </td> 
        </tr>
         <?php }?>
      </tbody>
    </table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>
