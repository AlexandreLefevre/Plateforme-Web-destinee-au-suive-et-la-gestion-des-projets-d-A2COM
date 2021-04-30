<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "adeuxcom");
$columns = array('vente', 'projet','nom_utilisateur','type_de_site','facturation','valide25','graphisme');

$query = "SELECT * FROM projetencours";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE etatprojet = "En cours"
 AND (projet LIKE "%'.$_POST["search"]["value"].'%" 
 OR type_de_site LIKE "%'.$_POST["search"]["value"].'%" 
 OR graphisme LIKE "%'.$_POST["search"]["value"].'%"
 OR contenu LIKE "%'.$_POST["search"]["value"].'%"
 OR correction LIKE "%'.$_POST["search"]["value"].'%"
 OR nom_utilisateur LIKE "%'.$_POST["search"]["value"].'%"    
 )';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
  $styleprojet ='';
  switch($row["projet"]){
    case "BNI%" : 
      $styleprojet = 'style="color:green"';
      break;
    case "En cours" : 
      $styleprojet = 'style="color:orange"';
      break;
    default : 
      $styleprojet = '';
      break;
  }
  $stylegraphisme ='';
  switch($row["graphisme"]){
    case "Fini" : 
      $stylegraphisme = 'style="color:green"';
      break;
    case "En cours" : 
      $stylegraphisme = 'style="color:orange"';
      break;
    default : 
      $stylegraphisme = '';
      break;
  }
  $stylecontenu ='';
  switch($row["contenu"]){
    case "Fini" : 
      $stylecontenu  = 'style="color:green"';
      break;
    case "En cours" : 
      $stylecontenu  = 'style="color:orange"';
      break;
    default : 
      $stylecontenu  = '';
      break;
  }
  $stylecorrection ='';
  switch($row["correction"]){
    case "Fini" : 
      $stylecorrection  = 'style="color:green"';
      break;
    case "En cours" : 
      $stylecorrection  = 'style="color:orange"';
      break;
    default : 
      $stylecorrection  = '';
      break;
  }

  // $selectfacturation ='';
  // switch($row["facturation"]){
  //   case "0" : 
  //     $selectfacturation = '<select size="1" class="update" id="data5" data-id="'.$row["id"].'" data-column="facturation"><option value="0" selected>0%</option><option value="25">25%</option><option value="50">50%</option><option value="75">75% </option><option value="100">100%</option> </select>';
  //     break;
  //   case "25" : 
  //     $selectfacturation = '<select size="1"  class="update" id="data5" data-id="'.$row["id"].'" data-column="facturation"><option value="0">0%</option><option value="25" selected>25%</option><option value="50">50%</option><option value="75">75% </option><option value="100">100%</option> </select>';
  //     break;
  //   case "50" : 
  //     $selectfacturation = '<select size="1"  class="update" id="data5" data-id="'.$row["id"].'" data-column="facturation"><option value="0">0%</option><option value="25">25%</option><option value="50" selected>50%</option><option value="75">75% </option><option value="100">100%</option> </select>';
  //     break;
  //   case "75" : 
  //     $selectfacturation = '<select size="1" class="update" id="data5" data-id="'.$row["id"].'" data-column="facturation"><option value="0">0%</option><option value="25">25%</option><option value="50">50%</option><option value="75" selected>75% </option><option value="100">100%</option> </select>';
  //     break;
  //   case "100" : 
  //     $selectfacturation = '<select size="1" class="update" id="data5" data-id="'.$row["id"].'" data-column="facturation"><option value="0">0%</option><option value="25">25%</option><option value="50">50%</option><option value="75">75% </option><option value="100" selected>100%</option> </select>';
  //     break;
  //   default : 
  //     $selectfacturation = '';
  //     break;
  // }
 $sub_array = array();
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="vente">' . $row["vente"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="projet" '.$styleprojet.' >' . $row["projet"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="nom_utilisateur">' . $row["nom_utilisateur"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="type_de_site">' . $row["type_de_site"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="facturation">' . $row["facturation"] . '</div>';
 $sub_array[] = '<input class="update" type="checkbox" data-id="'.$row["id"].'" data-column="valide25">';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="graphisme" '.$stylegraphisme.' >' . $row["graphisme"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="facturation2">' . $row["facturation2"] . '</div>';
 $sub_array[] = '<input class="update" type="checkbox" data-id="'.$row["id"].'" data-column="valide50">';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="contenu" '.$stylecontenu.' >' . $row["contenu"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="facturation3">' . $row["facturation3"] . '</div>';
  $sub_array[] = '<input class="update" type="checkbox" data-id="'.$row["id"].'" data-column="valide75">';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="correction" '.$stylecorrection.' >' . $row["correction"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="facturation4">' . $row["facturation4"] . '</div>';
  $sub_array[] = '<input class="update" type="checkbox" data-id="'.$row["id"].'" data-column="valide100">';
  
 $sub_array[] = '<button type="button" data-target="#myModal'.$row["id"].'" role="button" data-toggle="modal" name="details" class="btn btn-success btn-xs success" id="'.$row["id"].'">Details</button>';
 $sub_array[] = '<button type="button" name="suspendre" class="btn btn-danger btn-xs suspendre" id="'.$row["id"].'">Suspendre</button>';
 $sub_array[] = '<button type="button" name="archiver" class="btn btn-warning btn-xs archiver" id="'.$row["id"].'">Archiver</button>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>';
 $data[] = $sub_array;
}
function get_all_data($connect)
{
 $query = "SELECT * FROM projetencours where etatprojet = 'corbeille'";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>