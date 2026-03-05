<?php
session_start();
include_once '../API/config.php'; // Include database connection
include_once '../function.php'; // Include function.php
include_once '../features/controller_user.php'; // Include controller_user.php
include_once '../features/header.php'; // Include header.php

if (!isset($_SESSION['username'])) {
  header('Location: ' . $base_url . 'menu-a/login.php');
  exit;
}
?>
<!DOCTYPE html>

<html
  lang="en"
  class="layout-menu-fixed layout-navbar-fixed layout-compact"
  dir="ltr"
  data-skin="default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
  data-bs-theme="light">

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
                        <a href="<?=$base_url;?>app-calendar.php" class="stretched-link">Kalender</a>
                        <small>Appointments</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="mb-3 rounded-circle dropdown-shortcuts-icon">
                          <i class="text-heading icon-base bx bx-food-menu icon-26px"></i>
                        </span>
                        <a href="<?=$base_url;?>invoice-page/app-invoice-list.php" class="stretched-link">Invoice App</a>
                        <small>Manage Accounts</small>
                      </div>
                    </div>
                    <div class="row-bordered overflow-visible row g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="mb-3 rounded-circle dropdown-shortcuts-icon">
                          <i class="text-heading icon-base bx bx-user icon-26px"></i>
                        </span>
                        <a href="<?=$base_url;?>user/app-user.php" class="stretched-link">User App</a>
                        <small>Manage Users</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="mb-3 rounded-circle dropdown-shortcuts-icon">
                          <i class="text-heading icon-base bx bx-check-shield icon-26px"></i>
                        </span>
                        <a href="<?=$base_url;?>user/app-akses-role.php" class="stretched-link">Role Management</a>
                        <small>Permission</small>
                      </div>
                    </div>
                    <div class="row-bordered overflow-visible row g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="mb-3 rounded-circle dropdown-shortcuts-icon">
                          <i class="text-heading icon-base bx bx-pie-chart-alt-2 icon-26px"></i>
                        </span>
                        <a href="<?=$base_url;?>index.php" class="stretched-link">Dashboard</a>
                        <small>User Dashboard</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="mb-3 rounded-circle dropdown-shortcuts-icon">
                          <i class="text-heading icon-base bx bx-cog icon-26px"></i>
                        </span>
                        <a href="<?=$base_url;?>user/app-account.php" class="stretched-link">Setting</a>
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
                    <img src="<?=$base_url;?>assets/img/avatars/1.png" alt class="w-px-40 rounded-circle h-auto" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="<?=$base_url;?>assets/img/avatars/1.png" alt class="w-px-40 rounded-circle h-auto" />
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

            <h4 class="mb-1">Roles List</h4>

            <p class="mb-6">A role provided access to predefined menus and features so that depending on assigned role an administrator can have access to what user needs.</p>
            <!-- Role cards -->
            <div class="row g-6">
              <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                      <h6 class="mb-0 text-body fw-normal">Total 4 users</h6>
                      <ul class="avatar-group d-flex align-items-center mb-0 list-unstyled">
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Vinnie Mostowy" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/5.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Allen Rieske" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/12.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Julee Rossignol" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/6.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kaith D'souza" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/3.png" alt="Avatar" />
                        </li>
                      </ul>
                    </div>
                    <div class="d-flex align-items-end justify-content-between">
                      <div class="role-heading">
                        <h5 class="mb-1">Administrator</h5>
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
                      </div>
                      <a href="javascript:void(0);"><i class="text-body-secondary icon-base bx bx-copy icon-md"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                      <h6 class="mb-0 text-body fw-normal">Total 7 users</h6>
                      <ul class="avatar-group d-flex align-items-center mb-0 list-unstyled">
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Jimmy Ressula" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/4.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/1.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kristi Lawker" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/2.png" alt="Avatar" />
                        </li>
                        <li class="avatar">
                          <span class="rounded-circle avatar-initial pull-up" data-bs-toggle="tooltip" data-bs-placement="bottom" title="4 more">+4</span>
                        </li>
                      </ul>
                    </div>
                    <div class="d-flex align-items-end justify-content-between">
                      <div class="role-heading">
                        <h5 class="mb-1">Manager</h5>
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
                      </div>
                      <a href="javascript:void(0);"><i class="text-body-secondary icon-base bx bx-copy icon-md"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                      <h6 class="mb-0 text-body fw-normal">Total 5 users</h6>
                      <ul class="avatar-group d-flex align-items-center mb-0 list-unstyled">
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Andrew Tye" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/6.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Rishi Swaat" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/9.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Rossie Kim" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/12.png" alt="Avatar" />
                        </li>
                        <li class="avatar">
                          <span class="rounded-circle avatar-initial pull-up" data-bs-toggle="tooltip" data-bs-placement="bottom" title="2 more">+2</span>
                        </li>
                      </ul>
                    </div>
                    <div class="d-flex align-items-end justify-content-between">
                      <div class="role-heading">
                        <h5 class="mb-1">Users</h5>
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
                      </div>
                      <a href="javascript:void(0);"><i class="text-body-secondary icon-base bx bx-copy icon-md"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                      <h6 class="mb-0 text-body fw-normal">Total 3 users</h6>
                      <ul class="avatar-group d-flex align-items-center mb-0 list-unstyled">
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kim Karlos" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/3.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Katy Turner" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/9.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Peter Adward" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/4.png" alt="Avatar" />
                        </li>
                        <li class="avatar">
                          <span class="rounded-circle avatar-initial pull-up" data-bs-toggle="tooltip" data-bs-placement="bottom" title="3 more">+3</span>
                        </li>
                      </ul>
                    </div>
                    <div class="d-flex align-items-end justify-content-between">
                      <div class="role-heading">
                        <h5 class="mb-1">Support</h5>
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
                      </div>
                      <a href="javascript:void(0);"><i class="text-body-secondary icon-base bx bx-copy icon-md"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                      <h6 class="mb-0 text-body fw-normal">Total 2 users</h6>
                      <ul class="avatar-group d-flex align-items-center mb-0 list-unstyled">
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kim Merchent" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/10.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Sam D'souza" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/13.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Nurvi Karlos" class="avatar pull-up">
                          <img class="rounded-circle" src="<?=$base_url;?>assets/img/avatars/5.png" alt="Avatar" />
                        </li>
                        <li class="avatar">
                          <span class="rounded-circle avatar-initial pull-up" data-bs-toggle="tooltip" data-bs-placement="bottom" title="7 more">+7</span>
                        </li>
                      </ul>
                    </div>
                    <div class="d-flex align-items-end justify-content-between">
                      <div class="role-heading">
                        <h5 class="mb-1">Restricted User</h5>
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
                      </div>
                      <a href="javascript:void(0);"><i class="text-body-secondary icon-base bx bx-copy icon-md"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="h-100 card">
                  <div class="h-100 row">
                    <div class="col-sm-5">
                      <div class="d-flex align-items-end justify-content-center mt-4 mt-sm-0 ps-6 h-100">
                        <img src="../../assets/img/illustrations/lady-with-laptop-light.png" class="img-fluid" alt="Image" width="120" data-app-light-img="illustrations/lady-with-laptop-light.png" data-app-dark-img="illustrations/lady-with-laptop-dark.html" />
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <div class="ps-sm-0 text-sm-end text-center card-body">
                        <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="mb-4 text-nowrap add-new-role btn btn-sm btn-primary">Add New Role</button>
                        <p class="mb-0">
                          Add new role, <br />
                          if it doesn't exist.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <h4 class="mt-6 mb-1">Total users with their roles</h4>
                <p class="mb-0">Find all of your company’s administrator accounts and their associate roles.</p>
              </div>
              <div class="col-12">
                <!-- Role Table -->
                <div class="card">
                  <div class="card-datatable">
                    <div class="justify-content-between mx-3 my-0 row">
                      <div class="col-md-4">
                        <select class="form-select" id="pageLength">
                          <option value="10">10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                        </select>
                      </div>
                      <div class="text-end col-md-4">
                        <input type="text" class="form-control" placeholder="Search User" id="searchUser" style="width: 200px; margin-left: 250px;">
                      </div>
                      <div class="text-end col-md-4">
                        <div class="btn-group">
                          <button class="btn btn-label-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="icon-base bx bx-export icon-sm"></i> Export
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
                          <i class="me-2 bx bx-plus"></i> Add New User
                        </button>
                      </div>
                    </div>
                    <table class="table table-responsive mt-3 border-top datatables">
                      <thead>
                        <tr>
                          <th></th>
                          <th></th>
                          <th>User</th>
                          <th>Role</th>
                          <th>Plan</th>
                          <th>Billing</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Data akan ditambahkan di sini -->
                      </tbody>
                    </table>
                  </div>
                </div>
                <!--/ Role Table -->
              </div>
            </div>
            <!--/ Role cards -->

            <!-- Add Role Modal -->
            <!-- Add Role Modal -->
            <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
              <div class="modal-add-new-role modal-dialog modal-lg modal-simple modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="mb-6 text-center">
                      <h4 class="mb-2 role-title">Add New Role</h4>
                      <p>Set role permissions</p>
                    </div>
                    <!-- Add role form -->
                    <form id="addRoleForm" class="row g-6" onsubmit="return false">
                      <div class="form-control-validation col-12">
                        <label class="form-label" for="modalRoleName">Role Name</label>
                        <input type="text" id="modalRoleName" name="modalRoleName" class="form-control" placeholder="Enter a role name" tabindex="-1" />
                      </div>
                      <div class="col-12">
                        <h5 class="mb-6">Role Permissions</h5>
                        <!-- Permission table -->
                        <div class="table-responsive">
                          <table class="table table-flush-spacing mb-0 border-top">
                            <tbody>
                              <tr>
                                <td class="text-heading text-nowrap fw-medium">Administrator Access <i class="icon-base bx bx-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i></td>
                                <td>
                                  <div class="d-flex justify-content-end">
                                    <div class="mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="selectAll" />
                                      <label class="form-check-label" for="selectAll"> Select All </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-heading text-nowrap fw-medium">User Management</td>
                                <td>
                                  <div class="d-flex justify-content-end">
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                      <label class="form-check-label" for="userManagementRead"> Read </label>
                                    </div>
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                      <label class="form-check-label" for="userManagementWrite"> Write </label>
                                    </div>
                                    <div class="mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                      <label class="form-check-label" for="userManagementCreate"> Create </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-heading text-nowrap fw-medium">Content Management</td>
                                <td>
                                  <div class="d-flex justify-content-end">
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="contentManagementRead" />
                                      <label class="form-check-label" for="contentManagementRead"> Read </label>
                                    </div>
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="contentManagementWrite" />
                                      <label class="form-check-label" for="contentManagementWrite"> Write </label>
                                    </div>
                                    <div class="mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="contentManagementCreate" />
                                      <label class="form-check-label" for="contentManagementCreate"> Create </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-heading text-nowrap fw-medium">Disputes Management</td>
                                <td>
                                  <div class="d-flex justify-content-end">
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="dispManagementRead" />
                                      <label class="form-check-label" for="dispManagementRead"> Read </label>
                                    </div>
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="dispManagementWrite" />
                                      <label class="form-check-label" for="dispManagementWrite"> Write </label>
                                    </div>
                                    <div class="mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="dispManagementCreate" />
                                      <label class="form-check-label" for="dispManagementCreate"> Create </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-heading text-nowrap fw-medium">Database Management</td>
                                <td>
                                  <div class="d-flex justify-content-end">
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="dbManagementRead" />
                                      <label class="form-check-label" for="dbManagementRead"> Read </label>
                                    </div>
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="dbManagementWrite" />
                                      <label class="form-check-label" for="dbManagementWrite"> Write </label>
                                    </div>
                                    <div class="mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="dbManagementCreate" />
                                      <label class="form-check-label" for="dbManagementCreate"> Create </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-heading text-nowrap fw-medium">Financial Management</td>
                                <td>
                                  <div class="d-flex justify-content-end">
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="finManagementRead" />
                                      <label class="form-check-label" for="finManagementRead"> Read </label>
                                    </div>
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="finManagementWrite" />
                                      <label class="form-check-label" for="finManagementWrite"> Write </label>
                                    </div>
                                    <div class="mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="finManagementCreate" />
                                      <label class="form-check-label" for="finManagementCreate"> Create </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-heading text-nowrap fw-medium">Reporting</td>
                                <td>
                                  <div class="d-flex justify-content-end">
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="reportingRead" />
                                      <label class="form-check-label" for="reportingRead"> Read </label>
                                    </div>
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="reportingWrite" />
                                      <label class="form-check-label" for="reportingWrite"> Write </label>
                                    </div>
                                    <div class="mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="reportingCreate" />
                                      <label class="form-check-label" for="reportingCreate"> Create </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-heading text-nowrap fw-medium">API Control</td>
                                <td>
                                  <div class="d-flex justify-content-end">
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="apiRead" />
                                      <label class="form-check-label" for="apiRead"> Read </label>
                                    </div>
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="apiWrite" />
                                      <label class="form-check-label" for="apiWrite"> Write </label>
                                    </div>
                                    <div class="mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="apiCreate" />
                                      <label class="form-check-label" for="apiCreate"> Create </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-heading text-nowrap fw-medium">Repository Management</td>
                                <td>
                                  <div class="d-flex justify-content-end">
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="repoRead" />
                                      <label class="form-check-label" for="repoRead"> Read </label>
                                    </div>
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="repoWrite" />
                                      <label class="form-check-label" for="repoWrite"> Write </label>
                                    </div>
                                    <div class="mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="repoCreate" />
                                      <label class="form-check-label" for="repoCreate"> Create </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-heading text-nowrap fw-medium">Payroll</td>
                                <td>
                                  <div class="d-flex justify-content-end">
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="payrollRead" />
                                      <label class="form-check-label" for="payrollRead"> Read </label>
                                    </div>
                                    <div class="me-4 me-lg-12 mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="payrollWrite" />
                                      <label class="form-check-label" for="payrollWrite"> Write </label>
                                    </div>
                                    <div class="mb-0 form-check">
                                      <input class="form-check-input" type="checkbox" id="payrollCreate" />
                                      <label class="form-check-label" for="payrollCreate"> Create </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- Permission table -->
                      </div>
                      <div class="text-center col-12">
                        <button type="submit" class="me-1 me-sm-3 btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                      </div>
                    </form>
                    <!--/ Add role form -->
                  </div>
                </div>
              </div>
            </div>
            <!--/ Add Role Modal -->

            <!-- / Add Role Modal -->
          </div>

          <?php
          include '../features/footer.php';
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