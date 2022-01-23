<?php
$id = $_POST['userid'];
$name = $_POST['name'];
$pw = $_POST['pw'];
$nick = $_POST['usernick'];
$email = $_POST['email1']."@".$_POST['email2'];
$joinday = date("Y-m-d");

$connect = mysqli_connect('localhost', 'root', '123456');
mysqli_select_db($connect, 'movie_db');

mysqli_query($connect, "set session character_set_connection=utf8;");
mysqli_query($connect, "set session character_set_results=utf8;");
mysqli_query($connect, "set session character_set_client=utf8;");
//한글 깨짐 방지

$sql = "insert into user (id, name, pw, nick, email, joinday) ";
$sql.= "values('$id', '$name', '$pw', '$nick','$email','$joinday')";
mysqli_query($connect, $sql);
mysqli_close($connect);

echo "<script>location.href='../index.php';</script>";

 ?>
