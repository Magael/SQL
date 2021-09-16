<?php

include "data.php";
Auth();
 
$id= $_POST["id"];
    $form=$bdd->prepare('DELETE from hiking where id= ?');
    $form->execute([$id]);
    header("location:read.php");
?>