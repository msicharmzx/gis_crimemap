<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "report_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query to get the specific report by ID
    $sql = "SELECT * FROM reports WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $report = $result->fetch_assoc();

    // Close the statement
    $stmt->close();
} else {
    echo "No report ID provided.";
    exit;
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="detailed_report_style.css">
    <title>Report Details</title>
</head>
<body>
    <h1>Detailed Report</h1>

    <?php if ($report): ?>
        <h2>Basic Information</h2>
        <p><strong>Blotter Number:</strong> <?php echo $report['blotter_number']; ?></p>
        <p><strong>Date Encoded:</strong> <?php echo $report['date_encoded']; ?></p>
        <p><strong>PRO:</strong> <?php echo $report['pro']; ?></p>
        <p><strong>PPO:</strong> <?php echo $report['ppo']; ?></p>
        <p><strong>Station:</strong> <?php echo $report['station']; ?></p>
        <p><strong>PCP:</strong> <?php echo $report['pcp']; ?></p>
        <p><strong>Barangay:</strong> <?php echo $report['barangay']; ?></p>
        <p><strong>Street:</strong> <?php echo $report['street']; ?></p>
        <p><strong>Date Reported:</strong> <?php echo $report['date_reported']; ?></p>
        <p><strong>Time Reported:</strong> <?php echo $report['time_reported']; ?></p>
        <p><strong>Date Committed:</strong> <?php echo $report['date_committed']; ?></p>
        <p><strong>Time Committed:</strong> <?php echo $report['time_committed']; ?></p>
        <p><strong>Incident Type:</strong> <?php echo $report['incident_type']; ?></p>

        <h2>Offense Details</h2>
        <p><strong>Stages of Felony:</strong> <?php echo $report['stages_of_felony']; ?></p>
        <p><strong>Offense:</strong> <?php echo $report['offense']; ?></p>
        <p><strong>Offense Category:</strong> <?php echo $report['offense_category']; ?></p>
        <p><strong>Crime Category:</strong> <?php echo $report['crime_category']; ?></p>
        <p><strong>Modus Operandi:</strong> <?php echo $report['modus']; ?></p>
        <p><strong>MRS:</strong> <?php echo $report['mrs']; ?></p>
        <p><strong>Suspect Motive:</strong> <?php echo $report['suspect_motive']; ?></p>
        <p><strong>Suspect Sub Motive:</strong> <?php echo $report['suspect_sub_motive']; ?></p>
        <p><strong>Private/Public:</strong> <?php echo $report['private_public']; ?></p>

        <h2>Victim Details</h2>
        <p><strong>Victim Name:</strong> <?php echo $report['victims_name']; ?></p>
        <p><strong>Victim Status:</strong> <?php echo $report['victims_status']; ?></p>
        <p><strong>Victim Age:</strong> <?php echo $report['victims_age']; ?></p>
        <p><strong>Victim Gender:</strong> <?php echo $report['victims_gender']; ?></p>
        <p><strong>Victim Occupation:</strong> <?php echo $report['victims_occupation']; ?></p>
        <p><strong>Victim EGO:</strong> <?php echo $report['victim_is_ego']; ?></p>
        <p><strong>Victim EGO Position:</strong> <?php echo $report['victim_ego_position']; ?></p>
        <p><strong>Victim EGO Class:</strong> <?php echo $report['victim_ego_class']; ?></p>
        <p><strong>Victim Nationality:</strong> <?php echo $report['victims_nationality']; ?></p>
        <p><strong>Victim Sector:</strong> <?php echo $report['victims_sector']; ?></p>
        <p><strong>Victim Ethnic Group:</strong> <?php echo $report['victims_ethnic_group']; ?></p>

        <h2>Suspect Details</h2>
        <p><strong>Suspect Name:</strong> <?php echo $report['suspects_name']; ?></p>
        <p><strong>Suspect Status:</strong> <?php echo $report['suspects_status']; ?></p>
        <p><strong>Suspect Age:</strong> <?php echo $report['suspects_age']; ?></p>
        <p><strong>Suspect Gender:</strong> <?php echo $report['suspects_gender']; ?></p>
        <p><strong>Suspect Occupation:</strong> <?php echo $report['suspects_occupation']; ?></p>
        <p><strong>Suspect EGO:</strong> <?php echo $report['suspect_is_ego']; ?></p>
        <p><strong>Suspect EGO Position:</strong> <?php echo $report['suspect_ego_position']; ?></p>
        <p><strong>Suspect EGO Class:</strong> <?php echo $report['suspect_ego_class']; ?></p>
        <p><strong>Suspect Nationality:</strong> <?php echo $report['suspects_nationality']; ?></p>
        <p><strong>Suspect Education:</strong> <?php echo $report['suspects_education']; ?></p>
        <p><strong>Suspect Drug Use:</strong> <?php echo $report['suspects_drug_used']; ?></p>
        <p><strong>Suspect Alcohol Use:</strong> <?php echo $report['suspects_alcohol_used']; ?></p>
        <p><strong>Suspect Group Affiliation:</strong> <?php echo $report['suspects_group_affiliation']; ?></p>
        <p><strong>Suspect Relation to Victim:</strong> <?php echo $report['suspects_relation_to_victim']; ?></p>
        <p><strong>Suspect Motive:</strong> <?php echo $report['suspects_motive']; ?></p>

        <h2>Case Information</h2>
        <p><strong>Weapons Used:</strong> <?php echo $report['weapons_used']; ?></p>
        <p><strong>Vehicle Used:</strong> <?php echo $report['vehicle_used']; ?></p>
        <p><strong>Firearms Used:</strong> <?php echo $report['firearms_used']; ?></p>
        <p><strong>Firearms Serial No.:</strong> <?php echo $report['firearms_serial_no']; ?></p>
        <p><strong>Narrative:</strong> <?php echo $report['narrative']; ?></p>
        <p><strong>Case Status:</strong> <?php echo $report['case_status']; ?></p>
        <p><strong>Case Solved Type:</strong> <?php echo $report['case_solved_type']; ?></p>
        <p><strong>Case Progress (Old):</strong> <?php echo $report['case_progress_old']; ?></p>
        <p><strong>Case Status in Prosecution (New):</strong> <?php echo $report['case_status_in_prosecution_new']; ?></p>
        <p><strong>Grounds for Dismissal:</strong> <?php echo $report['grounds_for_dismissal']; ?></p>
        <p><strong>Type of Filing (New):</strong> <?php echo $report['type_of_filing_new']; ?></p>

        <h2>Prosecution and Court Information</h2>
        <p><strong>Date Filed (Prosecutor's Office):</strong> <?php echo $report['date_filed_prosecutors_office']; ?></p>
        <p><strong>Docket Number (Prosecutor):</strong> <?php echo $report['isdocket_number_prosecutor']; ?></p>
        <p><strong>Case Status (Court):</strong> <?php echo $report['case_court_status_new']; ?></p>
        <p><strong>Date Filed (Court):</strong> <?php echo $report['date_filed_court']; ?></p>
        <p><strong>Criminal Case Number:</strong> <?php echo $report['criminal_case_number']; ?></p>
        <p><strong>Judge:</strong> <?php echo $report['judge']; ?></p>
        <p><strong>Court Branch:</strong> <?php echo $report['court_branch']; ?></p>

        <h2>Location</h2>
        <p><strong>Latitude:</strong> <?php echo $report['latitude']; ?></p>
        <p><strong>Longitude:</strong> <?php echo $report['longitude']; ?></p>
        <p><strong>Place of Commission:</strong> <?php echo $report['place_of_commission']; ?></p>

        <h2>Robbery Information (if applicable)</h2>
        <p><strong>Establishment Type:</strong> <?php echo $report['robbery_establishment_type']; ?></p>
        <p><strong>Establishment Name:</strong> <?php echo $report['robbery_establishment_name']; ?></p>

    <?php else: ?>
        <p>No details found for this report.</p>
    <?php endif; ?>

    
    <!-- Return to View Reports Button -->
    <a href="view_reports.php" class="return-link">Return to View Reports</a>
    

</body>
</html>
