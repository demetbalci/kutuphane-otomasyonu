
<?php
include ("connect.php");
 
$ID = $_GET["id"];

$sql = "DELETE FROM uyeler WHERE ID=$ID";

if (mysqli_query($baglan, $sql)) {
    header('Location: uyelistele.php');
  } else {
    echo "Error deleting record: " . mysqli_error($baglan);
  }
?>