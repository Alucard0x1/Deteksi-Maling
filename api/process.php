<?php
// api/process.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input
    $tanggal_lahir = $_POST['tanggal_lahir'] ?? '';
    $tanggal_kehilangan = $_POST['tanggal_kehilangan'] ?? '';

    if (empty($tanggal_lahir) || empty($tanggal_kehilangan)) {
        $hasil = "Mohon isi kedua tanggal terlebih dahulu.";
        redirectWithResult($hasil);
    }

    $tanggal_lahir_date = DateTime::createFromFormat('Y-m-d', $tanggal_lahir);
    $tanggal_kehilangan_date = DateTime::createFromFormat('Y-m-d', $tanggal_kehilangan);

    if (!$tanggal_lahir_date || !$tanggal_kehilangan_date) {
        $hasil = "Tanggal yang dimasukkan tidak valid.";
        redirectWithResult($hasil);
    }

    // Validasi: Tanggal lahir tidak boleh lebih besar dari tanggal kehilangan
    if ($tanggal_lahir_date > $tanggal_kehilangan_date) {
        $hasil = "Tanggal lahir tidak boleh lebih besar dari tanggal kehilangan.";
        redirectWithResult($hasil);
    }

    // Arrays for days and pasaran
    $days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    $pasaran = ["Legi", "Pahing", "Pon", "Wage", "Kliwon"];

    // Functions
    function getDayName($date, $days) {
        return $days[intval($date->format('w'))];
    }

    function getPasaran($date, $pasaran) {
        $startPasaranDate = new DateTime('1893-01-01');
        $interval = $startPasaranDate->diff($date);
        $differenceInDays = (int)$interval->format('%a');
        return $pasaran[$differenceInDays % 5];
    }

    function getNeptu($day, $pasaran) {
        $hariValues = [
            "Senin" => 4,
            "Selasa" => 3,
            "Rabu" => 7,
            "Kamis" => 8,
            "Jumat" => 6,
            "Sabtu" => 9,
            "Minggu" => 5
        ];

        $pasaranValues = [
            "Kliwon" => 8,
            "Legi" => 5,
            "Pahing" => 9,
            "Pon" => 7,
            "Wage" => 4
        ];

        return $hariValues[$day] + $pasaranValues[$pasaran];
    }

    // Processing
    $hariLahir = getDayName($tanggal_lahir_date, $days);
    $pasaranLahir = getPasaran($tanggal_lahir_date, $pasaran);
    $neptuLahir = getNeptu($hariLahir, $pasaranLahir);

    $hariKehilangan = getDayName($tanggal_kehilangan_date, $days);
    $pasaranKehilangan = getPasaran($tanggal_kehilangan_date, $pasaran);
    $neptuKehilangan = getNeptu($hariKehilangan, $pasaranKehilangan);

    $totalNeptu = $neptuLahir + $neptuKehilangan;
    $sisa = $totalNeptu % 3;

    // Determine hasil based on sisa
    if ($sisa === 1) {
        $hasil = "Pelaku adalah orang yang sudah dikenal.";
    } elseif ($sisa === 2) {
        $hasil = "Pelaku adalah orang dalam rumah sendiri.";
    } else {
        $hasil = "Pelaku adalah orang luar rumah atau orang jauh.";
    }

    // Prepare the result string
    $result = "Hari Lahir: $hariLahir - Pasaran: $pasaranLahir\n" .
              "Neptu Lahir: $neptuLahir\n" .
              "Hari Kehilangan: $hariKehilangan - Pasaran: $pasaranKehilangan\n" .
              "Neptu Kehilangan: $neptuKehilangan\n" .
              "Total Neptu: $totalNeptu\n" .
              "Hasil: $hasil";

    // Redirect back to index.php with the result
    redirectWithResult($result);
} else {
    // If accessed directly, redirect to index.php
    header('Location: /');
    exit();
}

function redirectWithResult($hasil) {
    // Encode the result to pass it via URL
    $encoded_hasil = urlencode($hasil);
    header("Location: /?hasil=$encoded_hasil");
    exit();
}
?>
