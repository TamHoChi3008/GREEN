<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>GREEN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="./frontend/img/favicon.png" rel="icon">
  <link href="./frontend/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="./frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="./frontend/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="./frontend/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- navbar -->
    @include('pages.header')

    <!-- Main content-->
    @yield('content')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="2oOJVTd0"></script>

    <!-- Footer -->
    @include('pages.footer')

    <!-- Vendor JS Files -->
  <script src="./frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./frontend/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="./frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="./frontend/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="./frontend/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="./frontend/js/main.js"></script>
</body>
</html>