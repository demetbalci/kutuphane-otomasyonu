<?php

echo "Connected successfully";

session_start();
include("connect.php");


$uye_adi=$_POST["uye_adi"];
$uye_soyadi=$_POST["uye_soyadi"];
$fakulte=$_POST["fakulte"];
$bolum=$_POST["bolum"];
$email=$_POST["email"];
$telefon=$_POST["telefon"];
$kullaniciadi=$_POST["kullanici_adi"];
$sifre=$_POST["sifre"];


$query = "SELECT *FROM uyeler WHERE email=?";
$mt = $baglan->prepare($query);
$mt->bind_param("s", $email);
$mt->execute();
$result = $mt->get_result();
$rowcount = mysqli_num_rows($result);

if($rowcount<1){ 
$stmt = $baglan->prepare("INSERT INTO uyeler(ad, soyad, fakulte,bolum,email,telefon)
 VALUES (?, ?, ?, ?,?,?)");
$stmt->bind_param("sssssi", $uye_adi, $uye_soyadi, $fakulte,$bolum,$email,$telefon);
$stmt->execute();
$stmt->close();

$rol=0;
$st = $baglan->prepare("INSERT INTO login(kullanici_adi,sifre,rol)
 VALUES (?, ?,?)");

$st->bind_param("ssi",$email,$sifre,$rol);
$st->execute();
$st->close();
$baglan->close();
$_SESSION["successMessage"]="Üyeliğiniz başarılı bir şekilde oluşturuldu";
header("Location:login.php");
}
else
{
    $_SESSION["errorMessage"]="Bu Kullanıcı Adı Daha Önce Kullanılmış";
    header("Location:uyeekle.php");
}
