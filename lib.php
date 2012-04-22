<?php

require_once("config.php");

function name_exists($from){
  mysql_connect("localhost", DB_USER, DB_PASS);
  mysql_select_db(DB_NAME);
  $q = mysql_query("SELECT * from name WHERE from = '$from' LIMIT 1");
  $num = mysql_num_rows($q);
  if($num == 1) return true;
  else return false;

  
} 


function set_name($from, $name){
  mysql_connect("localhost", DB_USER, DB_PASS);
  mysql_select_db(DB_NAME);
  if(name_exists($from)) {
    echo "name_exists()";
    mysql_query("UPDATE name SET name = '$name' WHERE from = '$from'");
  }
  else
    mysql_query("INSERT INTO name (name, from) VALUES ('$name', '$from')");
  echo "INSERT_INTO()";
}

?>