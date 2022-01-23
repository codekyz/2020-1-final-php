<?php
  include '../dbconnect.php';

  if($db == 1){
    $sql = "create table if not exists user (
      id varchar(15) primary key NOT NULL,
      name varchar(10) NOT NULL,
      pw varchar(15) NOT NULL,
      nick varchar(10) NOT NULL,
      email varchar(20),
      joinday varchar(20)
    ) default charset=utf8";
    $result = mysqli_query($connect, $sql);
  }
  else {
    echo "DB 생성오류";
  }
  mysqli_close($connect);

 ?>
