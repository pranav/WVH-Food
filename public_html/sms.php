<?php

if($_POST['Body'] != NULL){
  $body = trim($_POST['Body']);
  $body = strip_tags($body);
  $body = htmlentities($body);
  mysql_real_escape_string($body);
  if(strlen($body) < 3) die();
  $towrite = time().'|'.$body;
  $file = fopen("../file.txt", "w+");
  fwrite($file, $towrite);
}


?>