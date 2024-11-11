<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];

    $sql = "INSERT INTO tbl_barang (id_barang, nama_barang, stok, harga_beli, harga_jual) VALUES ('$id_barang', '$nama_barang', '$stok', '$harga_beli', '$harga_jual')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Rokok</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Rokok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('logo/poi.png'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin-top: 50px;
        }
        .form-label, h2 {
            color: #ffb400;
        }
        .btn-primary{             
            display: inline-block;
            outline: 0;
            border: 0;
            cursor: pointer;
            font-weight: 600;
            color: #fff;
            font-size: 14px;
            height: 38px;
            padding: 8px 24px;
            border-radius: 50px;
            background-image: linear-gradient(180deg,#7c8aff,#3c4fe0);
            box-shadow: 0 4px 11px 0 rgb(37 44 97 / 15%), 0 1px 3px 0 rgb(93 100 148 / 20%);
            transition: all .2s ease-out;               
            box-shadow: 0 8px 22px 0 rgb(37 44 97 / 15%), 0 4px 6px 0 rgb(93 100 148 / 20%);
        }   
    </style>
</head>
<body>
    <div class="container my-5">
    <h2 style="text-align: center;">Tambah Data Rokok</h2>
        <form action="tambah_data.php" method="post">
            <div class="mb-3">
                <label for="id_barang" class="form-label">ID Barang</label>
                <input type="text" id="id_barang" name="id_barang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" id="stok" name="stok" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" id="harga_beli" name="harga_beli" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="number" id="harga_jual" name="harga_jual" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data Rokok</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

</body>
</html>
