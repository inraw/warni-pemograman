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
    <a href="?page=lpenjualan">+ Tambah Penjualan</a>
    <br>
    <table border="1" class="styled-table">
        <tr>
            <th>Id</th>
            <th>Tanggal Penjualan</th>
            <th>Nama Pelanggan</th>
            <th>Total Harga</th>
        </tr>
        <?php
            include '../config/koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"Select * From penjualan");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['Tanggal_Penjualan'];?></td>
            <td><?php echo $d['Nama_Pelanggan'];?></td>
            <td><?php echo $d['Total_Harga'];?></td>
            <?php if ($edit_hapus_visible): ?>
            <td>
                <a href="edit_penjualan.php?id=<?php echo $d['ID_Penjualan']; ?>">Edit</a>
                <a href="hapus_penjualan.php?id=<?php echo $d['ID_Penjualan']; ?>">Hapus</a>
            </td>
            <?php endif; ?>
        </tr>
        <?php
            }
            ?>
    </table>
</body>
</html>