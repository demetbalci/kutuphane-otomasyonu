<?php

include("connect.php");

$id=$_GET["id"];

$sql="SELECT *FROM kitaplar WHERE ID=?";
$stmt= $baglan->prepare($sql);
$stmt->bind_param("i", $id);
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
      body{
          background-repeat: no-repeat;
        background-image: url("./image/library11.jpg");
        background-size: 200% 200%;
        
        }
  
        
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
          background-color: #279f97;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        
        input[type=submit]:hover {
          background-color: #2e9657;
        }
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
        
        input[type=submit]:hover {
          background-color: #2e9657;
        }
        body{
          background-color: #bb92af;
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
    <h3>KİTAP GÜNCELLE</h3>

<div>
    <form action="kitapS.php" method="post"  enctype="multipart/form-data"> 
    <input type="hidden" id="" name="id" value="<?php echo $row["ID"]?>"><br><br>

    <label>KİTAP RESMİ</label>
        <input type="file"  name="resim" value="<?php echo $row["kitap_resim"]?>"><br><br>
        
        <label for="kitap_adi">KİTAP ADI</label>
    <input type="text" id="" name="kitap_adi" value="<?php echo $row["kitap_adi"]?>"><br><br>     

    <label for="yazar_adi">YAZAR ADI</label>
    <input type="text" id="" name="yazar_adi" value="<?php echo $row["yazar_adi"]?>"><br><br>
    
    <label for="yayınevi">YAYINEVİ</label>
    <input type="text" id="" name="yayinevi" value="<?php echo $row["yayinevi"]?>">

    <label for="kitap_turu">KİTAP TÜRÜ</label>
    <input type="text" id="" name="kitap_turu" value="<?php echo $row["kitap_turu"]?>">
    
    <label for="sayfa_sayisi">SAYFA SAYISI  </label>
    <input type="number" id="" name="sayfa_sayisi" value="<?php echo $row["sayfa_sayisi"]?>"><br><br>
    
    <label for="basim_yili">BASIM YILI  </label>
    <input type="number" id="" name="basim_yili" value="<?php echo $row["basim_yili"]?>"><br><br>
    <label for="raf_no">RAF NO  </label>
    <input type="number" id="" name="raf_no" value="<?php echo $row["raf_no"]?>">
    <input type="submit" value="GÜNCELLE">
  </form>
</div>

</body>
</html>
</body>
</html>

