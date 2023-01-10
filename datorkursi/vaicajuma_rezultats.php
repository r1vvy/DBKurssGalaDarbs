<?php
    require_once("config.php");
    include('head.php');
    include('nav.php');
    $query = $_POST["ieraksts"];
    echo '<div class="container-fluid d-flex" style="justify-content: center">';
    echo '<div class="row">';
    echo '<div class="col-12 shadow p-3 mb-5 bg-body rounded mx-3">';
    echo '<h1 class="display-3" style="text-align: center">Vaicājums</h1>';
    echo '<pre>'.$query.'</pre>';

    echo '<h1 class="display-6">Rezultāts:</h1>';
    $result = $conn -> query($query);
    // output table from database
    echo '<div class="table overflow-scroll">';
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    // get column names
    $i = 0;
    while ($i < $result->field_count)
    {
        $meta = $result->fetch_field_direct($i);
        echo '<th scope="col">'.$meta->name.'</th>';;
        $i++;
    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
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
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
?>