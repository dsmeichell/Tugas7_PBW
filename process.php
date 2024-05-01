<?php

$mysqli = new mysqli('localhost','root','','kuliah1') or die(mysqli_error($mysqli));

    $npm = '';
    $nama = '';
    $jurusan = '';
    $alamat = '';
    $id=0;
    $update=false;

if (isset($_POST['simpan'])) {

    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    
    $mysqli->query("INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES('$npm','$nama','$jurusan','$alamat')") or die(mysqli->error);
    if ($mysqli) {
        $message = "Data Berhasil Disimpan";
        $message = urlencode($message);
        header("Location: index.php?message={$message}");
    } else {
        $message = "Data Berhasil Disimpan";
        $message = urlencode($message);
        header("Location :index.php?message={$message}");
    }
}

if (isset($_GET['delete'])){
    $npm =$_GET['delete'];
    $mysqli->query("DELETE FROM mahasiswa WHERE npm='$npm'") or die ($mysqli->error());
    if ($mysqli) {
        $message = "Data Berhasil Dihapus";
        $message = urlencode($message);
        header("Location: index.php?message={$message}");
    } else {
        $message = "Data Berhasil Dihapus";
        $message = urlencode($message);
        header("Location :index.php?message={$message}");
    }
}

if (isset($_GET['edit'])){
    $npm = $_GET['edit'];
    $update =true;
    $result = $mysqli->query("SELECT * FROM mahasiswa WHERE npm='$npm'") or die ($mysqli->error());
    $row = $result->fetch_array();
    $npm = $row['npm'];
    $nama = $row['nama'];
    $jurusan = $row['jurusan'];
    $alamat = $row['alamat'];
    
}
if (isset($_POST['update'])) {

    
    $id = $_POST['id'];
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    
    $mysqli->query("UPDATE mahasiswa SET npm='$npm',nama='$nama',jurusan='$jurusan' WHERE npm='$npm'");
    
    if ($mysqli) {
        $message = "Data Berhasil  diedit";
        $message = urlencode($message);
        header("Location: index.php?message={$message}");
    } else {
        $message = "Data gagal diedit";
        $message = urlencode($message);
        header("Location: index.php?message={$message}");
    }
}
