<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Sertifikat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .template-container {
            margin: 20px 0;
            padding: 20px;
            text-align: center;
        }
        .template-card {
            border: 2px solid #0033cc;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            margin: 10px;
            padding: 15px;
        }
    </style>
</head>
<body>

<!-- Bagian Header -->
<header class="bg-primary text-white text-center py-4">
    <div class="container">
        <h1>Template Sertifikat</h1>
    </div>
</header>

<!-- Daftar Template Sertifikat -->
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Pilih Template Sertifikat</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="template-card">
                    <h3>Template 1</h3>
                    <p>Deskripsi singkat tentang template ini.</p>
                    <button class="btn btn-primary" onclick="selectTemplate('Template 1')">Pilih</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="template-card">
                    <h3>Template 2</h3>
                    <p>Deskripsi singkat tentang template ini.</p>
                    <button class="btn btn-primary" onclick="selectTemplate('Template 2')">Pilih</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="template-card">
                    <h3>Template 3</h3>
                    <p>Deskripsi singkat tentang template ini.</p>
                    <button class="btn btn-primary" onclick="selectTemplate('Template 3')">Pilih</button>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="halaman utama admin.php" class="btn btn-secondary">Kembali ke Halaman Utama</a>
        </div>
    </div>
</section>

<script>
    function selectTemplate(templateName) {
        // Redirect to the edit page with the selected template as a URL parameter
        window.location.href = 'edit sertifikat.php?template=' + encodeURIComponent(templateName);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
