 <?php
    if($_GET['id_transaksi']){
    include "koneksi.php";
        $id_transaksi=$_GET['id_transaksi'];
        mysqli_query($conn, "INSERT INTO pembayaran (id_transaksi,tgl_pembayaran)
            VALUE ('".$id_transaksi."','".date('Y-m-d')."')");
        header('location: transaksi.php');
    }
?>