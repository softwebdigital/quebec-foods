@extends('layouts.static')

@section('content')
        <!-- Hero for Processing Plant Page -->
        <section class="py-10 pt-32 pb-5 mt-10 lg:mb-10 section-container lg:mt-10">
            <div
                class="flex flex-col-reverse items-baseline justify-between text-center lg:flex-row md:items-start lg:text-left">
                <div class="py-2 md:px-0 md:w-2/5">
                    <div class="w-full py-6 lg:px-4">
                        <h1
                            class="mb-4 text-4xl font-bold leading-tight text-primary text-heading-4l md:leading-h-1 md:text-heading-1">
                            Invest in our our processing plant scheme
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
                        <img class="rounded-2xl drop-shadow-xl md:h-[450px]" src="/static-assets/plant-hero.32d84d9c.png" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="md:mt-6 lg:my-20 lg:mb-32">
            <div class="text-center section-container">

                <div
                    class="flex flex-col-reverse items-center lg:justify-between lg:gap-x-36 text-left lg:flex-row relative">
                    <div class="hidden lg:block lg:w-[15%]"></div>
                    <div class="py-5 shadow-lg md:px-0 md:absolute rounded-3xl bg-white md:w-[669px]">
                        <div class="px-5 lg:px-10 py-5 text-left flex flex-col items-center gap-y-5">
                            <span class="py-2 px-4 rounded-3xl bg-primary text-white text-xs lg:text-sm self-start">Quebec Food Processing Industrial Park Ltd.</span>
                            <h3
                                class="max-w-[400px] text-primary font-bold text-2xl lg:text-heading-4 lg:leading-h-5 self-start">
                                Why Invest in Agro-Food Processing Plants</h3>
                        </div>
                        <div class="w-full px-5 py-4 mt-5 lg:mt-2 lg:px-10 ">
                            <p class="inline-block py-1 text-sm text-ink md:text-[18px] md:leading-h-5 md:py-4">
                                Agro-Food processing is a key contributor to South Asia countries and motivates labor
                                movement from agriculture to manufacturing. This is to reduce the wastage level and fill
                                the increasing demand for processed food. Nigeria needs adequate infrastructure,
                                processing & storage facilities, and research/skill development to succeed in this
                                sector.
                            </p>
                            <p class="inline-block py-1 text-sm text-ink md:text-[18px] md:leading-h-5 md:py-4">
                                Based on this, the scheme is been introduced for Investors across board to take
                                advantage of the huge opportunities available in the food processing supply chain in
                                Nigeria, and to collaborate with us and invest their funds in their own little ways in
                                our planned food production and food processing plants to be set-up in Quebec Agritech
                                City, agro-processing industrial layout to reduce farm produce wastage and process what
                                the six (6) geopolitical zones have to offer in the non-oil sector
                            </p>
                            <!-- <div
                                class="flex flex-col items-center justify-center my-1 text-center lg:flex-row lg:iterms-baseline lg:gap-x-6 lg:my-5 lg:justify-start">
                                <a href="#"
                                    class="btn-primary my-4 py-5 md:text-lg md:py-5  lg:px-9 rounded-md flex justify-center  items-baseline gap-x-10 lg:gap-x-6 w-[80%] lg:w-1/2">
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
                            </div> -->
                        </div>
                    </div>
                    <div class="lg:w-[85%]">
                        <img class="lg:rounded-3xl lg:!w-[900px]" src="/static-assets/plant-silo.b9ccdcd1.png" alt="">
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
                    <p class="text-base text-white lg:text-lg">
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
                    <img class="hidden lg:block" src="/static-assets/plant-process-2.1602509f.svg" alt="25%">
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
                        <p class="inline-block py-1 text-sm text-ink md:text-[18px] md:leading-h-5 md:py-4">
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
        <section class="mobile-cta-section">
            <div
                class="grid items-center content-center justify-between grid-cols-1 py-4 mx-auto max-w-screen-max md:grid-cols-2 lg:grid-cols-8">
                <div class="lg:col-start-1 lg:col-end-4">
                    <img class="app" src="/static-assets/Mobile-App.a7165a51.png" alt="">
                </div>
                <div class="px-3 lg:col-start-5 lg:col-end-9 lg:px-0">
                    <div class="relative w-full my-6 bg-primary curved lg:my-0 lg:px-16 lg:py-24" style="border-radius: 0px 40px 40px 0px; padding-top: 2rem; padding-bottom: 2rem;">
                        <div class="absolute download-tag bottom-6 -left-14">
                            <!-- <img src="/static-assets/download-tag.4d6957af.png" alt=""> -->
                        </div>
                        <div class="content-right">
                            <h3>Get Started Here</h3>
                            <p>Open an account and start investing in our processing plant scheme
                                <span class="underline decoration-orange decoration-4">in just 5 minutes</span>.
                            </p>
                            <!-- <a href="#" class="btn ">
                                <i class="fa-brands fa-google-play"></i>
                                <span>Download App</span>
                            </a> -->
                            <a href="{{ route('login') }}" class="btn ">
                                <!-- <i class="fa-brands fa-google-play"></i> -->
                                <span>Sign in</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQs Section -->
        <section class="mb-20 section-container ">
            <h3
                class="flex items-center justify-center py-5 text-xl font-bold text-center lg:text-heading-3 lg:leading-h-3 gap-x-5 lg:py-10">
                <img src="/static-assets/messages-2.ba902c7d.svg" alt="">
                <span>Frequently asked questions</span>
            </h3>
            <div class="flex flex-col px-1 lg:px-20 gap-y-4 ">
                <div class="accordion-container">
                    <button class="accordion">What is Quebec Food Processing Plants Investment Scheme
                        all about (QFPPIS)?</button>
                    <div class="panel">
                        <p>
                            QFPPIS is an Agri-Business Small and Medium Enterprises Investment Scheme
                            that allows you to invest your fund into Quebec Food Processing Industrial
                            Parks Ltd planned Agro-Food processing plants to be set-up in the
                            agro-processing industrial layout in Quebec Agritech City and Farm Estates
                            across the geo-political zones in Nigeria.
                            <br><br>
                            By your Investment, you are eligible to earn up to thirty-three percent
                            (33%) per annum as return on investment (ROI), for a tenure of 3years,
                            5years or 10years depending on the processing plant you desire and choose to
                            invest in.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">What is the amount of investment required and the planned
                        processing plants in this scheme?</button>
                    <div class="panel">
                        <p>
                            The amount of investment varies from $1500USD – $3500USD depending on your
                            choice of plant to invest on. Ten (10) processing plants is being planned
                            for the agro processing industrial park layout in Quebec Agritech City and
                            Farm Estates they are as follows:
                        </p>
                        <div class="px-10 py-10">
                            <span class="font-bold">Processing Cassava into:</span>
                            <ul class="px-10 py-4 list-disc">
                                <li>Flour,</li>
                                <li>Starch & Glucose Syrup,</li>
                                <li>Garri (Fried Cassava Granules)</li>
                                <li>Fufu (Cassava Dough)</li>
                                <li>Lafun (Fermented Cassava Flour)</li>
                                <li>Tapioca (Cassava Flakes),</li>
                                <li>Animal Feed</li>
                            </ul>
                            <span class="font-bold">Other Processing Plants that deliberation is still
                                ongoing with Manufacturers are:</span>
                            <ul class="px-10 py-4 list-disc">
                                <li>Ethanol (for biofuels),</li>
                                <li>Palm Oil Crude,</li>
                                <li>Coconut Oil Crude.</li>
                                <li>Fufu (Cassava Dough)</li>
                                <li>Rice Mill</li>
                                <li>Plantain Flour</li>
                            </ul>
                            <span class="font-bold">Tropical Fruits into Pulses, Pastes, Concentrates
                                and Vegetables Processing Plant.</span>
                            <ul class="px-10 py-4 list-disc">
                                <li>Mangos, Cashew, Pineapples, Guava, Papaya, Tamarind, Amla, pawpaw
                                </li>
                                <li>Onion, Ginger Paste, Garlic Paste and other spices.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">Can I invest in more than 1 Plant and Slot?</button>
                    <div class="panel">
                        <p>
                            Yes you can
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">What is the duration for which I can invest in this
                        scheme?</button>
                    <div class="panel">
                        <p>
                            3years Plan, 5years Plan & 10years Plan
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">What is the Return on Investment (RO1)?</button>
                    <div class="panel">
                        <p>
                            For 5 years plan, you get half of the stated percentage of return on
                            investment of the plant you choose to invest in.
                        </p>
                        <p>
                            For 10 years plan, you get the full stated percentage of return on
                            investment of the plant you choose to invest in.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">Can I choose to visit the site under this investment
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
                    <button class="accordion">What documents do I get when I choose to invest with the
                        QFPPI scheme?</button>
                    <div class="panel">
                        <div class="px-10 py-10">
                            <p class="font-bold">
                                You receive the following documents:
                            </p>

                            <ul class="list-disc">
                                <li>A receipt of payment & Deed of Investment</li>
                                <li> Provisional Letter of allocation for Land Asset backed security for
                                    your investment in Quebec Agritech City Residential Layout.</li>
                                <li>A Site layout plan (to identify your allocated plot)</li>
                                <li>Bank Guarantee (BG) for Investment above 100 slots</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">How long can I Hold onto the land as a security for my
                        investment?</button>
                    <div class="panel">
                        <p>
                            You can hold onto the land for maximum of 24months. However, once you start
                            earning returns on your investment, your right to the property is withdrawn
                            immediately.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">When exactly will I start earning from my investment and
                        how is my ROI paid Monthly, Quarterly or Yearly?</button>
                    <div class="panel">
                        <p>
                            ROI payout to Investors shall be made quarterly and First payment of returns
                            is 180 working days after commissioning of the plants.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">Does my earnings include my capital for my chosen tenure
                        of investment?</button>
                    <div class="panel">
                        <p>
                            Your earnings is inclusive of your invested capital spread within 3years,
                            5years or 10years,
                            <br>
                            <br>
                            this is to ensure all investors gradually gets their fund within the
                            investment tenure.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">What do I stand to benefit as an investor towards the
                        actualization of the project?</button>
                    <div class="panel">
                        <p>
                            Investing in cassava value chain processing has the potential of giving you
                            financial freedom and generating enormous profits for you and other
                            prospective investors.
                        </p>
                        <p>
                            Quebec Food Processing Industrial Parks Ltd aim and objectives of launching
                            this scheme is to establish a financial legacy with greater sense of
                            financial stability for Nigerians via entrepreneuring activities in the
                            non-oil sector for global economic impact.
                        </p>
                        <br>
                        <br>
                        <p>
                            As an investor and a Nigerian through your investment you have contributed
                            to the economy of this nation and as well save this Nation from famine,
                            starvation and hunger ,and also reduce importation of processed foods from
                            other nations in the world, and most especially create jobs for younger
                            generation and investment opportunities.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">Are there plans for Insurance of these Plants?</button>
                    <div class="panel">
                        <p>
                            Yes. We know that every business has its own risk, either systemic or
                            non-systemic. At
                            Quebec Food, security of investment and safety of investors’ funds, trust
                            are taken with

                            Utmost importance. In other words, we know, understand and agree that we are
                            investors’ trust bank, and will therefore not compromise this fragile
                            relationship. This has made the promoters to approach the Nigerian
                            Agricultural Insurance Corporation (NAIC) and other stakeholders in the
                            insurance sector as a means of risk management and mitigation when the
                            plants are fully installed and production commence.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <button class="accordion">How do you intend to market your products considering
                        other competitors in the country?</button>
                    <div class="panel">
                        <p>
                            Our take-off products is centered at the Cassava Value Chain and this gives
                            us an edge in the market considering our location. We shall be launching our
                            Food Network called the Q-BEC Foods Network a multi-level Marketing scheme
                            to spread all our products to every part of Nigeria, Europe, Asia and North
                            America through other partners involved in Quebec Agri-tech City & Farm
                            Estates project. The cooperative arm of the company “Quebec AgrifoodPro Coop
                            Group” would also be saddled with responsibility of marketing our products,
                            our products shall be licensed under the company’s brand registered
                            trademark name Q-BEC FOODS and marketed at such.
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