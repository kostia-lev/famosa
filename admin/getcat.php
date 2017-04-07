<?php
$con = mysqli_connect('localhost','root','','exclusivescript');

$parent_id = isset($_POST['pid'])?$_POST['pid']:0;
$child_id = isset($_POST['cid'])?$_POST['cid']:0;

$sql = "select id,name from category where parent_id = '$parent_id' AND child_id='$child_id'"; 
$result = mysqli_query($con,$sql);

$data = array();
$i=0;
while($row=mysqli_fetch_assoc($result)){
$data['id'][$i]=$row['id'];
$data['name'][$i]=$row['name'];
$i++;
}

//$row = mysqli_fetch_all($result);

echo json_encode($data);


?>