<?php
require_once '../config.php';
if(isset($_POST["id"]))
{
$record_id = intval($_POST['id']);  
$query2 = "DELETE FROM fiche_contact WHERE projetvideo_id = '".$record_id."'";
if(mysqli_query($db, $query2))
{
 echo 'Data Deleted';
}
 $query = "DELETE FROM projetvideo WHERE id = '".$record_id."'";
 if(mysqli_query($db, $query))
 {
  echo 'Data Deleted';
 }
}
?>