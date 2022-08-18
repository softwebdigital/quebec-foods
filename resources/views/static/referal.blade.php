@extends('layouts.static')

@section('content')
<section class="mt-16 lg:mt-20">

    <section class="lg:py-16 pb-10 mb-24 section-container lg:mt-10">
        <h1
            class="max-w-[913px] mx-auto text-3xl  md:text-heading-1 font-bold py-3  md:leading-h-1 text-ink text-center lg:py-2">
            Referral Program</h1>
        <div>

            <div class="section-container !py-2">
                <ol class=" px-3 lg:px-12">
                    <li class="lg:text-[28px] lg:leading-[32px] py-3 lg:py-6">
                        <ol class="px-2 gap-x-2 flex flex-col">
                            <p class="font-bold text-sm lg:text-lg lg:leading-8 my-2">
                                REFER A FRIEND TO SPONSOR ANY AGRIBUSINESS PROFIT VENTURE (APV) IN WITH QUEBEC FOOD AND GET $50 WHEN THEY SPONSOR A VENTURE!
                            </p>
                            <ul class="list-disc lg:pl-10">
                                <li class="font-normal text-sm lg:text-lg lg:leading-8 my-2">
                                	Receive $50 for every person you refer who sponsor a Farm, Processing Plant Startup OR Tractor/Haulage Trucks.
                                </li>
                                <li class="font-normal text-sm lg:text-lg lg:leading-8 my-2">
                                	Only applies to Quebec Food AGRIBUSINESS PROFIT VENTURE PAID by sponsors
                                </li>
                                <li class="font-normal text-sm lg:text-lg lg:leading-8 my-2">
                                	The sponsor must use your referral code upon signing up. You can find or create your own unique referral code by signing into your <strong>QUEBEC FOOD VENTURE ACCOUNT</strong>  and visiting your profile page: 
                                    @guest
                                        <a href="{{ route('profile')}}" class="text-primary font-bold">Click here</a>
                                    @else
                                        <input type="hidden" style="width: 100%;border: none" value="{{ url('/register?ref=').auth()->user()->ref_code }}" id="myRefLink">
                                        <a href="javascript:void(0);" class="text-primary font-bold" onclick="copyToClipboard()">{{ url('/register?ref=').auth()->user()->ref_code }}</a>
                                        <span style="display: none;" id="copied" class="font-bold lg:text-[15px] bg-primary text-white p-1 rounded">copied!</span>
                                    @endguest
                                    <!-- <strong>https://quebecfoods.quebecgroups.com/register?ref=406269502</strong>  -->
                                </li>
                            </ul>
                            <h3 class="font-bold lg:text-[28px] lg:leading-[32px] lg:py-6 pt-5">Illustrative Example</h3>
                            <p class="text-sm lg:text-lg lg:leading-8 my-2">
                                You refer James who uses your unique referral code to sign up, James sponsor a $1500 farm. You will get <strong>$50</strong> applied to your account!
                            </p>
                            <p class="text-sm lg:text-lg lg:leading-8 my-2">
                                Your <strong>$50</strong> will be applied to your Quebec Food Venture wallet account and you are at your liberty to withdraw from your wallet or you can alternatively choose to have the fund accumulate pending when the amount can sponsor any venture of your choice, thereafter you will paid at the end of the venture cycle together with your cash value return (CVR) payout.
                            </p>

                            <h3 class="font-bold text-center lg:text-[28px] lg:leading-[32px] lg:py-6">SIGN-UP TODAY <br> & <br> REFER SOMEONE TO START EARNING</h3> <br> 
                            <div class="text-sm lg:text-lg btn-primary text-center p-3 w-80" style="border-radius: 12px; margin: auto;">
                                <a href="{{ route('dashboard') }}" style="border-radius: 12px;" class="text-sm lg:text-lg btn-primary text-center p-3 w-80">
                                    Signup
                                </a>
                            </div>
                            
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

    function copyToClipboard() {
            var copyText = document.getElementById("myRefLink");
            // copyText.select();
            // copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);

            var span = document.getElementById("copied");
            span.style.display = "inline"
        }
</script>
@endsection