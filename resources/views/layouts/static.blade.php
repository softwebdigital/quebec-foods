<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="/static-assets/favicon.708cd543.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quebec Foods</title>
  <script src="https://kit.fontawesome.com/1b72b19568.js" crossorigin="anonymous"></script>
  <script type="module" crossorigin src="/static-assets/main.e0b7c54a.js"></script>
  <link rel="stylesheet" href="/static-assets/main.19a90050.css">
</head>

<body>
  <div>
    <nav class="w-full px-5 bg-white nav-shadow lg:px-10 nav ">
      <div class="flex content-center justify-between gap-5 py-4 mx-auto max-w-screen-max ">
        <div class="flex justify-between content-center items-center gap-x-5 w-2/3 md:w-[65%]">

          <!-- Logo -->
          <div class="w-1/3 lg:w-[20%]">
            <a href="/">
              <img class="w-16 h-16" src="/static-assets/logo.e8cd949b.svg" alt="Logo">
            </a>
          </div>

          <!-- Links -->
          <div class="flex justify-between content-center items-center xl:gap-x-8 w-2/3 lg:w-[80%] relative">

            <a class="cursor-pointer nav-link drop-down-items q-boss">
              <span> Quebec Foods </span>
              <svg xmlns="http://www.w3.org/2000/svg" class="inline w-4 h-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <div id="q-drop-down" class="absolute z-30 hidden">
              <div class="drop-down">
                <a href="/farm-estate" class="drop-down-items">
                  Farm Estate
                </a>
                <a href="/processing-plant" class="drop-down-items">
                  Processing Plant
                </a>
                <a href="/tractor-investment" class="drop-down-items">
                  Tractor Investment
                </a>
              </div>
            </div>
            <a href="/faqs" class="nav-link">
              FAQ
            </a>
            <a href="/about" class="nav-link">
              About Us
            </a>
            <a href="/contact" class="nav-link">
              Contact Us
            </a>


          </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center content-center justify-between lg:gap-x-5">
          @guest
          <a class="hidden btn lg:block" href="/login">
            Sign In
          </a>
          @else
          <a class="hidden btn lg:block" href="/dashboard">
            Dashboard
          </a>
          @endguest
          <a class="hidden btn btn-primary md:block" href="#">
            Download App
          </a>
        </div>

        <!-- Mobile Hambugger -->
        <button id="menu" class="btn !px-1 block lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>

      </div>
      <div id="mobile-nav" class="hidden">
        <div class="drop-down mobile-nav ">
          <a href="/faqs" class="drop-down-items">
            FAQ
          </a>
          <a href="/about" class="drop-down-items">
            About Us
          </a>
          <a href="/contact" class="drop-down-items">
            Contact Us
          </a>
          @guest
          <a class="drop-down-items" href="/login">
            Sign In
          </a>
          @else
          <a class="drop-down-items" href="/dashboard">
            Dashboard
          </a>
          @endguest
          <a class="btn btn-primary md:hidden" href="#">
            Download App
          </a>
        </div>
      </div>

    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
      <div class="footer-content md:grid-cols-4 ">
          <!-- Location -->
          <div class="flex flex-col gap-y-3">
              <div>
                  <img src="/static-assets/logo.e8cd949b.svg" class="footer-logo" alt="Logo Footer">
              </div>

              <a href="https://www.google.com/maps/place/Boya+place/@9.0498425,7.4354707,15z/data=!4m5!3m4!1s0x0:0x63594dac8d4ae3ac!8m2!3d9.0499115!4d7.4354294"
                  target="_blank" class="text-base text-ink">

                  Suite B15, Boya Place Ameh Ebute <br>
                  Street,Wuye- Abuja, Nigeria.
              </a>
              <div class="lg:flex flex-col !-my-1 hidden gap-x-2">
                  <a class="text-base text-ink" href="/terms">Terms and Conditions</a>
                  <a class="text-base text-ink" href="/privacy-policy">Privacy Policy</a>
              </div>
              <span class="hidden text-base text-ink lg:inline-block">
                  © Copyright 2022 Quebec Groups Limited. <br>
                  All rights reserved.
              </span>

          </div>

          <!-- Products -->
          <div class="footer-nav">
              <h4 class="heading">Quebec Products</h4>
              <ul>
                  <li>
                      <a href="#">Quebec Foods</a>
                  </li>
                  <li>
                      <a href="/farm-estate">Farm Estate</a>
                  </li>
                  <li>
                      <a href="/processing-plant">Processing Plant</a>
                  </li>
                  <li>
                      <a href="/tractor-investment">Tractor Investment</a>
                  </li>
                  <li>
                      <a href="#">Referral Program</a>
                  </li>
                  <li>
                      <a href="#">Community</a>
                  </li>
              </ul>
          </div>

          <!-- Links -->
          <div class="footer-nav">
              <h4 class="heading">Quebec Links</h4>
              <ul>
                  <li>
                      <a href="/faqs">FAQs</a>
                  </li>
                  <li>
                      <a href="/about">About Us</a>
                  </li>
                  <li>
                      <a href="/contact">Contact Us</a>
                  </li>

                  <li>
                      <a href="tel:+2347016358414">Phone 1: (+234) 701-635-8414</a>
                  </li>
                  <li>
                      <a href="tel:+2348146306036">Phone 2: (+234) 814-630-6036</a>
                  </li>
                  <li>
                      <a href="+2349095448354">Phone 3: (+234) 909-544-8354</a>
                  </li>

              </ul>
          </div>


          <!-- Socials -->
          <div class="footer-nav">
              <h4 class="heading">Follow Us</h4>
              <div class="socials">
                  <a href="#">
                      <i class="fa-brands fa-facebook"></i>
                  </a>
                  <a href="#">
                      <i class="fa-brands fa-twitter"></i>
                  </a>
                  <a href="#">
                      <i class="fa-brands fa-instagram"></i>
                  </a>
                  <a href="#">
                      <i class="fa-brands fa-whatsapp"></i>
                  </a>
              </div>
          </div>
          <div class="flex flex-col lg:hidden">
              <a class="text-base text-ink" href="/terms">Terms and Conditions</a>
              <a class="text-base text-ink" href="/privacy-policy">Privacy Policy</a>
          </div>
          <span class="py-3 my-4 text-sm text-center lg:text-base lg:hidden text-ink opacity-95 md:text-left">
              © Copyright 2022 Quebec Groups Limited. <br>
              All rights reserved.
          </span>

      </div>
  </footer>
  </div>
  @yield('scripts')
</body>


</html>