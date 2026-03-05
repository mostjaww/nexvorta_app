<?php
session_start();
include_once 'API/config.php'; // Include database connection
include_once 'features/controller_user.php'; // Include controller_user.php
include_once 'function.php'; // Include function.php
include_once 'features/header.php'; // Include header.php

// Cek jika pengguna belum login, redirect ke login.php
if (!isset($_SESSION['username'])) {
  header('Location: menu-a/login.php');
  exit;
}
?>

<!DOCTYPE html>

<html lang="en" class="layout-menu-fixed layout-navbar-fixed layout-compact" dir="ltr" data-skin="default" data-assets-path="assets/" data-template="vertical-menu-template" data-bs-theme="light">

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

      <div class="layout-page">

        <!-- Navbar -->

        <?php
      include_once 'features/sidebar.php';
      ?>


        <!-- / Navbar -->


        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="flex-grow-1 container-p-y container-xxl">

            <div class="card app-calendar-wrapper">
              <div class="row g-0">
                <!-- Calendar Sidebar -->
                <div class="border-end col app-calendar-sidebar" id="app-calendar-sidebar">
                  <div class="my-sm-0 mb-4 p-6 border-bottom">
                    <button class="w-100 btn btn-primary btn-toggle-sidebar">
                      <i class="me-2 icon-base bx bx-plus icon-16px"></i>
                      <span class="align-middle">Add Event</span>
                    </button>
                  </div>
                  <div class="px-3 pt-2">
                    <!-- inline calendar (flatpicker) -->
                    <div class="inline-calendar"></div>
                  </div>
                  <hr class="mx-n4 mt-3 mb-6" />
                  <div class="px-6 pb-2">
                    <!-- Filter -->
                    <div>
                      <h5>Event Filters</h5>
                    </div>

                    <div class="ms-2 mb-5 form-check form-check-secondary">
                      <input class="select-all form-check-input" type="checkbox" id="selectAll" data-value="all" checked />
                      <label class="form-check-label" for="selectAll">View All</label>
                    </div>

                    <div class="text-heading app-calendar-events-filter">
                      <div class="ms-2 mb-5 form-check form-check-danger">
                        <input class="form-check-input input-filter" type="checkbox" id="select-personal" data-value="personal" checked />
                        <label class="form-check-label" for="select-personal">Personal</label>
                      </div>
                      <div class="ms-2 mb-5 form-check">
                        <input class="form-check-input input-filter" type="checkbox" id="select-business" data-value="business" checked />
                        <label class="form-check-label" for="select-business">Business</label>
                      </div>
                      <div class="ms-2 mb-5 form-check form-check-warning">
                        <input class="form-check-input input-filter" type="checkbox" id="select-family" data-value="family" checked />
                        <label class="form-check-label" for="select-family">Family</label>
                      </div>
                      <div class="ms-2 mb-5 form-check form-check-success">
                        <input class="form-check-input input-filter" type="checkbox" id="select-holiday" data-value="holiday" checked />
                        <label class="form-check-label" for="select-holiday">Holiday</label>
                      </div>
                      <div class="ms-2 form-check form-check-info">
                        <input class="form-check-input input-filter" type="checkbox" id="select-etc" data-value="etc" checked />
                        <label class="form-check-label" for="select-etc">ETC</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Calendar Sidebar -->

                <!-- Calendar & Modal -->
                <div class="col app-calendar-content">
                  <div class="shadow-none border-0 card">
                    <div class="pb-0 card-body">
                      <!-- FullCalendar -->
                      <div id="calendar"></div>
                    </div>
                  </div>
                  <div class="app-overlay"></div>
                  <!-- FullCalendar Offcanvas -->
                  <div class="offcanvas offcanvas-end event-sidebar" id="addEventSidebar">
                    <div class="border-bottom offcanvas-header">
                      <h5 class="offcanvas-title" id="addEventSidebarLabel">Add Event</h5>
                      <button type="button" class="text-reset btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <form class="pt-0 event-form" id="eventForm" onsubmit="return false">
                        <div class="mb-6 form-control-validation">
                          <label class="form-label" for="eventTitle">Title</label>
                          <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Event Title" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="eventLabel">Label</label>
                          <select class="select-event-label select2 form-select" id="eventLabel" name="eventLabel">
                            <option data-label="primary" value="Business" selected>Business</option>
                            <option data-label="danger" value="Personal">Personal</option>
                            <option data-label="warning" value="Family">Family</option>
                            <option data-label="success" value="Holiday">Holiday</option>
                            <option data-label="info" value="ETC">ETC</option>
                          </select>
                        </div>
                        <div class="mb-6 form-control-validation">
                          <label class="form-label" for="eventStartDate">Start Date</label>
                          <input type="text" class="form-control" id="eventStartDate" name="eventStartDate" placeholder="Start Date" />
                        </div>
                        <div class="mb-6 form-control-validation">
                          <label class="form-label" for="eventEndDate">End Date</label>
                          <input type="text" class="form-control" id="eventEndDate" name="eventEndDate" placeholder="End Date" />
                        </div>
                        <div class="mb-6">
                          <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input allDay-switch" id="allDaySwitch" />
                            <label class="form-check-label" for="allDaySwitch">All Day</label>
                          </div>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="eventURL">Event URL</label>
                          <input type="url" class="form-control" id="eventURL" name="eventURL" placeholder="https://www.google.com/" />
                        </div>
                        <div class="mb-4 select2-primary">
                          <label class="form-label" for="eventGuests">Add Guests</label>
                          <select class="select-event-guests select2 form-select" id="eventGuests" name="eventGuests" multiple>
                            <option data-avatar="1.png" value="Jane Foster">Jane Foster</option>
                            <option data-avatar="3.png" value="Donna Frank">Donna Frank</option>
                            <option data-avatar="5.png" value="Gabrielle Robertson">Gabrielle Robertson</option>
                            <option data-avatar="7.png" value="Lori Spears">Lori Spears</option>
                            <option data-avatar="9.png" value="Sandy Vega">Sandy Vega</option>
                            <option data-avatar="11.png" value="Cheryl May">Cheryl May</option>
                          </select>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="eventLocation">Location</label>
                          <input type="text" class="form-control" id="eventLocation" name="eventLocation" placeholder="Enter Location" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="eventDescription">Description</label>
                          <textarea class="form-control" name="eventDescription" id="eventDescription"></textarea>
                        </div>
                        <div class="d-flex justify-content-sm-between justify-content-start gap-2 mt-6">
                          <div class="d-flex">
                            <button type="submit" id="addEventBtn" class="me-4 btn btn-primary btn-add-event">Add</button>
                            <button type="reset" class="me-1 me-sm-0 btn btn-label-secondary btn-cancel" data-bs-dismiss="offcanvas">Cancel</button>
                          </div>
                          <button class="btn btn-label-danger btn-delete-event d-none">Delete</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /Calendar & Modal -->
              </div>
            </div>

          </div>
          <!-- / Content -->

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

</html>