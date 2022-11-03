
<?php
	error_reporting( error_reporting() & ~E_NOTICE );
    session_start();   
?>


<?php
include("header.php");
include("menu_user.php");?>

<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <p><a href="cart.php">back to shopping basket</a> &nbsp;  <button class="btn btn-primary" onClick="window.print()"> print receipe </button></p>
  <table width="700" border="1" align="center" class="table">
      <form id="frmcart" name="frmcart" method="post" action="?act=update">
        <table width="100%" border="0" align="center" class="table table-hover">
        <tr>
          <td height="40" colspan="6" align="center" bgcolor="#CCCCCC"><strong><b>shopping basket</span></strong></td>
		</tr>
        <tr>
		  <td align="center" bgcolor="#EAEAEA"><strong>No.</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>image</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>Products</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>Price</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>numbers</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>Total</strong></td>
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

		echo "<td width='100'>"." "  .$row['name_pro'] . "</td>";
		
		echo "<td width='100' align='right'>" . number_format($row['price'],2) . "</td>";
		
		echo "<td width='100' align='right'>";  
		echo "<input type='text' name='amount[$id]' value='$p_qty' size='2'/></td>";
		
		echo "<td width='100' align='right'>" .number_format($sum,2)."</td>";
		
		echo "</tr>";
		}
 
	}
	echo "<tr>";
  	echo "<td colspan='4' bgcolor='#CEE7FF' align='right'>Total</td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>";
  	echo "<b>";
  	echo  number_format($total,2);
  	echo "</b>";
  	echo "</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
  echo "</tr>";
}
mysqli_close($condb);
?>
</table>
		</div>
	</div>
</div>
<br>
<br>

</body>
</html>
<br>
<br>
<?php 
include('from2.php');
include('footer.php');
?>