<h1 class="mt-4">Detail Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-md-12">
            <table class="table " id="dataTable" width="100%" collspacing="0">
                <tr>
                    <th>NO</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Foto</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Peminjaman</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku");
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
                            <td>
                                <?php 
                                    if($data['status_peminjaman'] != 'dikembalikan'){
                                ?>
                                <a href="?page=peminjaman_ubah&&id=<?php echo $data['id_peminjaman']; ?>"class="btn btn-info">Kembalikan</a>
                                <?php
                                }
                                ?>
                                <a onclick="return confirm('Apakah anda yakin menghapus data ini??????');" href="?page=peminjaman_hapus&&id=<?php echo $data['id_peminjaman']; ?>"class="btn btn-danger">Hapus</a>
                                <?php 
                                    }
                                ?>
                            </td>
                        </tr>
            </table>
        </div>
        </div>
    </div>
</div>