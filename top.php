<div id="logo">
  <a href="http://localhost/kyz/project/index.php">Movie Diary</a>
</div>
<div id="login">
  <?php
  if(!isset($_SESSION['userid'])) {
   ?>
  <a href="http://localhost/kyz/project/user/login_form.php">로그인</a> |
  <a href="http://localhost/kyz/project/user/join_form.php">회원가입</a>
  <?php
  }
  else {
    $usernick=$_SESSION['usernick'];
  echo "{$usernick}님";?> |
  <a href="http://localhost/kyz/project/user/logout.php">로그아웃</a> |
  <a href="http://localhost/kyz/project/user/join_form_mod.php">정보수정</a>
  <?php
  }
   ?>
</div>
