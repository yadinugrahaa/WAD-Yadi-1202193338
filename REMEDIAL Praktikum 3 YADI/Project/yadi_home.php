<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EAD PERPUS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .kosong{
            margin-top:100px;
            border-bottom:2px solid black;
        }
    </style>
</head>
<body>
    <?php 
        include("yadi_koneksi.php")
    ?>
    <!-- INI NAVBAR -->
    <header>
        <nav class="navbar navbar-dark bg-dark sticky-top" >
            <div class="container-fluid">
            <a href="yadi_home.php"><img src='logo-ead.png' style='height:30px;width:auto;' /></a>
                <div class="navbar-nav ms-auto">
                    <div class="nav-item">
                        <a href="yadi_addbuku.php" class="nav-link">
                            <button class="btn btn-primary">Tambah Buku</button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        <?php 
            $query = mysqli_query($koneksi, "SELECT * from buku_table");  
            $rowcount=mysqli_num_rows($query);
        ?>
        <?php if ($rowcount == 0): ?>
            <h2 class="text-center" style='font-weight:bold; color:black; margin-top:20px'>WELCOME TO EAD LIBRARY</h2>
                <div class="row justify-content-center align-content-center">
                <div class="container">
                 <h3 class="text-center" style="margin-top:100px">Belum Ada Buku</h3>
                <hr style="height:7px; background-color:blue">
                 <p class="text-center" style="font-size:20px">Silahkan Menambahkan Buku</p>
        <?php else: ?>
            <div class="d-flex justify-content-evenly my-5">
            <?php 
			    while($data = mysqli_fetch_array($query)){    
            ?>
            <div class="card" style="width: 18rem;">
                <img src="gambar/<?php echo $data['gambar'] ?>" class="card-img-top" width="500">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['judul_buku'] ?></h5>
                    <p class="card-text"><?php echo $data['deskripsi'] ?></p>
                    <a href="yadi_detailBuku.php?id=<?php echo $data['id_buku'] ?>" class="btn btn-primary">Tampilkan Lebih Lanjut</a>
                </div>
            </div>
            <?php 
                } 
            ?>
            </div>
        <?php endif; ?>
    </main>
    <!-- END  NAVBAR -->

    <!-- INI FOOTER -->
    <footer class="footer bg-light mt-5">
        <div class="text-center">
            <img src="http://hmsitel-u.id/wp-content/uploads/2021/01/logo-ead-1.png" alt="" width='150px' class='mt-5'>
            <h3 style='font-weight:bold; color:black; margin-top:20px'>Perpustakaan EAD</h3>
            © Yadi_1202193338
        </div>
    </footer>
    <!-- END FOOTER -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>