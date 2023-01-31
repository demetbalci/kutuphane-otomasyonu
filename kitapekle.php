


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php   


include("connect.php");
$resim=$_FILES["kitap_resmi"]["name"];
$target='kitap_resim/' .$resim;
move_uploaded_file($_FILES["kitap_resmi"]["tmp_name"],$target);


$kitap_adi=$_POST["kitap_adi"];
$sayfa_sayisi=$_POST["sayfa_sayisi"];
$basim_yili=$_POST["basim_yili"];
$raf_no=$_POST["raf_no"];
$yazar_adi=$_POST["yazar_adi"];
$yayinevi=$_POST["yayinevi"];
$kitap_turu=$_POST["kitap_turu"];


$stmt = $baglan->prepare("INSERT INTO
 kitaplar (kitap_adi, sayfa_sayisi, basim_yili,raf_no,yazar_adi,yayinevi,kitap_turu,kitap_resim)
 VALUES (?, ?, ?, ?,?,?,?,?)");



$upper = strtoupper($kitap_turu);
$tur="SELECT *FROM  kitap_turu WHERE kitap_turu_adi=?";
$mt= $baglan->prepare($tur);
$mt->bind_param("s", $upper);
$mt->execute();
$result = $mt->get_result();
$rowcount=mysqli_num_rows($result);
$row=$result->fetch_assoc();
 if ($rowcount <1) 
 {
    $stm = $baglan->prepare("INSERT INTO kitap_turu (kitap_turu_adi) VALUES (?)");
    $stm->bind_param("s", $upper);
    $stm->execute();
    $stm->close();
 }


$stmt->bind_param("siiissss", $kitap_adi, $sayfa_sayisi, $basim_yili,$raf_no,$yazar_adi,$yayinevi,$kitap_turu,$resim);



$stmt->execute();
$stmt->close();

$baglan->close();
header("Location:kitaplistele.php");


?>
</body>
</html>