<?php
require_once("config.php");
echo '<a href="tabulas_izvele.php">Atpakaļ</a>';
echo '<h1>Tabulas saturs</h1>';

$table = $_GET['table'];
$query = "SELECT * FROM $table LIMIT 1";
$result = $conn->query($query);
$field_names = $result->fetch_fields();
$primary_key = $field_names[0]->name;

echo '<table>
    <tr>';
foreach ($field_names as $field) {
    echo '<th>' . $field->name . '</th>';
}
echo '<th colspan="2">Action</th>
    </tr>';
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
                <input type="submit" name="update" value="Update">
            </form>
            </td>
            <td>
            <form action="delete_record.php" method="post">
                <input type="hidden" name="table" value="' . $table . '">
                <input type="hidden" name="' . $primary_key . '" value="' . $row[$field_names[0]->name] . '">
                <input type="submit" name="delete" value="Delete">
            </form>
            </td>
            </tr>';
    }
    echo '</table>';
    # TODO Script to add a new record to the table with a form field for each column and a submit button
    # Hide the form by default and show it when the button is clicked
} else {
    echo "0 results";
}

// add record form
echo '<br/>';
echo '<form action="add_record.php" method="post">
    <input type="hidden" name="table" value="' . $table . '">';
for ($i = 1; $i < count($field_names); $i++) {
    echo '<label for="' . $field_names[$i]->name . '">' . $field_names[$i]->name . '</label>
        <input type="text" name="' . $field_names[$i]->name . '">
        <br/>';
}
echo '<input type="submit" name="add" value="Add">
    </form>';
