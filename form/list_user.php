<?php
    if (!isset($_SESSION['nama'])) {
        header('location: ../index.php'); // Redirect to the login page if not logged in
        exit(); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>List User</title>
</head>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="../Home.html">Home</a>
    <br>
    <a href="tambah_user.php">+ Tambah User</a>
    <br>
    <table border="1">
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
            <td>
                <a href="edit_user.php?id=<?php echo $d['id_user']; ?>">Edit</a>
                <a href="hapus_user.php?id=<?php echo $d['id_user']; ?>">Hapus</a>
            </td>
        </tr>
        <?php
            }
            ?>
    </table>
</body>
</html>