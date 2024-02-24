<h1 class="h3 mb-0 text-gray-800">Detail Buku</h1>
          </div>
          <div class="card">
              <div class="card-body">
              <div class="row m-4">
                <?php
                $id=$_GET['id'];
                  $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
                  $buk = mysqli_fetch_array($query);
                ?>
                  <div class="col text-center">
                  <img src="assets/img/<?php echo $buk['foto']; ?>" height="500">
                  </div>
                  <div class="col" >
                    <table class="table table-flush">
                        <tr>
                            <td><h5>Judul Buku</h5></td>
                            <td><h5>: <?php echo $buk['judul']; ?></h5></td>
                        </tr>
                        <tr>
                            <td><h5>Penulis</h5></td>
                            <td><h5>: <?php echo $buk['penulis']; ?></h5></td>
                        </tr>
                        <tr>
                            <td><h5>Penerbit</h5></td>
                            <td><h5>: <?php echo $buk['penerbit']; ?></h5></td>
                        </tr>
                        <tr>
                            <td><h5>Tahun Terbit</h5></td>
                            <td><h5>: <?php echo $buk['tahun_terbit']; ?></h5></td>
                        </tr>
                        <tr>
                            <td><h5>Deskripsi</h5></td>
                            <td><h5>: <?php echo $buk['deskripsi']; ?></h5></td>
                        </tr>
                    </table>
                    <a href="?page=daftar_buku" class="btn btn-danger my-3">Kembali</a>
                  </div>
              </div>
              </div>
          </div>
       