<?php
require_once("config.php");
include('head.php');
include('nav.php');
echo '<div class="container" style="justify-content: center;">';

$table = $_GET['table'];
$query = "SELECT * FROM $table LIMIT 1";
$result = $conn->query($query);
$field_names = $result->fetch_fields();
$primary_key = $field_names[0]->name;
echo '<div class="row">';
echo '<div class="col shadow p-3 mb-5 bg-body rounded mx-3">';
echo '<h1 class="display-3" style="text-align: center">Tabulas saturs</h1>';
echo '<div class="table overflow-scroll">';
echo '<table class="table table-striped table-mobile-responsive table-mobile-sided">';
echo '<thead>';
echo '<tr>';
foreach ($field_names as $field) {
    echo '<th>'.$field->name.'</th>';
}
echo '<th colspan="2">Action</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
// Query to get all the records from the table and display them
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row[$field_names[0]->name] . '</td>';
        for ($i = 1; $i < count($field_names); $i++) {
            echo '<td>
            <form action="update_record.php" method="post">
                <input type="hidden" name="table" value="' . $table . '">
                <input type="hidden" name="' . $primary_key . '"value="' . $row[$field_names[0]->name] . '">
                <input type="text" name="' . $field_names[$i]->name . '" value="' . $row[$field_names[$i]->name] . '">
            </td>';
        }
        echo '<td>
                <input type="hidden" name="table" value="' . $table . '">
                <input type="hidden" name="' . $primary_key . '" value="' . $row[$field_names[0]->name] . '">
                <input type="submit" name="update" value="Atjaunot">
            </form>
            </td>
            <td>
            <form action="delete_record.php" method="post">
                <input type="hidden" name="table" value="' . $table . '">
                <input type="hidden" name="' . $primary_key . '" value="' . $row[$field_names[0]->name] . '">
                <input type="submit" name="delete" value="Dzēst">
            </form>
            </td>
            </tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
} else {
    echo "0 results";
}

// add record form
echo '
<div class="container-fluid d-flex" style="justify-content: center;">
<div class="row">
<div class="col-12 shadow p-3 mb-5 bg-body rounded mx-3">';
echo '<h1 class="display-6" style="text-align: center">Pievienot jaunu ierakstu</h1>';
echo '<div class="d-flex justify-content-center">';
echo '<form action="add_record.php" method="post">
    <input type="hidden" name="table" value="' . $table . '">';
for ($i = 1; $i < count($field_names); $i++) {
    echo '<label for="' . $field_names[$i]->name . '">' . $field_names[$i]->name . '</label>
        <div id="form-area">
            <input type="text" name="' . $field_names[$i]->name . '">
        </div>';
}
echo '</div>';
echo '<div class="d-flex">';
echo '<button class="btn btn-dark mx-auto my-3" type="submit">Pievienot</button>';
echo '</div>
    </form>';
echo '</div>';
echo '</div>';
echo '</div>';
