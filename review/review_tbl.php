<?php
  include './dbconnect.php';

  if($db == 1){
    $sql = "create table if not exists review (
      num int primary key auto_increment NOT NULL,
      id varchar(15) NOT NULL,
      nick varchar(10) NOT NULL,
      ename varchar(20) NOT NULL,
      score int NOT NULL,
      content text NOT NULL,
      writeday varchar(20)
    ) default charset=utf8";
    $result = mysqli_query($connect, $sql);
  }
  else {
    echo "DB 생성오류";
  }
  mysqli_close($connect);

 ?>
