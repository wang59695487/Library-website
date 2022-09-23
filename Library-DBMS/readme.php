<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Library Administration System">
  <meta name="author" content="Wang Jun">
  <link rel="shortcut icon" href="/images/favicon.ico">

  <title>Library Administration System by WangJun</title>

  <!-- Loading Bootstrap -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Loading Flat UI -->
  <link href="css/flat-ui.css" rel="stylesheet">

  <link rel="shortcut icon" href="images/favicon.ico">

</head>
<body>

<!-- Fixed navbar -->
<?php include "navbar.php" ?>
<div class="container">
  <h2 class="demo-headline" style="color:#BA55D3">Welcome to WangJun's Library!</h2>
  <div class="demo-row">
    <div class="demo-title">
      <h6>&nbsp;</h6>
      <h4>Readme Document</h4>
    </div>
    <h7>&nbsp;</h7>
    <div class="demo-content">
      <p>
        1)This library management system project is for Introduction to Database, ZJU, 2020
      </p>
      <p>
        2)Implemented with PHP, Bootstrap(Flat UI), Apache, HTML, Mysql.
      </p>
      <p>
        3)Sql files are in the database, and you can use it to build a database which you need to connect it to the website.
      </p>
      <p>
        4)connectvar.php is used to connected mysql (your database) to the php website.
      </p>
      <p>
        5)There are mainly 5 functions of the system: search, borrow, return, add, card.
      </p>
      <br/>
      <p class="mbl">
        <a button class="btn btn-hg btn-primary" href="main.php">Return to Index</a>
      </p>
    </div>
  </div>

  <!-- page footer-->
  <?php include "footer.php"; ?>

  <!-- Load JS here for greater good =============================-->
  <script src="js/jquery-1.8.3.min.js"></script>
  <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="js/jquery.ui.touch-punch.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-select.js"></script>
  <script src="js/bootstrap-switch.js"></script>
  <script src="js/flatui-checkbox.js"></script>
  <script src="js/flatui-radio.js"></script>
  <script src="js/jquery.tagsinput.js"></script>
  <script src="js/jquery.placeholder.js"></script>
</body>
</html>
