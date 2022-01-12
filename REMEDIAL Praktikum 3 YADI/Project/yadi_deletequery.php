<?php
    include("yadi_koneksi.php");
    if (isset($_POST["hapus"])){
        $id_buku = $_POST['id_buku'];
        $ya = mysqli_query($koneksi, " DELETE FROM buku_table WHERE id_buku = $id_buku");
        header("Location: yadi_home.php");
    }
?>