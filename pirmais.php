<?php
    echo "<meta charset='utf-8'>";
    require_once("config.php");
    echo "<h3>PHP skripts</h3>";
    $x = 5;
    $y = 3;
    echo "<p>",$x." + ".$y." = ".($x + $y),"</p>";
    echo "</br>";
    echo "<p>",$x." / ".$y." = ".round($x / $y, 2),"</p>";
    /*
    if(isset($_POST["skaitlis1"])) 
    {
        $num1 = $_POST["skaitlis1"];
        echo "</br>";
        echo "Skaitlis1 = ".$num1;
    }
    if(isset($_POST["skaitlis2"]))
    {
        $num2 = $_POST["skaitlis2"];
        echo "</br>";
        echo "Skaitlis2 = ".$num2;
    }
    */
?>