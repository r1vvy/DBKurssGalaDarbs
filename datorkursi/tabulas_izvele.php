<?php
require_once("config.php");
include('head.php');
include('nav.php');
echo '<h3>Izvēlaties tabulu:</h3>';
$query = 'show tables';
$result = $conn->query($query);
//$row = $result->fetch_assoc();
//print_r($row);

//echo '<th>header</th>';
$i = 1;
while ($row = $result->fetch_assoc()) {
    echo $i . ". " . $row["Tables_in_kajasbumba"] . '<br/>';
    $i++;
}
echo '<br/>';
// forma
echo
'<form action="table.php" method="get">
    <label for="table">Ievadiet tabulas nosaukumu:</label>
    <input type="text" name="table" required="required">
    <input type="submit" value="Tabulas saturs">
    </form>';
