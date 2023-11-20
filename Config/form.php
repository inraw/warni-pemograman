<?php
    include "header.php";
    if($_GET['page'] == 'home') {
        include "../form/home.php";
    } elseif($_GET['page'] == 'barang') {
        include "../form/list_barang.php";
    } elseif($_GET['page'] == 'kategori') {
        include "../form/list_kategori.php";
    } elseif($_GET['page'] == 'member') {
        include "../form/list_member.php";
    } elseif($_GET['page'] == 'penjualan') {
        include "../form/list_penjualan.php";
    } elseif($_GET['page'] == 'transaksi') {
        include "../form/list_transaksi.php";
    } elseif($_GET['page'] == 'user') {
        include "../form/list_user.php";
    } elseif($_GET['page'] == 'report') {
        include "../form/view_report.php";
    } elseif($_GET['page'] == 'lbarang') {
        include "../form/tambah_barang.php";
    } elseif($_GET['page'] == 'lkategori') {
        include "../form/tambah_kategori.php";
    } elseif($_GET['page'] == 'lmember') {
        include "../form/tambah_member.php";
    } elseif($_GET['page'] == 'lpenjualan') {
        include "../form/tambah_penjualan.php";
    } elseif($_GET['page'] == 'ltransaksi') {
        include "../form/tambah_transaksi.php";
    } elseif($_GET['page'] == 'luser') {
        include "../form/tambah_user.php";
    } else {
        echo "page tidak ditemukan";
    }
?>