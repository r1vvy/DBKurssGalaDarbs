<?php
    echo "<meta charset='utf-8'>";
    $dblocation='localhost'; //mainīgais
    $dbuser='root';
    $dbpasswd="";
    $dbname = "kajasbumba";
    $conn = new mysqli($dblocation, $dbuser, $dbpasswd);
    // if ($conn->connect_error) {
    //     echo "Nevar savienoties ar DB: " . $conn->connect_error;
    // } 
    // else echo "Savienojums ar DB ir izveidots!";
    // //kodējums DB
    // echo "<br/>Kodējums: ". $conn->character_set_name();//apskatiit kodējumu
    // if(!$conn->character_set_name()=="utf8")//ja nav utf8
    // {
    //     $conn->set_charset("utf8");//uzstāda kodējumu
    // }
    $query="use kajasbumba";
    $result=$conn->query($query);

    // -------------------------------------------
    // 1.
    /*
    $query = "SELECT 2 + 2";
    // 2.
    $result = $conn->query($query);
    // 3.
    $row = $result->fetch_assoc();
    //print_r($row);
    echo "<br>".$query." = ".$row["2 + 2"];
    */
    // -------------------------------------------
    /*
    $query="select pow(2,8)";
    $resultats=$conn->query($query); //objekts
    $rinda=$resultats->fetch_assoc(); //1.rezultata rinda
    echo "<br/>".$query." = ".$rinda["pow(2,8)"];
    */
?>
