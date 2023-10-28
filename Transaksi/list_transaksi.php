<!DOCTYPE html>
<html>
<head>
    <title>List Transaksi</title>
</head>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="../Home.html">Home</a>
    <br>
    <a href="tambah_transaksi.php">+ Tambah Transaksi</a>
    <br>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Tanggal Transaksi</th>
            <th>No Transaksi</th>
            <th>Jenis Transaksi</th>
            <th>Id Penjualan</th>
            <th>Id Barang</th>
            <th>Jumlah Transaksi</th>
            <th>Id Member</th>
            <th>Total</th>
        </tr>
        <?php
            include '../config/koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"Select * From transaksi");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['tgl_transaksi'];?></td>
            <td><?php echo $d['no_transaksi'];?></td>
            <td><?php echo $d['jenis_transaksi'];?></td>
            <td><?php echo $d['penjualan_id'];?></td>
            <td><?php echo $d['barang_id'];?></td>
            <td><?php echo $d['jumlah_transaksi'];?></td>
            <td><?php echo $d['member_id'];?></td>
            <td><?php echo $d['total'];?></td>
            <td>
                <a href="edit_transaksi.php?id=<?php echo $d['id_transaksi']; ?>">Edit</a>
                <a href="hapus_transaksi.php?id=<?php echo $d['id_transaksi']; ?>">Hapus</a>
            </td>
        </tr>
        <?php
            }
            ?>
    </table>
</body>
</html>