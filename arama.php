

<?php

include("connect.php");

$query="select *from kitaplar";

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
        background-size: 700% 700%;
        //*background:#ececec;*//
 
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



</style>
</head>
<body>

<table>
  <tr>
  <th> <p>KİTAP RESMİ</p> </th>
  <th> <p>KİTAP ADI</p> </th>
    <th><p>YAZAR</p> </th>
    <th> <p> YAYINEVİ</p></th>
  
  </tr>
 
  <?php
  include("connect.php");
  if(isset($_POST["arama"])){
    $aramasorgusu=$_POST["arama"];
 $query="SELECT * FROM kitaplar WHERE kitap_adi LIKE  ('%$aramasorgusu%')OR yazar_adi LIKE ('%$aramasorgusu%')OR yayinevi LIKE ('%$aramasorgusu%')";
 $result=$baglan->query($query);
 while($arama=$result->fetch_assoc()){

   
 

  ?>
  <?php
  
  ?>
  <tr>                          
    <td>
      <?php
       $img=$arama["kitap_resim"];
       echo "<img src='./kitap_resim/".$img."' width='50' height='60'>";?>
      </td>
     
    <td><?php echo $arama["kitap_adi"]?></td>
    <td> <?php echo $arama["yazar_adi"]?> </td>
    <td><?php echo $arama["yayinevi"]?></td>
  


  </tr>
  <?php 
     } 
    }
  ?>
</table>

</body>
</html>