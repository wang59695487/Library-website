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
        <div class="col-sm-12 page-header" align="left">
          <h2 class="demo-headline" style="color:#00BFFF"><!--#1ABC9C-->
            Search &nbsp; Book</h2>
        </div>
    </div>
    <div class="container">
      <form method="get" action="search.php">
          <div class="panel panel-default">
            <div class="panel-body">
               <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 column">
                      <!-- <span class="input-group-lg"> -->
                        <select name="select_by">
                          <option value="all">Select By1</option>
                          <option value="all">All</option>
                          <option value="bid">Book ID</option>
                          <option value="bname">Book Name</option>
                          <option value="category">Category</option>
                          <option value="publisher">Publisher</option>
                          <option value="author">Author</option>
                          <option value="year">Year</option>
                          <option value="price">Price</option>
                        </select>
                      <select name="select_by2">
                        <option value="all">Select By2</option>
                        <option value="all">All</option>
                        <option value="bid">Book ID</option>
                        <option value="bname">Book Name</option>
                        <option value="category">Category</option>
                        <option value="publisher">Publisher</option>
                        <option value="author">Author</option>
                        <option value="year">Year</option>
                        <option value="price">Price</option>
                      </select>
                        <select name="order_by">
                          <option value="bname">Order By</option>
                          <option value="bname">All</option>
                          <option value="bid">Book ID</option>
                          <option value="bname">Book Name</option>
                          <option value="publisher">Publisher</option>
                          <option value="year">Year</option>
                          <option value="price">Price</option>
                        </select>
                      <!-- </span> -->
                    </div>
                    <div class="col-md-7 column">
                        <div class="col-md-12 column">
                        <input class="form-control" type="text" name="keyword" placeholder="Keyword"></div>
                       <div class="col-md-12 column"></div>
                      <div class="col-md-12 column"></div><div class="col-md-12 column"></div><div class="col-md-12 column"></div><div class="col-md-12 column"></div><div class="col-md-12 column"></div><div class="col-md-12 column"></div>
                      <div class="col-md-12 column"></div>
                      <div class="col-md-12 column">
                        <input class="form-control" type="text" name="keyword2" placeholder="Keyword"></div>
                      <div class="col-md-12 column"></div><div class="col-md-12 column"></div><div class="col-md-12 column"></div><div class="col-md-12 column"></div><div class="col-md-12 column"></div><div class="col-md-12 column"></div>
                      <div class="col-md-12 column"></div>
                      <div class="col-md-12 column"></div>
                      <div class="col-md-12 column"></div>
                      <div class="col-md-6 column">
                          <div class="input-group">
                            <span class="input-group-addon">From</span>
                            <input type="text" class="form-control" name="lower" placeholder="the lower bound" />
                          </div>
                        </div>
                        <div class="col-md-6 column">
                          <div class="input-group">
                            <span class="input-group-addon">To</span>
                            <input type="text" class="form-control" name="upper" placeholder="the upper bound" />
                          </div>
                        </div>
                      </span>
                    </div>
                    <div class="col-md-2 column">

                      <button type="submit" name="submit" class="btn btn-inverse btn-wide">Search</button>
                      <!-- <div class="col-md-2 column"><br /></div> -->
                      <button type="reset" class="btn btn-default btn-wide">Reset</button>
                    </div>

                  </div>
               </div>
           </div>
               </div>
            </div>
          </div>
      </form>

      <?php
          if (isset($_GET["submit"]))
          {
            include "connectvar.php";
            $select_by=$_GET["select_by"];
            $select_by2=$_GET["select_by2"];
            $order_by=$_GET["order_by"];
            $lower=$_GET["lower"];
            $upper=$_GET["upper"];
            $keyword=$_GET["keyword"];
            $keyword2=$_GET["keyword2"];
            if(($keyword) and !($keyword2)) {
              if (!($lower | $upper)) {
                if (!($keyword)) $sql = "SELECT * FROM book ORDER BY $order_by;"; //没有keyword
                else {
                  if ($select_by == "all") {
                    $sql1 = "SELECT * FROM book WHERE bname like '%$keyword%' ORDER BY $order_by;";
                    $sql2 = "SELECT * FROM book WHERE bid like '%$keyword%' ORDER BY $order_by;";
                    $sql3 = "SELECT * FROM book WHERE category  like '%$keyword%' ORDER BY $order_by;";
                    $sql4 = "SELECT * FROM book WHERE publisher like '%$keyword%' ORDER BY $order_by;";
                    $sql5 = "SELECT * FROM book WHERE author like '%$keyword%' ORDER BY $order_by;";
                    $sql6 = "SELECT * FROM book WHERE year like '%$keyword%' ORDER BY $order_by;";
                    $sql7 = "SELECT * FROM book WHERE price like '%$keyword%' ORDER BY $order_by;";
                    if ($num1 = mysqli_num_rows(mysqli_query($con, $sql1))) $sql = $sql1;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql2))) $sql = $sql2;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql3))) $sql = $sql3;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql4))) $sql = $sql4;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql5))) $sql = $sql5;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql6))) $sql = $sql6;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql7))) $sql = $sql7;

                  }
                  else {
                    $sql = "SELECT * FROM book WHERE $select_by like '%$keyword%' ORDER BY $order_by;";
                  } //有keyword
                }
              }
              else {
                if (!($keyword)) $sql = "SELECT * FROM book ORDER BY $order_by;"; //没有keyword
                else {
                  if ($select_by == "all") {
                    $sql1 = "SELECT * FROM book WHERE bname like '%$keyword%' and $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";
                    $sql2 = "SELECT * FROM book WHERE bid like '%$keyword%' and   $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";
                    $sql3 = "SELECT * FROM book WHERE category  like '%$keyword%' and $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";
                    $sql4 = "SELECT * FROM book WHERE publisher like '%$keyword%' and $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";
                    $sql5 = "SELECT * FROM book WHERE author like '%$keyword%'  and $order_by <= $upper AND $order_by >= $lower  ORDER BY $order_by;";
                    $sql6 = "SELECT * FROM book WHERE year like '%$keyword%'  and  $order_by <= $upper AND $order_by >= $lower  ORDER BY $order_by;";
                    $sql7 = "SELECT * FROM book WHERE price like '%$keyword%'  and $order_by <= $upper AND $order_by >= $lower  ORDER BY $order_by;";
                    if ($num1 = mysqli_num_rows(mysqli_query($con, $sql1))) $sql = $sql1;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql2))) $sql = $sql2;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql3))) $sql = $sql3;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql4))) $sql = $sql4;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql5))) $sql = $sql5;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql6))) $sql = $sql6;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql7))) $sql = $sql7;

                  }
                  else {
                    $sql = "SELECT * FROM book WHERE $select_by like '%$keyword%' and  $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";
                  } //有keyword
                }
                // echo "have order ".$lower." ".$upper." ";
              }

              $arr = mysqli_query($con, $sql);
            }
            else if($keyword2 and !($keyword)) {
              $keyword = $keyword2;
              $select_by=$select_by2;
              if (!($lower | $upper)) {
                if (!($keyword)) $sql = "SELECT * FROM book ORDER BY $order_by;"; //没有keyword
                else {
                  if ($select_by == "all") {
                    $sql1 = "SELECT * FROM book WHERE bname like '%$keyword%' ORDER BY $order_by;";
                    $sql2 = "SELECT * FROM book WHERE bid like '%$keyword%' ORDER BY $order_by;";
                    $sql3 = "SELECT * FROM book WHERE category  like '%$keyword%' ORDER BY $order_by;";
                    $sql4 = "SELECT * FROM book WHERE publisher like '%$keyword%' ORDER BY $order_by;";
                    $sql5 = "SELECT * FROM book WHERE author like '%$keyword%' ORDER BY $order_by;";
                    $sql6 = "SELECT * FROM book WHERE year like '%$keyword%' ORDER BY $order_by;";
                    $sql7 = "SELECT * FROM book WHERE price like '%$keyword%' ORDER BY $order_by;";
                    if ($num1 = mysqli_num_rows(mysqli_query($con, $sql1))) $sql = $sql1;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql2))) $sql = $sql2;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql3))) $sql = $sql3;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql4))) $sql = $sql4;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql5))) $sql = $sql5;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql6))) $sql = $sql6;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql7))) $sql = $sql7;

                  } else {
                    $sql = "SELECT * FROM book WHERE $select_by like '%$keyword%' ORDER BY $order_by;";
                  } //有keyword
                }
              } else {
                if (!($keyword)) $sql = "SELECT * FROM book ORDER BY $order_by;"; //没有keyword
                else {
                  if ($select_by == "all") {
                    $sql1 = "SELECT * FROM book WHERE bname like '%$keyword%' and $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";
                    $sql2 = "SELECT * FROM book WHERE bid like '%$keyword%' and   $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";
                    $sql3 = "SELECT * FROM book WHERE category  like '%$keyword%' and $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";
                    $sql4 = "SELECT * FROM book WHERE publisher like '%$keyword%' and $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";
                    $sql5 = "SELECT * FROM book WHERE author like '%$keyword%'  and $order_by <= $upper AND $order_by >= $lower  ORDER BY $order_by;";
                    $sql6 = "SELECT * FROM book WHERE year like '%$keyword%'  and  $order_by <= $upper AND $order_by >= $lower  ORDER BY $order_by;";
                    $sql7 = "SELECT * FROM book WHERE price like '%$keyword%'  and $order_by <= $upper AND $order_by >= $lower  ORDER BY $order_by;";
                    if ($num1 = mysqli_num_rows(mysqli_query($con, $sql1))) $sql = $sql1;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql2))) $sql = $sql2;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql3))) $sql = $sql3;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql4))) $sql = $sql4;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql5))) $sql = $sql5;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql6))) $sql = $sql6;
                    elseif ($num1 = mysqli_num_rows(mysqli_query($con, $sql7))) $sql = $sql7;

                  }
                  else {
                    $sql = "SELECT * FROM book WHERE $select_by like '%$keyword%' and  $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";
                  } //有keyword
                }
                // echo "have order ".$lower." ".$upper." ";
              }

              $arr = mysqli_query($con, $sql);
            }
            else if($keyword2 and $keyword) {
                if (!($lower | $upper)) {
                    if ($select_by == "all" and $select_by2 !="all") {
                      $sql = "SELECT * FROM book WHERE $select_by2 like '%$keyword2%' ORDER BY $order_by;";
                    } //有keyword
                    if ($select_by!="all" and $select_by2 == 'all') {
                      $sql = "SELECT * FROM book WHERE $select_by like '%$keyword%' ORDER BY $order_by;";
                    } //有keyword
                    if($select_by != "all" and $select_by2 != 'all'){
                      $sql = "SELECT * FROM book WHERE ($select_by like '%$keyword%' and $select_by2 like '%$keyword2%') ORDER BY $order_by;";
                  }
                }
                else {
                  if ($select_by == "all" and $select_by2 !="all") {
                    $sql = "SELECT * FROM book WHERE $select_by2 like '%$keyword2%' $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";
                  } //有keyword
                  if ($select_by!="all" and $select_by2 == 'all') {
                    $sql = "SELECT * FROM book WHERE $select_by like '%$keyword%' $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";
                  } //有keyword
                  if($select_by != "all" and $select_by2 != 'all'){
                    $sql = "SELECT * FROM book WHERE ($select_by like '%$keyword%' and $select_by2 like '%$keyword2%') $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";
                  }

                }

                $arr = mysqli_query($con, $sql);
            }
            else if(!$keyword2 and !$keyword) {
              if (!($lower | $upper)) {
                 $sql = "SELECT * FROM book ORDER BY $order_by;";
              }
              else {

                  if(!$lower){
                    $sql = "SELECT * FROM book  where $order_by <= $upper  ORDER BY $order_by;";
                  }
                  elseif (!$upper){
                    $sql = "SELECT * FROM book  where $order_by >= $lower ORDER BY $order_by;";

                  }
                  else{
                  $sql = "SELECT * FROM book  where $order_by <= $upper AND $order_by >= $lower ORDER BY $order_by;";}
                }


              $arr = mysqli_query($con, $sql);
            }
            if($arr)
            {
              echo "<div class='container'>";
              echo "<div class='panel panel-info'>";
              echo "<div class='panel panel-heading' align='center'>Search Result</div>";
              // echo "<div class='panel panel-body>";
              echo '<table class="table table-striped">';
              echo '<tr>';
              echo  "<td width='2%' align='left' >ID</th>";
              echo  "<td width='3%' align='left' >Category</th>";
              echo  "<td width='33%' align='left' >&nbsp;&nbsp;Name</th>";
              echo  "<td width='29%' align='left' >Publisher</th>";
              echo  "<td width='3%' align='left' >Year</th>";
              echo  "<td width='15%' align='left' >Author</th>";
              echo  "<td width='3%' align='left' >Price</th>";
              echo  "<td width='3%' align='left' >Total</th>";
              echo  "<td width='3%' align='left' >Stock</th>";
              echo  "<td width='6%' align='left' >Last Return</th>";
              echo '</tr>';
              while($val=mysqli_fetch_row($arr))
              {
                 echo "<tr >";
                  for($i=0;$i<count($val);$i++)
                  {
                          echo "<td align='left'>".$val[$i]."</td>";
                  }
                  echo "</tr>";
              }
              echo "</table></div></div></div>";
            }
            else echo "sql failed.".mysqli_errno($con)." ".mysqli_error($con)."";
          }
      ?>

    </div>
    <!-- page footer-->
    <?php include "footer.php"; ?>
    <!-- Load JS here for greater good =============================-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script> $("select").selectpicker({style: 'btn-inverse btn-wide',menuStyle: 'dropdown-inverse'})</script>
  </body>
</html>
