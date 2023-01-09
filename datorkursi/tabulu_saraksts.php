<?php
    require_once("config.php");
    include('head.php');
    include('nav.php');
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