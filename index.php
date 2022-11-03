<?php
include ('header.php');
include ('menu.php');
include ('slide.php');
$act = (isset($_GET['act'])? $_GET['act']:'');
if ($act =='showbytype'){
    include ('pdnew.php');
}else {
    include ('pd.php');
}

include ('footer.php');
?>