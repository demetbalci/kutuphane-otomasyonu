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
        .duz-cerceve {
            border: 1px solid black;
            width: 1700px;
            height: 1700px;
            background-repeat: no-repeat;
            background-image: url("./image/library9.jpg");
            background-size: 100% 100%;
        }

        .image {

            display: block;
            width: 30%;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        a {
            text-decoration: none;

        }

        .çıkış {
            float: left;
            background-color: #EE4B2B;
            color: white;
            padding: 0.9em 1em;
            text-decoration: none;
            text-transform: uppercase;
            position: fixed;
            top: -40px;
            right: 15px;
            width: 60px;
            height: 30px;
            margin: 130px;
            text-align: left;
        }
    </style>
</head>

<body>

    <?php if(isset($_SESSION['kullanici_adi']) || isset($_SESSION['sifre'])):?>
        <div class="duz-cerceve">
            <div>
                <a href="logout.php" class="çıkış">çıkış</a>

                <div>

                    </a>
                </div>
                <div>
                    <div style="background-color: rgb(170, 151, 189); height: 700px; width: 400px; float: -100px; margin: 300px; padding: -1000px; top: -50px;position: relative;top: -100px; ">
                        <p style="position: center;">
                        <p>ÜYE İŞLEMLERİ</p>
                        <a href="uyelistele.php " style="text-decoration: none;">
                            <p style="text-align: center; font-size: 20px; font-weight: bold; color: rgb(3, 3, 3); font-weight: 300px; font-style: oblique;"> ÜYE LİSTELE</p>
                            <img class="image" src="./image/insert1.png" alt="" width="60px" height="60px"><br> <br>



                       
          
                        </a>
                    </div>
                    </a>
                    <div>
                        <div style="background-color: rgb(187, 215, 191); height: 700px; width: 400px; float: -20px; margin: 1000px; padding: -400px; top: -10px;position: relative;top: -1790px; ">
                            <p style="position: center;font-weight: 300px; color: rgb(18, 14, 14); margin: 20px;">KÜTÜPHANE İŞLEMLERİ</p>
                            <a href="kitaplistele.php" style="text-decoration: none;">
                                <p style="text-align: center; font-size: 20px; font-weight: bold; color: rgb(3, 3, 3); font-weight: 300px; font-style: oblique;"> KİTAP LİSTELE</p>
                                <img class="image" src="./image/book.png" alt="" width="60px" height="60px">
                            </a>
                            <a href="odunc_kitap_listele.php" style="text-decoration: none;">
                                <p style="text-align: center; font-size: 20px; font-weight: bold; color: rgb(3, 3, 3); font-weight: 300px; font-style: oblique;"> ÖDÜNÇ KİTAPLAR</p>
                                <img class="image" src="./image/book.png" alt="" width="60px" height="60px">
                            </a>
                            <a href="kitapekle.html" style="text-decoration: none;">
                                <p style="text-align: center; font-size: 20px; font-weight: bold; color: rgb(3, 3, 3); font-weight: 300px; font-style: oblique; ">KİTAP EKLE</p>
                                <img class="image" src="./image/addBook.jpg" alt="" width="60px" height="60px">
                            </a>
                            <a href="kitapguncelle.php" style="text-decoration: none;">
                                <p style="text-align: center; font-size: 20px;  font-weight: bold; color: rgb(3, 3, 3); font-weight: 300px; font-style: oblique;"> KİTAP GÜNCELLE</p>
                                <img class="image" src="./image/update.png" alt="" width="80px" height="80px">
     

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php else : ?>
    <?php header("location:login.php"); ?>
    <?php endif; ?>
   

    </div>
    </div>

</body>

</html>