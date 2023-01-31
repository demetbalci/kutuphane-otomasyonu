<?php

include("connect.php");
session_start();
$id = $_GET["id"];

$sql = "SELECT *FROM kitaplar WHERE ID=?";
$stmt = $baglan->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
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

    tr:hover {
        background-color: #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    p {
        color: black;
    }

    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;


    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    th {
        background-color: #7fa99b;
        color: white;
    }
    </style>
</head>

<body>


    <?php if (isset($_SESSION['kullanici_adi']) || isset($_SESSION['sifre'])) : ?>
    <h2>KİTAP DETAY</h2>
    <a href="kitapdetay.php" class="detay"></a>
    <table>

        <tr>


            <th>KİTAP ADI</th>
            <th>YAZAR</th>
            <th>YAYINEVİ</th>
            <th>KİTAP TÜRÜ</th>
            <th>SAYFA SAYISI</th>
            <th>BASIM YILI</th>
            <th>RAF NO</th>

        </tr>


        <tr>
            <td><?php echo $row["kitap_adi"] ?></td>
            <td><?php echo $row["yazar_adi"] ?></td>
            <td><?php echo $row["yayinevi"] ?></td>
            <td><?php echo $row["kitap_turu"] ?></td>
            <td><?php echo $row["sayfa_sayisi"] ?></td>
            <td><?php echo $row["basim_yili"] ?></td>
            <td><?php echo $row["raf_no"] ?></td>
        </tr>
    </table>
    <?php else : ?>
    <?php header("location:login.php"); ?>
    <?php endif; ?>

</body>

</html>