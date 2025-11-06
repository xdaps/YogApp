<?php
include 'config.php';

// --- TAMBAH DATA ---
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $area = $_POST['area'];
    $rating = $_POST['rating'];
    $ulasan = $_POST['ulasan'];
    $cp = $_POST['cp'];

    $stmt = $conn->prepare("INSERT INTO restoran (nama, kategori, area, rating, ulasan, cp) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nama, $kategori, $area, $rating, $ulasan, $cp);
    $stmt->execute();

    header("Location: admin.php?msg=added");
    exit();
}

// --- HAPUS DATA ---
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM restoran WHERE id=$id");
    header("Location: admin.php?msg=deleted");
    exit();
}

// --- AMBIL DATA ---
$result_restoran = $conn->query("SELECT * FROM restoran ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel - YogApp</title>
<style>
body { font-family: 'Segoe UI', sans-serif; margin: 0; background-color: #f4f6f9; }
header { background-color: #006e4f; color: white; text-align: center; padding: 15px; font-size: 20px; font-weight: bold; }
.container { max-width: 1100px; margin: 30px auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 3px 8px rgba(0,0,0,0.1); }
h2 { color: #333; margin-bottom: 15px; }
form { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 20px; }
input, select, button { padding: 8px; border-radius: 6px; border: 1px solid #ccc; font-size: 14px; }
input[type="text"] { flex: 1; }
button { background-color: #006e4f; color: white; border: none; cursor: pointer; transition: 0.3s; padding: 8px 15px; }
button:hover { background-color: #004d38; }
table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 14px; }
th, td { border: 1px solid #ccc; padding: 8px 6px; text-align: center; }
th { background-color: #006e4f; color: white; }
.action-buttons { display: flex; justify-content: center; gap: 6px; }
.btn { padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none; font-size: 13px; }
.btn-primary { background-color: #007bff; }
.btn-danger { background-color: #dc3545; }
.alert { text-align: center; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
.success { background: #d4edda; color: #155724; }
.deleted { background: #f8d7da; color: #721c24; }
</style>
</head>
<body>

<header>Admin Panel - YogApp</header>

<div class="container">

<?php if (isset($_GET['msg']) && $_GET['msg'] == 'added'): ?>
  <div class="alert success">✅ Data berhasil ditambahkan!</div>
<?php elseif (isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
  <div class="alert deleted">🗑️ Data berhasil dihapus!</div>
<?php endif; ?>

<h2>Tambah Data Baru</h2>
<form method="POST" action="admin.php">
  <input type="text" name="nama" placeholder="Nama Tempat" required>
  <input type="text" name="kategori" placeholder="Kategori" required>
  <input type="text" name="area" placeholder="Area/Lokasi" required>
  <input type="text" name="rating" placeholder="Rating" required>
  <input type="text" name="ulasan" placeholder="Jumlah Ulasan" required>
  <input type="text" name="cp" placeholder="Kontak (CP)" required>
  <button type="submit" name="submit">Tambah</button>
</form>

<h2>Daftar Data Restoran 🍽️</h2>
<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Kategori</th>
      <th>Area</th>
      <th>Rating</th>
      <th>Ulasan</th>
      <th>Kontak</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if ($result_restoran->num_rows > 0) {
      $no = 1;
      while ($row = $result_restoran->fetch_assoc()) {
          echo "<tr>
                  <td>{$no}</td>
                  <td>{$row['nama']}</td>
                  <td>{$row['kategori']}</td>
                  <td>{$row['area']}</td>
                  <td>{$row['rating']}</td>
                  <td>{$row['ulasan']}</td>
                  <td>{$row['cp']}</td>
                  <td class='action-buttons'>
                    <a href='edit_data.php?id={$row['id']}' class='btn btn-primary'>Edit</a>
                    <a href='admin.php?delete={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                  </td>
                </tr>";
          $no++;
      }
  } else {
      echo "<tr><td colspan='8'>Belum ada data.</td></tr>";
  }
  ?>
  </tbody>
</table>

</div>

</body>
</html>
