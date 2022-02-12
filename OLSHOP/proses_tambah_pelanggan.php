<?php
    include "koneksi.php";
    if($_POST){
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $username       = $_POST['username'];
        $alamat         = $_POST['alamat'];
        $telp           = $_POST['telp'];
        $password       = $_POST['password'];
        //upload foto
        $ekstensi       = array('png','jpg','jpeg');
		$namafoto       = $_FILES['foto_pelanggan']['name'];
		$tmp            = $_FILES['foto_pelanggan']['tmp_name'];
		$tipe_foto      = pathinfo($namafoto, PATHINFO_EXTENSION);
		$ukuran         = $_FILES['foto_pelanggan']['size'];	
        if(!in_array($tipe_foto, $ekstensi)){
			header("location:tambah_pelanggan.php?alert=gagal_ektensi");
		}else{
			if($ukuran < 1044070){			
				move_uploaded_file($tmp, 'assets/foto/'.$namafoto);
				$query = mysqli_query($conn, "INSERT INTO pelanggan (nama_pelanggan, username, alamat, telp, password, foto_pelanggan) 
                    VALUE ('".$nama_pelanggan."','".$username."','".$alamat."','".$telp."','".md5($password)."','".$namafoto."')");
				if($query){
					echo "<script>alert('Sukses menambahkan pelanggan');location.href='login_pelanggan.php';</script>";
				}else{
					echo "<script>alert('Gagal menambahkan pelanggan');location.href='login_pelanggan.php';</script>";
				}
			}else{
				echo "<script>alert('Ukuran Terlalu Besar');location.href='tambah_pelanggan.php';</script>";
			}
		}
    }
?>