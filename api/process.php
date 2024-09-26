<?php
// api/process.php

// Enable error reporting for debugging (REMOVE in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session to store results (optional, if using sessions)
session_start();

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize POST data
    $tanggal_lahir = isset($_POST['tanggal_lahir']) ? trim($_POST['tanggal_lahir']) : '';
    $tanggal_kehilangan = isset($_POST['tanggal_kehilangan']) ? trim($_POST['tanggal_kehilangan']) : '';

    // Validate the input dates
    if (empty($tanggal_lahir) || empty($tanggal_kehilangan)) {
        $error = 'Semua field wajib diisi.'; // All fields are required.
        // Redirect back with error message
        header('Location: /?error=' . urlencode($error));
        exit();
    }

    // Convert dates to DateTime objects
    $lahir = DateTime::createFromFormat('Y-m-d', $tanggal_lahir);
    $kehilangan = DateTime::createFromFormat('Y-m-d', $tanggal_kehilangan);

    if (!$lahir || !$kehilangan) {
        $error = 'Format tanggal tidak valid.'; // Invalid date format.
        header('Location: /?error=' . urlencode($error));
        exit();
    }

    // Perform your calculation or logic here
    // Example: Simple total neptu calculation
    $neptu_lahir = 10; // Replace with actual calculation
    $neptu_kehilangan = 10; // Replace with actual calculation
    $total_neptu = $neptu_lahir + $neptu_kehilangan;

    // Determine the culprit based on total neptu
    if ($total_neptu <= 15) {
        $pelaku = 'Pelaku adalah orang dalam rumah sendiri.';
    } else {
        $pelaku = 'Pelaku mungkin dari luar rumah.';
    }

    // Prepare the result
    $hasil = "Hari Lahir: Selasa - Pasaran: Pon\nNeptu Lahir: $neptu_lahir\nHari Kehilangan: Selasa - Pasaran: Pon\nNeptu Kehilangan: $neptu_kehilangan\nTotal Neptu: $total_neptu\nHasil: $pelaku";

    // Option 1: Pass the result via query parameter
    header('Location: /?hasil=' . urlencode($hasil));
    exit();

    // Option 2: Store the result in session (uncomment if using sessions)
    /*
    $_SESSION['hasil'] = $hasil;
    header('Location: /');
    exit();
    */
} else {
    // If accessed without POST, redirect to form
    header('Location: /');
    exit();
}
?>
