<?php
include("connect.php");
session_start();
$email = $_SESSION['kullanici_adi'];
$sql = "SELECT ka.ID as ID,u.ID as userId,k.kitap_adi AS kitap_adi, k.yazar_adi AS yazar_adi,k.yayinevi AS yayinevi,
ka.kitap_izin as durum,u.ad AS ad,u.soyad AS soyad,u.fakulte AS fakulte,u.bolum AS bolum,u.email AS email,u.telefon AS telefon
FROM kitap_odunc AS ka INNER JOIN kitaplar AS k ON ka.kitap_id=k.ID 
INNER JOIN uyeler AS u ON ka.uye_id=u.ID where u.email=?";
$stmt = $baglan->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
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


  <h2>ÖDÜNÇ KİTAPLAR</h2>
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
        <p>DURUM</p>
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
        <?php
        if ($row["durum"] == 1) : ?>
          <td>
            <p>Teslim Edilmemiş</p>
          </td>
        <?php else : ?>
          <td>
            <p>Teslim Edilmiş</p>
          </td>
        <?php endif; ?>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>