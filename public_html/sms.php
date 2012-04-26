<?php

require_once('../lib.php');

/* If the text contains a "REG ", register the user */
if(strtolower(substr($_POST['Body'], 0, 4)) == "reg "){
  $name = substr($_POST['Body'], 4);
  set_name(sanitize($_POST['From']), sanitize($name));
} 

/* Else just add the text */
elseif($_POST['Body'] != NULL && $_POST['From'] != NULL){
  add_text(sanitize($_POST['Body']), sanitize($_POST['From']));
}

?>