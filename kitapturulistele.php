<?php

include("connect.php");
session_start();
$kitap_turu = $_GET["kitap_turu"];

$sql = "SELECT *FROM kitaplar WHERE kitap_turu=?";
$stmt = $baglan->prepare($sql);
$stmt->bind_param("s", $kitap_turu);
$stmt->execute();
$result = $stmt->get_result();
$rowcount = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <style>
    body {
      background-repeat: no-repeat;
      background-image: url("./image/image4.jpg");
      background-size: 200% 200%;


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

    .detay {
      background-color: #50C878;
      color: white;
      padding: 0.9em 1em;
      text-decoration: none;
      text-transform: uppercase;
    }

    .ekle {
      float: right;
      background-color: #50C878;
      color: white;
      padding: 0.9em 1em;
      text-decoration: none;
      text-transform: uppercase;
      margin-bottom: 15px;
    }

    .güncelle {
      background-color: #FFEA00;
      color: white;
      padding: 0.9em 1em;
      text-decoration: none;
      text-transform: uppercase;
    }

    .sil {
      background-color: #EE4B2B;
      color: white;
      padding: 0.9em 1em;
      text-decoration: none;
      text-transform: uppercase;
    }

    .odunc {
      background-color: #76448A;
      color: white;
      padding: 0.9em 1em;
      text-decoration: none;
      text-transform: uppercase;
    }

    .oduncal {
      background-color: #FB2576;
      color: white;
      padding: 0.9em 1em;
      text-decoration: none;
      text-transform: uppercase;
    }

    .alert {
      padding: 20px;
      background-color: #FFEA00;
      color: black;
    }
  </style>
</head>

<body>


  <h2>KİTAP TÜRÜ LİSTELEME SAYFASI</h2>

  <table>

    <?php if ($rowcount > 0) : ?>
      <tr>

        <th>
          <p>KİTAP RESMİ</p>
        </th>
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
          <p> KİTAP TÜRÜ</p>
        </th>
        <th>
          <p>SAYFA SAYISI</p>
        </th>
        <th>
          <p>BASIM YILI</p>
        </th>
        <th>
          <p>RAF NO</p>
        </th>
      </tr>



      <?php

      while ($row = $result->fetch_assoc()) {

      ?>

        <tr>
          <td>
            <?php
            $img = $row["kitap_resim"];
            echo "<img src='./kitap_resim/" . $img . "' width='50' height='60'>"; ?>
          </td>

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
            <p><?php echo $row["kitap_turu"] ?></p>
          </td>
          <td>
            <p><?php echo $row["sayfa_sayisi"] ?></p>
          </td>
          <td>
            <p><?php echo $row["basim_yili"] ?></p>
          </td>
          <td>
            <p><?php echo $row["raf_no"] ?></p>
          </td>

        </tr>
      <?php
      }
      ?>
    <?php else : ?>
      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>UYARI!</strong>
        ARADIĞIN KATEGORİDE KİTAP BULUNAMADI.
      </div>
    <?php endif; ?>
  </table>

</body>

</html>