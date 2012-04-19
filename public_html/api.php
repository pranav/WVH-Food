<?php

$file = file_get_contents("../file.txt");
$array = explode("|", $file);
/* $array[0] is room, $array[1] is timestamp */
$room = $array[0];
$time = intval($array[1]);
$diff = time() - $time;
$recent = "false";
if($diff < 3600) $recent = "true";
header("Content-Type: application/json");
echo "{\"room\":\"$room\", \"recent\":\"$recent\"}";


?>