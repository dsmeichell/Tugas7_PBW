<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Pembelian tiket</title>
</head>

<body>
    <?php require_once 'process-krs.php'; ?>
   
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">
              <span class="brand">Mahasiswa</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item mx-2">
                <a class="nav-link" aria-current="page" href="index.php">Mahasiswa</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="matkul.php">Mata Kuliah</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="krs.php">KRS</a>
              </li> 
              <li class="nav-item mx-2">
                <a class="nav-link" href="matkul.php">Data KRS</a>
              </li> 
            </ul>
          </div>
        </div>
    </nav>
    
    <section id="form-mahasiswa">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-primary mt-20">DATA KRS</h2>
                </div>
            </div>
        <?php
        $mysqli = new mysqli('localhost','root','','kuliah1') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT krs.id, mahasiswa.nama, matakuliah.nama_matkul, matakuliah.jumlah_sks FROM krs JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kode_mk;") or die($mysqli->error);
        ?>
        <div class="row d-flex justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Mata Kuliah</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
        <?php while ($row= $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['nama']?></td>
                <td><?php echo $row['nama_matkul']?></td>
                <td>
                <?php echo $row['nama'],' mengambil mata kuliah ', $row['nama_matkul'],' ',$row['jumlah_sks'],' SKS' ?>
                </td>
            </tr>
        <?php endwhile?>
            </table>
        </div>
        <?php
        function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo'</pre>';
        }?>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
