@extends('layouts.static')

@section('content')
  <!-- Hero For Home -->
  <section class="pb-40 mt-10 mb-20 section-container md:mt-20 md:pb-0 md:mb-4">
    <div class="relative grid grid-cols-2 md:grid-cols-12">
      <div class="hidden md:block md:col-start-1 md:col-end-4 md:pt-10">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMwAAAE4CAYAAAAXVhxJAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAKASURBVHgB7dyxbVsxGEZRShNkhOyUNkBmyAbOBl4hgFvv5BE0geQHAy7M9v4wXnFORYLNbdh+l/Xy68963J/XZd3Wuj6t36//15noa/Q1W991rfvTcflxPP08zs/rdPQ1+pqvfdf1+Lh8uq2z0dfoa7a+48M8/h6Ht+Phtu6Pf+ts9DX6mrP3AQAAAAAAAAAAAAAAAAAAAAAAAN/uYns30tfYVp6mr9HX2Faepa+xrTxMX6Ovsa0MAAAAAAAAAAAAAAAAAAAAAAAAbGwrV/oa28rT9DX6GtvKs/Q1tpWH6Wv0NbaVAQAAAAAAAAAAAAAAAAAAAAAAgI1t5UpfY1t5mr5GX2NbeZa+xrbyMH2Nvsa2MgAAAAAAAAAAAAAAAAAAAAAAALCxrVzpa2wrT9PX6GtsK8/S19hWHqav0dfYVgYAAAAAAAAAAAAAAAAAAAAAAAA2tpUrfY1t5Wn6Gn2NbeVZ+hrbysP0Nfoa28oAAAAAAAAAAAAAAAAAAAAAAADAxrZypa+xrTxNX6Ovsa08S19jW3mYvkZfY1sZAAAAAAAAAAAAAAAAAAAAAAAA2NhWrvQ1tpWn6Wv0NbaVZ+lrbCsP09foa2wrAwAAAAAAAAAAAAAAAAAAAAAAABvbypW+xrbyNH2Nvsa28ix9jW3lYfoafY1tZQAAAAAAAAAAAAAAAAAAAAAAAGBjW7nS19hWnqav0dfYVp6lr7GtPExfo6+xrQwAAAAAAAAAAAAAAAAAAAAAAABsbCtX+hrbytP0Nfoa28qz9DW2lYfpa/Q1tpUBAAAAAAAAAAAAAAAAAAAAAACAjW3lSl9jW3mavkZfY1t5lr7GtvIwfY2+Zut7B3tYimhLruN7AAAAAElFTkSuQmCC" alt="">
      </div>

      <div class="col-start-1 col-end-3 hero-image col-span md:col-start-4 md:col-end-13">
        <img class="" src="/static-assets/home-hero-image.eab7261e.png" alt="">
      </div>
      <div
        class="absolute shadow-sm bg-white bg-opacity-60 backdrop-blur-lg md:max-w-[520px] md:h-[500px] -bottom-40 md:top-32 md:bottom-0 md:-left-3 inset-x-5 w-[80vw] flex justify-center items-center content-center">
        <div class="w-full px-8 py-9">
          <h1 class="text-primary font-bold text-heading-5 leading-tight md:leading-[56px] mb-4 md:text-[48px]">Invest
            in our
            Processing Plant and Farm
            Estate
          </h1>
          <p class="inline-block py-2 text-lg text-ink md:text-heading-5 md:leading-h-5 md:py-4">Open an account and
            start investing in our food processing scheme in just 5 minutes.</p>
          <div class="my-5">
            <a href="{{ route('dashboard') }}" style="border-radius: 12px;"
              class="btn-primary my-4 py-5 md:text-lg md:py-5  px-5 rounded-md flex justify-around items-baseline gap-x-2 w-[80%] lg:w-1/2">
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
    </div>
  </section>


  <!-- About The App -->
  <section class="pb-40 mt-10 mb-20 section-container md:mt-20 md:pb-0 md:mb-4">
    <div class="flex flex-col items-center justify-between md:flex-row gap-x-5">
      <div class="lg:w-1/2 ">
        <h2 class="text-4xl lg:text-5xl lg:leading-[56px] text-[#192434] font-bold ">A digital system that helps you invest in commodities and make money.</h2>
        <div class="py-7 ">
          <div
            class="py-8 px-7 my-2 flex flex-col md:flex-row items-start content-start gap-x-2 w-full border border-[#E5F0EB] bg-[#FCFFFD]  rounded-xl">
            <div class="my-2 md:w-1/6">
              <img class="w-8 " src="/static-assets/Category-primary.81a6157f.svg" alt="Activity Icon">
            </div>
            <div>
              <h3 class="text-primary text-2xl md:text-3xl max-w-[399px] font-bold my-2">Join the Agribusiness profit venture global digital platform
              </h3>
              <p class=" text-sm md:text-base text-[#5B6676] my-2">Our platform is intuitive, simple and easy-to-use;
                allowing you
                to zoom in on the trends that matter and make more informed decisions.</p>
            </div>
          </div>
          <div
            class="py-8 px-7 my-2 flex flex-col md:flex-row items-start content-start gap-x-2 w-full border border-[#E5F0EB] bg-[#FCFFFD]  rounded-xl">
            <div class="my-2 md:w-1/6">
              <img class="w-8 " src="/static-assets/Activity-primary.2b427def.svg" alt="Activity Icon">
            </div>
            <div>
              <h3 class="text-primary text-2xl md:text-3xl max-w-[399px] font-bold my-2">Get Cash Value Returns (CVR) for 3 -10 year(s)
              </h3>
              <p class=" text-sm md:text-base text-[#5B6676] my-2">Our platform is intuitive, simple and easy-to-use;
                allowing you
                to zoom in on the trends that matter and make more informed decisions.</p>
            </div>
          </div>
          <div
            class="py-8 px-7 my-2 flex flex-col md:flex-row items-start content-start gap-x-2 w-full border border-[#E5F0EB] bg-[#FCFFFD]  rounded-xl">
            <div class="my-2 md:w-1/6">
              <img class="w-8 " src="/static-assets/Graph-prmary.bb3cb24d.svg" alt="Activity Icon">
            </div>
            <div>
              <h3 class="text-primary text-2xl md:text-3xl max-w-[399px] font-bold my-2">Partner with Quebec Food Processing today
              </h3>
              <p class=" text-sm md:text-base text-[#5B6676] my-2">Our business model ensures we work with experienced farmers, and processors to promote scalability and profitability.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="">
        <img src="/static-assets/androidApp.a6665a7a.png" alt="Android App">
      </div>
    </div>
  </section>

  <!-- How it Works -->
  <section class="section-container">
    <div class="w-full px-5 ">
      <h2 class="w-full mx-auto text-4xl font-bold md:text-center text-ink">How It Works</h2>
      <div class="flex flex-col py-10 gap-7 md:flex-row">
        <div class="">
          <div class="w-16 h-16 p-5 bg-gray-200 rounded-3xl">
            <img src="/static-assets/profile-add.8fa32564.svg" alt="">
          </div>
          <div class="py-5 text-[#192434]">
            <h3 class="py-2 text-2xl" style="font-weight: 700;">Create Account</h3>
            <p class="text-[#5B6676] font-normal">
              Join our community by signing up today using your email to get started and start making profit as a
              farmer on the Go!
            </p>
            <a href="{{ route('dashboard') }}" class="btn flex !text-primary items-baseline gap-x-2 text-lg mt-4 !pl-0">
              <span>
                Get Started
              </span>
              <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                  fill="#00A451" />
              </svg>

            </a>
          </div>
        </div>
        <div class="">
          <div class="w-16 h-16 p-5 bg-gray-200 rounded-3xl">
            <img src="/static-assets/Work.45c1bf1d.svg" alt="Work Icon">
          </div>
          <div class="py-5 text-[#192434]">
            <h3 class="py-2 text-2xl font-bold">Choose Package</h3>
            <p class="text-[#5B6676] font-normal">
              After signing in, choose a farm from the available open farms,. select the number of units you would
              like to fund and proceed to make the payments.
            </p>
            <a href="{{ route('dashboard') }}" class="btn flex !text-primary items-baseline gap-x-2 text-lg mt-4 !pl-0">
              <span>
                Get Started
              </span>
              <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                  fill="#00A451" />
              </svg>

            </a>
          </div>
        </div>
        <div class="">
          <div class="w-16 h-16 p-5 bg-gray-200 rounded-3xl">
            <img src="/static-assets/Chart.bc75a1dd.svg" alt="">
          </div>
          <div class="py-5 text-[#192434]">
            <h3 class="py-2 text-2xl font-bold">Get Updates</h3>
            <p class="text-[#5B6676] font-normal">
              On your personalized dashboard, you would get regular real-time updates for farm progress as well as
              access details of all the farms you have funded till date.
            </p>
            <a href="{{ route('dashboard') }}" class="btn flex !text-primary items-baseline gap-x-2 text-lg mt-4 !pl-0">
              <span>
                Get Started
              </span>
              <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                  fill="#00A451" />
              </svg>

            </a>
          </div>
        </div>
        <div class="">
          <div class="w-16 h-16 p-5 bg-gray-200 rounded-3xl">
            <img src="/static-assets/Activity.fbe09a0b.svg" alt="">
          </div>
          <div class="py-5 text-[#192434]">
            <h3 class="py-2 text-2xl font-bold">Get Returns</h3>
            <p class="text-[#5B6676] font-normal">
              Your returns on investment are calculated daily. Returns starts to count once a new cycle starts.
            </p>
            <a href="{{ route('dashboard') }}" class="btn flex !text-primary items-baseline gap-x-2 text-lg mt-4 !pl-0">
              <span>
                Get Started
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
    </div>
  </section>

  <!-- Our Businesses -->
  <section class="py-20 section-container">
    <div class="flex flex-col items-start justify-between gap-10 lg:flex-row">
      <div class="flex flex-col lg:w-[45%]">
        <div class="px-5 border-l-2 border-primary">
          <div class="">
            <h3 class="text-[#192434] text-4xl font-bold pb-4">Farm Estate</h3>
            <p class="text-[#5B6676] text-base leading-8 py-5 text-justify pr-5">
              The Food production Investment Scheme allows an agribusiness investor to invest his/her fund into the
              AGRO-FARM PRODUCE BUYBACK SCHEME of Quebec Food Processing Industrial Parks Ltd’s planned MECHANIZED
              CROP
              PRODUCTION to be set-up in the Food Production layout in Quebec Agritech City and Farm Estates project
              sites.
            </p>
          </div>
          <div class="flex justify-between gap-3 lg:w-[80%]">
            <a href="/investments/farm"
              class="flex items-baseline justify-center w-1/2 px-3 py-5 my-4 text-sm rounded-md btn-primary md:text-base md:py-4 gap-x-3">
              <span>
                Invest Now
              </span>
              <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                  fill="#ffffff" />
              </svg>
            </a>
            <a href="/investments/farm"
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
        <div class="border-l-2 border-[#DBDFE5] p-5 lg:p-10">
          <div>
            <h3 class="text-[#192434] text-4xl font-bold py-4">Processing Plant</h3>
            <p class="text-[#5B6676] text-base leading-8 py-5 text-justify pr-5">
              Agro-Food processing is a key contributor to South Asia countries and motivates labor movement from
              agriculture to manufacturing....
            </p>
          </div>
          <div class="flex justify-between gap-3 lg:w-[80%]">
            <a href="/investments/plant"
              class="flex items-baseline justify-center w-1/2 px-3 py-5 my-4 text-sm rounded-md btn-primary md:text-base md:py-4 gap-x-3">
              <span>
                Invest Now
              </span>
              <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                  fill="#ffffff" />
              </svg>
            </a>
            <a href="/investments/plant"
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
        <div class="border-l-2 border-[#DBDFE5] p-5 lg:p-10">
          <div>
            <h3 class="text-[#192434] text-4xl font-bold py-4">Tractors</h3>
            <p class="text-[#5B6676] text-base leading-8 py-5 text-justify pr-5">
            This platform provide investors the opportunity to invest in the Agric mechanization space, thereby making tractors, machinery and trucks available to farmers, while you earn returns with the aim of increasing the numbers of tractors per hectare of farmland in Nigeria. 
            </p>
          </div>
          <div class="flex justify-between gap-3 lg:w-[80%]">
            <a href="/investments/tractor"
              class="flex items-baseline justify-center w-1/2 px-3 py-5 my-4 text-sm rounded-md btn-primary md:text-base md:py-4 gap-x-3">
              <span>
                Invest Now
              </span>
              <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                  fill="#ffffff" />
              </svg>
            </a>
            <a href="/investments/tractor"
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
      <div class="w-[55%] hidden lg:block">
        <img class="shadow-2xl rounded-2xl" src="/static-assets/farm.ae91a01d.png" alt="Farm Estate">
      </div>
    </div>
  </section>

  <section class="bg-[#F3FFF9]" style="margin-top: 77px;">
    <section class="section-container">
      <div class="px-2 py-1 lg:py-0 md:px-0 lg:w-1/2">
                <h2 class="text-4xl lg:text-heading-3 lg:leading-h-3 text-primary font-bold mb-5">Our Products</h2>
                <p class="text-sm lg:text-lg text-gray-700 font-normal">
                We are committed to cultivating, producing processing, and packaging healthy food products such as; high quality cassava products, fruits, vegetables, and others for Nigeria and the global market.
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


  <!-- Testimonial -->
  <section>
    <div class="overflow-hidden text-white bg-primary md:py-16">
      <div class="section-container max-h-96 md:max-h-full" style="max-height: 38rem;">
        <div class="w-full text-center md:my-10">
          <h2 class="my-2 text-sm font-medium">TESTIMONIALS</h2>
          <span class="text-4xl font-medium">Hear what our users have to say</span>
        </div>
        <style>
          @media (max-width: 465px) {
            
          }
          @media (min-width: 1164px) {
            .dsk-view {
              display: block;
              /* display: none; */
            }
            .tab-view {
              /* display: block; */
              display: none;
            }
            .mob-view {
              /* display: block; */
              display: none;
            }
          }
          @media (max-width: 1163px) {
            .dsk-view {
              /* display: block; */
              display: none;
            }
            .tab-view {
              display: block;
              /* display: none; */
            }
            .mob-view {
              /* display: block; */
              display: none;
            }
          }
          @media (max-width: 850px) {
            .dsk-view {
              /* display: block; */
              display: none;
            }
            .tab-view {
              /* display: block; */
              display: none;
            }
            .mob-view {
              display: block;
              /* display: none; */
            }
          }
        </style>
        
        
        <!-- desktop view -->
        <div id="animation-carousel" class="dsk-view relative" data-carousel="static">
            <!-- Carousel wrapper }} -->
            <div class="overflow-hidden relative h-56 rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-200 ease-linear absolute inset-0 transition-all transform" data-carousel-item="">
                  <div class="flex" style="justify-content: center;">
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">HARRIET W.</span>
                          <span class="block text-sm text-[#828282] font-normal">(GERMANY)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      Quebec Food provides great details on each agribusiness profit venture investment, with the data presented in a clear format. I am sure of their growth and they will make a great impact in the cassava value chain space. I am eager to see more of their agri-food value chain investment opportunities as time goes on.
                      </p>
                    </div>
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">FRANK O.</span>
                          <span class="block text-sm text-[#828282] font-normal">(ITALY)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                        I’ve reviewed other opportunities in Agribusiness Profit Venture investment Schemes, and I have discovered that Quebec Food is a one stop hub for agribusiness profit ventures that gives farmers and agribusiness investors the opportunity to invest in the Agri-food value chain so as to create availability of healthy processed food products globally.  
                      </p>
                    </div>
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">JULIET O.</span>
                          <span class="block text-sm text-[#828282] font-normal">(NIGERIA)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      Investing in my Country is so much easier with Quebec Food!  Now, I can directly help to grow the Agriculture and Financial sector via agency banking in Nigeria simultaneously from my mobile phone!
                      </p>
                    </div>
                  </div>
                </div>
                <!-- Item 2 -->
                <div class="duration-200 ease-linear absolute inset-0 transition-all transform -translate-x-full z-10" data-carousel-item="active">
                  <div class="flex" style="justify-content: center;">
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">HON. OKIRO A.I.</span>
                          <span class="block text-sm text-[#828282] font-normal">(NIGERIA)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      Great Company! I have made multiple investments with Quebec Food. My experience has been excellent. Best of all, I get prompt responses regarding questions via call or email.
                      </p>
                    </div>
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">KAMA .S.</span>
                          <span class="block text-sm text-[#828282] font-normal"> (TURKEY)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      The agribusiness profit ventures scheme of Quebec Food is a welcomed development for social impact. This allows you to help and relate with devoted farmers, while also earning for your own future. Thanks to the promoters for this wonderful initiative. 
                      </p>
                    </div>
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">KINGSLEY A. </span>
                          <span class="block text-sm text-[#828282] font-normal">(GERMANY)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      Quebec Food Agribusiness profit venture investment scheme, has been an opportunity in most recent Agri-food value chain investment opportunity that you probably have not heard of, you can be a pioneer of hope for the grassroots farmers. Let us harness the power of many and together to empower our farmers and ensure their effort is seen across the globe through Quebec’ healthy and processed food products.
                      </p>
                    </div>
                  </div>
                </div>
            </div>

            <!-- Slider controls -->
            <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev="">
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next="">
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        <!-- tablet view -->

        <div id="animation-carousel" class="tab-view relative" data-carousel="static">
            <!-- Carousel wrapper }} -->
            <div class="overflow-hidden relative h-56 rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="duration-200 ease-linear absolute inset-0 transition-all transform" data-carousel-item="active">
                  <div class="flex" style="justify-content: center;">
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">HARRIET W.</span>
                          <span class="block text-sm text-[#828282] font-normal">(GERMANY)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      Quebec Food provides great details on each agribusiness profit venture investment, with the data presented in a clear format. I am sure of their growth and they will make a great impact in the cassava value chain space. I am eager to see more of their agri-food value chain investment opportunities as time goes on.
                      </p>
                    </div>
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">FRANK O.</span>
                          <span class="block text-sm text-[#828282] font-normal">(ITALY)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                        I’ve reviewed other opportunities in Agribusiness Profit Venture investment Schemes, and I have discovered that Quebec Food is a one stop hub for agribusiness profit ventures that gives farmers and agribusiness investors the opportunity to invest in the Agri-food value chain so as to create availability of healthy processed food products globally.  
                      </p>
                    </div>
                  </div>
                </div>

                <!-- Item 2 -->
                <div class="duration-200 ease-linear absolute inset-0 transition-all transform -translate-x-full z-10" data-carousel-item="">
                  <div class="flex" style="justify-content: center;">
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">JULIET O.</span>
                          <span class="block text-sm text-[#828282] font-normal">(NIGERIA)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      Investing in my Country is so much easier with Quebec Food!  Now, I can directly help to grow the Agriculture and Financial sector via agency banking in Nigeria simultaneously from my mobile phone!
                      </p>
                    </div>
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">HON. OKIRO A.I.</span>
                          <span class="block text-sm text-[#828282] font-normal">(NIGERIA)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      Great Company! I have made multiple investments with Quebec Food. My experience has been excellent. Best of all, I get prompt responses regarding questions via call or email.
                      </p>
                    </div>
                  </div>
                </div>

                <!-- Item 3 -->
                <div class="duration-200 ease-linear absolute inset-0 transition-all transform -translate-x-full z-10" data-carousel-item="">
                  <div class="flex" style="justify-content: center;">
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">KAMA .S.</span>
                          <span class="block text-sm text-[#828282] font-normal"> (TURKEY)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      The agribusiness profit ventures scheme of Quebec Food is a welcomed development for social impact. This allows you to help and relate with devoted farmers, while also earning for your own future. Thanks to the promoters for this wonderful initiative. 
                      </p>
                    </div>
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">KINGSLEY A. </span>
                          <span class="block text-sm text-[#828282] font-normal">(GERMANY)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      Quebec Food Agribusiness profit venture investment scheme, has been an opportunity in most recent Agri-food value chain investment opportunity that you probably have not heard of, you can be a pioneer of hope for the grassroots farmers. Let us harness the power of many and together to empower our farmers and ensure their effort is seen across the globe through Quebec’ healthy and processed food products.
                      </p>
                    </div>
                  </div>
                </div>
            </div>

            <!-- Slider controls -->
            <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev="">
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next="">
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        <!-- mobile view -->

        <di id="animation-carousel" class="mob-view relative" data-carousel="static">
            <!-- Carousel wrapper }} -->
            <div class="overflow-hidden relative h-56 rounded-lg md:h-96" style="height: 21rem;">
                <!-- Item 1 -->
                <div class="hidden duration-200 ease-linear absolute inset-0 transition-all transform" data-carousel-item="">
                  <div class="flex" style="justify-content: center;">
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">HARRIET W.</span>
                          <span class="block text-sm text-[#828282] font-normal">(GERMANY)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      Quebec Food provides great details on each agribusiness profit venture investment, with the data presented in a clear format. I am sure of their growth and they will make a great impact in the cassava value chain space. I am eager to see more of their agri-food value chain investment opportunities as time goes on.
                      </p>
                    </div>
                  </div>
                </div>

                <!-- Item 2 -->
                <div class="hidden duration-200 ease-linear absolute inset-0 transition-all transform" data-carousel-item="">
                  <div class="flex" style="justify-content: center;">
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">FRANK O.</span>
                          <span class="block text-sm text-[#828282] font-normal">(ITALY)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                        I’ve reviewed other opportunities in Agribusiness Profit Venture investment Schemes, and I have discovered that Quebec Food is a one stop hub for agribusiness profit ventures that gives farmers and agribusiness investors the opportunity to invest in the Agri-food value chain so as to create availability of healthy processed food products globally.  
                      </p>
                    </div>
                  </div>
                </div>

                <!-- Item 3 -->
                <div class="hidden duration-200 ease-linear absolute inset-0 transition-all transform" data-carousel-item="">
                  <div class="flex" style="justify-content: center;">
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">JULIET O.</span>
                          <span class="block text-sm text-[#828282] font-normal">(NIGERIA)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      Investing in my Country is so much easier with Quebec Food!  Now, I can directly help to grow the Agriculture and Financial sector via agency banking in Nigeria simultaneously from my mobile phone!
                      </p>
                    </div>
                  </div>
                </div>
                
                <!-- Item 4 -->
                <div class="duration-200 ease-linear absolute inset-0 transition-all transform -translate-x-full z-10" data-carousel-item="active">
                  <div class="flex" style="justify-content: center;">
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">HON. OKIRO A.I.</span>
                          <span class="block text-sm text-[#828282] font-normal">(NIGERIA)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      Great Company! I have made multiple investments with Quebec Food. My experience has been excellent. Best of all, I get prompt responses regarding questions via call or email.
                      </p>
                    </div>
                  </div>
                </div>

                <!-- Item 5 -->
                <div class="duration-200 ease-linear absolute inset-0 transition-all transform -translate-x-full z-10" data-carousel-item="active">
                  <div class="flex" style="justify-content: center;">
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">KAMA .S.</span>
                          <span class="block text-sm text-[#828282] font-normal"> (TURKEY)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      The agribusiness profit ventures scheme of Quebec Food is a welcomed development for social impact. This allows you to help and relate with devoted farmers, while also earning for your own future. Thanks to the promoters for this wonderful initiative. 
                      </p>
                    </div>
                  </div>
                </div>

                <!-- Item 6 -->
                <div class="duration-200 ease-linear absolute inset-0 transition-all transform -translate-x-full z-10" data-carousel-item="active">
                  <div class="flex" style="justify-content: center;">
                    <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
                      <div class="flex gap-5 mb-3">
                        <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
                        <div>
                          <span class="block text-[#081131] font-medium text-base">KINGSLEY A. </span>
                          <span class="block text-sm text-[#828282] font-normal">(GERMANY)</span>
                        </div>
                      </div>
                      <p class="text-sm text-[#243141] font-normal">
                      Quebec Food Agribusiness profit venture investment scheme, has been an opportunity in most recent Agri-food value chain investment opportunity that you probably have not heard of, you can be a pioneer of hope for the grassroots farmers. Let us harness the power of many and together to empower our farmers and ensure their effort is seen across the globe through Quebec’ healthy and processed food products.
                      </p>
                    </div>
                  </div>
                </div>
            </div>

            <!-- Slider controls -->
            <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev="">
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next="">
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
{{--<section class="splide section-container" aria-labelledby="carousel-heading">
        
      <div class="splide__track float-right">
        <div class="splide__list">
          <div class="splide__slide md:w-[507px] px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
            <div class="flex gap-5 mb-3">
              <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
              <div>
                <span class="block text-[#081131] font-medium text-base">HARRIET W.</span>
                <span class="block text-sm text-[#828282] font-normal">(GERMANY)</span>
              </div>
            </div>
            <p class="text-sm text-[#243141] font-normal">
            Quebec Food provides great details on each agribusiness profit venture investment, with the data presented in a clear format. I am sure of their growth and they will make a great impact in the cassava value chain space. I am eager to see more of their agri-food value chain investment opportunities as time goes on.
            </p>
          </div>
        </div>
      </div>
    </section> --}}
        
        {{--<div class="flex flex-col md:flex-row lg:-ml-56">
          <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
            <div class="flex gap-5 mb-3">
              <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
              <div>
                <span class="block text-[#081131] font-medium text-base">HARRIET W.</span>
                <span class="block text-sm text-[#828282] font-normal">(GERMANY)</span>
              </div>
            </div>
            <p class="text-sm text-[#243141] font-normal">
            Quebec Food provides great details on each agribusiness profit venture investment, with the data presented in a clear format. I am sure of their growth and they will make a great impact in the cassava value chain space. I am eager to see more of their agri-food value chain investment opportunities as time goes on.
            </p>
          </div>
          <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
            <div class="flex gap-5 mb-3">
              <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
              <div>
                <span class="block text-[#081131] font-medium text-base">FRANK O.</span>
                <span class="block text-sm text-[#828282] font-normal">(ITALY)</span>
              </div>
            </div>
            <p class="text-sm text-[#243141] font-normal">
              I’ve reviewed other opportunities in Agribusiness Profit Venture investment Schemes, and I have discovered that Quebec Food is a one stop hub for agribusiness profit ventures that gives farmers and agribusiness investors the opportunity to invest in the Agri-food value chain so as to create availability of healthy processed food products globally.  
            </p>
          </div>
          <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
            <div class="flex gap-5 mb-3">
              <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
              <div>
                <span class="block text-[#081131] font-medium text-base">JULIET O.</span>
                <span class="block text-sm text-[#828282] font-normal">(NIGERIA)</span>
              </div>
            </div>
            <p class="text-sm text-[#243141] font-normal">
            Investing in my Country is so much easier with Quebec Food!  Now, I can directly help to grow the Agriculture and Financial sector via agency banking in Nigeria simultaneously from my mobile phone!
            </p>
          </div>
        </div>
        <div class="flex flex-col md:flex-row lg:-mr-56">
          
          <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
            <div class="flex gap-5 mb-3">
              <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
              <div>
                <span class="block text-[#081131] font-medium text-base">HON. OKIRO A.I.</span>
                <span class="block text-sm text-[#828282] font-normal">(NIGERIA)</span>
              </div>
            </div>
            <p class="text-sm text-[#243141] font-normal">
            Great Company! I have made multiple investments with Quebec Food. My experience has been excellent. Best of all, I get prompt responses regarding questions via call or email.
            </p>
          </div>
          <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
            <div class="flex gap-5 mb-3">
              <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
              <div>
                <span class="block text-[#081131] font-medium text-base">KAMA .S.</span>
                <span class="block text-sm text-[#828282] font-normal"> (TURKEY)</span>
              </div>
            </div>
            <p class="text-sm text-[#243141] font-normal">
            The agribusiness profit ventures scheme of Quebec Food is a welcomed development for social impact. This allows you to help and relate with devoted farmers, while also earning for your own future. Thanks to the promoters for this wonderful initiative. 
            </p>
          </div>
          <div class="px-6 w-[337px] bg-white text-ink m-4 py-8 rounded-3xl">
            <div class="flex gap-5 mb-3">
              <!-- <img class="rounded-full w-11 h-11" src="/static-assets/95UF6LXe-Lo.816b956b.png" alt="User"> -->
              <div>
                <span class="block text-[#081131] font-medium text-base">KINGSLEY A. </span>
                <span class="block text-sm text-[#828282] font-normal">(GERMANY)</span>
              </div>
            </div>
            <p class="text-sm text-[#243141] font-normal">
            Quebec Food Agribusiness profit venture investment scheme, has been an opportunity in most recent Agri-food value chain investment opportunity that you probably have not heard of, you can be a pioneer of hope for the grassroots farmers. Let us harness the power of many and together to empower our farmers and ensure their effort is seen across the globe through Quebec’ healthy and processed food products.
            </p>
          </div>
        </div>--}}
      </div>
    </div>
  </section>

  <style>
    @media (min-width: 1024px){
      .give-padding {
          padding-top: 2rem;
          padding-bottom: 2rem;
      }
    }
  </style>

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

  <!-- Clients -->
  <section class="mb-20 section-container">
    <div class="flex flex-col justify-between gap-8 md:flex-row">
      <div class="w-full px-5 md:w-2/5 md:px-3">
        <h4 class="text-[#192434] text-3xl md:leading-h-2 md:text-5xl font-bold my-4">We are trusted!</h4>
        <p class="text-[#5B6676] text-base md:text-2xl">We are trusted by over 50 Companies in the ecosystem and we
          have been serving them without hassle</p>
      </div>
      <div class="flex items-center content-center justify-center w-full p-5 shadow-lg md:w-3/5 md:p-9 rounded-2xl">
        <div class="grid items-center content-center justify-center grid-cols-2 gap-10 md:grid-cols-3 md:gap-10">
          <img src="/static-assets/leadway.36317bb0.svg" alt="Leadway">
          <img src="/static-assets/nalda.aafd43e0.png" alt="NALDA">
          <img src="/static-assets/ncam.7250f42c.svg" alt="NCAM">
          <img src="/static-assets/boa.f402e827.svg" alt="BOA">
          <img src="/static-assets/cbn.b57a0ce9.svg" alt="CBN">
          <img src="/static-assets/9psb.2b7e72ad.svg" alt="9PSB">

          <img src="/static-assets/nirsal.7baa0eb8.svg" alt="NIRSAL">
          <img src="/static-assets/quebec.75f9f935.svg" alt="Quebec">
          <img src="/static-assets/fmiti.942fdf83.svg" alt="FMITI">
          <img src="/static-assets/ifad.f1eebe5d.svg" alt="IFAD">
          <img src="/static-assets/quebec-farm-erp.png" alt="FarmERP">
          <img src="/static-assets/Quebec-John-Deere-logo.png" alt="JohnDEERE">
          <img src="/static-assets/Quebec-IITA-logo.jpg" alt="IFAD">
          <img class="col-span-2" src="/static-assets/boi.2c832a6a.svg" alt="BOI">
        </div>
      </div>
    </div>
  </section>
@endsection