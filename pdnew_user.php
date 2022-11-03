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
<!-- start header product -->
<div class="container">
      <div class="row">
        <div class="col-12">
          <br>
          <div class="alert alert-success" role="alert">
            สินค้า
          </div>
        </div>
      </div>
    </div>
    <!-- start header product -->
    <!-- start product -->
    
      <div class="container">  
      <div class="row">
      <?php
      $id = $_GET['id'];
      $query_product = "
      SELECT * FROM tbl_file as p
      INNER JOIN tbl_type as t
      ON p.detail = t.id
      WHERE p.detail = $id
      ORDER BY p.id DESC";
      $result_pro = mysqli_query($condb, $query_product) 
      or die("Error in query:$query_product" . mysqli_error());
       
        
        ?>
        <?php foreach ($result_pro as $row_pro ) {
           require_once('connection_uploadfile.php');
           $select_stmt = $db->prepare('SELECT * FROM tbl_file ORDER BY id DESC'); 
           $select_stmt->execute(); 
           ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)); { ?>
    <div class="col-12 col-sm-6 col-md-3">
          <div class="card" style="width: 100%;">
          <td><img src="upload/<?php echo $row_pro['image']; ?>" width="200px" height="250px" alt=""></td>
            <div class="card-body">
              <h5 class="card-title">
              ค่าบริการเช่าโทรศัพท์มือถือ
              <td><?php echo $row_pro['name_pro']; ?></td>
              <br>
              รายเดือนเพียง
              <td><?php echo $row_pro['price']; ?></td>
                บาท/เดือน 
              </h5>

              <a href="cart.php?id=<?php echo $row['id']; ?>&act=add" 
              class= "btn btn-primary">add to cart</a> 
              
            </div>
          </div>
    </div>
        <br>
        <?php } ?>
        <?php } ?>
        <br>
  </div>
</div>
