<?php
 try
 {
     // On se connecte à MySQL
     $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root');
 }
 catch(Exception $e)
 {
     // En cas d'erreur, on affiche un message et on arrête tout
         die('Erreur : '.$e->getMessage());
 }
 function clients(){
    if(isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['birthDate'])&& isset($_POST['card'])&& isset($_POST['cardnumber'])&& isset($_POST['cardtype'])){ 
        $clients=$bdd->prepare('INSERT into clients (lastName, firstName,birthDate, card, cardnumber) values (?,?,?,?,?)');
        $clients->execute([$_POST["lastname"],$_POST["firstname"],$_POST["birthDate"],$_POST["card"],$_POST["cardnumber"]]);
    }
 }
 function cards(){
    if(isset($_POST['cardnumber'])&& isset($_POST['cardtype'])){
        $card=$bdd->prepare('INSERT INTO cards (cardNumber,cardTypesId) values (?,?)');
        $card->execute([$_POST["cardnumber"],$_POST["cardtype"]]);
    }
 }
 function shows(){
    if(isset($_POST['title'])&& isset($_POST['performer'])&& isset($_POST['date'])&& isset($_POST['showtype'])&& isset($_POST['showgenre'])&& isset($_POST['duration'])&& isset($_POST['starttime'])){
        $shows=$bdd->prepare('INSERT INTO shows (title,performer,date,showTypesId,firstGenresId,secondGenreId,duration,startTime) values (?,?,?,?,?,?,?,?)');
        $shows->execute([$_POST["title"],$_POST["performer"],$_POST["date"],$_POST["showtype"],$_POST["showgenre"],$_POST["duration"],$_POST["starttime"]]);
    }
}
?>