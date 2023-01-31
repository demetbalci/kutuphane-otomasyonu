<?php

include("connect.php");
session_start();

$query = "select *from kitap_turu";

$result = $baglan->query($query);

?>
<!doctype html>
<html>

<head>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8">
  <title>KÜTÜPHANE OTOMASYON</title>
  <style>
    body,
    h1,
    ul,
    li {
      margin: 0;
      padding: 0;
    }



    body {
      background: url(image/image1.jpg) #252525;
      font-family: sans-serif;
      width: 1500px;
      height: 1500px;
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .sayfa {
      width: 950px;
      margin: 50px auto;
    }

    #baslik {
      float: left;
      font-size: 1.2em;
      color: white;
      text-decoration: none;
    }

    #menu {
      float: right;
      list-style: none;
      margin-top: 1em;
    }

    #menu li {
      float: left;

    }

    #menu li a {
      color: white;
      text-decoration: none;
      margin: 5px;
      padding: 10px 20px;
    }

    #menu a:hover {
      background: #444;
      border-radius: 15px;
    }

    .orta {
      margin-top: 15px;
      background: #333;

    }

    .orta-sol {
      float: left;
      width: 450px;
    }


    .orta-sag {
      float: left;
      margin: 15px;
      width: 470px;
      color: #bbb;
    }

    .alt {
      background: #555;
      padding: 20px;
      text-align: center;
      color: #fff;
    }

    .alt a {
      color: #fff;
    }

    .temizle {
      clear: both;
    }

    * {
      box-sizing: border-box;
    }

    form.example input[type=text] {
      padding: 10px;
      font-size: 17px;
      border: 1px solid grey;
      float: left;
      width: 80%;
      background: #f1f1f1;
    }

    form.example button {
      float: left;
      width: 20%;
      padding: 10px;
      background: #d48f16;
      color: white;
      font-size: 17px;
      border: 1px solid grey;
      border-left: none;
      cursor: pointer;
    }

    form.example button:hover {
      background: #cc6415;
    }

    form.example::after {
      content: "";
      clear: both;
      display: table;
    }

   

    ul {
      text-align: left;
      display: inline;
      margin: 0;
      padding: 15px 4px 17px 0;
      list-style: none;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
    }

    ul li {
      font: bold 12px/18px sans-serif;
      display: inline-block;
      margin-right: -4px;
      position: relative;
      padding: 15px 20px;
      background: #fff;
      cursor: pointer;
      transition: all 0.2s;
    }

    ul li:hover {
      background: #555;
      color: #fff;
    }

    ul li ul {
      padding: 0;
      position: absolute;
      top: 48px;
      left: 0;
      width: 150px;
      box-shadow: none;
      display: none;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.2s;
    }

    ul li ul li {
      background: #555;
      display: block;
      color: #fff;
      text-shadow: 0 -1px 0 #000;
    }

    ul li ul li:hover {
      background: #666;
    }

    ul li:hover ul {
      display: block;
      opacity: 1;
      visibility: visible;
    }

    .bilgilerim {
      float: right;
      background-color: #FFEA00;
      color: white;
      padding: 0.9em 1em;
      text-decoration: none;
      text-transform: uppercase;
      margin-bottom: 15px;
    }

    .çıkış {
      float: right;
      background-color: #EE4B2B;
      color: white;
      padding: 0.9em 1em;
      text-decoration: none;
      text-transform: uppercase;
      margin-bottom: 15px;
    }
    .odunc {
      float: right;
      background-color: #50C878;
      color: white;
      padding: 0.9em 1em;
      text-decoration: none;
      text-transform: uppercase;
      margin-bottom: 15px;
    }
  </style>

</head>

<body>


  <?php if (isset($_SESSION['kullanici_adi']) || isset($_SESSION['sifre'])) : ?>
    <div class="sayfa">
      <div class="ust">
        <a id="baslik" href="#">
          <h1>KÜTÜPHANE OTOMASYONU</h1>
          <a href="uyeguncelle.php" class="bilgilerim">Bilgilerim</a>
          <a href="logout.php" class="çıkış">çıkış</a>
          <a href="kitaplarim.php" class="odunc">ödünç kitaplar</a>

        </a>

        <ul id="menu">
          <form class="example" action="arama.php" method="POST">
            <input type="text" placeholder="arama yap" required name="arama">
            <button type="submit"><i class="fa fa-search"></i></button>

          </form>

          <ul>
            <li>Anasayfa</li>
            <li>Hakkımızda</li>
            <li>
              KİTAPLAR
              <ul>
                <?php

                while ($row = $result->fetch_assoc()) {

                ?>
                  <a href="kitapturulistele.php?kitap_turu=<?php echo $row["kitap_turu_adi"] ?>">
                    <li><?php echo $row["kitap_turu_adi"] ?></li>
                  </a>

                <?php
                }
                ?>

              </ul>
            </li>
            <li>İletişim
              <ul>

                <li>0537 768 67 56</li>
              </ul>

            </li>
          </ul>

        </ul>
        <div class="temizle"></div>
      </div>
      <div class="orta">
        <div class="orta-sol">
          <img src="image/kitap.jpg">
          <div class="card">

            <h1></h1>


          </div>
        </div>
        <div class="orta-sag">
          <h1>HOŞGELDİNİZ</h1>
          <p>

            Özellikle çocukların kitap okuma alışkanlıkları, küçük yaşlarda başlamalıdır. Geleceğin yetişkinleri olacak
            çocukların, daha verimli bir insan olabilmesi için, kitap okuma alışkanlığının kazanılması gerekir.
            Çok kitap okuyan kişi, güzel konuşmasını ve yazmasını bilen kişidir. Kelime dağarcığı geniş, kendini ifade
            etme becerisi gelişmiş olan kişilerdir.




          </p>
          <p>
            KİTAPLAR UYGARLIĞA YOL GÖSTEREN IŞIKLARDIR.
          </p>
        </div>
        <div class="temizle"></div>
      </div>
      <div class="alt">
        <td>

        </td>
        <p>

        <p>

        </p>

      </div>
    </div>
  <?php else : ?>
    <?php header("location:login.php"); ?>
  <?php endif; ?>
</body>



