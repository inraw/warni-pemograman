<?php
    if (!isset($_SESSION['nama'])) {
        header('location: ../index.php'); // Redirect to the login page if not logged in
        exit(); }
    include '../config/koneksi.php';
    $level = $_SESSION['level'];
    $edit_hapus_visible = false;

    if ($level == 1) {
        $edit_hapus_visible = true;
    } elseif ($level == 2) {
        $edit_hapus_visible = true;
    } elseif ($level == 3) {
        $edit_hapus_visible = true;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>List User</title>
    <link rel="stylesheet" href="../Config/table.css">
</head>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <?php if ($edit_hapus_visible): ?>
    <a href="?page=luser">+ Tambah User</a>
    <?php endif; ?>
    <br>
    <table border="1" class="styled-table">
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Password</th>
            <th>Level</th>
            <th>Status</th>
        </tr>
        <?php
            include '../config/koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"select * from user");
            while($d = mysqli_fetch_array($data)){
            ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama'];?></td>
            <td><?php echo $d['password'];?></td>
            <td><?php echo $d['level'];?></td>
            <td><?php echo $d['status'];?></td>
            <?php if ($edit_hapus_visible): ?>
            <td>
            <?php if ($level == 1 || ($level == 2 && ($d['level'] == 3 || $d['level'] == 4)) || ($level == 3 && $d['level'] == 4)): ?>
                <a href="edit_user.php?id=<?php echo $d['id_user']; ?>">Edit</a>
                <?php endif; ?>
                <?php if ($level == 1 || ($level == 2 && ($d['level'] == 3 || $d['level'] == 4)) || ($level == 3 && $d['level'] == 4)): ?>
                <a href="hapus_user.php?id=<?php echo $d['id_user']; ?>">Hapus</a>
                <?php endif; ?>
            </td>
            <?php endif; ?>
        </tr>
        <?php
            }
            ?>
    </table>
</body>
</html>