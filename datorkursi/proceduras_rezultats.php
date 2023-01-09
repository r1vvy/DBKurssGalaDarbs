<?php
    require_once('config.php');
    include('head.php');
    include('nav.php');
    // get query from $_POST array
    $query = $_POST["procedura"];
    echo "<h3>Procedūra</h3>";
    echo $query;
    // execute the query
    $result = $conn -> query($query);
    // is $_POST array's length larger than 1
    if (count($_POST) > 1)
    {
        echo "<h3>Rezultāts:</h3>";
        // get parameters from $_POST array
        $param = array();
        $i = 1;
        while ($i < count($_POST))
        {
            $param[] = $_POST["ieraksts".$i];
            $i++;
        }
        // execute each parameter
        $i = 0;
        while ($i < count($param))
        {
            $query = $param[$i];
            $result = $conn -> query($query);
            // if the query is a SELECT statement, return its result
            if (substr($query, 0, 6) == 'SELECT')
            {
                // output table from database
                echo '<table border="1">';
                echo '<tr>';
                // get column names
                $j = 0;
                while ($j < $result->field_count)
                {
                    $meta = $result->fetch_field_direct($j);
                    echo '<th>'.$meta->name.'</th>';
                    $j++;
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
            }
            $i++;
        }
    }
