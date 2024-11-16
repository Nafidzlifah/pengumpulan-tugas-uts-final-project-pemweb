<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sertifikat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<!-- Bagian Header -->
<header class="bg-primary text-white text-center py-4">
    <div class="container">
        <h1>Edit Sertifikat</h1>
    </div>
</header>

<!-- Formulir untuk Input Sertifikat -->
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Isi Detail Sertifikat</h2>
        <form id="editCertificateForm">
            <div class="mb-3">
                <label for="recipientName" class="form-label">Nama Penerima</label>
                <input type="text" class="form-control" id="recipientName" required>
            </div>
            <div class="mb-3">
                <label for="eventName" class="form-label">Nama Acara</label>
                <input type="text" class="form-control" id="eventName" required>
            </div>
            <div class="mb-3">
                <label for="eventDate" class="form-label">Tanggal Acara</label>
                <input type="date" class="form-control" id="eventDate" required>
            </div>
            <div class="mb-3">
                <label for="organizer" class="form-label">Penyelenggara</label>
                <input type="text" class="form-control" id="organizer" required>
            </div>
            <div class="mb-3">
                <label for="issuer" class="form-label">Nama Pemberi Sertifikat</label>
                <input type="text" class="form-control" id="issuer" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="generateCertificate()">Buat Sertifikat</button>
        </form>
    </div>
</section>

<script>
    // Function to get URL parameters
    function getUrlParameter(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    // Populate the template name
    document.addEventListener('DOMContentLoaded', function() {
        const templateName = getUrlParameter('template');
        if (templateName) {
            // You can display or use the template name here
            console.log('Template yang dipilih:', templateName);
            // Optionally, display it on the page
            document.title += ' - ' + templateName;
        }
    });

    function generateCertificate() {
        const name = document.getElementById('recipientName').value;
        const event = document.getElementById('eventName').value;
        const date = document.getElementById('eventDate').value;
        const organizer = document.getElementById('organizer').value;
        const issuer = document.getElementById('issuer').value;

        // You can further implement certificate generation logic here
        alert('Sertifikat telah dibuat untuk ' + name);
        // Example: redirect to the certificate view page or generate the certificate directly.
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
