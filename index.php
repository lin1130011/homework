<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>萬年曆</title>
  <style>
    * {
      box-sizing: border-box;
    }

    .box {
      width: 80%;
      margin: auto;
      /* height: 5000px; */
      display: flex;
      flex-wrap: wrap;
    }

    .title {
      width: 100%;
      height: 300px;
      background: red;
      background-image: url(./images/dargon.png);
      background-size: cover;
    }

    .left {
      width: 40%;
      height: 500px;
      background: black;
    }

    .right {
      width: 60%;
      background: lightblue;
    }
  </style>
</head>

<body>
  <div class="box">
    <div class="title"></div>
    <div class="left"></div>
    <div class="right"></div>
  </div>
</body>

</html>