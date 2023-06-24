<!DOCTYPE html>
<html>
<head>
    <title>Datepicker with Database Data</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

    <input type="text" class="datepicker">

    <script>
        $(document).ready(function() {
            // Mengambil data tanggal_ambil dari database menggunakan PHP
            <?php
      

            // Mengambil data tanggal_ambil dari database
            $query = "SELECT tanggal_ambil FROM Pemesanan";
            $result = $conn->query($query);

            // Membuat array untuk menampung tanggal-tanggal dari database
            $datesForDisable = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $datesForDisable[] = $row['tanggal_ambil'];
                }
            }

            // Menutup koneksi ke database
            $conn->close();

            // Mengirimkan data tanggal-tanggal ke JavaScript
            echo 'var datesForDisable = ' . json_encode($datesForDisable) . ';';
            ?>
            
            // Mengubah format tanggal untuk sesuai dengan format yang diterima oleh datepicker (mm-dd-yyyy)
            var formattedDatesForDisable = datesForDisable.map(function(date) {
                var parts = date.split("-");
                return parts[1] + "-" + parts[2] + "-" + parts[0];
            });

            // Menginisialisasi datepicker dengan tanggal yang telah diperbarui
            $('.datepicker').datepicker({
                format: 'mm-dd-yyyy',
                autoclose: true,
                todayHighlight: true,
                datesDisabled: formattedDatesForDisable
            });
        });
    </script>

</body>
</html>
