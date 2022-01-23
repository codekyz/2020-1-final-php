<?php
  session_start();
 ?>

<!DOCTYPE html>
<htm>
  <head>
    <meta charset="utf-8">
    <title>Movie Diary - 회원정보수정</title>
    <script>
    function nick_check(){
      var usernick = document.getElementById("nick").value;
      if(usernick){
        url = "nick_check.php?nick="+usernick;
        window.open(url,"NICKcheck", "width=300, height=100");
      }
      else {
        alert("닉네임을 입력하세요");
      }
    }
    //닉네임확인 함수
    function input_check(){
      if (!document.join_form.pw.value) {
        alert("비밀번호를 입력하세요");
        document.join_form.pw.focus();
        return;
      }
      if (!document.join_form.pw2.value) {
        alert("비밀번호를 한번 더 입력하세요");
        document.join_form.pw2.focus();
        return;
      }
      if (!document.join_form.usernick.value) {
        alert("닉네임을 입력하세요");
        document.join_form.usernick.focus();
        return;
      }
      if (document.join_form.pw.value!=
      document.join_form.pw2.value) {
        alert("비밀번호가 일치하지 않습니다");
        document.join_form.pw.focus();
        document.join_form.pw.select();
        return;
      }
      document.join_form.submit();
    //인풋확인 함수
    }
    </script>
    <link rel="stylesheet" href="../style.css">
  </head>
  <?php
  include '../dbconnect.php';

  $userid = $_SESSION['userid'];
  $sql = "select * from user where id='$userid'";
  $result = mysqli_query($connect, $sql);
  $row = mysqli_fetch_array($result);

  $email = explode("@", $row['email']);
  $email1 = $email[0];
  $email2 = $email[1];

  mysqli_close($connect);
  ?>
  <body>
    <div id="top">
      <?php
      include '../top.php';
      ?>
    </div> <!--end of top-->
    <div id="content">
    <div id="title">
      회원정보 수정
      <hr>
    </div><!-- end of title -->
    <div id="form">
      <form method="post" action="modify.php" name="join_form">
      <div id="left">
        <ul>
          <li>아이디</li>
          <li>이름*</li>
          <li>비밀번호*</li>
          <li>비밀번호 확인*</li>
          <li>닉네임*</li>
          <li>이메일</li>
        </ul>
      </div><!-- end of left -->
      <div id="right">
        <ul>
          <li><?=$row['id'] ?></li>
          <li><input type="text" name="name" value="<?=$row['name'] ?>"></li>
          <li><input type="password" name="pw" value="<?=$row['pw'] ?>"></li>
          <li><input type="password" name="pw2" value="<?=$row['pw'] ?>"></li>
          <li>
            <input type="text" name="usernick" id="nick" value="<?=$row['nick'] ?>">
            <button type="button" onclick="nick_check()">닉네임 확인</button>
          </li>
          <li><input type="text" class="mail" name="email1" value="<?=$email1 ?>"> @
          <select class="mail" name="email2">
            <option value='naver.com' <?php if($email2=='naver.com') echo "selected";?> >naver.com</option>
            <option value='gmail.com' <?php if($email2=='gmail.com') echo "selected";?> >gmail.com</option>
            <option value='daum.net' <?php if($email2=='daum.net') echo "selected";?> >daum.net</option>
            <option value='nate.com' <?php if($email2=='nate.com') echo "selected";?> >nate.com</option>
          </select></li>
        </ul>
      </div><!-- end of right -->
      <div id="submit">
        <span>*은 필수입력 입니다.<br><br></span>
        <button type="button" onclick="input_check()">저장하기</button>
        <input type="reset" value="초기화">
      </div><!-- end of submit -->
    </div><!-- end of form -->
  </div><!-- end of content -->
  </body>
</html>
