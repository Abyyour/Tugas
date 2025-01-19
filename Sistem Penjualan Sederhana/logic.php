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
    
    // Validasi input
    if (!empty($name) && is_numeric($price) && is_numeric($quantity) && $price > 0 && $quantity > 0) {
        $total = $price * $quantity;  // Menghitung total harga produk
        
        // Menyimpan data produk ke dalam array di sesi
        $_SESSION['products'][] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'total' => $total
        ];
    }
}

// Menghitung total belanja
$totalAmount = array_sum(array_column($_SESSION['products'], 'total'));
?>
