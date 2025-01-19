<?php
// Mulai sesi untuk menyimpan data produk sementara
session_start();

// Periksa apakah ada produk yang ditambahkan
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];  // Inisialisasi array produk jika belum ada
}

// Menambahkan produk jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['product-name'];  // Variabel untuk menyimpan nama produk
    $price = $_POST['product-price'];  // Variabel untuk menyimpan harga produk
    $quantity = $_POST['product-quantity'];  // Variabel untuk menyimpan jumlah produk
    
    // Validasi input dengan pernyataan kondisi (if)
    if (!empty($name) && is_numeric($price) && is_numeric($quantity) && $price > 0 && $quantity > 0) {
        $total = $price * $quantity;  // Menghitung total harga produk (operator * digunakan)
        
        // Menyimpan data produk ke dalam array di sesi (array)
        $_SESSION['products'][] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'total' => $total
        ];
    }
}

// Menghitung total belanja dengan array_sum dan array_column (array)
$totalAmount = array_sum(array_column($_SESSION['products'], 'total'));  // Total belanja dihitung berdasarkan array produk
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penjualan Sederhana</title>
    <link rel="stylesheet" href="e.css">
</head>
<body>
    <div class="container">
        <h1>Sistem Penjualan Sederhana</h1>
        
        <div class="product">
            <form method="POST" action="">
                <label for="product-name">Nama Produk:</label>
                <input type="text" name="product-name" id="product-name" placeholder="Masukkan nama produk" required>

                <label for="product-price">Harga Produk (IDR):</label>
                <input type="number" name="product-price" id="product-price" placeholder="Masukkan harga produk" required>

                <label for="product-quantity">Jumlah Produk:</label>
                <input type="number" name="product-quantity" id="product-quantity" placeholder="Masukkan jumlah produk" required>

                <button type="submit">Tambah Produk</button>
            </form>
        </div>

        <h2>Daftar Pembelian</h2>
        <table id="product-list">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Perulangan (looping) untuk menampilkan produk dari array -->
                <?php foreach ($_SESSION['products'] as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= number_format($product['price']) ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td><?= number_format($product['total']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total">
            <p>Total Belanja: <span id="total-amount"><?= number_format($totalAmount) ?></span> IDR</p>
        </div>
    </div>
</body>
</html>
