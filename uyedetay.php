<?php

include("connect.php");
session_start();
$id = $_GET["id"];

$sql = "SELECT *FROM uyeler WHERE ID=?";
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
       //*background-color:	#C0C0C0;*//
        
        
       
      }
      
   

  
      table {
  
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td,th{
  border: 1px solid #ddd;
  padding: 8px;
}
tr:hover {background-color: #ddd;}
tr:nth-child(even){background-color: #f2f2f2;}
p{
color:black;
}
 //*td:nth-child(even){background-color: #f2f2f2}*//
 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
 
 
}

tr:nth-child(even){background-color: #f2f2f2}
th {
  background-color: #7fa99b;
  color: white;
}
</style>
</head>
<body>

<?php if (isset($_SESSION['kullanici_adi']) || isset($_SESSION['sifre'])) : ?>
    
<h2>ÜYE DETAY</h2>
<a href="uyedetay.php" class="detay"></a>
<table>

  <tr>

  <th>ÜYE ADI</th>
    <th>ÜYE SOYADI</th>
    <th>FAKÜLTE</th>
    <th>BÖLÜM</th>
    <th>E MAİL</th>
    <th>TELEFON</th>
   
  </tr>
 



  
  
    
  
  
  <tr>                          
   
    <td><?php echo $row["ad"]?></td>
    <td><?php echo $row["soyad"]?></td>
    <td><?php echo $row["fakulte"]?></td>
    <td><?php echo $row["bolum"]?></td>
    <td><?php echo $row["email"]?></td>
    <td><?php echo $row["telefon"]?></td>
    

  
  </tr>
 
</table>
<?php else : ?>
    <?php header("location:login.php"); ?>
    <?php endif; ?>
</body>
</html>