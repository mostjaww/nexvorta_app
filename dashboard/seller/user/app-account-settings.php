<?php
session_start();

$base_url = 'http://localhost/sneat/'; // Set your base URL here

include_once '../API/config.php'; // Include database connection
include_once '../features/controller_user.php'; // Include controller_user.php
include_once '../function.php'; // Include function.php
include_once '../features/header.php'; // Include header.php

// Cek jika pengguna belum login, redirect ke login.php
if (!isset($_SESSION['username'])) {
  header('Location: ' . $base_url . 'menu-a/login.php');
  exit;
}

?>

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
                    <img src="<?= $base_url ?>assets/img/avatars/1.png" alt class="w-px-40 rounded-circle h-auto" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
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
                    <a class="dropdown-item" href="<?= $base_url ?>user/app-account.php">
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
              <div class="col-md-12">
                <div class="nav-align-top">
                  <ul class="flex-column flex-md-row gap-2 gap-md-0 mb-6 nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="me-1_5 icon-base bx bx-user icon-sm"></i> Account</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= $base_url ?>user/app-account-notif.php"><i class="me-1_5 icon-base bx bx-bell icon-sm"></i> Notifications</a>
                    </li>
                  </ul>
                </div>
                <div class="mb-6 card">
                  <!-- Account -->
                  <div class="card-body">
                    <?php if (!empty($notif)) echo $notif; ?>
                    <div class="d-flex align-items-sm-center align-items-start gap-6 pb-4 border-bottom">
                      <img src="<?= $base_url ?>assets/img/avatars/1.png" alt="user-avatar" class="d-block h-px-100 w-px-100 rounded" id="uploadedAvatar" />
                      <div class="button-wrapper">
                        <label for="upload" class="me-3 mb-4 btn btn-primary" tabindex="0">
                          <span class="d-sm-block d-none">Upload foto</span>
                          <i class="d-block d-sm-none icon-base bx bx-upload"></i>
                          <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                        </label>
                        <button type="button" class="mb-4 btn btn-label-secondary account-image-reset">
                          <i class="d-block d-sm-none icon-base bx bx-reset"></i>
                          <span class="d-sm-block d-none">Reset</span>
                        </button>

                        <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
                      </div>
                    </div>
                  </div>
                  <div class="pt-4 card-body">
                    <!-- Ganti action ke app-account-update.php dan method POST -->
                    <form id="formAccountSettings" method="POST" action="app-account-update.php" class="row g-3 needs-validation">
                      <?php
                        $username = $_SESSION['username'];
                        $query = "SELECT * FROM tbluser WHERE username = '$username'";
                        $result = mysqli_query($conn, $query);

                        // Periksa apakah ada hasil
                        if ($result && mysqli_num_rows($result) > 0) {
                        $r = mysqli_fetch_assoc($result); // Ambil data user ke array

                        // Ambil data profile berdasarkan user id
                        $user_id = $r['id'];
                        $query_profile = "SELECT * FROM tblprofile WHERE user_id = '$user_id'";
                        $result_profile = mysqli_query($conn, $query_profile);
                        if ($result_profile && mysqli_num_rows($result_profile) > 0) {
                          $profile = mysqli_fetch_assoc($result_profile);
                          // Gabungkan data profile ke array $r jika diperlukan
                          $r = array_merge($r, $profile);
                        }
                        } else {
                        echo "User tidak ditemukan.";
                        exit;
                        }
                      ?>
                      <div class="row g-6">
                        <div class="form-control-validation col-md-6">
                          <label for="nama_depan" class="form-label">Nama Depan</label>
                            <input class="form-control" type="text" id="nama_depan" name="nama_depan"
                            placeholder="<?php echo empty($r['nama_depan']) ? htmlspecialchars($r['username']) : 'Nama Depan'; ?>"
                            value="<?php echo !empty($r['nama_depan']) ? htmlspecialchars($r['nama_depan']) : htmlspecialchars($r['username']); ?>" />
                        </div>
                        <div class="form-control-validation col-md-6">
                          <label for="nama_belakang" class="form-label">Nama Belakang</label>
                          <input class="form-control" type="text" name="nama_belakang" id="nama_belakang" placeholder="<?php echo empty($r['nama_belakang']) ? 'Masukkan Nama Belakang' : 'Nama Belakang'; ?>" 
                            value="<?php echo htmlspecialchars($r['nama_belakang'] ?? ''); ?>" />
                        </div>
                        <div class="col-md-6">
                          <label for="username" class="form-label">Username</label>
                          <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($r['username']) ?>" disabled />
                        </div>
                        <div class="col-md-6">
                          <label for="email" class="form-label">E-mail</label>
                          <input class="form-control" type="text" id="email" name="email" value="<?php echo htmlspecialchars($r['email']) ?>" disabled />
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="nomorwa">Nomor WhatsApp</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text">ID (+62)</span>
                            <input type="text" id="nomorwa" name="nomorwa" class="form-control" value="<?php echo htmlspecialchars(ltrim($r['nomorwa'], '0')) ?>" disabled />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="alamat" class="form-label">Address</label>
                          <input type="text" class="form-control" id="alamat" name="alamat" 
                            placeholder="<?php echo empty($r['alamat']) ? 'Masukkan alamat' : 'Alamat'; ?>" 
                            value="<?php echo htmlspecialchars($r['alamat'] ?? ''); ?>" />
                        </div>
                        <div class="col-md-6">
                          <label for="provinsi" class="form-label">Provinsi</label>
                          <select id="provinsi" name="provinsi" class="form-select" placeholder="<?php echo empty($r['provinsi']) ? '' : ''; ?>" 
                            value="<?php echo htmlspecialchars($r['provinsi'] ?? ''); ?>" >
                            <option value="">Pilih Provinsi</option>
                            <?php
                            $provinsi_selected = $r['provinsi'] ?? '';
                            $result_provinsi = mysqli_query($conn, "SELECT id, name FROM trprovinsi ORDER BY name ASC");
                            while ($row = mysqli_fetch_assoc($result_provinsi)) {
                              $selected = ($row['id'] == $provinsi_selected) ? 'selected' : '';
                              echo "<option value='{$row['id']}' $selected>" . htmlspecialchars($row['name']) . "</option>";
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="kabupaten" class="form-label">Kabupaten/Kota</label>
                          <select id="kabupaten" name="kabupaten" class="form-select" placeholder="<?php echo empty($r['kabupaten']) ? '' : ''; ?>" 
                            value="<?php echo htmlspecialchars($r['kabupaten'] ?? ''); ?>" >
                            <option value="">Pilih Kabupaten/Kota</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="kecamatan" class="form-label">Kecamatan/Desa</label>
                          <select id="kecamatan" name="kecamatan" class="form-select" placeholder="<?php echo empty($r['kecamatan']) ? '' : ''; ?>" 
                            value="<?php echo htmlspecialchars($r['kecamatan'] ?? ''); ?>" >
                            <option value="">Pilih Kecamatan/Desa</option>
                          </select>
                        </div>
                        <?php
                        $all_kabupaten = [];
                        $all_kecamatan = [];

                        // Kabupaten
                        $qkab = mysqli_query($conn, "SELECT id, name, province_id FROM trkabupaten");
                        while ($row = mysqli_fetch_assoc($qkab)) $all_kabupaten[] = $row;

                        // Kecamatan
                        $qkec = mysqli_query($conn, "SELECT id, name, regency_id FROM trkecamatan");
                        while ($row = mysqli_fetch_assoc($qkec)) $all_kecamatan[] = $row;
                        ?>

                        <script>
                          document.addEventListener('DOMContentLoaded', function() {
                            const allKabupaten = <?= json_encode($all_kabupaten); ?>;
                            const allKecamatan = <?= json_encode($all_kecamatan); ?>;

                            const provinsiSelect = document.getElementById('provinsi');
                            const kabupatenSelect = document.getElementById('kabupaten');
                            const kecamatanSelect = document.getElementById('kecamatan');

                            function populateKabupaten(provinceId, selectedKab = '') {
                              kabupatenSelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
                              allKabupaten.forEach(item => {
                                if (item.province_id == provinceId) {
                                  const opt = document.createElement('option');
                                  opt.value = item.id;
                                  opt.text = item.name;
                                  if (item.id == selectedKab) opt.selected = true;
                                  kabupatenSelect.appendChild(opt);
                                }
                              });
                              kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan/Desa</option>';
                            }

                            function populateKecamatan(kabupatenId, selectedKec = '') {
                              kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan/Desa</option>';
                              allKecamatan.forEach(item => {
                                if (item.regency_id == kabupatenId) {
                                  const opt = document.createElement('option');
                                  opt.value = item.id;
                                  opt.text = item.name;
                                  if (item.id == selectedKec) opt.selected = true;
                                  kecamatanSelect.appendChild(opt);
                                }
                              });
                            }

                            // Listener on change
                            provinsiSelect.addEventListener('change', () => {
                              populateKabupaten(provinsiSelect.value);
                            });

                            kabupatenSelect.addEventListener('change', () => {
                              populateKecamatan(kabupatenSelect.value);
                            });

                            // Isi awal saat load halaman
                            const selectedProvinsi = "<?= $r['provinsi'] ?? '' ?>";
                            const selectedKabupaten = "<?= $r['kabupaten'] ?? '' ?>";
                            const selectedKecamatan = "<?= $r['kecamatan'] ?? '' ?>";

                            if (selectedProvinsi) {
                              provinsiSelect.value = selectedProvinsi;
                              populateKabupaten(selectedProvinsi, selectedKabupaten);
                              if (selectedKabupaten) {
                                populateKecamatan(selectedKabupaten, selectedKecamatan);
                              }
                            }
                          });
                        </script>
                        <div class="col-md-6">
                          <label class="form-label" for="negara">Negara</label>
                          <select id="negara" name="negara" class="form-select select2" placeholder="<?php echo empty($r['negara']) ? '' : 'Alamat'; ?>" 
                            value="<?php echo htmlspecialchars($r['negara'] ?? ''); ?>" >
                            <option value="">Pilih Negara</option>
                            <?php
                            $negara_selected = isset($r['negara']) ? $r['negara'] : '';
                            $query_negara = "SELECT country_name FROM trnegara ORDER BY country_name ASC";
                            $result_negara = mysqli_query($conn, $query_negara);
                            if ($result_negara) {
                              while ($row_negara = mysqli_fetch_assoc($result_negara)) {
                                $selected = ($row_negara['country_name'] == $negara_selected) ? 'selected' : '';
                                echo '<option value="' . htmlspecialchars($row_negara['country_name']) . '" ' . $selected . '>' . htmlspecialchars($row_negara['country_name']) . '</option>';
                              }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="kode_pos" class="form-label">Kode Pos</label>
                          <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="20143" maxlength="6" placeholder="<?php echo empty($r['kode_pos']) ? '20143' : ''; ?>" 
                            value="<?php echo htmlspecialchars($r['kode_pos'] ?? ''); ?>" />
                        </div>
                        <div class="col-md-6">
                          <label for="bahasa" class="form-label">Bahasa</label>
                          <select id="bahasa" name="bahasa" class="form-select select2" placeholder="<?php echo empty($r['bahasa']) ? '' : ''; ?>" 
                            value="<?php echo htmlspecialchars($r['bahasa'] ?? ''); ?>" >
                            <option value="">Pilih Bahasa</option>
                            <?php
                            $languages = [
                              "English" => "English",
                              "Spanish" => "Spanish",
                              "Arabic" => "Arabic",
                              "Chinese" => "Chinese",
                              "Russian" => "Russian",
                              "Japanese" => "Japanese",
                              "Korean" => "Korean",
                              "Italian" => "Italian",
                              "Hindi" => "Hindi",
                              "Turkish" => "Turkish",
                              "Vietnamese" => "Vietnamese",
                              "French" => "French",
                              "Deutsch" => "German",
                              "Indonesia" => "Indonesia",
                              "Portuguese" => "Portuguese"
                            ];
                            $selected_bahasa = $r['bahasa'] ?? '';
                            foreach ($languages as $value => $label) {
                              $selected = ($selected_bahasa == $value) ? 'selected' : '';
                              echo "<option value=\"$value\" $selected>$label</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="mt-6">
                        <button type="submit" class="me-3 btn btn-primary">Simpan Perubahan</button>
                      </div>
                    </form>
                  </div>
                  <!-- /Account -->
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