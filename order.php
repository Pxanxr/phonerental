
<?php 
    error_reporting( error_reporting() & ~E_NOTICE );
    session_start();

    
        require_once('connection_uploadfile.php');

    if (isset($_REQUEST['delete_id'])) {
        $id = $_REQUEST['delete_id'];

        $select_stmt = $db->prepare('SELECT * FROM tbl_order WHERE order_id = :order_id');
        $select_stmt->bindParam(':order_id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        
        $delete_stmt = $db->prepare('DELETE FROM tbl_order WHERE order_id = :order_id');
        $delete_stmt->bindParam(':order_id', $id);
        $delete_stmt->execute();

        header("Location: addmin_page1.php");
    }

?>
<main class="col-md-12 ml-sm-auto col-lg-12 px-md-5 py-10">
                <nav aria-label="breadcrumb">
                </nav>
                <div class="container text-center">
        <h1>Oder</h1>
<br>
       
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Name</td>
                    <td>address</td>
                    <td>phone</td>
                    <td>email</td>
                    <td>bank</td>
                    <td>bank number</td>
                    <td>total</td>
                    <td>status</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>

            <tbody>
                <?php 
                $i=0;
                
                    $select_stmt = $db->prepare('SELECT * FROM tbl_order'); 
                    $select_stmt->execute();

                    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $i += 1; ?></td>
                        <td><?php echo $row['namelastname']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['bank']; ?></td>
                        <td><?php echo $row['banknum']; ?></td> 
                        <td><?php echo $row['imgbank']; ?></td> 
                        <td><?php echo $row['order_status'];?></td>
                        <td><a href="1.php?update_id=<?php echo $row['order_id']; ?>" class="btn btn-warning">Edit</a></td>                        
                        <td><a href="?delete_id=<?php echo $row['order_id']; ?>" class="btn btn-danger">Delete</a></td>                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    