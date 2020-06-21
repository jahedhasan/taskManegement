<?php 

$arr1 = [
  'p1' => 'dhaka',
  'p2' => 'borishal',
  'p3' => 'tomato',
];

$arr2 = [
  'p3' => 'cumilla',
  'p4' => 'khulna',
  'p5' => 'homna',
];


$final_array = array_merge($arr1, $arr2);

// var_export($final_array);

$r = rand(0, 1);
print_r($r);

