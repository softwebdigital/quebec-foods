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

// $investment = App\Models\Investment::where('id', 40)->first();

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
            
            <div style="text-transform: capitalize; top: 144px; left: 72%; font-size: 12px; font-weight: 900;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="text-transform: capitalize; top: 259px; left: 12%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>

            <div style="text-transform: capitalize; top: 259px; left: 77%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["country"])) }}
            </div>
            
            <div style="top: 433px; left: 40%; font-size: 14px; font-weight: 900;" class="item">
                Farm Estate
            </div>
            <div style="top: 461px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ ucwords(strtolower($investment["package"]["name"])) }}
            </div>
            <div style="top: 490px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $code }}
            </div>
            <div style="top: 522px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["user"]["email"] }}
            </div>
            <div style="top: 549px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                @if($investment["package"]["duration"] > 1)
                    {{ $investment["package"]["duration"] }} {{ $investment["package"]["duration_mode"] }}s
                @else
                    {{ $investment["package"]["duration"] }} {{ $investment["package"]["duration_mode"] }} {{ $investment["package"]["milestones"] }} {{ $investment['return_date']->format('M d, Y \a\t h:i A') }}
                @endif
            </div>
            <div style="top: 579px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $cur->base_currency }} {{ number_format($investment["amount"]) }}
            </div>
            <div style="top: 607px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ number_format($investment["slots"]) }} {{ number_format($investment["slots"]) > 1 ? 'Units' : 'Unit' }} 
            </div>
            <div style="top: 639px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["roi"] }}% per {{ $investment["package"]["duration_mode"] }}
            </div>
            <!-- <div style="top: 693px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["milestones"] }} {{ $investment["package"]["milestones"] > 1 ? 'milestones' : 'milestone' }}
            </div> -->
            <div style="top: 666px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="top: 696px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment['return_date']->format('F d,  Y') }}
            </div>
            <img style="max-width: 100%;" src="./assets/media/FARM-ESTATE-DOI-02.png" alt="bg">
        
            <div style="text-transform: capitalize; position: absolute; text-align: center !important; top: 774px; left: 13%; font-size: 15px; font-weight: 500;">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>
    </div>
    @endif
   
    @if($investment["package"]["type"] == 'plant')
    <div class="certificate" style="position: relative;">
        <div id="bg">
            <img src="./assets/media/Processing-Plant-DOI-01.png" alt="bg">
        </div>
            
            <div style="text-transform: capitalize; top: 87px; left: 70%; font-size: 12px; font-weight: 900;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="text-transform: capitalize; top: 216px; left: 13%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>

            <div style="text-transform: capitalize; top: 212px; left: 77%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["country"])) }}
            </div>
            
            <div style="top: 359px; left: 40%; font-size: 14px; font-weight: 900;" class="item">
                Processing Plant
            </div>
            <div style="top: 388px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ ucwords(strtolower($investment["package"]["name"])) }}
            </div>
            <div style="top: 416px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["user"]["email"] }}
            </div>
            <div style="top: 443px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $code }}
            </div>
            <div style="top: 469px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                @if($investment["package"]["payout_mode"] == 'annually')
                    {{ $investment["package"]["milestones"] * 12 }} Months
                @endif

                @if($investment["package"]["payout_mode"] == 'monthly')
                    {{ $investment["package"]["milestones"] * 1 }} Month(s)
                @endif

                @if($investment["package"]["payout_mode"] == 'quarterly')
                    {{ $investment["package"]["milestones"] * 3 }} Months 
                @endif

                @if($investment["package"]["payout_mode"] == 'semi-annually')
                    {{ $investment["package"]["milestones"] * 6 }} Months
                @endif

                @if($investment["package"]["payout_mode"] == 'biannually')
                    {{ $investment["package"]["milestones"] * 24 }} Months
                @endif
            </div>
            <div style="top: 498px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $cur->base_currency }} {{ number_format($investment["amount"]) }}
            </div>
            <div style="top: 527px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ number_format($investment["slots"]) }} {{ number_format($investment["slots"]) > 1 ? 'Units' : 'Unit' }} 
            </div>
            <div style="top: 555px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["roi"] }}% per 
                    {{ $investment["package"]["payout_mode"] == 'annually' ? 'annum' : '' }} 
                    {{ $investment["package"]["payout_mode"] == 'monthly' ? 'month' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'quarterly' ? '3 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'semi-annually' ? '6 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'biannually' ? '24 months' : '' }}
            </div>
            <div style="top: 583px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["milestones"] }} {{ $investment["package"]["milestones"] > 1 ? 'milestones' : 'milestone' }}
            </div>
            <div style="top: 638px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="top: 608px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["roi"] * $investment["package"]["milestones"] }}%
            </div>
            <div style="top: 665px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
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
            <img style="max-width: 100%;" src="./assets/media/Processing-Plant-DOI-02.png" alt="bg">
        
            <div style="text-transform: capitalize; position: absolute; text-align: center !important; top: 906px; left: 15%; font-size: 15px; font-weight: 500;">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>
    </div>
    @endif
    @if($investment["package"]["type"] == 'tractor')
    <div class="certificate" style="position: relative;">
        <div id="bg">
            <img src="./assets/media/AGRIC-TRACTOR-DOI-01.png" alt="bg">
        </div>
            
            <div style="text-transform: capitalize; top: 89px; left: 70%; font-size: 12px; font-weight: 900;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="text-transform: capitalize; top: 215px; left: 13%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>

            <div style="text-transform: capitalize; top: 215px; left: 77%; font-size: 15px; font-weight: 900;" class="item">
                {{ ucwords(strtolower($investment["user"]["country"])) }}
            </div>
            
            <div style="top: 360px; left: 40%; font-size: 14px; font-weight: 900;" class="item">
                Agric Tractor & Agro-Haulage Venture Scheme {ATAHVS} 
            </div>
            <div style="top: 389px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ ucwords(strtolower($investment["package"]["name"])) }}
            </div>
            <div style="top: 415px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["user"]["email"] }}
            </div>
            <div style="top: 441px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $code }}
            </div>
            <div style="top: 467px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                @if($investment["package"]["payout_mode"] == 'annually')
                    {{ $investment["package"]["milestones"] * 12 }} Months 
                @endif

                @if($investment["package"]["payout_mode"] == 'monthly')
                    {{ $investment["package"]["milestones"] * 1 }} Month(s)
                @endif

                @if($investment["package"]["payout_mode"] == 'quarterly')
                    {{ $investment["package"]["milestones"] * 3 }} Months
                @endif

                @if($investment["package"]["payout_mode"] == 'semi-annually')
                    {{ $investment["package"]["milestones"] * 6 }} Months 
                @endif

                @if($investment["package"]["payout_mode"] == 'biannually')
                    {{ $investment["package"]["milestones"] * 24 }} Months
                @endif
            </div>
            <div style="top: 497px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $cur->base_currency }} {{ number_format($investment["amount"]) }}
            </div>
            <div style="top: 523px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ number_format($investment["slots"]) }} {{ number_format($investment["slots"]) > 1 ? 'Units' : 'Unit' }} 
            </div>
            <div style="top: 555px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["roi"] }}% per 
                    {{ $investment["package"]["payout_mode"] == 'annually' ? 'annum' : '' }} 
                    {{ $investment["package"]["payout_mode"] == 'monthly' ? 'month' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'quarterly' ? '3 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'semi-annually' ? '6 months' : '' }}
                    {{ $investment["package"]["payout_mode"] == 'biannually' ? '24 months' : '' }}
            </div>
            <div style="top: 584px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            
                {{ $investment["package"]["milestones"] }} {{ $investment["package"]["milestones"] > 1 ? 'milestones' : 'milestone' }}
            
            </div>
            <div style="top: 637px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["investment_date"]->format("F d,  Y") }}
            </div>
            <div style="top: 610px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
                {{ $investment["package"]["roi"] * $investment["package"]["milestones"] }}%
            </div>
            <div style="top: 664px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
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
        
            <div style="text-transform: capitalize; position: absolute; text-align: center !important; top: 809px; left: 15%; font-size: 15px; font-weight: 500;">
                {{ ucwords(strtolower($investment["user"]["name"])) }}
            </div>
    </div>
    @endif
</body>
</html>
