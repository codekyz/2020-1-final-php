<?php
  session_start();
?>
<meta charset="utf-8">
<?php
$id = $_SESSION['userid'];
$name = $_POST['name'];
$pw = $_POST['pw'];
$nick = $_POST['usernick'];
$email = $_POST['email1']."@".$_POST['email2'];

include '../dbconnect.php';

mysqli_query($connect, "set session character_set_connection=utf8;");
mysqli_query($connect, "set session character_set_results=utf8;");
mysqli_query($connect, "set session character_set_client=utf8;");
//한글 깨짐 방지

$sql = "update user set name='$name', pw='$pw', nick='$nick', ";
$sql.= "email='$email' where id='$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);

$_SESSION['username'] = $name;
$_SESSION['usernick'] = $nick;

echo "<script>location.href='../index.php';</script>";

 ?>
