<?php

require_once __DIR__ . '/../config/app.php';

function day_diff($date1, $date2)
{
  $time1 = strtotime($date1);
  $time2 = strtotime($date2);

  $second_diff = $time1 - $time2;
  $day_diff = $second_diff / (60 * 60 * 24);

  return floor($day_diff);
}
