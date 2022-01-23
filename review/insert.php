<?php
session_start();

if (!isset($_SESSION['userid'])) {
  echo "<script>window.alert('로그인 후 이용해 주세요.')
  history.back()</script>";
  exit;
}
else {
  $id = $_SESSION['userid'];
  $ename = $_POST['ename'];
  $score = $_POST['score'];
  $content = $_POST['content'];
  $writeday = date("Y-m-d");

  include '../dbconnect.php';

  mysqli_query($connect, "set session character_set_connection=utf8;");
  mysqli_query($connect, "set session character_set_results=utf8;");
  mysqli_query($connect, "set session character_set_client=utf8;");
  //한글 깨짐 방지


  $sql = "select * from user where id='$id'";
  $result = mysqli_query($connect, $sql);
  $row = mysqli_fetch_array($result);

  $nick = $row['nick'];

  $sql = "insert into review (id, nick, ename, score, content, writeday) ";
  $sql .= "values('$id', '$nick', '$ename', '$score', '$content', '$writeday')";
  mysqli_query($connect, $sql);

  mysqli_close($connect);

  echo "<script>location.href='../index.php';</script>";
}

?>
