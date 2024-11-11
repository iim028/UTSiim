<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_barang WHERE id_barang = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];

    $sql = "UPDATE tbl_barang SET nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual' WHERE id_barang = '$id_barang'";

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
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Data Rokok</h2>
    <form action="edit_data.php" method="post">
        <input type="hidden" name="id_barang" value="<?php echo $row['id_barang']; ?>">
        
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?php echo $row['stok']; ?>" required><br><br>

        <label>Harga Beli:</label><br>
        <input type="number" name="harga_beli" value="<?php echo $row['harga_beli']; ?>" required><br><br>

        <label>Harga Jual:</label><br>
        <input type="number" name="harga_jual" value="<?php echo $row['harga_jual']; ?>" required><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
