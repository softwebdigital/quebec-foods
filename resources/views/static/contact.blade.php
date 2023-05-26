@extends('layouts.static')

@section('content')
    <!-- Become a Partner Today. -->
    <section class="mt-36 max-w-[801px] mx-auto ">
        <div class="text-center my-10 px-10">
          <span class="btn btn-primary !px-7 !text-sm !py-4 !rounded-full">Contact Us</span>
          <h1 class="max-w-[513px] mx-auto text-3xl  md:text-heading-1 font-bold py-5  md:leading-h-1 text-primary">Become
            a Partner Today.</h1>
          <p class=" text-sm md:text-base text-[#192434]">
            Quebec Foods is looking for strategic partners that align with our values and are willing to contribute to our
            mission of bringing investment-grade farmlands and the setting up of processing Plants across Africa, Asia,
            Europe & North America for investment purposes to ensure food sufficiency globally.
          </p>
        </div>
      </section>


      <!-- Form Cand Location-->
      <section class=" bg-primary">
        <div class="lg:px-5 mb-20 lg:pt-80 lg:pb-20 py-20 lg:mt-96 relative section-container ">
          <div class=" max-w-[620px] mx-auto" style="max-width: 520px;">
            <form action="{{ route('static.post.contact') }}" method="POST"
              class="bg-[#E5F0EB] rounded-lg lg:rounded-3xl py-7 lg:py-10 px-7 lg:px-10 lg:absolute lg:-top-[350px]">
              @csrf
              <div class="grid grid-cols-2 gap-5">
                <div class="col-span-2 lg:col-span-1 ">
                  <label for="first-name" class="text-lg text-ink  my-1 lg:my-3 inline-block">First Name</label>
                  <input type="text" class="rounded-xl border-0 text-base px-6 py-4 placeholder-[#8D97A4] w-full block"
                    name="first_name" placeholder="First Name" id="first-name">
                </div>
                <div class="col-span-2 lg:col-span-1 ">
                  <label for="last-name" class="text-lg text-ink my-1 lg:my-3 inline-block">Last Name</label>
                  <input type="text" class="rounded-xl border-0 text-base px-6 py-4 placeholder-[#8D97A4] w-full block"
                    name="last_name" placeholder="Last Name" id="last-name">
                </div>
                <div class="col-span-2 ">
                  <label for="email" class="text-lg text-ink my-1 lg:my-3 inline-block">Email Address</label>
                  <input type="email" class="rounded-xl border-0 text-base px-6 py-4 placeholder-[#8D97A4] block w-full"
                    name="email" placeholder="Email Address" id="email">
                </div>
                <div class="col-span-2 ">
                  <label for="subject" class="text-lg text-inkmy-1 lg:my-3 inline-block">Subject</label>
                  <select name="subject" id="subject" class="rounded-xl border-0 text-base px-6 py-4 placeholder-[#8D97A4] block w-full">
                    <option value="" class="text-muted">Select a Subject</option>
                    <option value="Strategic Partnership">Strategic Partnership</option>
                    <option value="Equity Participation">Equity Participation</option>
                    <option value="International agricultural organization">International agricultural organization</option>
                    <option value="Government Agency">Government Agency</option>
                    <option value="Investment enquiring">Investment enquiring</option>
                    <option value="Farmer or Processor">Farmer or Processor</option>
                    <option value="Cooperative">Cooperative</option>
                    <option value="Work with us">Work with us</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
                <div class="col-span-2 ">
                  <label for="message" class="text-lg text-inkmy-1 lg:my-3 inline-block">Message</label>
                  <textarea
                    class="rounded-xl resize-none border-0 text-base px-6 py-4 h-[142px] placeholder-[#8D97A4] block w-full"
                    type="email" name="message" placeholder="Enter message here" id="message"></textarea>
                </div>
                <div class="col-span-2 w-full">
                  <button type="submit"
                    class="py-4 px-4 text-center w-full bg-primary text-white rounded-lg hover:opacity-80 transition-opacity">Send
                    Message</button>
                </div>
              </div>
            </form>
          </div>

          <div class="text-center my-10 px-10 bg-primary font-bold">
            <h3 class="max-w-[513px] mx-auto text-3xl  md:text-heading-1 font-bold py-5  md:leading-h-1 text-white">
              Locations</h3>
            <p class=" text-sm md:text-base text-white">
              Registered Mailing Address:
            </p>
            <a href="https://www.google.com/maps/place/Boya+place/@9.0498425,7.4354707,15z/data=!4m5!3m4!1s0x0:0x63594dac8d4ae3ac!8m2!3d9.0499115!4d7.4354294"
              class=" text-sm md:text-base text-white">
              Suite B15, Boya Place Ameh Ebute Street, Wuye- Abuja, Nigeria.
            </a>
          </div>

          <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 px-5 lg:px-10">
            <div class="border border-[#0EC95E] bg-[#02AE57] p-5 lg:px-10 lg:py-6 rounded-2xl text-white">
              <h4 class="py-3 text-2xl font-bold">North Central Operational Office:</h4>
              <p class="text-gray-200  text-lg font-bold">Suite F48, Asokoro Modern Market,By Mogadishu, Asokoro <br> FCT
                – Abuja. Nigeria.</p>
              <a href=""
                class=" my-2 py-5 md:text-lg md:py-5  px-1 rounded-md flex justify-between items-baseline gap-x-2 w-full lg:w-2/3">
                <span>
                  View Location
                </span>
                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                    fill="#ffffff" />
                </svg>
              </a>
            </div>

            <div class="border border-[#0EC95E] bg-[#02AE57] p-5 lg:px-10 lg:py-6 rounded-2xl text-white">
              <h4 class="py-3 text-2xl font-bold">South East Operational Office:</h4>
              <p class="text-gray-200  text-lg font-bold">
                No. 116 Royce Road <br>
                By Step 1 Medical Lab, <br>
                Owerri, Imo State. Nigeria
              </p>
              <a href=""
                class=" my-2 py-5 md:text-lg md:py-5  px-1 rounded-md flex justify-between items-baseline gap-x-2 w-full lg:w-2/3">
                <span>
                  View Location
                </span>
                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10.099 0.114806L18.037 5.11581C18.256 5.25381 18.387 5.49281 18.387 5.75081C18.387 6.00781 18.256 6.24781 18.037 6.38481L10.099 11.3858C9.978 11.4628 9.839 11.5018 9.7 11.5018C9.575 11.5018 9.451 11.4698 9.338 11.4078C9.098 11.2758 8.95 11.0248 8.95 10.7518L8.949 6.5L0.75 6.50041C0.336 6.50041 0 6.16441 0 5.75041C0 5.33641 0.336 5.00041 0.75 5.00041L8.949 5L8.95 0.749806C8.95 0.475806 9.098 0.224806 9.338 0.0928057C9.577 -0.0381943 9.87 -0.0301943 10.099 0.114806ZM10.45 2.10881L10.4498 5.73522C10.4499 5.74027 10.45 5.74533 10.45 5.75041L10.449 5.765L10.45 9.39181L16.23 5.75081L10.45 2.10881Z"
                    fill="#ffffff" />
                </svg>
              </a>
            </div>
            <div class="border border-[#0EC95E] bg-[#02AE57] p-5 lg:px-10 lg:py-6 rounded-2xl text-white">
              <h4 class="py-3 text-2xl font-bold">South West Operational Office:</h4>
              <p class="text-gray-200  text-lg font-bold">
                25, Road 3, <br>
                Ocean Palms Estate, Ogidan <br>
                Eti-Osa 101245, Lagos State.
              </p>
              <a href=""
                class=" my-2 py-5 md:text-lg md:py-5  px-1 rounded-md flex justify-between items-baseline gap-x-2 w-full lg:w-2/3">
                <span>
                  View Location
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
      </section>

      <!-- Contact Details -->
      <section class="section-container mb-10">
        <div class="bg-[#FCFFFD] border border-[#E5F0EB] px-5 lg:px-8 py-8 rounded-[14px]">
          <div class="flex flex-col lg:flex-row justify-between lg:gap-x-5 gap-y-10 lg:gap-y-0">
            <div class="flex flex-col lg:flex-row  justify-between gap-6">
              <div class="p-3 h-11 w-11 rounded-full bg-[#EAFAF1] flex justify-center items-center">
                <img class="h-6 w-6" src="/static-assets/Message.7ef9e4da.svg" alt="Message icon">
              </div>
              <div class="text-black font-bold">
                <h4 class="text-xl font-bold lg:text-[28px] lg:leading-10">Message Us</h4>
                <a class="text-base lg:leading-8  font-medium " href="mailto:info.quebecfoods@quebecgroups.com">info.quebecfoods@quebecgroups.com</a>
              </div>
            </div>
            <div class="flex flex-col lg:flex-row  justify-between gap-6">
              <div class="px-2 h-11 w-11 rounded-full bg-[#EAFAF1] flex justify-center items-center">
                <img class="" src="/static-assets/Call.b2e45b2f.svg" alt="Message icon">
              </div>
              <div class="text-black font-bold flex flex-col">
                <h4 class="font-bold text-xl lg:text-[28px] lg:leading-10">Call Us</h4>
                <a class="text-base lg:leading-8  font-medium" href="tel:+2347016358414">Phone 1: +234 701-635-8414</a>
                <a class="text-base lg:leading-8  font-medium" href="tel:+2348146306036">Phone 2: +234 816-329-2879</a>
                <a class="text-base lg:leading-8  font-medium" href="tel:+2349095448354">Phone 3: +234 909-544-8354</a>
              </div>
            </div>
            <div class="flex flex-col lg:flex-row  justify-between gap-6">
              <div class="p-3 h-11 w-11 rounded-full bg-[#EAFAF1] flex justify-center items-center">
                <img class="h-6 w-6" src="/static-assets/whatsapp.bef5ce93.svg" alt="Message icon">
              </div>
              <div class="text-black text-xl font-bold flex flex-col">
                <h4 class="font-bold lg:text-[28px] lg:leading-10">WhatsApp/Telegram</h4>
                <p class="text-base lg:leading-8  font-medium " data-href="tel: +2347016358414">Phone Number: +234 701-635-8414</p>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection