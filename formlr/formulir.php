<?php
include 'inc_koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $nama = $_POST['nama'];
    $asal = $_POST['asal'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    // Insert query
    $sql = "INSERT INTO pendaftar (nama, asal, email, tanggal_lahir, alamat) VALUES ('$nama', '$asal', '$email', '$tanggal_lahir', '$alamat')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        header("Location: pendaftaran.php"); // Redirect to pendaftaran.php
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Display error if query fails
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url("SMAN-1-Sumenep.jpg") no-repeat center center fixed;
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .registration-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            margin: 50px auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .registration-form h1 {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .registration-form label {
            font-size: 0.9em;
            margin-top: 10px;
            color: #333;
            display: block;
        }
        .registration-form input,
        .registration-form textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .submit-btn {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .submit-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <main class="registration-form">
        <h1>Formulir Pendaftaran</h1>
        <form method="post">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="asal">Asal:</label>
            <input type="text" id="asal" name="asal" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="3" required></textarea>

            <button type="submit" class="submit-btn">Daftar</button>
        </form>
    </main>
</body>
</html>