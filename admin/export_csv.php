<?php
// Include DB connection
include 'dbconnection.php';

// Set headers to force download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=leads_export.csv');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Output column headings
fputcsv($output, ['ID', 'Customer Name', 'Customer Number', 'Account Manager', 'Type Of Lead', 'Description','Created Date']);

// Fetch the data
$query = "SELECT id, CN, CNO, AM, TL, Description, Date FROM leads";
$result = mysqli_query($con, $query);

// Output each row to the CSV
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

fclose($output);
exit;
?>
