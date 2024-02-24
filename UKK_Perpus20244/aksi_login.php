<?php
include 'koneksi.php';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $data = mysqli_query($koneksi, "SELECT*FROM user where username='$username' and password= '$password'");
    if(mysqli_num_rows($data)==0){
        echo 
        '<script>
        alert("Login Gagal");
        location.href="login.php";
        </script>';
    }else if(mysqli_num_rows($data)>0){ 
        $login=mysqli_fetch_array($data);
        $_SESSION['user']=true;
        $_SESSION['id_user']=$login['id_user'];
        $_SESSION['username']=$login['username'];
        $_SESSION['nama']=$login['nama'];
        $_SESSION['email']=$login['email'];
        $_SESSION['alamat']=$login['alamat'];
       $_SESSION['level']=$login['level'];
       echo 
       '<script>
           alert("Login Berhasil");
           location.href="index.php";
       </script>';
   }
 }
?>