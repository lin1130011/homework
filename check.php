<?php
$year = $_GET['year'];
$month = $_GET['month'];

if (empty($year) || empty($month)) {
    if (empty($year)) {
        echo "請確認是否正確輸入年份<br>";
    }
    if (empty($month)) {
        echo "請確認是否正確輸入月份<br>";
    }
    echo "<a href='./index.php'>回首頁</a>";
} else {
    header("location:index.php?month=$month&year=$year");
}
