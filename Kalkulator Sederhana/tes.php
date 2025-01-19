<?php
// 1. Variabel
if (isset($_POST['submit'])) {
    $num1 = $_POST['num1'];   //  Variabel: Menyimpan nilai angka pertama
    $num2 = $_POST['num2'];   //  Variabel: Menyimpan nilai angka kedua
    $operator = $_POST['operator']; //  Variabel: Menyimpan operator yang dipilih (+, -, *, /)
    $result = 0;  //  Variabel: Menyimpan hasil perhitungan, diinisialisasi dengan nilai 0

    // 2. Operator
    switch ($operator) {
        case '+':
            $result = $num1 + $num2;  //  Operator: Penjumlahan jika operator adalah '+'
            break;
        case '-':
            $result = $num1 - $num2;  //  Operator: Pengurangan jika operator adalah '-'
            break;
        case '*':
            $result = $num1 * $num2;  //  Operator: Perkalian jika operator adalah '*'
            break;
        case '/':
            // 3. Pernyataan Kondisi (if/else)
            if ($num2 == 0) {
                $result = "Error! Division by zero."; //  Pernyataan Kondisi (if/else): Mengecek pembagian dengan nol
            } else {
                $result = $num1 / $num2;  //  Operator: Pembagian jika operator adalah '/'
            }
            break;
        default:
            $result = "Invalid operator!"; //  Pernyataan Kondisi (default case): Menangani jika operator tidak valid
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" href="tes.css">
</head>
<body>
    <div class="calculator">
        <h1>Kalkulator Sederhana</h1>
        <form method="POST" action="tes.php">
            <input type="number" name="num1" placeholder="Angka 1" required>
            <input type="number" name="num2" placeholder="Angka 2" required>
            <select name="operator">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <button type="submit" name="submit">Hitung</button>
        </form>
        <div class="result">
            <?php
            if (isset($result)) {
                echo "<h3>Hasil: $result</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
