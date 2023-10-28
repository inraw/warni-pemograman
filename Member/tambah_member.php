<!DOCTYPE html>
<html>
<head>
    <title>Tambah Member</title>
</head>
<?php
    //Koneksi database
    include '../config/koneksi.php';
    //Menangkap data yang dikirim dari form 
    if(!empty($_POST['save'])){ //Jika ada kiriman dari 'save' maka jalankan :
        $Nama = $_POST['nama_member'];
        $level = $_POST['level'];
        //menginput data ke database
        $a = mysqli_query($koneksi,"insert into member values('','$Nama','$level')");
        if($a){
            //mengalihkan halaman kembali
            header("location:list_member.php");
        }else{
            echo mysqli_error();
        }
    }
?>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="list_member.php">Kembali</a>
    <br><br>
    <h3>TAMBAH DATA BARANG</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nama Member</td>
                <td><Input type="text" name="nama_member"></td>
            </tr>
            <tr>
            <td>Level</td>
                <td><select name="level" id="">
                    <option value="">-----Pilih</option>
                    <option value="Platinum">Platinum</option>
                    <option value="Gold">Gold</option>
                    <option value="Silver">Silver</option>
                </select>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>
</html>