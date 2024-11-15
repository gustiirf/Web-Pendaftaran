<?php
include 'inc_koneksi.php';


$sql = "SELECT * FROM pendaftar";
$result = $conn->query($sql);

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM pendaftar WHERE id = $delete_id";
    if ($conn->query($delete_sql) === TRUE) {
        header("Location: pendaftaran.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pendaftar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url("SMAN-1-Sumenep.jpg") no-repeat center center fixed;
            background-size: cover;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        h1 {
            font-size: 2.5em;
            margin-top: 30px;
            font-weight: bold;
            letter-spacing: 2px;
            color: #ffffff;
            background-color: #C2B280; 
            border: 2px solid #ffffff; 
            padding: 10px; 
            display: inline-block; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            border: 2px solid #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ffffff;
        }
        th {
            background-color: #C2B280;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f1f1f1;
        }
        tr:hover {
            background-color: #e1eaff;
        }
        .action-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Daftar Pendaftar</h1>
    <table>
        <tr>
            <th>Nama</th>
            <th>Asal</th>
            <th>Email</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['asal']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['tanggal_lahir']; ?></td>
                    <td><?= $row['alamat']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="action-btn edit-btn">Edit</a>
                        <a href="?delete_id=<?= $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                    </td>
                </tr>
        <?php 
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data ditemukan</td></tr>";
        }
        ?>
    </table>
</body>
</html>
