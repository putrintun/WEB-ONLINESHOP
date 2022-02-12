<?php
    if($_POST){
        $id_pelanggan   = $_POST['id_pelanggan'];
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $username       = $_POST['username'];
        $password       = $_POST['password'];
        $telp           = $_POST['telp'];
        $alamat         = $_POST['alamat'];
        include "koneksi.php";
        $update=mysqli_query($conn,"UPDATE pelanggan SET nama_pelanggan='".$nama_pelanggan."', username='".$username."', password='".md5($password)."', telp='".$telp."', alamat='".$alamat."' WHERE id_pelanggan = '".$id_pelanggan."' ") or die(mysqli_error($conn));
        if($update){
            echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
        }else{
            echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
        }
    }
?>