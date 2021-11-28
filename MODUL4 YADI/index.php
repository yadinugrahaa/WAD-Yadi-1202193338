<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODUL 4</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="css/datepicker.css">

    <!-- Datepicker JS-->
    <script src="js/datepicker.js"></script>
    
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- FONT AWESOME -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <title>EAD TRAVEl 2021</title>
</head>

<!--PHP SECTION-->
<?php
session_start();
include("koneksi.php");

if (!isset($_SESSION["is_login"])) {
    header("location: login.php");
}
$message = "";
if (isset($_POST["tambah1"])) {
    $user_id = $_SESSION["user_id"];
    $nama_tempat = $_POST["nama_tempat"];
    $lokasi = $_POST["lokasi"];
    $harga = (int)$_POST["harga"];
    $date = $_POST["eventdate"];

    $query = "INSERT INTO bookings VALUES ('', $user_id, 'Raja Ampat', 'Papua', 7000000, '$date')";
    $result = mysqli_query($conn, $query);
    $message = "Barang berhasil ditambahkan ke keranjang";
}

if (isset($_POST["tambah2"])) {
    $nama_tempat = $_POST["nama_tempat2"];
    $user_id = $_SESSION["user_id"];
    $lokasi = $_POST["lokasi2"];
    $harga = $_POST["harga2"];
    $date = $_POST["eventdate2"];

    $query = "INSERT INTO bookings VALUES ('', $user_id, '$nama_tempat', '$lokasi', $harga, '$date')";
    $result = mysqli_query($conn, $query);
    $message = "Barang berhasil ditambahkan ke keranjang";
}

if (isset($_POST["tambah3"])) {
    $nama_tempat = $_POST["nama_tempat3"];
    $user_id = $_SESSION["user_id"];
    $lokasi = $_POST["lokasi3"];
    $harga = $_POST["harga3"];
    $date = $_POST["eventdate3"];

    $query = "INSERT INTO bookings VALUES ('', $user_id, '$nama_tempat', '$lokasi', $harga, '$date')";
    $result = mysqli_query($conn, $query);
    $message = "Barang berhasil ditambahkan ke keranjang";
}

?>
<!-- END PHP SECTION -->


<!-- NAVBAR -->
<body style="background-color: rgb(192, 192, 192);">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4682B4;">
        <a style="margin-left:300px" class="navbar-brand" href="#">EAD TRAVEL</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="booking.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item">
                        <span class="navbar-text text-light">Welcomeback! </span>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION["nama"] ?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
<!-- END NAVBAR -->

