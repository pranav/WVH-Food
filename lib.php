<?php

require_once("config.php");

/* Connects to the database */
function connect(){
  $mysqli = new mysqli('localhost', DB_USER, DB_PASS, DB_NAME);
  if(mysqli_connect_errno())
    die(mysqli_connect_error());
  else
    return $mysqli;
}

/* Queries the database */
function query($sql){
  $mysqli = connect();
  $result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
  return $result;
}

/* Sanitizes the given input.  */
function sanitize($text){
  $body = trim($text);
  $body = strip_tags($body);
  $mysqli = connect();
  $mysqli->real_escape_string($body);
  $body = htmlentities($body);
  
  return $body;
}

/* Adds the user to the name table. If the user exists, it will update the entry. */
function set_name($from, $name){
  $result = query("SELECT * FROM name WHERE from = '$from' LIMIT 1");
  if($result->num_rows > 0) {
    query("UPDATE name SET name = '$name' WHERE from = '$from'");
  } else {
    query("INSERT INTO name (name, from) VALUES ('$name', '$from')");
  }
}

/* Add a text to the table texts */
function add_text($text, $from){
  $time = time();
  query("INSERT INTO texts (text, number, timestamp) VALUES ('$text', '$from', '$time')");
}

?>