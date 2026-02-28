<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Page Not Found</title>

    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #023e8a 0%, #0077b6 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .error-box {
            background: #ffffff;
            border-radius: 20px;
            padding: 50px 35px;
            text-align: center;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            animation: fadeIn 0.6s ease-in-out;
        }

        .error-code {
            font-size: 90px;
            font-weight: 800;
            color: #0077b6;
            margin-bottom: 10px;
        }

        .error-title {
            font-size: 24px;
            font-weight: 600;
            color: #0077b6;
        }

        .error-text {
            font-size: 15px;
            color: #6c757d;
            margin: 15px 0 30px;
        }

        .btn-home {
            background: #0077b6;
            color: #fff;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            transition: 0.3s;
            text-decoration: none !important;

        }

        .btn-home:hover {
            background: #005a8c;
            transform: translateY(-2px);
        }

        .btn-secondary-custom {
            background: transparent;
            border: 2px solid #0077b6;
            color: #0077b6;
            padding: 10px 28px;
            border-radius: 10px;
            font-weight: 600;
            margin-left: 10px;
            transition: 0.3s;
            text-decoration: none !important;
        }

        .btn-secondary-custom:hover {
            background: #005a8c;
            color: #fff;
        }

        .error-icon {
            font-size: 50px;
            color: #0077b6;
            margin-bottom: 20px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 576px) {
            .error-code {
                font-size: 60px;
            }

            .error-box {
                padding: 35px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="error-box">
        <div class="error-icon">
            <i class="fas fa-exclamation-circle"></i>
        </div>

        <div class="error-code">404</div>
        <div class="error-title">Halaman Tidak Ditemukan</div>

        <div class="error-text">
            Maaf, halaman yang Anda akses tidak tersedia atau telah dipindahkan.
            Silakan kembali ke halaman utama.
        </div>

        <a href="<?php echo $base_url; ?>" class="btn btn-home">
            <i class="fas fa-sign-in-alt"></i> Kembali ke Beranda
        </a>

        <a href="javascript:history.back()" class="btn btn-secondary-custom">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

</body>

</html>