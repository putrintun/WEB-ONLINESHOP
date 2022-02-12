<?php
    if($_GET['id_petugas']){
        include "koneksi.php";
        $id     = $_GET['id_petugas'];
        $sql    = $conn -> query ("SELECT * FROM petugas WHERE id_petugas = '$id'");
        $data   = $sql -> fetch_assoc();
        $foto   = $data['foto_petugas'];
        if(file_exists("ASSETS/foto/$foto")){
            unlink("ASSETS/foto/$foto");
        }
        $qry_hapus=mysqli_query($conn,"DELETE FROM petugas WHERE id_petugas='".$_GET['id_petugas']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus petugas');location.href='tampil_petugas.php';</script>";
        }else{
            echo "<script>alert('Gagal hapus petugas');location.href='tampil_petugas.php';</script>";
        }
    }
?>