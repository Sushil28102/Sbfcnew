<?php
session_start(); // Start the session to access session variables
include 'db.php';

// Retrieve the refid from the session
$refid = $_SESSION['refid'] ?? '';

// Fetch POST data
$mask_adhar = $_POST['mask_adhar'] ?? '';
$data_entry = $_POST['data_entry'] ?? '';
$cpv_initiation_status = $_POST['cpv_initiation_status'] ?? '';
$initiation_date_cpv = $_POST['initiation_date_cpv'] ?? '';
$banking_initiation_status = $_POST['banking_initiation_status'] ?? '';
$initiation_date_banking = $_POST['initiation_date_banking'] ?? '';
$itr_initiation_status = $_POST['itr_initiation_status'] ?? '';
$initiation_date_itr = $_POST['initiation_date_itr'] ?? '';
$loanguard_initiation_status = $_POST['loanguard_initiation_status'] ?? '';
$initiation_date_loanguard = $_POST['initiation_date_loanguard'] ?? '';
$hold_reason = $_POST['hold_reason'] ?? '';
$date_of_submission = $_POST['date_of_submission'] ?? '';
$vendor_name_assessment = $_POST['vendor_name_assessment'] ?? '';
$leviosa_final_stage = $_POST['leviosa_final_stage'] ?? '';
$cpv_vendor_name = $_POST['cpv_vendor_name'] ?? '';
$banking_vendor_name = $_POST['banking_vendor_name'] ?? '';
$itr_vendor_name = $_POST['itr_vendor_name'] ?? '';
$observations = $_POST['observations'] ?? '';
$banking_plotting = $_POST['banking_plotting'] ?? '';

if ($refid) {
    // Prepare the SQL statement
    $stmt = $conn->prepare("
        INSERT INTO form_data (
            refid, mask_adhar, data_entry, cpv_initiation_status, initiation_date_cpv,
            banking_initiation_status, initiation_date_banking, itr_initiation_status,
            initiation_date_itr, loanguard_initiation_status, initiation_date_loanguard,
            hold_reason, date_of_submission, vendor_name_assessment, leviosa_final_stage, banking_plotting,
            cpv_vendor_name, banking_vendor_name, itr_vendor_name, observations
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            mask_adhar = VALUES(mask_adhar),
            data_entry = VALUES(data_entry),
            cpv_initiation_status = VALUES(cpv_initiation_status),
            initiation_date_cpv = VALUES(initiation_date_cpv),
            banking_initiation_status = VALUES(banking_initiation_status),
            initiation_date_banking = VALUES(initiation_date_banking),
            itr_initiation_status = VALUES(itr_initiation_status),
            initiation_date_itr = VALUES(initiation_date_itr),
            loanguard_initiation_status = VALUES(loanguard_initiation_status),
            initiation_date_loanguard = VALUES(initiation_date_loanguard),
            hold_reason = VALUES(hold_reason),
            date_of_submission = VALUES(date_of_submission),
            vendor_name_assessment = VALUES(vendor_name_assessment),
            leviosa_final_stage = VALUES(leviosa_final_stage),
            banking_plotting = VALUES(banking_plotting),
            cpv_vendor_name = VALUES(cpv_vendor_name),
            banking_vendor_name = VALUES(banking_vendor_name),
            itr_vendor_name = VALUES(itr_vendor_name),
            observations = VALUES(observations)
    ");
    
    // Check if the statement is prepared successfully
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    
    // Bind parameters
    $stmt->bind_param(
        'ssssssssssssssssssss',
        $refid, $mask_adhar, $data_entry, $cpv_initiation_status, $initiation_date_cpv,
        $banking_initiation_status, $initiation_date_banking, $itr_initiation_status,
        $initiation_date_itr, $loanguard_initiation_status, $initiation_date_loanguard,
        $hold_reason, $date_of_submission, $vendor_name_assessment, $leviosa_final_stage,
        $banking_plotting, $cpv_vendor_name, $banking_vendor_name, $itr_vendor_name, $observations
    );
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "<script type='text/javascript'>
        alert('Data has been successfully saved!');
        window.location.href='success.html';
        document.getElementById('assessment').reset();
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Error: Data could not be saved!');
        window.location.href='legal.html';
        </script>";
    }
    
    // Close the statement
    $stmt->close();
} else {
    echo "<script type='text/javascript'>
    alert('RefID is missing. Redirecting...');
    window.location.href='legal.html';
    </script>";
}

// Close the database connection
$conn->close();
?>
