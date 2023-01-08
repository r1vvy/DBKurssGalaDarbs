<?php
    require_once("config.php");
    echo '<a href="vaicajumu_saraksts.html">Atpakaļ</a>';
    $query = $_POST["ieraksts"];
    echo "<h3>Vaicājums</h3>";
    echo '<br/>Vaicājums: '.$query;

    $result = $conn -> query($query);
    // output table from database
    echo '<table border="1">';
    echo '<tr>';
    // get column names
    $i = 0;
    while ($i < $result->field_count)
    {
        $meta = $result->fetch_field_direct($i);
        echo '<th>'.$meta->name.'</th>';
        $i++;
    }
    echo '</tr>';
    // get data
    while ($row = $result->fetch_assoc())
    {
        echo '<tr>';
        foreach ($row as $key => $value)
        {
            echo '<td>'.$value.'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
?>