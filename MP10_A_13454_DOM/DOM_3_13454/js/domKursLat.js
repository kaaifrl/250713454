var targetNode;

function init() {
    targetNode = document.getElementById("hasil").firstChild;
}

function hitungKurs(id) {
    var inputEl = document.getElementById(id);
    var hasilUsd = parseFloat(inputEl.value) / 18246;

    targetNode.data = hasilUsd.toFixed(2);

    var listItem = document.createElement("li");

    var teksRiwayat = document.createTextNode(
        "Rp" + inputEl.value + " = US$" + hasilUsd.toFixed(2)
    );

    listItem.appendChild(teksRiwayat);

    document.getElementById("riwayat").appendChild(listItem);
}