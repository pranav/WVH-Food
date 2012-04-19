<?php

$time = time();

if($_POST['Body'] != NULL){
  $body = htmlentities($_POST['Body']);
  mysql_real_escape_string($body);
		      
  $towrite = $_POST['Body'].'|'.time();
  $file = fopen("../file.txt", "w");
  fwrite($file, $towrite);
}


?>