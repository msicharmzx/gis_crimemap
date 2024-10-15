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

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO reports (
    blotter_number, date_encoded, pro, ppo, station, pcp, barangay, street, date_reported, 
    time_reported, date_committed, time_committed, incident_type, stages_of_felony, offense, 
    offense_category, crime_category, modus, mrs, suspect_motive, suspect_sub_motive, private_public, 
    victims_name, victims_status, victims_age, victims_gender, victims_occupation, victim_is_ego, 
    victim_ego_position, victim_ego_class, victims_nationality, victims_sector, victims_ethnic_group, 
    suspects_name, suspects_status, suspects_age, suspects_gender, suspects_occupation, suspect_is_ego, 
    suspect_ego_position, suspect_ego_class, suspects_nationality, suspects_education, suspects_drug_used, 
    suspects_alcohol_used, suspects_group_affiliation, suspects_relation_to_victim, suspects_motive, 
    weapons_used, vehicle_used, firearms_used, firearms_serial_no, narrative, case_status, case_solved_type, 
    case_progress_old, case_status_in_prosecution_new, grounds_for_dismissal, type_of_filing_new, 
    date_filed_prosecutors_office, isdocket_number_prosecutor, case_court_status_new, date_filed_court, 
    criminal_case_number, judge, court_branch, latitude, longitude, victims_count, suspects_count, 
    date_encoded2, investigator, head_investigator, place_of_commission, robbery_establishment_type, 
    robbery_establishment_name
) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss", 

    $_POST['blotter_number'],
    $_POST['date_encoded'],
    $_POST['pro'],
    $_POST['ppo'],
    $_POST['station'],
    $_POST['pcp'],
    $_POST['barangay'],
    $_POST['street'],
    $_POST['date_reported'],
    $_POST['time_reported'],
    $_POST['date_committed'],
    $_POST['time_committed'],
    $_POST['incident_type'],
    $_POST['stages_of_felony'],
    $_POST['offense'],
    $_POST['offense_category'],
    $_POST['crime_category'],
    $_POST['modus'],
    $_POST['mrs'],
    $_POST['suspect_motive'],
    $_POST['suspect_sub_motive'],
    $_POST['private_public'],
    $_POST['victims_name'],
    $_POST['victims_status'],
    $_POST['victims_age'],
    $_POST['victims_gender'],
    $_POST['victims_occupation'],
    $_POST['victim_is_ego'],
    $_POST['victim_ego_position'],
    $_POST['victim_ego_class'],
    $_POST['victims_nationality'],
    $_POST['victims_sector'],
    $_POST['victims_ethnic_group'],
    $_POST['suspects_name'],
    $_POST['suspects_status'],
    $_POST['suspects_age'],
    $_POST['suspects_gender'],
    $_POST['suspects_occupation'],
    $_POST['suspect_is_ego'],
    $_POST['suspect_ego_position'],
    $_POST['suspect_ego_class'],
    $_POST['suspects_nationality'],
    $_POST['suspects_education'],
    $_POST['suspects_drug_used'],
    $_POST['suspects_alcohol_used'],
    $_POST['suspects_group_affiliation'],
    $_POST['suspects_relation_to_victim'],
    $_POST['suspects_motive'],
    $_POST['weapons_used'],
    $_POST['vehicle_used'],
    $_POST['firearms_used'],
    $_POST['firearms_serial_no'],
    $_POST['narrative'],
    $_POST['case_status'],
    $_POST['case_solved_type'],
    $_POST['case_progress_old'],
    $_POST['case_status_in_prosecution_new'],
    $_POST['grounds_for_dismissal'],
    $_POST['type_of_filing_new'],
    $_POST['date_filed_prosecutors_office'],
    $_POST['isdocket_number_prosecutor'],
    $_POST['case_court_status_new'],
    $_POST['date_filed_court'],
    $_POST['criminal_case_number'],
    $_POST['judge'],
    $_POST['court_branch'],
    $_POST['latitude'],
    $_POST['longitude'],
    $_POST['victims_count'],
    $_POST['suspects_count'],
    $_POST['date_encoded2'],
    $_POST['investigator'],
    $_POST['head_investigator'],
    $_POST['place_of_commission'],
    $_POST['robbery_establishment_type'],
    $_POST['robbery_establishment_name']
);


// Execute the statement
if ($stmt->execute()) {
    echo "<script>
        alert('Report submitted successfully!');
        window.location.href = 'add_report.php';
    </script>";
} else {
    echo "<script>alert('Error: " . addslashes($stmt->error) . "');</script>";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
