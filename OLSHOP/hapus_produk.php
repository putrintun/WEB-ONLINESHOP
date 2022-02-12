<?php
    if($_GET['id_produk']){
        include "koneksi.php";
        $id     = $_GET['id_produk'];
        $sql    = $conn -> query ("SELECT * FROM produk WHERE id_produk = '$id'");
        $data   = $sql -> fetch_assoc();
        $foto   = $data['foto_produk'];
        if(file_exists("assets/foto_produk/$foto")){
            unlink("assets/foto_produk/$foto");
        }
        $qry_hapus=mysqli_query($conn,"DELETE FROM produk WHERE id_produk='".$_GET['id_produk']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus produk');location.href='produk.php';</script>";
        }else{
            echo "<script>alert('Gagal hapus produk');location.href='produk.php';</script>";
        }
    }
?>