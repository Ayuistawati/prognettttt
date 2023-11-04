!DOCTYPE html>
<html>
<head>
    <title>Data Biodata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
        <ul class="menu">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="biodata.html">Tugas Javascript</a></li>
            <li><a href="tugas.html">Input Tugas</a></li>
        </ul>
    </nav>
    
<?php
$servername = "prognet.localnet";
$username = "2205551012"; 
$password = "2205551012"; 
$dbname = "db_2205551012";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat_gmail = $_POST['alamat_gmail'];
$alamat_rumah = $_POST['alamat_rumah'];
$no_tlp = $_POST['no_tlp'];
$prodi = $_POST['prodi'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$sql = "INSERT INTO tb_biodata (nim, nama, alamat_gmail, alamat_rumah, no_tlp, prodi, jenis_kelamin)
        VALUES ('$nim', '$nama', '$alamat_gmail', '$alamat_rumah', '$no_tlp', '$prodi', '$jenis_kelamin')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan. <a href='index.php'>Kembali ke Beranda</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</body>
</html>