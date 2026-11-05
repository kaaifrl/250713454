<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = $_POST['nama'] ?? '';
    $npm = $_POST['npm'] ?? '';
    $paket = $_POST['paket'] ?? '';

    $errors = [];
    $benefit = '';

    // Validasi input kosong
    if (empty($nama) || empty($npm) || empty($paket)) {
        $errors[] = "Harap lengkapi semua data.";
    } else {

        // Validasi nama hanya huruf dan spasi
        if (!preg_match("/^[a-zA-Z ]+$/", $nama)) {
            $errors[] = "Nama hanya boleh mengandung huruf dan spasi.";
        }

        // Validasi NPM hanya angka
        if (!preg_match("/^[0-9]+$/", $npm)) {
            $errors[] = "NPM hanya boleh mengandung angka.";
        }

        // Validasi paket membership
        if ($paket !== '1' && $paket !== '3') {
            $errors[] = "Pilihan paket membership tidak valid.";
        }
    }

    // Menentukan benefit
    if (empty($errors)) {

        if ($paket == '1') {
            $benefit = "Potongan 50% untuk pembelian produk tertentu.";
        } elseif ($paket == '3') {
            $benefit = "Gratis cemilan hewan peliharaan untuk 3 bulan pertama.";
        }
    }

} else {
    echo "<p>Silahkan lengkapi formulir di atas.</p>";
}
?>

<h2>Pendaftaram Membership</h2>

<form method="POST" action="">

    <p>
        Nama :
        <br>
        <input type="text" name="nama">
    </p>

    <p>
        NPM :
        <br>
        <input type="text" name="npm">
    </p>

    <p>
        Paket Membership :
        <br>
        <select name="paket">
            <option value="">-- Pilih Paket --</option>
            <option value="1">1 Bulan</option>
            <option value="3">3 Bulan</option>
        </select>
    </p>

    <button type="submit">Daftar</button>

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

        // Menampilkan informasi pendaftaran
        echo "<h2>Informasi Pendaftaran</h2>";

        echo "<p>Nama : "
            . htmlspecialchars($nama) . "</p>";

        echo "<p>NPM : "
            . htmlspecialchars($npm) . "</p>";

        echo "<p>Keuntungan : "
            . htmlspecialchars($benefit) . "</p>";

        echo "<p>Paket Membership : "
            . htmlspecialchars($paket) . " Bulan</p>";

        echo "<p>Selamat! Anda telah berhasil mendaftar sebagai member dengan benefit: "
            . htmlspecialchars($benefit) . "</p>";
    }
}
?>