<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />



  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="./assets/css/styles.css" />
  <link rel="stylesheet" href="assets/css/login.css">

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
          alt="website logo" />
      </a>
      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="index.php" class="nav__link">Home</a>
          </li>
          <!-- <li class="nav__item">
              <a href="basic_cpa_detail.html" class="nav__link">Basic</a>
            </li>
            <li class="nav__item">
              <a href="screening.html" class="nav__link">Screening</a>
            </li>
            <li class="nav__item">
              <a href="valuation.html" class="nav__link">Valuation</a>
            </li>
            <li class="nav__item">
              <a href="legal.html" class="nav__link">Legal</a>
            </li>
            <li class="nav__item">
              <a href="assessment.html" class="nav__link">Assessment</a>
            </li> -->

          <!-- <li class="nav__item">
              <a href="login-register.html" class="nav__link active-link"
                >Login</a
              >
            </li> -->
        </ul>
        <!-- <div class="header__search">
          <input
            type="text"
            placeholder="Enter RefId..."
            class="form__input" />
          <button class="search__btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg>
          </button>
        </div> -->
      </div>

    </nav>
  </header>

  <main class="main" style="margin-left: 60px;">


    <div class="container-login">
      <div class="img">
        <img src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/bg.svg">
      </div>





      <?php
      session_start(); // Start the session
      include "connection.php"; // Include database connection

      if (isset($_POST['login'])) {

        // Sanitize input data
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = $_POST['password']; // Password will be verified later

        // Prepare statement to prevent SQL injection
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {

          $row = mysqli_fetch_assoc($res);
          $password = $row['password'];

          // Verify password
          if (password_verify($pass, $password)) {
            // Set session variables
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("location: home.php"); // Redirect to home page

          } else {
            echo "<div class='message'>
                 <p>Wrong Password</p>
                 </div><br>";
            echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
          }
        } else {
          echo "<div class='message'>
                 <p>Wrong Email or Password</p>
                 </div>";
          echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
        }
      } else {
      ?>
        <div class="login-content">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <img src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/avatar.svg">
            <h2 class="title">Welcome</h2>
            <div class="input-div one">
              <div class="i">
                <i class="fas fa-user"></i>
              </div>
              <div class="div">
                <input type="email" name="email" class="input" required>
              </div>
            </div>
            <div class="input-div pass">
              <div class="i">
                <i class="fas fa-lock"></i>
              </div>
              <div class="div">
                <input type="password" name="password" class="input" required>
              </div>
            </div>
            <a href="#">Forgot Password? Please ask to admin</a>
            <input type="submit" name="login" class="btn" value="Login" id="submit">
          </form>
        </div>
      <?php
      }
      ?>

  </main>





  <!--=============== FOOTER ===============-->
  <footer class="footer container" style="margin-top: 50px; margin-left:100px">
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


</body>

</html>