// Mengatur waktu refresh dalam milidetik (contoh: 5 detik)
var refreshInterval = 20000;

// Fungsi untuk memuat ulang halaman
function autoRefresh() {
    setTimeout(function() {
        location.reload();
    }, refreshInterval);
}

// Memanggil fungsi autoRefresh saat halaman selesai dimuat
document.addEventListener('DOMContentLoaded', autoRefresh);
