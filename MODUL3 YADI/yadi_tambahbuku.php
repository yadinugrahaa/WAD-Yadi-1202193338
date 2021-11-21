<?php
$koneksi = mysqli_connect("localhost","root","","modul3");
if(!$koneksi) {
    echo "<script>
         alert('Data Loss')
         </script>";
}

$mess = "";
if (isset($_POST['submit'])) {
    $judul_buku = $_POST['judul_buku'];
    $penulis_buku = "yadi_1202193338";
    $tahun_terbit = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];
    $tag = implode(",", $_POST['tag']);
    $bahasa = $_POST['bahasa'];
    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg');
    $filename = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        header("location:koneksi.php?alert=file_extension_not_allowed");
    } else {
        if ($ukuran < 3044070) {
            $gambar = $rand . '_' . $filename;
            $query = "INSERT INTO buku_table (judul_buku, penulis_buku, tahun_terbit, deskripsi, gambar, tag, bahasa) VALUES ('$judul_buku', '$penulis_buku', '$tahun_terbit', '$deskripsi', '$gambar', '$tag', '$bahasa')";
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'cover/' . $rand . '_' . $filename);
            mysqli_query($koneksi, $query);
            header("location:yadi_home.php?alert=success");
        } else {
            header("location:koneksi.php?alert=file_size_exceeded");
        }
    }
}
?>

<html>
    <head>
        <title>Tambah Buku</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark p-3">
            <a href="yadi_home.php"><img src='logo-ead.png' style='height:30px;width:auto;' /></a>
            <a type="button" class="btn btn-primary" href='yadi_tambahbuku.php'>Tambah Buku</a>
        </nav>
        <?= $mess; ?>
        <div class='content shadow-lg bg-white rounded'>
            <form method="POST" enctype="multipart/form-data">
                <h3>Tambah Data Buku</h3>
                <div class="form-group">
                    <label class='title'>Judul Buku</label>
                    <input type="text" id='judul_buku' name='judul_buku' class="form-control" placeholder="Contoh: Pemrograman Web Bersama EAD">

                </div>
                <div class="form-group">
                    <label class='title'>Penulis</label>
                    <input type="text" id='penulis_buku' name='penulis_buku' class="form-control" value="yadi_1202193338" readonly>
                </div>

                <div class="form-group">
                    <label class='title'>Tahun Terbit</label>
                    <input type="text" id='tahun_terbit' name='tahun_terbit' class="form-control" placeholder="Contoh: 1990">
                </div>
                <div class="form-group">
                    <label class='title'>Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Contoh: Buku ini menjelaskan tentang ..."></textarea>
                </div>

                <div class="form-group">
                    <label class='title pr-5'>Bahasa</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bahasa" id="inlineRadio1" value="Indonesia">
                        <label class="form-check-label" for="inlineRadio1">Indonesia</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bahasa" id="inlineRadio2" value="Lainnya">
                        <label class="form-check-label" for="inlineRadio2">Lainnya</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class='title pr-5'>Tag</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name='tag[]' value=" Pemrograman">
                        <label class="form-check-label" for="inlineCheckbox1">Pemrograman</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name='tag[]' value=" Website">
                        <label class="form-check-label" for="inlineCheckbox2">Website</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name='tag[]' value=" Java">
                        <label class="form-check-label" for="inlineCheckbox3">Java</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name='tag[]' value=" OOP">
                        <label class="form-check-label" for="inlineCheckbox1">OOP</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name='tag[]' value=" MVC">
                        <label class="form-check-label" for="inlineCheckbox2">MVC</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name='tag[]' value=" Kalkulus">
                        <label class="form-check-label" for="inlineCheckbox3">Kalkulus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name='tag[]' value=" Lainnya">
                        <label class="form-check-label" for="inlineCheckbox3">Lainnya</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="formFile" class="title">Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="gambar">
                </div>


                <center><button type='submit' class='submit btn btn-primary' name='submit'>+ Tambah</button></center>
            </form>
        </div>
        <footer class="footer bg-light mt-5">
            
        <div class="text-center">
            <img src="http://hmsitel-u.id/wp-content/uploads/2021/01/logo-ead-1.png" alt="" width='150px' class='mt-5'>
            <h3 style='font-weight:bold; color:black; margin-top:20px'>Perpustakaan EAD</h3>
            © Yadi_1202193338
        </div>
    </footer>
    </body>
</html>