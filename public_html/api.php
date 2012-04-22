<?php
require("../config.php");
require("../lib.php");


if(isset($_GET['falsify'])){
  fwrite(fopen("../file.txt", "w"), "0|0");

} elseif(isset($_GET['getlatest'])){


  mysql_connect("localhost", DB_USER, DB_PASS) or die(mysql_error());
  mysql_select_db(DB_NAME) or die(mysql_error());
  $q = mysql_query('SELECT * from texts ORDER BY timestamp DESC LIMIT 1')/*  or die(mysql_error()); */
  /* if(!$q) die('{"room":"0", "recent":"false"}') */;
  $row = mysql_fetch_assoc($q);
  $recent = "false";
  header("Content-Type: application/json");
  if((time() - $row['timestamp']) < 3600) $recent = "true";
  echo "{\"room\":\"{$row['text']}\", \"recent\":\"$recent\", \"time\":\"{$row['timestamp']}\"}";






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