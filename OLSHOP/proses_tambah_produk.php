<?php
    include "koneksi.php";
    if($_POST){
        $nama_produk = $_POST['nama_produk'];
		$deskripsi	 = $_POST['deskripsi'];
        $harga	     = $_POST['harga'];
        //upload foto
        $ekstensi 	= array('png','jpg','jpeg','PNG','JPG','JPEG');
		$namafile 	= $_FILES['file']['name'];
		$tmp 		= $_FILES['file']['tmp_name'];
		$tipe_file 	= pathinfo($namafile, PATHINFO_EXTENSION);
		$ukuran 	= $_FILES['file']['size'];	
		if(!in_array($tipe_file, $ekstensi)){
			header("location:tambah_produk.php?alert=gagal_ektensi");
		}else{
			if($ukuran < 1044070){			
				$query = mysqli_query($conn, "INSERT INTO produk (nama_produk, deskripsi, harga, foto_produk) 
                    VALUE ('".$nama_produk."','".$deskripsi."','".$harga."','".$namafile."')");
				if($query){
					move_uploaded_file($tmp, 'ASSETS/foto_produk/'.$namafile);
					echo "<script>alert('Sukses menambahkan produk');location.href='produk.php';</script>";
				}else{
					echo "<script>alert('Gagal menambahkan produk');location.href='produk.php';</script>";
				}
			}else{
				echo "<script>alert('Ukuran Terlalu Besar');location.href='tambah_produk.php';</script>";
			}
		}
    }
?>