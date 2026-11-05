<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $makanan = $_POST['makanan'] ?? '';
    $aksesoris = $_POST['aksesoris'] ?? '';

    $errors = [];

    // Validasi input kosong
    if (empty($makanan) || empty($aksesoris)) {
        $errors[] = "Harap pilih semua produk yang ingin dibeli.";
    }

    // Menentukan harga makanan dan minuman
    $hargaMakanan = 0;

    if ($makanan == 'daging kaleng') {
        $hargaMakanan = 10000;
    } elseif ($makanan == 'susu') {
        $hargaMakanan = 15000;
    } else {
        if (!empty($makanan)) {
            $errors[] = "Pilihan makanan dan minuman tidak valid.";
        }
    }

    // Menentukan harga aksesoris
    $hargaAksesoris = 0;

    if ($aksesoris == 'kalung') {
        $hargaAksesoris = 50000;
    } elseif ($aksesoris == 'pakaian') {
        $hargaAksesoris = 100000;
    } else {
        if (!empty($aksesoris)) {
            $errors[] = "Pilihan aksesoris tidak valid.";
        }
    }

    // Menghitung total pembayaran
    $totalBayar = $hargaMakanan + $hargaAksesoris;

    // Fungsi menentukan diskon
    function dapatDiskon($totalBayar) {
        if ($totalBayar >= 100000) {
            return 0.10;
        } else {
            return 0;
        }
    }

    // Fungsi menghitung total harga setelah diskon
    function totalHarga($diskon, $totalBayar) {
        return $totalBayar - ($totalBayar * $diskon);
    }

    $diskon = dapatDiskon($totalBayar);

    $total = totalHarga($diskon, $totalBayar);

} else {
    echo "<p>Silahkan pilih produk yang ingin dibeli.</p>";
}
?>

<h2>Belanja</h2>

<h3>Daftar Kategori:</h3>

<form method="POST" action="">

    <p>
        Makanan dan Minuman :
        <br>
        <select name="makanan">
            <option value="">-- Pilih Produk --</option>
            <option value="daging kaleng">Daging Kaleng</option>
            <option value="susu">Susu</option>
        </select>
    </p>

    <p>
        Aksesoris :
        <br>
        <select name="aksesoris">
            <option value="">-- Pilih Produk --</option>
            <option value="kalung">Kalung</option>
            <option value="pakaian">Pakaian</option>
        </select>
    </p>

    <button type="submit">Beli</button>

</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Menampilkan pesan error
    if (!empty($errors)) {

        foreach ($errors as $error) {
            echo "<p style='color:red;'>!! "
                . htmlspecialchars($error) . " !!</p>";
        }

    } else {

        // Menampilkan informasi belanja
        echo "<h2>Informasi Belanja</h2>";

        echo "<p>Makanan dan Minuman : "
            . htmlspecialchars($makanan) . "</p>";

        echo "<p>Aksesoris : "
            . htmlspecialchars($aksesoris) . "</p>";

        echo "<p>Total Harga : Rp"
            . number_format($total, 0, ',', '.') . "</p>";

        echo "<p>Diskon : "
            . htmlspecialchars($diskon * 100) . "%</p>";

        if ($diskon == 0) {
            echo "<p>Maaf tidak ada diskon yang diberikan.</p>";
        } else {
            echo "<p>Selamat! Anda mendapatkan diskon "
                . htmlspecialchars($diskon * 100) . "%.</p>";
        }
    }
}
?>