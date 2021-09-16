<?php
    require "data.php";
    clients();
    cards();
    shows();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="CRUD2" content="SQL practice"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="/path/to/tailwind.css" rel="stylesheet">
<title>Colyseum</title>
</head>
<body>
    <h1>Please fill the form</h1>
    <div class="clients">
        <h2>Clients</h2>

            <form method="post" action="">
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname">
                    <br>
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname">
                    <br>
                    <label for="birthDate">Birth Date:</label>
                    <input type="date" name="birthDate">
                    <br>
                    <label for="card">Card:</label>
                    <input type="radio" name="card" value="yes">
                    <label for="yes">Yes</label>
                    <input type="radio" name="card" value="no">
                    <label for="no">No</label>
                    <br>
                    <label for="cardnumber">Card Number:</label>
                    <input type="text" name="cardnumber">
                    <br>
                    <br>
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </form>
    </div>
    <div class="cards">
        <h2>Cards</h2>
            <form method="post" action="">
                <label for="cardnumber">Card Number:</label>
                <input type="text" name="cardnumber">
                <br>
                <label for="cardtype">Card Type:</label>
                <input type="text" name="cardtype">
                <br>
                <br>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </form> 
    </div>
    <div class="shows">
        <h2>Shows</h2>
            <form method="post" action="">
                <label for="title">Title:</label>
                <input type="text" name="title">
                <br>
                <label for="performer">Performer:</label>
                <input type="text" name="performer">
                <br>
                <label for="date">Date:</label>
                <input type="date" name="date">
                <br>
                <label for="showtype">Show Type:</label>
                <!--insert select--><input type="date" name="date">
                <br>
                <label for="showgenre">Show genre:</label>
                <!--insert select-->
                <br>
                <label for="duration">Duration:</label>
                <input type="time" name="duration">
                <br>
                <label for="startime">Start Time:</label>
                <input type="time" name="starttime">
                <br>
                <br>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </form> 

    </div>

    


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>