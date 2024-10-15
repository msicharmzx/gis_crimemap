<?php
session_start();

// Check if the user is logged in; if not, redirect to login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "report_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch all reports with latitude and longitude
$sql = "SELECT blotter_number, incident_type, latitude, longitude, narrative, barangay, date_committed, modus 
        FROM reports 
        WHERE incident_type IN ('(Incident) Hacking', '(Incident) Illegal Acts involving Petroleum Products', 
        '(Incident) Mauling', '(Operation) Buy Bust', '(Incident) Burning/Arson', '(Incident) Vehicular Accident', 
        '(Incident) Assault', '(Incident) Stabbing', '(Incident) Physical Injury', '(Incident) Carnapping/Motornapping')
        AND longitude IS NOT NULL AND latitude IS NOT NULL";

$result = $conn->query($sql);

// Create an array to hold the coordinates and data
$markers = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Store the report details including coordinates
        $markers[] = [
            'blotter_number' => $row['blotter_number'],
            'longitude' => $row['longitude'],
            'latitude' => $row['latitude'],
            'narrative' => $row['narrative'],
            'incident_type' => $row['incident_type'],
            'barangay' => $row['barangay'],
            'date_committed' => $row['date_committed'],
            'modus' => $row['modus']
        ];
    }
} else {
    echo "<script>alert('No reports with location data found');</script>";
}

// Close the connection
$conn->close();

// Pass the PHP array to JavaScript
$crimeDataJson = json_encode($markers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="style.css">
    <title>GIS Crime Mapping</title>
</head>
<body>
    <div class="navbar">
        <ul>
            <!-- Dropdown for year selection -->
            <li>
                <label for="year-select">When:</label>
                <select id="year-select">
                    <option value="">All Years</option> <!-- Default option for all years -->
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
            </li>
            <li><a href="#">Graph</a></li>
            <li><a href="add_report.php">Add Report</a></li>
            <li><a href="view_reports.php">Reports</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialize the map
        var map = L.map('map').setView([12.568120, 122.133659], 10); // Center coordinates and zoom level

        // Icons for different incident types
        var icons = {
            '(Incident) Hacking': L.icon({iconUrl:'hacking.svg', iconSize:[30,30]}),
            '(Incident) Illegal Acts involving Petroleum Products': L.icon({iconUrl:'illegal_trade.jpg', iconSize:[30,30]}),
            '(Incident) Mauling': L.icon({iconUrl:'mauling.jpg', iconSize:[30,30]}),
            '(Operation) Buy Bust': L.icon({iconUrl:'drugs.jpg', iconSize:[30,30]}),
        };

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // PHP array of markers passed into JavaScript
        var markers = <?php echo json_encode($markers); ?>;

        // Function to filter markers by year
        function filterMarkersByYear(year) {
            // Clear all current markers
            map.eachLayer(function(layer) {
                if (layer instanceof L.Marker) {
                    map.removeLayer(layer);
                }
            });

            // Loop through the markers and filter by the year of the incident (date_committed)
            markers.forEach(function(marker) {
                var markerYear = new Date(marker.date_committed).getFullYear();

                // Check if the year matches the selected year or if "All Years" is selected
                if (year === "" || markerYear == year) {
                    var icon = icons[marker.incident_type] || L.icon({iconUrl:'icons/default.png', iconSize:[30,30]});
                    var popupContent = 
                        "<b>Blotter Number:</b> " + marker.blotter_number + "<br>" +
                        "<b>What?:</b> " + marker.incident_type + "<br>" +
                        "<b>Where?:</b> " + marker.barangay + "<br>" +
                        "<b>When?:</b> " + marker.date_committed + "<br>" +
                        "<b>Why?:</b> " + marker.modus; 

                    // Place the filtered marker on the map
                    L.marker([marker.latitude, marker.longitude], {icon: icon})
                        .addTo(map)
                        .bindPopup(popupContent);
                }
            });
        }

        // Event listener for the year dropdown selection
        document.getElementById('year-select').addEventListener('change', function() {
            var selectedYear = this.value;
            filterMarkersByYear(selectedYear);
        });

        // Initial load of all markers (no filter applied)
        filterMarkersByYear(""); // Show all years by default
    </script>
</body>
</html>
