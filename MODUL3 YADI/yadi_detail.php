<?php
$koneksi = mysqli_connect("localhost","root","","modul3");
if(!$koneksi) {
    echo "<script>
         alert('Data Loss')
         </script>";
}

$id_buku = $_GET["id_buku"];
$query = "SELECT  * FROM buku_table WHERE id_buku=$id_buku";
$selects = mysqli_query($koneksi, $query);

if (isset($_POST["update"])) {
    print_r($_POST);
    $id_buku = $_POST["id_buku"];
    $judul_buku = $_POST['judul_buku'];
    $penulis_buku = $_POST['penulis_buku'];
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
        header("location:yadi_detail.php?id_buku=$id_buku&alert=file_extension_not_allowed");
        $gambar = $rand . '_' . $filename;
        $query = "UPDATE buku_table SET judul_buku='$judul_buku', penulis_buku='$penulis_buku', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi', tag='$tag', bahasa='$bahasa' WHERE id_buku='$id_buku'";
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'cover/' . $rand . '_' . $filename);
        mysqli_query($koneksi, $query);
    } else {
        if ($ukuran < 3044070) {
            $gambar = $rand . '_' . $filename;
            $query = "UPDATE buku_table SET judul_buku='$judul_buku', penulis_buku='$penulis_buku', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi', gambar='$gambar', tag='$tag', bahasa='$bahasa' WHERE id_buku='$id_buku'";
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'cover/' . $rand . '_' . $filename);
            mysqli_query($koneksi, $query);
            header("location:yadi_detail.php?id_buku=$id_buku&alert=success");
        } else {
            header("location:yadi_detail.php?id_buku=$id_buku&alert=file_size_exceeded");
        }
    }
}

?>

<html>
    <head>
        <title>Tambah Buku</title>
        <link rel="stylesheet" href="styles.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark p-3">
            <a href="yadi_home.php"><img src='logo-ead.png' style='height:30px;width:auto;' /></a>
            <a type="button" class="btn btn-primary" href='yadi_tambahbuku.php'>Tambah Buku</a>
        </nav>
        <!-- PHP SECTION -->
        <?php while ($select = mysqli_fetch_assoc($selects)) : ?>
         <!-- PHP SECTION -->  
        
        <div class='content shadow-lg bg-white rounded'>
        <center><h3>Detail Buku</h3></center><br>
        
        <center><img src='cover/<?= $select['gambar'] ?>' class='shadow-lg' style='height: 450px; width:auto'></center><br><hr style="color:blue;">
                <div class="form-group">
                    <label class='title'>Judul</label>
                    <p class="form-check-label"> <?= $select['judul_buku'] ?> </p>
                </div>
                <div class="form-group">
                    <label class='title'>Penulis</label>
                    <p class="form-check-label"><?= $select['penulis_buku'] ?></p>             
                </div>
                <div class="form-group">
                    <label class='title'>Tahun Terbit</label>
                    <p class="form-check-label"><?= $select['tahun_terbit'] ?></p>             
                </div>
                <div class="form-group">
                    <label class='title'>Deskripsi</label>
                    <p class="form-check-label"><?= $select['deskripsi'] ?></p>          
                </div>
                <div class="form-group">
                    <label class='title pr-5'>Bahasa</label>
                    <p class="form-check-label"><?= $select['bahasa'] ?></p>
                </div>
                <div class="form-group">
                    <label class='title pr-5'>Tag</label>
                    <p class="form-check-label"><?= $select['tag'] ?></p>
                </div>
                <div class="row mt-5">
                        <button type="button" class="col btn btn-primary me-3" data-toggle="modal" data-target="#editModal">Sunting</button>
                        <a href="hapus.php?id_buku=<?= $select["id_buku"] ?>" class="col btn btn-danger ms-3">Hapus</a>
                </div>
        </div>
        
            <!-- INI MODAL -->
                <div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Sunting</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body ps-5 pe-5">
                                <form method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_buku" value="<?= $select["id_buku"] ?>">
                                    <div class="form-group">
                                        <label class='title'>Judul Buku</label>
                                        <input type="text" id='judul_buku' name='judul_buku' class="form-control" placeholder="Contoh: Pemrograman Web Bersama EAD" value="<?= $select['judul_buku']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class='title'>Penulis</label>
                                        <input type="text" id='penulis_buku' name='penulis_buku' class="form-control" value="yadi_1202194122" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class='title'>Tahun Terbit</label>
                                        <input type="text" id='tahun_terbit' name='tahun_terbit' class="form-control" placeholder="Contoh: 1990" value="<?= $select['tahun_terbit']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class='title'>Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Contoh: Buku ini menjelaskan tentang ..."><?= $select['deskripsi']?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class='title pr-5'>Bahasa</label>
                                        <?php if ($select["bahasa"] == "Indonesia") : ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="bahasa" id="inlineRadio1" value="Indonesia" checked>
                                                <label class="form-check-label" for="inlineRadio1">Indonesia</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="bahasa" id="inlineRadio2" value="Lainnya">
                                                <label class="form-check-label" for="inlineRadio2">Lainnya</label>
                                            </div>
                                        <?php else : ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="bahasa" id="inlineRadio1" value="Indonesia">
                                                <label class="form-check-label" for="inlineRadio1">Indonesia</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="bahasa" id="inlineRadio2" value="Lainnya" checked>
                                                <label class="form-check-label" for="inlineRadio2">Lainnya</label>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label class='title pr-5'>Tag</label>
                                        <?php
                                            $result = mysqli_query($koneksi,"SELECT tag FROM buku_table WHERE id_buku = '$id_buku'"); 
                                            while($row = mysqli_fetch_array($result)) {
                                                $tag = explode(",",$row['tag']);
                                        ?>           
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name='tag[]' value=" Pemrograman" <?php if(in_array("Pemrograman",$tag)) echo 'checked'; ?>>
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
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="formFile" class="title">Gambar</label>
                                        <input class="form-control" type="file" id="gambar" name="gambar">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                    <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        <?php endwhile; ?>
        
        <footer class="footer bg-light mt-5">
        <div class="text-center">
            <img src="http://hmsitel-u.id/wp-content/uploads/2021/01/logo-ead-1.png" alt="" width='150px' class='mt-5'>
            <h3 style='font-weight:bold; color:black; margin-top:20px'>Perpustakaan EAD</h3>
            © Yadi_1202193338
        </div>
    </footer>
</html>