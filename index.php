<?php 
require 'function.php';
$mobil = query("SELECT * FROM mobil ORDER BY id");

// tombol cari ditekan
if (isset($_POST["search"])) {
    $mobil = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        th {
            background-color: darkslateblue;
            color: azure;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-light fw-bold" style="margin-left: 10%">Car List</span>
            <ul class="nav justify-content-center" style="margin-right: 10%">
                <li class="nav-item">
                  <a class="nav-link link-light link-opacity-100 active" aria-current="page" href="tambah.php">Add Car Data</a>
                </li>
              </ul>
        </div>
    </nav>
    <br>

    <div class="input-group mb-3 justify-content-center">
        <form action="" method="post" class="d-flex">
            <input type="text" name="keyword" size="30" autofocus autocomplete="off"
            class="form-control border border-black" placeholder="Masukkan keyword..." aria-describedby="button-addon2">
            <button class="btn btn-primary" type="submit" id="button-addon2" name="search">Cari!</button>
        </form>
    </div>

    <div class="container">
        <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered">
            <tr class="text-center">
                <th class="bg-primary text-white">No.</th>
                <th class="bg-primary text-white">Action</th>
                <th class="bg-primary text-white">Picture</th>
                <th class="bg-primary text-white">Name</th>
                <th class="bg-primary text-white">Brand</th>
                <th class="bg-primary text-white">Engine</th>
                <th class="bg-primary text-white">Price</th>
            </tr>
            <?php $i = 1; ?> 
            <?php foreach($mobil as $row) : ?>
                <tr style="text-align: center;">
                    <td><?= $i ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"] ?>" class="btn btn-warning">Ubah</a>
                        <a href="hapus.php?id=<?= $row["id"] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Hapus</a>
                    </td>
                    <td>
                        <img src="gambar/<?= $row["pic"] ?>" alt="" width="175px">
                    </td>
                    <td><?= $row["NAME"] ?></td>
                    <td><?= $row["brand"] ?></td>
                    <td><?= $row["ENGINE"] ?></td>
                    <td><?= $row["price"] ?></td>
                </tr>
            <?php $i++; endforeach;?>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>