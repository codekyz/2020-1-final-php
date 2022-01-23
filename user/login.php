<?php
  session_start();
?>
<meta charset="utf-8">
<?php
  $id = $_POST['userid'];
  $pw = $_POST['pw'];

  include '../dbconnect.php';

  $sql = "select * from user where id='$id'";
  $result = mysqli_query($connect, $sql);
  $match = mysqli_num_rows($result);

  if(!$match){
    echo "<script>window.alert('존재하지 않는 아이디입니다.')
    history.back()</script>";
    exit;
  }
  else {
    $row = mysqli_fetch_array($result);
    $db_pw = $row['pw'];

    if($pw!=$db_pw){
      echo "<script>window.alert('비밀번호가 틀립니다.')
      history.back()</script>";
      exit;
    }
    else {
      $userid = $row['id'];
      $username = $row['name'];
      $usernick = $row['nick'];

      $_SESSION['userid'] = $userid;
      $_SESSION['username'] = $username;
      $_SESSION['usernick'] = $usernick;

      echo "<script>location.href='../index.php';</script>";
    }
  }


?>
