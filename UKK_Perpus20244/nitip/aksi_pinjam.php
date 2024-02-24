<?php 
    include "koneksi.php";
    $query = mysqli_query($koneksi, "SELECT max(kode_pinjam) as kode_terbesar FROM peminjaman");
    $data = mysqli_fetch_array($query);
    $kode_pinjam = $data['kode_terbesar'];

    $urutan = (int) substr($kode_pinjam, 3, 3);

    $urutan++;

    $huruf = "KP";
    $kode_pinjam = $huruf . sprintf("%03s", $urutan);

   if(isset($_POST['submit'])){
        $id_user = $_SESSION['id_user'];
        $id_buku = $_POST['id_buku'];
        $tanggal_peminjaman = date('y-m-d');
        $tanggal_pengembalian = date('y-m-d', strtotime($tanggal_peminjaman.'+ 7 days'));
        $status_peminjaman = $_POST['status_peminjaman'];
        $jumlah = $_POST['jumlah'];

        $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku, id_user, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman, jumlah) VALUES ('$id_buku', '$id_user', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman', '$jumlah')");

        if($query){
            echo '<script>alert("Anda Behasil meminjam");location.href="keranjang.php";</script>';
        }else{
            echo '<script>alert("Anda Gagal meminjam");</script>';
        }
    }
?>
