<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>萬年曆</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php

  $month = $_GET['month'] ?? date("n");
  $year = $_GET['year'] ?? date("Y");
  $Month = date("F", strtotime("$year-$month"));
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
  <div class="roww">
    <form action="check.php" method="get" class="from">
      <input type="number" name="year" class='content1' placeholder="請輸入年分(必填)" max=3000000>
      <input type="number" name="month" class="content1" placeholder="請輸入月份(必填)" min=1 max=12>
      <input type="submit" value="查詢" class="content">
    </form>
  </div>


  <div class="box">

    <div class="title">
      <img src="./images/<?= $zodiacNumber; ?>.jpg" alt="">
    </div>

    <div class="left">
      <div class="title-content">
        <h2>西元<?= "<span class='keyword'>$year</span>年"; ?><br><?= "<span class='keyword'>$Month</span>" ?></h2>
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
      <a href="./index.php?month=<?= $last_month ?>&year=<?= $last_year ?>">上一個月</a>
    </div>
    <div class="item2">
      <a href="./index.php?month=<?= $next_month ?>&year=<?= $next_year ?>">下一個月</a>
    </div>
  </div>

</body>

</html>