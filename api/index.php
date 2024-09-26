<?php
// api/index.php

// Start session if using sessions (optional)
// session_start();

// Serve the HTML form
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deteksi Maling Berdasarkan Primbon Jawa</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="container">
        <h1>Deteksi Maling Berdasarkan Primbon Jawa</h1>
        <form action="/process" method="POST">
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir Korban:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required aria-describedby="tanggalLahirHelp" 
                       oninvalid="this.setCustomValidity('Silakan pilih tanggal lahir korban')" 
                       oninput="this.setCustomValidity('')">
                <div id="tanggalLahirHelp" class="form-text">Pilih tanggal lahir korban.</div>
            </div>

            <div class="form-group">
                <label for="tanggal_kehilangan">Tanggal Kehilangan:</label>
                <input type="date" id="tanggal_kehilangan" name="tanggal_kehilangan" required aria-describedby="tanggalKehilanganHelp" 
                       oninvalid="this.setCustomValidity('Silakan pilih tanggal kehilangan')" 
                       oninput="this.setCustomValidity('')">
                <div id="tanggalKehilanganHelp" class="form-text">Pilih tanggal kehilangan.</div>
            </div>

            <button type="submit">Hitung Pelaku</button>

            <!-- Loading Spinner -->
            <div id="loading" class="loading hidden">Loading...</div>
        </form>

        <?php
        // Display error message if available via query parameter
        if (isset($_GET['error'])) {
            $error = htmlspecialchars($_GET['error']);
            echo '<div class="alert error">' . $error . '</div>';
        }

        // Display the result if available via query parameter
        if (isset($_GET['hasil'])) {
            $hasil = htmlspecialchars($_GET['hasil']);
            $hasil = nl2br($hasil);
            echo '<div class="result">' . $hasil . '</div>';
        }

        // Option 2: If using session-based results (uncomment if using sessions)
        /*
        if (isset($_SESSION['hasil'])) {
            $hasil = htmlspecialchars($_SESSION['hasil']);
            $hasil = nl2br($hasil);
            echo '<div class="result">' . $hasil . '</div>';
            unset($_SESSION['hasil']); // Clear the session variable
        }
        */
        ?>
    </div>

    <!-- Custom JavaScript for loading spinner -->
    <script>
        const form = document.querySelector('form');
        const loading = document.getElementById('loading');

        form.addEventListener('submit', () => {
            loading.classList.remove('hidden');
        });
    </script>
</body>
</html>
