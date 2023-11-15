<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
        <h1>Data Produk</h1>
        <div class="d-flex justify-content-end align-items-start mb-3">
            <a  type="button" class="btn btn-primary btn-sm" href="create.php">create</a>
        </div>
        
    <table class="table table-success table-striped-columns">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama produk</th>
                <th>Harga</th>
                <th style="text-align: center;">Gambar produk</th>
                <th style="text-align: center;">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require './config/db.php';

                $products = mysqli_query($db_connect,"SELECT * FROM products");
                $no = 1;

                while($row = mysqli_fetch_assoc($products)) {
            ?>
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$row['name'];?></td>
                    <td><?=$row['price'];?></td>
                    <td style="text-align: center;"><img src="<?=$row['image'];?>" width="100"></td>
                    <td style="text-align: center;">
                        <div class="d-flex justify-content-center align-items-center">
                            <a type="button" class="btn btn-outline-dark me-2" href="<?=$row['image'];?>" target="_blank">unduh</a>
                            <a type="button" class="btn btn-outline-dark me-2" href="edit.php?id=<?=$row['id'];?>">Edit</a>
                            <a type="button" class="btn btn-outline-dark me-2" href="./backend/hapus.php?id=<?=$row['id'];?>">Hapus</a>
                            <!-- <!-- Remove the "Tambah" button from here -- -->
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
