<?php
// Tentukan tipe konten sebagai JSON
header('Content-Type: application/json');

// Izinkan akses dari origin manapun (penting untuk development lokal)
header('Access-Control-Allow-Origin: *');

// 1. Konfigurasi Database (Ganti jika setting Anda berbeda!)
$host = 'localhost';
$user = 'root';     // User default XAMPP
$pass = '';         // Password default XAMPP (kosong)
$db   = 'yogapp';   // Nama database yang Anda buat

// 2. Koneksi ke Database
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    // Jika koneksi gagal, kembalikan status error 500
    http_response_code(500);
    echo json_encode(['error' => 'Koneksi database gagal: ' . $conn->connect_error]);
    exit();
}

// 3. Ambil Keyword Pencarian
$keyword = isset($_GET['q']) ? $_GET['q'] : '';

if (empty($keyword)) {
    echo json_encode([]);
    exit();
}

// Amankan keyword untuk mencegah SQL Injection (Prepared Statement)
$safe_keyword = "%" . $conn->real_escape_string($keyword) . "%";

// 4. Query SQL untuk Pencarian - Mengambil semua kolom
$sql = "SELECT nama, deskripsi, kategori, alamat, rating, menu FROM restoran WHERE nama LIKE ? OR deskripsi LIKE ? OR menu LIKE ?";

// 5. Persiapan dan Eksekusi Statement
$stmt = $conn->prepare($sql);
// "sss" berarti tiga parameter string
$stmt->bind_param("sss", $safe_keyword, $safe_keyword, $safe_keyword); 
$stmt->execute();
$result = $stmt->get_result();

$restoran = [];

// 6. Ambil Hasil dan Masukkan ke Array
while ($row = $result->fetch_assoc()) {
    $restoran[] = $row;
}

// 7. Tutup Koneksi dan Kirim Hasil
$stmt->close();
$conn->close();

// Kembalikan data dalam format JSON
echo json_encode($restoran);

?>