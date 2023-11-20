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
    <title>List Barang</title>
    <link rel="stylesheet" href="../Config/table.css">
</head>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="?page=lbarang">+ Tambah Barang</a>
    <br>
    <table border="1" class="styled-table">
        <tr>
            <th>Id</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Qty</th>
            <th>Id Kategori</th>
        </tr>
        <?php
            include '../Config/koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"Select * from barang");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama_barang'];?></td>
            <td><?php echo $d['kode_barang'];?></td>
            <td><?php echo $d['qty'];?></td>
            <td><?php echo $d['kategori_id'];?></td>
            <?php if ($edit_hapus_visible): ?>
            <td>
            <a href="edit_barang.php?id=<?php echo $d['id_barang']; ?>">Edit</a>
            <a href="hapus_barang.php?id=<?php echo $d['id_barang']; ?>">Hapus</a>                
            </td>
            <?php endif; ?>
        </tr>
        <?php
            }
            ?>
    </table>
</body>
</html>