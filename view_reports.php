<?php
// Database connection parameters
$servername = "localhost"; // Change if necessary
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "report_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search functionality
$search_query = '';
if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];
    $sql = "SELECT * FROM reports WHERE blotter_number LIKE '%$search_query%'";
} else {
    $sql = "SELECT * FROM reports";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reports</title>
    <link rel="stylesheet" href="reports.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Reports</h1>

        <!-- Link to return to main page -->
        <a href="index.php" class="return-link">Return to Main Page</a> <!-- Adjust the link as necessary -->

        <form method="POST" class="search-form">
            <input type="text" name="search_query" placeholder="Search by Blotter Number" value="<?php echo htmlspecialchars($search_query); ?>" required>
            <button type="submit" name="search">Search Report</button>
        </form>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Blotter Number</th>
                        <th>Date Encoded</th>
                        <th>PRO</th>
                        <th>Barangay</th>
                        <th>Incident Type</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['blotter_number']; ?></td>
                            <td><?php echo $row['date_encoded']; ?></td>
                            <td><?php echo $row['pro']; ?></td>
                            <td><?php echo $row['barangay']; ?></td>
                            <td><?php echo $row['incident_type']; ?></td>
                            <!-- Add more data as needed -->
                            <td>
                                <!-- Button to view detailed report, passing the report's ID in the URL -->
                                <a href="detailed_report.php?id=<?php echo $row['id']; ?>" class="view-report-button">View Detailed Report</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No reports found.</p> <!-- Display this message if no reports exist -->
        <?php endif; ?>

        <?php
        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
