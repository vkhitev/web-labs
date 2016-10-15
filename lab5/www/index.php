<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lab 5</title>
  </head>
  <body>
    <?php
    $arr = array();
    $elements = 2000;
    for ($i=0; $i < $elements; $i++) {
      array_push($arr, $i);
    }
    shuffle($arr);

    echo "Initial array of " . $elements . " elements </br></br>";

    $times = array();

    $times ['selection'] = echoSort($arr, 'selection');
    $times ['insertion'] = echoSort($arr, 'insertion');
    $times ['bubble']    = echoSort($arr, 'bubble');
    $times ['quick']     = echoSort($arr, 'quick');
    $times ['gnome']     = echoSort($arr, 'gnome');

    $min_val = min($times);
    $min_key = array_search($min_val, $times);

    echo "Most efficient algorithm: </br>" . ucwords(strtolower($min_key))
         . " sort: " . $min_val . " sec";
    echo "</br></br></br>";

    echoSort(array_slice($arr, 0, 8), 'random');

    ?>
  </body>
</html>

<?php

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function echoSort($arr, $algName) {
  $a = array();
  $start = microtime_float();
  switch ($algName) {
    case 'selection': $a = selectionSort($arr); break;
    case 'insertion': $a = insertionSort($arr); break;
    case 'random': $a = randomSort($arr); $algName .= ' (on 8 elements) '; break;
    case 'bubble': $a = bubbleSort($arr); break;
    case 'quick': $a = quickSort($arr); break;
    case 'gnome': $a = gnomeSort($arr); break;
    default: echo 'Unknown sort algorithm: ' . $algName; return;
  }
  $time_elapsed_secs = microtime_float() - $start;
  echo ucwords(strtolower($algName)) . ' sort' . "</br>";
  // echo implode($a, " ");
  echo "Time elapsed: ", $time_elapsed_secs, " sec</br></br>";
  return $time_elapsed_secs;
}

function swap(&$x, &$y) {
    $tmp=$x; $x=$y; $y=$tmp;
}

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
