<?php 
include_once 'config.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXX"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-XXXXXXX');
  </script>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Nexvorta - Export & Import Solutions</title>
  <!-- base untuk memastikan path relatif bekerja di Firebase Hosting -->
  <base  />

  <link href="assets/img/logo_2.png" rel="icon" />
  <link href="assets/img/logo_2.png" rel="apple-touch-icon" />

  <link href="https://fonts.googleapis.com/" rel="preconnect" />
  <link href="https://fonts.gstatic.com/" rel="preconnect" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet" />

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
  <link href="assets/css/main.css" rel="stylesheet" />
</head>

<script>
  // Redirect to 404 if page not found
  window.addEventListener('load', function() {
    // Check if page returned 404 status
    if (document.readyState === 'complete') {
      fetch(window.location.href, { method: 'HEAD' })
        .then(response => {
          if (response.status === 404) {
            window.location.href = '404.html';
          }
        })
        .catch(() => {
          // If fetch fails, let the server handle it
        });
    }
  });
</script>

<body class="index-page">