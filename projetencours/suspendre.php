<?php
require_once '../config.php';
require_once 'update.php';
if(isset($_POST["id"]))
{
    $record_id = intval($_POST['id']);  
    $query = "UPDATE projetencours SET etatprojet = 'suspendu' WHERE id = '".$record_id."'";
 if(mysqli_query($db, $query))
 {
    $message = "Changement d'etat du projet à Projet Suspendu";
    add_status($record_id, $message);
    echo 'Data suspendu';
 }
}
?>