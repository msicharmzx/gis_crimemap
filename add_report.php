<?php
session_start();

// Check if the user is logged in; if not, redirect to login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add Report</h1>
    <form action="submit_report.php" method="post"> <!-- Action to handle form submission -->
        
        <label for="blotter_number">BLOTTER NUMBER:</label>
        <input type="text" id="blotter_number" name="blotter_number" required><br>

        <label for="date_encoded">DATE ENCODED:</label>
        <input type="date" id="date_encoded" name="date_encoded" required><br>

        <label for="pro">PRO:</label>
        <input type="text" id="pro" name="pro" value="PRO 4-B" required><br>

        <label for="ppo">PPO:</label>
        <input type="text" id="ppo" name="ppo" value="ROMBLON PPO" required><br>

        <label for="station">STATION:</label>
        <input type="text" id="station" name="station" value="San Agustin MPS" required><br>

        <label for="pcp">PCP:</label>
        <input type="text" id="pcp" name="pcp" required><br>

        <label for="barangay">BARANGAY:</label>
        <select id="barangay" name="barangay" required>
        <option value="" disabled selected>Select Barangay</option>
        <option value="Bachawan">Bachawan</option>
        <option value="Binonga-an">Binonga-an</option>
        <option value="Buli">Buli</option>
        <option value="Cabolutan">Cabolutan</option>
        <option value="Cagbo-aya">Cagbo-aya</option>
        <option value="Camantaya">Camantaya</option>
        <option value="Carmen">Carmen</option>
        <option value="Cawayan">Cawayan</option>
        <option value="Doña Juana">Doña Juana</option>
        <option value="Dubduban">Dubduban</option>
        <option value="Hinugusan">Hinugusan</option>
        <option value="Lusong">Lusong</option>
        <option value="Mahabangbaybay">Mahabangbaybay</option>
        <option value="Poblacion">Poblacion</option>
        <option value="Sugod">Sugod</option>
        </select><br>


        <label for="street">STREET:</label>
        <input type="text" id="street" name="street" required><br>

        <label for="date_reported">DATE REPORTED:</label>
        <input type="date" id="date_reported" name="date_reported" required><br>

        <label for="time_reported">TIME REPORTED:</label>
        <input type="time" id="time_reported" name="time_reported" required><br>

        <label for="date_committed">DATE COMMITTED:</label>
        <input type="date" id="date_committed" name="date_committed" required><br>

        <label for="time_committed">TIME COMMITTED:</label>
        <input type="time" id="time_committed" name="time_committed" required><br>

        <label for="incident_type">INCIDENT TYPE:</label>
        <input type="text" id="incident_type" name="incident_type" required><br>

        <label for="stages_of_felony">STAGES OF FELONY:</label>
        <input type="text" id="stages_of_felony" name="stages_of_felony" required><br>

        <label for="offense">OFFENSE:</label>
        <input type="text" id="offense" name="offense" required><br>

        <label for="offense_category">OFFENSE CATEGORY:</label>
        <input type="text" id="offense_category" name="offense_category" required><br>

        <label for="crime_category">CRIME CATEGORY:</label>
        <input type="text" id="crime_category" name="crime_category" required><br>

        <label for="modus">MODUS:</label>
        <input type="text" id="modus" name="modus" required><br>

        <label for="mrs">MRS:</label>
        <input type="text" id="mrs" name="mrs" required><br>

        <label for="suspect_motive">SUSPECT MOTIVE:</label>
        <input type="text" id="suspect_motive" name="suspect_motive" required><br>

        <label for="suspect_sub_motive">SUSPECT SUB-MOTIVE:</label>
        <input type="text" id="suspect_sub_motive" name="suspect_sub_motive" required><br>

        <label for="private_public">PRIVATE/PUBLIC:</label>
        <input type="text" id="private_public" name="private_public" required><br>

        <label for="victims_name">VICTIMS Name:</label>
        <input type="text" id="victims_name" name="victims_name" required><br>

        <label for="victims_status">VICTIMS Status:</label>
        <input type="text" id="victims_status" name="victims_status" required><br>

        <label for="victims_age">VICTIMS Age:</label>
        <input type="number" id="victims_age" name="victims_age" required><br>

        <label for="victims_gender">VICTIMS Gender:</label>
        <input type="text" id="victims_gender" name="victims_gender" required><br>

        <label for="victims_occupation">VICTIMS Occupation:</label>
        <input type="text" id="victims_occupation" name="victims_occupation" required><br>

        <label for="victim_is_ego">VICTIM IS EGO:</label>
        <input type="text" id="victim_is_ego" name="victim_is_ego" required><br>

        <label for="victim_ego_position">VICTIM EGO POSITION:</label>
        <input type="text" id="victim_ego_position" name="victim_ego_position" required><br>

        <label for="victim_ego_class">VICTIM EGO CLASS:</label>
        <input type="text" id="victim_ego_class" name="victim_ego_class" required><br>

        <label for="victims_nationality">VICTIMS Nationality:</label>
        <input type="text" id="victims_nationality" name="victims_nationality" required><br>

        <label for="victims_sector">VICTIMS Sector:</label>
        <input type="text" id="victims_sector" name="victims_sector" required><br>

        <label for="victims_ethnic_group">VICTIMS Ethnic Group:</label>
        <input type="text" id="victims_ethnic_group" name="victims_ethnic_group" required><br>

        <label for="suspects_name">SUSPECTS Name:</label>
        <input type="text" id="suspects_name" name="suspects_name" required><br>

        <label for="suspects_status">SUSPECTS Status:</label>
        <input type="text" id="suspects_status" name="suspects_status" required><br>

        <label for="suspects_age">SUSPECTS Age:</label>
        <input type="number" id="suspects_age" name="suspects_age" required><br>

        <label for="suspects_gender">SUSPECTS Gender:</label>
        <input type="text" id="suspects_gender" name="suspects_gender" required><br>

        <label for="suspects_occupation">SUSPECTS Occupation:</label>
        <input type="text" id="suspects_occupation" name="suspects_occupation" required><br>

        <label for="suspect_is_ego">SUSPECT IS EGO:</label>
        <input type="text" id="suspect_is_ego" name="suspect_is_ego" required><br>

        <label for="suspect_ego_position">SUSPECT EGO POSITION:</label>
        <input type="text" id="suspect_ego_position" name="suspect_ego_position" required><br>

        <label for="suspect_ego_class">SUSPECT EGO CLASS:</label>
        <input type="text" id="suspect_ego_class" name="suspect_ego_class" required><br>

        <label for="suspects_nationality">SUSPECTS Nationality:</label>
        <input type="text" id="suspects_nationality" name="suspects_nationality" required><br>

        <label for="suspects_education">SUSPECTS Education:</label>
        <input type="text" id="suspects_education" name="suspects_education" required><br>

        <label for="suspects_drug_used">SUSPECTS Drug Used:</label>
        <input type="text" id="suspects_drug_used" name="suspects_drug_used" required><br>

        <label for="suspects_alcohol_used">SUSPECTS Alcohol Used:</label>
        <input type="text" id="suspects_alcohol_used" name="suspects_alcohol_used" required><br>

        <label for="suspects_group_affiliation">SUSPECTS Group Affiliation:</label>
        <input type="text" id="suspects_group_affiliation" name="suspects_group_affiliation" required><br>

        <label for="suspects_relation_to_victim">SUSPECTS Relation to Victim:</label>
        <input type="text" id="suspects_relation_to_victim" name="suspects_relation_to_victim" required><br>

        <label for="suspects_motive">SUSPECTS Motive:</label>
        <input type="text" id="suspects_motive" name="suspects_motive" required><br>

        <label for="weapons_used">Weapons Used:</label>
        <input type="text" id="weapons_used" name="weapons_used" required><br>

        <label for="vehicle_used">Vehicle Used:</label>
        <input type="text" id="vehicle_used" name="vehicle_used" required><br>

        <label for="firearms_used">Firearms Used:</label>
        <input type="text" id="firearms_used" name="firearms_used" required><br>

        <label for="firearms_serial_no">FIREARMS SERIAL NOS:</label>
        <input type="text" id="firearms_serial_no" name="firearms_serial_no" required><br>

        <label for="narrative">Narrative:</label>
        <input type="text" id="narrative" name="narrative" required><br>

        <label for="case_status">CASE STATUS:</label>
        <input type="text" id="case_status" name="case_status" required><br>

        <label for="case_solved_type">CASE SOLVED TYPE:</label>
        <input type="text" id="case_solved_type" name="case_solved_type" required><br>

        <label for="case_progress_old">CASE PROGRESS (OLD):</label>
        <input type="text" id="case_progress_old" name="case_progress_old" required><br>

        <label for="case_status_prosecution_new">CASE STATUS IN PROSECUTION (NEW):</label>
        <input type="text" id="case_status_prosecution_new" name="case_status_prosecution_new" required><br>

        <label for="grounds_for_dismissal">If Dismissed-Grounds for Dismissal:</label>
        <input type="text" id="grounds_for_dismissal" name="grounds_for_dismissal" required><br>

        <label for="type_of_filing_new">TYPE OF FILING (NEW):</label>
        <input type="text" id="type_of_filing_new" name="type_of_filing_new" required><br>

        <label for="date_filed_prosecutors_office">Date Filed in Prosecutor`s Office:</label>
        <input type="date" id="date_filed_prosecutors_office" name="date_filed_prosecutors_office" required><br>

        <label for="isdocket_number_prosecutor">IS/Docket Number Prosecutor:</label>
        <input type="text" id="isdocket_number_prosecutor" name="isdocket_number_prosecutor" required><br>

        <label for="case_court_status_new">CASE COURT STATUS (NEW):</label>
        <input type="text" id="case_court_status_new" name="case_court_status_new" required><br>

        <label for="date_filed_court">Date Filed in Court of Law:</label>
        <input type="date" id="date_filed_court" name="date_filed_court" required><br>

        <label for="criminal_case_number">Criminal Case Number:</label>
        <input type="text" id="criminal_case_number" name="criminal_case_number" required><br>

        <label for="judge">Judge:</label>
        <input type="text" id="judge" name="judge" required><br>

        <label for="court_branch">Court/Branch:</label>
        <input type="text" id="court_branch" name="court_branch" required><br>

        <label for="latitude">LATITUDE:</label>
        <input type="text" id="latitude" name="latitude" required><br>

        <label for="longitude">LONGITUDE:</label>
        <input type="text" id="longitude" name="longitude" required><br>

        <label for="victims_count">VICTIMS COUNT:</label>
        <input type="number" id="victims_count" name="victims_count" required><br>

        <label for="suspects_count">SUSPECTS COUNT:</label>
        <input type="number" id="suspects_count" name="suspects_count" required><br>

        <label for="date_encoded2">DATE ENCODED2:</label>
        <input type="date" id="date_encoded2" name="date_encoded2" required><br>

        <label for="investigator">INVESTIGATOR:</label>
        <input type="text" id="investigator" name="investigator" required><br>

        <label for="head_investigator">HEAD INVESTIGATOR:</label>
        <input type="text" id="head_investigator" name="head_investigator" required><br>

        <label for="place_of_commission">PLACE OF COMMISSION:</label>
        <input type="text" id="place_of_commission" name="place_of_commission" required><br>

        <label for="robbery_establishment_type">ROBBERY Establishment Type:</label>
        <input type="text" id="robbery_establishment_type" name="robbery_establishment_type" required><br>

        <label for="robbery_establishment_name">ROBBERY Establishment Name:</label>
        <input type="text" id="robbery_establishment_name" name="robbery_establishment_name" required><br>

        <input type="submit" value="Submit Report">

        <!-- Return to Home Page Button -->
        <div style="margin-top: 20px;">
            <a href="index.php" class="btn-home">Return to Home Page</a>
        </div>
    </form>

    
</body>
</html>
