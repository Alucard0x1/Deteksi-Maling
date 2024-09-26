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
    <!-- Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-blue-700 mb-6">Deteksi Maling Berdasarkan Primbon Jawa</h1>
        <form action="/process" method="POST" class="space-y-4">
            <div>
                <label for="tanggal_lahir" class="block text-gray-700 font-medium mb-2">Tanggal Lahir Korban:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required aria-required="true" aria-label="Tanggal Lahir Korban" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" oninvalid="this.setCustomValidity('Silakan pilih tanggal lahir Anda')" oninput="this.setCustomValidity('')">
            </div>

            <div>
                <label for="tanggal_kehilangan" class="block text-gray-700 font-medium mb-2">Tanggal Kehilangan:</label>
                <input type="date" id="tanggal_kehilangan" name="tanggal_kehilangan" required aria-required="true" aria-label="Tanggal Kehilangan" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" oninvalid="this.setCustomValidity('Silakan pilih tanggal kehilangan Anda')" oninput="this.setCustomValidity('')">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition-colors duration-300">Hitung Pelaku</button>

            <!-- Loading Spinner -->
            <div id="spinner" class="hidden flex justify-center mt-4">
                <svg class="animate-spin h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
            </div>
        </form>

        <?php
        // Display the result if available
        if (isset($_GET['hasil'])) {
            $hasil = htmlspecialchars($_GET['hasil']);
            $hasil = nl2br($hasil);
            echo '<div class="mt-6 p-4 bg-green-100 border border-green-200 text-green-800 rounded-md">' . $hasil . '</div>';
        }
        ?>
    </div>

    <!-- Tailwind JS (Optional for interactive components) -->
    <script>
        const form = document.querySelector('form');
        const spinner = document.getElementById('spinner');

        form.addEventListener('submit', () => {
            spinner.classList.remove('hidden');
        });
    </script>
</body>
</html>
