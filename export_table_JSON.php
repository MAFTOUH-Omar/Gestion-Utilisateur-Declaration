<?php
// create a PDO connection to the database
require 'db.php';

// select the table you want to export
$table_name = 'user';
$query = "SELECT * FROM user";
$stmt = $conn->prepare($query);
$stmt->execute();

// create an array of column names
$headers = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $headers['id'] = $row['id'];
    $headers['nom'] = $row['nom'];
    $headers['prenom'] = $row['prenom'];
    $headers['email'] = $row['email'];
    $headers['tel'] = $row['tel'];
}

// create a CSV file and write the table data to it
$file_name = 'user.json';
$file_handle = fopen($file_name, 'w');
fputcsv($file_handle, $headers);

// fetch the table data and write it to the CSV file
$query = "SELECT * FROM $table_name";
$stmt = $conn->prepare($query);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($file_handle, $row);
}

fclose($file_handle);

// set the header and content type for the download
header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="' . $file_name . '";');

// read the CSV file and output it to the browser
readfile($file_name);
exit;
?>