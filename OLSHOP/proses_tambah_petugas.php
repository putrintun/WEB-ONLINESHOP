<?php
    include "koneksi.php";
    if($_POST){
        $nama_petugas   = $_POST['nama_petugas'];
        $username       = $_POST['username'];
        $password       = $_POST['password'];
        $level          = $_POST['level'];
        //upload foto
        $ekstensi       = array('png','jpg','jpeg');
		$namafoto       = $_FILES['foto_petugas']['name'];
		$tmp            = $_FILES['foto_petugas']['tmp_name'];
		$tipe_foto      = pathinfo($namafoto, PATHINFO_EXTENSION);
		$ukuran         = $_FILES['foto_petugas']['size'];	
        if(!in_array($tipe_foto, $ekstensi)){
			header("location:tambah_petugas.php?alert=gagal_ektensi");
		}else{
			if($ukuran < 1044070){			
				move_uploaded_file($tmp, 'assets/foto/'.$namafoto);
				$query = mysqli_query($conn, "INSERT INTO petugas (nama_petugas, username, password, level, foto_petugas) 
                    VALUE ('".$nama_petugas."','".$username."','".md5($password)."','".$level."','".$namafoto."')");
				if($query){
					echo "<script>alert('Sukses menambahkan petugas');location.href='login_petugas.php';</script>";
				}else{
					echo "<script>alert('Gagal menambahkan petugas');location.href='login_petugas.php';</script>";
				}
			}else{
				echo "<script>alert('Ukuran Terlalu Besar');location.href='tambah_petugas.php';</script>";
			}
		}
    }
?>