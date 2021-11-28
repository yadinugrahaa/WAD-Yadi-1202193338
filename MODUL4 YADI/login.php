<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--php section-->
    <?php
session_start();
include("koneksi.php");

if(isset($_SESSION["is_login"])) {
    header("location: index.php");
}

if(isset($_COOKIE["username"])) {
    header("location: index.php");
}

$message = "";
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $sandi = $_POST["pass"];
    if(isset($_POST["remember_me"])) {
        $remember_me = TRUE;
    }else{
        $remember_me = FALSE;
    }
    
    $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows == 0) {
        $message = "Gagal login: user tidak ditemukan!";
    } else {
        $user = mysqli_fetch_assoc($result);
        if(password_verify($sandi, $user["password"])) {
            if($remember_me){
                setcookie("email", $user["email"], strtotime('+1 days'), '/');
            }
            setcookie("navbar", "default", strtotime('+1 days'), '/');
            $_SESSION["is_login"] = TRUE;
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["nama"] = $user["nama"];
            header("location: index.php");
        }else{
            $message = "Email atau kata sandi salah!";
        }
    }
}
?>



    <title>Login</title>
</head>

<body style="background-color: rgb(192, 192, 192);">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4682B4;">
        <a style="margin-left:300px" class="navbar-brand" href="#">EAD TRAVEL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div style="margin-right:300px" class="navbar-nav">
                <a  class="nav-link active" href="#">Login<span class="sr-only">(current)</span></a>
                <a class="nav-link" href="daftar.php">Register</a>
            </div>
        </div>
    </nav>
    <?php
    
    if (isset($_GET['alert'])) {
    ?>
        <div class="alert alert-warning" role="alert"> Berhasil Logout! </div>

    <?php } ?>
    <div class="container mt-3 d-flex justify-content-center">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="mt-4 text-center">Login</h1><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input placeholder='Masukkan Email Kamu' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required size="43px">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kata Sandi</label>
                                <input placeholder='Masukkan kata sandi Kamu'type="password" class="form-control" id="exampleInputPassword1" name="pass" required size="43px">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                                <p>belum punya akun?<a href="daftar.php">Registrasi</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- FOOTER -->
    <footer>
    <div class=" text-center text-white p-2 bg-danger">
        <button type="button" class="btn" data-toggle="modal" data-target="#myModal"> <a class="text-white">
        © 2021 Copyright: Yadi Nugraha_1202193338</a> </button>
    </div>
    <!-- END FOOTER -->
</body>

</html>
