<?php
require_once 'config.php';
echo '
<a href="index.html">Sākums</a>
<h3>DB Tabulas izvēle</h3>
';
$query="show tables";
$result=$conn->query($query);

$i = 1;
echo "<table border='1'>";
echo "<tr><th>Npk.</th><th>Tabulas nosaukums</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $i . ".</td><td>" . $row['Tables_in_kajasbumba'] . "</td></tr>";
    $i++;
}
echo "</table>";

// Forma, lai izvēlētos tabulu
echo '
<br>
<form action="tabulas_saturs.php" method="post">
    <label for="table">Ievadiet tabulas nosaukumu</label>
    <input type="text" name="table" required>
    <input type="submit" value="Tabulas saturs">
</form>
';
