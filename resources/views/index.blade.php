<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous"> <!-- ini sebenernya css fontawesome jg bedanya online jd perlu integrity sm crossorigin

    <title> ActiveWell</title>
    <!--

id dan class untuk memberi tanda id condong digunakan di html sedangkan class di css

terkadang nama class itu sudah di set untuk bisa menggunakan css online atau bootsrap (hasil tampilan class sesuai seperti di source)
contohnya class di icon twitter di footer untuk menggunakannya kita harus beri nama classnya fab fa-twitter
-->
    <!-- Additional CSS Files ini semua lokal udah di download -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('css/templatemo-training-studio.css') }}">

</head>

<body>

    <!-- ***** Preloader Start ***** loading membuka web -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span> <!--  titik-titik loading -->
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">Active<em> Well</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav" style="display: flex;justify-content: center;align-items: center;">
                            <!-- <li class="scroll-to-section"><a href="#features" class="active">My Fitness Journey</a></li> -->
                            <!-- <li class="scroll-to-section"><a href="#our-classes">Workout Programs</a></li> -->
                            <li class="scroll-to-section"><a href="/video">Workout Video</a></li>
                            <li class="scroll-to-section"><a href="/recipe">Recipes</a></li>
                            <li class="scroll-to-section"><a href="/about">About</a></li>
                            <li class="main-button">
                        
    @if (Auth::check())
        <!-- Jika sudah login, tampilkan nama pengguna dan tombol dropdown -->
        <div class="dropdown">
            <button class="dropbtn" onclick="toggleDropdown()">More Option</button>
            <div class="dropdown-content" id="dropdownContent">
                <a href="/das_user" style="border: 1px solid white;display: flex;justify-content: center;align-items: center;">Account</a>
                <a href="{{ route('logout') }}" style="border: 1px solid white;display: flex;justify-content: center;align-items: center;">Logout</a>
            </div>
        </div>
    @else
        <!-- Jika belum login, tampilkan tombol Sign In -->
        <a href="/signin">Sign In</a>
    @endif
</li>

<script>
    function toggleDropdown() {
        var dropdown = document.getElementById('dropdownContent');
        if (dropdown.style.display === 'none' || dropdown.style.display === '') {
            dropdown.style.display = 'block';
        } else {
            dropdown.style.display = 'none';
        }
    }
