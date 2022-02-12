<!DOCTYPE html>
<html>
    <head>
        <title>PELANGGAN</title>
        <link href="ASSETS/RANDOM/LOGIN.png" rel="shortcut icon">
        <link href="style_header.css" rel="stylesheet">
        <link href="style_home.css" rel="stylesheet">
        <link href="style_table.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
                        <a href="tampil_pelanggan.php" class="active"><span class="las la-user-friends"></span>
                        <span>Customer</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <table>
            <tr><th>No</th><th>Nama Pelanggan</th><th>Username</th><th>Alamat</th><th>Telepon</th><th>Aksi</th></tr>
            <?php
                include "koneksi.php";
                $qry_pelanggan=mysqli_query($conn,"SELECT * FROM pelanggan"); $no=0;
                while($data_pelanggan=mysqli_fetch_array($qry_pelanggan)){ $no++;?>
            <tr>
                <td><?=$no?></td><td><?=$data_pelanggan['nama_pelanggan']?></td>
                <td><?=$data_pelanggan['username']?></td>
                <td><?=$data_pelanggan['alamat']?></td>
                <td><?=$data_pelanggan['telp']?></td>
                <td>
                    <a href="ubah_pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>" class="ubah"><i class="las la-user-edit"></i></a> |
                    <a href="hapus_pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="hapus"><i class="las la-ban"></i></a>
                </td>                
            </tr>
            <?php } ?>
        </table>
    </body>
</html>