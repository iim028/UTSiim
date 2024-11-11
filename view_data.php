<?php
include('koneksi.php');
$sql = "SELECT * FROM tbl_barang";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>id_barang</th><th>nama_barang</th><th>stok</th><th>harga_beli</th><th>harga_jual</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_barang"] . "</td>";
        echo "<td>" . $row["nama_barang"] . "</td>";
        echo "<td>" . $row["stok"] . "</td>";
        echo "<td>". $row["harga_beli"] ."</td>" ;
        echo "<td>". $row["harga_jual"] ."</td>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan";
}

$conn->close();
?>