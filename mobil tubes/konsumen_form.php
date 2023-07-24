<!DOCTYPE html>
<html>
<head>
    <title>Konsumen Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Konsumen Form</h2>
    <form method="post" action="save_konsumen.php">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        <br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required>
        <br>

        <label for="telp">Telepon:</label>
        <input type="text" name="telp" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email">
        <br>

        <label for="no_ktp">Nomor KTP:</label>
        <input type="text" name="no_ktp" required>
        <br>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
