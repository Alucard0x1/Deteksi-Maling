<?php
// api/index.php

// Start session if using sessions (optional)
session_start();

// Serve the HTML form
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Deteksi maling berdasarkan Neptu Jawa.">
    
    <!-- OpenGraph meta tags for SEO and social sharing -->
    <meta property="og:title" content="Deteksi Maling Berdasarkan Neptu Jawa">
    <meta property="og:description" content="Gunakan perhitungan neptu Jawa untuk mendeteksi Maling.">
    <meta property="og:image" content="https://deteksi-maling2.vercel.app/neptu.webp">
    <meta property="og:url" content="https://deteksi-maling2.vercel.app/">
    <meta property="og:type" content="website">

    <!-- Twitter Card meta tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Deteksi Maling Berdasarkan Neptu Jawa">
    <meta name="twitter:description" content="Gunakan perhitungan neptu Jawa untuk mendeteksi Maling.">
    <meta name="twitter:image" content="https://deteksi-maling2.vercel.app/neptu.webp">
    
    <!-- JSON-LD Structured Data for SEO -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Deteksi Maling Berdasarkan Neptu Jawa",
        "url": "https://deteksi-maling2.vercel.app/",
        "image": "https://deteksi-maling2.vercel.app/neptu.webp",
        "description": "Gunakan perhitungan neptu Jawa untuk mendeteksi Maling.",
        "author": {
            "@type": "Person",
            "name": "Alucard0x1"
        },
        "publisher": {
            "@type": "Organization",
            "name": "Padepokan Serat Jiwa",
            "logo": {
                "@type": "ImageObject",
                "url": "https://deteksi-maling2.vercel.app/neptu.webp"
            }
        }
    }
    </script>

    <title>Deteksi Maling Berdasarkan Neptu Jawa</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="container">
        <h1>Deteksi Maling Berdasarkan Neptu Jawa</h1>
        
        <!-- Add image at the top of the form -->
        <div class="image-container">
            <img src="/neptu.webp" alt="Neptu Jawa" style="max-width: 100%; height: auto;">
        </div>

        <form action="/process" method="POST">
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir Korban:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required aria-describedby="tanggalLahirHelp" 
                       oninvalid="this.setCustomValidity('Silakan pilih tanggal lahir korban')" 
                       oninput="this.setCustomValidity('')">
            </div>

            <div class="form-group">
                <label for="tanggal_kehilangan">Tanggal Kehilangan:</label>
                <input type="date" id="tanggal_kehilangan" name="tanggal_kehilangan" required aria-describedby="tanggalKehilanganHelp" 
                       oninvalid="this.setCustomValidity('Silakan pilih tanggal kehilangan')" 
                       oninput="this.setCustomValidity('')">
            </div>

            <button type="submit">Hitung Neptu untuk Deteksi Pelaku</button>

            <!-- Loading Spinner -->
            <div id="loading" class="loading hidden">🦹‍♂️</div>
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

            // Option 1: Form with Submit Button for "Hitung Lagi"
            echo '
            <form action="/" method="GET" class="hitung-lagi-form">
                <button type="submit" class="hitung-lagi-button">Hitung Lagi</button>
            </form>
            ';
        }

        // Option 2: Anchor Tag Styled as Button for "Hitung Lagi"
        /*
        if (isset($_GET['hasil'])) {
            $hasil = htmlspecialchars($_GET['hasil']);
            $hasil = nl2br($hasil);
            echo '<div class="result">' . $hasil . '</div>';
            echo '<a href="/" class="hitung-lagi-button">Hitung Lagi</a>';
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
