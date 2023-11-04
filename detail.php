<!DOCTYPE html>
<html>
<head>
    <title>Data Biodata</title>
    <link href="assets/style/style3.css" rel="stylesheet" />
</head>
<body>
    

<?php
$servername = "prognet.localnet";
$username = "2205551012"; 
$password = "2205551012"; 
$dbname = "db_2205551012";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

$nim = $_GET['id'];
$sql = "SELECT * FROM tb_biodata WHERE nim='$nim'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo "<h1>Detail Biodata</h1>";
    echo "NIM: " . $row['nim'] . "<br>";
    echo "Nama: " . $row['nama'] . "<br>";
    echo "Alamat Gmail: " . $row['alamat_gmail'] . "<br>";
    echo "Alamat Rumah: " . $row['alamat_rumah'] . "<br>";
    echo "No. Telepon: " . $row['no_tlp'] . "<br>";
    echo "Prodi: " . $row['prodi'] . "<br>";
    echo "Jenis Kelamin: " . $row['jenis_kelamin'] . "<br>";
    echo "<a href='index.php'>Kembali ke Beranda</a>";
} else {
    echo "Data tidak ditemukan. <a href='index.php'>Kembali ke Beranda</a>";
}

$conn->close();
?>
 </body>
 </html>