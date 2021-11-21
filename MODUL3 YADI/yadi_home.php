<?php
    $koneksi = mysqli_connect("localhost","root","","modul3");
    if(!$koneksi) {
        echo "<script>
             alert('Data Loss')
             </script>";
    }
    $query = "SELECT  * FROM buku_table";
    $selects = mysqli_query($koneksi, $query);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buat Event</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/styles.css">
    </head>

    <body>
        <nav class="navbar navbar-dark bg-dark p-3">
            <a href="yadi_home.php"><img src='logo-ead.png' style='height:30px;width:auto;' /></a>
            <a type="button" class="btn btn-primary" href='yadi_tambahbuku.php'>Tambah Buku</a>
        </nav>
        </nav>
        
        <div class='content_home'>
            <?php
                $baris = mysqli_num_rows($selects);

                if($baris==NULL) :
            ?>
                <center class='mt-5'>
                <h5 style='font-weight:bold; color:black; margin-top:20px'>WELCOME TO EAD LIBRARY</h5>
                <div class="row justify-content-center align-content-center">
                <div class="container">
                 <h3 class="text-center" style="margin-top:100px">Belum Ada Buku</h3>
                <hr style="height:7px; background-color:blue">
                 <p class="text-center" style="font-size:20px">Silahkan Menambahkan Buku</p>
                 </div>  
                </center>

            <?php else : ?>
                
            <div class="row">
                <?php while ($select = mysqli_fetch_assoc($selects)) : ?>
                <div class="col" style="width: auto;">
                    <div class="card" style="width:20rem;">
                        <img src="cover/<?= $select['gambar']; ?>" class="card-img-top"  style="height:450px;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $select['judul_buku']; ?></h5>
                            <p class="card-text"><?= $select['deskripsi']; ?></p>
                            <a href="yadi_detail.php?id_buku=<?= $select['id_buku'] ?>" class="btn btn-primary">Tampilkan Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
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