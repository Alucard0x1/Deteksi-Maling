<?php
// api/index.php

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
    <!-- CSS Styles -->
    <link rel="stylesheet" href="/public/style.css">
</head>
<body>
    <div class="container">
        <h1>Deteksi Maling Berdasarkan Primbon Jawa</h1>
        <form action="/process" method="POST">
            <label for="tanggal_lahir">Tanggal Lahir Korban:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

            <label for="tanggal_kehilangan">Tanggal Kehilangan:</label>
            <input type="date" id="tanggal_kehilangan" name="tanggal_kehilangan" required>

            <button type="submit">Hitung Pelaku</button>
        </form>

        <?php
        // Display the result if available
        if (isset($_GET['hasil'])) {
            $hasil = htmlspecialchars($_GET['hasil']);
            $hasil = nl2br($hasil);
            echo '<div id="hasil">' . $hasil . '</div>';
        }
        ?>
    </div>
</body>
</html>
