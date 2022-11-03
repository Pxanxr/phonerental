<?php 
include('condb.php');
$query = "
SELECT t.*,COUNT(p.id) as ptotal 
FROM tbl_type as t
LEFT JOIN tbl_file as p ON t.id=p.detail 
GROUP BY t.id" 
or die("Error:" . mysqli_error());
$result = mysqli_query($condb, $query);

?>
    <!-- Start Top menu -->
    <div class="container">
      <div class="row">
        <div class="col col-sm-12 col-md-12">
          <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #000000;">
            <a class="nav-link disabled text-white" href="#" tabindex="-1" aria-disabled="true">
              <img src="img/logo.png" width="229px" height="59px" class="d-inline-block align-top" alt="" loading="lazy"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <!--menu-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link text-white" href="index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Smart Phone
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                    <li><a class="dropdown-item" href="index.php?act=showbytype&id=<?php echo $row["id"];?>&name=<?php echo $row["name"];?>">
                    <?php echo $row["name"];?>
                    (<?php echo $row["ptotal"];?>)</a></li>
                    
                    <?php } ?>
                  </ul>
                </li>
                <li class="nav-item active">
                  <a class="nav-link text-white" href="cart.php">Shopping basket<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Help
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="rental.php">ขั้นตอนการเช่า</a>
                    <a class="dropdown-item" href="payfor.php">ขั้นตอนการชำระเงิน</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="About.php">ติดต่อเรา</a>
                  </div>
                </li>
                <li class="nav-item active">
                  <a class="nav-link text-white" href="About.php">About<span class="sr-only">(current)</span></a>
                </li>
              </ul>
              <ul class="navbar-nav "align="right">
                <li class="nav-item active" >
                  <a class="nav-link text-white" href="indexlogin.php">Login/Register<span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
            <!--menu-->
          </nav>
        </div>
      </div>
    </div>
    
    <!-- End Top menu -->