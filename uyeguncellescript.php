
<?php   
include("connect.php");



$email=$_POST["email"];


$uye_adi=$_POST["uye_adi"];
$uye_soyadi=$_POST["uye_soyadi"];
$fakulte=$_POST["fakulte"];
$bolum=$_POST["bolum"];
$email=$_POST["email"];
$telefon=$_POST["telefon"];
$sifre=$_POST["sifre"];

 
   
$sql =("UPDATE uyeler SET ad=?,soyad=?,fakulte=?,
 bolum=?, email=?, telefon=? WHERE email=?") ;

$query =("UPDATE login SET sifre=?,kullanici_adi=? WHERE  kullanici_adi=?") ;


$stmt= $baglan->prepare($sql);
$stmt->bind_param("sssssis", $uye_adi, $uye_soyadi, $fakulte,$bolum,$email ,$telefon,$email);

$st= $baglan->prepare($query);
$st->bind_param("sss",$sifre, $email ,$email);
$st->execute();
$st->close();
$stmt->execute();
$stmt->close();
$baglan->close();

header("Location:kullanicigiris.php");


?>
    