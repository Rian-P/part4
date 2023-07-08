<!DOCTYPE html>
<html>
<head>
    <title>Booking Notification</title>
</head>
<body>
    <h1>Booking Notification</h1>
    <p>Hello , </p>
    <p>Your booking with ID {{ $booking->nama_pelanggan }} has been confirmed.</p>
    <li>Tanggal Ambil: {{ $booking->tanggal_ambil }}</li>
    <!-- Add other relevant booking details here -->
</body>
</html>
