
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

<?php
	error_reporting( error_reporting() & ~E_NOTICE );
	include("condb.php");
	session_start();
	$id = $_REQUEST['id'];
	$act = $_REQUEST['act'];

	if($act=='add' && !empty($id))
	{
		if(!isset($_SESSION['shopping_cart']))
		{
			 
			$_SESSION['shopping_cart']=array();
		}else{
		 
		}
		if(isset($_SESSION['shopping_cart'][$id]))
		{
			$_SESSION['shopping_cart'][$id]++;
		}
		else
		{
			$_SESSION['shopping_cart'][$id]=1 ;
		}
	}
	
	if($act=='remove' && !empty($id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['shopping_cart'][$id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $id=>$amount)
		{
			$_SESSION['shopping_cart'][$id]=$amount;
		}
	}
	?>



<?php 
include("header.php");
include("menu_user.php");
?>

<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-7">
      <form id="frmcart" name="frmcart" method="post" action="?act=update">
        <table width="100%" border="0" align="center" class="table table-hover">
        <tr>
          <td height="40" colspan="7" align="center" bgcolor="#CCCCCC"><strong><b>shopping basket</span></strong></td>
		</tr>
        <tr>
		  <td align="center" bgcolor="#EAEAEA"><strong>No.</strong></td>
    	  <td align="center" bgcolor="#EAEAEA"><strong>image</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>Products</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>Price</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>numbers</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>Total</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>Delete</strong></td>
		  </tr>
		  
		<?php
$total=0;
$i=0;
if(!empty($_SESSION['shopping_cart']))
{
	
	foreach($_SESSION['shopping_cart'] as $id=>$p_qty)
	{
		$sql = "SELECT * FROM tbl_file WHERE id = $id ";
		$query = mysqli_query($condb, $sql);
		while ($row = mysqli_fetch_array ($query))
		{
		$sum = $row['price'] * $p_qty;
		$total += $sum;
		echo "<tr>";
		echo "<td>";
		echo $i += 1;
		echo "</td>";
		
		echo "<td width='100'><img src='upload/$row[image]'  width='50'/></td>";
		
		echo "<td width='334'>"." " . $row["name_pro"] . "</td>";
		
		echo "<td width='100' align='right'>" . number_format($row['price'],2) . "</td>";
		
		echo "<td width='57' align='right'>";  
		echo "<input type='text' name='amount[$id]' value='$p_qty' size='2'/></td>";
		
		echo "<td width='100' align='right'>" .number_format($sum,2)."</td>";
		echo "<td width='100' align='right'><a href='cart.php?id=$id&act=remove' class='btn btn-danger btn-xs'>delete</a></td>";
		
		echo "</tr>";
		}
 
	}
	echo "<tr>";
  	echo "<td colspan='5' bgcolor='#CEE7FF' align='right'>Total</td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>";
  	echo "<b>";
  	echo  number_format($total,2);
  	echo "</b>";
  	echo "</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
	}?>

<tr>
          <td></td>
          <td colspan="5" align="center">
          <button type="submit" name="button" id="button" class="btn btn-warning"> Recalculate price </button>
            <button type="button" name="Submit2"  onclick="window.location='paymentfrom.php';" class="btn btn-primary"> 
            <span class="glyphicon glyphicon-shopping-cart"> </span> Confirm order </button>
            </td>
        </tr>
      </form>
      <p align="right"> <a href="user_page.php" class="btn btn-primary">back to index</a> </p>
	  
    </div>
  </div>
</div>		
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  

