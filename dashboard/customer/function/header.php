<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nexvorta - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="assets/css/dashboard/customer.css" rel="stylesheet">
    <link href="assets/img/logo_2.png" rel="icon" />
    <link href="assets/img/logo_2.png" rel="apple-touch-icon" />
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- COMBINED HEADER NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand" href="#">
                Nexvorta Marketplace
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">

                <!-- Menu -->
                <ul class="navbar-nav me-auto ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Best Seller</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Promo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>

                <!-- Search -->
                <div class="d-none d-lg-block me-3" style="width:220px;">
                    <input type="text" id="searchInput" class="form-control form-control-sm search-input" placeholder="Search products...">
                </div>

                <!-- Right Buttons -->
                <div class="d-flex align-items-center gap-2">

                    <button class="theme-toggle-btn" onclick="toggleDarkMode()">
                        <i class="bi bi-moon"></i>
                    </button>

                    <button class="cart-btn position-relative" data-bs-toggle="offcanvas" data-bs-target="#cartCanvas">
                        <i class="bi bi-cart fs-5"></i>
                        <span id="cartCount" class="cart-badge">0</span>
                    </button>

                    <button class="nav-icon-btn">
                        <i class="bi bi-person-circle"></i>
                    </button>

                    <button class="logout-btn">
                        Logout
                    </button>

                </div>

            </div>
        </div>
    </nav>