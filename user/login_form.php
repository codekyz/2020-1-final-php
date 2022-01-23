<?php
session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Movie Diary - 로그인</title>
    <script>
    function input_check(){
      if (!document.login_form.userid.value) {
        alert("아이디를 입력하세요");
        document.login_form.userid.focus();
        return;
      }
      if (!document.login_form.pw.value) {
        alert("비밀번호를 입력하세요");
        document.login_form.pw.focus();
        return;
      }
      document.login_form.submit();
    }
    //아이디확인 함수
    </script>
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <div id="top">
      <?php
      include '../top.php';
      ?>
    </div> <!--end of top-->
    <div id="content">
    <div id="title">
      로그인
      <hr>
    </div><!-- end of title -->
    <div id="form">
      <form method="post" action="./login.php" name="login_form">
        <div id="left">
          <ul>
            <li>아이디</li>
            <li>비밀번호</li>
          </ul>
        </div><!-- end of left -->
        <div id="right">
          <ul>
            <li><input type="text" name="userid"></li>
            <li><input type="password" name="pw"></li>
          </ul>
        </div><!-- end of right -->
    <div id="submit">
      <button type="button" onclick="input_check()">로그인</button>
      <button type="button" onclick="location.href='join_form.php'">가입하기</button>
    </div><!-- end of submit -->
    </div><!-- end of form -->
    </div><!-- end of content -->
  </body>
</html>
