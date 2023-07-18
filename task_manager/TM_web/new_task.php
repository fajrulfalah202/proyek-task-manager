<?php
require_once "koneksi.php";

session_save_path(getcwd() . '/tmp');
session_start();

if(isset($_POST["kembali"])) {

    header("Location: dashboard.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $deadline = $_POST["deadline"];
    $status = $_POST["status"];
    $userId = $_SESSION['user_id'];

    $stmt = $dbh->prepare("INSERT INTO Tasks (Title, Description, Deadline, Status) VALUES (:title, :description, :deadline, :status)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':deadline', $deadline);
    $stmt->bindParam(':status', $status);
    $stmt->execute();

    $taskId = $dbh->lastInsertId();

    $stmt = $dbh->prepare("INSERT INTO TaskUser (TaskID, UserID, Role) VALUES (:taskId, :userId, 'Assignee')");
    $stmt->bindParam(':taskId', $taskId);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
    <link rel="stylesheet" href="./css/new_task.css">
</head>
<body>
    <h1>Add Task</h1>
    <div class="container">
    <form method="post" action="">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title"><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>

        <label for="deadline">Deadline:</label>
        <input type="date" id="deadline" name="deadline"><br>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select><br>

        <input type="submit" value="Tambah">
        <form method="post">
            <input type="submit" name="kembali" value="Kembali">
        </form>
    </form>
    </div>
    
</body>
</html>