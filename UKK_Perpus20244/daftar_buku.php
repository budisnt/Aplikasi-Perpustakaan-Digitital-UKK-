<h1 class="h3 mb-0 text-gray-800">Daftar Buku</h1>
          </div>
          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="row m-4">
                          <?php
                            $i = 1;

                            $query = mysqli_query($koneksi, "SELECT * FROM buku order by id_buku asc");
                            while($data = mysqli_fetch_array($query)){
                                ?>
                          <div class="card m-6 " style="width: 14rem;">
                            <img src="assets/img/<?php echo $data['foto']; ?>" class="card-img-top" >
                            <div class="card-body">
                              <h5 class="card-title"><?php echo $data['judul']; ?></h5>
                              <h6>Sinopsis : <?php echo $data['deskripsi']; ?></h6>
                              <a href="?page=detail&&id=<?php echo $data['id_buku'];?>" class="btn btn-warning">Detail</a>
                              <a href="?page=peminjaman_tambah&&id=<?php echo $data['id_buku'];?> "class="btn btn-primary">Pinjam</a>
                            </div>
                          </div>
                          <?php
                            }
                          ?>
                        </div>
                      </div>
                  </div>
              </div>
          </div>