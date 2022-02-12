<!DOCTYPE html>
<html>
    <head>
        <title>INFO PRODUK</title>
        <link href="ASSETS/RANDOM/LOGIN.png" rel="shortcut icon">
        <link href="style_header.css" rel="stylesheet">
        <link href="style_home.css" rel="stylesheet">
        <link href="style_table.css" rel="stylesheet">
        <link href="style_produk.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>
    <style>
        table {
            top: 150px;
            left: 595px;
            width: 50%;
        }
        td{
            text-align: left;
        }
        .beliproduk {
            width: 300px;
            height: 300px;
            display: block;
            border-radius: 10px;
            margin-left: 10px;
            margin-top: 15px;
            box-shadow: 0 0 10px #808080;
        }
    </style>
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
                        <a href="produk.php" class="active"><span class="las la-hamburger"></span>
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
        <main>
            <div class="daftar">
                <h2>Detail Produk<a onclick="history.back(-1)">Batal</a></h2>
                <?php
                include "koneksi.php";
                    $qry_detail_produk=mysqli_query($conn,"SELECT * FROM produk WHERE id_produk = '".$_GET['id_produk']."'");
                    $dt_produk=mysqli_fetch_array($qry_detail_produk);
                ?>
                <img class="beliproduk" src="assets/foto_produk/<?=$dt_produk['foto_produk']?>">
                <form action="masukkankeranjang.php?id_produk=<?=$dt_produk['id_produk']?>"method="post">
                    <table>
                        <tr>
                            <td>Nama Produk</td><td><?=$dt_produk['nama_produk']?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td><td><?=$dt_produk['deskripsi']?></td>
                        </tr>
                        <tr>
                            <td>Harga</td><td><?=$dt_produk['harga']?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Beli</td><td><input type="number" name="jumlah_beli" value="1"></td>
                        </tr>
                        <tr>
                            <td>Petugas</td><td><select name="id_petugas" class="form-control" required>
                                <option></option>
                                    <?php
                                        include "koneksi.php";
                                        $qry_petugas=mysqli_query($conn,"SELECT * FROM petugas"); 
                                        while($data_petugas=mysqli_fetch_array($qry_petugas)){echo '<option value="'.$data_petugas['id_petugas'].'">'.$data_petugas['nama_petugas'].'</option>';}
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input class="klik" type="submit" value="TAMBAH"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </main>
    </body>
</html>