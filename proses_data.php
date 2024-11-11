<?php
include 'koneksi.php';

$action = $_GET['action'];

if ($action == 'create') {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];

    $query = "INSERT INTO tbl_barang (id_barang, nama_barang, stok, harga_beli, harga_jual) VALUES ('$id_barang', '$nama_barang', '$stok', '$harga_beli', '$harga_jual')";
    $conn->query($query);

    header("Location: index.php");
} elseif ($action == 'delete') {
    $id = $_GET['id'];
    $query = "DELETE FROM tbl_barang WHERE id_barang = $id";
    $conn->query($query);

    header("Location: index.php");
}
?>
