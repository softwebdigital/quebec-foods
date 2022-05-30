<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
=======
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
>>>>>>> 01869ff (queue custom notifications)
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
<<<<<<< HEAD
=======
        @font-face {
            font-family: 'Overpass';
            src: url('./assets/fonts/static/static/Overpass-SemiBold.ttf') format("ttf");
        }
>>>>>>> 01869ff (queue custom notifications)
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
<<<<<<< HEAD
            text-transform: capitalize;
            font-size: 14px;
            font-weight: 400;
            color: #000;
            text-align: center !important;
=======
            /* text-transform: capitalize; */
            font-size: 14px;
            font-weight: 600;
            color: #000;
            text-align: center !important;
            font-family: 'Overpass', sans-serif;
>>>>>>> 01869ff (queue custom notifications)
        }

        @media (max-width: 700px) {
            body{
                width: 100%;
            }
        }
    </style>
</head>
<body>
<<<<<<< HEAD
=======
@php

$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

$pin = mt_rand(1000000, 9999999)
    . mt_rand(1000000, 9999999)
    . $characters[rand(0, strlen($characters) - 1)];

$code = str_shuffle($pin);
@endphp
>>>>>>> 01869ff (queue custom notifications)
    @if($investment["package"]["type"] == 'farm')
<div class="certificate" style="position: relative;">
    <div id="bg">
        <img src="./assets/media/quebec-deed-of-investment-farm-01.png" alt="bg">
    </div>
    <!-- <div> -->
<<<<<<< HEAD
        <div style="top: 425px; left: 15%; font-size: 15px; font-weight: 900;" class="item">
=======
        <div style="text-transform: capitalize; top: 425px; left: 15%; font-size: 15px; font-weight: 900;" class="item">
>>>>>>> 01869ff (queue custom notifications)
            {{ ucwords(strtolower($investment["user"]["name"])) }}
        </div>
        
        <div style="top: 583px; left: 40%; font-size: 15px; font-weight: 900;" class="item">
            {{ ucwords(strtolower($investment["package"]["name"])) }}
        </div>
        <div style="top: 600px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ ucwords(strtolower($investment["package"]["type"])) }}
        </div>
        <div style="top: 620px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
<<<<<<< HEAD
            (Auto Generated from the investment portal)
        </div>
        <div style="top: 644px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ $investment["package"]["payout_mode"] }}
        </div>
        <div style="top: 665px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            NGN {{ number_format($investment["amount"]) }}
=======
            {{$code}}{{$investment["id"]}}
        </div>
        <div style="top: 644px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
        @if($investment["duration"] > 1)
            {{ $investment["package"]["duration"] }} {{ $investment["package"]["duration_mode"] }}'(s)'
        @else
            {{ $investment["package"]["duration"] }} {{ $investment["package"]["duration_mode"] }}
        @endif
        </div>
        <div style="top: 665px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ getCurrency() }} {{ number_format($investment["amount"]) }}
>>>>>>> 01869ff (queue custom notifications)
        </div>
        <div style="top: 688px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ number_format($investment["slots"]) }} {{ number_format($investment["slots"]) > 1 ? 'Units' : 'Unit' }} 
        </div>
        <div style="top: 711px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ $investment["package"]["roi"] }}% per {{ $investment["package"]["duration_mode"] }}
        </div>
        <div style="top: 735px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
        
            {{ $investment["package"]["milestones"] }} {{ $investment["package"]["milestones"] > 1 ? 'milestones per' : 'milestone per' }}  {{ $investment["package"]["duration_mode"] }}
        
        </div>
        <div style="top: 755px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ $investment["investment_date"]->format("F d  Y") }}
        </div>
        <div style="top: 779px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ $investment["start_date"]->format("F d  Y") }}
        </div>
    <!-- </div> -->
    <!-- <div> -->
        <img style="max-width: 100%;" src="./assets/media/quebec-deed-of-investment-farm-02.png" alt="bg">
    <!-- </div> -->
