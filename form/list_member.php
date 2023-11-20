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
    <title>List Member</title>
    <link rel="stylesheet" href="../Config/table.css">
</head>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="?page=lmember">+ Tambah Member</a>
    <br>
    <table border="1" class="styled-table">
        <tr>
            <th>Id</th>
            <th>Nama Member</th>
            <th>Level</th>
        </tr>
        <?php
                include '../Config/koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select * from member");
                while($d = mysqli_fetch_array($data)){
            ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama_member']; ?></td>
            <td><?php echo $d['level']; ?></td>
            <?php if ($edit_hapus_visible): ?>
            <td>
                <a href="edit_penjualan.php?id=<?php echo $d['id_member']; ?>">Edit</a>
                <a href="hapus_penjualan.php?id=<?php echo $d['id_member']; ?>">Hapus</a>
            </td>
            <?php endif; ?>
        </tr>
        <?php
                }
                ?>
    </table>
</body>
</html>