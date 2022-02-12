<?php
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        include "koneksi.php";
        $qry_login=mysqli_query($conn,"SELECT * FROM pelanggan WHERE username = '".$username."' and password = '".md5($password)."'");
        if(mysqli_num_rows($qry_login)>0){
            $dt_login=mysqli_fetch_array($qry_login);
            session_start();
            $_SESSION['id_pelanggan']   = $dt_login['id_pelanggan'];
            $_SESSION['nama']           = $dt_login['nama_pelanggan'];
            $_SESSION['username']       = $dt_login['username'];
            $_SESSION['alamat']         = $dt_login['alamat'];
            $_SESSION['telp']           = $dt_login['telp'];
            $_SESSION['password']       = $dt_login['password'];
            $_SESSION['foto']           = $dt_login['foto_pelanggan'];
            $_SESSION['status']         = "Customer";
            $_SESSION['status_login']   = true;
            header("location: home.php");
        }else{
            echo "<script>alert('Username dan Password tidak benar');location.href='login_pelanggan.php';</script>";
        }
    }
?>