<<<<<<< HEAD
        <div style="position: absolute; text-align: center !important; top: 845px; left: 15%; font-size: 15px; font-weight: 500;">
=======
        <div style="text-transform: capitalize; position: absolute; text-align: center !important; top: 845px; left: 15%; font-size: 15px; font-weight: 500;">
>>>>>>> 01869ff (queue custom notifications)
            {{ ucwords(strtolower($investment["user"]["name"])) }}
        </div>
</div>
    @else
<div class="certificate" style="position: relative;">
    <div id="bg">
        <img src="./assets/media/quebec-deed-of-investment-plant-01.png" alt="bg">
    </div>
    <!-- <div> -->
<<<<<<< HEAD
        <div style="top: 315px; left: 15%; font-size: 15px; font-weight: 900;" class="item">
=======
        <div style="text-transform: capitalize; top: 315px; left: 15%; font-size: 15px; font-weight: 900;" class="item">
>>>>>>> 01869ff (queue custom notifications)
            {{ ucwords(strtolower($investment["user"]["name"])) }}
        </div>
        
        <div style="top: 477px; left: 40%; font-size: 15px; font-weight: 900;" class="item">
            {{ ucwords(strtolower($investment["package"]["name"])) }}
        </div>
        <div style="top: 505px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ ucwords(strtolower($investment["package"]["type"])) }}
        </div>
        <div style="top: 530px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
<<<<<<< HEAD
            (Auto Generated from the investment portal)
        </div>
        <div style="top: 561px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ $investment["package"]["payout_mode"] }}
        </div>
        <div style="top: 588px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            NGN {{ number_format($investment["amount"]) }}
=======
            {{$code}}{{$investment["id"]}}
        </div>
        <div style="top: 561px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            @if($investment["package"]["payout_mode"] == 'monthly')
                1 Month
            @endif
            @if($investment["package"]["payout_mode"] == 'quarterly')
                3 Months
            @endif
            @if($investment["package"]["payout_mode"] == 'semi-annually')
                6 Months
            @endif
            @if($investment["package"]["payout_mode"] == 'annually')
                12 Months (1 Year)
            @endif
            @if($investment["package"]["payout_mode"] == 'biannually')
                24 Months (2 Year)
            @endif
        </div>
        <div style="top: 588px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
        {{ getCurrency() }} {{ number_format($investment["amount"]) }}
>>>>>>> 01869ff (queue custom notifications)
        </div>
        <div style="top: 611px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ number_format($investment["slots"]) }} {{ number_format($investment["slots"]) > 1 ? 'Units' : 'Unit' }} 
        </div>
        <div style="top: 646px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ $investment["package"]["roi"] }}% per {{ $investment["package"]["duration_mode"] }}
        </div>
        <div style="top: 675px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
        
            {{ $investment["package"]["milestones"] }} {{ $investment["package"]["milestones"] > 1 ? 'milestones per' : 'milestone per' }}  {{ $investment["package"]["duration_mode"] }}
        
        </div>
        <div style="top: 705px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ $investment["investment_date"]->format("F d  Y") }}
        </div>
        <div style="top: 735px; left: 40%; font-size: 15px; font-weight: 500;" class="item">
            {{ $investment["start_date"]->format("F d  Y") }}
        </div>
    <!-- </div> -->
    <!-- <div> -->
        <img style="max-width: 100%;" src="./assets/media/quebec-deed-of-investment-plant-02.png" alt="bg">
    <!-- </div> -->
<<<<<<< HEAD
        <div style="position: absolute; text-align: center !important; top: 865px; left: 15%; font-size: 15px; font-weight: 500;">
=======
        <div style="text-transform: capitalize; position: absolute; text-align: center !important; top: 865px; left: 15%; font-size: 15px; font-weight: 500;">
>>>>>>> 01869ff (queue custom notifications)
            {{ ucwords(strtolower($investment["user"]["name"])) }}
        </div>
</div>
    @endif
</body>
</html>
