<?php
require_once("config.php");
include('head.php');
include('nav.php');
$table = $_POST['table'];
$query = "SELECT * FROM $table LIMIT 1";
$result = $conn->query($query);
$field_names = $result->fetch_fields();
$field_values = $_POST;

$query = "INSERT INTO $table VALUES (NULL, ";

// Add the field values to the query
for ($i = 1; $i < count($field_names); $i++) {
    $field = $field_names[$i];
    $query .= "'" . $field_values[$field->name] . "', ";
}
// Remove the extra comma and space at the end of the field values
$query = substr($query, 0, -2);

$query .= ")";

if ($conn->query($query) === TRUE) {
    header("Location: table.php?table=$table");
} else {
    echo "<p>Error updating record: </p><br>
    <pre>" . $conn->error. "</pre>";
}