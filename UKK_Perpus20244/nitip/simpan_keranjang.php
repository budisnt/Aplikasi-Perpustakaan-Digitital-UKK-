<?php 
    if(isset($_POST['submit'])){
        include "koneksi.php";
        $tambah=mysqli_query($koneksi, "SELECT * FROM buku id_buku=$_GET['id_buku']");
        $data=mysqli_fetch_array($tambah);
        $_SESSION['cart'][]=array(
            'id_buku' =>$data['id_buku'],
            'judul' =>$data['judul'],
            'stok' =>$_POST['jumlah']); 
    }
    header('location:keranjang.php');


?>