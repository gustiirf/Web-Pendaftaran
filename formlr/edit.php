<?php
include 'inc_koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pendaftar WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $asal = $_POST['asal'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    $update_sql = "UPDATE pendaftar SET nama='$nama', asal='$asal', email='$email', tanggal_lahir='$tanggal_lahir',alamat='$alamat' WHERE id = $id";
    
    if ($conn->query($update_sql) === TRUE) {
        header("Location: pendaftaran.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Peserta</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background: url("SMAN-1-Sumenep.jpg") no-repeat center center fixed;
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 2.5em;
            margin-top: 30px auto;
            text-align: center; 
            font-weight: bold;
            letter-spacing: 2px;
            color: #ffffff;
            background-color: #C2B280; 
            border: 2px solid #ffffff; 
            padding: 10px; 
            display: block; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            
        }


        form {
            width: 60%;
            margin: 30px auto;
            padding: 20px;
            background-color: #f4f7f6; 
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1em;
        }

        input[type="submit"] {
            background-color: #28a745; 
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color:#28a745; 
        }

        select, textarea {
            resize: vertical; 
        }

    </style>
</head>
<body>
    <h1>Edit Data Peserta</h1>
    <form method="POST">
        Nama: <input type="text" name="nama" value="<?= $row['nama']; ?>" required><br>
        Asal: <input type="text" name="asal" value="<?= $row['asal']; ?>" required><br>
        Email: <input type="email" name="email" value="<?= $row['email']; ?>" required><br>
        Tanggal lahir: <input type="text" name="tanggal_lahir" value="<?= $row['tanggal_lahir']; ?>" required><br>
        Alamat: <textarea name="alamat" required><?= $row['alamat']; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>