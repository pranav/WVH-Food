<?php



if(isset($_GET['falsify'])){
  fwrite(fopen("../file.txt", "w"), "0|0");
} else {
  $file = file_get_contents("../file.txt");
  $array = explode("|", $file);
  /* $array[0] is timestamp, $array[1] is room */
  $room = $array[1];
  $time = intval($array[0]);
  $diff = time() - $time;
  $recent = "false";
  if($diff < 3600) $recent = "true";
  header("Content-Type: application/json");
  echo "{\"room\":\"$room\", \"recent\":\"$recent\"}";
}

?>