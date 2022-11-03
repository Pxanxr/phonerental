<?php 
    error_reporting( error_reporting() & ~E_NOTICE );
    session_start();

    if (!$_SESSION['userid']) {
        header("Location: index_add.php");
    } else {
        require_once('connection_uploadfile.php');

    if (isset($_REQUEST['delete_id'])) {
        $id = $_REQUEST['delete_id'];

        $select_stmt = $db->prepare('SELECT * FROM tbl_file WHERE id = :id');
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        unlink("upload/".$row['image']); // unlin functoin permanently remove your file

        // delete an original record from db
        $delete_stmt = $db->prepare('DELETE FROM tbl_file WHERE id = :id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmt->execute();

        header("Location: index_add.php");
    }

?>
<?php 
include('menu_admin.php')
?>

           
                <div class="container text-center">
        <h1>Products</h1>

        <a href="add.php" class="btn btn-success">Add Products</a>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Image</td>
                    <td>Brand Products</td>
                    <td>Price</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>

            <tbody>
                <?php 
                    $select_stmt = $db->prepare('SELECT * FROM tbl_file');
                    $select_stmt->execute();
                    

                    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $row['name_pro']; ?></td>                        
                        <td><img src="upload/<?php echo $row['image']; ?>" width="100px" height="100px" alt=""></td>
                        <td><?php echo $row['detail']; ?></td>
                        <td><?php echo $row['price']; ?></td>                        
                        <td><a href="edit_pro.php?update_id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td>                        
                        <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </body>
</html>
<?php } ?>
<?php 
include('footer.php');
?>