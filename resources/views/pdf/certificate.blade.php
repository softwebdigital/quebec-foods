<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300;400&display=swap" rel="stylesheet">
    <title>Investment Certificate</title>
    <style type="text/css" media="all">
        @page {
            margin: 0;
            padding: 0;
        }
        @font-face {
            font-family: 'Overpass';
            src: url('./assets/fonts/static/static/Overpass-SemiBold.ttf') format("ttf");
        }
        html{
            width: 100%;
            max-height: 100%;
            padding: 0 !important;
            margin: 0 !important;
        }
        body{
            padding: 0 !important;
            width: 100%;
            margin: 0 !important;
            height: 100%;
            font-family: 'Overpass', sans-serif;
        }
        .certificate{
            width: 100%;
            max-height: 100%;
            font-size: 50px;
            position: relative !important;
        }

        .certificate #bg img{
            /* position: absolute; */
            max-width: 100%;
        }

        .certificate .item{
            position: absolute !important;
            /* text-transform: capitalize; */
            font-size: 14px;
            font-weight: 600;
            color: #000;
            text-align: center !important;
            font-family: 'Overpass', sans-serif;
        }

        @media (max-width: 700px) {
            body{
                width: 100%;
            }
        }
    </style>
</head>
<body>
@php

$investment = App\Models\Investment::where('id', 39)->first();

 $cur = App\Models\Setting::where('id', 1)->first();

$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

$pin = mt_rand(1000, 9999)
    . mt_rand(1000, 9999)
    . $characters[rand(0, strlen($characters) - 1)];

