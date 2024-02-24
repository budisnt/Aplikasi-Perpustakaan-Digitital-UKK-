<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                <?php

                          if(isset($_POST['submit'])){
                        $id_user = $_SESSION['id_user'];
                        $id_buku = $_POST['id_buku'];
                        $foto = $_POST['foto'];
                        $tanggal_peminjaman = date('y-m-d');
                        $tanggal_pengembalian = date('y-m-d', strtotime($tanggal_peminjaman.'+ 7 days'));
                        $status_peminjaman = $_POST['status_peminjaman'];
                        $jumlah = $_POST['jumlah'];
                        $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman,jumlah) VALUES ('$id_buku','$id_user','$tanggal_peminjaman','$tanggal_pengembalian','$status_peminjaman','$jumlah')");

                        if($query){
                            echo '<script>alert("ANDA BERHASIL MEMINJAM."); location.href="?page=peminjaman";</script>';
                        }else{
                            echo '<script>alert("GAGAL MEMINJAM.");</script>';
                        }
                    }
                   ?>
                   
                    <div class="row mb-3">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8">
                                <?php 
                                $id = $_GET['id'];
                                $buk = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
                                while($buku = mysqli_fetch_array($buk)){
                                ?>
                                <input type="hidden" class="form-control" name="id_buku" value="<?php echo $buku ['id_buku'] ?>">
                                <input type="text" class="form-control" name="id_buku" value="<?php echo $buku ['judul'] ?>"disabled>

                                <?php
                                }
                                ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Jumlah</div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="jumlah" max="1" min="1" value="1">
                        </div>
                     </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Status Peminjaman</div>
                        <div class="col-md-8">
                            <select name="status_peminjaman" class="form-control">
                                <option value="dipinjam">Dipinjam</option>
                                <option value="dikembalikan">Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
