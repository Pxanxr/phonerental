<?php 

    require_once('connection_uploadfile.php');
    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $db->prepare('SELECT * FROM tbl_order WHERE order_id = :id');
            $select_stmt->bindParam(":id", $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
        try {
            $namelastname = $_REQUEST["name"]; 
            $address = $_REQUEST["address"];
            $email = $_REQUEST["email"];
            $phone = $_REQUEST["phone"];
            $bank = $_REQUEST["bank"];
            $banknum = $_REQUEST["banknum"];
            $imgbank = $_REQUEST["total"];
            $status = $_REQUEST["status"];
      
         if (!isset($errorMsg)) {
            $update_stmt = $db->prepare("UPDATE tbl_order SET namelastname = :name_up, address=:address_up, email=:email_up, phone=:phone_up,bank=:bank_up ,banknum=:banknum_up,imgbank=:total_up ,order_status=:status_up WHERE order_id = :order_id");
            $update_stmt->bindParam(':name_up', $namelastname);
            $update_stmt->bindParam(':address_up', $address);
            $update_stmt->bindParam(':email_up', $email);
            $update_stmt->bindParam(':phone_up', $phone);
            $update_stmt->bindParam(':bank_up', $bank);
            $update_stmt->bindParam(':banknum_up', $banknum);
            $update_stmt->bindParam(':total_up', $imgbank);
            $update_stmt->bindParam(':status_up', $status);
            $update_stmt->bindParam(':order_id', $id);
            if ($update_stmt->execute()) {
                $updateMsg = "File update successfully...";
                header("refresh:2;addmin_page1.php");
                }
             }
    
        } catch(PDOException $e) {
        $e->getMessage();
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    

    <div class="container text-center">
        <h1>Edit order</h1>
        <?php 
            if(isset($errorMsg)) {
        ?>
            <div class="alert alert-danger">
                <strong><?php echo $errorMsg; ?></strong>
            </div>
        <?php } ?>

        <?php 
            if(isset($updateMsg)) {
        ?>
            <div class="alert alert-success">
                <strong><?php echo $updateMsg; ?></strong>
            </div>
        <?php } ?>
        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label">Name/Lastname</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" value="<?php echo $namelastname; ?>">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label ">address</label>
            <div class="col-sm-9">
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label ">Phone number</label>
            <div class="col-sm-9">
                <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label ">E-mail</label>
            <div class="col-sm-9">
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label ">Bank</label>
            <div class="col-sm-9">
                <input type="text" name="bank" class="form-control" value="<?php echo $bank; ?>">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label ">Bank number</label>
            <div class="col-sm-9">
                <input type="text" name="banknum" class="form-control" value="<?php echo $banknum; ?>">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label ">Total</label>
            <div class="col-sm-9">
                <input type="text" name="total" class="form-control" value="<?php echo $imgbank; ?>">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label ">Status</label>
            <div class="col-sm-9">
                <input type="text" name="status" class="form-control" value="<?php echo $order_status; ?>">
            </div>
            </div>
        </div>
        <br><br>
        <div class="form-group">
            <div class="col-sm-12">
                <input type="submit" name="btn_update" class="btn btn-primary" value="Update">
                <a href="addmin_page1.php" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
