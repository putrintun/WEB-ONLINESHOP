<?php
    session_start();
    include "koneksi.php";
    $cart=@$_SESSION['cart'];
    if(count($cart)>0){
        foreach ($cart as $key_produk => $val_produk) {
        mysqli_query($conn,"INSERT INTO transaksi(id_pelanggan,id_petugas,tgl_transaksi)
            VALUE ('".$_SESSION['id_pelanggan']."','".$val_produk['id_petugas']."','".date('Y-m-d')."')");
        $id=mysqli_insert_id($conn);
			$subtotal = 0;
			$total = $val_produk['harga'] * $val_produk['qty'];
            mysqli_query($conn,"INSERT INTO detail_transaksi (id_transaksi,id_produk,qty,subtotal)
                VALUE ('".$id."','".$val_produk['id_produk']."','".$val_produk['qty']."','".$total."')");
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Jangan Lupa Bayar !");location.href="transaksi.php"</script>';
    }
?>