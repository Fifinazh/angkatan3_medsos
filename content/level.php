<?php
$level = mysqli_query($koneksi, "SELECT * FROM level ORDER BY id DESC");
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border border-black border-2 p-3">
                <legend class="float-none w-auto px-3">Data Level</legend>
                <div align="right">
                    <a href="?pg=tambah-level" class="btn btn-primary">Tambah</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover mt-5">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($rowLevel = mysqli_fetch_assoc($level)):
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $rowLevel['nama_level'] ?></td>
                                    <td>
                                        <a id="edit-level" data-id="<?php echo $rowLevel['id'] ?>" href="?pg=tambah-level&edit=<?php echo $rowLevel['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="?pg=tambah-level&delete=<?php echo $rowLevel['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </div>
    </div>
</div>