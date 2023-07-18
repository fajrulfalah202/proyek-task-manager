<?php
require_once "koneksi.php";

session_save_path(getcwd() . '/tmp');
session_start();

if(isset($_POST['kembali'])){
    header('Location: dashboard.php');
}

if(isset($_POST['edit'])){
    header('Location: edit_task.php');
}

if (isset($_GET["id"])) {
    $taskId = $_GET["id"];

    $stmt = $dbh->prepare("SELECT * FROM Tasks WHERE ID = :taskId");
    $stmt->bindParam(':taskId', $taskId);
    $stmt->execute();
    $task = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$task) {
        header("Location: dashboard.php");
        exit();
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Detail</title>
    <link rel="stylesheet" href="./css/detail_task.css">
</head>
<body>
    <h1>Task Detail</h1>

    <h2>Title: <?php echo $task['Title']; ?></h2>
    <p>Description: <?php echo $task['Description']; ?></p>
    <p>Deadline: <?php echo $task['Deadline']; ?></p>
    <p>Status: <?php echo $task['Status']; ?></p>

    
    <form method="post">
        <input type="submit" name="edit" value="Edit Task">
        <input type="submit" name="kembali" value="Kembali">
    </form>
    
</body>
</html>
