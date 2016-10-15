<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lab 4</title>
  </head>
  <body>
    <h1>Random calculations on reload</h1>
    <?php
      // Start - Step - End
      $a = array(array(200, 150, 120), array(1, 2, 3),    array(0, 1, -1));
      $b = array(array(0, 1, 2),       array(1, 10, 100), array(99, 199, 999));
      $c = array(array(1, 0, -1),      array(1, 2),       array(-99, 0, 99));
      $d = array(array(-100, 0, 100),  array(2, 3, 4),    array(-2, 0, 2));

      printRandomLoop($a);
      printRandomLoop($b);
      printRandomLoop($c);
      printRandomLoop($d);
    ?>
  </body>
</html>

<?php

function printRandomLoop($initials) {
  $start = $initials[0][rand(0, count($initials[0]) - 1)];
  $step =  $initials[1][rand(0, count($initials[1]) - 1)];
  $end =   $initials[2][rand(0, count($initials[2]) - 1)];
  printLoop($start, $step, $end);
}

function printLoop($start, $step, $end) {
  echo "Loop ({$start}, {$step}, {$end})<br />";

  if ($step === 0) {
    echo 'Step is 0, can not loop <br/><br/>';
    return;
  }

  if ($start === $end) {
    echo 'Start point equals end point <br/><br/>';
    return;
  }

  if (($step > 0 && $start > $end) ||
      ($step < 0 && $start < $end)) {
    $step = -$step;
  }

  if ($start < $end) {
    for ($i = $start; $i <= $end; $i += $step) {
      echo "${i} ";
    }
  } else {
    for ($i = $start; $i >= $end; $i += $step) {
      echo "${i} ";
    }
  }

  echo '<br /><br />';
}

?>
