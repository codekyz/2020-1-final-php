<?php
include '../dbconnect.php';

$num = $_GET['num'];
$sql = "delete from review where num=$num";
mysqli_query($connect, $sql);

mysqli_close($connect);

echo "<script>location.href='../index.php';</script>";

?>
