<?php
require_once("../lib.php");

if(isset($_GET['getlatest'])){
  header("Content-Type: application/json"); /* Lets JSON this up! */
  $q = query("SELECT * FROM texts ORDER BY timestamp DESC LIMIT 1");
  $row = $q->fetch_assoc();
  $recent = "false";
  $name = "";
  $hasName = "false";
  if((time() - $row['timestamp']) < 3600) $recent = "true";
  if(name_exists($row['number'])){
    $name = get_name($row['number']);
    $hasName = "true";
  }
  $text = addslashes(html_entity_decode($row['text']));
  echo <<<json
    {
      "room":"$text",
      "recent":"$recent",
      "time":"{$row['timestamp']}",
      "hasName":"$hasName",
      "name":"$name"
    }
json;
}
?>
