<?php
include 'dbconnection.php'; // database connection
include 'functions.php';

// Bulk Action Handling
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bulk_ids'])) {
    $ids = implode(",", array_map('intval', $_POST['bulk_ids']));

    if (isset($_POST['delete'])) {
        $query = "DELETE FROM leads WHERE id IN ($ids)";
    } elseif (isset($_POST['approve'])) {
        $query = "UPDATE leads SET Status='Approved' WHERE id IN ($ids)";
    } elseif (isset($_POST['unapprove'])) {
        $query = "UPDATE leads SET Status='Unapproved' WHERE id IN ($ids)";
    }

    mysqli_query($con, $query);
}

// Fetch all leads
$result = mysqli_query($con, "SELECT * FROM leads ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View All Leads</title>
</head>
<body style="font-family: Arial, sans-serif;">

<!-- HEADER -->
<div style="background: linear-gradient(to right, #003366, #3399ff); color: white; padding: 15px; display: flex; justify-content: space-between; align-items: center;">
    <div style="display: flex; align-items: center;">
        <img src="logo.png" alt="Logo" style="height: 40px; margin-right: 10px;">
        <span style="font-size: 24px; font-weight: bold;">AIPL CRM</span>
    </div>
    <div style="font-size: 28px; font-weight: bold;">View All Leads</div>
    <div id="datetime" style="font-size: 14px;"></div>
</div>

<script>
function updateDateTime() {
    const now = new Date();
    document.getElementById('datetime').textContent = now.toLocaleDateString() + ' | ' + now.toLocaleTimeString();
}
setInterval(updateDateTime, 1000);
updateDateTime();
</script>

<form action="search.php" method="GET" style="margin-bottom: 20px; padding: 10px; border: 1px solid #ccc;">
    <!-- <input type="text" name="customer_name" placeholder="Customer Name" 
        style="padding: 6px; margin-right: 5px;">
    <input type="text" name="customer_number" placeholder="Customer Number" 
        style="padding: 6px; margin-right: 5px;">
    <input type="text" name="account_manager" placeholder="Account Manager" 
        style="padding: 6px; margin-right: 5px;">
    <select name="type_of_lead" style="padding: 6px; margin-right: 5px;">
        <option value="">Type of Lead</option>
        <option value="Hot">Hot</option>
        <option value="Warm">Warm</option>
        <option value="Cold">Cold</option>
    </select>
    <input type="text" name="description" placeholder="Description" 
        style="padding: 6px; margin-right: 5px;">
    <input type="date" name="lead_date" 
        style="padding: 6px; margin-right: 5px;"> -->

    <!-- 🔍 SEARCH Button -->
    <button type="submit" style="
        padding: 4px 8px; 
        background-color: #007bff; 
        color: white; 
        border: none; 
        border-radius: 4px; 
        cursor: pointer;
    ">
        Search
    </button>
</form>

<!-- BULK ACTION FORM -->
<form method="POST" style="margin: 20px;">

    <!-- ACTION BUTTONS -->
    <div style="margin-bottom: 10px;">
        <button type="submit" name="approve" style="padding: 6px 12px; background-color: #28a745; color: white; border: none; margin-right: 5px; border-radius: 4px;">Approve</button>
        <button type="submit" name="unapprove" style="padding: 6px 12px; background-color: #ffc107; color: black; border: none; margin-right: 5px; border-radius: 4px;">Unapprove</button>
        <button type="submit" name="delete" onclick="return confirm('Are you sure to delete selected leads?');" style="padding: 6px 12px; background-color: #dc3545; color: white; border: none; border-radius: 4px;">Delete</button>
        <a href="../leads.php" style="
    display: inline-block;
    padding: 4px 8px;
    background-color: #17a2b8;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: bold;
    margin: 5px;
">
    Add New Lead
</a>

<!-- THis is Home page redirection from here   -->

<a href="home.php" style="
    display: inline-block;
    padding: 4px 8px;
    background-color: #17a2b8;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: bold;
    margin: 5px;
">
    Home
</a>
<a href="import_file.php" style="
    display: inline-block;
    padding: 8px 16px;
    background-color: #2196F3;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: bold;
    margin: 5px;
    margin-left:450px;
">
    Import File
</a>
<a href="export_csv.php" style="
    display: inline-block;
    padding: 8px 16px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: bold;
    margin: 5px;
    margin-left:5px;
">
    Export File
</a>
        <!-- <button type="submit" name="", <a href="../leads.php"></a>  style="padding: 6px 12px; background-color: #17a2b8; color: black; border: none; margin-right: 5px; border-radius: 4px;">Add New Lead</button>
        <button type="submit" name="unapprove" style="padding: 6px 12px; background-color: #17a2b8; color: black; border: none; margin-right: 5px; border-radius: 4px;">Import CSV</button>
        <button type="submit" name="unapprove" style="padding: 6px 12px; background-color: #4CAF50; color: black; border: none; margin-right: 5px; border-radius: 4px;">Export CSV</button> -->
    </div>

    <!-- LEAD TABLE -->
    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th><input type="checkbox" onclick="toggleAll(this)"></th>
                <th>Customer Name</th>
                <th>Customer Number</th>
                <th>Account Manager</th>
                <th>Type of Lead</th>
                <th>Description</th>
                <th>Lead Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><input type="checkbox" name="bulk_ids[]" value="<?= $row['id'] ?>"></td>
                    <td><?= htmlspecialchars($row['CN']) ?></td>
                    <td><?= htmlspecialchars($row['CNO']) ?></td>
                    <td><?= htmlspecialchars($row['AM']) ?></td>
                    <td><?= htmlspecialchars($row['TL']) ?></td>
                    <td><?= htmlspecialchars($row['Description']) ?></td>
                    <td><?= htmlspecialchars($row['Date']) ?></td>
                    <td><?= htmlspecialchars($row['Status']) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="8" style="text-align: center;">No leads found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</form>


<!-- SELECT ALL CHECKBOX SCRIPT -->
<script>
function toggleAll(source) {
    checkboxes = document.querySelectorAll('input[type="checkbox"][name="bulk_ids[]"]');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = source.checked;
    }
}
</script>

</body>
</html>
