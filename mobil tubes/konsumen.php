<!DOCTYPE html>
<html>
<head>
<title>Daftar Konsumen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Daftar Konsumen</h1>
    
    <form method="GET" action="">
    <input type="text" name="search" placeholder="Cari konsumen...">
    <input type="submit" value="Cari">
    </form>

    <table border="1">
        <tr>
            <th>ID Konsumen</th>
            <th>No. KTP</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Email</th>
        </tr>
        <?php
        // Koneksi ke database
        $servername = "localhost";
        $username = "root"; // Ganti dengan username database Anda
        $password = ""; // Ganti dengan password database Anda
        $database = "penyewaan_mobil";
        $conn = mysqli_connect($servername, $username, $password, $database);
        
        // Periksa koneksi
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Ambil data konsumen dari tabel Konsumen
        $sql = "SELECT * FROM Konsumen";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Tampilkan data konsumen dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id_konsumen'] . "</td>";
                echo "<td>" . $row['no_ktp'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['telp'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data konsumen.</td></tr>";
        }
        
        // Ambil data konsumen dari tabel Konsumen berdasarkan kata kunci pencarian
        $search_query = isset($_GET['search']) ? $_GET['search'] : '';
        if (!empty($search_query)) {
        $search_query = mysqli_real_escape_string($conn, $search_query);
        $sql = "SELECT * FROM Konsumen WHERE nama LIKE '%$search_query%' OR no_ktp LIKE '%$search_query%'";
        $result = mysqli_query($conn, $sql);
        } else {
        $sql = "SELECT * FROM Konsumen";
        $result = mysqli_query($conn, $sql);
        }

        // Tampilkan data konsumen dalam tabel
        if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_konsumen'] . "</td>";
        echo "<td>" . $row['no_ktp'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['alamat'] . "</td>";
        echo "<td>" . $row['telp'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Tidak ada data konsumen yang sesuai dengan kata kunci pencarian.</td></tr>";
}

        // Tutup koneksi
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
