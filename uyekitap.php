<?php

include("connect.php");
if(isset($_GET["id"])){

    $kitap_id=$_GET["id"]; 
}

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
        background-size: 400% 400%;
 
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
  background-color:#7fa99b;
  color: white;
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


<table>

  <tr>

 
  <th>ÜYE ADI</th>
  <th>SOYADI</th>
 <th>İŞLEM</th>
 <th>DURUM</th>
  </tr>
  <?php
  while($row=$result->fetch_assoc()){
    
  ?>
  
  <tr>                      
    
    
    <td><?php echo $row["ad"]?></td>
    <td><?php echo $row["soyad"]?></td>
    <td><?php echo $row["kitap_izin"]?></td>
    
    <td>
    <?php if($row['kitap_izin']==1):?>
   <?php echo "önce kitabı teslim etmelisiniz" ;    ?>
  
   <?php else: ?> 
       <a href="kitapOdunc.php?id=<?php echo $row["ID"]?>&kitap_id=<?php echo $kitap_id?>" class="Sec">Seç</a>
      
      <?php endif; ?>
    
    </td> 
   </tr>
 
 <?php     }
   ?>
 
   
</table>

</body>
</html>