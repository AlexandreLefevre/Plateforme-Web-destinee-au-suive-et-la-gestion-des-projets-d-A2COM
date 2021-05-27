<?php
require_once 'config.php';

session_start();

if(isset($_POST['username']) && isset($_POST['password']))
{
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    $admin = mysqli_real_escape_string($db,htmlspecialchars($_POST['admin']));
    
    if($username !== "" && $password !== "")
    {
        $hash = password_hash($password,PASSWORD_DEFAULT);

        $requete_1 = $bdd->query("SELECT * FROM user where nom_utilisateur = '".$username."'");
        $user = array();

      while ($donnees = $requete_1->fetch()) {
        $user[] = array('username' => $donnees['nom_utilisateur'], 'admin' => $donnees['Admin'], 'mot_de_passe' => $donnees['mot_de_passe']);
}
        if(password_verify($password, $user[0]['mot_de_passe'])) // nom d'utilisateur et mot de passe correctes
        {
         session_name($username);
           $_SESSION['username'] = $username;
           $_SESSION['Admin'] = $user[0]['admin'];
           if($user[0]['admin']=='admin'){
            header('Location: Inscription.php');
           }
           elseif($user[0]['admin']=='deleted'){
            header('Location: login.php?erreur=1');
           }
           else{
           header('Location: dashboard/dashboard.php');
           }
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>