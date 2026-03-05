<?php
session_start();
include_once '../API/config.php'; // Include database connection
include_once '../function.php'; // Include function.php
include_once '../features/controller_user.php'; // Include controller_user.php
include_once '../features/header.php'; // Include header.php

// Cek jika pengguna belum login, redirect ke login.php
if (!isset($_SESSION['username'])) {
    header('Location: ' . BASE_URL . 'menu-a/login.php');
    exit;
}
?>

<body>

  <div class="layout-content-navbar layout-wrapper">
    <div class="layout-container">

      <!-- Menu -->

      <?php
      include_once '../features/sidebar.php';
      ?>

      <div class="rounded-1 menu-mobile-toggler d-xl-none">
        <a href="javascript:void(0);" class="p-2 rounded-1 text-bg-secondary text-large layout-menu-toggle menu-link">
          <i class="bx bx-menu icon-base"></i>
          <i class="bx-chevron-right bx icon-base"></i>
        </a>
      </div>
      <!-- / Menu -->

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

            <div class="mb-6 row g-6">
              <div class="col-sm-6 col-xl-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <?php
                      include '../API/config.php';

                      $sql = "SELECT COUNT(id) as total FROM tbluser";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();
                      $total_user = $row['total'];
                      ?>
                      <div class="content-left">
                        <span class="text-heading">Session</span>
                        <div class="d-flex align-items-center my-1">
                          <h4 class="me-2 mb-0"><?php echo $total_user; ?></h4>
                        </div>
                        <small class="mb-0">Total Users</small>
                      </div>
                      <div class="avatar">
                        <span class="bg-label-primary rounded avatar-initial">
                          <i class="bx-group icon-base bx icon-lg"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <?php

                      $sql = "SELECT COUNT(id) AS total FROM tbluser WHERE status_user = 'Aktif'";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();
                      $total_active = $row['total'];
                      ?>
                      <div class="content-left">
                        <span class="text-heading">Active Users</span>
                        <div class="d-flex align-items-center my-1">
                          <h4 class="me-2 mb-0"><?php echo $total_active; ?></h4>
                        </div>
                        <small class="mb-0">Total Users</small>
                      </div>
                      <div class="avatar">
                        <span class="bg-label-success rounded avatar-initial">
                          <i class="icon-base bx bx-user-check icon-lg"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <?php
                      // Query untuk menghitung jumlah user dengan status 0 (Non Aktif)
                      $sql = "SELECT COUNT(id) AS total FROM tbluser WHERE status_user = 'Tidak Aktif'";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();
                      $total_nonactive = $row['total'];
                      ?>
                      <div class="content-left">
                        <span class="text-heading">Non Active User</span>
                        <div class="d-flex align-items-center my-1">
                          <h4 class="me-2 mb-0"><?php echo $total_nonactive; ?></h4>
                        </div>
                        <small class="mb-0">Total Users</small>
                      </div>

                      <div class="avatar">
                        <span class="bg-label-danger rounded avatar-initial">
                          <i class="icon-base bx bx-user-x icon-lg"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <?php
                      // Query untuk menghitung jumlah user dengan status 0 (Non Aktif)
                      $sql = "SELECT COUNT(id) AS total FROM tbluser WHERE status_user = 'Pending'";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();
                      $total_pending = $row['total'];
                      ?>
                      <div class="content-left">
                        <span class="text-heading">Pending Users</span>
                        <div class="d-flex align-items-center my-1">
                          <h4 class="me-2 mb-0"><?php echo $total_pending; ?></h4>
                        </div>
                        <small class="mb-0">Total Users</small>
                      </div>
                      <div class="avatar">
                        <span class="bg-label-warning rounded avatar-initial">
                          <i class="icon-base bx bx-user-voice icon-lg"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Users List Table -->
            <div class="card">
              <div class="d-flex align-items-center justify-content-between border-bottom card-header">
                <h5 class="mb-0 card-title">Users List</h5>
                <div class="text-end col-md-4">
                  <input type="text" class="form-control" placeholder="Search User" id="searchUser" style="width: 500px; margin-left: 250px;">
                </div>
                <div class="btn-group col-lg-0" style="margin-left: 350px;">
                  <button class="btn btn-label-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="icon-base bx bx-export icon-sm" style="margin-right: 10px"></i> Export
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" id="exportPrint"><i class="me-2 bx bx-printer"></i> Print</a></li>
                    <li><a class="dropdown-item" href="#" id="exportCsv"><i class="me-2 bx bx-file"></i> Csv</a></li>
                    <li><a class="dropdown-item" href="#" id="exportExcel"><i class="me-2 bx bxs-file-export"></i> Excel</a></li>
                    <li><a class="dropdown-item" href="#" id="exportPdf"><i class="me-2 bx bxs-file-pdf"></i> Pdf</a></li>
                    <li><a class="dropdown-item" href="#" id="exportCopy"><i class="me-2 bx bx-copy"></i> Copy</a></li>
                  </ul>
                </div>
                <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                  Tambah User
                </button>
              </div>
              <div class="card-datatable">
                <table class="card-table table table-striped text-nowrap datatable">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Nomor HP/WA</th>
                      <th>Jabatan</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include '../API/config.php';

                    $sql = "SELECT 
                                tbluser.id, 
                                tbluser.username, 
                                tbluser.email, 
                                tbluser.nomorwa, 
                                tbluser.status_user, 
                                tbljabatan.jabatan_nama, 
                                tblrole.role_nama
                            FROM tbluser
                            JOIN tblrole ON tbluser.role_id = tblrole.id
                            JOIN tbljabatan ON tbluser.jabatan_id = tbljabatan.id";
                    $result = $conn->query($sql);
                    $no = 1;
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        echo "<tr role='row'>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["nomorwa"] . "</td>";
                        echo "<td>" . $row["jabatan_nama"] . "</td>";
                        echo "<td>" . $row["role_nama"] . "</td>";
                        echo "<td>" . $row["status_user"] . "</td>";
                        echo "<td>";
                        echo "<div class='dropdown'>
                          <button type='button' class='p-0 btn dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                            <i class='bx-dots-vertical-rounded bx'></i>
                          </button>
                          <div class='dropdown-menu'>
                            <a class='dropdown-item' href='#" . $row["id"] . "' title='Edit'>
                              <i class='me-1 bx bx-edit-alt'></i> Edit
                            </a>
                            <a class='dropdown-item' href='app-user-delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");' title='Hapus'>
                              <i class='me-1 bx bx-trash'></i> Hapus
                            </a>
                          </div>
                        </div>";
                        echo "</td>";
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                    }

                    $conn->close();
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- Offcanvas to add new user -->
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
                <div class="flex-grow-0 mx-0 p-6 h-100 offcanvas-body">
                  <form class="pt-0 add-new-user" action="app-user-simpan.php" method="post" enctype="multipart/form-data">
                    <label class="form-label" for="username">Username</label>
                    <div class="input-group">
                      <span class="input-group-text" id="username">@</span>
                      <input type="text" class="form-control" placeholder="Masukkan Username" aria-label="username" aria-describedby="basic-addon11" name="username" required />
                    </div>
                    <br>
                    <label class="form-label" for="email">Email</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Masukkan Email" aria-label="Email Pengguna" aria-describedby="basic-addon13" name="email" required />
                      <span class="input-group-text" id="email">@gmail.com</span>
                    </div>
                    <br>
                    <label class="form-label" for="nomorwa">Nomor WhatsApp</label>
                    <div class="input-group">
                      <span class="input-group-text">ID (+62)</span>
                      <input type="text" name="nomorwa" class="form-control phone-number-mask" placeholder="089888441111" required />
                    </div>
                    <br>
                    <div class="form-password-toggle">
                      <label class="form-label" for="basic-default-password12">Password</label>
                      <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password2" />
                        <span id="password" class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                      </div>
                    </div>
                    <br>
                    <div class="mb-6">
                      <label class="form-label" for="jabatan">Jabatan</label>
                      <select name="jabatan" class="form-select">
                        <option value="">PILIH JABATAN</option>
                        <option value="1">KEPALA DINAS</option>
                        <option value="2">SEKRETARIS</option>
                        <option value="3">KEPALA BIDANG</option>
                        <option value="4">KEPALA SEKSI</option>
                        <option value="5">STAFF PERIZINAN</option>
                        <option value="6">STAFF PELAYANAN</option>
                        <option value="7">STAFF PENGADUAN</option>
                        <option value="8">STAFF PENANAMAN MODAL </option>
                        <option value="9">STAFF IT</option>
                      </select>
                    </div>
                    <div class="mb-6">
                      <label class="form-label" for="user-role">User Role</label>
                      <select name="role" class="form-select">
                        <option value="1">SUPER ADMIN</option>
                        <option value="2">ADMIN</option>
                        <option value="3">BACKOFFICE</option>
                        <option value="4">KEPALA DINAS</option>
                        <option value="5">SEKRETARIS</option>
                        <option value="6">KEPALA BIDANG</option>
                        <option value="7">KEPALA SEKSI</option>
                      </select>
                    </div>

                    <button type="submit" class="me-3 btn btn-primary data-submit">Simpan</button>
                    <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Batal</button>

                  </form>
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