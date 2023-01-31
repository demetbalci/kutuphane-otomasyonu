<?php
include("connect.php");

session_start();

$kullanici_adi=$_POST['uname'];
$sifre=$_POST['psw'];


$sql="SELECT *FROM login WHERE kullanici_adi=? && sifre=?";
$stmt= $baglan->prepare($sql);
$stmt->bind_param("ss", $kullanici_adi,$sifre);
$stmt->execute();
$result = $stmt->get_result();
$rowcount=mysqli_num_rows($result);
$row=$result->fetch_assoc();

if($rowcount>0)
{

    $_SESSION['kullanici_adi']=$kullanici_adi;
    $_SESSION['sifre']=$sifre;
    if($row["rol"]==1){
        header("location:index.php");
    }
    else
    {
        header("location:kullanicigiris.php");
    }
    
}
else{
    header("location:login.php");
    $_SESSION["errorMessage"]="kullanıcı adı veya parola yanlış.";

}
?>