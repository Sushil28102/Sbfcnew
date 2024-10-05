<?php
session_start();  // Start the session to access session variables
include 'db.php';

// Retrieve the refid from the session
$refid = $_SESSION['refid'] ?? '';

// Fetch POST data
$cpa_name_legal = $_POST['cpa_name_legal'] ?? '';
$legal = $_POST['legal'] ?? '';
$date_of_initiation_legal = $_POST['date_of_initiation_legal'] ?? '';
$disposition_legal = $_POST['disposition_legal'] ?? '';
$report_received_date_legal = $_POST['report_received_date_legal'] ?? '';
$vendor_name_legal = $_POST['vendor_name_legal'] ?? '';
$legal_initiation_query = $_POST['legal_initiation_query'] ?? '';

if ($refid) {
    // Prepare the SQL statement
    $stmt = $conn->prepare("
        INSERT INTO form_data (
            refid, cpa_name_legal, legal, date_of_initiation_legal, disposition_legal,
            report_received_date_legal, vendor_name_legal, legal_initiation_query
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            cpa_name_legal = VALUES(cpa_name_legal),
            legal = VALUES(legal),
            date_of_initiation_legal = VALUES(date_of_initiation_legal),
            disposition_legal = VALUES(disposition_legal),
            report_received_date_legal = VALUES(report_received_date_legal),
            vendor_name_legal = VALUES(vendor_name_legal),
            legal_initiation_query = VALUES(legal_initiation_query)
    ");
    
    // Check if the statement is prepared successfully
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    
    // Bind parameters
    $stmt->bind_param(
        'ssssssss',
        $refid, $cpa_name_legal, $legal, $date_of_initiation_legal, $disposition_legal,
        $report_received_date_legal, $vendor_name_legal, $legal_initiation_query
    );
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "<script type='text/javascript'>
        alert('Data has been successfully saved!');
        window.location.href='assessment.html';
        document.getElementById('legal').reset();
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
    // If no refid is found in the session, redirect to a fallback page
    echo "<script type='text/javascript'>
    alert('RefID is missing. Redirecting...');
    window.location.href='screening.html';
    </script>";
}

// Close the database connection
$conn->close();
?>
