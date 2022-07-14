@extends('layouts.static')

@section('content')
<section class="mt-20">

    <section class="py-32 pb-10 mb-24 section-container lg:mt-10">
        <h1
            class="max-w-[513px] mx-auto text-3xl  md:text-heading-1 font-bold py-5  md:leading-h-1 text-ink text-center lg:py-10">
            Frequently Asked Questions</h1>
        <div class="grid lg:grid-cols-7 lg:flex-row justify-between lg:mx-auto mx-2 max-w-[100vw] lg:gap-x-5">

            <div
                class="flex flex-row lg:col-span-2 justify-start lg:flex-col gap-x-4 lg:gap-y-4 my-0 lg:py-1 bg-[#F3F7F5]  lg:max-h-[485px] lg:min-h-[485px]">
                <h3 class="text-ink text-2xl font-bold py-5 px-5 border-b-2 border-[#E5F0EA] hidden lg:block">
                    Category</h3>
                <button class="tab-btn hover:!text-white text-ink hover:!bg-primary group py-5 pl-2 lg:pl-10"
                    id="defaultOpen" onclick="openCity(event, 'farm-estate') ">

                    <span class="group-hover:!text-white font-bold !inline-block !text-sm lg:!text-lg">Farm
                        Estate</span>
                </button>
                <button class="tab-btn hover:!text-white text-ink hover:!bg-primary group py-5 pl-2 lg:pl-10"
                    onclick="openCity(event, 'processing-plant') ">
                    <span
                        class="group-hover:!text-white font-bold !inline-block !text-sm lg:!text-lg">Processing
                        Plant</span>
                </button>
                <button class="tab-btn hover:!text-white text-ink hover:!bg-primary group py-5 pl-2 lg:pl-10 "
                    onclick="openCity(event, 'tractor-investment') ">
                    <span class="group-hover:!text-white font-bold !inline-block !text-sm lg:!text-lg">Tractor
                        Investment</span>
                </button>

            </div>
            <div class="lg:col-span-5 details-text">
                <div id="farm-estate" class="tabcontent">
                    <div class="flex flex-col px-1 lg:px-5 gap-y-4 ">
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
                </div>
                <div id="processing-plant" class="tabcontent">
                    <div class="flex flex-col px-1 lg:px-5 gap-y-4 ">
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
                </div>
                <div id="tractor-investment" class="tabcontent">
                    <div class="flex flex-col px-1 lg:px-5 gap-y-4 ">
                        <div class="accordion-container">
                            <button class="accordion">Why Invest In Agric Tractors Scheme?</button>
                            <div class="panel">
                                <p>
                                    The market potential for tractor and agro-haulage services is about $4,861,000,000. Nigeria requires 1.5 million tractors to be considered “mechanized” but has fewer than 5,000 functional tractors in circulation. There are six (6) tractors for every 10,000 hectares of arable land, compared to the global average of 195 tractors per hectare.
                                </p>
                                <p>
                                    The growth of agricultural mechanization is low in sub Saharan Africa, and is estimated at 1.2% in Nigeria. The global agricultural tractors market was valued at USD 55.37 billion in 2018 and is expected to grow at a CAGR of 5.8% to USD77.74 billion by 2024. North America dominates the global agricultural tractors market, at 15.2% of global market share in 2014, led by the USA and Canada.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</section>

<!-- Contact Details -->
<section class="mb-10 section-container">
    <div class="bg-[#FCFFFD] border border-[#E5F0EB] px-5 lg:px-8 py-8 rounded-[14px]">
        <div class="flex flex-col justify-between lg:flex-row lg:gap-x-5 gap-y-10 lg:gap-y-0">
            <div class="flex flex-col justify-between gap-6 lg:flex-row">
                <div class="p-3 h-11 w-11 rounded-full bg-[#EAFAF1] flex justify-center items-center">
                    <img class="w-6 h-6" src="/static-assets/Message.7ef9e4da.svg" alt="Message icon">
                </div>
                <div class="font-bold text-black">
                    <h4 class="text-xl font-bold lg:text-[28px] lg:leading-10">Message Us</h4>
                    <a class="text-base font-medium lg:leading-8 "
                        href="mailto:info-desk.agrovest@quebecgroups.com">info-desk.agrovest@quebecgroups.com</a>
                </div>
            </div>
            <div class="flex flex-col justify-between gap-6 lg:flex-row">
                <div class="px-2 h-11 w-11 rounded-full bg-[#EAFAF1] flex justify-center items-center">
                    <img class="" src="/static-assets/Call.b2e45b2f.svg" alt="Message icon">
                </div>
                <div class="flex flex-col font-bold text-black">
                    <h4 class="font-bold text-xl lg:text-[28px] lg:leading-10">Call Us</h4>
                    <a class="text-base font-medium lg:leading-8 " href="tel: +2347016358414">Phone 1: +234
                        701-635-8414</a>
                    <a class="text-base font-medium lg:leading-8 " href="tel: +2348146306036">Phone 2: +234
                        814-630-6036</a>
                    <a class="text-base font-medium lg:leading-8 " href="tel: +2349095448354">Phone 3: +234
                        909-544-8354</a>
                </div>
            </div>
            <div class="flex flex-col justify-between gap-6 lg:flex-row">
                <div class="p-3 h-11 w-11 rounded-full bg-[#EAFAF1] flex justify-center items-center">
                    <img class="w-6 h-6" src="/static-assets/whatsapp.bef5ce93.svg" alt="Message icon">
                </div>
                <div class="flex flex-col text-xl font-bold text-black">
                    <h4 class="font-bold lg:text-[28px] lg:leading-10">WhatsApp/Telegram</h4>
                    <p class="text-base font-medium lg:leading-8 " data-href="tel: +2347016358414">Phone
                        Number: +234 701-635-8414</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
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