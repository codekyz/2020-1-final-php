<?php
  $userid = $_GET["id"];
  include '../dbconnect.php';

  $sql = "select * from user where id='$userid' ";

  $result = mysqli_query($connect, $sql);
  $num_record = mysqli_num_rows($result);
  if ($num_record) {
    echo "중복된 아이디 입니다.<br>";
    echo "다른 아이디를 입력하세요!<br>";
  }
  else {
    echo "사용가능한 아이디 입니다!<br>";
    mysqli_close($connect);
  }
?>
  <button value="닫기" onclick="window.close()">닫기</button>
