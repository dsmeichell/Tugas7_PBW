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
    <?php require_once 'process.php'; ?>
   
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
                <a class="nav-link" href="list-krs.php">Data KRS</a>
              </li> 
            </ul>
          </div>
        </div>
    </nav>
    <?php
        if (isset($_GET['message'])) {
            $message = $_GET['message'];
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo  $message;
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
    ?>
    <section id="form-mahasiswa">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-primary mt-20">Form mahasiswa</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <form action="process.php" method="POST">
                        <input type="hidden" name="id" <?php echo $id;?>>
                        <div class="mb-3">
                            <label for="npm" class="form-label">NPM</label>
                            <input type="text" name="npm" class="form-control" id="npm" value="<?php echo $npm; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $nama; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="jurusan">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?php echo $jurusan; ?>">
                        </div>          
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" id="" cols="10" rows="3" value="<?php echo $alamat; ?>"></textarea>
                        </div>
                        <div class="mb-3">
                            <?php if($update==true): ?>
                                <button type="submit" class="btn btn-success" name="update">UPDATE</button>
                            <?php else:?>
                                <button type="submit" class="btn btn-success" name="simpan">SIMPAN</button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        
        <?php
        $mysqli = new mysqli('localhost','root','','kuliah1') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM mahasiswa") or die($mysqli->error);
        ?>
        <div class="row d-flex justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NPM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
        <?php while ($row= $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['npm']?></td>
                <td><?php echo $row['nama']?></td>
                <td><?php echo $row['jurusan']?></td>
                <td><?php echo $row['alamat']?></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['npm']; ?>" class="btn btn-primary" >Edit</a>
                    <a href="process.php?delete=<?php echo $row['npm'];?>" class="btn btn-danger" >Delete</a>
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
