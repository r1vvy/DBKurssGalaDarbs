<?php
    require_once("config.php");
    echo '<br/>';
    echo '<a href="tabulas_izvele.php">Atpakaļ</a>';
    $table = $_POST["table"];
    echo "<h3>Tabulas".$table." saturs</h3>";

    $query = 'select * from '.$table;
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
    while ($rinda = $result->fetch_assoc())
    {
        echo '<tr>';
        foreach ($rinda as $key => $value)
        {
            echo '<td>'.$value.'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    

?>