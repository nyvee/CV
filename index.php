<?php
include 'config.php';

$result = mysqli_query($conn, "SELECT * FROM cv_data WHERE id=1"); // Sesuaikan dengan id CV
$data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Curriculum Vitae</title>
</head>

<body>
  <nav class="navbar">
    <div class="nav-container">
      <h1>Curriculum Vitae</h1>
      <a class="link" href="edit.php">Go To Edit Page</a>
    </div>
  </nav>
  <div class="cv-container">
    <div class="left-con">
        <div class="nama-con">
            <h1 class="nama"><?php echo $data['nama']; ?></h1>
        </div>
        <div class="image">
            <img src="<?php echo $data['foto_path']; ?>" alt="Foto Profil">
        </div>
      <div class="kontak">
        <h1>Contact</h1>
        <div class="data-con">
            <ion-icon name="home"></ion-icon>
            <p class="data"><?php echo $data['alamat']; ?></p>
        </div>
        <div class="data-con">
            <ion-icon name="call"></ion-icon>
            <p class="data"><?php echo $data['telepon']; ?></p>
        </div>
        <div class="data-con">
            <ion-icon name="mail"></ion-icon>
            <p class="data"><?php echo $data['email']; ?></p>
        </div>
        <div class="data-con">
            <ion-icon name="globe"></ion-icon>
            <a class="data link" href="<?php echo $data['web']; ?>"><?php echo $data['web']; ?></a>
        </div>
      </div>
    </div>
    <div class="right-con">
        <h1>Pendidikan</h1>
        <div class="specs">
            <?php 
                $pendidikan = explode("\n", $data['pendidikan']);
                if(count($pendidikan) > 1) {
                    echo "<ul>";
                    foreach($pendidikan as $p) {
                        echo "<li>" . nl2br($p) . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>" . nl2br($data['pendidikan']) . "</p>";
                }
            ?>
        </div>
        <h1>Pengalaman Kerja</h1>
        <div class="specs">
            <?php 
                $pengalaman_kerja = explode("\n", $data['pengalaman_kerja']);
                if(count($pengalaman_kerja) > 1) {
                    echo "<ul>";
                    foreach($pengalaman_kerja as $pk) {
                        echo "<li>" . nl2br($pk) . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>" . nl2br($data['pengalaman_kerja']) . "</p>";
                }
            ?>
        </div>
        <h1>Keterampilan</h1>
        <div class="specs">
            <?php 
                $keterampilan = explode("\n", $data['keterampilan']);
                if(count($keterampilan) > 1) {
                    echo "<ul>";
                    foreach($keterampilan as $k) {
                        echo "<li>" . nl2br($k) . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>" . nl2br($data['keterampilan']) . "</p>";
                }
            ?>
        </div>
    </div>
  </div>

  <script>
    let namaElement = document.querySelector('.nama');
    let words = namaElement.textContent.split(' ');

    for (let i = 2; i < words.length; i += 3) {
        words.splice(i, 0, '<br>');
    }

    namaElement.innerHTML = words.join(' ');
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>