$code = str_shuffle($pin);
@endphp
    @if($investment["package"]["type"] == 'farm')
    <div class="certificate" style="position: relative;">
        <div id="bg">
            <img src="./assets/media/FARM-ESTATE-DOI-01.png" alt="bg">
        </div>
            
            <div style="text-transform: capitalize; top: 169px; left: 72%; font-size: 12px; font-weight: 900;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="text-transform: capitalize; top: 282px; left: 21%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>

            <div style="text-transform: capitalize; top: 282px; left: 77%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["country"])) }}
            </div>
            
            <div style="top: 458px; left: 40%; font-size: 14px; font-weight: 900;" class="item">
                Farm Estate
            </div>
            <div style="top: 484px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ ucwords(strtolower($investment["package"]["name"])) }}
            </div>
            <div style="top: 516px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $code }}
            </div>
            <div style="top: 543px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["user"]["email"] }}
            </div>
            <div style="top: 575px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                @if($investment["package"]["duration"] > 1)
                    {{ $investment["package"]["duration"] }} {{ $investment["package"]["duration_mode"] }}s
                @else
                    {{ $investment["package"]["duration"] }} {{ $investment["package"]["duration_mode"] }} {{ $investment["package"]["milestones"] }} {{ $investment['return_date']->format('M d, Y \a\t h:i A') }}
                @endif
            </div>
            <div style="top: 604px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $cur->base_currency }} {{ number_format($investment["amount"]) }}
            </div>
            <div style="top: 633px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ number_format($investment["slots"]) }} {{ number_format($investment["slots"]) > 1 ? 'Units' : 'Unit' }} 
            </div>
            <div style="top: 663px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["roi"] }}% per {{ $investment["package"]["duration_mode"] }}
            </div>
            <div style="top: 693px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["milestones"] }} {{ $investment["package"]["milestones"] > 1 ? 'milestones per' : 'milestone per' }}  {{ $investment["package"]["duration_mode"] }}
            </div>
            <div style="top: 722px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="top: 750px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment['return_date']->format('F d,  Y') }}
                {{-- @if($investment["package"]["payout_mode"] == 'annually')
                    {{ Carbon\Carbon::now()->addMonths(12)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'monthly')
                    {{ Carbon\Carbon::now()->addMonths(24)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'quarterly')
                    {{ Carbon\Carbon::now()->addMonths(3)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'semi-annually')
                    {{ Carbon\Carbon::now()->addMonths(6)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'biannually')
                    {{ Carbon\Carbon::now()->addMonths(24)->format("F d,  Y") }}
                @endif --}}
            </div>
            <img style="max-width: 100%;" src="./assets/media/FARM-ESTATE-DOI-02.png" alt="bg">
        
            <div style="text-transform: capitalize; position: absolute; text-align: center !important; top: 794px; left: 20%; font-size: 15px; font-weight: 500;">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>
    </div>
    <div style="display: none;" class="certificate" style="position: relative;">
        <div id="bg">
            <img src="./assets/media/FARM-ESTATE-DOI-01.png" alt="bg">
        </div>
        <!-- <div> -->
            <div style="text-transform: capitalize; top: 166px; left: 73%; font-size: 15px; font-weight: 900;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
        

            <div style="text-transform: capitalize; top: 284px; left: 21%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>
            <div style="text-transform: capitalize; top: 284px; left: 75%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["country"])) }}
            </div>
            
            <div style="top: 459px; left: 40%; font-size: 15px; font-weight: 900;" class="item">
                Farm Estate
            </div>
            <div style="top: 481px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ ucwords(strtolower($investment["package"]["name"])) }}
            </div>
            <div style="top: 500px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["user"]["email"] }}
            </div>
            <div style="top: 520px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            @if($investment["package"]["duration"] > 1)
                {{ $investment["package"]["duration"] }} {{ $investment["package"]["duration_mode"] }}s
            @else
                {{ $investment["package"]["duration"] }} {{ $investment["package"]["duration_mode"] }} {{ $investment["package"]["milestones"] }} {{ $investment['return_date']->format('M d, Y \a\t h:i A') }}
            @endif
            </div>
            <div style="top: 537px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $cur->base_currency }} {{ number_format($investment["amount"]) }}
            </div>
            <div style="top: 555px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ number_format($investment["slots"]) }} {{ number_format($investment["slots"]) > 1 ? 'Units' : 'Unit' }} 
            </div>
            <div style="top: 577px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["roi"] }}% per {{ $investment["package"]["duration_mode"] }}
            </div>
            <div style="top: 599px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            
                {{ $investment["package"]["milestones"] }} {{ $investment["package"]["milestones"] > 1 ? 'milestones per' : 'milestone per' }}  {{ $investment["package"]["duration_mode"] }}
            
            </div>
            <div style="top: 617px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="top: 637px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment['return_date']->format('F d,  Y') }}
                {{-- @if($investment["package"]["duration_mode"] == 'day')
                    {{ Carbon\Carbon::now()->addDays($investment["package"]["duration"])->format("F d,  Y") }}
                @endif
                @if($investment["package"]["duration_mode"] == 'month')
                    {{ Carbon\Carbon::now()->addMonths($investment["package"]["duration"])->format("F d,  Y") }}
                @endif
                @if($investment["package"]["duration_mode"] == 'year')
                    {{ Carbon\Carbon::now()->addYears($investment["package"]["duration"])->format("F d,  Y") }}
                @endif --}}
            </div>

            <div style="top: 677px; left: 50%; font-size: 15px; font-weight: 500;" class="item">
                {{ ucwords(strtolower($investment["package"]["name"])) }}
            </div>
            <div style="top: 700px; left: 66%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["roi"] }}% per {{ $investment["package"]["duration_mode"] }}
            </div>
        <!-- </div> -->
        <!-- <div> -->
            <img style="max-width: 100%;" src="./assets/media/FARM-ESTATE-DOI-02.png" alt="bg">
        <!-- </div> -->
            <div style="text-transform: capitalize; position: absolute; text-align: center !important; top: 660px; left: 15%; font-size: 15px; font-weight: 500;">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>
    </div>
    @endif
   
    @if($investment["package"]["type"] == 'plant')
    <div class="certificate" style="position: relative;">
        <div id="bg">
            <img src="./assets/media/Processing-Plant-DOI-01.png" alt="bg">
        </div>
            
            <div style="text-transform: capitalize; top: 163px; left: 70%; font-size: 12px; font-weight: 900;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="text-transform: capitalize; top: 294px; left: 21%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>

            <div style="text-transform: capitalize; top: 292px; left: 77%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["country"])) }}
            </div>
            
            <div style="top: 447px; left: 40%; font-size: 14px; font-weight: 900;" class="item">
                Processing Plant
            </div>
            <div style="top: 475px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ ucwords(strtolower($investment["package"]["name"])) }}
            </div>
            <div style="top: 502px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["user"]["email"] }}
            </div>
            <div style="top: 532px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $code }}
            </div>
            <div style="top: 560px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                @if($investment["package"]["payout_mode"] == 'annually')
                    {{ $investment["package"]["milestones"] * 12 }} Months ({{ $investment["package"]["milestones"] * 1 }} Years)
                @endif

                @if($investment["package"]["payout_mode"] == 'monthly')
                    {{ $investment["package"]["milestones"] * 1 }} Month(s)
                @endif

                @if($investment["package"]["payout_mode"] == 'quarterly')
                    {{ $investment["package"]["milestones"] * 3 }} Months 
                    @if($investment["package"]["milestones"] * 0.25 >= 1) 
                        ({{ $investment["package"]["milestones"] * 0.25 }} Years) 
                    @endif
                @endif

                @if($investment["package"]["payout_mode"] == 'semi-annually')
                    {{ $investment["package"]["milestones"] * 6 }} Months  
                    @if($investment["package"]["milestones"] * 0.5 >= 1) 
                        ({{ $investment["package"]["milestones"] * 0.5 }} Years) 
                    @endif
                @endif

                @if($investment["package"]["payout_mode"] == 'biannually')
                    {{ $investment["package"]["milestones"] * 24 }} Months ({{ $investment["package"]["milestones"] * 2 }} Years)
                @endif
            </div>
            <div style="top: 588px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $cur->base_currency }} {{ number_format($investment["amount"]) }}
            </div>
            <div style="top: 617px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ number_format($investment["slots"]) }} {{ number_format($investment["slots"]) > 1 ? 'Units' : 'Unit' }} 
            </div>
            <div style="top: 646px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["roi"] }}% per 
                    {{ $investment["package"]["payout_mode"] == 'annually' ? 'annum' : '' }} 
                    {{ $investment["package"]["payout_mode"] == 'monthly' ? 'month' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'quarterly' ? '3 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'semi-annually' ? '6 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'biannually' ? '24 months (2 Years)' : '' }}
            </div>
            <div style="top: 675px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            
                {{ $investment["package"]["milestones"] }} {{ $investment["package"]["milestones"] > 1 ? 'milestones per' : 'milestone per' }}  
                    {{ $investment["package"]["payout_mode"] == 'annually' ? 'annum' : '' }} 
                    {{ $investment["package"]["payout_mode"] == 'monthly' ? 'month' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'quarterly' ? '3 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'semi-annually' ? '6 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'biannually' ? '24 months (2 Years)' : '' }}
            
            </div>
            <div style="top: 730px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="top: 701px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $cur->base_currency }} {{ number_format($investment['total_return']) }}
            </div>
            <div style="top: 759px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment['return_date']->format('F d,  Y') }}
                {{-- @if($investment["package"]["payout_mode"] == 'annually')
                    {{ Carbon\Carbon::now()->addMonths(12)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'monthly')
                    {{ Carbon\Carbon::now()->addMonths(24)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'quarterly')
                    {{ Carbon\Carbon::now()->addMonths(3)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'semi-annually')
                    {{ Carbon\Carbon::now()->addMonths(6)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'biannually')
                    {{ Carbon\Carbon::now()->addMonths(24)->format("F d,  Y") }}
                @endif --}}
            </div>
            <img style="max-width: 100%;" src="./assets/media/AGRIC-TRACTOR-DOI-02.png" alt="bg">
        
            <div style="text-transform: capitalize; position: absolute; text-align: center !important; top: 885px; left: 25%; font-size: 15px; font-weight: 500;">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>
    </div>
    @endif
    @if($investment["package"]["type"] == 'tractor')
    <div class="certificate" style="position: relative;">
        <div id="bg">
            <img src="./assets/media/AGRIC-TRACTOR-DOI-01.png" alt="bg">
        </div>
            
            <div style="text-transform: capitalize; top: 180px; left: 70%; font-size: 12px; font-weight: 900;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="text-transform: capitalize; top: 307px; left: 21%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>

            <div style="text-transform: capitalize; top: 307px; left: 77%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["country"])) }}
            </div>
            
            <div style="top: 481px; left: 40%; font-size: 14px; font-weight: 900;" class="item">
                Agric Tractor & Agro-Haulage Venture Scheme {ATAHVS} 
            </div>
            <div style="top: 509px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ ucwords(strtolower($investment["package"]["name"])) }}
            </div>
            <div style="top: 535px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["user"]["email"] }}
            </div>
            <div style="top: 563px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $code }}
            </div>
            <div style="top: 592px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                @if($investment["package"]["payout_mode"] == 'annually')
                    {{ $investment["package"]["milestones"] * 12 }} Months ({{ $investment["package"]["milestones"] * 1 }} Years)
                @endif

                @if($investment["package"]["payout_mode"] == 'monthly')
                    {{ $investment["package"]["milestones"] * 1 }} Month(s)
                @endif

                @if($investment["package"]["payout_mode"] == 'quarterly')
                    {{ $investment["package"]["milestones"] * 3 }} Months 
                    @if($investment["package"]["milestones"] * 0.25 >= 1) 
                        ({{ $investment["package"]["milestones"] * 0.25 }} Years) 
                    @endif
                @endif

                @if($investment["package"]["payout_mode"] == 'semi-annually')
                    {{ $investment["package"]["milestones"] * 6 }} Months  
                    @if($investment["package"]["milestones"] * 0.5 >= 1) 
                        ({{ $investment["package"]["milestones"] * 0.5 }} Years) 
                    @endif
                @endif

                @if($investment["package"]["payout_mode"] == 'biannually')
                    {{ $investment["package"]["milestones"] * 24 }} Months ({{ $investment["package"]["milestones"] * 2 }} Years)
                @endif
            </div>
            <div style="top: 622px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $cur->base_currency }} {{ number_format($investment["amount"]) }}
            </div>
            <div style="top: 650px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ number_format($investment["slots"]) }} {{ number_format($investment["slots"]) > 1 ? 'Units' : 'Unit' }} 
            </div>
            <div style="top: 680px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["roi"] }}% per 
                    {{ $investment["package"]["payout_mode"] == 'annually' ? 'annum' : '' }} 
                    {{ $investment["package"]["payout_mode"] == 'monthly' ? 'month' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'quarterly' ? '3 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'semi-annually' ? '6 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'biannually' ? '24 months (2 Years)' : '' }}
            </div>
            <div style="top: 709px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            
                {{ $investment["package"]["milestones"] }} {{ $investment["package"]["milestones"] > 1 ? 'milestones per' : 'milestone per' }}  
                    {{ $investment["package"]["payout_mode"] == 'annually' ? 'annum' : '' }} 
                    {{ $investment["package"]["payout_mode"] == 'monthly' ? 'month' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'quarterly' ? '3 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'semi-annually' ? '6 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'biannually' ? '24 months (2 Years)' : '' }}
            
            </div>
            <div style="top: 765px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="top: 735px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $cur->base_currency }} {{ number_format($investment['total_return']) }}
            </div>
            <div style="top: 793px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment['return_date']->format('F d,  Y') }}
                {{-- @if($investment["package"]["payout_mode"] == 'annually')
                    {{ Carbon\Carbon::now()->addMonths(12)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'monthly')
                    {{ Carbon\Carbon::now()->addMonths(24)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'quarterly')
                    {{ Carbon\Carbon::now()->addMonths(3)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'semi-annually')
                    {{ Carbon\Carbon::now()->addMonths(6)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'biannually')
                    {{ Carbon\Carbon::now()->addMonths(24)->format("F d,  Y") }}
                @endif --}}
            </div>
            <img style="max-width: 100%;" src="./assets/media/AGRIC-TRACTOR-DOI-02.png" alt="bg">
        
            <div style="text-transform: capitalize; position: absolute; text-align: center !important; top: 885px; left: 25%; font-size: 15px; font-weight: 500;">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>
    </div>
    @endif
</body>
</html>
