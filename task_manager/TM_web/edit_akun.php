<?php
require_once "koneksi.php";

session_save_path(getcwd() . '/tmp');
session_start();

if(isset($_POST['kembali'])){
    header('Location: dashboard.php');
}

if(!isset($_SESSION["user_id"])) {
    header("Location: login_page.php");
    exit();
} else {
    $userId = $_SESSION['user_id'];
    
    if (isset($_POST['submit'])) {
        $nama = filter_var($_POST['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $password = $_POST["password"];
        $password_cost =  ['cost' => 12];
        $password_hash = password_hash($password, PASSWORD_DEFAULT, $password_cost);

        $edit = $dbh->prepare("UPDATE Users SET Name = :nama, Email = :email, passwd = :password WHERE ID = :userId");
        $edit->bindParam(':nama', $nama);
        $edit->bindParam(':email', $email);
        $edit->bindParam(':password', $password_hash);
        $edit->bindParam(':userId', $userId);
        $edit->execute();

        if($edit) {
            echo '<script>alert("Sukses")</script>';
            echo "<meta http-equiv='refresh' content='0'>";
        }

        header("Location: dashboard.php");
        exit();
    } else {
        $stmt = $dbh->prepare("SELECT * FROM Users WHERE ID = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Akun</title>
    <link rel="stylesheet" href="./css/edit_akun.css">
</head>
<body>
    <div class="container">
        <div class="inner-cont">
            <h1>Edit Akun</h1>
            <form method="post">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="nama" value="<?php echo $user['Name']; ?>"><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['Email']; ?>"><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br>

            <input type="submit" name="submit" value="Simpan">
            <input type="submit" name="kembali" value="Kembali">
            </form>
        </div>
    </div>
</body>
</html>
