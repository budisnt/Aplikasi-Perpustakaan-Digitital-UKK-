<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-md-12">
            <a href="?page=daftar_buku"  class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
            <table class="table table-bordered" id="dataTable" width="100%" collspacing="0">
                <tr>
                    <th>NO</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Foto</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Peminjaman</th>
                    <th>Jumlah</th>
                    
                </tr>

                <?php 
                $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user=" .$_SESSION['id_user'] );
                    while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><img width="60px" src="assets/img/<?php echo $data['foto']; ?>"></td>
                            <td><?php echo $data['tanggal_peminjaman']; ?></td>
                            <td><?php echo $data['tanggal_pengembalian']; ?></td>
                            <td><?php echo $data['status_peminjaman']; ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                           
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
        </div>
    </div>
</div>