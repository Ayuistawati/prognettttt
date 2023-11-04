<!DOCTYPE html>
<html>
<head>
    <title>Data Biodata</title>
    <link href="assets/style/style2.css" rel="stylesheet" />
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat_gmail = $_POST['alamat_gmail'];
    $alamat_rumah = $_POST['alamat_rumah'];
    $no_tlp = $_POST['no_tlp'];
    $prodi = $_POST['prodi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $sql = "UPDATE tb_biodata SET nama='$nama', alamat_gmail='$alamat_gmail', alamat_rumah='$alamat_rumah', no_tlp='$no_tlp', prodi='$prodi', jenis_kelamin='$jenis_kelamin' WHERE nim='$nim'";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diubah. <a href='index.php'>Kembali ke Beranda</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $nim = $_GET['id'];
    $sql = "SELECT * FROM tb_biodata WHERE nim='$nim'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
?>
        <h1>Edit Data Biodata</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="hidden" name="nim" value="<?php echo $row['nim']; ?>">
    Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
    Alamat Gmail: <input type="text" name="alamat_gmail" value="<?php echo $row['alamat_gmail']; ?>"><br>
    Alamat Rumah: <input type="text" name="alamat_rumah" value="<?php echo $row['alamat_rumah']; ?>"><br>
    No. Telepon: <input type="text" name="no_tlp" value="<?php echo $row['no_tlp']; ?>"><br>
    
    <!-- Bagian Prodi -->
    <label for="prodi">Prodi:</label>
    <select name="prodi" id="prodi">
    <option value="Teknologi Informasi" <?php if (isset($row) && $row['prodi'] == 'Teknologi Informasi') echo 'selected'; ?>>Teknologi Informasi</option>
    <option value="Teknik Industri" <?php if (isset($row) && $row['prodi'] == 'Teknik Industri') echo 'selected'; ?>>Teknik Industri</option>
    <option value="Teknik Sipil" <?php if (isset($row) && $row['prodi'] == 'Teknik Sipil') echo 'selected'; ?>>Teknik Sipil</option>
    <option value="Teknik Lingkungan" <?php if (isset($row) && $row['prodi'] == 'Teknik Lingkungan') echo 'selected'; ?>>Teknik Lingkungan</option>
    <option value="Teknik Arsitektur" <?php if (isset($row) && $row['prodi'] == 'Teknik Arsitektur') echo 'selected'; ?>>Teknik Arsitektur</option>
    <option value="Teknik Mesin" <?php if (isset($row) && $row['prodi'] == 'Teknik Mesin') echo 'selected'; ?>>Teknik Mesin</option>
    <option value="Teknik Elektro" <?php if (isset($row) && $row['prodi'] == 'Teknik Elektro') echo 'selected'; ?>>Teknik Elektro</option>
    </select><br>
    
    <!-- Bagian Jenis Kelamin -->
    <label for="jenis_kelamin">Jenis Kelamin:</label>
    <select name="jenis_kelamin" id="jenis_kelamin">
        <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
        <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
    </select><br>
    
    <input type="submit" value="Simpan Perubahan">
</form>

<?php
    } else {
        echo "Data tidak ditemukan. <a href='index.php'>Kembali ke Beranda</a>";
    }
}

$conn->close();
?>
</body>
</html>