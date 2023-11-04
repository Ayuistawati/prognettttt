!DOCTYPE html>
<html>
<head>
    <title>Data Biodata</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>


<?php
$servername = "prognet.localnet";
$username = "2205551012"; // Ganti dengan username MySQL Anda
$password = "2205551012"; // Ganti dengan password MySQL Anda
$dbname = "db_2205551012";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

$nim = $_GET['id'];
$sql = "DELETE FROM tb_biodata WHERE nim='$nim'";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus. <a href='index.php'>Kembali ke Beranda</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</body>
</html>