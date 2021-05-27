<?php
require_once '../config.php';
if(isset($_POST["nom_utilisateur"], $_POST["type_de_site"]))
{
 $nom_utilisateur = mysqli_real_escape_string($db, $_POST["nom_utilisateur"]);
 $type_de_site = mysqli_real_escape_string($db, $_POST["type_de_site"]);
 $vente = $_POST["vente"];
 $projet = mysqli_real_escape_string($db, $_POST["projet"]);
 $facturation = mysqli_real_escape_string($db, $_POST["facturation"]);
 $graphisme = mysqli_real_escape_string($db, $_POST["graphisme"]);
 $contenu = mysqli_real_escape_string($db, $_POST["contenu"]);
 $correction = mysqli_real_escape_string($db, $_POST["correction"]);
 $facturation2 = mysqli_real_escape_string($db, $_POST["facturation2"]);
 $facturation3 = mysqli_real_escape_string($db, $_POST["facturation3"]);
 $facturation4 = mysqli_real_escape_string($db, $_POST["facturation4"]);
 $valide25 = $_POST["valide25"];
 $valide50 = $_POST["valide50"];
 $valide75 = $_POST["valide75"];
 $valide100 = $_POST["valide100"];


 $query = "INSERT INTO projetencours (nom_utilisateur, type_de_site, vente, facturation, graphisme, projet, contenu, correction, facturation2, facturation3, facturation4, valide25, valide50, valide75, valide100) 
 VALUES('$nom_utilisateur', '$type_de_site', '$vente', '$facturation', '$graphisme', '$projet', '$contenu', '$correction', '$facturation2', '$facturation3', '$facturation4', $valide25, $valide50, $valide75, $valide100)";
 echo($query);
 if(mysqli_query($db, $query))
 {
  echo 'Data Inserted';
 }

 $query2 = "INSERT INTO fiche_detailees (id,projetencours_id) VALUES('','".mysqli_insert_id($db)."')";
 if(mysqli_query($db, $query2))
 {
  echo 'Data Inserted';
 }
}
?>