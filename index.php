<?php
  session_start();
  //세션 활성화
  include'./review/review_tbl.php';
  //테이블 존재 확인 및 생성
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Movie Diary</title>
    <link rel="stylesheet" href="style.css">
  </head>
 <body>
  <div id="top">
    <?php
    include './top.php';
    ?>
  </div> <!--end of top-->
  <div id="content">
    <?php
    include './review/review.php';
    ?>
  </div><!--end of content-->
 </body>

</html>
