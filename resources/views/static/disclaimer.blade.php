@extends('layouts.static')

@section('content')
<section class="mt-16 lg:mt-20">

    <section class="lg:py-16 pb-10 mb-24 section-container lg:mt-10">
        <h1
            class="max-w-[913px] mx-auto text-3xl  md:text-heading-1 font-bold py-3  md:leading-h-1 text-ink text-center lg:py-2">
            Disclaimer</h1>
        <div>

            <div class="section-container !py-2">
                <ol class=" px-3 lg:px-12">
                    <li class="lg:text-[28px] lg:leading-[32px] py-3 lg:py-6">
                        <ol class="px-2 gap-x-2 flex flex-col">
                            <li class="font-normal text-sm lg:text-lg lg:leading-8 my-2">
                                This website is operated by Quebec Earthwork Groups LLC,  
                                <strong>(“Quebec Food”),</strong> which is not a registered broker-dealer 
                                or funding portal. Unless indicated otherwise, all 
                                securities-related activity on this site is conducted 
                                by Quebec Food Processing Industrial Parks Ltd <strong>(“Q-bec Food”), </strong>
                                a registered trademark of Quebec Food Processing Industrial 
                                Parks Ltd, other affiliates “Quebec Earthwork Nig Ltd 
                                developers of Q-bec Agritech City and Quebec Agrifoodpro 
                                Coop, both located at Suite B15 Boya Place, Ameh Ebute, 
                                Wuye – Abuja,  Federal Capital Territory, Nigeria.
                            </li>
                            <li class="text-sm lg:text-lg lg:leading-8 my-2">
                                Blog posts or the posting of information on other websites, 
                                regarding our agribusiness ventures, and Quebec Food 
                                trademarks, logos, including any links to information 
                                either in bloggers post, website or social media platforms, 
                                should not be construed as an endorsement or recommendation 
                                of Quebec Food for any purpose whatsoever. Links are provided 
                                for information only on Quebec Food and its affiliates are 
                                not responsible for any information at the sites linked to. 
                                Therefore, no one should invest in any website portal other than 
                                <a href="https://quebecfoods.quebecgroups.com">https://quebecfoods.quebecgroups.com</a>   
                            </li>

                            <p class="text-sm lg:text-lg lg:leading-8 my-2">
                                You should thoroughly review the complete offering materials 
                                for any investment opportunity, particularly all risk factors, 
                                prior to investing in any offering and become familiar with 
                                the investors requirements, investment limits and your ability 
                                to resell the investment.
                                By accessing our website, you agree to be bound by the Terms 
                                of Use and Privacy Policy. Copyright © 2022 Quebec Food 
                                Processing Industrial Parks Ltd, all rights reserved.
                            </p>
                        </ol>
                    </li>

                </ol>
            </div>
        </div>
    </section>
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