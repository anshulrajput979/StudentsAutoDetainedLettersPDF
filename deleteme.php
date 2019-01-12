<?php
$id=$_GET["del_id"];
include("documents/conn.php");
$query = "DELETE  FROM student_data WHERE student_data.rollno='$id'";
mysqli_query($conn,$query) or die(mysqli_error($conn));
?>