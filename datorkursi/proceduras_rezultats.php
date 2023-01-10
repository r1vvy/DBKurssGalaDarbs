<?php
    require_once('config.php');
    include('head.php');
    include('nav.php');
    // get query from $_POST array
    $query = $_POST["procedura"];
    echo '<div class="container-fluid d-flex" style="justify-content: center">';
    echo '<div class="row">';
    echo '<div class="col-12 shadow p-3 mb-5 bg-body rounded mx-3">';
    echo '<h1 class="display-3" style="text-align: center">Procedūra</h1>';
    echo '<pre>'.$query.'</pre>';
    // execute the query
    $result = $conn -> query($query);
    // is $_POST array's length larger than 1
    if (count($_POST) > 1)
    {
        echo '<h1 class="display-6">Rezultāts:</h1>';
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
                echo '<table class="table table-striped">';
                echo '<thead>';
                echo '<tr>';
                // get column names
                $j = 0;
                while ($j < $result->field_count)
                {
                    $meta = $result->fetch_field_direct($j);
                    echo '<th scope="col">'.$meta->name.'</th>';
                    $j++;
                }
                echo '</tr>';
                // get data
                echo '</thead>';
                echo '<tbody>';
                while ($row = $result->fetch_assoc())
                {
                    echo '<tr>';
                    foreach ($row as $key => $value)
                    {
                        echo '<td>'.$value.'</td>';
                    }
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            }
            $i++;
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
