<?php
    include("config.php");

    if (isset($_POST['daftar'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $sekolah = $_POST['sekolah_asal'];

        $filename = $_FILES['file']['name'];
        $temp_name = $_FILES['file']['tmp_name'];
        $newfilename = "images/" . $filename; 

        move_uploaded_file($temp_name, $newfilename);

        $sql = "INSERT INTO list_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto) VALUES ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$newfilename')";
        $query = mysqli_query($db, $sql);

        if ($query) {
            header('Location: index.php?status=sukses');
        } else {
            header('Location: index.php?status=gagal');
        }
    } else {
        die("Akses dilarang...");
    }
?>