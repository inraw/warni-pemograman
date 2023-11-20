<?php
    if (!isset($_SESSION['nama'])) {
        header('location: ../index.php'); // Redirect to the login page if not logged in
        exit(); }
        include '../config/koneksi.php';
        $level = $_SESSION['level'];
    $edit_hapus_visible = true;

    if ($level == 4) {
        // Jika pengguna memiliki level 4, opsi Edit dan Hapus tidak ditampilkan
        $edit_hapus_visible = false;
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>List Transaksi</title>
    <link rel="stylesheet" href="../Config/table.css">
</head>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="?page=ltransaksi">+ Tambah Transaksi</a>
    <br>
    <table border="1" class="styled-table">
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
            <?php if ($edit_hapus_visible): ?>
            <td>
                <a href="edit_transaksi.php?id=<?php echo $d['id_transaksi']; ?>">Edit</a>
                <a href="hapus_transaksi.php?id=<?php echo $d['id_transaksi']; ?>">Hapus</a>
            </td>
            <?php endif; ?>
        </tr>
        <?php
            }
            ?>
    </table>
</body>
</html>