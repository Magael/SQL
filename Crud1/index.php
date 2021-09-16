<?php
    require "data.php";

    $clients=$bdd->query("SELECT * FROM clients ORDER BY lastName ASC");
    $shows=$bdd->query("SELECT * FROM shows ORDER BY title ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Colyseum" content="SQL training"/>

<title>Colyseum</title>
</head>
<body>
<h1>Colyseum</h1>
    <div class="clients">
        <h2>Clients</h2> 
            <?php foreach($clients->fetchAll()as $client){?>
            <p name="firstName">First name: <?php echo $client['firstName']?></p>
            <p name="lastName">Last name: <?php echo $client['lastName']?></p>
            <p name="birthDate">Birth Date: <?php echo $client['birthDate']?></p>
            <p name="card">Card: <?php if($client["card"]==0){echo "No";
                }else{
                    echo"Yes";
                }    ?></p>
            <p name="cardNumber">Card number: <?php if($client["card"]==0){echo " ";
                }else{
                    echo $client["cardNumber"];
                }    ?></p>
            <br>
            <?php }?>
    </div>
    <div class="shows">
        <h2>Shows</h2>
            <?php foreach($shows->fetchAll()as $show){?>
                <p name="title">Title: <?php echo $show['title']?></p>
                <p name="performer">Performer: <?php echo $show['performer']?></p>
                <p name="date">Date: <?php echo $show['date']?></p>
                <p name="duration">Duration: <?php echo $show['duration']?></p>
                <p name="startTime">Start time: <?php echo $show['startTime']?></p>
                <br>
            <?php }?>
    </div>


</body>
</html>