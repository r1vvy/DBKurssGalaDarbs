<?php
require_once("config.php");
$recordID = $_POST["recordID"];
$table = $_POST["table"];

$query = "SELECT * FROM $table LIMIT 1";
$result = $conn->query($query);
$field_names = $result->fetch_fields();
$primary_key = $field_names[0]->name;

$query = "DELETE FROM $table WHERE $primary_key = $recordID";


if ($conn->query($query) === TRUE) 
{
    echo "<h3>Record deleted successfully</h3>";
    // TODO add button to navigate back to the table
} else {
    echo "<h3>Error deleting record: </h3>" . $conn->error;
    // TODO add a button to try again
}
