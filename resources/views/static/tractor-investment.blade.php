@extends('layouts.static')

@section('content')
       <!-- Hero for Processing Tractor -->
    <section class="mt-6 lg:overflow-hidden">
        <div class="!pb-0 lg:pb-16 section-container ">
            <div class="flex flex-col-reverse items-start gap-6 text-center lg:-mr-32 lg:flex-row lg:text-left">
                <div class="py-2 md:px-0 md:w-2/5 ">
                    <div class="w-full py-6 md:pr-10 lg:mt-10 ">
                        <h1 class="mb-3 text-3xl font-bold leading-tight text-ink md:leading-h-2 md:text-heading-2">
                            Agric Tractor & Agro- haulage Venture
                        </h1>
                        <h2 class="text-xl font-bold text-primary" style="font-size: 25px; padding-top: 50px;">Overview</h2>
                        <p class="inline-block py-1 text-sm text-ink md:text-[22px] md:leading-h-5 md:py-4">
                            Financing tractors for smallholder farmers has been a daunting challenge due to the rise in the exchange rate,
                            to the hurdles of meeting financial institutions' requirements by smallholder farmers across Nigeria and
                            Africa who have not been able to own tractors
                        </p>
                        <p class="inline-block py-1 text-sm text-ink md:text-[22px] md:leading-h-5 md:py-4">
                            This platform offers investors the opportunity of investing in the Agric mechanization space, thereby
                            availing tractors, machinery, and trucks for farmers' usage to increase the number of tractors per hectare of
                            farmland with the core aim of boosting agricultural yields.
                        </p>
                        <div
                            class="flex flex-col items-center justify-center my-1 text-center lg:flex-row lg:iterms-baseline lg:gap-x-6 lg:my-5 lg:justify-start">
                            <a href="{{ route('login') }}"
                                class="btn-primary my-4 py-5 md:text-lg md:py-5  lg:px-9 rounded-xl flex justify-center  items-baseline gap-x-10 lg:gap-x-6 w-[80%] lg:w-1/2">
                                <span>
                                    Get Started
                                </span>
                                <svg width="19" height="12" viewBox="0 0 19 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                                        fill="#ffffff" />
                                </svg>
                            </a>
                            <!-- <a href="#" class="btn !text-primary">
                                <i class="fa-brands fa-google-play"></i>
                                <span>Download App</span>
                            </a> -->
                        </div>
                    </div>
                </div>
                <div class="">
                    <img src="/static-assets/tractor.1545e611.png" alt="">
                </div>
            </div>
        </div>
    </section>

    @php 
        $tractors = App\Models\Package::where('type', 'tractor')->where('status', 'open')->get();
    @endphp
    @if($tractors->count() >= 1)
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
                    @foreach($tractors as $tractor)
                    @php 
                        $category = App\Models\Category::where('id', $tractor->category_id)->first();
                    @endphp
                      <div :class="card card-{{ $tractor->id }} !self-start lg:w-1/3 relative">
                        @if($tractor->image == null)
                        <img class="rounded-3xl" src="/static-assets/farm-estate-hero-image.2b800cfc.png" alt="">
                        @else
                        <img class="rounded-3xl" src="{{ $tractor->image }}" alt="" style="width: 100%; height: 260px; object-fit: cover;">
                        @endif
                        <div class="px-5 py-5 bg-white -translate-y-10 rounded-xl shadow-lg lg:w-[90%]">
                          <h3 class="text-ink text-lg py-2 font-bold">{{ $tractor->name }}</h3>
                          <div class="text-sm" style="display: -webkit-box; width: 100%; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                            {!! $tractor->description !!}
                          </div>
                          <hr class="border-t-2 bg-[#414D5E] my-3">
                          <a href="{{ route('packages.show', ['package' => $tractor['id']]) }}"
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

    <section class="md:mt-6 lg:overflow-hidden">
        <div class="text-center section-container">
            <div class="flex flex-col-reverse items-center text-left lg:-mr-32 lg:flex-row">
            
                <div class="py-2 shadow-lg md:px-0 md:w-[55%] rounded-3xl">
                    <div class="w-full px-5 py-4 mt-5 lg:mt-10 lg:px-10 ">

                    <div class="pb-5 text-left flex flex-col items-center gap-y-5">
                            <!-- <span class="py-2 px-4 rounded-3xl bg-primary text-white text-xs lg:text-sm self-start">Quebec Food Processing Industrial Park Ltd.</span> -->
                            <h3
                                class="max-w-[400px] text-primary font-bold text-2xl lg:text-heading-4 lg:leading-h-5 self-start">
                                Why Invest in Agric Tractors & Agro-haulage Venture Scheme (ATAHVS)?
                            </h3>
                        </div>
                        <p class="inline-block py-1 text-sm text-ink md:text-[20px] md:leading-h-5 md:py-4">
                            The agrifood value chain demand and supply are gradually affected at a large scale. Farmers now
                            depend on options to ease crop cultivation, and it has increased the demand for agricultural tractors
                            globally
                        </p>
                        <p class="inline-block py-1 text-sm text-ink md:text-[20px] md:leading-h-5 md:py-4">
                            The global agricultural tractors market will exceed a value of US$ 118.37 Bn by the end of 2031  
                        </p>
                        <p>
                            The popularity of self-driving tractors has increased in recent years owing to the boosting of
                            agricultural yields due to the help of technological advancements in the agriculture industry.
                        </p>
                        <p>
                            The untapped potential for <b>farm mechanization</b> in low- and middle-income <b>countries</b> has created
                            investment opportunities for investors to explore the agricultural mechanization space in sub-Saharan
                            Africa.
                        </p>
                        <div
                            class="flex flex-col items-center justify-center my-1 text-center lg:flex-row lg:iterms-baseline lg:gap-x-6 lg:my-5 lg:justify-start">
                            <a href="#"
                                class="btn-primary my-4 py-5 md:text-lg md:py-5  lg:px-9 rounded-xl flex justify-center  items-baseline gap-x-10 lg:gap-x-6 w-[80%] lg:w-1/2">
                                <span>
                                    Invest Now
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
                <div class="">
                    <img src="/static-assets/tractor-2.877bca61.png" alt="">
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
                            Financing tractors for small holder farmers has been a daunting challenge, from the rise
                            in exchange rate to the hurdles of meeting banks’ requirement, small holder farmers
                            across Nigeria and Africa at large not being able to own tractors. Owning one is out of
                            their league, yet they constitute 70% of farmers in Sub Saharan Africa.
                        </p>
                        <p
                            class="inline-block py-1 text-base text-ink md:text-[20px] md:leading-h-5 md:py-4">
                            This platform provide investors the opportunity to invest in the Agric mechanization
                            space, thereby making tractors, machinery and trucks available to farmers, while you
                            earn returns with the aim of increasing the numbers of tractors per hectare of farmland
                            in Nigeria.
                        </p>

                    </div>
                </div>
                <div class="">
                    <img src="/static-assets/tractor-4.c63522e3.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Ready to Start Investing? -->
    <section class=" bg-[#F3FFF9] px-2">

        <div class="">
            <div class="px-4 mx-auto lg:px-0 max-w-screen-max">
                <div class="pt-16 max-w-[867px] mx-auto text-center">
                    <h4 class="py-6 text-4xl font-bold text-ink lg:leading-h-3 lg:text-heading-2">Ready to Start
                        Investing?</h4>
                    <p class="md:text-[22px] md:leading-h-5 text-[#5B6676]">
                        Register and create a new passive income stream with up to 12.5% cash value return (CVR) annually over
                        the medium to long term, depending on your choice of contract tenure.
                    </p>
                </div>
            </div>
            <div
                class=" bg-[url('/images/icons/iconoir_percentage-round.png')] bg-left-bottom bg-contain  bg-no-repeat">
                <div class=" section-container">
                    <div class="flex flex-col gap-24 px-10 lg:py-32 md:flex-row justify-around">
                        <div class="flex flex-col items-center justify-center text-center">
                            <span class="font-bold text-primary text-[22px] inline-block">from $ 30,000 </span>
                            <span class="font-bold text-[72px] leading-[96px] inline-block">10.6<span
                                    class="text-[#A9B1BC]">%</span></span>
                        </div>
                        <div class="flex flex-col items-center justify-center text-center">
                            <span class="font-bold text-primary text-[22px] inline-block">from $ 50,000</span>
                            <span class="font-bold text-[72px] leading-[96px] inline-block">12.5<span
                                    class="text-[#A9B1BC]">%</span></span>
                        </div>
                        <!-- <div class="flex flex-col items-center justify-center text-center">
                            <span class="text-primary text-[22px] inline-block">from 25,000 €</span>
                            <span class="font-bold text-[72px] leading-[96px] inline-block">12.7<span
                                    class="text-[#A9B1BC]">%</span></span>
                        </div>
                        <div class="flex flex-col items-center justify-center text-center">
                            <span class="text-primary text-[22px] inline-block">from 50,000 €</span>
                            <span class="font-bold text-[72px] leading-[96px] inline-block">13.1<span
                                    class="text-[#A9B1BC]">%</span></span>
                        </div> -->
                    </div>
                </div>

            </div>

        </div>
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

    <!-- FAQs Section -->
    <section class="mb-20 section-container ">
        <h3
            class="flex items-center justify-center py-5 text-xl font-bold text-center lg:text-heading-3 lg:leading-h-3 gap-x-5 lg:py-10">
            <img src="/static-assets/messages-2.ba902c7d.svg" alt="">
            <span>Frequently asked questions</span>
        </h3>
        <div class="flex flex-col px-1 lg:px-20 gap-y-4 ">
            <div class="accordion-container">
                <button class="accordion">How do I start the process of investing?</button>
                <div class="panel">
                    <p>
                        Simply create an account, once you have completed the account creation process, you will have immediate access to your personalized Quebec Food account. You can review your dashboard and click on new investment. Review the Tractor investment portfolios and select a project, enter the number of units you will like to invest in and click invest now then start earning cash value return <strong>(CVR)</strong> of up to <strong> 12.5%.</strong>
                    </p>
                </div>
            </div>
            <div class="accordion-container">
                <button class="accordion">How much can I invest?</button>
                <div class="panel">
                    <p>
                        The amount of investment varies from $30,000 - $50,000 depending on your choice of project “tractor, machinery and haulage trucks” selected, Minimum investment unit you can invest is One (1) Unit, while maximum Investment Units is 20units at an investment cycle per project.
                    </p>
                </div>
            </div>
            <div class="accordion-container">
                <button class="accordion">What’s the documents for my investment in the (TAHSV) scheme?</button>
                <div class="panel">
                    <div class="px-10 py-10">
                        <p class="font-bold">
                            You receive the following documents:
                        </p>

                        <ul class="list-disc">
                            <li>Payment acknowledgment & electronic deed of investment subscription Agreement </li>
                            <li> Provisional Letter of allocation for Land Asset backed security for your investment in Quebec Agritech City Residential Layout.</li>
                            <li>A Site layout plan (to identify your allocated plot.</li>
                            <li>Bank Guarantee (BG) for Investment above 100 units. (Optional)</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-container">
                <button class="accordion">When will I get back the invested money and accrued interest?</button>
                <div class="panel">
                    <p>
                        CVR payout to Investors shall be made quarterly and first payment of returns is 180 working days after delivering and commissioning of the projects <strong> (tractors, machinery and trucks) from manufacturers.</strong>
                    </p>
                </div>
            </div>
            <div class="accordion-container">
                <button class="accordion">Are there plans for Insurance?</button>
                <div class="panel">
                    <p>
                        Yes. We know that every business has its own risk, either systemic or non-systemic. At Quebec Food, security of investment and safety of investors' funds, trust are taken with Utmost importance. In other words, we know, understand and agree that we are investors' trust bank, and will therefore not compromise this fragile relationship. This has made the promoters to approach the Nigerian Agricultural Insurance Corporation <strong>(NAIC)</strong>  and other stakeholders in the insurance sector as a means of risk management and mitigation.
                    </p>
                </div>
            </div>
            <div class="accordion-container">
                <button class="accordion">Which are your choice of tractors, machinery and trucks manufacturers?</button>
                <div class="panel">
                    <p>
                        We are aware of the importance of building a solid business structure that can support the picture of the kind of world-class business we want to own. This is why we are committed to creating synergies with the Top 10 Popular Tractor companies in world like <strong> Mahindra & Mahindra, John Deere, Massey Ferguson, Case IH, Sonalika International, Escorts Group, Kubota, Fendt, Deutz Fahr, Claas,</strong> to help us build a prosperous business that will benefit all investors and project stakeholders.
                    </p>
                </div>
            </div>
            <div class="accordion-container">
                <button class="accordion">How committed is your team?</button>
                <div class="panel">
                    <p>
                        Every team member carries this level of dedication and commitment to the cause we stand for. It is our utmost priority to deliver on our promise. We are professionals in agriculture, economics and international trade. You can count on us!
                    </p>
                </div>
            </div>
            <div class="accordion-container">
                <button class="accordion">How are your investments protected?</button>
                <div class="panel">
                    <p>
                        We ensure a high probability of success by using industry best practices, we have built a robust model to minimize and mitigate risks in our agricultural investment portfolios. We explore and provide best possible risk mitigation measures that meet our promises made to investors and partners.
                    </p>
                </div>
            </div>
            <div class="accordion-container">
                <button class="accordion">How are tractors, machinery and trucks monitored for effective productivity? </button>
                <div class="panel">
                    <p>
                        At Quebec Foods, we have a team of field officers attached to each farm estate. These officers provide constant oversight on all farm operations. We then use drones and CCTV cameras to conduct farm surveillance, GPS systems shall be installed on tractors and trucks with a supervisor assign when on transit. Each investor can watch live progress of farm estates on the Quebec Foods social media platforms on real-time as we progress.
                    </p>
                </div>
            </div>
            <div class="accordion-container">
                <button class="accordion">How are investments Secured?  </button>
                <div class="panel">
                    <p>
                        Every investment on the Quebec Food platform is backed with data. We have a   dedicated team of agro-professionals, economists, and data scientists who constantly monitor every agricultural commodity project. This team conducts rigorous data mining and reviews our investment portfolios to minimize risks. With data, we can determine which commodity, location, and season would bring the maximum returns for our investors.
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