<?php

include("connect.php");
session_start();
$query = "SELECT ka.ID as ID,u.ID as userId,k.kitap_adi AS kitap_adi, k.yazar_adi AS yazar_adi,k.yayinevi AS yayinevi,
u.ad AS ad,u.soyad AS soyad,u.fakulte AS fakulte,u.bolum AS bolum,u.email AS email,u.telefon AS telefon
FROM kitap_odunc AS ka INNER JOIN kitaplar AS k ON ka.kitap_id=k.ID 
INNER JOIN uyeler AS u ON ka.uye_id=u.ID where ka.kitap_izin=1";

$result = $baglan->query($query);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <style>
    body {
      background-repeat: no-repeat;
      background-image: url("./image/image4.jpg");
      background-size: 400% 400%;

    }


    table {

      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }


    td,
    th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }

    th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #7fa99b;
      color: white;
    }

    .oduncal {
      background-color: #FB2576;
      color: white;
      padding: 0.9em 1em;
      text-decoration: none;
      text-transform: uppercase;
    }
  </style>
</head>

<body>


  <h2>ÖDÜNÇ KİTAP LİSTELEME SAYFASI</h2>
  <?php if (isset($_SESSION['kullanici_adi']) || isset($_SESSION['sifre'])) : ?>
    <table>

      <tr>

        <th>
          <p>KİTAP ADI</p>
        </th>
        <th>
          <p>YAZAR</p>
        </th>
        <th>
          <p> YAYINEVİ</p>
        </th>
        <th>
          <p>ÜYE ADI-SOYADI</p>
        </th>
        <th>
          <p>FAKÜLTE-BÖLÜM</p>
        </th>
        <th>
          <p>ÜYE EMAİL</p>
        </th>
        <th>
          <p>ÜYE TELEFON</p>
        </th>
        <th>
          <p>İŞLEM</p>
        </th>
      </tr>



      <?php

      while ($row = $result->fetch_assoc()) {

      ?>

        <tr>
          <td>
            <p><?php echo $row["kitap_adi"] ?></p>
          </td>
          <td>
            <p><?php echo $row["yazar_adi"] ?></p>
          </td>
          <td>
            <p><?php echo $row["yayinevi"] ?></p>
          </td>
          <td>
            <p><?php echo $row["ad"] ?> <?php echo $row["soyad"] ?></p>
          </td>
          <td>
            <p><?php echo $row["fakulte"] ?> <?php echo $row["bolum"] ?></p>
          </td>
          <td>
            <p><?php echo $row["email"] ?></p>
          </td>
          <td>
            <p><?php echo $row["telefon"] ?></p>
          </td>
          <td>
            <a href="kitapteslimal.php?id=<?php echo $row["ID"] ?>&&userID=<?php echo $row["userId"] ?>" class="oduncal">TESLİM AL</a>


          </td>
        </tr>
      <?php
      }
      ?>
    </table>
  <?php else : ?>
    <?php header("location:login.php"); ?>
  <?php endif; ?>
</body>

</html>