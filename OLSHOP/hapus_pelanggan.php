<?php
    if($_GET['id_pelanggan']){
        include "koneksi.php";
        $id     = $_GET['id_pelanggan'];
        $sql    = $conn -> query ("SELECT * FROM pelanggan WHERE id_pelanggan = '$id'");
        $data   = $sql -> fetch_assoc();
        $foto   = $data['foto_pelanggan'];
        if(file_exists("ASSETS/foto/$foto")){
            unlink("ASSETS/foto/$foto");
        }
        $qry_hapus=mysqli_query($conn,"DELETE from pelanggan WHERE id_pelanggan='".$_GET['id_pelanggan']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus pelanggan');location.href='tampil_pelanggan.php';</script>";
        }else{
            echo "<script>alert('Gagal hapus pelanggan');location.href='tampil_pelanggan.php';</script>";
        }
    }
?>