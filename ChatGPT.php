<?php
if (isset($_POST['url'])) {
    $url = $_POST['url'];
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $html = @file_get_contents($url);
        if ($html !== false) {
            // Membersihkan karakter aneh
            echo htmlspecialchars($html);
        } else {
            echo "Gagal mengambil konten dari URL.";
        }
    } else {
        echo "URL tidak valid.";
    }
} else {
    echo "Tidak ada URL dikirim.";
}