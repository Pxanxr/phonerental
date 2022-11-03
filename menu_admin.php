<?php 

    session_start();

    if (!$_SESSION['userid']) {
        header("Location: user_page.php");
    } else 
    {

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Admin page</title>
  </head>
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
                  <a class="nav-link text-white" href="addmin_page1.php">Order<span class="sr-only">(current)</span></a>
                </li>
            
                  <a class="nav-link  text-white" href="index_type.php">Add type<span class="sr-only">(current)</span></a>
                  </a>
                  <a class="nav-link  text-white" href="index_add.php">Add Product<span class="sr-only">(current)</span></a>
                  </a>
              </ul>
              </div>
              
              <ul>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hello,<?php echo $_SESSION["user"]; ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="logout.php">Sign out</a>
                    </div>
                </li>
                </ul>
            </div>
          </nav>
      </div>
    </div>
    
</div>
</html>
<?php } ?>
