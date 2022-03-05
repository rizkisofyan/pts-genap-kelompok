<?php
session_start();

require '../../src/methods.php';

if(isset($_POST['prosesdata'])) {
    $_SESSION['datanilai'] = [];
    for($i = 0; $i < count($_POST['nama']); $i++){
        $_SESSION['datanilai'][] = [ 
            "nis" => $_POST['nis'][$i],
            "nama" => $_POST['nama'][$i],
            "kelas" => $_POST['kelas'][$i],
            "nilai" => [
                "bulanan" => $_POST['nilaiBulanan'][$i],
                "pts" => $_POST['nilaiPts'][$i],
                "pas" => $_POST['nilaiPas'][$i],
                "kehadiran" => $_POST['nilaiKehadiran'][$i],
                "akhir" => nilaiAkhir(
                    $_POST['nilaiBulanan'][$i],
                    $_POST['nilaiPts'][$i],
                    $_POST['nilaiPas'][$i],
                    $_POST['nilaiKehadiran'][$i]
                ),
                "raport" => array_sum(nilaiAkhir(
                    $_POST['nilaiBulanan'][$i],
                    $_POST['nilaiPts'][$i],
                    $_POST['nilaiPas'][$i],
                    $_POST['nilaiKehadiran'][$i]
                ))
            ]
        ];
    }
}
$i = 1;
?>

<!doctype html>
<html lang="id">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Bootstrap Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../assets/css/style.css">
        <title>Data Nilai Siswa</title>
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
                            <a class="nav-link" href="../proses-nilai/">Proses Nilai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./">Data Nilai</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Akhir Navbar -->

        <div class="container-xl mt-4">
            <div class="row">
                <div class="col">
                    <h3 class="text-dark">Data Nilai Siswa</h3>
                    <?php if(!isset($_SESSION['datanilai'])) : ?>
                        <div class="alert alert-danger mt-3">
                            <span class="fw-bold">
                                Belum ada data yang di proses ! 
                            </span>
                            <span class="d-block mt-3">
                                <a href="../../pages/proses-nilai/" class="alert-link fw-normal"> ← Proses data nilai terlebih dahulu</a>
                            </span>
                        </div>
                    <?php else : ?>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2">#</th>
                                    <th scope="col" rowspan="2">NIS</th>
                                    <th scope="col" rowspan="2">Nama</th>
                                    <th scope="col" rowspan="2">Kelas</th>
                                    <th scope="col"colspan="5">Nilai</th>
                                    <th scope="col" rowspan="2">Grade</th>
                                    <th scope="col" rowspan="2">Aksi</th>
                                </tr>
                                <tr>
                                    <th scope="col">Bulanan</th>
                                    <th scope="col">PTS</th>
                                    <th scope="col">PAS</th>
                                    <th scope="col">Kehadiran</th>
                                    <th scope="col">Raport</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($_SESSION['datanilai'] as $siswa) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $siswa['nis'] ?></td>
                                        <td><?= $siswa['nama'] ?></td>
                                        <td><?= $siswa['kelas'] ?></td>
                                        <td><?= $siswa['nilai']['bulanan'] ?></td>
                                        <td><?= $siswa['nilai']['pts'] ?></td>
                                        <td><?= $siswa['nilai']['pas'] ?></td>
                                        <td><?= $siswa['nilai']['kehadiran'] ?></td>
                                        <td><?= $siswa['nilai']['raport'] ?></td>
                                        <?php if($siswa['nilai']['raport'] > 100 || $siswa['nilai']['raport'] < 0 || cekNilai([$siswa['nilai']['bulanan'], $siswa['nilai']['pts'], $siswa['nilai']['pas'], $siswa['nilai']['kehadiran']])) : ?>
                                            <td>
                                                <div class="alert-danger">
                                                    Nilai Tidak Valid!
                                                </div>
                                            </td>
                                            <td>
                                                <a href="../detail/?nis=<?= $siswa['nis']?>" class="btn btn-secondary disabled badge rounded-pill">
                                                    <i class="bi bi-info-circle"></i> Detail
                                                </a>
                                            </td>
                                        <?php else : ?>
                                            <td>
                                                <?= checkGrade($siswa['nilai']['raport']) ?>
                                            </td>
                                            <td>
                                                <a href="../detail/?nis=<?= $siswa['nis']?>" class="btn btn-success badge rounded-pill">
                                                    <i class="bi bi-info-circle"></i> Detail
                                                </a>
                                            </td>
                                        <?php endif ?>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <!-- Footer -->
        <div class="footer p-3 text-center text-light bg-dark fw-medium">
            copyright&copy; 2022 <a href="#" class="text-secondary">Kelompok 5, XI RPL 3</a> with &lt;3 
        </div>
        <!-- Akhir Footer -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="../../assets/script/javascript/index.js"></script>
    </body>
</html>