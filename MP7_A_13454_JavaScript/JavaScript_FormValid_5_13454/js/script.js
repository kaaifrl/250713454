function fn_ValForm() {
    var sMsg = "";
    var sNama = document.getElementById("nama").value;
    var sEmail = document.getElementById("email").value;
    var sUmur = document.getElementById("umur").value;
    var sKategori = document.getElementById("kategori").value;
    var info = "";
    var pilihan = "";
    var polaEmail = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;
    if (sNama == "") {
        sMsg += "\n* Nama belum diisi";
    }
    if (sEmail == "") {
        sMsg += "\n* Email belum diisi";
    } else if (!polaEmail.test(sEmail)) {
        sMsg += "\n* Format email tidak valid";
    }
    if (sUmur == "") {
        sMsg += "\n* Umur belum diisi";
    } else if (isNaN(sUmur) || Number(sUmur) < 10 || Number(sUmur) > 18) {
        sMsg += "\n* Umur harus berupa angka antara 10 sampai 18 tahun";
    }
    if (sKategori == "") {
        sMsg += "\n* Pilihan lomba belum dipilih";
    }
    if (sMsg != "") {
        alert("Peringatan:" + sMsg);
        return false;
    }
    if (Number(sUmur) <= 14) {
        info = "Kategori Junior";
    } else {
        info = "Kategori Senior";
    }
    switch (sKategori) {
        case "C":
            pilihan = "Cerdas Cermat";
            break;
        case "P":
            pilihan = "Puisi";
            break;
        case "D":
            pilihan = "Design poster";
            break;
    }
    alert("Terima kasih " + sNama + " ! Anda terdaftar di lomba " + pilihan + " (" + info + ").");
    return true;
}