<?php 

    require_once('connection_uploadfile.php');

    if (isset($_REQUEST['btn_insert'])) {
        try {
        $name = $_REQUEST["name"]; 
        $address = $_REQUEST["address"];
        $email = $_REQUEST["email"];
        $phone = $_REQUEST["phone"];
        $bank = $_REQUEST["bank"];
        $banknum = $_REQUEST["banknum"];
        $imgbank = $_REQUEST["total"];
       // $status = $_POST["status"]
       if (empty($name)) {
        $errorMsg = "Please enter data";
        }
    if (!isset($errorMsg)) {
        $insert_stmt = $db->prepare('INSERT INTO tbl_order(namelastname,address,email,phone,bank,banknum,imgbank)VALUES(:fname,:faddress,
        :femail,:fphone,:fbank,:fbanknum,:fimgbank)');
        $insert_stmt->bindParam(':fname', $name);
        $insert_stmt->bindParam(':faddress', $address);
        $insert_stmt->bindParam(':femail', $email);
        $insert_stmt->bindParam(':fphone', $phone);
        $insert_stmt->bindParam(':fbank', $bank);
        $insert_stmt->bindParam(':fbanknum', $banknum);
        $insert_stmt->bindParam(':fimgbank', $imgbank);
        
        if ($insert_stmt->execute()) {
            $insertMsg = "File Uploaded successfully...";
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
    <title>confirm product</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    
<div class="container text-center">
        <h1>Confirm Products</h1>
        <?php 
            if(isset($errorMsg)) {
        ?>
            <div class="alert alert-danger">
                <strong><?php echo $errorMsg; ?></strong>
            </div>
        <?php } ?>

        <?php 
            if(isset($insertMsg)) {
        ?>
            <div class="alert alert-success">
                <strong><?php echo $insertMsg; ?></strong>
            </div>
        <?php } ?>

        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label">Name/Lastname</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" placeholder="Enter Name/Lastname">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label ">address</label>
            <div class="col-sm-9">
                <input type="text" name="address" class="form-control" placeholder="Enter address">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label ">Phone number</label>
            <div class="col-sm-9">
                <input type="text" name="phone" class="form-control" placeholder="Enter phone number">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label ">E-mail</label>
            <div class="col-sm-9">
                <input type="text" name="email" class="form-control" placeholder="Enter email">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label ">Bank</label>
            <div class="col-sm-9">
                <input type="text" name="bank" class="form-control" placeholder="Enter bank">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label ">Bank number</label>
            <div class="col-sm-9">
                <input type="text" name="banknum" class="form-control" placeholder="Enter bank number">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label ">Total</label>
            <div class="col-sm-9">
                <input type="text" name="total" class="form-control" placeholder="Enter total">
            </div>
            </div>
        </div>
        <br><br>
        <div class="form-group">
            <div class="col-sm-12">
                <input type="submit" name="btn_insert" class="btn btn-success" value="Confirm">
                <a href="user_page.php" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
    </div>

</body>
</html>
if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Confirm succesfuly');";
	echo "window.location = 'user_page.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to confirm again');";
        echo "window.location = 'paymentfrom.php'; ";
	echo "</script>";
        }