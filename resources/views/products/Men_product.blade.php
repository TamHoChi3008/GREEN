
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0-10/css/all.css" integrity="sha512-Dj9pt3sZROOuTTs9S89ykGZeu1XQgWKg3DVpu5tZALApsrWdd3tnVjTclUuVONaHM4O8GgCnjSbHlTKXrd2OWg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Template Main CSS File -->
  <link href="./frontend/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Tempo - v4.7.0
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
    .portfolio{
        margin-top: 500px;
        margin-bottom: 500px;
    }
</style> 
<br>
<section id="portfolio" class="portfolio">

              @foreach($Men_product as $key => $mens)
                <div class="col-lg-4 col-md-6 portfolio-item ">
                    <img src="./uploads/{{$mens->product_image1_link}}" class="img-fluid" alt="{{$mens->product_name}}">
                    <div class="portfolio-info">
                      <h4>{{$mens->product_name}}</h4>
                      <p>App</p>
                      <a href="./uploads/{{$mens->product_image1_link}}"  class="portfolio-lightbox preview-link" ><i class="bx bx-plus"></i></a>
                      <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                   
                </div>
          @endforeach
          {{$Men_product->links('pagination::bootstrap-4')}}
        

</section><!-- End Portfolio Section -->
