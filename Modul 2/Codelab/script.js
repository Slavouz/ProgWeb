function sum() {
    const fnum = parseInt(document.getElementById("fnum").value);
    const snum = parseInt(document.getElementById("snum").value);
    const sumRes = fnum + snum;
    alert(`Hasil Penjumlahan = ${sumRes}`);
}

function wipeOut() {
    document.getElementById("fnum").value = null;
    document.getElementById("snum").value = null;
}