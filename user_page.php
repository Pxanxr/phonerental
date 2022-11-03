<?php
include ('header.php');
include ('menu_user.php');
include ('slide.php');
$act = (isset($_GET['act'])? $_GET['act']:'');
if ($act =='showbytype'){
    include ('pdnew_user.php');
}else {
    include ('pd_user.php');
}

include ('footer.php');
?>