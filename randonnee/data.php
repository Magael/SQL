<?php
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=randonnee;charset=utf8', 'root');
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }
    function Auth(){
        // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
          session_start ();
      
          // On récupère nos variables de session
          if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
      
            // On teste pour voir si nos variables ont bien été enregistrées
            echo '<html>';
            echo '<head>';
            echo '<title>Page de notre section membre</title>';
            echo '</head>';
      
            echo '<body>';
            echo 'Welcome '.$_SESSION['login'].'.';
            echo '<br />';    
      
            
      
            // On affiche un lien pour fermer notre session
            echo '<a href="logout.php">Disconnect</a>';
          }
          else {
           header ('location:index.html');
          }
      }

?>