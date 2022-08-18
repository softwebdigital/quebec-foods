@extends('layouts.static')

@section('content')
        <!-- Hero for Processing Plant Page -->
        <section class="py-10 pt-32 pb-5 mt-10 lg:mb-10 section-container lg:mt-10">
            <div
                class="flex flex-col-reverse items-baseline justify-between text-center lg:flex-row md:items-start lg:text-left">
                <div class="py-2 md:px-0 md:w-2/5">
                    <div class="w-full py-6 lg:px-4">
                        <h1
                            class="mb-4 text-4xl font-bold leading-tight text-primary text-heading-4l md:leading-h-2 md:text-heading-1">
                            Invest in our processing plant scheme
                        </h1>
                        <p class="inline-block py-2 text-lg text-ink md:text-heading-6 md:leading-h-5 md:py-4">
                            Open an account and start investing in our processing plant scheme in <span
                                class="font-bold text-primary">just 5 minutes.</span>
                        </p>
                        <div
                            class="flex flex-col items-center justify-center my-2 text-center lg:flex-row lg:iterms-baseline lg:gap-x-6 lg:my-5 lg:justify-start">
                            <a href="{{ route('login') }}"
                                class="btn-primary my-4 py-5 md:text-lg md:py-5  lg:px-9 rounded-md flex justify-center  items-baseline gap-x-10 lg:gap-x-6 w-[80%] lg:w-1/2">
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
                <div class="md:w-3/5">
                    <div
                        class="bg-[url('/images/plant-hero-bg.png')] bg-contain bg-right-bottom bg-no-repeat lg:py-7 lg:px-8">
                        <img class="rounded-2xl drop-shadow-xl md:h-[450px]" src="./assets/media/About-Us-Image.png" alt="">
                    </div>
                </div>
            </div>
        </section>

        @php 
            $farms = App\Models\Package::where('type', 'plant')->where('status', 'open')->paginate(4);
        @endphp
        @if($farms->count() >= 1)
        <section class="bg-[#F3FFF9]">
            <section class="py-32 pb-10 mb-24 section-container">
            <div class="flex flex-col items-center justify-center my-1 text-center lg:flex-row lg:justify-between">
                <h2 class="text-4xl lg:text-heading-3 lg:leading-h-3 text-primary font-bold mb-5">Available Investments</h2>
                <a href="#" class="btn-primary my-4 py-5 md:text-lg md:py-5  lg:px-9 rounded-xl flex justify-center  items-baseline gap-x-10 lg:gap-x-6 w-[80%] lg:w-1/2" style="max-width: 300px;">
                    <span>
                        View Packages
                    </span>
                    <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z" fill="#ffffff"></path>
                    </svg>
                </a>
            </div>
            <div class="mt-20">
                <div class="flex flex-col lg:flex-row gap-x-5">
                        @foreach($farms as $farm)
                        <div class="!self-start lg:w-1/3 relative">
                            @if($farm->image == null)
                            <img class="rounded-3xl" src="/static-assets/farm-estate-hero-image.2b800cfc.png" alt="">
                            @else
                            <img class="rounded-3xl" src="{{ $farm->image }}" alt="" style="width: 100%; height: 260px; object-fit: cover;">
                            @endif
                            <div class="px-5 py-5 bg-white -translate-y-10 rounded-xl shadow-2xl lg:w-[90%]">
                            <h3 class="text-ink text-lg py-2 font-bold">{{ $farm->name }}</h3>
                            <p class="text-sm" style="display: -webkit-box; width: 100%; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $farm->description }}
                            </p>
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

        <section class="md:mt-6 lg:overflow-hidden">
            <div class="text-center section-container">
                <div class="flex flex-col-reverse items-center text-left lg:-mr-32 lg:flex-row">
                
                    <div class="py-2 shadow-lg md:px-0 md:w-[55%] rounded-3xl">
                        <div class="w-full px-5 py-4 mt-5 lg:mt-10 lg:px-10 ">

                        <div class="pb-5 text-left flex flex-col items-center gap-y-5">
                            <span class="py-2 px-4 rounded-3xl bg-primary text-white text-xs lg:text-sm self-start">Quebec Food Processing Industrial Park Ltd.</span>
                                <h3
                                    class="max-w-[400px] text-primary font-bold text-2xl lg:text-heading-4 lg:leading-h-5 self-start">
                                    Why Invest in Agro-Food Processing Plants
                                </h3>
                            </div>
                            <p class="inline-block py-1 text-sm text-ink md:text-[20px] md:leading-h-5 md:py-4">
                                Agro-Food processing is a key contributor to South Asia countries and motivates labor
                                movement from agriculture to manufacturing. This is to reduce the wastage level and fill
                                the increasing demand for processed food. Nigeria needs adequate infrastructure,
                                processing & storage facilities, and research/skill development to succeed in this
                                sector.
                            </p>
                            <p class="inline-block py-1 text-sm text-ink md:text-[20px] md:leading-h-5 md:py-4">
                                Based on this, the scheme is been introduced for Investors across board to take
                                advantage of the huge opportunities available in the food processing supply chain in
                                Nigeria, and to collaborate with us and invest their funds in their own little ways in
                                our planned food production and food processing plants to be set-up in Quebec Agritech
                                City, agro-processing industrial layout to reduce farm produce wastage and process what
                                the six (6) geopolitical zones have to offer in the non-oil sector
                            </p>
                        </div>
                    </div>
                    <div class="">
                        <img src="/static-assets/plant-silo.b9ccdcd1.png" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- INVESTMENT OVERVIEW -->
        <section class="section-container">
            <div
                class="flex flex-col lg:flex-row px-7 lg:px-16 gap-y-6 lg:gap-x-20 rounded-[32px] py-9 lg:py-14 bg-primary text-white ">
                <div class="flex flex-col w-full gap-3 lg:gap-6 lg:w-3/5">
                    <span class=" text-lg font-bold lg:text-[22px] lg:leading-h-4l">VENTURE OVERVIEW</span>
                    <h3 class="text-3xl font-bold lg:text-heading-3 lg:leading-h-3">The Agro-Food Processing Venture Scheme (AFPVS)</h3>
                    <p class="text-base text-white lg:text-lg md:text-[20px]">
                        This investment is absolutely without risk on your part, because investors capital are
                        collateralized with land backed asset security for 24months or Bank Guarantee (BG), until the
                        plants
                        are fully installed and commissioned for production to commence. This means you hold onto the
                        land
                        as your security for your invested capital pending when the plants are fully installed and
                        commissioned for production and you start earning returns on your investment six (6) months
                        after
                        commissioning of the plant.
                    </p>
                    <a href="{{ route('login') }}"
                        class="bg-white hidden  text-primary my-4 py-5 md:text-lg md:py-5  lg:px-9 rounded-lg lg:flex justify-center  items-baseline gap-x-10 lg:gap-x-6 w-[80%] lg:w-1/2">
                        <span>
                            Get Started
                        </span>
                        <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" class="fill-primary" clip-rule="evenodd"
                                d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z" />
                        </svg>
                    </a>
                </div>
                <div class="self-end w-full lg:w-2/5 lg:pb-20">
                    <img class="lg:block" src="/static-assets/plant-process-2.1602509f.svg" alt="25%">
                    <a href="{{ route('login') }}"
                        class="bg-white  lg:hidden text-primary my-4 py-5 md:text-lg md:py-5  lg:px-9 rounded-lg flex justify-center  items-baseline gap-x-10 lg:gap-x-6 w-[60%] lg:w-1/2 ">
                        <span>
                            Get Started
                        </span>
                        <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" class="fill-primary" clip-rule="evenodd"
                                d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z" />
                        </svg>
                    </a>
                </div>

            </div> 
        </section>

        <section class="splide mt-20 section-container" aria-labelledby="carousel-heading">


            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/slide-1.b7ca21a6.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/slide-2.1858cabd.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/slide-3.5020fd69.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/slide-4.3f09c98c.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/tractor-4.c63522e3.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/slide-1.b7ca21a6.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/slide-2.1858cabd.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/slide-3.5020fd69.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/slide-4.3f09c98c.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/tractor-4.c63522e3.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/slide-1.b7ca21a6.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/slide-2.1858cabd.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/slide-3.5020fd69.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/slide-4.3f09c98c.png" alt="">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-2xl" src="/static-assets/tractor-4.c63522e3.png" alt="">
                    </li>
                </ul>
            </div>
        </section>

        <section class="section-container border-b border-gray-400">
            <div>

            </div>
            <div class=" ">
                <div class="lg:w-[868px] px-5 lg:px-0">
                    <h3 class="text-primary font-bold text-lg lg:text-heading-3 lg:leading-h-3 self-start">Our Business
                        Structure</h3>

                    <div class="w-full py-4 mt-5 lg:mt-2">
                        <p class="inline-block py-1 text-sm text-ink md:text-[20px] md:leading-h-5 md:py-4">
                            The promoters are aware of the importance of building a solid business structure that can
                            support the picture of the kind of world-class business we want to own and manage, prior to
                            commencement of operations we are committed to only hiring the best hands that are
                            qualified,
                            hardworking, dedicated, customer-centered, and are ready to work to help us build a
                            prosperous
                            business that will benefit all our stakeholders. As a matter of fact, a profit-sharing
                            arrangement will be made available to all our senior management staff and members, it will
                            be
                            based on their performances for a period of five(5) years or more, as agreed by the Advisory
                            Board of the company “QUEBEC FOOD PROCESSING INDUSTRIAL PARKS LTD”.
                        </p>

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
                    <button class="accordion">What is Quebec Agro-Food Processing Venture Scheme all about (AFPVS)?</button>
                    <div class="panel">
                        <p>
                            AFPVS is an Agribusiness profit venture Scheme that allows you to invest your fund into Quebec Food Processing Industrial Parks Ltd planned Agro-Food processing plants to be set-up in the agro-processing industrial layout in Quebec Agritech City and Farm Estates across the geo-political zones in Nigeria.  
                            <br><br>
                            By your Investment, you are eligible to earn cash value return (CVR), for a tenure of 3years, 5years or 10years depending on the processing plant you desire and choose to invest in. 
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">Which food & Agro processing plants are available for start-up in this venture scheme</button>
                    <div class="panel">
                        <p>
                            The following processing plants are planned for the agro-processing industrial park layout in Quebec Agritech City and Farm Estates project sites and they are as follows: 
                        </p>
                        <div class="px-10 py-10">
                            <span class="font-bold">Processing Cassava into:</span>
                            <ul class="px-10 py-4 list-disc">
                                <li>High Quality Cassava Flour (HQCF),</li>
                                <li>High Quality Cassava Starch(HQCS),</li>
                                <li>High cassava Fructose Sweeteners (HCFS),</li>
                                <li>Garri (Fried Cassava Granules),</li>
                                <li>Odourless Fufu (Cassava Dough),</li>
                                <li>Lafun (Fermented Cassava Flour),</li>
                                <li>Tapioca (Cassava Flakes),</li>
                                <li>Animal Feed</li>
                            </ul>
                            <span class="font-bold">Other Processing Plants that deliberation is still ongoing with Manufacturers are: </span>
                            <ul class="px-10 py-4 list-disc">
                                <li>Palm Oil Crude, </li>
                                <li>Coconut Oil Crude,</li>
                                <li>Rice Mill,</li>
                                <li>Plantain Flour,</li>
                                <li>Cashew Nut Shell Liquid (CNSL)</li>
                                <li>High fructose corn syrup (HFCS)</li>
                            </ul>
                            <span class="font-bold">Tropical Fruits into Pulses, Pastes, Concentrates and Vegetables Processing Plant.</span>
                            <ul class="px-10 py-4 list-disc">
                                <li>Mangos, Pineapples, Guava, Papaya, Tamarind, Amla, pawpaw
                                </li>
                                <li>Onion, Ginger Paste, Garlic Paste and other spices.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">What is the amount of investment required in the venture scheme?</button>
                    <div class="panel">
                        <p>
                            The amount of investment varies from <strong> $2000USD - $5000USD </strong>per unit depending on your choice of plant to invest in. 
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">Can I invest in more than 1 Plant and Unit?</button>
                    <div class="panel">
                        <p>
                            Yes. Quebec Agritech City and Processing Plant project site is open for visitation every third Saturday of the month, any other days at investors request is solely the responsibility of the investor.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">What is the duration I can invest in this scheme?</button>
                    <div class="panel">
                        <p>
                            3years Plan, 5years Plan & 10years Plan
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">Can I visit the site under this venture scheme?</button>
                    <div class="panel">
                        <p>
                            Yes. Quebec Agritech City and Farm Estates project sites is open for visitation every third Saturday of the month, any other day at investors request is solely the responsibility of the investor. Our social media platforms are also available for live-stream inspections on request.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">What documents do I get when I choose to invest with the AFPVS scheme?</button>
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
                    <button class="accordion">How long can I Hold onto the land as a security for my investment?</button>
                    <div class="panel">
                        <p>You can hold onto the land for maximum of 24months. However, once you start earning returns, your right to the property is withdrawn immediately.</p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">When exactly will I start earning from my investment and how is my CVR paid Monthly, Quarterly or Yearly?</button>
                    <div class="panel">
                        <p>
                            <strong>CVR </strong> payout to Investors shall be made quarterly and First payment of returns is 180 working days after commissioning of the plants.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">Are there plans for Insurance of these Plants?</button>
                    <div class="panel">
                        <p>
                            Yes. We know that every business has its own risk, either systemic or non-systemic. At Quebec Food, security of investment and safety of investors' funds, trust are taken with Utmost importance. In other words, we know, understand and agree that we are investors' trust bank, and will therefore not compromise this fragile relationship. This has made the promoters to approach the Nigerian Agricultural Insurance Corporation (NAIC) and other stakeholders in the insurance sector as a means of risk management and mitigation when the plants are fully installed and production commence.
                        </p>
                    </div>
                </div>
                
                
                
                <div class="accordion-container">
                    <button class="accordion">How do you intend to market your products considering other competitors in the country?</button>
                    <div class="panel">
                        <p>Our take-off products is centered at the Cassava Value Chain which are used by raw materials for  food, , beverages, confectioneries, paper, textiles, adhesives and in pharmaceuticals; and this gives us an edge in the market considering our site locations (South West, South East & North Central Nigeria). 
                            <br>
                            We are also launching our Food Network called the Q-BEC Foodies Network to spread all our products to every part of Nigeria, Europe, Asia and North America through other partners involved in Quebec Agritech City & Farm Estates project. The cooperative arm of the company “Quebec AgrifoodPro Coop Group” would also be saddled with responsibility of marketing our home food products (cassava chips, cassava starch, cassava flour & garri), our products shall be licensed under the company's brand registered trademark name Q-BEC FOODS and marketed at such.
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