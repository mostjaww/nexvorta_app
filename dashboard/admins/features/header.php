<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/sneat/API/config.php';
?>

<!DOCTYPE html>

<html lang="id" class="layout-menu-fixed layout-navbar-fixed layout-compact" dir="ltr" data-skin="default" data-assets-path="assets/" data-template="vertical-menu-template" data-bs-theme="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Backoffice Perizinan</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src = '../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5DDHKGP');
  </script>

  <link rel="icon" type="image/x-icon" href="<?php echo $base_url; ?>assets/img/icons/brands/logo_deliserdang.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/fonts/iconify-icons.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/pickr/pickr-themes.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/css/core.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/demo.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/fonts/flag-icons.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/apex-charts/apex-charts.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/fullcalendar/fullcalendar.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/flatpickr/flatpickr.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/select2/select2.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/quill/editor.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/%40form-validation/form-validation.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/css/pages/app-calendar.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/animate-css/animate.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/sweetalert2/sweetalert2.css" />
  <script src="<?php echo $base_url; ?>assets/vendor/js/helpers.js"></script>
  <script src="<?php echo $base_url; ?>assets/vendor/js/template-customizer.js"></script>
  <script src="<?php echo $base_url; ?>assets/js/config.js"></script>
  <!-- <script>
    document.addEventListener("contextmenu", function(e) {
      e.preventDefault();
    });

    document.addEventListener("keydown", function(e) {
      if (e.ctrlKey && (e.key === "u" || e.key === "U" ||
          e.key === "i" || e.key === "I" ||
          e.key === "j" || e.key === "J" ||
          e.key === "c" || e.key === "C" ||
          e.key === "s" || e.key === "S")) {
        e.preventDefault();
      }
    });
  </script> -->
</head>