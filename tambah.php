<?php
require 'function.php';
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) { 

    

    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data added successfully!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data failed to add :(');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        li {
            margin-bottom: 10px;
        }
        h1, a {
            margin-left: 25px;
        }
    </style>
</head>
<body>
    
    <div class="container d-flex flex-column align-items-center min-vh-100">
        <div class="card mt-4" style="width: 25rem; height: fit-content;">
          <div class="card-body">
            <h1 class="card-title text-center fw-bold">Add Car Data</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="NAME" id="name" placeholder="Enter car name" required>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" class="form-control" name="brand" id="brand" placeholder="Enter car brand" required>
                </div>
                <div class="mb-3">
                    <label for="eng" class="form-label">Engine</label>
                    <input type="text" class="form-control" name="ENGINE" id="eng" placeholder="Enter car engine" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Enter car price" required>
                </div>
                <div class="mb-3">
                    <label for="pic" class="form-label">Picture</label>
                    <input class="form-control" type="file" name="pic" id="pic">
                </div>
                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-primary" name="submit">Add Data</button>
                </div>
            </form>
          </div>
        </div>
        <a href="index.php" class="btn btn-dark mt-3">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>