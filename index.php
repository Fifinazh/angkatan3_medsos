<?php
session_start();
if (empty($_SESSION['NAMA'])) {
    header("location:login.php?acesss=failed");
}

include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="bootstrap-5.3.3/bootstrap-5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="wrapper">
        <?php include 'inc/navbar.php'; ?>

        <div class="content">
            <?php
            if (isset($_GET['pg'])) {
                if (file_exists('content/' . $_GET['pg'] . '.php')) {
                    include 'content/' . $_GET['pg'] . '.php';
                } else {
                    echo "<h1>Halaman Tidak Ditemukan</h1>";
                }
            } else {
                include 'content/dashboard.php';
            }
            ?>
        </div>

        <footer class="text-center border-top fixed-bottom p-3">Copyright &copy; 2024 PPKD - Jakarta Pusat.</footer>
    </div>
    <script src="bootstrap-5.3.3/bootstrap-5.3.3/dist/js/jquery-3.7.1.min.js"></script>
    <script src="bootstrap-5.3.3/bootstrap-5.3.3/dist/js/moment.js"></script>
    <script src="bootstrap-5.3.3/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="app.js"></script>

    <script>
        $("#id_peminjaman").change(function() {
            let no_peminjaman = $(this).find('option:selected').text();
            let tbody = $('tbody'), newRow = "";
            $.ajax({
                url:"ajax/getPeminjam.php?no_peminjaman=" + no_peminjaman,
                type:"get",
                dataType:"json",
                success: function(res) {
                    $('#no_pinjam').val(res.data.no_peminjaman);
                    $('#tgl_peminjaman').val(res.data.tgl_peminjaman);
                    $('#tgl_pengembalian').val(res.data.tgl_pengembalian);
                    $('#nama_anggota').val(res.data.nama_anggota);

                    let tanggal_kembali = new moment(res.data.tgl_pengembalian);
                    let currentDate = new Date().toJSON().slice(0, 10);
                    let tanggal_di_kembalikan = new moment('2024-10-21');
                    let selisih = tanggal_di_kembalikan.diff(tanggal_kembali,"days");
                    if(selisih < 0) {
                        selisih = 0;
                    }

                    let biaya_denda = 1000;
                    let totalDenda = selisih * biaya_denda;
                    $('#denda').val(totalDenda);

                    $.each(res.detail_peminjaman, function(key, val) {
                        newRow += "<tr>";
                        newRow += "<td>" + val.nama_buku + "</td>";
                        newRow += "</tr>";
                    });

                    tbody.html(newRow);

                    // console.log(res);
                }
            }
        );
        })
    </script>
</body>

</html>