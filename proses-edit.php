<?php
    include("config.php");

    if (isset($_POST['simpan'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $sekolah = $_POST['sekolah_asal'];
        $agama = $_POST['agama'];
        $jk = $_POST['jenis_kelamin'];

        if ($_FILES['edit_photo']['name']) {
            $filename = $_FILES['edit_photo']['name'];
            $temp_name = $_FILES['edit_photo']['tmp_name'];
            $newfilename = "images/" . $filename; 
            move_uploaded_file($temp_name, $newfilename);
    
            $sql = "UPDATE list_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah', foto='$newfilename' WHERE id=$id";
        } else {
            $sql = "UPDATE list_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
        }
    
        $query = mysqli_query($db, $sql);
    
        if ($query) {
            header('Location: list-siswa.php?status=sukses');
        } else {
            header('Location: list-siswa.php?status=gagal');
        }
    } else {
        die("Akses dilarang...");
    }
?>