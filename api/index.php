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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUa6mOZ8+lnJdph6Alciq5DJpLEa+8rQwbFTG3ykPyBD4e5dqLx2qqC4e7g2" crossorigin="anonymous">
    <!-- Custom CSS (optional) -->
    <link rel="stylesheet" href="/style.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center text-primary mb-4">Deteksi Maling Berdasarkan Primbon Jawa</h2>
                        <form action="/process" method="POST">
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir Korban:</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required class="form-control" aria-describedby="tanggalLahirHelp">
                                <div id="tanggalLahirHelp" class="form-text">Pilih tanggal lahir korban.</div>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_kehilangan" class="form-label">Tanggal Kehilangan:</label>
                                <input type="date" id="tanggal_kehilangan" name="tanggal_kehilangan" required class="form-control" aria-describedby="tanggalKehilanganHelp">
                                <div id="tanggalKehilanganHelp" class="form-text">Pilih tanggal kehilangan.</div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Hitung Pelaku</button>
                            </div>
                        </form>

                        <?php
                        // Display the result if available
                        if (isset($_GET['hasil'])) {
                            $hasil = htmlspecialchars($_GET['hasil']);
                            $hasil = nl2br($hasil);
                            echo '<div class="alert alert-success mt-4" role="alert">' . $hasil . '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper (for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoJrFw0fA1urZdqEVSTbKNFghuhdEw5rvkGCGaZrN7CwBf0" crossorigin="anonymous"></script>
</body>
</html>
