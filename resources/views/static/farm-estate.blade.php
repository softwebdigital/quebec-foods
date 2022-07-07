@extends('layouts.static')

@section('content')
    <!-- Hero for Farm Estate Page -->
    <section class="py-32 pb-10 mt-10 mb-24 section-container lg:mt-10">
        <div
          class="flex flex-col-reverse items-center justify-between text-center lg:flex-row md:items-start lg:text-left">
          <div class="py-2 md:px-0 md:w-1/2">
            <div class="w-full py-9 lg:px-4">
              <h1
                class="mb-4 text-4xl font-bold leading-tight text-primary text-heading-5 md:leading-h-1 md:text-heading-1">
                Invest in our farm estate and buy back scheme
              </h1>
              <p class="inline-block py-2 text-lg text-ink md:text-heading-5 md:leading-h-5 md:py-4">
                Open an account and start investing in our food processing scheme in just 5 minutes.
              </p>
              <div class="flex items-baseline justify-center my-2 text-center lg:my-5 lg:justify-start">
                <a href="#"
                  class="btn-primary my-4 py-5 md:text-lg md:py-5  px-9 rounded-md flex justify-center  items-baseline gap-x-10 lg:gap-x-6 w-[80%] lg:w-1/2">
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
              <img class="rounded-2xl drop-shadow-xl" src="/static-assets/farm-estate-hero-image.2b800cfc.png" alt="">
            </div>
          </div>
        </div>
      </section>

      <!-- Food Production Investment Scheme (FPIS) -->
      <section class="bg-[url('/images/farm-bg-section-2.png')] bg-cover w-full h-full lg:py-28">
        <div class="section-container ">
          <div
            class="bg-[#F3F7F5] rounded-2xl px-7 lg:px-20 py-12 max-w-[1000px] mx-auto text-center flex flex-col justify-center items-center gap-10">
            <span class="py-2 px-4 rounded-3xl bg-[#BFFCD9] text-primary text-xs lg:text-sm">QUEBEC AGRO-FOOD COOPERATIVE
              SOCIETY
              LTD</span>
            <h3 class="max-w-[400px] text-primary font-bold text-lg lg:text-heading-4 lg:leading-h-5">Food Production
              Investment
              Scheme (FPIS)</h3>
            <p class="text-[#414D5E] font-medium text-sm lg:text-[22px] lg:leading-8  text-justify md:text-center">
              The Food production Investment Scheme allows an agribusiness investor to invest his/her fund into the
              AGRO-FARM PRODUCE BUYBACK SCHEME of Quebec Food Processing Industrial Parks Ltd’s planned MECHANIZED CROP
              PRODUCTION to be set-up in the Food Production layout in Quebec Agritech City and Farm Estates project
              sites.
            </p>

            <p class="text-[#414D5E] font-medium text-sm lg:text-[22px] lg:leading-8  text-justify md:text-center">
              By your Investment, you are eligible to earn for a tenure of 18months, 36months & 60months depending on your
              choice of crop or livestock to invest in.
            </p>
            <a href="#"
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
      <section class="bg-[url('/images/farm-1.png')] bg-cover w-full h-full my-20 flex justify-end">
        <div class="lg:w-1/2">
          <div
            class="bg-[#F3F7F5] bg-opacity-90 lg:bg-opacity-100 shadow-3xl lg:rounded-tl-3xl lg:rounded-bl-3xl  px-7 lg:px-20 flex flex-col  py-10 lg:py-20 gap-10">

            <h3 class="text-primary font-bold text-2xl lg:text-heading-4 lg:leading-h-5">Why Invest In Agro-Farm Produce
              Buyback Scheme</h3>
            <p class="text-ink font-medium text-sm lg:text-lg lg:leading-8 ">
              Investing in Agro-Farm Produce Production is a good strategic move. One inevitable fact is that, whether the
              overall economy is in a recession or booming, people still have to eat. Because of this, Quebec Food
              management team & shareholders regards agriculture and farming investments as being recession-proof.

            </p>

            <p class="text-ink font-medium text-sm lg:text-lg lg:leading-8  ">
              Furthermore, as the world’s population increases, the needs to feed a growing population has become a
              serious subject matter to all nations and with the less land, farming will play an increasingly important
              role in sustaining global societies and the interest in agricultural activities (Food production) as an
              investment will continuously grow alongside the world’s population.
            </p>

            <p class="text-ink font-medium text-sm lg:text-lg lg:leading-8  ">
              Based on this, the scheme is been introduced for Nigerians both home and abroad, to take advantage of the
              huge opportunities available in the food supply chain in Nigeria, and to collaborate with us by investing
              their funds in their own little ways in the food production site layout in Quebec Agritech City and Farm
              Estates
            </p>
            <a href="#"
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

      <!-- Our business Structure -->
      <section class="section-container ">
        <div class="flex flex-col lg:flex-row justify-between ">
          <div class="lg:w-2/3 lg:px-10">
            <h3 class="text-primary font-bold text-2xl lg:text-heading-4 lg:leading-h-5">Our Business Structure</h3>
            <p class="text-ink font-medium text-sm lg:text-lg lg:leading-8 ">

              The Investment Scheme is open for public and private participation to invest in the various value chains,
              categorized below:
            </p>
          </div>
          <div class="lg:w-1/4 lg:px-10">
            <a href="#"
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
        <div class="py-10 lg:py-20">
          <div class="flex flex-col lg:flex-row gap-x-5">
            <div class="!self-start lg:w-1/3 relative">
              <img class="rounded-3xl" src="/static-assets/image1.9d3d8362.png" alt="">
              <div class="px-5 py-5 bg-white -translate-y-10 rounded-xl shadow-2xl lg:w-[90%]">
                <h3 class="text-ink text-lg py-2 font-bold">Mechanized Crop Production</h3>
                <p class="text-sm">
                  This include cassava, rice, maize, millet, soya beans, sugar cane, tomato, vegetables, Fruits, Plantain
                  and others.
                </p>
                <hr class="border-t-2 bg-[#414D5E] my-3">
                <a href="#"
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
            <div class="lg:self-center lg:w-1/3 lg:mt-16">
              <img class="rounded-3xl" src="/static-assets/image2.6f61e4a2.png" alt="">
              <div class="px-5 py-5 bg-white -translate-y-10 rounded-xl shadow-2xl lg:w-[90%]">
                <h3 class="text-ink text-lg py-2 font-bold">Cash Crops</h3>
                <p class="text-sm">
                  This include  cashew, cocoa and palm kernel among others.
                </p>
                <hr class="border-t-2 bg-[#414D5E] my-3">
                <a href="#"
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
            <div class="lg:self-center lg:w-1/3 lg:mt-40">
              <img class="rounded-3xl" src="/static-assets/image3.9df0d2eb.png" alt="">
              <div class="px-5 py-5 bg-white -translate-y-10 rounded-xl shadow-2xl lg:w-[90%]">
                <h3 class="text-ink text-lg py-2 font-bold">Livestock cultivation</h3>
                <p class="text-sm">
                  This includes Dairy and aquaculture (fisheries) development
                </p>
                <hr class="border-t-2 bg-[#414D5E] my-3">
                <a href="#"
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
            <div class="relative w-full my-6 bg-primary curved lg:my-0 lg:px-16 lg:py-24">
              <div class="absolute download-tag bottom-6 -left-14">
                <img src="/static-assets/download-tag.4d6957af.png" alt="">
              </div>
              <div class="content-right">
                <h3>Get Started Here</h3>
                <p>Open an account and start investing in our processing plant scheme
                  <span class="underline decoration-orange decoration-4">in just 5 minutes</span>.
                </p>
                <a href="#" class="btn ">
                  <i class="fa-brands fa-google-play"></i>
                  <span>Download App</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

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
                    Simply create an account, Once you have completed the account creation
                    process, you will
                    have immediate
                    access to your personalized Quebec Food account. You can review your
                    dashboard and click on
                    new
                    investment. Review the farm investment portfolios and select a farm. Enter
                    the number of
                    units you will
                    like to invest in and click invest now.
                </p>
            </div>
        </div>
        <div class="accordion-container">
            <button class="accordion">What is the investment duration?</button>
            <div class="panel">
                <p>The program cycle is dependent on the specific farm type. It ranges from
                    18months to 60 months.</p>
            </div>
        </div>
        <div class="accordion-container">
            <button class="accordion">What is the amount of investment required per
                unit?</button>
            <div class="panel">
                <p>
                    The amount of investment varies from $1000USD – $2000USD depending on your
                    choice of farm investment package.
                </p>
            </div>
        </div>
        <div class="accordion-container">
            <button class="accordion">What is the Minimum or Maximum Unit?</button>
            <div class="panel">
                <p>
                    The minimum unit of investment is one unit. Participants can take as many
                    units available but not exceeding 100 units at any given time and cycle of
                    investment.
                </p>
            </div>
        </div>
        <div class="accordion-container">
            <button class="accordion">Is there any plan for insurance of the farms?</button>
            <div class="panel">
                <p>
                    Yes, we know that every business has its own risk, either systemic or
                    non-systemic. At Quebec FOODPRO IP, security of investment and safety of
                    investors’ trust are taken with utmost importance. In other words, we know,
                    understand and agree that we are investors’ trust bank, and we will
                    therefore not compromise this fragile relationship. This has made us to
                    commission the services of the Nigerian Agricultural Insurance Corporation
                    (NAIC) and Leadway Insurance as a means of risk management and mitigation.
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
                        South West (Oyo & Ondo State)
                    </li>
                    <li> South-South (Delta, Bayslea, Rivers, Cross-River & Akwa Ibom State)
                    </li>
                    <li>South East (Imo, Ebonyi, Abia & Enugu State)</li>
                    <li>North Central (Nassarawa, Kogi & Kwara State)</li>
                    <li> North West (Sokoto & Taraba State)</li>
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
                    <li> A receipt of payment,</li>
                    <li> Certificate of Investment & Deed of Investment</li>
                    <li> Provisional Letter of allocation for Land Asset backed security for
                        your</li>
                    <li>investment in Quebec Agritech City Residential Layout.</li>
                    <li>A Site layout plan (to identify your allocated plot)</li>
                    <li>Bank Guarantee (BG) for Investment above 100 units.</li>
                </ul>
            </div>
        </div>
        <div class="accordion-container">
            <button class="accordion">How long can I Hold onto the land as a security for my
                investment?</button>
            <div class="panel">
                <p>
                    You can hold onto the land for a maximum period of 24months. However, once
                    your investment is matured, your right to the property is withdrawn
                    immediately.
                </p>
            </div>
        </div>
        <div class="accordion-container">
            <button class="accordion">Does my earnings include my capital for my chosen tenure
                of investment?</button>
            <div class="panel">
                <p>
                    Your earnings are inclusive of your invested capital for investment above
                    18months spread within the 36months or 60months. This is to ensure all
                    investors gradually get their fund within the investment tenure.
                </p>
            </div>
        </div>
        <div class="accordion-container">
            <button class="accordion">What do I stand to benefit as an investor towards the
                actualization of the project?</button>
            <div class="panel">
                <p>
                    Investing in agricultural value chain has the potential of giving you
                    financial freedom and generating enormous profits for you and other
                    prospective investors.

                    <br>

                    Quebec Food Processing Industrial Parks Ltd’s aim and objective of launching
                    this scheme is to establish a financial legacy with greater sense of
                    financial stability for Nigerians via entrepreneuring activities in the
                    non-oil sector for global economic impact.
                    <br>
                    As an investor and a Nigerian through your investment you have contributed
                    to the economy of this nation and as well saved this Nation from famine,
                    starvation and hunger, and also restored hope to devoted farmers in Nigeria.
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