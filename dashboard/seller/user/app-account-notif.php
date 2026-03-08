<?php
session_start();
include_once '../API/config.php'; // Include database connection
include_once '../features/controller_user.php'; // Include controller_user.php
include_once '../function.php'; // Include function.php
include_once '../features/header.php'; // Include header.php

// Cek jika pengguna belum login, redirect ke login.php
if (!isset($_SESSION['username'])) {
  header('Location: ' . BASE_URL . 'menu-a/login.php');
  exit;
}
?>

<!DOCTYPE html>

<html lang="en" class="layout-menu-fixed layout-navbar-fixed layout-compact" dir="ltr" data-skin="default" data-assets-path="assets/" data-template="vertical-menu-template" data-bs-theme="light">

<body>

  <div class="layout-content-navbar layout-wrapper">
    <div class="layout-container">

      <?php
      include_once '../features/sidebar.php';
      ?>

      <div class="rounded-1 menu-mobile-toggler d-xl-none">
        <a href="javascript:void(0);" class="p-2 rounded-1 text-bg-secondary text-large layout-menu-toggle menu-link">
          <i class="bx bx-menu icon-base"></i>
          <i class="bx-chevron-right bx icon-base"></i>
        </a>
      </div>

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
              <div class="mb-0 nav-item navbar-search-wrapper">
                <a class="px-0 nav-item nav-link search-toggler" href="javascript:void(0);">
                  <span class="d-inline-block text-body-secondary fw-normal" id="autocomplete"></span>
                </a>
              </div>
            </div>
            <!-- /Search -->

            <ul class="flex-row align-items-center ms-md-auto navbar-nav">

              <!-- Style Switcher -->
              <li class="me-2 me-xl-0 nav-item dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" id="nav-theme" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <i class="icon-base bx bx-sun icon-md theme-icon-active"></i>
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
                      <span><i class="me-3 icon-base bx bx-desktop icon-md" data-icon="desktop"></i>System</span>
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
                        <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                        <small>Manage Accounts</small>
                      </div>
                    </div>
                    <div class="row-bordered overflow-visible row g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="mb-3 rounded-circle dropdown-shortcuts-icon">
                          <i class="text-heading icon-base bx bx-user icon-26px"></i>
                        </span>
                        <a href="app-user.php" class="stretched-link">User App</a>
                        <small>Manage Users</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="mb-3 rounded-circle dropdown-shortcuts-icon">
                          <i class="text-heading icon-base bx bx-check-shield icon-26px"></i>
                        </span>
                        <a href="app-akses-role.php" class="stretched-link">Role Management</a>
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
                        <a href="app-account.php" class="stretched-link">Setting</a>
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
                  <div class="avatar avatar-online">
                    <img src="<?= $base_url?>assets/img/avatars/1.png" alt class="w-px-40 rounded-circle h-auto" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="<?= $base_url?>assets/img/avatars/1.png" alt class="w-px-40 rounded-circle h-auto" />
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
                    <a class="dropdown-item" href="#">
                      <i class="me-2 bx bx-user"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
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
              <div class="col-md-12">
                <div class="nav-align-top">
                  <ul class="flex-column flex-md-row gap-2 gap-md-0 mb-6 nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link" href="app-account-settings.php"><i class="me-1_5 icon-base bx bx-user icon-sm"></i> Account</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="me-1_5 icon-base bx bx-bell icon-sm"></i> Notifications</a>
                    </li>
                  </ul>
                </div>
                <div class="card">
                  <!-- Notifications -->
                  <div class="card-body">
                    <h5 class="mb-1">Recent Devices</h5>
                    <span class="card-subtitle">We need permission from your browser to show notifications. <span class="notificationRequest"><span class="text-primary">Request Permission</span></span></span>
                    <div class="error"></div>
                  </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-nowrap">Type</th>
                          <th class="text-center text-nowrap">Email</th>
                          <th class="text-center text-nowrap">Browser</th>
                          <th class="text-center text-nowrap">App</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-heading text-nowrap">New for you</td>
                          <td>
                            <div class="d-flex align-items-center justify-content-center mb-0 form-check">
                              <input class="form-check-input" type="checkbox" id="defaultCheck1" checked />
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center justify-content-center mb-0 form-check">
                              <input class="form-check-input" type="checkbox" id="defaultCheck2" checked />
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center justify-content-center mb-0 form-check">
                              <input class="form-check-input" type="checkbox" id="defaultCheck3" checked />
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-heading text-nowrap">Account activity</td>
                          <td>
                            <div class="d-flex align-items-center justify-content-center mb-0 form-check">
                              <input class="form-check-input" type="checkbox" id="defaultCheck4" checked />
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center justify-content-center mb-0 form-check">
                              <input class="form-check-input" type="checkbox" id="defaultCheck5" checked />
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center justify-content-center mb-0 form-check">
                              <input class="form-check-input" type="checkbox" id="defaultCheck6" checked />
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-heading text-nowrap">A new browser used to sign in</td>
                          <td>
                            <div class="d-flex align-items-center justify-content-center mb-0 form-check">
                              <input class="form-check-input" type="checkbox" id="defaultCheck7" checked />
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center justify-content-center mb-0 form-check">
                              <input class="form-check-input" type="checkbox" id="defaultCheck8" checked />
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center justify-content-center mb-0 form-check">
                              <input class="form-check-input" type="checkbox" id="defaultCheck9" />
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-heading text-nowrap">A new device is linked</td>
                          <td>
                            <div class="d-flex align-items-center justify-content-center mb-0 form-check">
                              <input class="form-check-input" type="checkbox" id="defaultCheck10" checked />
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center justify-content-center mb-0 form-check">
                              <input class="form-check-input" type="checkbox" id="defaultCheck11" />
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center justify-content-center mb-0 form-check">
                              <input class="form-check-input" type="checkbox" id="defaultCheck12" />
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-body">
                    <h6 class="mb-6 text-body">When should we send you notifications?</h6>
                    <form action="javascript:void(0);">
                      <div class="row">
                        <div class="col-sm-6">
                          <select id="sendNotification" class="form-select" name="sendNotification">
                            <option selected>Only when I'm online</option>
                            <option>Anytime</option>
                          </select>
                        </div>
                        <div class="mt-6">
                          <button type="submit" class="me-3 btn btn-primary">Save changes</button>
                          <button type="reset" class="btn btn-label-secondary">Discard</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /Notifications -->
                </div>
              </div>
            </div>

          </div>
          <!-- / Content -->

          <?php
          include_once '../features/footer.php';
          ?>

          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>

  </div>

</body>

</html>