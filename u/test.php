<?php

/**
 *
 */
class sang
{

  function sum($a, $b) {
    echo $a + $b;
  }
  function sub($a, $b) {
    echo $a - $b;
  }
}

$st = new sang;
$st -> sum(4, 3);
$st -> sum(5, 3);



?>
