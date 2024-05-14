<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>萬年曆</title>
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://kit.fontawesome.com/3eab48196f.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php

  $month = $_GET['month'] ?? date("m");
  $year = $_GET['year'] ?? date("Y");
  $Month = date("n", strtotime("$year-$month"));
  $str = "日 一 二 三 四 五 六";
  $header = explode(" ", $str);

  $first_day = date("$year-$month-01");
  $first_day_stemp = strtotime($first_day);
  $first_day_is = date("w", $first_day_stemp);
  $days_in_month = date("t", $first_day_stemp);
  $last_day = date("$year-$month-$days_in_month");
  $days = [];
  for ($i = 0; $i < 42; $i++) {
    $diff = $i - $first_day_is;
    $days[] = date("Y-m-d", strtotime("$diff days", $first_day_stemp));
  }
  // 計算生肖數字
  $startYear = 4; // 陰曆起始年份
  // 計算陰曆年份
  $zodiacNumber = ($year - $startYear) % 12;
  if ($zodiacNumber < 0) {
    $zodiacNumber += 12;
  }
  $last_month = $month - 1;
  $next_month = $month + 1;
  $last_year = $year;
  $next_year = $year;
  if ($last_month < 1) {
    $last_month = 12;
    $last_year = $year - 1;
  }
  if ($next_month > 12) {
    $next_month = 1;
    $next_year = $year + 1;
  }
  ?>
  <div class="form-row">
    <form action="check.php" method="get" class="form">
      <input type="number" name="year" class='content-year' placeholder='請輸入年分(必填)' min=1 max=3000000>
      <input type="number" name="month" class="content-month" placeholder="請輸入月份(必填)" min=1 max=12>
      <button type="submit" class="select"><i class="fa-brands fa-searchengin"></i></button>
    </form>
  </div>

  <div class="box">
    <div class="left">
      <div class="title-content">
        西元<?= "<span class='keyword'>$year</span>年"; ?><?= "<span class='keyword'>$Month</span>月" ?>
      </div>
      <div class="title-img">
        <img src="./images/<?= $zodiacNumber; ?>.jpg" alt="">
      </div>
    </div>

    <div class="right">
      <?php
      foreach ($header as $key => $value) {
        echo "<div class='header'>$value</div>";
      }
      foreach ($days as $key => $day) {
        $data = explode("-", $day)[2];
        $what_day = date("w", strtotime($day));
        if ($what_day == 0 || $what_day == 6) {
          if (date("Y-m", strtotime($day)) !== date("Y-m", $first_day_stemp)) {
            echo "<div class='outside-holiday'>$data</div>";
          } else {
            echo "<div class ='holiday'>$data</div>";
          }
        } else {
          if (date("Y-m", strtotime($day)) !== date("Y-m", $first_day_stemp)) {
            echo "<div class='outsideday'>$data</div>";
          } else {
            echo "<div class='day'>$data</div>";
          }
        }
      }
      ?>
    </div>

  </div>
  <div class="row">
    <div class="item1">
      <a href="./index.php?month=<?= $last_month ?>&year=<?= $last_year ?>"><button class="change"><i class="fa-solid fa-arrow-left"></i>上一個月</button></a>
    </div>
    <div class="item2">
      <a href="./index.php?month=<?= $next_month ?>&year=<?= $next_year ?>"><button class="change">下一個月<i class="fa-solid fa-arrow-right"></i></button></a>
    </div>
  </div>
  </div>
</body>

</html>