<!DOCTYPE html>
<html>
    <head>
        <title>TRANSAKSI</title>
        <link href="ASSETS/RANDOM/LOGIN.png" rel="shortcut icon">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link href="style_header.css" rel="stylesheet">
        <link href="style_home.css" rel="stylesheet">
        <link href="style_table.css" rel="stylesheet">
    </head>
    <body>
        <?php
            include "header.php";
        ?>
        <div class="sidebar">
            <center>
                <img name="foto" src="ASSETS/foto/<?=$_SESSION["foto"]?>" class="profile-img" alt="">
                <h2><?=$_SESSION["nama"]?></h2>
            </center>
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="home.php"><span class="las la-home"></span>
                        <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="produk.php"><span class="las la-hamburger"></span>
                        <span>Product</span></a>
                    </li>
                    <li>
                        <a href="transaksi.php" class="active"><span class="las la-shopping-cart"></span>
                        <span>Transaction</span></a>
                    </li>
                    <li>
                        <a href="tampil_petugas.php"><span class="las la-user-astronaut"></span>
                        <span>Admin</span></a>
                    </li>
                    <li>
                        <a href="tampil_pelanggan.php"><span class="las la-user-friends"></span>
                        <span>Customer</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <table>
            <th>NO</th><th>Tanggal Transaksi</th><th>Nama Produk</th><th>Total Harga</th><th>Status</th><th>Aksi</th>
            <?php
                include "koneksi.php";
                $qry_histori=mysqli_query($conn,"SELECT * FROM transaksi ORDER BY id_transaksi DESC"); $no=0;
                while($dt_histori=mysqli_fetch_array($qry_histori)){ 
                    $no++; $qry_produk=mysqli_query($conn,"SELECT * FROM detail_transaksi JOIN produk ON produk.id_produk = detail_transaksi.id_produk WHERE id_transaksi ='".$dt_histori['id_transaksi']."'");
                    $produk_dibeli ="<ol>";
                    while($dt_produk=mysqli_fetch_array($qry_produk)){ 
                        $produk_dibeli.="<li>".$dt_produk['nama_produk']."</li>";}
                        $produk_dibeli.="</ol>"; 
                    $qry_cek_total=mysqli_query($conn,"SELECT * FROM detail_transaksi WHERE id_transaksi ='".$dt_histori['id_transaksi']."'");
                    while($dt_total=mysqli_fetch_array($qry_cek_total)){ 
                        $subtotal = $dt_total['subtotal'];}
                    $qry_cek_bayar=mysqli_query($conn,"SELECT * FROM pembayaran WHERE id_transaksi ='".$dt_histori['id_transaksi']."'");
                    if(mysqli_num_rows($qry_cek_bayar)>0){ 
                        $dt_bayar=mysqli_fetch_array($qry_cek_bayar);
                        $tanggal=" TANGGAL ".$dt_bayar['tgl_pembayaran'];
                        $status_transaksi ="<label class='sudah'>SUDAH DIAMBIL</label>";
                        $button="<a class='btn' href='struk.php?id_transaksi=".$dt_histori['id_transaksi']."'><i class='las la-receipt'></i></a>";; 
                    } else {
                        $status_transaksi="<label class='belum'>BELUM BAYAR</label>";
                        $button="<a class='btn' href='bayar.php?id_transaksi=".$dt_histori['id_transaksi']."' onclick='return confirm(\"Anda yakin sudah bayar ?\")'><i class='las la-cash-register'></i></a>";
                    }
            ?>
            <tr>
                <td><?=$no?></td><td><?=$dt_histori['tgl_transaksi']?></td><td><?=$produk_dibeli?></td><td><?=$subtotal?></td><td><?=$status_transaksi?></td><td><?=$button?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>