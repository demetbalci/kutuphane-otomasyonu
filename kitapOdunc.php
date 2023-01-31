<?php

if(isset($_GET['kitap_id'])) {
    $kitap_id=$_GET['kitap_id'];
}
    include("connect.php");
    $stmt = $baglan->prepare("INSERT INTO kitap_odunc (kitap_id,uye_id, verilen_tarih,kitap_izin) VALUES (?, ?, ?, ?)");
    
    
    $kitap_id=$_GET["kitap_id"];
    $uye_id=$_GET["id"];
    $verilen_tarih=date("Y-m-d");
    $durum=1;
    $kitap_izin=1; 
    $stmt->bind_param("iisi",$kitap_id,$uye_id, $verilen_tarih,$kitap_izin);
    $stmt->execute();
    
    $update =("UPDATE kitaplar SET durum=? WHERE ID=?") ;
    $st= $baglan->prepare($update);
    $st->bind_param("ii", $durum, $kitap_id);
    $st->execute();
    $st->close();
    


    $updateUye =("UPDATE uyeler SET kitap_izin=? WHERE ID=?") ;
    $stm= $baglan->prepare($updateUye);
    $stm->bind_param("ii", $kitap_izin, $uye_id);
    $stm->execute();
    $stm->close();
    



    $baglan->close();
    header("Location:index.php");
    
    echo "ekleme işlemi başarılı";
    
    
    
    ?>
