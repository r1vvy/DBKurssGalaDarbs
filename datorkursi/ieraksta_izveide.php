<?php
require_once("config.php");
echo '<a href="tabulas_izvele_ierakstam.php">Atpakaļ</a>';
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

// TODO switch case when table is selected
echo "<h4>Piemēri datu ievietošanai</h4>";
echo "<pre>INSERT INTO `klubi` VALUES (1,'Manchester City','MNC',7,4,12345678,'mnc@mnc.com')</pre>";
echo "<pre>INSERT INTO `ligas` VALUES (1,'Premier League','PL','England',2018,'2018-09-10','2019-05-19')</pre>";
echo "<pre>INSERT INTO `ligas_klubi` VALUES (1,1,1,32,2,4,98,72,1)</pre>";
echo "<pre>INSERT INTO `speletaji` VALUES (1,'Ramsey','Aaron','M','1990-12-26','Wales','MID',5)</pre>";
echo "<pre>INSERT INTO `speletajs_statistika` VALUES (1,1,'Premier League','2018/2019',1327,28,4,6,0,0,7,12,0,0)</pre>";
echo "<pre>INSERT INTO `stadioni` VALUES (6,'Anfield','Liverpool','Anfield Rd, Anfield, Liverpool L4 0TH',54074,'Dabisks')</pre>";
echo "<pre>INSERT INTO `treneri` VALUES (1,'Emery','Unai','Spain')</pre>";

echo '
    <form action="ieraksta_rezultats.php" method="post">
    <label for="ieraksts"><b>Izveidojiet jaunu ierakstu:</b></label>
    <br>
    <textarea name="ieraksts" required rows="4" cols="80"></textarea>
    <br><br>
    <input type="submit" value="Jauna ieraksta pievienošana">     
    <input type="" name= "table" value="' . $table . '" hidden>
    </form>
    ';
