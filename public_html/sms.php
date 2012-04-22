<?php


require_once('../config.php');
require_once('../lib.php');

function sanitize($text){
  $body = trim($text);
  $body = strip_tags($body);
  $body = htmlentities($body);
  return $body;
}


if(substr($_POST['Body'], 0, 4) == "REG "){
  $name = substr($_POST['Body'],5);
  $name = sanitize($name);
  $from = sanitize($_POST['From']);
  set_name(sanitize($from, $name);
} 

elseif($_POST['Body'] != NULL && $_POST['From'] != NULL){
  mysql_connect("localhost", DB_USER, DB_PASS);
  mysql_select_db(DB_NAME);
  $text = sanitize($_POST['Body']);
  mysql_real_escape_string($text);
  $from = $_POST['From'];
  $from = sanitize($from);
  mysql_real_escape_string($from);
  $time = time();
  mysql_query("INSERT INTO texts (text, number, timestamp) VALUES ('$text', '$from', '$time')") or die(mysql_error());
}

?>