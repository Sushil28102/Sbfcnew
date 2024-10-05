<?php
session_start();  // Start the session
include 'db.php';

// Fetch POST data
$refid = $_SESSION['refid'];  // Automatically use the session variable

$central_cpa_name = $_POST['central_cpa_name'] ?? '';
$received_date = $_POST['received_date'] ?? '';
$ftr_tnr = $_POST['ftr_tnr'] ?? '';
$cpa_acceptance = $_POST['cpa_acceptance'] ?? '';
$ftq = $_POST['ftq'] ?? '';
$final_observations = $_POST['final_observations'] ?? '';
$month = $_POST['month'] ?? '';
$acceptance_date = $_POST['acceptance_date'] ?? '';
$approved_from_crdt = $_POST['approved_from_crdt'] ?? '';
$revert_cpa_name = $_POST['revert_cpa_name'] ?? '';
$revised_cpa_acceptance = $_POST['revised_cpa_acceptance'] ?? '';

if ($refid) {
    // Prepare the SQL statement
    $stmt = $conn->prepare("
        INSERT INTO form_data (
            refid, central_cpa_name, received_date, ftr_tnr, cpa_acceptance, ftq, final_observations, month,
            acceptance_date, approved_from_crdt, revert_cpa_name, revised_cpa_acceptance
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            central_cpa_name = VALUES(central_cpa_name),
            received_date = VALUES(received_date),
            ftr_tnr = VALUES(ftr_tnr),
            cpa_acceptance = VALUES(cpa_acceptance),
            ftq = VALUES(ftq),
            final_observations = VALUES(final_observations),
            month = VALUES(month),
            acceptance_date = VALUES(acceptance_date),
            approved_from_crdt = VALUES(approved_from_crdt),
            revert_cpa_name = VALUES(revert_cpa_name),
            revised_cpa_acceptance = VALUES(revised_cpa_acceptance)
    ");
    
    // Check if the statement is prepared successfully
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    
    // Bind parameters
    $stmt->bind_param(
        'ssssssssssss',
        $refid, $central_cpa_name, $received_date, $ftr_tnr, $cpa_acceptance, $ftq, $final_observations, $month,
        $acceptance_date, $approved_from_crdt, $revert_cpa_name, $revised_cpa_acceptance
    );
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "<script type='text/javascript'>
        alert('Data has been successfully saved!');
        window.location.href='valuation.html';
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Error: Data could not be saved!');
        window.location.href='screening.html';
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
