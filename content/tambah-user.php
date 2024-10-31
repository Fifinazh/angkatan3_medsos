<?php
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon = $_POST['telepon'];

    $insert = mysqli_query($koneksi, "INSERT INTO user (nama, email, password, jenis_kelamin, telepon) VALUES ('$nama','$email','$password','$jenis_kelamin','$telepon')");
    header("location:?pg=user&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editUser = mysqli_query(
    $koneksi,
    "SELECT * FROM user WHERE id = '$id'"
);
$rowEdit = mysqli_fetch_assoc($editUser);

if(isset($_POST['edit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = ($_POST['password']) ? sha1($_POST['password']) : $rowEdit['password'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon = $_POST['telepon'];

    //ubah user kolom apa yang mau di ubah (SET) 
    $update = mysqli_query($koneksi, "UPDATE user SET nama= '$nama', email ='$email', password='$password', jenis_kelamin='$jenis_kelamin', telepon='$telepon' WHERE id='$id'");
    header("location:?pg=user&ubah=berhasil");
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");
    header("location:?pg=user&hapus=berhasil");
}

?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border border-black border-2 p-3">
                <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> User</legend>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password Anda">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <br>
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo isset($_GET['edit']) ? ($rowEdit['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '') : '' ?>>Laki-laki
                        <br>
                        <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo isset($_GET['edit']) ? ($rowEdit['jenis_kelamin'] == 'Perempuan' ? 'checked' : '') : '' ?>>Perempuan
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Telepon</label>
                        <input type="number" class="form-control" name="telepon" placeholder="Masukkan Telepon Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['telepon'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary" type="submit">Simpan</button>

                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>