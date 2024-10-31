<?php 
include 'koneksi.php';
//jika button daftar di klik atau ditekan
if (isset($_POST['daftar'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nama_pengguna = $_POST['nama_pengguna'];

    //masukkan data ke dalam tabel user kolom kolom tbl user () dan nilainya di ambil dari inputan sesuai dgn urutan kolomnya
    $queryReg = mysqli_query($koneksi, "INSERT INTO user (email, password, nama_lengkap, nama_pengguna) VALUES ('$email','$password','$nama_lengkap','$nama_pengguna')");

    // melempar ke halaman login menggunakan header
    header("location:login.php?register=berhasil");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="bootstrap-5.3.3/bootstrap-5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 mx-auto mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h5>Social Hub</h5>
                            </div>
                            <form action="" method="post">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        Email
                                    </label>
                                    <input type="email" class="form-control" name="email" placeholder="Masukkan email anda">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        Password
                                    </label>
                                    <input type="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        Nama Lengkap
                                    </label>
                                    <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan nama lengkap">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        Nama Pengguna
                                    </label>
                                    <input type="text" class="form-control" name="nama_pengguna" placeholder="Masukkan nama pengguna">
                                </div>
                                <div class="form-group mb-3">
                                    <div class="d-grid">
                                        <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p>Sudah punya akun? <a href="register.php" class="text-secondary">Buat Akun</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>