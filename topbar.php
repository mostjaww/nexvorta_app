<header id="header" class="fixed-top d-flex align-items-center header">
  <div class="position-relative d-flex align-items-center container-fluid container-xl">
    <div class="d-flex align-items-center justify-content-between w-100 header-box" style="
            background: #fff;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
          ">
      <a href="<?php echo $base_url; ?>" class="d-flex align-items-center me-auto logo">
        <h1 class="sitename" style="font-weight: 700; margin: 0; color: var(--accent-color)">
          NEXVORTA
        </h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo $base_url; ?>" class="active">Home</a></li>
          <li class="dropdown">
            <a href="#" style="color: #023e8a"><span>Company</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=about-us"; ?>">About Us</a></li>
              <li><a href="#">Certification</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" style="color: #023e8a"><span>Products</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=products/crafts-umkm"; ?>">Crafts & UMKM Products</a></li>
              <li><a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=products/agriculture-plantations"; ?>">Agriculture & Plantations Products</a></li>
              <li><a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=products/livestockfarm"; ?>">Livestock Farm Products</a></li>
            </ul>
          </li>
          <li><a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=#team"; ?>" style="color: #023e8a">Our Team</a></li>
          <li><a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=#contact"; ?>" style="color: #023e8a">Contact Us</a></li>
          <li class="dropdown">
            <a href="#" style="color: #023e8a"><span>Download</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="https://play.google.com/store/apps"><i class="bi bi-google-play"></i> Google Play Store</a></li>
              <li><a href="https://www.apple.com/id/app-store/"><i class="bi bi-apple"></i> Apple App Store</a></li>
            </ul>
          </li>
          <a class="btn-getstarted" href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=user/login"; ?>">Login</a>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list" style="color: #023e8a"></i>
      </nav>
    </div>
  </div>
</header>