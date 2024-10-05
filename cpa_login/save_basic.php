<?php
session_start();  // Start the session
include 'db.php';

// Fetch POST data
$refid = $_POST['refid'] ?? '';
$applicant_name = $_POST['applicant_name'] ?? '';
$zone = $_POST['zone'] ?? '';  // Assuming refid is received from the frontend
$region = $_POST['region'] ?? '';
$branch_name = $_POST['branch_name'] ?? '';
$leviosa_stage = $_POST['leviosa_stage'] ?? '';
$system_loan_amount = $_POST['system_loan_amount'] ?? '';
$imd_utr_no = $_POST['imd_utr_no'] ?? '';
$imd_status = $_POST['imd_status'] ?? '';

if ($refid) {
    // Prepare the SQL statement
    $stmt = $conn->prepare("
        INSERT INTO form_data (
            refid, applicant_name, zone, region, branch_name, leviosa_stage, system_loan_amount, imd_utr_no, imd_status
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            applicant_name = VALUES(applicant_name),
            zone = VALUES(zone),
            region = VALUES(region),
            branch_name = VALUES(branch_name),
            leviosa_stage = VALUES(leviosa_stage),
            system_loan_amount = VALUES(system_loan_amount),
            imd_utr_no = VALUES(imd_utr_no),
            imd_status = VALUES(imd_status)
    ");
    
    // Check if the statement is prepared successfully
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param(
        'sssssssss',
        $refid, $applicant_name, $zone, $region, $branch_name, $leviosa_stage, $system_loan_amount, $imd_utr_no, $imd_status
    );
    
    // Execute the statement
    if ($stmt->execute()) {
        // Store refid in the session after successful save
        $_SESSION['refid'] = $refid;

        echo "<script type='text/javascript'>
        alert('Data has been successfully saved!');
        window.location.href='screening.html';
        document.getElementById('basic').reset();
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Error: Data could not be saved!');
        window.location.href='basic_cpa_detail.php';
        </script>";
    }
    
    // Close the statement
    $stmt->close();
} else {
    echo "<script type='text/javascript'>
    window.location.href='screening.html';
    </script>";
}

// Close the database connection
$conn->close();
?>
