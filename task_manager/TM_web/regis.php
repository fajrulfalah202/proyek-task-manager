<?php
require_once "koneksi.php";

if(isset($_POST['kembali'])){
    header('Location: login_page.php');
}

if (isset($_POST['submit'])) {
    $nama = filter_var($_POST['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];
    $password_cost =  ['cost' => 12];
    $password_hash = password_hash($password, PASSWORD_DEFAULT, $password_cost);

    $regis = $dbh->prepare("INSERT INTO Users (Name, Email, passwd) VALUES (:nama, :email, :passwd)");
    $regis->execute([
        ':nama' => $nama,
        ':email' => $email,
        ':passwd' => $password_hash
    ]);

    if($regis) {
        echo '<script>alert("Sukses")</script>';
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
    <link rel="stylesheet" href="./css/regis.css">
</head>
<body>

    <?php if (isset($login_error)) { ?>
        <p><?php echo $login_error; ?></p>
    <?php } ?>

    <div class="container">
        <div class="inner_cont">
            <h1>Daftar</h1>
            <form method="post">

                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama"><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br>

                <input type="submit" name="submit" value="Submit">

                <input type="submit" name="kembali" value="Kembali">
            </form>

            
            <p>Sudah punya akun ? <a href="login_page.php">Log in</a></p>
        </div>
    </div>
    
    
</body>
</html>
