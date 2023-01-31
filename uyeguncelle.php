<?php

include("connect.php");
session_start();
$email= $_SESSION['kullanici_adi'];
$sql="SELECT *FROM uyeler WHERE email=?";
$stmt= $baglan->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row=$result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type=text], select {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid rgb(195, 157, 174);
          border-radius: 4px;
          box-sizing: border-box;
        }
        
        input[type=submit] {
          width: 100%;
          background-color: #9f277d;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        body{
          background-color: #a38b9a;
        }
        
        input[type=submit]:hover {
          background-color: #2e9657;
        }
        
        div {
            width: 500px;
            height: 500px;
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
          margin: auto;
        }
        h3 {
           
  color: rgb(147, 17, 117);
  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;

        }
        </style>
    
</head>
<body>
<?php if (isset($_SESSION['kullanici_adi']) || isset($_SESSION['sifre'])) : ?> 
    <h3>ÜYE  GÜNCELLE</h3>

<div>
    <form action="uyeguncellescript.php" method="post"> 

        <label for="uye_adi">ÜYE ADI</label>
        <input type="text" id="" name="uye_adi" value="<?php echo $row["ad"] ?>"><br><br>
    <label for="uye_soyadi">ÜYE SOYADI </label>
    <input type="text" id="" name="uye_soyadi" value="<?php echo $row["soyad"] ?>"><br> <br>

    <label for="fakulte">FAKÜLTE</label>
    <input type="text" id="" name="fakulte" value="<?php echo $row["fakulte"] ?>">
    
    <label for="bolum">BÖLÜM</label>
    <input type="text" id="" name="bolum" value="<?php echo $row["bolum"] ?>">
    <label for="telefon">TELEFON  </label>
    <input type="number" id="" name="telefon" value="<?php echo $row["telefon"] ?>"><br><br>
    <label for="email">E-MAİL  </label>
    <input type="text" id="" name="email" value="<?php echo $row["email"] ?>"><br><br>
    <label for="telefon">ŞİFRE  </label>
    <input type="password" id="" name="sifre" placeholder=""><br><br>
    
    

   
  
    <input type="submit" value="GÜNCELLE">
  </form>
</div>
<?php else : ?>
    <?php header("location:login.php"); ?>
    <?php endif; ?>
</body>
</html>
