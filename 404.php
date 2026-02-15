<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bdtask">
    <title>ERROR 404 - Halaman Ini Tidak Ditemukan</title>
    <link rel="shortcut icon" href="assets/dist/img/favicon.png">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="assets/dist/css/style.css" rel="stylesheet">
    <style>
        body.bg-white {
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%);
            min-height: 100vh;
        }

        .error-container {
            margin-top: 5vh;
            margin-bottom: 5vh;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.10);
            padding: 40px 30px 30px 30px;
            position: relative;
            overflow: hidden;
        }

        .error-svg {
            width: 180px;
            height: auto;
            margin-bottom: 24px;
        }

        .error-title {
            font-size: 4rem;
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 0.5rem;
            letter-spacing: 2px;
        }

        .error-subtitle {
            font-size: 1.5rem;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 1.5rem;
        }

        .error-desc {
            color: #718096;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .btn-home {
            background: linear-gradient(90deg, #3b82f6 0%, #06b6d4 100%);
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            padding: 12px 32px;
            font-size: 1.1rem;
            transition: background 0.2s;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.10);
        }

        .btn-home:hover {
            background: linear-gradient(90deg, #2563eb 0%, #0ea5e9 100%);
            color: #fff;
        }

        @media (max-width: 576px) {
            .error-title {
                font-size: 2.5rem;
            }

            .error-subtitle {
                font-size: 1.1rem;
            }

            .error-container {
                padding: 24px 10px 20px 10px;
            }
        }
    </style>
</head>

<body class="bg-white">
    <div class="d-flex align-items-center justify-content-center text-center" style="min-height:100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10">
                    <div class="error-container shadow">
                        <svg class="error-svg" viewBox="0 0 500 400" fill="none">
                            <path class="stemC2 moko-404__g" d="M34.78,309.36S22.17,299,22.36,298.71c.34-.61,13.11,9.6,13.11,9.6" />
                            <path class="leafB2 moko-404__f" d="M463.63,302.34c.19.87,9.1-3.24,7.53-15C471.16,287.38,461.3,291.81,463.63,302.34Z" />
                            <path class="stemB2 moko-404__g" d="M461.16,307.23s6.54-14.91,6.91-14.83c.68.16-5.71,15.21-5.71,15.21" />
                            <path class="leafA2 moko-404__f" d="M447.56,278.48c-.23,1.15,12.65.92,17-14C464.53,264.48,450.33,264.59,447.56,278.48Z" />
                            <path class="stemA2 moko-404__g" d="M442,283s15.75-14.46,16.15-14.15c.73.55-14.91,15.26-14.91,15.26" />
                            <path class="eyeL1   eyeL4   moko-404__k" d="M228.31,91.58c1.4,7.43-2.7,14.44-9.15,15.65S206.35,103.4,205,96s2.7-14.44,9.15-15.65,12.81,3.83,14.21,11.26" />
                            <path class="eyeR1   eyeR4   moko-404__k" d="M260.45,91.58c-1.4,7.43,2.7,14.44,9.15,15.65S282.42,103.4,283.81,96s-2.7-14.44-9.15-15.65-12.82,3.83-14.21,11.26" />
                            <path class="pupilL1 pupilL4 moko-404__l" d="M218.59,93.9a3.34,3.34,0,1,1-3.34-3.34,3.34,3.34,0,0,1,3.34,3.34" />
                            <path class="pupilR1 pupilR4 moko-404__l" d="M269,93.9a3.34,3.34,0,1,0,3.34-3.34A3.34,3.34,0,0,0,269,93.9" />
                            <path class="eyeL3   moko-404__k" d="M227.67,97.39H205.81a.5.5,0,0,1,0-1h21.85a.5.5,0,1,1,0,1Z" />
                            <path class="eyeR3   moko-404__k" d="M283,97.39H261.27a.5.5,0,0,1,0-1H283a.5.5,0,0,1,0,1Z" />
                            <path class="pupilL3 moko-404__l" d="M218.07,96.89s-1.43,0-3.2,0-3.2,0-3.2,0,1.44-.05,3.2-.05,3.2,0,3.2.05" />
                            <path class="pupilR3 moko-404__l" d="M269.1,96.89s1.43,0,3.19,0,3.19,0,3.19,0-1.43-.05-3.19-.05-3.19,0-3.19.05" />
                        </svg>
                        <div class="error-title">404</div>
                        <div class="error-subtitle">Halaman Tidak Ditemukan</div>
                        <div class="error-desc">
                            Maaf, halaman yang Anda cari tidak ditemukan atau telah dipindahkan.
                        </div>
                        <a href="<?php echo "index.php?token=" . encrypt(date('Ymd')) . "&hal=dashboard"; ?>" class="btn btn-home">
                            <i class="fas fa-home"></i> Klik Disini Untuk Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/plugins/jQuery/jquery-3.4.1.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>