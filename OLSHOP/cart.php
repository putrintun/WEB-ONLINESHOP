<!DOCTYPE html>
<html>
    <head>
        <title>KERANJANG</title>
        <link href="ASSETS/RANDOM/LOGIN.png" rel="shortcut icon">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link href="style_home.css" rel="stylesheet">
        <link href="style_header.css" rel="stylesheet">
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
                        <a href="transaksi.php"><span class="las la-shopping-cart"></span>
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
            <th>No</th><th>Nama Produk</th><th>Harga</th><th>Jumlah</th><th>Total Harga</th><th>id Petugas</th><th>Aksi</th>
            <?php foreach (@$_SESSION['cart'] as $key_produk => $val_produk): ?>
                <tr>
                    <td><?=($key_produk+1)?></td>
                    <td><?=$val_produk['nama_produk']?></td>
                    <td><?=$val_produk['harga']?></td>
                    <td><?=$val_produk['qty']?></td>
                    <?php 
						$subtotal = 0;
						$total = $val_produk['harga'] * $val_produk['qty'];
					?>
                    <td><?=$total?></td>
                    <td><?=$val_produk['id_petugas']?></td>
                    <td><a class="btn" href="hapus_cart.php?id=<?=$key_produk?>"><strong><i class="las la-minus-circle"></i></strong></a></td>
                </tr>
            <?php endforeach ?>
            <?php if(@$_SESSION['cart']==true && $_SESSION["status"]=="Customer"){ ?>
                <tr>
                    <td colspan="7" class="td-full"><a href="checkout.php" class="tambah" onclick="return confirm('Apakah anda yakin untuk membelinya ?')">Check Out</a></td>
                </tr>
            <?php } ?>
            <tr><td colspan="7">Happy Shopping</td></tr>
        </table>
    </body>
</html>