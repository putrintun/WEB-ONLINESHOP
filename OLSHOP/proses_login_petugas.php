<?php
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='login_petugas.php';</script>";
        }elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login_petugas.php';</script>";
        }else{
            include "koneksi.php";
            $qry_login=mysqli_query($conn,"SELECT * FROM petugas WHERE username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login)>0){
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id_petugas']     = $dt_login['id_petugas'];
                $_SESSION['nama']           = $dt_login['nama_petugas'];
                $_SESSION['username']       = $dt_login['username'];
                $_SESSION['password']       = $dt_login['password'];
                $_SESSION['level']          = $dt_login['level'];
                $_SESSION['foto']           = $dt_login['foto_petugas'];
                $_SESSION['status']         = "Admin";
                $_SESSION['status_login']   = true;
                header("location: home.php");
            }else{
                echo "<script>alert('Username dan Password tidak benar');location.href='login_petugas.php';</script>";
            }
        }
    }
?>