<?php
require_once("../lib.php");

if(isset($_GET['getlatest'])){
  header("Content-Type: application/json"); /* Lets JSON this up! */
  $q = query("SELECT * FROM texts ORDER BY timestamp DESC LIMIT 1");
  $row = $q->fetch_assoc();
  $recent = "false";
  if((time() - $row['timestamp']) < 3600) $recent = "true";
  echo "{\"room\":\"{$row['text']}\", \"recent\":\"$recent\", \"time\":\"{$row['timestamp']}\"}";
}
?>