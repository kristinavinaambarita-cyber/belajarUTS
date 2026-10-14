<?php
$pesan = "";
if (isset($_POST['produk'])) {
    include('./koneksi.php');

     $produk = $_POST['produk'];
     $jumlah = $_POST['jumlah'];

     $sql = "INSERT INTO penjualan(kode_produk, jumlah) 
     VALUES(:produk, :jumlah)";
     $stmt = $conn->prepare($sql);
     $simpan = $stmt->execute([
        'produk' => $produk,
        'jumlah' => $jumlah
     ]);

    if ($simpan) {
        $pesan = "Penjualan berhasil disimpan.";
    } else {
        $pesan = "Penjualan gagal disimpan.";
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
                    <a class="nav-link" href="produk.php">Produk</a>
                    <a class="nav-link active" href="list.php">Penjualan</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <h2>Input Penjualan</h2>
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
                <label for="produk" class="form-label">Produk</label>
                <select name="produk" id="produk" class="form-select" onchange="pilihProduk(this)" autofocus required>
                    <option disabled selected>- Pilih Produk -</option>
                    <?php 
                        include('./koneksi.php');
                        
                        $sql = "SELECT * FROM produk";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $dataProduk = $stmt->fetchAll();
                        foreach($dataProduk as $produk):
                    ?>
                        <option value="<?= $produk['kode'] ?>"
                         data-harga="<?= $produk['harga']?>"><?= $produk['nama']?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
                <?php ?>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Satuan</label>
                <input type="number" name="harga" id="harga" class="form-control" required readonly>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Beli</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required onchange="hitungTotal(this.value)" onkeyup="hitungTotal(this.value)">
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">Total</label>
                <input type="number" name="total" id="total" class="form-control" required readonly>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="list.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        let cboProduk = document.getElementById('produk')
        let txtHarga = document.getElementById('harga')
        let txtTotal = document.getElementById('total')

        function pilihProduk(cbo) {
            let harga = cboProduk.options[cbo.selectedIndex].getAttribute('data-harga')
            txtHarga.value = harga
        }

        function hitungTotal(jumlah) {
            let harga = txtHarga.value
            let total = parseInt(harga) * parseInt(jumlah)
            txtTotal.value = total
        }
    </script>
</body>

</html>