<?php
$pesan = '';

if (isset($_POST['kode'])) {
    include('./koneksi.php');

    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO produk VALUES(:kode, :nama, :harga)";
    $stmt = $conn->prepare($sql);
    $simpan = $stmt->execute([
        'kode' => $kode,
        'nama' => $nama,
        'harga' => $harga
    ]);

    if ($simpan) {
        $pesan = "Produk berhasil disimpan.";
    } else {
        $pesan = "Produk gagal disimpan.";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href=".">Penjualan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href=".">Home</a>
                    <a class="nav-link active" href="produk.php">Produk</a>
                    <a class="nav-link" href="list.php">Penjualan</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <h2>Input Produk</h2>
        <hr>
        <?php 
            if(!empty($pesan)):
        ?>
            <div class="alert alert-primary" role="alert"><?= $pesan ?></div>
        <?php
            endif;
        ?>
        <form action="#" method="post">
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Produk</label>
                <input type="text" name="kode" id="kode" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Satuan</label>
                <input type="number" name="harga" id="harga" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="produk.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>