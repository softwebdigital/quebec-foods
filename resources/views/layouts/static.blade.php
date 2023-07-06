<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://kit.fontawesome.com/1b72b19568.js" crossorigin="anonymous"></script>
  <script type="module" crossorigin src="/static-assets/main.e0b7c54a.js"></script>
  <link rel="stylesheet" href="/static-assets/main.19a90050.css">
    <meta charset="UTF-8"/>
    <link rel="icon" type="image/svg+xml" href="/static-assets/favicon.708cd543.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Quebec Foods</title>
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! JsonLd::generate() !!}
    <!-- :begin home slider import -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css"/>
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <!-- :end home slider import -->
    <!-- :begin farm slider import -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- :end farm slider import -->
    <script src="https://kit.fontawesome.com/1b72b19568.js" crossorigin="anonymous"></script>
    <script type="module" crossorigin src="/static-assets/main.e0b7c54a.js"></script>
    <link rel="stylesheet" href="/static-assets/main.19a90050.css">
    <!-- Google tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-240602613-1">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-240602613-1');
    </script>
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
                <div style="font-weight: 600;"
                     class="flex justify-between content-center items-center xl:gap-x-8 w-2/3 lg:w-[80%] relative">

                    <a class="cursor-pointer nav-link drop-down-items q-boss">
                        <span> Quebec Foods </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-4 h-4" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                    <div id="q-drop-down" class="absolute z-30 hidden">
                        <div class="drop-down" style="width: 255px;">
                            <a href="/farm-estate" class="drop-down-items"
                               style="@if(Route::is('static.farm')) color: rgb(0 164 81 / var(--tw-text-opacity)); @endif">
                                Farm Estate
                            </a>
                            <a href="/processing-plant" class="drop-down-items"
                               style="@if(Route::is('static.plant')) color: rgb(0 164 81 / var(--tw-text-opacity)); @endif">
                                Processing Plant
                            </a>
                            <a href="/tractor-investment" class="drop-down-items"
                               style="@if(Route::is('static.tractor')) color: rgb(0 164 81 / var(--tw-text-opacity)); @endif">
                                Tractor & Agro- haulage
                            </a>
                        </div>
                    </div>
                    <a href="/faqs" class="nav-link"
                       style="@if(Route::is('static.faq')) color: rgb(0 164 81 / var(--tw-text-opacity)); @endif">
                        FAQ
                    </a>
                    <a href="/about" class="nav-link"
                       style="@if(Route::is('static.about')) color: rgb(0 164 81 / var(--tw-text-opacity)); @endif">
                        About Us
                    </a>
                    <a href="/contact" class="nav-link"
                       style="@if(Route::is('static.contact')) color: rgb(0 164 81 / var(--tw-text-opacity)); @endif">
                        Contact Us
                    </a>


                </div>
            </div>

            <!-- Actions -->
            {{-- <div class="flex items-center content-center justify-between lg:gap-x-5">
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
            </div> --}}

            <div style="font-weight: 600;" class="flex items-center content-center justify-between lg:gap-x-5">
                @guest
                    <a class="hidden btn lg:block" href="{{ route('login') }}">
                        Sign In
                    </a>
                    <a class="hidden btn btn-primary md:block" href="{{ route('register') }}">
                        Sign Up
                    </a>
                @else
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="hidden btn lg:block" type="submit">Sign Out</button>
                    </form>
                    <!-- <a class="hidden btn lg:block" href="/login">
                      Sign Out
                    </a> -->
                    <a class="hidden btn btn-primary md:block" href="/dashboard">
                        Dashboard
                    </a>
                @endguest
            </div>

            <!-- Mobile Hambugger -->
            <button id="menu" class="btn !px-1 block lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
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
                    <a class="drop-down-items" href="{{ route('login') }}">
                        Sign In
                    </a>
                    <a class="btn btn-primary md:hidden" href="{{ route('register') }}">
                        Sign Up
                    </a>
                @else
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="drop-down-items" type="submit">Sign Out</button>
                    </form>
                    <!-- <a class="hidden btn lg:block" href="/login">
                      Sign Out
                    </a> -->
                    <a class="btn btn-primary md:hidden" href="/dashboard">
                        Dashboard
                    </a>
                @endguest
                <!-- @guest
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
                </a> -->
            </div>
        </div>

    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content md:grid-cols-4">
            <!-- Location -->
            <div class="flex flex-col gap-y-3">
                <div>
                    <img src="/static-assets/logo.e8cd949b.svg" class="footer-logo" alt="Logo Footer">
                </div>
                <span class="hidden text-base text-ink lg:inline-block">
                ©️ Copyright 2022 Quebec Food Processing Industrial Parks Limited. All rights reserved.
              </span>

                <a href="https://www.google.com/maps/place/Boya+place/@9.0498425,7.4354707,15z/data=!4m5!3m4!1s0x0:0x63594dac8d4ae3ac!8m2!3d9.0499115!4d7.4354294"
                   target="_blank" class="mt-3 mb-3 flex text-base text-ink">
                    <img class="h-6" style="margin-right: 15px; margin-top: 6px;" src="/static-assets/Vector.png"
                         alt="Message icon">Registered Mailing Address: Suite B15, Boya Place Ameh Ebute Street,Wuye- Abuja, Nigeria.
                </a>
                <div class="mt-6 lg:flex flex-col !-my-1 hidden gap-x-2">
                    <a class="text-primary" target="_blank" href="https://www.softwebdigital.com/"> <span
                            class="text-ink">Powered by </span> Soft-Web Digital</a>
                </div>


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
                        <a href="/referal">Referral Program</a>
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
                        <a href="/team">Our Team</a>
                    <li>
                        <a href="/contact">Contact Us</a>
                    </li>
                    <li>
                        <a href="/terms">Terms and Conditions</a>
                    </li>
                    <li>
                        <a href="/privacy-policy">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="/disclaimer">Quebec Foods Disclaimer</a>
                    </li>
                    <li>
                        <a href="/webinar">Webinar</a>
                    </li>

                    <!-- <li>
                        <a href="tel:+2347016358414">Phone 1: (+234) 701-635-8414</a>
                    </li>
                    <li>
                        <a href="tel:+2348146306036">Phone 2: (+234) 814-630-6036</a>
                    </li>
                    <li>
                        <a href="+2349095448354">Phone 3: (+234) 909-544-8354</a>
                    </li> -->

                </ul>
            </div>


            <!-- Socials -->
            <div class="footer-nav">
                <h4 class="heading">Get in Touch</h4>
                <ul>
                    <li>
                        <a href="tel:+2347016358414">Phone 1: (+234) 701-635-8414</a>
                    </li>
                    <li>
                        <a href="tel:+2348146306036">Phone 2: (+234) 816-329-2879</a>
                    </li>
                    <li>
                        <a href="+2349095448354">Phone 3: (+234) 909-544-8354</a>
                    </li>
                </ul>

                <div class="socials">
                    <a href="https://web.facebook.com/Quebec-Foods-107032645442887" target="_blank">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/quebecfoods" target="_blank">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/quebecfoods/" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send/?phone=2347016358414&text=Hello+Quebec+Foods!+👋🏼"
                       target="_blank">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/quebec-food-processing-industrial-parks-ltd/"
                       target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UC1-fraTmSQ7DYaM5eh3fnSw"
                       target="_blank">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>
            <span class="py-3 my-4 text-sm text-center lg:text-base lg:hidden text-ink opacity-95 md:text-left">
              ©️ Copyright 2022 Quebec Food Processing Industrial Parks Limited.
              <br> All rights reserved.
              <div class="mt-5 flex-col gap-x-2">
                  <a class="text-primary" target="_blank" href="https://www.softwebdigital.com/"> <span
                          class="text-ink">Powered by </span> Soft-Web Digital</a>
              </div>
          </span>

        </div>
    </footer>
</div>
@yield('scripts')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6497368acc26a871b024799a/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<!-- Meta Pixel Code -->
<script>
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '658171588636182');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1" style="display:none"
         src="https://www.facebook.com/tr?id=658171588636182&ev=PageView&noscript=1">
</noscript>
<!-- End Meta Pixel Code -->
</body>


</html>
