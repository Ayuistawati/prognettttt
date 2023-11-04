<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#f2f3fb" />
    <title>Biodata ayu</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"/>
    <link href="assets/style/style.css" rel="stylesheet" />
    <!-- Unpkg for card scroll reveal effect -->
    <script src="https://unpkg.com/scrollreveal"></script>
  </head>
  <body>
  <nav>
        <ul class="menu">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="biodata.html">Tugas Javascript</a></li>
            <li><a href="tugas.html">Input Tugas</a></li>
        </ul>
    </nav>
    <div class="wrapper">
      <div class="container">
        <!----Picture and name---->
        <div class="picture">
          <img src="assets/profilphoto1.jpeg" alt="ayu ista's photo" />
        </div>
        <div class="name" translate="no">Ayu Istawati Jayanti</div>

        <!--more details button-->
        <div class="info-box">
          About me
          <div class="toggle" onclick="vibrate()">
            <i class="fa-solid fa-chevron-down"></i>
          </div>
          <!--details-->
          <div>
            <br/>
            <div class="details">
              <ul>
              <li class="about">
                Halo, Saya Ayu Istawati Jayanti, seorang mahasiswa jurusan teknologi informasi fakultas Teknik Universitas Udayana
               Saya Memiliki keingintahuan di bidang IT, dan ingin terus mempelajarinya.
                <br><br> Berikut detail biodata saya tampilkan: 
              </li>

              <?php
$servername = "prognet.localnet";
$username = "2205551012"; 
$password = "2205551012"; 
$dbname = "db_2205551012";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM tb_biodata";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th>NIM</th><br>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["nim"] . "</td>
            <td>" . $row["nama"] . "</td>
            <td>" . $row["prodi"] . "</td>
            <td>" . $row["jenis_kelamin"] . "</td>
            <td>
                <a href='edit.php?id=" . $row["nim"] . "'>Edit</a>
                <a href='hapus.php?id=" . $row["nim"] . "'>Hapus</a>
                <a href='detail.php?id=" . $row["nim"] . "'>Detail</a>
            </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data biodata.";
}

$conn->close();
?>
        <!----All social media buttons---->
        <div class="social-media">
          <a href="https://wa.me/+6282340571151">
            <div><i class="fab fa-whatsapp"></i>WA</div>
          </a>
          <a href="https://instagram.com/ayuistawatii?igshid=MzNlNGNkZWQ4Mg=="
            ><div><i class="fa-brands fa-instagram"></i>Instagram</div>
          </a>
    </div>
    <script src="assets/js/script.js"></script>
  </body>
</html>
