<?php
$koneksi = mysqli_connect("localhost","root","","modul3");
if(!$koneksi) {
    echo "<script>
         alert('Data Loss')
         </script>";
}
$id_buku = $_GET["id_buku"];
$query = "DELETE FROM buku_table WHERE id_buku='$id_buku'";
mysqli_query($koneksi, $query);
header('Location: yadi_home.php')
?>