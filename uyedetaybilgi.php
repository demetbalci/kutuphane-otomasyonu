<?php

include("connect.php");

$id=$_GET["id"];
$sql="SELECT *FROM uyeler WHERE ID=?";
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
          background-color: #2E86C1 ;
       //*   background-repeat: no-repeat;
        background-image: url("./image/image4.jpg");*//
        background-size: 200% 200%;
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
    
    <h3>ÜYE  EKLE</h3>

<div>
   

    <form action="uyeS.php" method="post"  enctype="multipart/form-data"> 
    <input type="hidden" id="" name="id" value="<?php echo $row["ID"]?>"><br><br>

      <label for="uye_no">ÜYE NO </label>
      <input type="number" id="" name="uye_no" placeholder=""><br><br>

        <label for="uye_adi">ÜYE ADI</label>
        <input type="text" id="" name="uye_adi" placeholder="member name.."><br><br>
    <label for="uye_soyadi">ÜYE SOYADI </label>
    <input type="text" id="" name="uye_soyadi" placeholder="member surname.."><br> <br>

    <label for="fakulte">FAKÜLTE</label>
    <input type="text" id="" name="fakulte" placeholder="">
    
    <label for="bolum">BÖLÜM</label>
    <input type="text" id="" name="bolum" placeholder=" ">
    
    <label for="email">E-MAİL  </label>
    <input type="text" id="" name="email" placeholder=""><br><br>
    
    <label for="telefon">TELEFON  </label>
    <input type="number" id="" name="telefon" placeholder=""><br><br>
    

   
  
    <input type="submit" value="EKLE">
  </form>
</div>
    
</body>
</html>