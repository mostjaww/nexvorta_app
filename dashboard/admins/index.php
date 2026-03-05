<?php
// Tambahkan session_start() di baris paling atas sebelum kode lain
session_start();
include_once 'API/config.php'; // Include database connection
include_once 'function.php'; // Include function.php
include_once 'features/header.php'; // Include header.php

// Cek jika pengguna belum login, redirect ke login.php
if (!isset($_SESSION['username'])) {
  header('Location: ' . $base_url . 'menu-a/login.php');
  exit;
}
?>

<body>

  <div class="layout-content-navbar layout-wrapper">
    <div class="layout-container">

      <!-- Menu -->

      <?php
      include_once 'features/sidebar.php';
      ?>

      <div class="rounded-1 menu-mobile-toggler d-xl-none">
        <a href="javascript:void(0);" class="p-2 rounded-1 text-bg-secondary text-large layout-menu-toggle menu-link">
          <i class="bx bx-menu icon-base"></i>
          <i class="bx-chevron-right bx icon-base"></i>
        </a>
      </div>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">

        <!-- Navbar -->

        <nav class="align-items-center bg-navbar-theme layout-navbar container-xxl navbar-detached navbar navbar-expand-xl" id="layout-navbar">

          <div class="align-items-xl-center me-4 me-xl-0 layout-menu-toggle navbar-nav d-xl-none">
            <a class="me-xl-6 px-0 nav-item nav-link" href="javascript:void(0)">
              <i class="icon-base bx bx-menu icon-md"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">

            <!-- Search -->
            <div class="align-items-center navbar-nav">
              <div class="mb-0 navbar-search-wrapper nav-item">
                <a class="px-0 search-toggler nav-item nav-link" href="javascript:void(0);">
                  <span class="d-inline-block text-body-secondary fw-normal" id="autocomplete"></span>
                </a>
              </div>
            </div>
            <!-- /Search -->

            <ul class="flex-row align-items-center ms-md-auto navbar-nav">

              <!-- Style Switcher -->
              <li class="me-2 me-xl-0 nav-item dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" id="nav-theme" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <i class="theme-icon-active icon-base bx bx-sun icon-md"></i>
                  <span class="ms-2 d-none" id="nav-theme-text">Toggle theme</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="nav-theme-text">
                  <li>
                    <button type="button" class="align-items-center dropdown-item active" data-bs-theme-value="light" aria-pressed="false">
                      <span><i class="me-3 icon-base bx bx-sun icon-md" data-icon="sun"></i>Light</span>
                    </button>
                  </li>
                  <li>
                    <button type="button" class="align-items-center dropdown-item" data-bs-theme-value="dark" aria-pressed="true">
                      <span><i class="me-3 icon-base bx bx-moon icon-md" data-icon="moon"></i>Dark</span>
                    </button>
                  </li>
                  <li>
                    <button type="button" class="align-items-center dropdown-item" data-bs-theme-value="system" aria-pressed="false">
                      <span><i class="me-3 bx-desktop icon-base bx icon-md" data-icon="desktop"></i>System</span>
                    </button>
                  </li>
                </ul>
              </li>
              <!-- / Style Switcher-->

              <!-- Quick links  -->
              <li class="me-2 me-xl-0 nav-item dropdown-shortcuts navbar-dropdown dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  <i class="bx-grid-alt icon-base bx icon-md"></i>
                </a>
                <div class="p-0 dropdown-menu dropdown-menu-end">
                  <div class="border-bottom dropdown-menu-header">
                    <div class="d-flex align-items-center py-3 dropdown-header">
                      <h6 class="me-auto mb-0">Pintasan</h6>
                    </div>
                  </div>
                  <div class="dropdown-shortcuts-list scrollable-container">
                    <div class="row-bordered overflow-visible row g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="mb-3 rounded-circle dropdown-shortcuts-icon">
                          <i class="text-heading icon-base bx bx-calendar icon-26px"></i>
                        </span>
                        <a href="app-calendar.php" class="stretched-link">Kalender</a>
                        <small>Appointments</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="mb-3 rounded-circle dropdown-shortcuts-icon">
                          <i class="text-heading icon-base bx bx-food-menu icon-26px"></i>
                        </span>
                        <a href="./invoice-page/app-invoice-list.php" class="stretched-link">Invoice App</a>
                        <small>Manage Accounts</small>
                      </div>
                    </div>
                    <div class="row-bordered overflow-visible row g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="mb-3 rounded-circle dropdown-shortcuts-icon">
                          <i class="text-heading icon-base bx bx-user icon-26px"></i>
                        </span>
                        <a href="<?= $base_url?>user/app-user.php" class="stretched-link">User App</a>
                        <small>Manage Users</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="mb-3 rounded-circle dropdown-shortcuts-icon">
                          <i class="text-heading icon-base bx bx-check-shield icon-26px"></i>
                        </span>
                        <a href="<?= $base_url?>user/app-akses-role.php" class="stretched-link">Role Management</a>
                        <small>Permission</small>
                      </div>
                    </div>
                    <div class="row-bordered overflow-visible row g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="mb-3 rounded-circle dropdown-shortcuts-icon">
                          <i class="text-heading icon-base bx bx-pie-chart-alt-2 icon-26px"></i>
                        </span>
                        <a href="index.php" class="stretched-link">Dashboard</a>
                        <small>User Dashboard</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="mb-3 rounded-circle dropdown-shortcuts-icon">
                          <i class="text-heading icon-base bx bx-cog icon-26px"></i>
                        </span>
                        <a href="<?= $base_url ?>user/app-account-settings.php" class="stretched-link">Setting</a>
                        <small>Account Settings</small>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <!-- Quick links -->

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar">
                    <img src="<?= $base_url ?>assets/img/avatars/1.png" alt class="w-px-40 rounded-circle h-auto" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar">
                            <img src="<?= $base_url ?>assets/img/avatars/1.png" alt class="w-px-40 rounded-circle h-auto" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="d-block fw-semibold"><?php echo $_SESSION['username']; ?></span>
                          <small class="text-muted">
                            <?php
                            $role_nama = [
                              1 => 'SUPER ADMIN',
                              2 => 'ADMIN',
                              3 => 'BACKOFFICE',
                              4 => 'KEPALA DINAS',
                              5 => 'SEKRETARIS',
                              6 => 'KEPALA BIDANG',
                              7 => 'KEPALA SEKSI',
                            ];
                            echo $role_nama[$_SESSION['role_id']] ?? 'Unknown';
                            ?>
                          </small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= $base_url?>user/app-account.php">
                      <i class="me-2 bx bx-user"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= $base_url ?>user/app-account-settings.php">
                      <i class="me-2 bx bx-cog"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="menu-a/logout.php">
                      <i class="me-2 bx bx-power-off"></i>
                      <span class="align-middle">Keluar</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->

            </ul>
          </div>

        </nav>

        <!-- / Navbar -->


        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="flex-grow-1 container-p-y container-xxl">

            <div class="row">
              <div class="order-0 mb-6 col-xxl-8">
                <div class="card">
                  <div class="d-flex align-items-start row" style="height: 235px;">
                    <div class="col-sm-7">
                      <div class="card-body">
                        <h5 class="mb-3 text-primary card-title">Hai <?php echo $_SESSION['username']; ?>, Selamat Datang di Backoffice Perizinan 🎉</h5>
                        <p class="mb-6">Kamu tidak ada agenda hari ini.<br />Selamat Bekerja!</p>
                      </div>
                    </div>
                    <div class="text-sm-left text-center col-sm-5">
                      <div class="px-0 px-md-6 pb-0 card-body">
                        <img src="assets/img/illustrations/man-with-laptop.png" height="175" class="scaleX-n1-rtl" alt="View Badge User" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="order-1 col-xxl-4 col-lg-12 col-md-4">
                <div class="row">
                  <div class="mb-6 col-lg-6 col-md-12 col-6">
                    <div class="h-100 card">
                      <div class="pb-4 card-body">
                        <span class="d-block mb-1 fw-medium">Permohonan Masuk</span>
                        <h4 class="mb-0 card-title">1,287</h4>
                      </div>
                      <div id="orderChart" class="pe-1 pb-3"></div>
                    </div>
                  </div>
                  <div class="mb-6 col-6">
                    <div class="h-100 card">
                      <div class="pb-0 card-body">
                        <span class="d-block mb-1 fw-medium">Retribusi Tertagih 2025</span>
                        <h4 class="mb-0 mb-lg-4 card-title">5,1M</h4>
                        <div id="revenueChart"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Total Retribusi -->
              <div class="order-2 order-md-3 order-xxl-2 mb-6 col-12 col-xxl-8">
                <div class="card" style="height: 380px;">
                  <div class="row-bordered row g-0">
                    <div class="col-lg-8">
                      <div class="d-flex align-items-center justify-content-between card-header">
                        <div class="mb-0 card-title">
                          <h5 class="m-0 me-2">Total Retribusi</h5>
                        </div>
                        <div class="dropdown">
                          <button class="p-0 btn" type="button" id="totalRevenue" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx-dots-vertical-rounded text-body-secondary icon-base bx icon-lg"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalRevenue">
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                          </div>
                        </div>
                      </div>
                      <div id="totalRevenueChart" class="px-3"></div>
                    </div>
                    <div class="col-lg-4">
                      <div class="d-flex flex-column align-items-center px-xl-9 py-12 card-body">
                        <div class="mb-6 text-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-label-primary">
                              <script>
                                document.write(new Date().getFullYear());
                              </script>
                            </button>
                            <button type="button" class="btn btn-label-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                              <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="javascript:void(0);">2024</a></li>
                              <li><a class="dropdown-item" href="javascript:void(0);">2023</a></li>
                              <li><a class="dropdown-item" href="javascript:void(0);">2022</a></li>
                            </ul>
                          </div>
                        </div>

                        <div id="growthChart"></div>
                        <br>
                        <!-- <div class="my-6 text-center fw-medium">62% Company Growth</div> -->

                        <div class="d-flex justify-content-between gap-11">
                          <div class="d-flex">
                            <div class="me-2 avatar">
                              <span class="bg-label-primary rounded-2 avatar-initial"><i class="text-primary icon-base bx bx-wallet icon-lg" title="Total Retribusi Terbit"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                              <small>
                                <script>
                                  document.write(new Date().getFullYear());
                                </script>
                              </small>
                              <h6 class="mb-0" title="Rp 10,335,579,987">Rp.10jt</h6>
                            </div>
                          </div>
                          <div class="d-flex">
                            <div class="me-2 avatar">
                              <span class="bg-label-info rounded-2 avatar-initial"><i class="text-info icon-base bx bx-money-withdraw icon-lg" title="Retribusi Tertagih"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                              <small>
                                <script>
                                  document.write(new Date().getFullYear());
                                </script>
                              </small>
                              <h6 class="mb-0" title="Rp 5,122,283,527">Rp.5jt</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Total Revenue -->
              <div class="order-3 order-md-2 col-12 col-md-8 col-lg-12 col-xxl-4">
                <div class="row">
                  <div class="mb-6 col-6">
                    <div class="h-100 card">
                      <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4 card-title">
                          <div class="me-2 avatar">
                            <span class="bg-label-success rounded-2 avatar-initial"><i class="text-success icon-base bx bx-task icon-lg"></i></span>
                          </div>
                          <div class="dropdown">
                            <button class="p-0 btn" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="bx-dots-vertical-rounded text-body-secondary icon-base bx"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                              <a class="dropdown-item" href="javascript:void(0);">View More</a>
                              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                          </div>
                        </div>
                        <p class="mb-1">Izin Diterima</p>
                        <h4 class="mb-3 card-title">552</h4>
                      </div>
                    </div>
                  </div>
                  <div class="mb-6 col-lg-6 col-md-12 col-6">
                    <div class="h-100 card">
                      <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4 card-title">
                          <div class="me-2 avatar">
                            <span class="bg-label-danger rounded-2 avatar-initial"><i class="text-danger icon-base bx bx-task-x icon-lg"></i></span>
                          </div>
                          <div class="dropdown">
                            <button class="p-0 btn" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="bx-dots-vertical-rounded text-body-secondary icon-base bx"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                              <a class="dropdown-item" href="javascript:void(0);">View More</a>
                              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                          </div>
                        </div>
                        <p class="mb-1">Izin Ditolak</p>
                        <h4 class="mb-3 card-title">550</h4>
                      </div>
                    </div>
                  </div>
                  <div class="mb-6 col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex flex-column flex-wrap flex-sm-row align-items-center justify-content-between gap-10">
                          <div class="d-flex flex-row flex-sm-column align-items-start justify-content-between">
                            <div class="mb-6 card-title">
                              <h5 class="text-nowrap auto">Total Retribusi</h5>
                              <span class="bg-label-warning badge auto">Tahun 2025</span>
                            </div>
                            <div class="mt-sm-auto">
                              <h4 class="mb-0">Rp. 15,457,863,514</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- pill table -->
              <div class="order-3 order-lg-4 mb-6 mb-lg-0 col-md-6" style="height:  490px;">
                <div class="h-100 text-center card">
                  <div class="nav-align-top card-header">
                    <ul class="flex-wrap row-gap-2 nav nav-pills" role="tablist">
                      <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-browser" aria-controls="navs-pills-browser" aria-selected="true">Income</button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-os" aria-controls="navs-pills-os" aria-selected="false">Data Izin</button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-country" aria-controls="navs-pills-country" aria-selected="false">Statistics</button>
                      </li>
                    </ul>
                  </div>
                  <div class="pt-0 pb-4 tab-content">
                    <!-- Income -->
                    <div class="tab-pane fade show active" id="navs-pills-browser" role="tabpanel">
                      <div class="d-flex mb-6">
                        <div class="flex-shrink-0 me-3 avatar">
                          <img src="assets/img/icons/unicons/wallet-primary.png" alt="User" />
                        </div>
                        <div>
                          <p class="mb-0">Total Retribusi</p>
                          <div class="d-flex align-items-center">
                            <h6 class="me-1 mb-0">$459.10</h6>
                            <small class="text-success fw-medium">
                              <i class="icon-base bx bx-chevron-up icon-lg"></i>
                              42.9%
                            </small>
                          </div>
                        </div>
                      </div>
                      <div id="incomeChart"></div>
                      <div class="d-flex align-items-center justify-content-center gap-3 mt-6">
                        <div class="flex-shrink-0">
                          <div id="expensesOfWeek"></div>
                        </div>
                        <div>
                          <h6 class="mb-0">Income this week</h6>
                          <small>$39k less than last week</small>
                        </div>
                      </div>
                    </div>
                    <!-- Income End -->
                    <!-- Operating System -->
                    <div class="tab-pane fade" id="navs-pills-os" role="tabpanel">
                      <div class="table-responsive text-start text-nowrap">
                        <table class="table table-borderless">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Jenis Izin</th>
                              <th>Izin Masuk</th>
                              <th class="w-50">Data Dalam Persen</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <span class="text-heading">IZIN REKLAME</span>
                                </div>
                              </td>
                              <td class="text-heading">1.800</td>
                              <td>
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                  <div class="w-100 progress" style="height:10px;">
                                    <div class="bg-success progress-bar" role="progressbar" style="width: 61.50%" aria-valuenow="61.50" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <small class="fw-medium">61.50%</small>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <span class="text-heading">Mac</span>
                                </div>
                              </td>
                              <td class="text-heading">89.68k</td>
                              <td>
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                  <div class="w-100 progress" style="height:10px;">
                                    <div class="bg-primary progress-bar" role="progressbar" style="width: 16.67%" aria-valuenow="16.67" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <small class="fw-medium">16.67%</small>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <span class="text-heading">Ubuntu</span>
                                </div>
                              </td>
                              <td class="text-heading">37.68k</td>
                              <td>
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                  <div class="w-100 progress" style="height:10px;">
                                    <div class="bg-info progress-bar" role="progressbar" style="width: 12.82%" aria-valuenow="12.82" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <small class="fw-medium">12.82%</small>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <span class="text-heading">Chrome</span>
                                </div>
                              </td>
                              <td class="text-heading">8.34k</td>
                              <td>
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                  <div class="w-100 progress" style="height:10px;">
                                    <div class="bg-warning progress-bar" role="progressbar" style="width: 6.25%" aria-valuenow="6.25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <small class="fw-medium">6.25%</small>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <span class="text-heading">Cent</span>
                                </div>
                              </td>
                              <td class="text-heading">2.25k</td>
                              <td>
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                  <div class="w-100 progress" style="height:10px;">
                                    <div class="bg-danger progress-bar" role="progressbar" style="width: 2.76%" aria-valuenow="2.76" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <small class="fw-medium">2.76%</small>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>6</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <span class="text-heading">Linux</span>
                                </div>
                              </td>
                              <td class="text-heading">328k</td>
                              <td>
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                  <div class="w-100 progress" style="height:10px;">
                                    <div class="bg-danger progress-bar" role="progressbar" style="width: 20.14%" aria-valuenow="2.76" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <small class="fw-medium">20.14%</small>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- Opearting System End -->
                    <!-- Statistics -->
                    <div class="tab-pane fade" id="navs-pills-country" role="tabpanel">
                      <div class="table-responsive text-start text-nowrap">
                        <table class="table table-borderless">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Country</th>
                              <th>Visits</th>
                              <th class="w-50">Data In Percentage</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <i class="me-3 rounded-circle fis fi fi-us fs-4"></i>
                                  <span class="text-heading">USA</span>
                                </div>
                              </td>
                              <td class="text-heading">87.24k</td>
                              <td>
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                  <div class="w-100 progress" style="height:10px;">
                                    <div class="bg-success progress-bar" role="progressbar" style="width: 38.12%" aria-valuenow="38.12" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <small class="fw-medium">38.12%</small>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <i class="me-3 rounded-circle fis fi fi-br fs-4"></i>
                                  <span class="text-heading">Brazil</span>
                                </div>
                              </td>
                              <td class="text-heading">42.68k</td>
                              <td>
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                  <div class="w-100 progress" style="height:10px;">
                                    <div class="bg-primary progress-bar" role="progressbar" style="width: 28.23%" aria-valuenow="28.23" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <small class="fw-medium">28.23%</small>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <i class="me-3 rounded-circle fis fi fi-in fs-4"></i>
                                  <span class="text-heading">India</span>
                                </div>
                              </td>
                              <td class="text-heading">12.58k</td>
                              <td>
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                  <div class="w-100 progress" style="height:10px;">
                                    <div class="bg-info progress-bar" role="progressbar" style="width: 14.82%" aria-valuenow="14.82" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <small class="fw-medium">14.82%</small>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <i class="me-3 rounded-circle fis fi fi-au fs-4"></i>
                                  <span class="text-heading">Australia</span>
                                </div>
                              </td>
                              <td class="text-heading">4.13k</td>
                              <td>
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                  <div class="w-100 progress" style="height:10px;">
                                    <div class="bg-warning progress-bar" role="progressbar" style="width: 12.72%" aria-valuenow="12.72" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <small class="fw-medium">12.72%</small>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <i class="me-3 rounded-circle fis fi fi-fr fs-4"></i>
                                  <span class="text-heading">France</span>
                                </div>
                              </td>
                              <td class="text-heading">2.21k</td>
                              <td>
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                  <div class="w-100 progress" style="height:10px;">
                                    <div class="bg-danger progress-bar" role="progressbar" style="width: 7.11%" aria-valuenow="7.11" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <small class="fw-medium">7.11%</small>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>6</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <i class="me-3 rounded-circle fis fi fi-ca fs-4"></i>
                                  <span class="text-heading">Canada</span>
                                </div>
                              </td>
                              <td class="text-heading">22.35k</td>
                              <td>
                                <div class="d-flex align-items-center justify-content-between gap-4">
                                  <div class="w-100 progress" style="height:10px;">
                                    <div class="bg-danger progress-bar" role="progressbar" style="width: 15.13%" aria-valuenow="7.11" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <small class="fw-medium">15.13%</small>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- Statistics End -->
                  </div>
                </div>
              </div>
              <!--/ pill table -->
              <!-- Order Statistics -->
              <div class="order-0 mb-6 col-md-6 col-lg-4 col-xl-4" style="height:  490px;">
                <div class="h-100 card">
                  <div class="d-flex justify-content-between card-header">
                    <div class="mb-0 card-title">
                      <h5 class="me-2 mb-1">Izin Statistics</h5>
                      <p class="card-subtitle">10.1k Total Izin Masuk</p>
                    </div>
                    <div class="dropdown">
                      <button class="p-0 text-body-secondary btn" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx-dots-vertical-rounded icon-base bx icon-lg"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-6">
                      <div class="d-flex flex-column align-items-center gap-1">
                        <h3 class="mb-1">195</h3>
                        <small>Total Izin Masuk 2025</small>
                      </div>
                      <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="m-0 p-0">
                      <li class="d-flex align-items-center mb-5">
                        <div class="flex-shrink-0 me-3 avatar">
                          <span class="bg-label-primary rounded avatar-initial"><i class="icon-base bx bx-mobile-alt"></i></span>
                        </div>
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 w-100">
                          <div class="me-2">
                            <h6 class="mb-0">Izin Masuk</h6>
                          </div>
                          <div class="user-progress">
                          <h6 class="mb-0">45</h6>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex align-items-center mb-5">
                        <div class="flex-shrink-0 me-3 avatar">
                          <span class="bg-label-success rounded avatar-initial"><i class="icon-base bx bx-closet"></i></span>
                        </div>
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 w-100">
                          <div class="me-2">
                            <h6 class="mb-0">Izin Diterima</h6>
                          </div>
                          <div class="user-progress">
                            <h6 class="mb-0">80</h6>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex align-items-center mb-5">
                        <div class="flex-shrink-0 me-3 avatar">
                          <span class="bg-label-info rounded avatar-initial"><i class="bx-home-alt icon-base bx"></i></span>
                        </div>
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 w-100">
                          <div class="me-2">
                            <h6 class="mb-0">Izin Ditangguhkan</h6>
                          </div>
                          <div class="user-progress">
                            <h6 class="mb-0">40</h6>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3 avatar">
                          <span class="bg-label-secondary rounded avatar-initial"><i class="icon-base bx bx-football"></i></span>
                        </div>
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 w-100">
                          <div class="me-2">
                            <h6 class="mb-0">Izin Ditolak</h6>
                          </div>
                          <div class="user-progress">
                            <h6 class="mb-0">30</h6>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--/ Order Statistics -->
            </div>

          </div>

          <?php
          include_once 'features/footer.php';
          ?>

          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>

  </div>
</body>

<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Feb 2025 17:50:26 GMT -->

</html>

<!-- beautify ignore:end -->