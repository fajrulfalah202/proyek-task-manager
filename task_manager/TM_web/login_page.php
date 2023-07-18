<?php
require_once "koneksi.php";
session_save_path(getcwd() . '/tmp');
session_start();

if(!empty($_SESSION["user_id"])) {
    header("Location: dashboard.php");
} else {
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <?php if (isset($login_error)) { ?>
        <p><?php echo $login_error; ?></p>
    <?php } ?>

    <span>password1</span>
    
    <div class="container">
        <div class="tm">
            <h2>Login</h2>
            <form method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>

                <input type="submit" name="login" value="Login">
            </form>

            <p>Tidak punya akun ? <a href="regis.php">Sign up</a></p>
        </div>
    </div>
    

    <?php
    if (isset($_POST['login'])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $login = $dbh->prepare("SELECT ID, Name, Email, passwd FROM Users WHERE Email LIKE :email");
        $login->bindParam(':email', $email);
        $login->execute();
    
        $user = $login->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            if (password_verify($password, $user['passwd'])) {
                // $_SESSION["login_session_name"] = $user["Name"];
                // $_SESSION["login_session_email"] = $user["Email"];
    
                $_SESSION["user_id"] = $user['ID'];
                header("Location: dashboard.php");
            } else {
                $login_error = "Kombinasi email dan password salah";
            }
        } else {
            $login_error = "Email tidak terdaftar";
        }
    }
    ?>
</body>

</html>
<?php
}
?>