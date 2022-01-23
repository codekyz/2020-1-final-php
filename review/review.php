<?php
  $scale = 5;
  //한 페이지에 5개 표시

  include './dbconnect.php';

  $sql = "select * from review order by num desc";
  $result = mysqli_query($connect, $sql);
  $total_record = mysqli_num_rows($result);
  //전체 글 개수

  if($total_record%$scale == 0) {
    $total_page = floor($total_record/$scale);
  }
  else {
    $total_page = floor($total_record/$scale)+1;
  }

  if(isset($_GET['page'])) {
    $page=$_GET['page'];
  }
  else {
    $page = 1;
  }
  //페이지 번호가 0일때 1로 초기화

  $start = ($page - 1) * $scale;
  $number = $total_record - $start;
  //페이지번호에 따른 시작 레코드 계산
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Movie Diary</title>
    <link rel="stylesheet" href="style.css">
    <script>
    function input_check(){
      if (!document.review_form.ename.value) {
        alert("영화제목을 입력하세요");
        document.review_form.ename.focus();
        return;
      }
      if (!document.review_form.score.value) {
        alert("별점을 입력하세요");
        document.review_form.score.focus();
        return;
      }
      if (!document.review_form.content.value) {
        alert("내용을 입력하세요");
        document.review_form.content.focus();
        return;
      }
      document.review_form.submit();
    //인풋확인 함수
    }
    </script>
  </head>
  <body>
    <div id="title">
      리뷰게시판
      <hr>
    </div><!-- end of title -->
    <div id="wrap">
      <form method="post" action="./review/insert.php" name="review_form">
      <div id="writer"><span>♥
        <?php
        if (!isset($_SESSION['userid'])) {
        ?>
        작성권한이 없습니다. 로그인을 해주세요.
        <?php
        }
        else {
          $usernick=$_SESSION['usernick'];
          $userid=$_SESSION['userid'];
          echo "{$usernick}({$userid})님";
        }
        ?> </span></div>
      <div id="review">
        <div id="mtitle">
          <label> 영화제목 : </label>
          <input type="text" name="ename">
        </div>
        <div id="score">
          <label> 별점 : </label>
          <input type="range" name="score" min="0" max="5" step="1" value="0"
          oninput="document.getElementById('value').innerHTML=this.value;">
          <span id="value"></span>
        </div><!-- end of score -->
        <div id="comment"><textarea rows="6" cols="95" name="content"></textarea></div>
        <div id="submit">
          <button type="button" onclick="input_check()">작성하기</button>
        </div><!-- end of submit -->
      </div><!-- end of review -->
      </form>
    </div><!-- end of wrap -->
    <?php
      for ($i=$start; $i<$start+$scale && $i<$total_record; $i++) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);

        $num = $row['num'];
        $id = $row['id'];
        $nick = $row['nick'];
        $ename = $row['ename'];
        $score = $row['score'];
        $date = $row['writeday'];

        $content = str_replace("\n", "<br>", $row['content']);
        $content = str_replace(" ", "&nbsp;", $content);
      ?>
      <div id="writer_title">
        <ul>
          <div id="title1">
            <li class="inline"><?=$num ?></li>
            <li class="inline"><?=$ename ?></li>
          </div>
          <div id="title2">
            <li class="inline"><?=$nick ?>(<?=$id ?>)님</li>
            <li class="inline"><?=$date ?></li>
            <li class="inline">
              <?php
              if (isset($_SESSION['userid'])) {
                if ($_SESSION['userid'] == "admin" || $_SESSION['userid'] == $id) {
                  echo "<a href='./review/delete.php?num=$num'>[삭제]</a>";
                }
              }
              ?>
          </li>
          </div>
        </ul>
      </div><!-- end of writer_title -->
      <div id="list">
        <div id="star">
          <?php
          for ($j=0; $j<$score; $j++) {
            echo "★";
          }
          for ($k=$j; $k<5; $k++) {
            echo "☆";
          }
          ?>
        </div><!-- end of score -->
        <div id="comment">
          <?=$content ?>
        </div><!-- end of comment -->
      </div><!-- end of list -->
      <?php
      $number--;
      }
      mysqli_close($connect);
      ?>
      <div id="page">
        <hr>
        ◀
        <?php
        for ($i=1; $i<=$total_page; $i++) {
          if ($page==$i) {
            echo "<b> $i </b>";
          }
          else {
            echo "<a href='./index.php?page=$i'> $i </a>";
          }
        }
        ?>
        ▶
      </div>
  </body>
</html>
