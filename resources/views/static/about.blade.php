@extends('layouts.static')

@section('content')
    <!-- Hero for About Page -->
    <section class="mt-20 lg:overflow-hidden">
        <div class="lg:-mr-10 flex flex-col-reverse lg:flex-row items-center gap-6 text-center lg:text-left">
          <div class="px-6 py-5 lg:pl-20 md:px-0 md:w-2/5">
            <h1 class="text-4xl lg:text-heading-1 lg:leading-h-1 text-[#192434] font-bold mb-5">About Us</h1>
            <p class="text-base lg:text-xl leading-5 lg:leading-8 text-gray-700 font-normal">
              Quebec Food Industrial Parks Ltd is a registered private company limited by shares under the Companies
              and Allied Matters Act 2020 of the Federal Republic of Nigeria with RC: 1710593. 
            </p>
            <p style="padding-top: 20px" class="text-base lg:text-xl leading-5 lg:leading-8 text-gray-700 font-normal">
            The company is established to grow, process, package, and export healthy food products, with experienced
            directors and an outstanding management team to pilot its affairs and operations globally.
            </p>
          </div>
          <div class="">
            <img src="/static-assets/quebec-103.png" alt="">
          </div>
        </div>
      </section>

      <!-- Our Mission -->
      <section class="lg:py-20">
        <div class="text-center bg-[url('/images/pattern-bg.png')] bg-cover px-10">
          <h2 class="text-4xl md:text-heading-3 font-bold py-5 md:py-10 md:leading-h-3 text-ink">Our Mission</h2>
          <p class="max-w-[978px] mx-auto text-base md:text-2xl text-[#192434]">
          Our mission is to add mutual value to our partners and transformative capital to Agriculture by converting
          uncultivated farmlands into Farm Estates and setting up processing plants to open alternative income to all
          classes of investors with the core aim of driving agriculture toward sustainability on a massive scale.
          </p>
        </div>
      </section>
      <section class="bg-[#F3FFF9]" style="margin-top: 77px;">
        <section class="section-container">
          <div class="px-2 py-1 lg:py-0 md:px-0 lg:w-1/2">
                    <h2 class="text-4xl lg:text-heading-3 lg:leading-h-3 text-primary font-bold mb-5">Our Products</h2>
                    <p class="text-sm lg:text-lg text-gray-700 font-normal">
                      We are committed to producing, processing, packaging, and exporting healthy food products such as; highquality cassava products, fruits, vegetables, and others for local consumption and the global market.
                    </p>
                  </div>
        </section>
          
        <section class="splide section-container" aria-labelledby="carousel-heading">
            
          <div class="splide__track">
              <ul class="splide__list">
                  <li class="splide__slide">
                      <img class="rounded-2xl" src="/static-assets/quebec-cassava-meal.jpg" alt="">
                  </li>
                  <li class="splide__slide">
                      <img class="rounded-2xl" src="/static-assets/quebec-cassava-meal-garri.jpg" alt="">
                  </li>
                  <li class="splide__slide">
                      <img class="rounded-2xl" src="/static-assets/quebec-cassava-starch.jpg" alt="">
                  </li>
                  <li class="splide__slide">
                      <img class="rounded-2xl" src="/static-assets/quebec-cocoyam-flour.jpg" alt="">
                  </li>
                  <li class="splide__slide">
                      <img class="rounded-2xl" src="/static-assets/quebec-plantain-meal.jpg" alt="">
                  </li>
                  <li class="splide__slide">
                      <img class="rounded-2xl" src="/static-assets/quebec-poundoyam-flour.jpg" alt="">
                  </li>
              </ul>
          </div>
        </section>
      </section>
      <!-- Our Processess -->
      <section class="section-container pb-10 pt-24 lg:mt-10">
        <div class="flex flex-col lg:flex-row items-center gap-6">
          <div class="px-6 py-5 lg:py-0 md:px-0 lg:w-1/2">
            <h2 class="text-4xl lg:text-heading-3 lg:leading-h-3 text-[#192434] font-bold mb-5">Our Processes</h2>
            <p class="text-sm lg:text-lg md:text-2xl text-gray-700 font-normal">
            We enhance Farm produce production and minimize post-harvest losses by processing, packaging for local
            consumption, and exporting while investors earn over medium to long term as an alternative medium of
            investment.
            </p>
          </div>
          <div
            class=" grid grid-cols-1 lg:grid-cols-12 md:w-1/2 gap-y-10 lg:bg-[url('/images/Rect.png')] bg-[length:382px_386px] bg-right-top bg-no-repeat py-10 px-5 mx-4">
            <div
              class="lg:col-start-2 lg:col-end-7 bg-primary px-5 py-10 flex flex-col justify-center items-center rounded-2xl">
              <div class="p-5 h-16 w-16 rounded-full bg-white">
                <img src="/static-assets/profile-add.8fa32564.svg" alt="">
              </div>
              <span class="text-lg text-center lg:text-xl pt-5 text-white">Create Account</span>
            </div>
            <div
              class="lg:col-start-8 lg:col-end-13 bg-primary px-5 py-10 flex flex-col justify-center items-center rounded-2xl">
              <div class="p-5 h-16 w-16 rounded-full bg-white">
                <img src="/static-assets/Work.45c1bf1d.svg" alt="">
              </div>
              <span class="text-lg text-center lg:text-xl pt-5 text-white">Choose Package</span>
            </div>

            <div
              class="lg:col-start-1 lg:col-end-6 bg-primary px-10 lg:px-5 py-10 flex flex-col justify-center items-center rounded-2xl">
              <div class="p-5 h-16 w-16 rounded-full bg-white">
                <img src="/static-assets/Activity.fbe09a0b.svg" alt="">
              </div>
              <span class="text-lg lg:text-xl pt-5 text-white">Get Returns</span>
            </div>
            <div
              class="lg:col-start-7 lg:col-end-12 bg-primary px-10 lg:px-5 py-10 flex flex-col justify-center items-center rounded-2xl">
              <div class="p-5 h-16 w-16 rounded-full bg-white">
                <img src="/static-assets/Chart.bc75a1dd.svg" alt="">
              </div>
              <span class="text-lg lg:text-xl pt-5 text-white">Increase Income</span>
            </div>
          </div>
        </div>
      </section>

      <!-- Details About Us -->
      <section class="section-container pb-10 py-32 mb-24 lg:mt-10">
        <div class="grid lg:grid-cols-7 lg:flex-row justify-between lg:mx-auto mx-6 max-w-[100vw] lg:gap-x-5">
          <div
            class="flex flex-row lg:col-span-2 justify-start lg:flex-col gap-x-4 lg:gap-y-10 lg:border-r lg:border-[#DBDFE5] py-20 lg:py-1">
            <button class="tab-btn active-tab-btn" id="defaultOpen" onclick="openCity(event, 'overview') ">
              <div class="">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z" stroke-width="1.5"
                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <span>Overview</span>
            </button>
            <button class="tab-btn" onclick="openCity(event, 'infrastructure') ">
              <div class="">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M12.5007 22.0001H4.0807C2.9207 22.0001 1.9707 21.0701 1.9707 19.9301V5.09011C1.9707 2.47011 3.9207 1.2801 6.3107 2.4501L10.7507 4.63011C11.7107 5.10011 12.5007 6.3501 12.5007 7.4101V22.0001Z"
                    stroke="#00A451" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path
                    d="M21.97 15.0601V18.8401C21.97 21.0001 20.97 22.0001 18.81 22.0001H12.5V10.4201L12.97 10.5201L17.47 11.5301L19.5 11.9801C20.82 12.2701 21.9 12.9501 21.96 14.8701C21.97 14.9301 21.97 14.9901 21.97 15.0601Z"
                    stroke="#00A451" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M5.5 9.00012H8.97" stroke="#00A451" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                  <path d="M5.5 13.0001H8.97" stroke="#00A451" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                  <path
                    d="M17.4707 11.5301V14.7501C17.4707 15.9901 16.4607 17.0001 15.2207 17.0001C13.9807 17.0001 12.9707 15.9901 12.9707 14.7501V10.5201L17.4707 11.5301Z"
                    stroke="#00A451" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path
                    d="M21.9607 14.8701C21.9007 16.0501 20.9207 17.0001 19.7207 17.0001C18.4807 17.0001 17.4707 15.9901 17.4707 14.7501V11.5301L19.5007 11.9801C20.8207 12.2701 21.9007 12.9501 21.9607 14.8701Z"
                    stroke="#00A451" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

              </div>
              <span>Infrastructure</span>
            </button>
            <button class="tab-btn " onclick="openCity(event, 'products') ">
              <div class="">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.16992 7.44L11.9999 12.55L20.7699 7.46997" stroke="#00A451" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M12 21.61V12.54" stroke="#00A451" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                  <path
                    d="M9.9306 2.48L4.59061 5.45003C3.38061 6.12003 2.39062 7.80001 2.39062 9.18001V14.83C2.39062 16.21 3.38061 17.89 4.59061 18.56L9.9306 21.53C11.0706 22.16 12.9406 22.16 14.0806 21.53L19.4206 18.56C20.6306 17.89 21.6206 16.21 21.6206 14.83V9.18001C21.6206 7.80001 20.6306 6.12003 19.4206 5.45003L14.0806 2.48C12.9306 1.84 11.0706 1.84 9.9306 2.48Z"
                    stroke="#00A451" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M16.9998 13.24V9.58002L7.50977 4.09998" stroke="#00A451" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <span>Products</span>
            </button>
            <button class="tab-btn fill" onclick="openCity(event, 'quality-assurance') ">
              <div class="">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M12 16.75C11.6 16.75 11.2 16.72 10.82 16.65C8.7 16.34 6.77 15.12 5.55 13.31C4.7 12.03 4.25 10.54 4.25 9C4.25 4.73 7.73 1.25 12 1.25C16.27 1.25 19.75 4.73 19.75 9C19.75 10.54 19.3 12.03 18.45 13.31C17.22 15.13 15.29 16.34 13.15 16.66C12.8 16.72 12.4 16.75 12 16.75ZM12 2.75C8.55 2.75 5.75 5.55 5.75 9C5.75 10.25 6.11 11.45 6.79 12.47C7.78 13.93 9.33 14.91 11.05 15.16C11.69 15.27 12.32 15.27 12.91 15.16C14.66 14.91 16.21 13.92 17.2 12.46C17.88 11.44 18.24 10.24 18.24 8.98999C18.25 5.54999 15.45 2.75 12 2.75Z"
                    fill="#00A451" />
                  <path
                    d="M6.46933 22.59C6.32933 22.59 6.19933 22.57 6.05933 22.54C5.40933 22.39 4.90933 21.89 4.75933 21.24L4.40933 19.77C4.38933 19.68 4.31933 19.61 4.21933 19.58L2.56933 19.19C1.94933 19.04 1.45933 18.58 1.28933 17.97C1.11933 17.36 1.28933 16.7 1.73933 16.25L5.63933 12.35C5.79933 12.19 6.01933 12.11 6.23933 12.13C6.45933 12.15 6.65933 12.27 6.78933 12.46C7.77933 13.92 9.32933 14.91 11.0593 15.16C11.6993 15.27 12.3293 15.27 12.9193 15.16C14.6693 14.91 16.2193 13.92 17.2093 12.46C17.3293 12.27 17.5393 12.15 17.7593 12.13C17.9793 12.11 18.1993 12.19 18.3593 12.35L22.2593 16.25C22.7093 16.7 22.8793 17.36 22.7093 17.97C22.5393 18.58 22.0393 19.05 21.4293 19.19L19.7793 19.58C19.6893 19.6 19.6193 19.67 19.5893 19.77L19.2393 21.24C19.0893 21.89 18.5893 22.39 17.9393 22.54C17.2893 22.7 16.6193 22.47 16.1993 21.96L11.9993 17.13L7.79933 21.97C7.45933 22.37 6.97933 22.59 6.46933 22.59ZM6.08933 14.03L2.79933 17.32C2.70933 17.41 2.71933 17.51 2.73933 17.57C2.74933 17.62 2.79933 17.72 2.91933 17.74L4.56933 18.13C5.21933 18.28 5.71933 18.78 5.86933 19.43L6.21933 20.9C6.24933 21.03 6.34933 21.07 6.40933 21.09C6.46933 21.1 6.56933 21.11 6.65933 21.01L10.4893 16.6C8.78933 16.27 7.22933 15.36 6.08933 14.03ZM13.5093 16.59L17.3393 20.99C17.4293 21.1 17.5393 21.1 17.5993 21.08C17.6593 21.07 17.7493 21.02 17.7893 20.89L18.1393 19.42C18.2893 18.77 18.7893 18.27 19.4393 18.12L21.0893 17.73C21.2093 17.7 21.2593 17.61 21.2693 17.56C21.2893 17.51 21.2993 17.4 21.2093 17.31L17.9193 14.02C16.7693 15.35 15.2193 16.26 13.5093 16.59Z"
                    fill="#00A451" />
                  <path
                    d="M13.8911 12.89C13.6311 12.89 13.3211 12.82 12.9511 12.6L12.0011 12.03L11.0511 12.59C10.1811 13.11 9.61112 12.81 9.40112 12.66C9.19112 12.51 8.74112 12.06 8.97112 11.07L9.21112 10.04L8.41112 9.29999C7.97112 8.85999 7.81112 8.33001 7.96112 7.85001C8.11112 7.37001 8.55112 7.02999 9.17112 6.92999L10.2411 6.75L10.7511 5.63C11.0411 5.06 11.4911 4.73999 12.0011 4.73999C12.5111 4.73999 12.9711 5.07001 13.2511 5.64001L13.8411 6.82001L14.8311 6.94C15.4411 7.04 15.8811 7.37999 16.0411 7.85999C16.1911 8.33999 16.0311 8.87 15.5911 9.31L14.7611 10.14L15.0211 11.07C15.2511 12.06 14.8011 12.51 14.5911 12.66C14.4811 12.75 14.2411 12.89 13.8911 12.89ZM9.61112 8.39001L10.3011 9.07999C10.6211 9.39999 10.7811 9.94 10.6811 10.38L10.4911 11.18L11.2911 10.71C11.7211 10.46 12.3011 10.46 12.7211 10.71L13.5211 11.18L13.3411 10.38C13.2411 9.93 13.3911 9.39999 13.7111 9.07999L14.4011 8.39001L13.5311 8.23999C13.1111 8.16999 12.6911 7.86001 12.5011 7.48001L12.0011 6.5L11.5011 7.5C11.3211 7.87 10.9011 8.19001 10.4811 8.26001L9.61112 8.39001Z"
                    fill="#00A451" />
                </svg>

              </div>
              <span>Quality Assurance</span>
            </button>
            <button class="tab-btn fill" onclick="openCity(event, 'investments') ">
              <div class="">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M12.897 0.8421C13.311 0.8421 13.647 1.1781 13.647 1.5921C13.647 2.0061 13.311 2.3421 12.897 2.3421H5.629C3.121 2.3421 1.5 4.0661 1.5 6.7361V14.8181C1.5 17.5231 3.082 19.2031 5.629 19.2031H14.233C16.741 19.2031 18.362 17.4821 18.362 14.8181V7.7791C18.362 7.3651 18.698 7.0291 19.112 7.0291C19.526 7.0291 19.862 7.3651 19.862 7.7791V14.8181C19.862 18.3381 17.6 20.7031 14.233 20.7031H5.629C2.262 20.7031 0 18.3381 0 14.8181V6.7361C0 3.2111 2.262 0.8421 5.629 0.8421H12.897ZM15.0124 7.6719C15.3404 7.9259 15.4004 8.3969 15.1464 8.7239L12.2164 12.5039C12.0944 12.6619 11.9144 12.7649 11.7164 12.7889C11.5164 12.8159 11.3184 12.7579 11.1604 12.6349L8.3424 10.4209L5.8114 13.7099C5.6634 13.9019 5.4414 14.0029 5.2164 14.0029C5.0564 14.0029 4.8954 13.9519 4.7594 13.8479C4.4314 13.5949 4.3694 13.1239 4.6224 12.7959L7.6154 8.9059C7.7374 8.7469 7.9184 8.6439 8.1164 8.6189C8.3184 8.5929 8.5164 8.6489 8.6734 8.7739L11.4934 10.9889L13.9604 7.8059C14.2144 7.4769 14.6844 7.4159 15.0124 7.6719ZM17.9674 0C19.4414 0 20.6394 1.198 20.6394 2.672C20.6394 4.146 19.4414 5.345 17.9674 5.345C16.4944 5.345 15.2954 4.146 15.2954 2.672C15.2954 1.198 16.4944 0 17.9674 0ZM17.9674 1.5C17.3214 1.5 16.7954 2.025 16.7954 2.672C16.7954 3.318 17.3214 3.845 17.9674 3.845C18.6134 3.845 19.1394 3.318 19.1394 2.672C19.1394 2.025 18.6134 1.5 17.9674 1.5Z"
                    fill="#00A451" />
                </svg>

              </div>
              <span>Partnership</span>
            </button>
          </div>
          <div class="lg:col-span-5 details-text">
            <div id="overview" class="tabcontent">
              <h3 class="text-[#192434] font-bold text-3xl lg:text-[40px] leading-[48px] lg:mb-5">Overview</h3>
              <p>
                  The World Trade Organisation ranks Nigeria as the largest foodstuff market in Africa, with significant
                  investment in the local industry and a high level of imports. The food and beverage (F&B) sector comprise
                  22.5% of the manufacturing industry, generating an estimated 1.5 million jobs and 4.6% of the country's
                  GDP.
              </p>
              <p>
                In the food and beverage (F&B) sector, over 88% of Nigeria's top food and beverage companies have
                headquarters in Lagos State, Ogun State, Osun State, and Oyo State, each housing one company. 60% of the
                companies are in the food sub-sector, 28% are in beverages, with a few companies operating across both
                sub-sectors
              </p>
              <p>
                There are over 50 manufacturing and distribution sub-sectors within the Food & Beverages sector. Among
                the top 25 companies, the most common segment in the food sub-sector is grain products, with a few food
                companies multi-segmented, producing a variety of foodstuffs.
              </p>
              <p>
                In the beverage sub-sector, few companies produce unspecified non-alcoholic drinks, with some producing
                alcoholic drinks.
              </p>
              <p>
                Quality standards are usually related to improving the safety of food products suitable for consumption
                following specifications by food regulatory bodies; these standards are necessary for international businesses
                and contribute to economic progress through industrial development and trade.

              </p>
              <p>
                Quebec Food Processing Industrial Parks Ltd's business model is geared towards engaging smallholder
                farmers and job creation for agri-food related graduates through this sector by setting up processing plants
                and Mechanized Farm Estate globally, focusing on Food, Fruits & vegetable crops, with a core aim of
                addressing price hiking of farm produces and processed finished products globally.
              </p>
              <p>
                  Quebec Food has positioned itself to partake in the developments that are taking place across the food value
                  chain with a core aim of becoming one of the most preferred agro-producing and agro-food processing firms
                  that would meet worldwide market quality demand and maintain profitable cash value return (CVR) for all
                  its investors.
              </p>
              <p>
                  The unique investment opportunities in the company are available to all classes of investors; to ensure that
                  each processing unit and Farm Estate are fully funded and properly managed to encourage sustainability and
                  efficiency at all levels.
              </p>
              <p>
                As a firm, we have a mechanism in place to ensure customers in the food, beverages, confectioneries, paper,
                textiles, and pharmaceuticals specific requirements are achieved for their products to meet consumer’s needs
                globally.
              </p>
              <p>
                Above all promoter's determination is to improve food production and processed food products through the
                use of the Total Quality Management (TQM) technique and the use of computerized systems to produce
                high-quality and high-value products with the core aim of reducing the wastage of farm produce, production
                time, and cost.
              </p>
            </div>
            <div id="infrastructure" class="tabcontent">
              <h3 class="text-[#192434] font-bold text-[40px] leading-[48px] lg:mb-5">Infrastructure</h3>
              <h4 class="lg:text-[28px]">Food Processing</h4>
              <img src="./assets/media/about-us-infastructure.jpeg" alt="bg" class="md:w-[55%]" style="margin: 30px 0px;">
              <p>
                Quebec Foods has taken on the state-of-the-art technology for processing the cassava value chain, fruits,
                vegetables, and spices being one of the agricultural sub-sectors in West and Central Africa that has great
                potential in terms of improving productivity, creating added value, and developing regional trade.
              </p>
              <p>
                The Plants design is ongoing by <b>Zhengzhou jinghua industry co., Ltd,</b> for processing aseptic packing of
                various cassava food products; While Alfa Laval Sweden is for processing & aseptic packing of various
                fruits and vegetables.
              </p>
              <p>
                  All Quebec Foods products will be packed directly into aseptic packs to ensure a long shelf life with
                  complete preservatives or refrigeration where and when necessary. This is also to protect the bags against
                  flex cracking and pinhole damage.
              </p>
              <p>
              All processing operations like extraction, refining, concentration, sterilization, and aseptic packaging are
