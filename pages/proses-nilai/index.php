<!doctype html>
<html lang="id">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/css/style.css">
        <?php if(!isset($_POST['proses'])) : ?>
            <style>
                body{
                    background-image: url(../../assets/images/krm.png);
                    background-repeat: no-repeat;
                    background-position: 800px;
                    background-size: 390px;
                }
            </style>
        <?php endif?>
        <title>Halaman Utama</title>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="../../">Program Penilaian</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../../">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./">Proses Nilai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../data-nilai/">Data Nilai</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Akhir Navbar -->

        <div class="container my-5">
            <div class="row">
                <div class="col">
                    <?php if(!isset($_POST['proses'])) : ?>
                        <div class="card w-50 rounded shadow-sm mx-auto p-3" style="background: inherit;">
                            <div class="card-body">
                                <h3 class="card-title mb-4 text-center">Proses data nilai siswa</h3>
                                <form method="POST">
                                    <div class="mb-3">
                                        <label for="jumlahSiswa" class="form-label">Jumlah Siswa</label>
                                        <input type="number" class="form-control" id="jumlahSiswa" name="jumlahSiswa" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="proses">Proses</button>
                                </form>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="card w-75 rounded shadow-sm mx-auto p-3">
                            <div class="card-body">
                                <h3 class="card-title mb-4 text-center">Isi data nilai siswa</h3>
                                <form action="../data-nilai/" method="POST">
                                    <?php for($i = 1; $i <= $_POST['jumlahSiswa']; $i++) : ?>
                                        <h5 class="text-secondary">Data nilai siswa <?= $i?></h5>
                                        <div class="mb-3">
                                            <label for="nis" class="form-label">NIS</label>
                                            <input type="number" class="form-control" id="nis" name="nis[]" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama[]" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kelas" class="form-label">Kelas</label>
                                            <select name="kelas[]" id="kelas" class="form-select">
                                                <option selected hidden></option>
                                                <option value="XI RPL 1">XI RPL 1</option>
                                                <option value="XI RPL 2">XI RPL 2</option>
                                                <option value="XI RPL 3">XI RPL 3</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nilaiBulanan" class="form-label">Nilai Bulanan</label>
                                            <input type="number" class="form-control" id="nilaiBulanan" name="nilaiBulanan[]" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nilaiPts" class="form-label">Nilai PTS</label>
                                            <input type="number" class="form-control" id="nilaiPts" name="nilaiPts[]" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nilaiPas" class="form-label">Nilai PAS</label>
                                            <input type="number" class="form-control" id="nilaiPas" name="nilaiPas[]" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nilaiKehadiran" class="form-label">Nilai Kehadiran</label>
                                            <input type="number" class="form-control" id="nilaiKehadiran" name="nilaiKehadiran[]" required>
                                        </div>
                                        <?php if($i != $_POST['jumlahSiswa']) : ?>
                                            <span class="d-block my-5 w-100 bg-dark rounded" style="height: 1.5px;"></span>
                                        <?php endif ?>
                                    <?php endfor ?>
                                    <button type="submit" class="btn btn-primary mt-3" name="prosesdata">Proses Data</button>
                                </form>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="p-3 text-center text-light bg-dark fw-medium footer">
            copyright&copy; 2022 <a href="#" class="text-secondary">Kelompok 5, XI RPL 3</a> with &lt;3
        </div>
        <!-- Akhir Footer -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="../../assets/script/javascript/index.js"></script>
    </body>
</html>