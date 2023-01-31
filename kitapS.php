
<?php   

include("connect.php");
$resim=$_FILES["resim"]["name"];
$target='kitap_resim/' .$resim;
move_uploaded_file($_FILES["resim"]["tmp_name"],$target);


$ID=$_POST["id"];

$kitap_adi=$_POST["kitap_adi"];
$yazar_adi=$_POST["yazar_adi"];
$yayinevi=$_POST["yayinevi"];
$kitap_turu=$_POST["kitap_turu"];
$sayfa_sayisi=$_POST["sayfa_sayisi"];
$basim_yili=$_POST["basim_yili"];
$raf_no=$_POST["raf_no"];
   
$sql =("UPDATE kitaplar SET kitap_adi=?,yazar_adi=?,yayinevi=?,kitap_turu=?,
  sayfa_sayisi=?, basim_yili=?, raf_no=?,kitap_resim=? WHERE ID=?") ;

$stmt= $baglan->prepare($sql);
$stmt->bind_param("ssssiiisi", $kitap_adi, $yazar_adi, $yayinevi,$kitap_turu,$sayfa_sayisi,$basim_yili ,$raf_no,$resim,$ID);
$stmt->execute();
$stmt->close();
$baglan->close();
header("Location:kitaplistele.php");


?>

