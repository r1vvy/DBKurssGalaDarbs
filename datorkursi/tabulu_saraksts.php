<?php
    require_once("config.php");
    $query = 'show tables';
    $result=$conn->query($query);

    echo '<ul class="list-group list-group-flush list-group-numbered">';
    while ($row = $result->fetch_assoc())
    {
        echo '<li class="list-group-item">'.$row["Tables_in_kajasbumba"].'</li>';
    }
    echo '</ul>';
?>