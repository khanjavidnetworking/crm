<?php
include 'dbconnection.php';

$conditions = [];
$params = [];

// Handle search inputs
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET['customer_name'])) {
        $conditions[] = "customer_name LIKE ?";
        $params[] = "%" . $_GET['customer_name'] . "%";
    }
    if (!empty($_GET['customer_number'])) {
        $conditions[] = "customer_number LIKE ?";
        $params[] = "%" . $_GET['customer_number'] . "%";
    }
    if (!empty($_GET['AM'])) {
        $conditions[] = "AM LIKE ?";
        $params[] = "%" . $_GET['AM'] . "%";
    }
    if (!empty($_GET['TL'])) {
        $conditions[] = "TL = ?";
        $params[] = $_GET['TL'];
    }
    if (!empty($_GET['description'])) {
        $conditions[] = "description LIKE ?";
        $params[] = "%" . $_GET['description'] . "%";
    }
    if (!empty($_GET['Date'])) {
        $conditions[] = "Date = ?";
        $params[] = $_GET['Date'];
    }

    $query = "SELECT * FROM leads";
    if ($conditions) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $con->prepare($query);
    if ($params) {
        $stmt->bind_param(str_repeat("s", count($params)), ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Leads</title>
</head>
<body>
    <h2>Search Leads</h2>
    <a href="home.php" style="
    display: inline-block;
    padding: 8px 16px;
    background-color: #17a2b8;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: bold;
">
    Home
</a>


    <form method="GET" style="margin-bottom: 20px;">
        <!-- <input type="text" name="customer_name" placeholder="Customer Name" value="<?= $_GET['CN'] ?? '' ?>">  -->
        <!-- <input type="text" name="customer_number" placeholder="Customer Number" value="<?= $_GET['CNO'] ?? '' ?>"> -->
        <input type="text" name="AM" placeholder="Account Manager" value="<?= $_GET['AM'] ?? '' ?>">
        
        <select name="TL">
            <option value="">-- Type of Lead --</option>
            <option value="Hot" <?= (($_GET['type_of_lead'] ?? '') == 'Hot') ? 'selected' : '' ?>>Hot</option>
            <option value="Warm" <?= (($_GET['type_of_lead'] ?? '') == 'Warm') ? 'selected' : '' ?>>Warm</option>
            <option value="Cold" <?= (($_GET['type_of_lead'] ?? '') == 'Cold') ? 'selected' : '' ?>>Cold</option>
        </select>

        <!-- <input type="text" name="description" placeholder="Description" value="<?= $_GET['Description'] ?? '' ?>"> -->
        <input type="date" name="Date" value="<?= $_GET['Date'] ?? '' ?>">
        <button type="submit">Search</button>
    </form>

    <?php if (isset($result)): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Customer Name</th>
                <th>Customer Number</th>
                <th>Account Manager</th>
                <th>Type of Lead</th>
                <th>Description</th>
                <th>Lead Date</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['CN']) ?></td>
                        <td><?= htmlspecialchars($row['CNO']) ?></td>
                        <td><?= htmlspecialchars($row['AM']) ?></td>
                        <td><?= htmlspecialchars($row['TL']) ?></td>
                        <td><?= htmlspecialchars($row['Description']) ?></td>
                        <td><?= htmlspecialchars($row['Date']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6">No results found.</td></tr>
            <?php endif; ?>
        </table>
    <?php endif; ?>
</body>
</html>
