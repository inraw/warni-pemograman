<!DOCTYPE html>
<html lang="en">
<head>
    <title>Keuangan</title>
    <style>
        ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}

.kembali{
  display: flex;
  justify-content: right;
  /* align-items: right; */
}
    </style>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['nama'])) {
    echo "Selamat datang, " . $_SESSION['nama'] . "! <br>";
    $level = $_SESSION['level'];

    if ($level == 1) {
        echo "Admin";
    } elseif ($level == 2) {
        echo "Manager";
    } elseif ($level == 3) {
        echo "Supervisor";
    } elseif ($level == 4) {
        echo "Staff";
    } else {
        // Level lainnya, sesuaikan pesan atau aksi yang diinginkan
        echo "Level tidak valid";
    }
} else {
    header('location: ../index.php');
}
?>
    <a href="logout.php" class="kembali">Logout</a>
    <ul>
        <li><a class="active" href="?page=home">Home</a></li>
        <li><a href="?page=user">User</a></li>
        <li><a href="?page=barang">Barang</a></li>
        <li><a href="?page=transaksi">Transaksi</a></li>
        <li><a href="?page=kategori">Kategori</a></li>
        <li><a href="?page=member">Member</a></li>
        <li><a href="?page=penjualan">Penjualan</a></li>
        <li><a href="?page=report">Report</a></li>
    </ul>
    
</body>
</html>