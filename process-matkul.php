<?php

$mysqli = new mysqli('localhost','root','','kuliah1') or die(mysqli_error($mysqli));

    $kode_mk = '';
    $nama_matkul = '';
    $jumlah_sks = 0;
    $id=0;
    $update=false;

if (isset($_POST['simpan'])) {
    
    $kode_mk = $_POST['kode_mk'];
    $nama_matkul = $_POST['nama_matkul'];
    $jumlah_sks = $_POST['jumlah_sks'];
  
    
    $mysqli->query("INSERT INTO matakuliah (kode_mk, nama_matkul, jumlah_sks) VALUES('$kode_mk','$nama_matkul','$jumlah_sks')") or die(mysqli->error);
    if ($mysqli) {
        $message = "Data Berhasil Disimpan";
        $message = urlencode($message);
        header("Location: matkul.php?message={$message}");
    } else {
        $message = "Data Berhasil Disimpan";
        $message = urlencode($message);
        header("Location :matkul.php?message={$message}");
    }
}

if (isset($_GET['delete'])){
    $kode_mk =$_GET['delete'];
    $mysqli->query("DELETE FROM matakuliah WHERE $kode_mk='$kode_mk'") or die ($mysqli->error());
    if ($mysqli) {
        $message = "Data Berhasil Dihapus";
        $message = urlencode($message);
        header("Location: matkul.php?message={$message}");
    } else {
        $message = "Data Berhasil Dihapus";
        $message = urlencode($message);
        header("Location :matkul.php?message={$message}");
    }
}

if (isset($_GET['edit'])){
    $kode_mk = $_GET['edit'];
    $update =true;
    $result = $mysqli->query("SELECT * FROM matakuliah WHERE kode_mk='$kode_mk'") or die ($mysqli->error());
    
    $row = $result->fetch_array();
    $kode_mk = $row['kode_mk'];
    $nama_matkul = $row['nama_matkul'];
    $jumlah_sks = $row['jumlah_sks'];;
    
}
if (isset($_POST['update'])) {

    
    $id = $_POST['id'];
    $kode_mk = $_POST['kode_mk'];
    $nama_matkul = $_POST['nama_matkul'];
    $jumlah_sks = $_POST['jumlah_sks'];
    

    
    $mysqli->query("UPDATE matakuliah SET kode_mk='$kode_mk',nama_matkul='$nama_matkul',jumlah_sks='$jumlah_sks' WHERE kode_mk='$kode_mk'");
    
    if ($mysqli) {
        $message = "Data Berhasil  diedit";
        $message = urlencode($message);
        header("Location: matkul.php?message={$message}");
    } else {
        $message = "Data gagal diedit";
        $message = urlencode($message);
        header("Location: matkul.php?message={$message}");
    }
}
