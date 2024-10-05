<?php
session_start();

include("connection.php");

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/card.css">

    <title>SBFC</title>
  </head>
  <body>
    <!--=============== HEADER ===============-->
    <header class="header">
      <nav class="nav container">
        <a href="index.html" class="nav__logo">
          <img
          class="nav__logo-img"
          src="https://www.sbfc.com/images/logo-sbfc.svg?rm=1702233000"
          alt="website logo"
        />
        
        </a>
        <div class="nav__menu" id="nav-menu">
          <div class="nav__menu-top">
            
          </div>
          <ul class="nav__list">
            <li class="nav__item">
              <a href="index.php" class="nav__link active-link">Home</a>
            </li>
            <li class="nav__item">
            <a href="basic_cpa_detail.html" class="nav__link">CPA Form</a>
          </li>
          
            <li class="nav__item">
              <a href="logout.php" class="nav__link">Logout</a>
            </li>
          </ul>
         
        </div>
        </div>
      </nav>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== HOME ===============-->
      <section class="home section--lg">
        <div class="home__container container grid">
          <div class="home__content">
            <span class="home__subtitle">Loan Types</span>
            <h1 class="home__title">
              Secured MSME <br><span>Loan Against Gold</span>
            </h1>
            <p class="home__description">
              Our loans are designed for the needs of today's India.
            </p>
            <a href="CPA_Form.html" class="btn">Visit Now</a>
          </div>
          <img src="https://www.sbfc.com/cmsproject/mediaGallery/images/img-about-graphic-left-1598955942.svg?rm=1702233000" class="home__img" alt="hats" />
        </div>
      </section>

    


      <section class="home section--lg">

        <div class="container-box">
          <div class="box">
              <img src="https://www.sbfc.com/cmsproject/mediaGallery/images/icon-financial-strength-1598956039.svg?rm=1702233000" alt="Image 1">
              <h2>Financial Strength</h2>
              <p>We have the capital to grow with confidence and are backed by investors</p>
          </div>
          <div class="box">
              <img src="https://www.sbfc.com/cmsproject/mediaGallery/images/icon-people-1598956079.svg?rm=1702233000" alt="Image 2">
              <h2>People</h2>
              <p>We have a hand-picked team of people with diverse skills, relevant experience and a passion for customer service</p>
          </div>
          <div class="box">
              <img src="https://www.sbfc.com/cmsproject/mediaGallery/images/icon-risk-1598956142.svg?rm=1702233000" alt="Image 3">
              <h2>Risk Management</h2>
              <p>We have effective methods for assessing credit-worthiness and we boast a strict compliance culture</p>
          </div>
          <div class="box">
              <img src="https://www.sbfc.com/cmsproject/mediaGallery/images/icon-technology-1598956229.svg?rm=1702233000 " alt="Image 4">
              <h2>Technology</h2>
              <p>We use smart technology to enhance efficiency and make the customer journey easier</p>
          </div>
       
          
      </div>
        
      </section>




   
     


   
    <!--=============== FOOTER ===============-->
    <footer class="footer container">
      <div class="footer__container grid">
        <div class="footer__content">
          <a href="index.html" class="footer__logo">
            <img src="./assets/img/logo.svg" alt="" class="footer__logo-img" />
          </a>
          <h4 class="footer__subtitle">Contact</h4>
          <p class="footer__description">
            <span>Address:</span> SBFC Finance Limited
            (Erstwhile SBFC Finance Private Limited),
            103, First Floor, C & B Square,
            Sangam Complex,
            Andheri Kurla Road,
            Chakala, Andheri East,
            Mumbai – 400059,
            Maharashtra, India
            CIN: U67190MH2008PLC178270
          </p>
          <p class="footer__description">
            <span>Phone:</span>022-6831-3333
          </p>
          <p class="footer__description">
            <span>Hours:</span> 24hrs, Mon - Sun
          </p>
         
        </div>
        <div class="footer__content">
          <h3 class="footer__title">Address</h3>
          <ul class="footer__links">
            <li><a href="#" class="footer__link">About Us</a></li>
           
            <li><a href="#" class="footer__link">Privacy Policy</a></li>
            <li><a href="#" class="footer__link">Terms & Conditions</a></li>
            <li><a href="#" class="footer__link">Contact Us</a></li>
            <li><a href="#" class="footer__link">Support Center</a></li>
          </ul>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">My Account</h3>
          <ul class="footer__links">
            <li><a href="#" class="footer__link">Terms of Use</a></li>
            <li><a href="#" class="footer__link">Privacy Policy</a></li>
            <li><a href="#" class="footer__link">Fair Practice Code</a></li>
            <li><a href="#" class="footer__link">List of KYC Documents</a></li>
            <li><a href="#" class="footer__link">Payment Modes</a></li>
            <li><a href="#" class="footer__link">FAQs and policies</a></li>
          </ul>
        </div>
        <div class="footer__content">
          <img src="https://www.sbfc.com/cmsproject/mediaGallery/images/qr-1658326497.png?rm=1702233000" alt="">

        </div>
      </div>
      <div class="footer__bottom">
        <p class="copyright">&copy; 2024 SBFC. All right reserved</p>
      </div>
    </footer>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
