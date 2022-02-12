<!doctype html>
<html>
    <head>
        <title>STRUK TRANSAKSI</title>
        <link href="ASSETS/RANDOM/LOGIN.png" rel="shortcut icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link href="style_login.css" rel="stylesheet">
        <link href="style_home.css" rel="stylesheet">
        <link href="style_table.css" rel="stylesheet">
        <style>
        table {
            top: 100px;
            left: 325px;
            width: 50%;
        }
        td{
            text-align: center;
        }
        .back{
            padding: 10px;
            padding-left: 265px;
            padding-right: 265px;
            background: var(--main-color);
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            color: #ffffff;
        }
        .back:hover {
            background: var(--color-random);
        }
    </style>
    </head>
    <body>
            <?php
            include "koneksi.php";
                $qry_detail_transaksi=mysqli_query($conn,"SELECT detail_transaksi.*, produk.*, pembayaran.*, transaksi.*, pelanggan.*, petugas.* FROM detail_transaksi, produk, pembayaran, transaksi, pelanggan, petugas WHERE detail_transaksi.id_produk=produk.id_produk AND detail_transaksi.id_transaksi=transaksi.id_transaksi AND transaksi.id_transaksi=pembayaran.id_transaksi AND transaksi.id_petugas=petugas.id_petugas AND transaksi.id_pelanggan=pelanggan.id_pelanggan AND transaksi.id_transaksi = '".$_GET['id_transaksi']."'");
                $dt_transaksi=mysqli_fetch_array($qry_detail_transaksi);
            ?>
            <table align="center">
                <th colspan="6">STRUK TRANSAKSI</th>
                <tr><td colspan="2">Kode transaksi</td><td colspan="4"><?=$dt_transaksi['id_transaksi']?></td></tr>
                <tr><td colspan="6"></td></tr>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td colspan="2" ><?=$dt_transaksi['nama_pelanggan']?> (<?=$dt_transaksi['id_pelanggan']?>)</td>
                    <td>Nama Petugas</td>
                    <td colspan="2"><?=$dt_transaksi['nama_petugas']?> (<?=$dt_transaksi['id_petugas']?>)</td>
                </tr>
                <tr>
                    <td>Tanggal Transaksi</td>
                    <td colspan="2"><?=$dt_transaksi['tgl_transaksi']?></td>
                    <td>Tanggal Pembayaran</td>
                    <td colspan="2"><?=$dt_transaksi['tgl_pembayaran']?></td>
                </tr>
                <tr><td colspan="6"></td></tr>
                <th colspan="3">Nama Produk</th><th colspan="2">Harga Produk</th><th colspan="1">Jumlah Produk</th>
                <tr>
                    <td colspan="3"><?=$dt_transaksi['nama_produk']?> (<?=$dt_transaksi['id_produk']?>)</td>
                    <td colspan="2">Rp. <?=$dt_transaksi['harga']?></td>
                    <td colspan="1"><?=$dt_transaksi['qty']?></td>
                </tr>
                <tr><td colspan="6"></td></tr>
                <th colspan="4">TOTAL BAYAR</th><th colspan="2">Rp. <?=$dt_transaksi['subtotal']?></th>
                <tr><td colspan="6"></td></tr>
                <tr>
                    <td colspan="6"><button onclick="history.back(-1)" class="back" >BACK</button></td>
                </tr>
            </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>