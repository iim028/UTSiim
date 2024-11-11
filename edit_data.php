<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM tbl_barang WHERE id_barang = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p>Data tidak ditemukan</p>";
        exit();
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];

    $stmt = $conn->prepare("UPDATE tbl_barang SET nama_barang = ?, stok = ?, harga_beli = ?, harga_jual = ? WHERE id_barang = ?");
    $stmt->bind_param("siisi", $nama_barang, $stok, $harga_beli, $harga_jual, $id_barang);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Barang</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Barang</title>
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
            color: #ffffff;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7); 
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin-top: 80px;
        }
        h2 {
            color: #ffa500;
        }
        label {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2>Edit Data Rokok</h2>
        <form action="edit_data.php" method="post">
            <input type="hidden" name="id_barang" value="<?php echo htmlspecialchars($row['id_barang']); ?>">
            
            <div class="mb-3 text-start">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" class="form-control" value="<?php echo htmlspecialchars($row['nama_barang']); ?>" required>
            </div>
            
            <div class="mb-3 text-start">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" id="stok" name="stok" class="form-control" value="<?php echo htmlspecialchars($row['stok']); ?>" required>
            </div>
            
            <div class="mb-3 text-start">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" id="harga_beli" name="harga_beli" class="form-control" value="<?php echo htmlspecialchars($row['harga_beli']); ?>" required>
            </div>
            
            <div class="mb-3 text-start">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="number" id="harga_jual" name="harga_jual" class="form-control" value="<?php echo htmlspecialchars($row['harga_jual']); ?>" required>
            </div>
            
            <button type="submit" class="btn btn-warning w-100 mt-3">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary w-100 mt-2">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
