@extends('layouts.static')

@section('content')
    <!-- Hero for Farm Estate Page -->
    <section class="py-32 pb-10 mt-10 section-container lg:mt-10">
        <div
          class="flex flex-col-reverse items-center justify-between text-center lg:flex-row md:items-start lg:text-left">
          <div class="py-2 md:px-0 md:w-1/2">
            <div class="w-full py-9 lg:px-4">
              <h1
                class="mb-4 text-4xl font-bold leading-tight text-primary text-heading-5 md:leading-h-2 md:text-heading-1">
                Invest in our farm estate and buy back venture scheme
              </h1>
              <p class="inline-block py-2 text-lg text-ink md:text-heading-5 md:leading-h-5 md:py-4">
                Open an account and start investing in our Food Production Venture Scheme in just 5 minutes.
              </p>
              <div class="flex items-baseline justify-center my-2 text-center lg:my-5 lg:justify-start">
                <a href="{{ route('login') }}"
                  class="btn-primary my-4 py-5 md:text-lg md:py-5  px-9 rounded-xl flex justify-center  items-baseline gap-x-10 lg:gap-x-6 w-[80%] lg:w-1/2">
                  <span>
                    Get Started
                  </span>
                  <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                      fill="#ffffff" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div class="md:w-1/2">
            <div class="bg-[url('/images/round-pattern.png')] bg-right-bottom bg-no-repeat lg:py-14 lg:px-10">
              <img class="rounded-2xl drop-shadow-xl" src="/static-assets/quebec-108.png" alt="">
            </div>
          </div>
        </div>
      </section>

      @php 
          $farms = App\Models\Package::where('type', 'farm')->where('status', 'open')->get();
      @endphp
      @if($farms->count() >= 1)
      <section class="bg-[#F3FFF9]">
        <section class="py-32 pb-10 mb-24 section-container">
          <div class="flex flex-col items-center justify-center my-1 text-center lg:flex-row lg:justify-between">
              <h2 class="text-4xl lg:text-heading-3 lg:leading-h-3 text-primary font-bold mb-5">Available Investments</h2>
              <a href="{{ route('packages') }}" class="btn-primary my-4 py-5 md:text-lg md:py-5  lg:px-9 rounded-xl flex justify-center  items-baseline gap-x-10 lg:gap-x-6 w-[80%] lg:w-1/2" style="max-width: 300px;">
                  <span>
                      View Packages
                  </span>
                  <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z" fill="#ffffff"></path>
                  </svg>
              </a>
          </div>
          
          <div class="wrapper mt-20">
              <div class="carousel owl-carousel p-3">
                    @foreach($farms as $farm)
                    @php 
                        $category = App\Models\Category::where('id', $farm->category_id)->first();
                    @endphp
                      <div :class="card card-{{ $farm->id }} !self-start lg:w-1/3 relative">
                        @if($category->image == null)
                          <img class="rounded-3xl" src="/static-assets/farm-estate-hero-image.2b800cfc.png" alt="">
                        @else
                          <img class="rounded-3xl" src="{{ $category->image }}" alt="" style="width: 100%; height: 260px; object-fit: cover;">
                        @endif
                        <div class="px-5 py-5 bg-white -translate-y-10 rounded-xl shadow-lg lg:w-[90%]">
                          <h3 class="text-ink text-lg py-2 font-bold">{{ $farm->name }}</h3>
                          <div class="text-sm" style="display: -webkit-box; width: 100%; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                            {!! $farm->description !!}
                          </div>
                          <hr class="border-t-2 bg-[#414D5E] my-3">
                          <a href="{{ route('packages.show', ['package' => $farm['id']]) }}"
                            class="flex text-ink text-base items-baseline py-1 justify-start w-full  my-1 md:text-lg rounded-xl gap-x-5 lg:gap-x-2 ">
                            <span class="text-base">
                              Invest Now
                            </span>
                            <svg width="19" height="12" viewBox="0 0 19 12" class="py-[1px] my-2" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                                fill="#192434" />
                            </svg>
                          </a>
                        </div>
                      </div>
                    @endforeach
              </div>
          </div>
        </section>
      </section>
      @endif
      <style>
          .wrapper{
            width: 100%;
          }
          .carousel{
            max-width: 1200px;
            margin: auto;
            padding: 0 30px;
          }
          .carousel .card{
            color: #fff;
            text-align: center;
            margin: 20px 0;
            line-height: 250px;
            font-size: 90px;
            font-weight: 600;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
          }
          .carousel .card-1{
            background: #ed1c24;
          }
          .carousel .card-2{
            background: #0072bc;
          }
          .carousel .card-3{
            background: #39b54a;
          }
          .carousel .card-4{
            background: #f26522;
          }
          .carousel .card-5{
            background: #630460;
          }
          .owl-dots{
            text-align: center;
            margin-top: 40px;
          }
          .owl-dot{
            height: 15px;
            width: 45px;
            margin: 0 5px;
            outline: none;
            border-radius: 14px;
            border: 2px solid #00A451!important;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
          }
          .owl-dot.active,
          .owl-dot:hover{
            background: #00A451!important;
          }
      </style>
      <script>
          $(".carousel").owlCarousel({
            margin: 20,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
              0:{
                items:1,
                nav: false
              },
              600:{
                items:2,
                nav: false
              },
              1000:{
                items:3,
                nav: false
              }
            }
          });
      </script>

      <!-- Food Production Investment Scheme (FPIS) -->
      <section style="background-image: url(/static-assets/quebec-109.png);" class="bg-[url('/static-assets/quebec-109.png.png')] bg-cover w-full h-full lg:py-28">
        <div class="section-container ">
          <div
            class="bg-[#F3F7F5] rounded-2xl px-7 lg:px-20 py-12 max-w-[1000px] mx-auto text-center flex flex-col justify-center items-center gap-10">
            <!-- <span class="py-2 px-4 rounded-3xl bg-[#BFFCD9] text-primary text-xs lg:text-sm">QUEBEC AGRO-FOOD COOPERATIVE
              SOCIETY
              LTD</span> -->
            <h3 class="max-w-[400px] text-primary font-bold text-lg lg:text-heading-4 lg:leading-h-5">Food Production Venture Scheme (FPVS)</h3>
            <p class="text-[#414D5E] font-medium text-sm lg:text-[22px] lg:leading-8  text-justify md:text-center">
              The Farm Estate venture provides investors the opportunity to invest in investment-grade farmland in
              Nigeria and some countries in Africa, Asia, Europe & North America while employing sustainable
              Mechanized farming practices, impacting the lives of millions of devoted farmers for the cultivation of
              arable farmland across nations with the expectation of enhancing food security annually by increasing
              production and reducing post-harvest losses.
            </p>

            <p class="text-[#414D5E] font-medium text-sm lg:text-[22px] lg:leading-8  text-justify md:text-center">
              The soil of Nigeria and some other nations serve to feed not only everyone in that nation but millions of
              people around the world through the import-export system.
            </p>

            <!-- <p class="text-[#414D5E] font-medium text-sm lg:text-[22px] lg:leading-8  text-justify md:text-center">
              Moreso, Quebec Food aim is to contribute to nation-building through this platform by supporting the Federal
              Government of Nigeria initiatives through the Central Bank of Nigeria (CBN) and Nirsal Plc of cultivating 4
              million hectares of farmland by engaging 8 million Farmers across the country with the expectation of
              producing about 12 million metric tons of Grain Product Equivalent (GPE) annually over the medium to
              long term.
            </p> -->
            <a href="{{ route('login') }}"
              class="flex items-baseline justify-center w-full py-5 my-4 btn-primary md:text-lg md:py-5 lg:px-9 rounded-xl gap-x-10 lg:gap-x-6 lg:w-1/2">
              <span>
                Get Started
              </span>
              <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                  fill="#ffffff" />
              </svg>
            </a>
          </div>
        </div>
      </section>

      <!-- Why Invest In Agro-Farm Produce Buyback Scheme -->
      <section class="md:mt-6 lg:overflow-hidden">
        <div class="text-center section-container">

            <div class="flex flex-col items-center text-left lg:-mr-32 lg:flex-row">
                <div class="">
                    <img src="/static-assets/image-46.png" alt="">
                </div>
                <div class="p-2 shadow-lg md:px-0 md:w-[55%] rounded-3xl">
                    <div class="w-full px-5 py-4 mt-5 lg:mt-10 lg:px-10 ">
                        <div class="pb-5 text-left flex flex-col items-center gap-y-5">
                        <!-- <span class="py-2 px-4 rounded-3xl bg-primary text-white text-xs lg:text-sm self-start">Quebec Food Processing Industrial Park Ltd.</span> -->
                            <h3
                                class="max-w-[400px] text-primary font-bold text-2xl lg:text-heading-4 lg:leading-h-5 self-start">
                                Why Invest?
                            </h3>
                        </div>
                        <ul  class="list-disc px-4 p-4">
                          <li class="">
                            <p class="pl-3 py-1 text-sm text-ink md:text-[20px] md:leading-h-5 md:py-4">
                            Investment in Agro-Farm Produce Production is a strategic move due to the increasing world
                              population by the day.
                            </p>
                          </li>
                          <li class="">
                              <p class="pl-3 py-1 text-sm text-ink md:text-[20px] md:leading-h-5 md:py-4">
                              Agriculture and farming investments will continue to play a vital role in sustaining global societies
                                  because the need to feed a growing population has become imperative and a serious subject matter to
                                  all nations. 
                              </p>
                          </li class="">
                          <li>
                              <p class="pl-3 py-1 text-sm text-ink md:text-[20px] md:leading-h-5 md:py-4">
                              One inevitable fact investors should know is that whether the overall economy of a nation is
                                  experiencing recession or a booming economy, the populace will feed themselves.
                              </p>
                          </li>
                        </ul>
                        
                        
                        
                        <div
                            class="flex flex-col items-center justify-center my-1 text-center lg:flex-row lg:iterms-baseline lg:gap-x-6 lg:my-5 lg:justify-start">
                            <a href="#"
                                class="btn-primary my-4 py-5 md:text-lg md:py-5  lg:px-9 rounded-xl flex justify-center  items-baseline gap-x-10 lg:gap-x-6 w-[80%] lg:w-1/2">
                                <span>
                                    Learn more
                                </span>
                                <svg width="19" height="12" viewBox="0 0 19 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                                        fill="#ffffff" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <section class="mt-6 lg:overflow-hidden">
        <div class="text-center section-container">

            <div
                class="flex flex-col-reverse items-center  lg:flex-row text-left bg-[url('/images/la_tractor.png')] bg-center bg-no-repeat">
                <div class="py-2 md:px-0 md:w-[55%] rounded-3xl">
                    <div class="w-full px-2 py-4 mt-10 lg:px-10 ">
                        <p
                            class="inline-block py-1 text-base text-ink md:text-[20px] md:leading-h-5 md:py-4">
                            Moreso, Quebec Food aim is to contribute to nation building through this platform by supporting the Federal Government initiatives through the Central Bank of Nigeria (CBN) and Nirsal Plc, of cultivating 4 million hectares of farmland by engaging 8 million Farmers across the country with expectation of producing about 12 million metric tons of Grain Product Equivalent (GPE) annually over the medium to long term.
                        </p>

                    </div>
                </div>
                <div class="">
                    <img src="/static-assets/tractor-4.c63522e3.png" alt="">
                </div>
            </div>
        </div>
    </section>

      <!-- Our business Structure -->
      <section class="section-container ">
        <div class="flex flex-col lg:flex-row justify-between ">
          <div class="lg:w-2/3 lg:px-10">
            <h3 class="text-primary font-bold text-2xl lg:text-heading-4 lg:leading-h-5">Our Business Structure</h3>
            <p class="text-ink font-medium text-sm md:text-[20px] lg:leading-8 ">

              The Investment Scheme is open for public and private participation to invest in the various value chains.
              
            </p>
          </div>
          <div class="lg:w-1/4 lg:px-10">
            <a href="{{ route('login') }}"
              class="flex items-baseline justify-center w-full py-5 my-4 btn-primary md:text-lg md:py-5 lg:px-9 rounded-xl gap-x-10 lg:gap-x-6 ">
              <span>
                Get Started
              </span>
              <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                  fill="#ffffff" />
              </svg>
            </a>
          </div>
        </div>
        <!-- Removed the three column section here::START -->
        

        <!-- Removed the three column section here::END -->
      </section>

        <!-- Mobile CTA -->
  <!-- <section class="mobile-cta-section">
    <div
      class="grid items-center content-center justify-between grid-cols-1 py-4 mx-auto max-w-screen-max md:grid-cols-2 lg:grid-cols-8">
      <div class="lg:col-start-1 lg:col-end-4">
        <img class="app" src="/static-assets/Mobile-App.a7165a51.png" alt="">
      </div>
      <div class="px-3 lg:col-start-5 lg:col-end-9 lg:px-0">
        <div class="give-padding relative w-full my-6 bg-primary curved lg:my-0 lg:px-16 lg:py-24" style="border-radius: 0px 30px 30px 0px;">
          <div class="absolute download-tag bottom-6 -left-14">
          </div>
          <div class="content-right">
            <h3>Get Started Here</h3>
            <p>Open an account and start investing in our processing plant scheme
              <span class="underline decoration-orange decoration-4">in just 5 minutes</span>.
            </p>
            <a href="{{ route('login') }}" class="btn ">
              {{-- <i class="fa-brands fa-google-play"></i>
              <span>Download App</span> --}}
              <span>Sign in</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section> -->

      <!-- FAQs -->
      <section class="mb-20 section-container ">
        <h3
          class="flex items-center justify-center py-5 text-xl font-bold text-center lg:text-heading-3 lg:leading-h-3 gap-x-5 lg:py-10">
          <img src="/static-assets/messages-2.ba902c7d.svg" alt="">
          <span>Frequently asked questions</span>
        </h3>
        <div class="flex flex-col px-1 lg:px-20 gap-y-4 ">
                <div class="accordion-container">
                    <button class="accordion">How do I start the investment process?</button>
                    <div class="panel">
                        <p>
                            Simply create an account, once you have completed the account creation process, you will have immediate access to your personalized Quebec Food account. You can review your dashboard and click on new investment. Review the farm investment portfolios and select a farm. Enter the number of units you will like to invest in and click invest now.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">What is the investment duration?</button>
                    <div class="panel">
                        <p>The program cycle is dependent on the specific farm type. It ranges from <strong>18months,</strong>  <strong>24months,</strong> <strong>36months & 60months</strong> depending on your choice of crop or Poultry & livestock to invest in.</p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">What is the amount of investment required per unit?</button>
                    <div class="panel">
                        <p>
                            The amount of investment varies from $150 - $3,000 depending on your choice of farm investment package. 
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">What is the Minimum or Maximum Unit?</button>
                    <div class="panel">
                        <p>
                            The minimum unit of investment is one unit. Investors can take as many units available but not exceeding 100 units at any given time and cycle of investment.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">Is there any plan for insurance of the farms?</button>
                    <div class="panel">
                        <p>
                            Yes, we know that every business has its own risk, either systemic or
                            non-systemic. At <strong> Quebec FOODPRO IP,</strong> security of investment and safety of
                            investors’ trust are taken with utmost importance. In other words, we know,
                            understand and agree that we are investors’ trust bank, and we will
                            therefore not compromise this fragile relationship. This has made us to
                            commission the services of the Nigerian Agricultural Insurance Corporation
                              <strong>(NAIC)</strong> and Leadway Insurance as a means of risk management and mitigation.
                            <br>
                            The farms are insured to mitigate against any form of crop losses from fire,
                            lightning, aircraft, windstorm damage, flood, outbreak of pests and diseases
                            etc.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">Where are the Farm Estate locations in Nigeria?</button>
                    <div class="panel">
                        <ul class="!list-disc px-10 py-3">
                            <li>
                                South West (Oyo, Ogun, Ondo, Osun, & Ekiti State)
                            </li>
                            <li> South-South (Edo, Delta, Bayslea, Rivers, Cross-River & Akwa Ibom State)
                            </li>
                            <li>South East (Imo, Ebonyi, Abia, Enugu & Anambra State)</li>
                            <li>North Central (Nassarawa, Benue, Kogi, Kwara, & Niger State)</li>
                            <li> North West (Kaduna, Sokoto & Katsina State)</li>
                            <li>North East (Adamawa, Gombe, & Taraba State)</li>
                        </ul>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">Can I visit the site under this investment
                        scheme?</button>
                    <div class="panel">
                        <p>
                            Yes. Quebec Agritech City and Farm Estates project site is open for
                            visitation every third Saturday of the month, any other days at investors
                            request is solely the responsibility of the investor.
                        </p>
                    </div>
                </div>

                <div class="accordion-container">
                    <button class="accordion">What documents do I get when I choose to invest?</button>
                    <div class="panel">
                        <p class="font-bold">You receive the following documents:
                        </p>
                        <ul class="list-disc px-5 md:px-10 pt-2 pb-5">
                            <li>	Payment Acknowledgment & Electronic Deed of Investment Subscription Agreement. </li>
                            <li>	Provisional Letter of allocation for Land Asset backed security for your investment in Quebec Agritech City Residential Layout. </li>
                            <li>	A Site layout plan (to identify your allocated plot.</li>
                            <li>	Bank Guarantee (BG) for Investment above 100 units. (Optional)</li>
                        </ul>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">How long can I Hold onto the land as a security for my
                        investment?</button>
                    <div class="panel">
                        <p>
                            You can hold onto the land for a maximum period of 24months. However, once you start receiving returns, your right to the property is withdrawn immediately.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">What do I stand to benefit as an investor towards the actualization of the project?</button>
                    <div class="panel">
                        <p> Investing in agricultural value chain has the potential of giving you financial freedom and generating enormous prots for the investor and other prospective investors. <br>

                            Quebec Food Processing Industrial Parks Ltd’s aim and objective of launching this scheme is to establish a financial legacy with greater sense of nancial stability for investors via entrepreneuring activities in the non-oil sector for global economic impact. <br>

                            As an investor through your investment you have contributed and saved the populaces from famine, starvation and hunger, and also restored hope to devoted farmers in Nigeria.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">How am I sure you have a committed team?</button>
                    <div class="panel">
                        <p>
                            Every team member carries this level of dedication and commitment to the
                            cause we stand for. It is our utmost priority to deliver on our promise. We
                            are professionals in agriculture, economics and international trade. You can
                            count on us!
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">How are your investments protected?</button>
                    <div class="panel">
                        <p>

                            We ensure a high probability of success by using industry best practices, we
                            have built a robust model to minimize and mitigate risks in our agricultural
                            investment portfolios. We explore and provide best possible mitigation
                            measures that meet our promise made to investors and partners.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">How are farms monitored?</button>
                    <div class="panel">
                        <p>
                            At Quebec Foods, we have a team of field officers attached to each farm
                            estate. These officers provide constant oversight on all farm operations. We
                            then use drones and CCTV cameras to conduct farm surveillance. Each investor
                            can watch live progress of farm estates on the Quebec Foods platforms.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">How are investments Secured?</button>
                    <div class="panel">
                        <p>
                            Every investment on the Quebec platform is backed with data. We have a
                            dedicated team of agro-professionals, economists, and data scientists who
                            constantly monitor every investment. This team conducts rigorous data mining
                            and reviews our investment portfolios to minimize risks. With data, we can
                            determine which commodity, location, and season would bring the maximum
                            returns for our investors.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">How do you get buyers for farming produce?</button>
                    <div class="panel">
                        <p>
                            Produce from our farms are for both local consumption and export markets. We
                            have partnered with several off-takers including other food processing
                            companies locally and internationally. We will produce according to the
                            demands of our processing plants and from our partners.
                        </p>
                    </div>
                </div>
            
        </div>
      </section>
@endsection

@section('scripts')
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });
    }
  </script>

@endsection