<?php
$connect = mysqli_connect("localhost", "root", "nihadgo75", "school");
$sql="SELECT * FROM book";
$results=mysqli_query($connect,$sql);
$json_array=array();
while ($data=mysqli_fetch_assoc($results)){
    $json_array[]=$data;

}
echo json_encode($json_array);
?>