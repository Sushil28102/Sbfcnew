<?php
session_start(); // Start the session to access session variables
include 'db.php';

// Retrieve the refid from the session
$refid = $_SESSION['refid'] ?? '';

// Fetch POST data
$cpa_name_valuation = $_POST['cpa_name_valuation'] ?? '';
$technical_valuation = $_POST['technical_valuation'] ?? '';
$date_of_allocation = $_POST['date_of_allocation'] ?? '';
$date_of_initiation = $_POST['date_of_initiation'] ?? '';
$disposition_valuation = $_POST['disposition_valuation'] ?? '';
$vendor_name = $_POST['vendor_name'] ?? '';
$second_vendor_name = $_POST['second_vendor_name'] ?? '';
$report_received_date_1 = $_POST['report_received_date_1'] ?? '';
$report_received_date_2 = $_POST['report_received_date_2'] ?? '';
$valuation_query = $_POST['valuation_query'] ?? '';
$case_revert_date = $_POST['case_revert_date'] ?? '';
$vendor_query = $_POST['vendor_query'] ?? '';

if ($refid) {
    // Prepare the SQL statement
    $stmt = $conn->prepare("
        INSERT INTO form_data (
            refid, cpa_name_valuation, technical_valuation, date_of_allocation, date_of_initiation, disposition_valuation,
            vendor_name, second_vendor_name, report_received_date_1, report_received_date_2,
            valuation_query, case_revert_date, vendor_query
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            cpa_name_valuation = VALUES(cpa_name_valuation),
            technical_valuation = VALUES(technical_valuation),
            date_of_allocation = VALUES(date_of_allocation),
            date_of_initiation = VALUES(date_of_initiation),
            disposition_valuation = VALUES(disposition_valuation),
            vendor_name = VALUES(vendor_name),
            second_vendor_name = VALUES(second_vendor_name),
            report_received_date_1 = VALUES(report_received_date_1),
            report_received_date_2 = VALUES(report_received_date_2),
            valuation_query = VALUES(valuation_query),
            case_revert_date = VALUES(case_revert_date),
            vendor_query = VALUES(vendor_query)
    ");
    
    // Check if the statement is prepared successfully
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    
    // Bind parameters
    $stmt->bind_param(
        'sssssssssssss',
        $refid, $cpa_name_valuation, $technical_valuation, $date_of_allocation, $date_of_initiation, $disposition_valuation,
        $vendor_name, $second_vendor_name, $report_received_date_1, $report_received_date_2,
        $valuation_query, $case_revert_date, $vendor_query
    );
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "<script type='text/javascript'>
        alert('Data has been successfully saved!');
        window.location.href='legal.html';
        document.getElementById('valuation').reset();
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Error: Data could not be saved!');
        window.location.href='valuation.html';
        </script>";
    }
    
    // Close the statement
    $stmt->close();
} else {
    echo "<script type='text/javascript'>
    alert('RefID is missing. Redirecting...');
    window.location.href='valuation.html';
    </script>";
}

// Close the database connection
$conn->close();
?>
