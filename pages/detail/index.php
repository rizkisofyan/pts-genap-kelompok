<?php
session_start();

require '../../src/methods.php';

if( !isset($_SESSION['datanilai']) || !isset($_GET['nis']) ){
    header('Location:  ../pages/data-nilai/');
}

$nis = $_GET['nis'];
$data = cariData($_SESSION['datanilai'], $nis);
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
        <?php if(!$data) : ?>
            <title>Data tidak ditemukan ;_;</title>
        <?php else : ?>
            <title>Detail Nilai <?= $data['nama'] ?></title>
        <?php endif ?>
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
                            <a class="nav-link" href="../data-nilai/">Data Nilai</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Akhir Navbar -->

        <div class="container-xl mt-4">
            <?php if(!$data) : ?>
                <div class="alert alert-danger fw-bold">
                    Data tidak ditemukan
                    <a href="../data-nilai/" class="fw-normal d-block text-danger mt-3">← Kembali ke halaman data nilai</a>
                </div>
            <?php else : ?>
                <div class="row">
                    <div class="col">
                            <h3 class="display-6 fw-normal">Detail Nilai <?= $data['nama'] ?></h3>
                        </div>
                    </div>
                <div class="row mt-4">
                    <div class="col">
                        <h4 class="text-secondary fw-light">Data Nilai Sebelum Di Proses</h4>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col"colspan="4">Nilai</th>
                                    <th scope="col" rowspan="2">Jumlah</th>
                                </tr>
                                <tr>
                                    <th scope="col">Bulanan</th>
                                    <th scope="col">PTS</th>
                                    <th scope="col">PAS</th>
                                    <th scope="col">Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $data['nilai']['bulanan']?></td>
                                    <td><?= $data['nilai']['pts']?></td>
                                    <td><?= $data['nilai']['pas']?></td>
                                    <td><?= $data['nilai']['kehadiran']?></td>
                                    <td><?= totalNilai($data['nilai']) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col">
                        <h4 class="text-secondary fw-light">Nilai Akhir Setelah Di Proses</h4>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col"colspan="4">Nilai</th>
                                    <th scope="col" rowspan="2">Total (Nilai Raport)</th>
                                    <th scope="col" rowspan="2">Grade</th>
                                </tr>
                                <tr>
                                    <th scope="col">Bulanan (35%)</th>
                                    <th scope="col">PTS (15%)</th>
                                    <th scope="col">PAS (20%)</th>
                                    <th scope="col">Kehadiran (30%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach($data['nilai']['akhir'] as $nilai) : ?>
                                    <?php endforeach ?>
                                    <td><?= $data['nilai']['akhir'][0] ?></td>
                                    <td><?= $data['nilai']['akhir'][1] ?></td>
                                    <td><?= $data['nilai']['akhir'][2] ?></td>
                                    <td><?= $data['nilai']['akhir'][3] ?></td>
                                    <td><?= $data['nilai']['raport'] ?></td>
                                    <td>
                                        <?= checkGrade($data['nilai']['raport']) ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <a href="../data-nilai/" class="text-success">← Kembali ke halaman data nilai</a>
                    </div>
                </div>
            <?php endif?>
        </div>

        <!-- Footer -->
        <div class="p-3 text-center text-light bg-dark fw-medium mt-4">
            copyright&copy; 2022 <a href="#" class="text-secondary">Kelompok 5, XI RPL 3</a> with &lt;3 
        </div>
        <!-- Akhir Footer -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>        
    </body>
</html>