
<?php   
include("connect.php");

$ID=$_GET["id"];
$userId=$_GET["userID"];
$kitap_izin=0;
$teslim_tarih=date("Y-m-d");
   
$sql =("UPDATE kitap_odunc SET kitap_izin=?,teslim_tarih=? WHERE ID=?") ;
$query =("UPDATE uyeler SET kitap_izin=? WHERE ID=?") ;

$stmt= $baglan->prepare($sql);
$stmt->bind_param("isi", $kitap_izin,$teslim_tarih,$ID);

$st= $baglan->prepare($query);
$st->bind_param("ii", $kitap_izin,$userId);

$st->execute();
$st->close();

$stmt->execute();
$stmt->close();
$baglan->close();
header("Location:index.php");
?>

