<?php
include 'dbconnection.php'; // Connect to your DB

$message = '';

if (isset($_POST['import'])) {
    $file = $_FILES['csv_file']['tmp_name'];

    if ($_FILES['csv_file']['size'] > 0) {
        $handle = fopen($file, 'r');
        fgetcsv($handle); // Skip header

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if (count($data) < 6) {
                continue; // Skip rows with missing fields
            }

            $customer_name   = mysqli_real_escape_string($con, $data[0]);
            $customer_number = mysqli_real_escape_string($con, $data[1]);
            $account_manager = mysqli_real_escape_string($con, $data[2]);
            $type_of_lead    = mysqli_real_escape_string($con, $data[3]);
            $description     = mysqli_real_escape_string($con, $data[4]);
            $date =
            $lead_date       = mysqli_real_escape_string($con, $data[5]);

            $query = "INSERT INTO leads (CN, CNO, AM, TL, Description, Date)
                      VALUES ('$customer_name', '$customer_number', '$account_manager', '$type_of_lead', '$description', '$lead_date')";

            if (!mysqli_query($con, $query)) {
                echo "Error importing row: " . mysqli_error($con) . "<br>";
            }
        }

        fclose($handle);
        $message = "CSV data imported successfully.";
    } else {
        $message = "Please upload a valid CSV file.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Import Leads CSV</title>
</head>
<body>

<h3>Import CSV File</h3>

<?php if (!empty($message)) echo "<p style='color: green;'>$message</p>"; ?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="csv_file" accept=".csv" required>
    <br><br>
    <input type="submit" name="import" value="Import"
           style="padding: 10px 20px; background-color: #2196F3; color: white; border: none; border-radius: 5px;">
</form>

</body>
</html>
