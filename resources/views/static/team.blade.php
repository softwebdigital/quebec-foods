@extends('layouts.static')

@section('content')
<section class="mt-20">

    <section class="py-32 pb-10 mb-24 section-container lg:mt-10">
        <h6
            style="font-size: 48px;" class="max-w-[513px] mx-auto text-xl  md:text-heading-1 font-bold py-5  md:leading-h-1 text-ink text-center lg:py-10">
            Our Team</h6>
        <div class="margin: auto">
            <img style="padding-top: 70px; margin: auto; width: 355px;" src="/static-assets/rectangle-682.png" alt="">
            <p style="font-size: 18px;" class="text-center pt-6 pb-1 font-bold">Mr. Onakpoma Martins L.E.</p>
            <p style="font-size: 14px;" class="text-center text-primary font-bold">FOUNDER/PRESIDENT</p>
        </div>
    </section>

    <section class="bg-[#F3FFF9]" style="margin-top: 77px; padding-bottom: 90px;">
        <div  class="text-holder grid grid-cols-1 lg:grid-cols-3 pb-5" style="max-width: 1200px; margin: auto;">
            <div class="p-0 m-0">
                <img style="padding-top: 70px; margin: auto; width: 355px;" src="/static-assets/rectangle-685.png" alt="">
                <p style="font-size: 18px;" class="text-padding pt-6 pb-1 font-bold">Mr. John Ogunmosu</p>
                <p style="font-size: 14px;" class="text-padding text-primary font-bold">TECHNOLOGY DIRECTOR</p>
            </div>
            

            <div class="p-0 m-0">
                <img style="padding-top: 70px; margin: auto; width: 355px;" src="/static-assets/rectangle-684.png" alt="">
                <p style="font-size: 18px;" class="text-padding pt-6 pb-1 font-bold">Mr. Godson O. Onakpoma</p>
                <p style="font-size: 14px;" class="text-padding text-primary font-bold">TRANSPORT & LOGISTICS DIRECTOR</p>
            </div>

            <div class="p-0 m-0">
                <img style="padding-top: 70px; margin: auto; width: 355px;" src="/static-assets/rectangle-683.png" alt="">
                <p style="font-size: 18px;" class="text-padding pt-6 pb-1 font-bold">Mrs. Ogbuabor Juliet Chinonyelum</p>
                <p style="font-size: 14px;" class="text-padding text-primary font-bold">HEAD OF FARM ESTATE OPERATIONS</p>
            </div>

            <style>
                .text-holder {
                    text-align: start;
                }
                .text-padding {
                    padding-left: 20px;
                }

                @media (max-width: 1020px) {
                    .text-holder {
                        text-align: center;
                    }
                    .text-padding {
                        padding-left: 0px;
                    }
                }
            </style>
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