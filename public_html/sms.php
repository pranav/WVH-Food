<?php

$time = time();

if($_POST['Body'] != NULL){
  $body = strip_tags($_POST['Body']);
  $body = htmlentities($body);
  mysql_real_escape_string($body);
  if(strlen($body) < 3) die();
  $towrite = $body.'|'.time();
  $file = fopen("../file.txt", "w+");
  fwrite($file, $towrite);
}


?>