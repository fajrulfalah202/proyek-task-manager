<?php
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['taskId']) && isset($_POST['status'])) {
    $taskId = $_POST['taskId'];
    $status = $_POST['status'];

    if ($status === 'Done') {
        // Update status menjadi "Done"
        $stmt = $dbh->prepare("UPDATE Tasks SET Status = 'Done' WHERE ID = :taskId");
    } else {
        // Kembalikan status ke nilai awal
        $stmt = $dbh->prepare("UPDATE Tasks SET Status = 'Pending' WHERE ID = :taskId");
    }

    $stmt->bindParam(':taskId', $taskId);
    $stmt->execute();

    // Berikan respon 200 OK jika berhasil
    http_response_code(200);
} else {
    // Berikan respon 400 Bad Request jika permintaan tidak valid
    http_response_code(400);
}
?>
