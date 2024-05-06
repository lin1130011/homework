<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    * {
      box-sizing: border-box;
    }

    .container {
      width: 80%;
      margin: auto;
      margin-top: 200px;
      display: flex;
      background-color: gray;
      flex-wrap: wrap;
      justify-content: center;
    }

    .title {
      width: 100%;
      text-align: center;
      margin-bottom: -4px;
      background-color: red;
    }

    .item-left {
      text-align: center;
      align-content: center;
      width: 40%;
      height: 300px;
      font-size: 100px;
      background: blue;

    }

    .item-right {
      text-align: center;
      width: 60%;
      background-color: lightblue;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="title">
      <div class="img">
        <img src="https://picsum.photos/1524/300/?random=10">
      </div>
    </div>
    <div class="item-left">
      <div class="left-content">
        <?php
        $month = 5;
        echo $month;
        ?>
      </div>
    </div>
    <div class="item-right">

    </div>
  </div>
</body>

</html>