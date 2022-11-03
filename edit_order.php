<?php 
 error_reporting( error_reporting() & ~E_NOTICE );
 session_start();

    
        require_once('connection_uploadfile.php');
        if (isset($_REQUEST['update_id'])) {
            try {
                $id = $_REQUEST['update_id'];
                $select_stmt = $db->prepare('SELECT * FROM tbl_order WHERE order_id = :order_id');
                $select_stmt->bindParam(":order_id", $id);
                $select_stmt->execute();
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                

                $status = $_REQUEST['update_id'];
                if (empty($status)) {
                    $errorMsg = "Please Enter status";
                }
                if (!isset($errorMsg)) {
                    $update_stmt = $db->prepare("UPDATE tbl_order SET order_status = :order_status_up, WHERE order_id = :order_id");
                    $update_stmt->bindParam(':order_status_up', $status);
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
    <title>edit</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<?php
include ('menu_admin.php');

?>   
<div class="container text-center">
        <h1>status edit</h1>
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
            <label for="name" class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
                <input type="text" name="txt_status" class="form-control" placeholder="Enter status">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input type="submit" name="update_id" class="btn btn-primary" value="Update">
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