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
        <!-- <div> -->
            <div style="text-transform: capitalize; top: 287px; left: 15%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>

            <div style="text-transform: capitalize; top: 285px; left: 75%; font-size: 15px; font-weight: 900;" class="item">
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
                {{ $investment["package"]["duration"] }} {{ $investment["package"]["duration_mode"] }}
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
                @if($investment["package"]["duration_mode"] == 'day')
                    {{ Carbon\Carbon::now()->addDays($investment["package"]["duration"])->format("F d,  Y") }}
                @endif
                @if($investment["package"]["duration_mode"] == 'month')
                    {{ Carbon\Carbon::now()->addMonths($investment["package"]["duration"])->format("F d,  Y") }}
                @endif
                @if($investment["package"]["duration_mode"] == 'year')
                    {{ Carbon\Carbon::now()->addYears($investment["package"]["duration"])->format("F d,  Y") }}
                @endif
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
    
        <div style="text-transform: capitalize; top: 295px; left: 15%; font-size: 15px; font-weight: 900;" class="item">
            {{ ucwords(strtolower($investment["user"]["name"])) }}
        </div>

        <div style="text-transform: capitalize; top: 295px; left: 75%; font-size: 15px; font-weight: 900;" class="item">
            {{ ucwords(strtolower($investment["user"]["country"])) }}
        </div>
        
        <div style="top: 444px; left: 40%; font-size: 15px; font-weight: 900;" class="item">
            Processing Plant
        </div>
        <div style="top: 465px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ ucwords(strtolower($investment["package"]["name"])) }}
        </div>
        <div style="top: 485px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ $code }}
        </div>
        <div style="top: 503px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            @if($investment["package"]["payout_mode"] == 'annually')
                12 Months (1 Year)
            @endif

            @if($investment["package"]["payout_mode"] == 'monthly')
                1 Month
            @endif

            @if($investment["package"]["payout_mode"] == 'quarterly')
                4 Months
            @endif

            @if($investment["package"]["payout_mode"] == 'semi-annually')
                6 Months
            @endif

            @if($investment["package"]["payout_mode"] == 'biannually')
                24 Months (2 Year)
            @endif

        </div>
        <div style="top: 524px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ getCurrency() }} {{ number_format($investment["amount"]) }}
        </div>
        <div style="top: 542px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ number_format($investment["slots"]) }} {{ number_format($investment["slots"]) > 1 ? 'Units' : 'Unit' }} 
        </div>
        <div style="top: 562px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ $investment["package"]["roi"] }}% per 
                {{ $investment["package"]["payout_mode"] == 'annually' ? 'annum' : '' }} 
                {{ $investment["package"]["payout_mode"] == 'monthly' ? 'month' : '' }}
                {{ $investment["package"]["payout_mode"] == 'quarterly' ? '4 months' : '' }}
                {{ $investment["package"]["payout_mode"] == 'semi-annually' ? '6 months' : '' }}
                {{ $investment["package"]["payout_mode"] == 'biannually' ? '24 months (2 Years)' : '' }}
        </div>
        <div style="top: 581px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
        
            {{ $investment["package"]["milestones"] }} {{ $investment["package"]["milestones"] > 1 ? 'milestones per' : 'milestone per' }}  
                {{ $investment["package"]["payout_mode"] == 'annually' ? 'annum' : '' }} 
                {{ $investment["package"]["payout_mode"] == 'monthly' ? 'month' : '' }}
                {{ $investment["package"]["payout_mode"] == 'quarterly' ? '4 months' : '' }}
                {{ $investment["package"]["payout_mode"] == 'semi-annually' ? '6 months' : '' }}
                {{ $investment["package"]["payout_mode"] == 'biannually' ? '24 months (2 Years)' : '' }}
        
        </div>
        <div style="top: 601px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ $investment["investment_date"]->format("F d,  Y") }}
        </div>
        <div style="top: 620px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                @if($investment["package"]["payout_mode"] == 'annually')
                    {{ Carbon\Carbon::now()->addMonths(12)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'monthly')
                    {{ Carbon\Carbon::now()->addMonths(24)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'quarterly')
                    {{ Carbon\Carbon::now()->addMonths(4)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'semi-annually')
                    {{ Carbon\Carbon::now()->addMonths(6)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'biannually')
                    {{ Carbon\Carbon::now()->addMonths(24)->format("F d,  Y") }}
                @endif
        </div>

        <div style="top: 657px; left: 50%; font-size: 15px; font-weight: 500;" class="item">
            {{ ucwords(strtolower($investment["package"]["name"])) }}
        </div>
        <div style="top: 695px; left: 66%; font-size: 15px; font-weight: 500;" class="item">
            {{ $investment["package"]["roi"] }}% per 
                {{ $investment["package"]["payout_mode"] == 'annually' ? 'annum' : '' }} 
                {{ $investment["package"]["payout_mode"] == 'monthly' ? 'month' : '' }}
                {{ $investment["package"]["payout_mode"] == 'quarterly' ? '4 months' : '' }}
                {{ $investment["package"]["payout_mode"] == 'semi-annually' ? '6 months' : '' }}
                {{ $investment["package"]["payout_mode"] == 'biannually' ? '24 months (2 Years)' : '' }}
        </div>
    
        <img style="max-width: 100%;" src="./assets/media/Processing-Plant-DOI-02.png" alt="bg">
    
        <div style="text-transform: capitalize; position: absolute; text-align: center !important; top: 710px; left: 15%; font-size: 15px; font-weight: 500;">
            {{ ucwords(strtolower($investment["user"]["name"])) }}
        </div>
    </div>
    @endif
    @if($investment["package"]["type"] == 'tractor')
    <div class="certificate" style="position: relative;">
        <div id="bg">
            <img src="./assets/media/AGRIC-TRACTOR-DOI-01.png" alt="bg">
        </div>
        <!-- <div> -->
            <div style="text-transform: capitalize; top: 307px; left: 15%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>

            <div style="text-transform: capitalize; top: 307px; left: 68%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["country"])) }}
            </div>
            
            <div style="top: 481px; left: 40%; font-size: 14px; font-weight: 900;" class="item">
                Agric Tractor & Agro-Haulage Venture Scheme {ATAHVS} 
            </div>
            <div style="top: 503px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ ucwords(strtolower($investment["package"]["name"])) }}
            </div>
            <div style="top: 520px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $code }}
            </div>
            <div style="top: 537px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                @if($investment["package"]["payout_mode"] == 'annually')
                    12 Months (1 Year)
                @endif

                @if($investment["package"]["payout_mode"] == 'monthly')
                    1 Month
                @endif

                @if($investment["package"]["payout_mode"] == 'quarterly')
                    4 Months
                @endif

                @if($investment["package"]["payout_mode"] == 'semi-annually')
                    6 Months
                @endif

                @if($investment["package"]["payout_mode"] == 'biannually')
                    24 Months (2 Year)
                @endif
            </div>
            <div style="top: 555px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ getCurrency() }} {{ number_format($investment["amount"]) }}
            </div>
            <div style="top: 577px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ number_format($investment["slots"]) }} {{ number_format($investment["slots"]) > 1 ? 'Units' : 'Unit' }} 
            </div>
            <div style="top: 599px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["roi"] }}% per 
                    {{ $investment["package"]["payout_mode"] == 'annually' ? 'annum' : '' }} 
                    {{ $investment["package"]["payout_mode"] == 'monthly' ? 'month' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'quarterly' ? '4 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'semi-annually' ? '6 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'biannually' ? '24 months (2 Years)' : '' }}
            </div>
            <div style="top: 617px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            
                {{ $investment["package"]["milestones"] }} {{ $investment["package"]["milestones"] > 1 ? 'milestones per' : 'milestone per' }}  
                    {{ $investment["package"]["payout_mode"] == 'annually' ? 'annum' : '' }} 
                    {{ $investment["package"]["payout_mode"] == 'monthly' ? 'month' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'quarterly' ? '4 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'semi-annually' ? '6 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'biannually' ? '24 months (2 Years)' : '' }}
            
            </div>
            <div style="top: 633px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="top: 652px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                @if($investment["package"]["payout_mode"] == 'annually')
                    {{ Carbon\Carbon::now()->addMonths(12)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'monthly')
                    {{ Carbon\Carbon::now()->addMonths(24)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'quarterly')
                    {{ Carbon\Carbon::now()->addMonths(4)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'semi-annually')
                    {{ Carbon\Carbon::now()->addMonths(6)->format("F d,  Y") }}
                @endif
                @if($investment["package"]["payout_mode"] == 'biannually')
                    {{ Carbon\Carbon::now()->addMonths(24)->format("F d,  Y") }}
                @endif
            </div>

            <div style="top: 688px; left: 50%; font-size: 15px; font-weight: 500;" class="item">
                {{ ucwords(strtolower($investment["package"]["name"])) }}
            </div>
            <div style="top: 727px; left: 66%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["roi"] }}% per 
                    {{ $investment["package"]["payout_mode"] == 'annually' ? 'annum' : '' }} 
                    {{ $investment["package"]["payout_mode"] == 'monthly' ? 'month' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'quarterly' ? '4 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'semi-annually' ? '6 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'biannually' ? '24 months (2 Years)' : '' }}
            </div>
        <!-- </div> -->
        <!-- <div> -->
            <img style="max-width: 100%;" src="./assets/media/AGRIC-TRACTOR-DOI-02.png" alt="bg">
        <!-- </div> -->
            <div style="text-transform: capitalize; position: absolute; text-align: center !important; top: 770px; left: 15%; font-size: 15px; font-weight: 500;">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>
    </div>
    @endif
</body>
</html>