</script>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <img src="{{ asset('images/bgchange1.jpg') }}" alt="bg" style="width: 100%; height:100vh">

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Where Progress Matters</h6>
                <h2>Your <em>Fitness</em> Awaits</h2>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Our <em>Features</em></h2>
                        <img src="{{ asset('images/line-dec.png') }}" alt="waves" >
                        <p>Active Well adalah platform penyedia informasi dan rekomendasi untuk workout di rumah.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/recipe-book.png') }}" alt="training fifth"
                                    style="height: 20%; width: 20%;"> 
                            <div class="right-content">
                                <h4>Recipes</h4>
                                <p>Menyediakan berbagai resep masakan sehat untuk mendukung program workout anda.</p>
                            </div>
                        </li>
                        <!-- <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/calendar.png') }}" alt="First One" style="height: 20%; width: 20%;">
                            </div>
                            <div class="right-content">
                                <h4>My Fitness Journey</h4>
                                <p>Menampilkan progres harian program workout yang anda pilih.</p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/workout.png') }}" alt="second one" style="height: 20%; width: 20%;">
                            </div>
                            <div class="right-content">
                                <h4>Workout Programs</h4>
                                <p>Memberikan berbagai pilihan program workout sesuai sesuai pilihan dan kebutuhan anda.
                                </p>
                            </div>
                        </li> -->
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/tutorial.png') }}" alt="fourth muscle"
                                    style="height: 20%; width: 20%;">
                            </div>
                            <div class="right-content">
                                <h4>Workout Video</h4>
                                <p>Berisi kumpulan video berbagai macam gerakan workout yang dapat diterapkan di rumah.
                                </p>
                            </div>
                        </li>
                        <!-- <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/recipe-book.png') }}" alt="training fifth"
                                    style="height: 20%; width: 20%;"> 
                            </div>
                            <div class="right-content">
                                <h4>Recipes</h4>
                                <p>Menyediakan berbagai resep masakan sehat untuk mendukung program workout anda.</p>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section" id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Don’t <em>think</em>, begin <em>today</em>!</h2>
                        <p></p>
                        <div class="main-button scroll-to-section">
                            <a href="/signin">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Our <em>Classes</em></h2>
                        <img src="{{ asset('images/line-dec.png') }}" alt="">
                        <p>Memberi berbagai pilihan kategori program sesuai dengan kebutuhan.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'><img src="{{ asset('images/man.png') }}" alt=""
                                    style="height: 35px; width: 35px;">Beginner Friendly </a></li>
                        <li><a href='#tabs-2'><img src="{{ asset('images/battle-rope.png') }}" alt=""
                                    style="height: 35px; width: 35px;">Moderate to Advanced</a></a></li>
                        <li><a href='#tabs-3'><img src="{{ asset('images/weight-loss.png') }}" alt=""
                                    style="height: 35px; width: 35px;">Weight Loss</a></a></li>
                        <li><a href='#tabs-4'><img src="{{ asset('images/abs.png') }}" alt=""
                                    style="height: 35px; width: 35px;">Abs</a></a></li>
                        <li><a href='#tabs-5'><img src="{{ asset('images/strength.png') }}" alt=""
                                    style="height: 35px; width: 35px;">Strength Training</a></a></li>
                        <!-- <div class="main-rounded-button"><a href="#">View All Schedules</a></div> -->
                    </ul>
                </div>
                <div class="col-lg-8">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <img src="{{ asset('images/training-image-01.jpg') }}" alt="Beginner Friendly">
                            <h4>Beginner Friendly</h4>
                            <p>Ingin memulai perjalanan kebugaran Anda? Cobalah salah satu program ramah pemula ini!</p>
                            <!-- <div class="main-button">
                                <a href="#">View Schedule</a>
                            </div> -->
                        </article>
                        <article id='tabs-2'>
                            <img src="{{ asset('images/training-image-02.jpg') }}" alt="Moderate To Advanced">
                            <h4>Moderate To Advanced</h4>
                            <p>Jika Anda mencari sesuatu yang mendorong Anda lebih keras, 
                                cobalah salah satu tantangan tingkat menengah hingga lanjutan berikut untuk membantu Anda maju lebih jauh.</p>
                            <!-- <div class="main-button">
                                <a href="#">View Schedule</a> -->
                            <!-- </div> -->
                        </article>
                        <article id='tabs-3'>
                            <img src="{{ asset('images/training-image-03.jpg') }}" alt="Weight Loss">
                            <h4>Weight Loss</h4>
                            <p>Mulailah perjalanan penurunan berat badan Anda dengan salah satu tantangan berintensitas tinggi dan akan membuat Anda berkeringat!</p>
                            <!-- <div class="main-button">
                                <a href="#">View Schedule</a>
                            </div> -->
                        </article>
                        <article id='tabs-4'>
                            <img src="{{ asset('images/training-image-04.jpg') }}" alt="Abs">
                            <h4>Abs</h4>
                            <p>Perut Anda akan mencintaimu dan membenci Anda pada saat yang sama! Cobalah salah satu dari program latihan yang berfokus pada inti ini.</p>
                            <!-- <div class="main-button"> -->
                                <!-- <a href="#">View Schedule</a> -->
                            <!-- </div> -->
                        </article>
                        <article id='tabs-5'>
                            <img src="{{ asset('images/training-image-01.jpg') }}" alt="Strength Training">
                            <h4>Strength Training</h4>
                            <p>Jika Anda ingin melatih kekuatan Anda, lihatlah program berbasis resistensi ini. 
                                Active Well merekomendasikan untuk memiliki resistance band dan berbagai dumbel ringan, sedang, dan berat,</p>
                            <!-- <div class="main-button">
                                <a href="#">View Schedule</a>
                            </div> -->
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->

    <!-- ***** Workout Video Start ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Workout <em>Video</em></h2>
                        <img src="{{ asset('images/line-dec.png') }}" alt="">
                        <p>Menyediakan kumpulan video dengan berbagai kategori yang dapat diterapkan di rumah. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <a href="https://www.youtube.com/watch?v=2MoGxae-zyo">
                                <img
                                    src="https://static.chloeting.com/videos/61bbdc7e2cb3b78eb6ac2bba/efca6f80-5ed1-11ec-b182-df31ae6aab45.jpeg">
                            </a>
                        </div>
                        <div class="down-content">
                            <span>Lose Weight</span>
                            <h4>Do This Everyday to Lose Weight</h4>
                            <p>Lakukan gerakan ini untuk membantu menurunkan berat badan anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <a href="https://www.youtube.com/watch?v=-p0PA9Zt8zk">
                                <img
                                    src="https://static.chloeting.com/videos/61bbf59552c5c9bf0f2550eb/e43a1620-5ee0-11ec-9a04-3fd984621d67.jpeg">
                            </a>
                        </div>
                        <div class="down-content">
                            <span>Warm up</span>
                            <h4>Warm Up Routine</h4>
                            <p>Lakukan gerakan pemanasan ini sebelum anda melakukan workout.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <a href="https://www.youtube.com/watch?v=6TmQiugy_qw">
                            <img
                                src="https://static.chloeting.com/videos/61bbd89dc3d293024898b84d/9ff668d0-5ecf-11ec-b8cd-2976cd667d03.jpeg">
                        </a>
                        <div class="down-content">
                            <span>Abs</span>
                            <h4>11 Line Abs</h4>
                            <p>Dapatkan 11 Garis Abs dalam 35 hari.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Workout Video Ends ***** -->

    <!-- ***** Workout Recipe Ends ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Workout Fo<em>od Recipe</em></h2>
                        <img src="{{ asset('images/line-dec.png') }}" alt="">
                        <p>Memberi berbagai resep masakan untuk mendukung program workout anda.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="https://static.chloeting.com/recipes/6200d5a52e702a81e5803c59/images/baked-avocado-eggs-1.webp"
                                alt="" style="height: 50vh; width: 100%;">
                        </div>
                        <div class="down-content">
                            <span>Featured Recipes</span>
                            <h4>Baked Avocado Eggs</h4>
                            <p>Hidangan makan siang yang luar biasa memanjakan, telur panggang dalam alpukat ini cepat, lezat, dan bergizi.
                                Hidangkan dengan roti panggang agar lebih nikmmat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="https://static.chloeting.com/recipes/627605807a2bc9cd25c38ebf/images/banana-oatmeal-pancakes-2.webp"
                                alt="" style="height: 50vh; width: 100%;">
                        </div>
                        <div class="down-content">
                            <span>Easy Breakfast Ideas</span>
                            <h4>Banana Oatmeal Pancakes</h4>
                            <p>Pancake banana oat ini dibuat dengan bahan-bahan sehat dan dimaniskan secara alami.
                            Lembut, lezat, dan jauh lebih sehat daripada pancake biasa!</p>
                            <ul class="social-icons">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="https://static.chloeting.com/recipes/6379e20bcab051845d4f5649/images/sugar-free-lemonade-1668932113353-2.webp"
                                alt="">
                        </div>
                        <div class="down-content">
                            <span>Healthy Drink Recipes</span>
                            <h4>Sugar-Free Lemonade</h4>
                            <p>Menyegarkan, menghilangkan dahaga, dan sumber vitamin C hanya dengan 2 bahan!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Workout Recipe Ends ***** -->


    <!-- ***** Footer Start ***** -->
    <footer class="text-center text-lg-start text-white" id="footerr" style="background-color: #000000; margin-top : 50px;">
        <!-- Grid container -->
        <div class="container p-4 pb-0 text-left" >
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">
                            Company name
                        </h6>
                        <p>
                            Active Well adalah platform penyedia informasi dan rekomendasi untuk workout di rumah.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none" />

            

                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                        <p><i class="fas fa-home mr-3"></i> Indonesia</p>
                        <p><i class="fas fa-envelope mr-3"></i> ActiveWell@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> + 62 877 567 88</p>
                        <p><i class="fas fa-print mr-3"></i> + 62 815 567 89</p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                        <!-- Facebook -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!"
                            role="button"><i class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!"
                            role="button"><i class="fab fa-twitter"></i></a>

                        <!-- Google -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!"
                            role="button"><i class="fab fa-google"></i></a>

                        <!-- Instagram -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!"
                            role="button"><i class="fab fa-instagram"></i></a>

                        <!-- Linkedin -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!"
                            role="button"><i class="fab fa-linkedin-in"></i></a>
                        <!-- Github -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!"
                            role="button"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #000000">
            © 2024 Copyright: Jania & Octavia
        </div>
        <!-- Copyright -->
    </footer>

    <!-- jQuery dibawah ini semua js untuk menjalankan beberapa hal di html ini dan tempat js itu di body umumnya-->
    <script src="{{ asset('js/jquery-2.1.0.min.js') }}"></script>
    <script>
    function toggleDropdown() {
        var dropdown = document.getElementById('dropdownContent');
        if (dropdown.style.display === 'none' || dropdown.style.display === '') {
            dropdown.style.display = 'block';
        } else {
            dropdown.style.display = 'none';
        }
    }
    </script>

    <!-- Bootstrap -->
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/imgfix.min.js') }}"></script>
    <script src="{{ asset('js/mixitup.js') }}"></script>
    <script src="{{ asset('js/accordions.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>