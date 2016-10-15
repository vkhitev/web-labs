<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lab 3</title>
    <link rel="stylesheet" href="./main.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <?php
      include './scripts/tables.php';
      include './scripts/loop.php';

      // echo table_1(6, 6);
      // echo table_2(6, 7);
      // echo table_3(6, 7);
      echo table_4(8, 8);

      printLoop(200, -3, 0);
      printLoop(0, 1, 99);
      printLoop(1, 1, -99);
      printLoop(-100, 2, -2);
    ?>
  </body>
</html>
