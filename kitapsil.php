
<?php
include ("connect.php");
 
$ID = $_GET["id"];

$sql = "DELETE FROM kitaplar WHERE ID=$ID";

if (mysqli_query($baglan, $sql)) {
    header('Location: kitaplistele.php');
  } else {
    echo "Error deleting record: " . mysqli_error($baglan);
  }
?>