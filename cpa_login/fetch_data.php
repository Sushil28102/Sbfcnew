<?php
include 'db.php';

$refid = $_GET['refid'] ?? '';

if ($refid) {
    $stmt = $conn->prepare("SELECT * FROM form_data WHERE refid = ?");
    $stmt->bind_param('s', $refid);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    echo json_encode($data);
}
?>