<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <style>
    .container {
      display: grid;
      grid-template-columns: auto auto;

    }

    .img {
      height: 100vh;
      background-image: url("./image/library.png");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .div1 {
      position: relative;
      margin-left: 30px;
      top: 20%;

    }

    form {

      border: 3px solid #f1f1f1;

    }

    /* Full-width inputs */
    input[type=text],
    input[type=password] {
      width: 80%;
      padding: 12px 20px;
      margin: 8px 0;
      display: block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    /* Set a style for all buttons */
    button {
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 20%;
    }

    /* Add a hover effect for buttons */
    button:hover {
      opacity: 0.8;
    }

    /* Extra style for the cancel button (red) */
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    /* Center the avatar image inside this container */
    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    /* Avatar image */
    img.avatar {
      width: 10%;
      border-radius: 50%;
    }

    /* Add padding to containers */
    .container-form {
      padding: 16px;
      padding-left: 25px;
    }

    /* The "Forgot password" text */
    span.psw {
      float: right;
      padding-top: 16px;
    }

    .oduncal {
      background-color: #2d399c;
      color: white;
      padding: 0.9em 1em;
      text-decoration: none;
      text-transform: uppercase;
    }


    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }
    }

    .alert {
      padding: 20px;
      background-color: #f44336;
      color: white;
    }

    .success {
      padding: 20px;
      background-color: #87ab69;
      color: white;
    }

    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .closebtn:hover {
      color: black;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="img">

    </div>

    <div style="background-color:#ffffff; opacity: .4; height: 100vh;">
      <?php if (isset($_SESSION["errorMessage"])) { ?>
        <div class="alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <strong>Hata!</strong> <?php echo $_SESSION["errorMessage"]; ?>
        </div>
      <?php } ?>
      <?php if (isset($_SESSION["successMessage"])) { ?>
        <div class="success">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <strong>Başarılı!</strong> <?php echo $_SESSION["successMessage"]; ?>
        </div>
      <?php } ?>
      <div class="div1">

        <form action="loginScript.php" method="post">
          <div class="imgcontainer">
            <img src="image/login.png" alt="Avatar" class="avatar">
          </div>

          <div class="container-form">
            <label for="email"><b>email</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
            <a href="uyeekle.php" class="oduncal">ÜYE OL</a>

        </form>
      </div>
    </div>
  </div>
  <?php if (isset($_SESSION["errorMessage"]) || isset($_SESSION["successMessage"])) {
    unset($_SESSION['errorMessage']);
    unset($_SESSION['successMessage']);
  } ?>
</body>

</html>