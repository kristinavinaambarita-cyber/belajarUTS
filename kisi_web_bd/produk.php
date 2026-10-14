<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Penjualan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
          crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href=".">Penjualan</a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
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
        <h2>Daftar Produk</h2>
        <hr>

        <a href="input.php" class="btn btn-primary mb-3">
            Input Produk Baru
        </a>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include('./koneksi.php');

                    $sql = "SELECT * FROM produk";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    $dataProduk = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $nomor = 1;

                    if (count($dataProduk) > 0):
                        foreach ($dataProduk as $produk):
                    ?>

                    <tr>
                        <td><?= $nomor++ ?></td>
                        <td><?= htmlspecialchars($produk['kode']) ?></td>
                        <td><?= htmlspecialchars($produk['nama']) ?></td>
                        <td>
                            <?= 'Rp ' . number_format($produk['harga'], 2, ',', '.') ?>
                        </td>
                    </tr>

                    <?php
                        endforeach;
                    else:
                    ?>

                    <tr>
                        <td colspan="4" class="text-center">
                            Belum Ada Data.
                        </td>
                    </tr>

                    <?php
                    endif;
                    ?>
                </tbody>

                <tfoot>
                    <tr>
                        <th colspan="3">Jumlah Data</th>
                        <th><?= count($dataProduk) ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9hJ09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"></script>
</body>
</html>
```