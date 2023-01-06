<?php
    require_once("config.php");
    echo '<br/>';
    echo '<a href="index.html">Sākums</a>
        <h1>Tabulu saraksts</h1>';
    $query = 'show tables';
    $result=$conn->query($query);
    //$row = $result->fetch_assoc();
    //print_r($row);

    //echo '<th>header</th>';
    $i = 1;
    while ($row = $result->fetch_assoc())
    {
        echo $i.". ".$row["Tables_in_kajasbumba"].'<br/>';
        $i++;
    }
?>