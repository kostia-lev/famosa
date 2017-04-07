<?php
include "AMframe/config.php"; ob_start();

$getval=$_REQUEST['getval'];
$getval2=$_REQUEST['getval2'];
$row=$db->get_all("select id,name from category where parent_id='$getval2' and child_id='$getval'"); 
$disp="<option value='0'>--select--</option>";
for($i=0;$i<count($row);$i++){
	$id=$row[$i]['id'];
	$name=$row[$i]['name'];
	$disp .="<option value='$id'>$name</option>";
}
echo $disp;
?>