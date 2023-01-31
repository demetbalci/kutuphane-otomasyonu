<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    input[type=text],
    select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid rgb(183, 62, 64);
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit] {
      width: 100%;
      background-color: #a43c4a;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    body {
      background-color: #a38b9a;
    }

    input[type=submit]:hover {
      background-color: #2e9657;
    }

    div {
      width: 500px;
      height: 700px;
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
      margin: auto;
    }

    body {
      background-repeat: no-repeat;
      background-image: url("./image/library12.jpg");
      background-size: 200% 200%;

    }

    h3 {

      color: rgb(147, 17, 117);
      text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;

    }

    .alert {
      padding: 20px;
      height: 10px;
      background-color: #f44336;
      color: white;
    }
    
    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .closebtn:hover {
      color: black;
    }
  </style>

</head>

<body>

  <h3>ÜYE EKLE</h3>
  <?php if (isset($_SESSION["errorMessage"])) { ?>
    <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      <strong>Hata!</strong> <?php echo $_SESSION["errorMessage"]; ?>
    </div>
  <?php } ?>
  <div>
    <form action="uyeeklescript.php" method="post">

      <label for="uye_adi">ÜYE ADI</label>
      <input type="text" id="" name="uye_adi" placeholder="üye ismi"><br><br>

      <label for="uye_soyadi">ÜYE SOYADI </label>
      <input type="text" id="" name="uye_soyadi" placeholder="üye soyismi"><br> <br>

      <label for="fakulte">FAKÜLTE</label>
      <input type="text" id="" name="fakulte" placeholder="">

      <label for="bolum">BÖLÜM</label>
      <input type="text" id="" name="bolum" placeholder=" ">

      <label for="telefon">TELEFON </label>
      <input type="number" id="" name="telefon" placeholder=""><br><br>

      <label for="email">E-MAİL </label>
      <input type="text" id="" name="email" placeholder=""><br><br>

      <label for="telefon">ŞİFRE </label>
      <input type="password" id="" name="sifre" placeholder=""><br><br>

      <input type="submit" value="ÜYE OL">
    </form>
  </div>

</body>
<?php if (isset($_SESSION["errorMessage"]) || isset($_SESSION["successMessage"])) {
  unset($_SESSION['errorMessage']);
} ?>

</html>