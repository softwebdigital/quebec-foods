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
                <button class="tab-btn hover:!text-white text-ink hover:!bg-primary group py-5 pl-2 lg:pl-10 "
                    onclick="openCity(event, 'how-to-invest') ">
                    <span class="group-hover:!text-white font-bold !inline-block !text-sm lg:!text-lg">How to
                        Invest</span>
                </button>

            </div>
            <div class="lg:col-span-5 details-text">
                <div id="farm-estate" class="tabcontent">
                    <div class="flex flex-col px-1 lg:px-5 gap-y-4 ">
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
                            <button class="accordion">What is the amount of investment required per
                                unit?</button>
                            <div class="panel">
                                <p>
                                    The amount of investment varies from $1,000 - $3,000 depending on your choice of farm investment package. 
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
                            <button class="accordion">What do I stand to benet as an investor towards the actualization of the project?</button>
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
                </div>
                <div id="processing-plant" class="tabcontent">
                    <div class="flex flex-col px-1 lg:px-5 gap-y-4 ">
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
                                    Yes you can
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
                </div>
                <div id="tractor-investment" class="tabcontent">
                    <div class="flex flex-col px-1 lg:px-5 gap-y-4 ">
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
                </div>
                <div id="how-to-invest" class="tabcontent px-5 py-5 ">
                    <div class="flex flex-col px-1 lg:px-5 gap-y-4 ">
                        <h1 class="text-primary font-bold w-10 text-center mt-5">QUEBEC FOOD AGRIBUSINESS PROFIT VENTURES SCHEME (QFAPVS)</h1>
                        <p>Quebec Food Agribusiness Profit Ventures (QFAPV) are classified Sustainable agricultural 
                            ventures from production to processing, and 
                            distribution for local consumption and export 
                            market through the setting-up of Integrated
                             Mechanized Farm Estates for food production 
                             (crop production, poultry/livestock’s farming) 
                             and establishment of Food & Agro-Processing 
                             Plant Facilities (FAPPF) for processing and 
                             packaging of healthy food products for consumers 
                             at low-price.  
                        </p>
                        <div>
                            <p class="font-bold">
                                1.	How do I Invest after creating an account on the Quebec Food Platform?
                            </p>
                            <p>Click on packages <strong>(Ventures - Farm, Processing Plant or Tractor) </strong> on the platform to select the venture you are interested in.</p>

                            <ul class="list-disc px-10">
                                <li> <p class="font-bold">Farming venture:</p> <br> The amount of investment varies from <strong>$1000 – $3000</strong>  depending on your choice of farm venture selected, minimum investment unit you can invest is one (1) Unit, while maximum Investment Units is 100unit at an investment cycle per project. </li>
                                <li> <p class="font-bold">Processing plants venture:</p> <br> The amount of investment varies from <strong>$2000 – $5000</strong> depending on your choice of plant selected,  minimum investment unit you can invest is one (1) unit, while maximum investment units is <strong>100unit</strong> at an investment cycle per project. </li>
                                <li> <p class="font-bold">Agric Tractor & Agro-haulage Venture:</p> <br> The amount of investment varies from  $30,000 - $50,000 depending on your choice of project <strong>“tractor, machinery and haulage trucks”</strong>  selected, Minimum investment unit you can invest in One (1) Unit, while maximum Investment Units is <strong>20unit</strong>  at an investment cycle per project. </li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-bold">
                                2.	Are there restrictions on the number of Venture “projects” an investor fund at a given time?
                            </p>
                            <p>There is no restriction but your investment per ventures are specified and your total funding should not exceed certain percentage of your income each year as provided by the federal social securities laws of your country of residence.</p>
                        </div>
                        <div>
                            <p class="font-bold">
                                3.	What are the Payment Options?
                            </p>
                            <p>Once you have selected the venture to invest in, you can either <strong>“invest – option A” straight away or “pledge first – option B”. </strong> </p>

                            <ul class="list-disc px-10">
                                <li> <p class="font-bold">Option A ( <span class="text-primary">Invest - wallet</span> ): </p> <br> In other to directly invest, you must have sufficient credits in your virtual wallet. You can do this by adding money to your virtual wallet through our partner payment platforms. </li>
                                <li> <p class="font-bold">Option B ( <span class="text-primary">Pledge – Bank Transfer</span> ): </p> <br> In the case where you haven’t deposited any amount into your virtual wallet yet, you may choose to pledge. All pledges are given 3 working days to make transfer payment. It should be noted that the platform does not limit the amount of pledges that any user can make. A pledge will only be converted into an investment, once the payment has been made and verified. The amount transferred should be at least in equivalent to the value of the amount pledged and charges inclusive. Any excess of the transferred amount shall be credited to user’s virtual wallet.</li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-bold">
                                4.	Who can invest on Quebec Food Agribusiness Venture Scheme?
                            </p>
                            <p>Anyone over 18 years of age can invest, provided 
                                they are accredited or non-accredited investors 
                                in their country of residence.
                                <br>
                                Secondly, potential investors 
                                are strongly advised to comply with the laws and 
                                regulations of their country of residence. 
                                The securities offered on this site are not offered in 
                                jurisdictions where public solicitation for offerings is
                                 not permitted; it is solely your responsibility to 
                                 comply with the laws and regulations of your country 
                                 of residence.
                                 <br>
                                 Thirdly, we do not run Ponzi schemes, but 
                                 commodities investment scheme that connect 
                                 investors to specific agricultural commodities
                                  projects for the purpose of sponsoring such 
                                  projects in exchange for cash value return 
                                  <strong>(CVR),</strong>  thereby revamping the 
                                  agricultural sector. 
                            </p>
                        </div>
                        <div>
                            <p class="font-bold">
                                5.	How do I know if I am an accredited or non-accredited investor?
                            </p>
                            <p>An accredited investor is a person who has a 
                                networth of at least <strong>$1million</strong>  (excluding 
                                their primary residence) or earns at least 
                                <strong>$200,000</strong>  in income each year – <strong>$300,000</strong> if 
                                combined with a spouse. A non-accredited investor
                                is everyone else! 
                            </p>
                        </div>
                        <div>
                            <p class="font-bold">
                                6.	What is the "Error with your investment" notification?
                            </p>
                            <p>
                                If you have received an email that says “Error with your 
                                investment,” then that means there is information that 
                                needs to be verified before the investment can be processed. 
                                The link in the email will redirect you to a Quebec Food 
                                page asking you to input some additional information. 
                                Once you submit the required information, the system will 
                                begin processing your investment. We will reach out to you 
                                directly if we require any further information. 

                                <br>

                                Note: Please don’t click on the link when you are already
                                 logged into your Quebec Food account.
                            </p>
                            <p>You can also update this information by following the steps below:</p>

                            <ul class="list-disc px-10">
                                <li>Login to your Quebec Food  account</li>
                                <li>Once you are logged in, click on star button on same line with logout and click on “My Account” you will see Profile and Account Overview </li>
                                <li>Click “View profile”  </li>
                                <li>You will then be able to update your information by checking security, Bank and Identification and correcting the pending information’s and click on update profile.</li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-bold">
                                7.	When and how will I get confirmation on my investment?
                            </p>
                            <p>
                                Once the company closes on your funds, you will receive a
                                confirmation email from the company with details about your
                                investment, along with a copy of your deed 
                                of Investment subscription agreement with a
                                record of your units and cash value returns (CVR). 
                            </p>
                        </div>
                        <div>
                            <p class="font-bold">
                                8.	What happens if the company does not reach their funding goal?
                            </p>
                            <p>
                                If the company does not reach their minimum funding goal, 
                                all funds will be returned to the investor within 10 business 
                                days after the closing of their offering.
                            </p>
                        </div>
                        <div>
                            <p class="font-bold">
                                9.	If the company has reached their maximum funding goal, can I still invest?
                            </p>
                            <p>
                                If the company has reached the maximum funding goal, 
                                you can submit an “indication of interest.” An indication
                                of interest is similar to a reservation. It’s a non-binding
                                commitment that allows you to be placed on a waitlist for 
                                any offerings that are oversubscribed, meaning they have 
                                raised more than their maximum funding goal. This is not an investment and does not guarantee a place in the offering.
                            </p>
                            <p>If your indication of interest is accepted, you will be notified to sign your binding agreement. You will have only 72 hours to sign the approved indication of interest. </p>
                        </div>
                        <div>
                            <p class="font-bold">
                                10.	 I forgot my password. What do I do?
                            </p>
                            <p>
                                You can reset your password by clicking “Forgot Password”,
                                which is located on the Login page below “Password.” Once
                                you click “Forgot Password,” you will be asked to enter 
                                your email. After you enter your email and click “Submit,”
                                we will send you further instructions.
                            </p>
                            <p>Once the email arrives, please open it and click on the 
                                <strong>“Reset your password”</strong>  link provided. 
                                You will then be prompted to enter a new password and confirm 
                                that password. After you do so, you will be logged in and
                                redirected to the main QUEBEC Food page. Once logged in,
                                you will be able to invest.
                            </p>
                        </div>
                        <div>
                            <p class="font-bold">
                                11.	How do I view my Deed of Investment subscription agreement?
                            </p>
                            <p>
                                You will not be able to view your signed subscription 
                                agreement until the company closes on your funds, and 
                                your status changes from <strong> “pending”</strong> to <strong>“approved”</strong> .
                            </p>
                        </div>
                        <div>
                            <p class="font-bold">
                                12. How do I view my investment status? 
                            </p>
                            <p>
                                To view your investment status follow these steps:
                            </p>
                            <ul class="list-disc px-10">
                                <li>Login to your Quebec Food  account</li>
                                <li>Once you are logged in, click on your Dashboard and the status of your investment will display. </li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-bold">
                                13. Different stages of investments:
                            </p>
                            <p>
                               <strong> Incomplete -</strong> You have begun the investment process but have not completed all of the steps to finalize your investment, select payment on option either “wallet” or “bank transfer”. Make sure that you click the green <strong>“Invest” button after clicking “creating an investment”</strong>  on the investment page. Once you have submitted your investment, you will receive a confirmation email immediately following submission. 
                            </p>
                            <p>
                               <strong>Submitted - </strong> You have successfully submitted your investment, and it is currently pending waiting approval. It could be pending because the funds have not yet left or reached the escrow account, or are still undergoing the necessary checks. If there is any problem  with your investment, you will be notified by Quebec Food.
                            </p>
                            <p>
                               <strong>Cleared – </strong> Quebec Food has received your payment for your investment, and we have successfully verified all of the required investor checks. There is nothing else that you need to do at this time.
                            </p>
                            <p>
                               <strong>Invested - </strong> After the company has conducted a close on your payment, your investment will be <strong>approved</strong>  and then moved to <strong>“Invested.”</strong>  This means your funds have been disbursed to the venture you have chosen to invest in. 
                            </p>
                        </div>
                        <div>
                            <p class="font-bold">
                                14.	How do my investments affect my taxes?
                            </p>
                            <p>
                                Quebec Food cannot give you any tax or 
                                investment advice. You may want to consult a tax advisor
                                regarding your investment and any questions regarding 
                                your taxes as an investor. However, we can provide you 
                                with some useful information on how it may affect you 
                                for the upcoming tax year.
                                 <br>
                                Tax liability is largely determined by what type of
                                venture you invested in and Quebec Food Processing
                                Industrial Parks Ltd is an LLC entity and as such we
                                are tax payers.  
                            </p>
                        </div>
                        <div>
                            <p class="font-bold">
                                15.	What if the company venture you invested in goes bankrupt?
                            </p>
                            <p>
                                The company or its trustee is responsible for providing tax
                                documents directly to their investors, to reflect any loss. 
                            </p>
                        </div>
                        <div>
                            <p class="font-bold">
                                16.	How do I contact someone at Quebec Food?
                            </p>
                            <p>
                                If you have questions that have not been answered in the
                                FAQ, feel free to email us at info-desk.agrovest@quebecgroups.com
                                or use our green chat icon found in the lower right
                                hand corner of all of our Quebec Food pages. We will
                                do our best to answer your questions within 24 hours.
                            </p>
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