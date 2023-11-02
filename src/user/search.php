//Di dalam search.php
<?php 
// Tentukan jumlah maksimal hasil yang ditampilkan
$maxResults = 10;

// Query untuk mencari data berdasarkan kata kunci dengan batasan jumlah hasil
$query = "SELECT * FROM nama_tabel WHERE kolom_pencarian LIKE '%$keyword%' LIMIT $maxResults";
$result = mysqli_query($koneksi, $query);

// Tampilkan data dalam format yang lebih menarik
if (mysqli_num_rows($result) > 0) {
    echo "<h2>Hasil Pencarian:</h2>";
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['kolom_data'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "<h2>Tidak ditemukan hasil untuk kata kunci: " . $keyword . "</h2>";
}
?>
<!-- Tambahkan script jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Tambahkan script untuk menampilkan animasi loading saat proses pencarian -->
<script>
    $(document).ready(function () {
        $("form").submit(function (event) {
            event.preventDefault(); // Mencegah form dikirimkan secara default

            // Tampilkan animasi loading saat proses pencarian
            $(".search-results").html('<h2>Mencari...</h2><div class="loader"></div>');

            // Kirim data pencarian menggunakan AJAX
            var keyword = $("#keyword").val();
            $.get("search.php", { keyword: keyword }, function (data) {
                // Tampilkan hasil pencarian pada div dengan class "search-results"
                $(".search-results").html(data);
            });
        });
    });
</script>