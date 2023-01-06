<?php
require_once("config.php");

if(isset($_POST['delete'])){
    $table = $_POST['table'];
    $primary_key = array_keys($_POST)[1];
    $query = "DELETE FROM $table WHERE $primary_key = '$_POST[$primary_key]'";

    if ($conn->query($query) === TRUE) 
    {
        header("Location: table.php?table=$table");
    } else {
        echo "<p>Error deleting record: </p><br>
        <pre>" . $conn->error. "</pre>";
    }
}



