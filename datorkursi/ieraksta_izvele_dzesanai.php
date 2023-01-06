<?php
require_once("config.php");
echo '<a href="tabulas_izvele_dzesanai.php">Atpakaļ</a>';
// sanemam tables nosaukumu
$table = $_POST["table"];
echo '<h3>Tabulas "' . $table . '" saturs</h3>';
// izpilda vaicajumu select * from table
$query = "select * from " . $table;
$result = $conn->query($query);

//tables datu izvads
$lauku_nosaukumi = $result->fetch_fields();
//$i=1;

echo "<table>";
//1.tables rinda, kura sarakstīti lauku nosaukumi
echo '<tr >'; //tables 1.rindina
foreach ($lauku_nosaukumi as $elements) {
    echo '<th>';
    echo $elements->name;
    echo '</th>';
}
echo '</tr>';

//tables dati
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    foreach ($row as $item) {
        echo '<td>';
        echo $item;
        echo '</td>';
    } //foreach
    echo '</tr>';
}
echo "</table>";

// input the id or id's to delete from the table
// add an "add more" button to the form to add more id's to delete
echo '
<form action="dzesanas_rezultats.php" method="POST">
    <input type="hidden" name="table" value="' . $table . '">
    <input type="text" name="recordID" placeholder="Ievadiet ID">
    <input type="submit" value="Dzēst">
</form>
';
