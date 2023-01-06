<?php
require_once("config.php");

echo '<a href="tabulas_izvele_ierakstam.php">Atpakaļ</a>';
$query = $_POST["ieraksts"];
// get table name from _POST variable
$table = $_POST["table"];
// execute query and return result
$result = $conn->query($query);

echo "<h3>Vaicājums</h3>";
echo '<br/>Vaicājums: ' . $query;
// select the table from the database
echo '<h3>Tabulas ' . $table . ' saturs</h3>';
echo "<table>";

$query2 = 'select * from ' . $table;
$result = $conn->query($query2);
// get field names from the result
$field_names = $result->fetch_fields();

foreach ($field_names as $elements) {
    echo '<th>';
    echo $elements->name;
    echo '</th>';
}
echo '</tr>';
//tabulas dati
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    foreach ($row as $item) {
        echo '<td>';
        echo $item;
        echo '</td>';
    }
    echo '</tr>';
}
echo "</table>";
