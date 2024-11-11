<?php
include 'koneksi.php';

$sql = "SELECT * FROM tbl_barang";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IIM Chigarette</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
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

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .content {
            position: relative;
            z-index: 2;
            color: #ffffff;
        }

        h1, h2 {
            color: orange;
        }

        .form-label {
            color: #ddd;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
            color: #ffffff;
            display: none;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
            color: #ffffff;
        }

        table {
            color: #fff;
        }
        table tbody tr td {
            color: #ffffff !important;
        }


        .btn-edit {
            background-color: #ffc107;
            color: #fff;
            border: none;
            transition: 0.3s;
        }
        .btn-edit:hover {
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
            background-image: linear-gradient(180deg, #f5d300, #ffcc00); /* Warna kuning */
            box-shadow: 0 4px 11px 0 rgb(37 44 97 / 15%), 0 1px 3px 0 rgb(93 100 148 / 20%);
            transition: all .2s ease-out;0 8px 22px 0 rgb(37 44 97 / 15%), 0 4px 6px 0 rgb(93 100 148 / 20%);
        }           
        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border: none;
            transition: 0.3s;
        }
        .btn-delete:hover {
           
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
            background-image: linear-gradient(180deg, #ff4d4d, #ff0000); /* Warna merah */
            box-shadow: 0 4px 11px 0 rgb(37 44 97 / 15%), 0 1px 3px 0 rgb(93 100 148 / 20%);
            transition: all .2s ease-out;
        }

        
        .btn-primary {             
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
    <div class="overlay"></div>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-lg-5">
                <a class="navbar-brand" href="#!">IIM CHIGARETTE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0"></ul>
                </div>
            </div>
        </nav>

        <header class="py-5 text-center">
            <div class="container">
                <h1 class="display-5 fw-bold">Data Rokok</h1>
                <p class="fs-4">Ulangan Tengah Semester Mata Kuliah Pemrograman Berorientasi Object</p>
            </div>
        </header>

        <div class="text-center mb-4">
            <a href="tambah_data.php" class="btn btn-primary">Tambah Data Rokok</a>
        </div>

        <div class="container my-5">
            <div class="table-container">
                <h2 class="mb-4">Daftar Rokok</h2>
                <?php if ($result->num_rows > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= $row["id_barang"]; ?></td>
                                        <td><?= $row["nama_barang"]; ?></td>
                                        <td><?= $row["stok"]; ?></td>
                                        <td><?= $row["harga_beli"]; ?></td>
                                        <td><?= $row["harga_jual"]; ?></td>
                                        <td>
                                            <a href="edit_data.php?id=<?= $row["id_barang"]; ?>" class="btn btn-edit btn-sm">Edit</a>
                                            <a href="delete_data.php?id=<?= $row["id_barang"]; ?>" class="btn btn-delete btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-center">Tidak ada data ditemukan</p>
                <?php endif; ?>
                <?php $conn->close(); ?>
            </div>
        </div>
    </div>
    <script>
        function toggleForm() {
            var formContainer = document.getElementById("formContainer");
            var toggleButton = document.getElementById("toggleFormButton");

            if (formContainer.style.display === "none" || formContainer.style.display === "") {
                formContainer.style.display = "block";
                toggleButton.innerText = "Sembunyikan Form";
            } else {
                formContainer.style.display = "none";
                toggleButton.innerText = "Tambah Data Rokok";
            }
        }
    </script>
</body>
</html>