automatic and take place in sealed systems for total hygiene.
              </p>

              <p>Computerized process controls are put in place to ensure continuous maintenance of parameters that are
essential to the preservation of color, flavor, and taste, to meet international standards.</p>

              <h4 class="lg:text-[28px]"><b>Food Production</b></h4>
              
              <p>
                Quebec Foods has designed an Integrated Mechanized Farm Estates model to create a sustainable linkage
                with smallholder farmers and growers of agro-farm produce by adopting innovative practices like contract
                farming across the states and communities within and outside processing hubs based on mutual trust and
                understanding.
              </p>
              <p>
                Our model ensures complete traceability of the farm produce from the farmer's and grower's fields during
                production to the storage facility for processing; this is a highly desirable phenomenon in the food industry.
              </p>
            </div>
            <div id="products" class="tabcontent">
              <h3 class="text-[#192434] font-bold text-[40px] leading-[48px] lg:mb-5">Products</h3>
              <p>
                Quebec Food Processing Industrial Parks Ltd has distinguished itself with a registered trademark <b>“Q-BEC
                FOODS”</b> to bridge the gap in the processing of various cassava multiples of food products, including Garri
                (Fried Cassava Granules), Fufu (Cassava Dough), Lafun (Fermented Cassava Flour), Tapioca (Cassava
                Flakes), High-Quality Cassava Starch (HQCS), High-Quality Cassava flour (HQCF), animal feed, alcohol,
                starches for food, beverages, confectioneries, paper, textiles, adhesives and in pharmaceuticals;
              </p>
              <p>
                Q-bec Foods is determined to bridge the gap in processing Fruits & Vegetables into Pulses, Pastes, and
                Concentrates, and blend juice across countries and International markets to the desired specifications of the
                customer's requirement. 
              </p>
            </div>
            <div id="quality-assurance" class="tabcontent">
              <h3 class="text-[#192434] font-bold text-[40px] leading-[48px] lg:mb-5">Quality Assurance</h3>
              <p class="pt-3 pb-3"> All Q-bec Foods products will be certified by the following regulatory bodies:</p>
              <ul class="list-disc px-4 p-4">
                <li class="p-3">National Agency for Food & Drug Administration & Control (NAFDAC)</li>
                <li class="p-3">DNV (Det Norske Veritas), one of the world’s leading certification bodies/ registrars, as being ISO 22000:2005 compliant.</li>
                <li class="p-3">Complied with the codex HACCP principles and provides a framework for third party certification.</li>
                <li class="p-3">SEDEX compliant company is to have a strong customer base both nationally & internationally.</li>
                <li class="p-3">KOSHER for customers from Israel, Germany, USA & Canada.</li>
              </ul>
              <p class="pt-3 pb-3"> Q-BEC FOODS will also identify with the VOLUNTARY CONTROL SYSTEM of SGF. <br> SGF Certification is obligatory for the exports to European Customers.</p>
              <p class="pt-3 pb-3">These processes are on-going to ensure we have stringent management policies in place.</p>
            </div>
            <div id="investments" class="tabcontent">
              <h3 class="text-[#192434] font-bold text-[40px] leading-[48px] lg:mb-5">Partnership</h3>
              <!-- <img src="./assets/media/About-Us-Image.png" alt="bg" class="md:w-[55%]" style="margin: 30px 0px;"> -->
              <br>
              <!-- <p class="pb-3">2.5.1</p> <br> -->
              <p class="pt-2 pb-4 font-bold">Anchor Investors & Private Partnership</p>
              <p class="pt-2 pb-4">Q-bec Foods have initiated plans to welcome Anchor Investors, angel investor, Equity – Investor and
                venture capital investors to invest in Q-bec Agritech City & Farm Estates Project sites across the selected
                zones in Nigeria. This is to ensure the vision laid out by its promoters of the ongoing development plans for
                Q-bec Agritech City & Farm Estates project model is achieved across Africa, Asia, Europe and North
                America.
              </p>
              <!-- <p class="pb-3">2.5.2</p> <br> -->
              <p class="pt-2 pb-4 font-bold">Government Agriculture Intervention Programmes.</p>
              <p class="pt-2 pb-4">
                Our promoters aim to contribute to nation-building through Integrated Mechanized Farm Estates and
                Processing Plant investment model by liaising with the Governments of countries of interest and supporting
                their food security initiatives through the cultivation of a minimum of one million hectares of arable
                farmland, engaging 2 million Farmers across such countries with the expectation of producing about 6
                million metric tonnes of food Product Equivalent (FPE) annually over the medium to long term.
              </p>
              <a href="https://quebecgroups.com/agrictech-city/" target="_blank"
                class="flex items-baseline px-2 py-5 my-4 text-sm bg-white rounded-md text-primary md:text-base md:py-4 lg:px-4 gap-x-1 lg:gap-x-2">
                <span>
                  Discover More
                </span>
                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                    fill="#00A451" />
                </svg>

              </a>
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

      <script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tab-btn");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active-tab-btn", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active-tab-btn";
  }

  document.getElementById("defaultOpen").click();
</script>
@endsection
