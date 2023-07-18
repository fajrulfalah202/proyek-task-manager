<?php
require_once "koneksi.php";

session_save_path(getcwd() . '/tmp');
session_start();

if(isset($_POST["keluar"])) {
    session_unset();
    session_destroy();

    header("Location: login_page.php");
}

if(!isset($_SESSION["user_id"])) {
    header("Location: login_page.php");
    exit();
} else {
    $userId = $_SESSION['user_id'];

    $sort = "DESC"; // Pengaturan default untuk pengurutan

    // Memeriksa apakah ada parameter URL untuk pengurutan
    if (isset($_GET["sort"])) {
        $sortParam = $_GET["sort"];
        if ($sortParam === "asc") {
            $sort = "ASC";
        }
    }

    $query = "SELECT t.ID, t.Title, t.Deadline, t.Status
              FROM Tasks t
              INNER JOIN TaskUser tu ON t.ID = tu.TaskID
              WHERE tu.UserID = :userId
              ORDER BY t.Deadline $sort";

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="./css/dashboard.css">
    </head>
    <body>
        <?php
        // Mendapatkan informasi pengguna dari database
        $userStmt = $dbh->prepare("SELECT Name FROM Users WHERE ID = :userId");
        $userStmt->bindParam(':userId', $userId);
        $userStmt->execute();
        $user = $userStmt->fetch(PDO::FETCH_ASSOC);
        ?>

        <header>
            <div class="profile">
                <h3><?php echo "Hai ".$user['Name']; ?></h3>
            </div>
            <div>
                <a href="edit_akun.php">Profile</a>
            </div>
            <div>
                <form method="post">
                    <input type="submit" name="keluar" value="Keluar">
                </form>
            </div>
        </header>

        <div class="container">
            <div class="inner_cont">
                <div class="row">
                    <h2>To-Do <img src="./image/task.svg"></h2>
                    <button class="new-task"><a href="new_task.php">New Task</a></button>
                </div>

                <div class="filter">
                    <label for="sort">Urutkan berdasarkan Deadline:</label>
                    <select id="sort" name="sort" onchange="handleSort(this)">
                        <option value="desc" <?php if ($sort === "DESC") echo "selected"; ?>>Descending</option>
                        <option value="asc" <?php if ($sort === "ASC") echo "selected"; ?>>Ascending</option>
                    </select>
                </div>

                <ul class="task-list">
                <?php foreach ($tasks as $task) { ?>
                    <li>
                        <div class="task-info">
                            <h3><a href="detail_task.php?id=<?php echo $task['ID']; ?>"><?php echo $task['Title']; ?></a></h3>
                            <p>Deadline: <?php echo $task['Deadline']; ?></p>
                            <p>Status: <?php echo $task['Status']; ?></p>
                        </div>
                        <?php if ($task['Status'] != 'Done') { ?>
                            <button class="done-button" onclick="updateStatus(<?php echo $task['ID']; ?>, 'Done')">Done</button>
                        <?php } else { ?>
                            <button class="cancel-button" onclick="updateStatus(<?php echo $task['ID']; ?>, '<?php echo $task['Status']; ?>')">Cancel</button>
                        <?php } ?>
                    </li>
                <?php } ?>
                </ul>
                <br>
            </div>
        </div>
        <script>
            function updateStatus(taskId, status) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Refresh halaman setelah status berhasil diperbarui
                            location.reload();
                        } else {
                            console.error("Gagal memperbarui status tugas.");
                        }
                    }
                };
                xhr.open("POST", "update_status.php");
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("taskId=" + taskId + "&status=" + status);
            }

            function handleSort(select) {
                var selectedSort = select.value;
                window.location.href = "dashboard.php?sort=" + selectedSort;
            }
        </script>
    </body>
</html>