<!--ISI CONTENT-->
<div class="container mt-3">
        <?php if ($message) : ?>
                <div class="alert alert-warning" role="alert">
                    <?= $message ?>
                </div>
            </div>
        <?php endif; ?>

    <table class="table table-light table-bordered">
        <thead class="bg-success text-center">
                <tr>

                    <th colspan="3">
                        <h1>EAD TRAVEL 2021</h1>
                    </th>
                </tr>
            </thead>
            <tbody class="text-dark">
                <tr>
                    <td>
                        <div class="card">
                            <form method="POST">
                                <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/8/88/Raja_Ampat%2C_Mutiara_Indah_di_Timur_Indonesia.jpg" height="270px">
                                <div class="card-body">
                                    <h3 class="card-title">Raja Empat , Papua</h3>
                                    <p class="card-text">Kepulauan Raja Ampat merupakan rangkaian empat gugusan pulau yang berdekatan dan berlokasi di barat bagian Kepala Burung (Vogelkoop) Pulau Papua. Secara administrasi, gugusan ini berada di bawah Kabupaten Raja Ampat, Provinsi Papua Barat. Kepulauan ini sekarang menjadi tujuan para penyelam yang tertarik akan keindahan pemandangan bawah lautnya. Empat gugusan pulau yang menjadi anggotanya dinamakan menurut empat pulau terbesarnya, yaitu Pulau Waigeo, Pulau Misool, Pulau Salawati, dan Pulau Batanta.</p>
                                    <hr>
                                    Rp7.000.000
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="nama_tempat" value='Raja Empat'>
                                    <input type="hidden" name="lokasi" value='Papua Barat'>
                                    <input type="hidden" name="harga" value=7000000>
                                    <button type="button" data-target="#modalDate1" data-toggle="modal" class="btn btn-primary btn-block">Pesan Tiket</button>
                                </div>

                                <!---MODAL 1-->
                                <div class="modal fade" id="modalDate1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Pilih Tanggal Perjalanan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">Event Date
                                                <input type="date" class="form-control" name='eventdate'></input>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="hidden" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="tambah1" class="btn btn-primary">Tambahkan</button>
                                        </div>
                                        </div>
                                    </div>
                                </div> 
                                <!-- END MODAL 1   -->
                            </form>
                        </div>
                    </td>

                    <td>
                        <div class="card">
                            <form method="POST">
                                <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/7/7d/Mount_Bromo_at_sunrise%2C_showing_its_volcanoes_and_Mount_Semeru_%28background%29.jpg" height="270px">
                                <div class="card-body">
                                    <h3 class="card-title">Gunung Bromo, Malang</h3>
                                    <p class="card-text">Gunung Bromo adalah salah satu gunung api yang masih aktif di Indonesia. Gunung yang memiliki ketinggian 2.392 meter di atas permukaan laut ini merupakan destinasi andalan Jawa Timur. Gunung Bromo berdiri gagah dikelilingi kaldera atau lautan pasir seluas 10 kilometer persegi.</p>
                                    <hr>
                                    Rp2.000.000
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="nama_tempat2" value="Gunung Bromo">
                                    <input type="hidden" name="lokasi2" value="Jawa Timur">
                                    <input type="hidden" name="harga2" value=2000000>
                                    <button type="button"  data-target="#modalDate2" data-toggle="modal" class="btn btn-primary btn-block">Pesan Tiket</button>
                                </div>

                                <!---MODAL 2-->
                                <div class="modal fade" id="modalDate2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Pilih Tanggal Perjalanan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">Event Date
                                                <input type="date" class="form-control" name='eventdate2'></input>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="hidden" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="tambah2" class="btn btn-primary">Tambahkan</button>
                                        </div>
                                        </div>
                                    </div>
                                </div> 
                                <!-- END MODAL 2   -->
                            </form>
                        </div>
                    </td>
                    <td>

                        <div class="card">
                            <form method="POST">
                                <img class="card-img-top" src="https://www.rentalmobilbali.net/wp-content/uploads/2019/12/Sunset-Pura-Tanah-Lot-Bali.jpg" height="270px">
                                <div class="card-body">
                                    <h3 class="card-title">Tanah Lot, Bali</h3>
                                    <p class="card-text">salah satu Pura (Tempat Ibadah Umat Hindu) yang sangat disucikan di Bali, Indonesia. Di sini ada dua pura yang terletak di atas batu besar. Satu terletak di atas bongkahan batu dan satunya terletak di atas tebing mirip dengan Pura Uluwatu. Pura Tanah Lot ini merupakan bagian dari pura Dang Kahyangan. Pura Tanah Lot merupakan pura laut tempat pemujaan dewa-dewa penjaga laut. Tanah Lot terkenal sebagai tempat yang indah untuk melihat matahari terbenam.</p>
                                    <hr>
                                    Rp5.000.000
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="nama_tempat3" value="Tanah Lot">
                                    <input type="hidden" name="lokasi3" value="Bali">
                                    <input type="hidden" name="harga3" value=5000000>
                                    <button type="button" name="tambah3" data-target="#modalDate3" data-toggle="modal" class="btn btn-primary btn-block">Pesan Tiket</button>
                                </div>
                                 <!---MODAL 3-->
                                 <div class="modal fade" id="modalDate3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Pilih Tanggal Perjalanan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">Event Date
                                                <input type="date" class="form-control" name='eventdate3'></input>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="hidden" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="tambah3" class="btn btn-primary">Tambahkan</button>
                                        </div>
                                        </div>
                                    </div>
                                </div> 
                                <!-- END MODAL 3   -->
                            </form>
                        </div>
                    </td>
                </tr>
                </form>
            </tbody>
        </table>
</div>

<!-- END CONTENT -->

</body>

        <!--FOOTER -->
    <footer>
    <div class=" text-center text-white p-3 bg-danger">
        <button type="button" class="btn" data-toggle="modal" data-target="#myModal"> <a class="text-white">
        © 2021 Copyright: Yadi Nugraha_1202193338</a> </button>
    </div>

    <!-- MODAL NAVBAR -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Dibuat oleh :</h5>
      </div>
      <div class="modal-body text-align">
        <p>Nama   : Yadi Nugraha</p>
        <p>NIM    : 1202193338</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- END MODAL NAVBAR -->
  </div>
        </footer>
    <!-- END FOOTER -->

</html>