<?php
// Connection details to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penyewaan_mobil";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$email = $_POST['email'];
$no_ktp = $_POST['no_ktp'];

// Prepare and execute the SQL query to insert data into the database
$sql = "INSERT INTO Konsumen (nama, alamat, telp, email, no_ktp) 
        VALUES ('$nama', '$alamat', '$telp', '$email', '$no_ktp')";

if ($conn->query($sql) === TRUE) {
    echo "Data Konsumen berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
