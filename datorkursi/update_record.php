<?php
require_once("config.php");

if(isset($_POST['update'])) 
{
  $table = $_POST['table'];
  $primary_key = array_keys($_POST)[1];
  
  $set_clause = "";
  foreach ($_POST as $field_name => $field_value) {
      if ($field_name != $primary_key && $field_name != "table" && $field_name != "update") {
      if ($set_clause != "") {
        $set_clause .= ", ";
      }
      $set_clause .= "$field_name='$field_value'";
    }
  }
  
  $query = "UPDATE $table SET $set_clause WHERE $primary_key = $_POST[$primary_key]";
  
  // if query is successful, redirect to the table.php
  if ($conn->query($query) === TRUE) {
      header("Location: table.php?table=$table");
  } else {
      echo "<p>Error updating record: </p><br>
      <pre>" . $conn->error. "</pre>";
  }
}




