<?php
function nilaiAkhir($nilaiBulanan, $nilaiPts, $nilaiPas, $nilaiKehadiran){
    $nilaiAkhir = [
        $nilaiBulanan * 35 / 100,
        $nilaiPts * 15 / 100,
        $nilaiPas * 20 / 100,
        $nilaiKehadiran * 30 / 100
    ];
    return $nilaiAkhir;
}

function checkGrade($nilaiRaport) {
    if($nilaiRaport > 100 || $nilaiRaport < 0){
        return '<div class="alert-danger">
                    Nilai Tidak Valid !
                </div>';
    } else if($nilaiRaport < 60) {
        return '<div class="alert-danger">
                    E
                </div>';
    } else if($nilaiRaport < 70) {
        return '<div class="alert-danger">
                    D
                </div>';
    } else if($nilaiRaport < 80) {
        return '<div class="alert-warning">
                    C
                </div>';
    } else if($nilaiRaport < 90) {
        return '<div class="alert-info">
                    B
                </div>';
    } else {
        return '<div class="alert-success">
                    A
                </div>';
    }
}

function cekNilai($array) {
    foreach($array as $nilai){
        if($nilai > 100 || $nilai < 0){
            return true;
        }
    }
    return false;
}

function cariData($arr, $nis){
    foreach($arr as $data){
        if( $data['nis'] == $nis ){
            return $data;
        }
    }
}

function totalNilai($nilai){
    return $nilai['bulanan'] + $nilai['pts'] + $nilai['pas'] + $nilai['kehadiran'];
}