<?php

include("connect.php");



$query="select *from uyeler";

$result=$baglan->query($query);

?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
<style>
   body {
     background-repeat: no-repeat;
        background-image: url("./image/image4.jpg");
        background-size: 300% 300%;
    
 
      }
      
       
table {
  
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td,  th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

 tr:hover {background-color: #ddd;}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #7fa99b;
  color: white;
}
h2 {
  font-family: Georgia, serif;
  font-size: 60px;
  color: black;
}

.detay {
  background-color: #50C878;
  color: white;
  padding: 0.3em 0em;
  text-decoration: none;
  text-transform: uppercase;
 
}
.ekle {
  float:right;
  background-color: #50C878;
  color: white;
  padding: 0.9em 1em;
  text-decoration: none;
  text-transform: uppercase;
  margin-bottom:10px;

}
.güncelle {
  background-color: #FFEA00;
  color: white;
  padding: 0.3em 1em;
  text-decoration: none;
  text-transform: uppercase;

}
.sil {
  background-color: #EE4B2B;
  color: white;
  padding: 0.3em 1em;
  text-decoration: none;
  text-transform: uppercase;
 
}
.Sec{
  
  background-color: #76448A;
  color: white;
  padding: 0.3em 1em;
  text-decoration: none;
  text-transform: uppercase;
 

}

</style>
</head>
<body>


<h2>ÜYE LİSTELEME SAYFASI</h2>
<a href="uyeekle.html" class="ekle">ÜYE EKLE</a>
<table>

  <tr>

  
  <th>ÜYE ADI</th>
    <th>ÜYE SOYADI</th>
    <th>FAKÜLTE</th>
    <th>BÖLÜM</th>
    <th>EMAİL</th>
    <th>TELEFON</th>
    <th>İŞLEM</th>
   
  </tr>
  <?php
  
  while($row=$result->fetch_assoc()){
    
  ?>
  <tr>

    <td><?php echo $row["ad"]?></td>
    <td><?php echo $row["soyad"]?></td>
    <td><?php echo $row["bolum"]?></td>
    <td><?php echo $row["fakulte"]?></td>
    <td><?php echo $row["email"]?></td>
    <td><?php echo $row["telefon"]?></td>
        <td>
      <a href="uyedetay.php?id=<?php echo $row["ID"]?>" class="detay">Detay</a>
     
      <a href="uyesil.php?id=<?php echo $row["ID"]?>" class="sil">Sil</a>
    </td> 
   </tr>
      
  <?php 
  }
  ?>
   
</table>

</body>
</html>