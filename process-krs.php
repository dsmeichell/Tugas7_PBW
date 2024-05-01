<?php
$mysqli = new mysqli('localhost','root','','kuliah1') or die(mysqli_error($mysqli));

if (isset($_POST['simpan'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $matkul = $_POST['matkul'];
    $sks = $_POST['sks'];
    
    $query = mysqli_query($mysqli, "INSERT into mahasiswa (npm,nama,jurusan) VALUES ('$npm','$nama','$jurusan')");
    if ($query) {
        $query1 = mysqli_query($mysqli, "INSERT into krs (id,mahasiswa_npm,matakuliah_kodemk) VALUES ('','$npm','$matkul')");
        $message = "Data Berhasil Disimpan";
        $message = urlencode($message);
        header("Location: krs.php?message={$message}");
    } else {
        $message = "Data Tidak Disimpan";
        $message = urlencode($message);
        header("Location: krs.php?message={$message}");
    }
}
?>
