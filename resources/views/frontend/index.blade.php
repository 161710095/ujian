<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Istana Helmet-Home</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--===============================================================================================-->
      <link rel="icon" type="image/png" href="{{asset('asets/images/icons/favicon.png')}}"/>
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('asets/vendor/bootstrap/css/bootstrap.min.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('asets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('asets/fonts/themify/themify-icons.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('asets/vendor/animate/animate.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('asets/vendor/css-hamburgers/hamburgers.min.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('asets/vendor/animsition/css/animsition.min.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('asets/vendor/select2/select2.min.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('asets/vendor/daterangepicker/daterangepicker.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('asets/vendor/slick/slick.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('asets/vendor/lightbox2/css/lightbox.min.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('asets/css/util.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('asets/css/main.css')}}">
      <!--===============================================================================================-->
  	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

<!-- Owl Carousel -->
<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

<!-- Magnific Popup -->
<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="css/style.css" />


    </head>
   <body class="animsition">
      <!-- Header -->
      <header>
         <!-- Header desktop -->
         <div class="wrap-menu-header gradient1 trans-0-4">
         <div class="container h-full">
         <div class="wrap_header trans-0-3">
         <!-- Logo -->
         <div class="logo">
            <a href="index.html">
            <img src="img/logo.png" alt="IMG-LOGO" data-logofixed="img/logoo.png">
            </a>
         </div>
         <!-- Menu -->
         <div class="wrap_menu p-l-45 p-l-0-xl">
            <nav class="menu">
               <ul class="main_menu">
                  <li>
                     <a href="/index">Home</a>
                  </li>
                  <li>
                     <a href="/gallery">Produk</a>
                  </li>
                  <li>
                     <a href="/about">Tentang</a>
                  </li>
                  <li>
                     <a href="/blog">Artikel</a>
                  </li>
                  <li>
                     <a href="/kontak">Kontak</a>
                  </li>
               </ul>
            </nav>
         </div>
      </header>
      <!-- Slide1 -->
      <section class="section-slide">
         <div class="wrap-slick1">
            <div class="slick1">
               <div class="item-slick1 item1-slick1" style="background-image: url(img/iss.jpg);">
                  <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                     <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                     Selamat Datang Di
                     </span>
                     <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                        Istana Helmet
                     </h2>
                     <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                     </div>
                  </div>
               </div>
               <div class="item-slick1 item2-slick1" style="background-image: url(img/is2.jpeg);">
                  <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                     <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
                     Website Istana Helmet
                     </span>
                     <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                        Bandung
                     </h2>
                     <div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
                        <!-- Button1 -->
                     </div>
                  </div>
               </div>
               <div class="item-slick1 item3-slick1" style="background-image: url(img/iss3.jpg);">
                  <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                     <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                     Harga kaki 5
                     </span>
                     <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                        kualitas bintang 5 
                     </h2>
                     <div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
                        <!-- Button1 -->
                     </div>
                  </div>
               </div>
            </div>
            <div class="wrap-slick1-dots"></div>
         </div>
      </section>
      <!-- Welcome -->
      @php
      $t = App\Tentang::all();
      @endphp
      <section class="section-welcome bg1-pattern p-t-120 p-b-105">
         <div class="container">
            <div class="row">
               @foreach($t as $data)
               <div class="col-md-6 p-t-45 p-b-30">
                  <div class="wrap-text-welcome t-center">
                     <span class="tit2 t-center">
                     Selamat Datang di website
                     </span>
                     <h3 class="tit3 t-center m-b-35 m-t-5">
                        {!!$data->judul!!}
                     </h3>
                     <p class="t-center m-b-22 size3 m-l-r-auto">
                        {!!$data->deskripsi!!}
                     </p>
                  </div>
                  @endforeach
               </div>
               <div class="col-md-6 p-b-30">
                  <div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto">
                     <img src="img/is.jpeg" alt="IMG-OUR">
                  </div>
               </div>
            </div>
         </div>
      </section>

  <!-- Testimonial -->
  @php
      $testi = App\Testimoni::all();
      @endphp
      <section class="section-review p-t-115">
		<!-- - -->
		<div class="title-review t-center m-b-2">
			<span class="tit2 p-l-15 p-r-15">
			Testimoni
			</span>

			<h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">

			</h3>
		</div>

	<div id="testimonial" class="section md-padding">

<!-- Background Image -->
<div class="bg-img" style="background-image: url('./img/iss2.jpeg');">
  <div class="overlay"></div>
</div>
<!-- /Background Image -->

<!-- Container -->
<div class="container">

  <!-- Row -->
  <div class="row">

    <!-- Testimonial slider -->
    <div class="col-md-10 col-md-offset-1">
      <div id="testimonial-slider" class="owl-carousel owl-theme">

        <!-- testimonial -->
        @foreach($testi as $data)
        <div class="testimonial">
          <div class="testimonial-meta">
            <img src="{{asset('/gambar/testi/'.$data->gambar.'')}}" alt="">
            <h3 class="white-text">{!!$data->nama!!}</h3>
            <span>Konsumen</span>
          </div>
          <p class="white-text">{!!$data->testi!!}</p>
        </div>
        @endforeach
        <!-- /testimonial -->
      </div>
    </div>
    <!-- /Testimonial slider -->

  </div>
  <!-- /Row -->

</div>
<!-- /Container -->

</div>
<!-- /Testimonial -->

      <!-- Footer -->
      <footer class="bg1">
		<div class="container p-t-40 p-b-70">
			<div class="row">
				<div class="col-sm-6 col-md-4 p-t-50">
					<!-- - -->
					<h4 class="txt13 m-b-33">
						Kontak
					</h4>

					<ul class="m-b-70">
						<li class="txt14 m-b-14">
							<i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
							Jl. Astanaanyar No.210, Nyengseret, Astanaanyar, Kota Bandung, Jawa Barat 40242
							</li>

						<li class="txt14 m-b-14">
							<i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
							(022) 5228404
						</li>

						<li class="txt14 m-b-14">
							<i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
							Istanahelmet@site.com
						</li>
					</ul>

					<!-- - -->
					<h4 class="txt13 m-b-32">
					Buka Jam:
					</h4>

					<ul>
						<li class="txt14">
						08:00 – 18:00
						</li>

						<li class="txt14">
						Setiap Hari
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-md-4 p-t-50">
					<!-- - -->
					<h4 class="txt13 m-b-33">
						Latest twitter
					</h4>

					<div class="m-b-25">
						<span class="fs-13 color2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</span>
						<a href="#" class="txt15">
							@colorlib
						</a>

						<p class="txt14 m-b-18">
							Activello is a good option. It has a slider built into that displays the featured image in the slider.
							<a href="#" class="txt15">
								https://buff.ly/2zaSfAQ
							</a>
						</p>

						<span class="txt16">
							21 Dec 2017
						</span>
					</div>

					<div>
						<span class="fs-13 color2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</span>
						<a href="#" class="txt15">
							@colorlib
						</a>

						<p class="txt14 m-b-18">
							Activello is a good option. It has a slider built into that displays
							<a href="#" class="txt15">
								https://buff.ly/2zaSfAQ
							</a>
						</p>

						<span class="txt16">
							21 Dec 2017
						</span>
					</div>
				</div>

				<div class="col-sm-6 col-md-4 p-t-50">
					<!-- - -->
					<h4 class="txt13 m-b-38">
						Gallery
					</h4>

					<!-- Gallery footer -->
					<div class="wrap-gallery-footer flex-w">
						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-01.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-01.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-02.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-02.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-03.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-03.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-04.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-04.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-05.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-05.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-06.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-06.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-07.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-07.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-08.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-08.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-09.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-09.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-10.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-10.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-11.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-11.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-12.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-12.jpg" alt="GALLERY">
						</a>
					</div>

				</div>
			</div>
		</div>

		<div class="end-footer bg2">
			<div class="container">
				<div class="flex-sb-m flex-w p-t-22 p-b-22">
					<div class="p-t-5 p-b-5">
						<a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
						<a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
						<a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
					</div>

					<div class="txt17 p-r-20 p-t-5 p-b-5">
						Copyright &copy; 2018 All rights reserved  |  This template is made with <i class="fa fa-heart"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
      <!-- Back to top -->
      <div class="btn-back-to-top bg0-hov" id="myBtn">
         <span class="symbol-btn-back-to-top">
         <i class="fa fa-angle-double-up" aria-hidden="true"></i>
         </span>
      </div>
      <!-- Container Selection1 -->
      <div id="dropDownSelect1"></div>
      <!-- Modal Video 01-->
      <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>
            <div class="wrap-video-mo-01">
               <div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
               <div class="video-mo-01">
                  <iframe src="https://www.youtube.com/embed/5k1hSu2gdKE?rel=0&amp;showinfo=0" allowfullscreen></iframe>
               </div>
            </div>
         </div>
      </div>
      <!--===============================================================================================-->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
      <script type="text/javascript" src="js/main.js"></script>

      <script type="text/javascript" src="{{asset('asets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
      <!--===============================================================================================-->
      <script type="text/javascript" src="{{asset('asets/vendor/animsition/js/animsition.min.js')}}"></script>
      <!--===============================================================================================-->
      <script type="text/javascript" src="{{asset('asets/vendor/bootstrap/js/popper.js')}}"></script>
      <script type="text/javascript" src="{{asset('asets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
      <!--===============================================================================================-->
      <script type="text/javascript" src="{{asset('asets/vendor/select2/select2.min.js')}}"></script>
      <!--===============================================================================================-->
      <script type="text/javascript" src="{{asset('asets/vendor/daterangepicker/moment.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('asets/vendor/daterangepicker/daterangepicker.js')}}"></script>
      <!--===============================================================================================-->
      <script type="text/javascript" src="{{asset('asets/vendor/slick/slick.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('asets/js/slick-custom.js')}}"></script>
      <!--===============================================================================================-->
      <script type="text/javascript" src="{{asset('asets/vendor/parallax100/parallax100.js')}}"></script>
      <script type="text/javascript">
         $('.parallax100').parallax100();
      </script>
      <!--===============================================================================================-->
      <script type="text/javascript" src="{{asset('asets/vendor/countdowntime/countdowntime.js')}}"></script>
      <!--===============================================================================================-->
      <script type="text/javascript" src="{{asset('asets/vendor/lightbox2/js/lightbox.min.js')}}"></script>
      <!--===============================================================================================-->
      <script src="{{asset('asets/js/main.js')}}"></script>
   </body>
</html>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
   var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
   (function(){
   var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
   s1.async=true;
   s1.src='https://embed.tawk.to/5bb6d18fb033e9743d0260f6/default';
   s1.charset='UTF-8';
   s1.setAttribute('crossorigin','*');
   s0.parentNode.insertBefore(s1,s0);
   })();
</script>
<!--End of Tawk.to Script-->