<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lab 5</title>
  </head>
  <body>

  </body>
</html>

<?php

function swap(&$x, &$y) {
    $tmp=$x; $x=$y; $y=$tmp;
}

$arr = array(7, 3, 9, 6, 5, 1, 2, 0, 8, 4);

echo implode(selectionSort($arr), " "), "</br>";
echo implode(insertionSort($arr), " "), "</br>";
// echo implode(randomSort($arr), " "), "</br>";
echo implode(bubbleSort($arr), " "), "</br>";
echo implode(quickSort($arr), " "), "</br>";
echo implode(gnomeSort($arr), " "), "</br>";

// TODO COMPARE TIME

function ordered($A) {
  for ($i = 0; $i < count($A) - 1; $i++) {
    if ($A[$i] > $A[$i + 1]) {
      return False;
    }
  }
  return True;
}

function selectionSort($A) {
  $len = count($A);
  for ($i = 0; $i < $len - 1; $i++) {
    $key = $i;
    for ($j = $i + 1; $j < $len; $j++) {
      if ($A[$j] < $A[$key]) {
        $key = $j;
      }
    }
    swap($A[$i], $A[$key]);
  }
  return $A;
}

function insertionSort($A) {
  $len = count($A);
  for ($i = 1; $i < $len; $i++) {
    $tmp = $A[$i];
    $j = $i;
    while ($j >= 1 && $A[$j - 1] > $tmp) {
      $A[$j] = $A[$j - 1];
      $j--;
    }
    $A[$j] = $tmp;
  }
  return $A;
}

function randomSort($A) {
    while (!ordered($A)) {
      shuffle($A);
    }
  return $A;
}

function bubbleSort($A) {
  $len = count($A);
  for ($i = 0; $i <$len ; $i++) {
    for ($j = 0; $j < $len - 1; $j++) {
      if ($A[$j + 1] < $A[$j]) {
        swap($A[$j + 1], $A[$j]);
      }
    }
  }
  return $A;
}

function quickSort($A) {
  $len = count($A);
  if ($len < 2) {
    return $A;
  }

  $left = $right = array();
  reset($A);
  $pivot_key = key($A);
  $pivot = array_shift($A);

  foreach($A as $k => $v) {
  	if($v < $pivot)
        $left[$k] = $v;
    else
        $right[$k] = $v;
  }

  return array_merge(quickSort($left),
                     array($pivot_key => $pivot),
                     quickSort($right));
}

function gnomeSort($A) {
  $len = count($A);
  for ($i = 1; $i < $len;) {
    if ($A[$i - 1] <= $A[$i]) {
      $i++;
    } else {
      swap($A[$i], $A[$i - 1]);
      $i--;
      if ($i == 0) {
        $i = 1;
      }
    }
  }
  return $A;
}

?>
