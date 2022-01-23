<?php
  session_start();
  include_once './user_tbl.php';
 ?>

<!DOCTYPE html>
<htm>
  <head>
    <meta charset="utf-8">
    <title>Movie Diary - 회원가입</title>
    <script>
    function id_check(){
      var userid = document.getElementById("id").value;
      if(userid){
        url = "id_check.php?id="+userid;
        window.open(url,"IDcheck", "width=300, height=100");
      }
      else {
        alert("아이디를 입력하세요");
      }
    }
    //아이디확인 함수
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
      if (!document.join_form.userid.value) {
        alert("아이디를 입력하세요");
        document.join_form.userid.focus();
        return;
      }
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
      if (!document.join_form.name.value) {
        alert("이름을 입력하세요");
        document.join_form.name.focus();
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
  <body>
    <div id="top">
      <?php
      include '../top.php';
      ?>
    </div> <!--end of top-->
    <div id="content">
    <div id="title">
      회원가입
      <hr>
    </div><!-- end of title -->
    <div id="form">
      <form method="post" action="./insert.php" name="join_form">
      <div id="left">
        <ul>
          <li>아이디*</li>
          <li>이름*</li>
          <li>비밀번호*</li>
          <li>비밀번호 확인*</li>
          <li>닉네임*</li>
          <li>이메일</li>
        </ul>
      </div><!-- end of left -->
      <div id="right">
        <ul>
          <li>
            <input type="text" name="userid" id="id">
            <button type="button" onclick="id_check()">아이디 확인</button>
          </li>
          <li><input type="text" name="name"></li>
          <li><input type="password" name="pw"></li>
          <li><input type="password" name="pw2"></li>
          <li>
            <input type="text" name="usernick" id="nick">
            <button type="button" onclick="nick_check()">닉네임 확인</button>
          </li>
          <li><input type="text" class="mail" name="email1"> @
          <select class="mail" name="email2">
            <option value='naver.com'>naver.com</option>
            <option value='gmail.com'>gmail.com</option>
            <option value='daum.net'>daum.net</option>
            <option value='nate.com'>nate.com</option>
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
