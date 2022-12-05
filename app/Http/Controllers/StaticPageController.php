<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\View\View;

class StaticPageController extends Controller
{
    public function home(): View
    {
        SEOMeta::setTitle('Quebec Food Processing - Agri-tech | Farm Investment | Digital Farming');
        SEOMeta::setDescription('Quebec Food is an agritech company that deals in agricultural production, processing, marketing, distribution, and agro-export ventures to provide investors with huge investment opportunities to impact the lives of devoted farmers in Nigeria.');
        SEOMeta::setCanonical(route('static.home'));

        OpenGraph::setTitle('Home');
        OpenGraph::setDescription('Quebec Food is an agritech company that deals in agricultural production, processing, marketing, distribution, and agro-export ventures to provide investors with huge investment opportunities to impact the lives of devoted farmers in Nigeria.');
        OpenGraph::setUrl(route('static.home'));
        OpenGraph::addImage(asset(env('LOGO')));

        JsonLd::setTitle('Home');
        JsonLd::setUrl(route('static.home'));
        JsonLd::setDescription('Quebec Food is an agritech company that deals in agricultural production, processing, marketing, distribution, and agro-export ventures to provide investors with huge investment opportunities to impact the lives of devoted farmers in Nigeria.');
        JsonLd::addImage(asset(env('LOGO')));

        return view('static.home');
    }

    public function about(): View
    {
        SEOMeta::setTitle('About us - Quebec Food Processing | Quebec Foods');
        SEOMeta::setDescription('Q-BEC Foods is a registered trademark of Quebec Food Processing Industrial Parks Ltd an agro-food, fruits & Vegetables processing firm incorporated in 2020 under the Companies & Allied Matters 1990 of the Federal Republic of Nigeria with RC: 1710593.');
        SEOMeta::setCanonical(route('static.about'));

        OpenGraph::setTitle('About us - Quebec Food Processing | Quebec Foods');
        OpenGraph::setDescription('Q-BEC Foods is a registered trademark of Quebec Food Processing Industrial Parks Ltd an agro-food, fruits & Vegetables processing firm incorporated in 2020 under the Companies & Allied Matters 1990 of the Federal Republic of Nigeria with RC: 1710593.');
        OpenGraph::setUrl(route('static.about'));
        OpenGraph::addImage(asset(env('LOGO')));

        JsonLd::setTitle('About us - Quebec Food Processing | Quebec Foods');
        JsonLd::setDescription('Q-BEC Foods is a registered trademark of Quebec Food Processing Industrial Parks Ltd an agro-food, fruits & Vegetables processing firm incorporated in 2020 under the Companies & Allied Matters 1990 of the Federal Republic of Nigeria with RC: 1710593.');
        JsonLd::addImage(asset(env('LOGO')));
        JsonLd::setUrl(route('static.about'));

        return view('static.about');
    }

    public function contact(): View
    {
        SEOMeta::setTitle('Contact Us  - Become a Partner Today - Quebec Food Processing');
        SEOMeta::setDescription('Contact Us  - Become a Partner Today - Quebec Food Processing');
        SEOMeta::setCanonical(route('static.contact'));

        OpenGraph::setTitle('Contact Us  - Become a Partner Today - Quebec Food Processing');
        OpenGraph::setDescription('Contact Us  - Become a Partner Today - Quebec Food Processing');
        OpenGraph::setUrl(route('static.contact'));
        OpenGraph::addImage(asset(env('LOGO')));

        JsonLd::setTitle('Contact Us  - Become a Partner Today - Quebec Food Processing');
        JsonLd::setDescription('Contact Us  - Become a Partner Today - Quebec Food Processing');
        JsonLd::addImage(asset(env('LOGO')));
        JsonLd::setUrl(route('static.contact'));

        return view('static.contact');
    }

    public function faq(): View
    {
        SEOMeta::setTitle('Frequently Asked Questions  - Quebec Food Processing | Quebec Foods');
        SEOMeta::setDescription('Explore the frequently asked questions on how to invest, our Farm Estate, our Processing Plant, and our Tractor Investment to become a digital Farmer & Processor in 5 minutes.');
        SEOMeta::setCanonical(route('static.faq'));

        OpenGraph::setTitle('Frequently Asked Questions  - Quebec Food Processing | Quebec Foods');
        OpenGraph::setDescription('Explore the frequently asked questions on how to invest, our Farm Estate, our Processing Plant, and our Tractor Investment to become a digital Farmer & Processor in 5 minutes.');
        OpenGraph::setUrl(route('static.faq'));
        OpenGraph::addImage(asset(env('LOGO')));

        JsonLd::setTitle('Frequently Asked Questions  - Quebec Food Processing | Quebec Foods');
        JsonLd::setDescription('Explore the frequently asked questions on how to invest, our Farm Estate, our Processing Plant, and our Tractor Investment to become a digital Farmer & Processor in 5 minutes.');
        JsonLd::addImage(asset(env('LOGO')));
        JsonLd::setUrl(route('static.faq'));

        return view('static.faq');
    }

    public function farm(): View
    {
        SEOMeta::setTitle('Farm Estate - Quebec Food Processing | Quebec Foods');
        SEOMeta::setDescription('Invest in our farm estate and buy-back venture scheme and earn up to 40% Cash Value Return. Our Investment Scheme is open to public and private institutions.');
        SEOMeta::setCanonical(route('static.farm'));

        OpenGraph::setTitle('Farm Estate - Quebec Food Processing | Quebec Foods');
        OpenGraph::setDescription('Invest in our farm estate and buy-back venture scheme and earn up to 40% Cash Value Return. Our Investment Scheme is open to public and private institutions.');
        OpenGraph::setUrl(route('static.farm'));
        OpenGraph::addImage(asset(env('LOGO')));

        JsonLd::setTitle('Farm Estate - Quebec Food Processing | Quebec Foods');
        JsonLd::setDescription('Invest in our farm estate and buy-back venture scheme and earn up to 40% Cash Value Return. Our Investment Scheme is open to public and private institutions.');
        JsonLd::addImage(asset(env('LOGO')));
        JsonLd::setUrl(route('static.farm'));

        return view('static.farm-estate');
    }

    public function privacy(): View
    {
        return view('static.privacy-policy');
    }

    public function plant(): View
    {
        SEOMeta::setTitle('Processing Plant - Quebec Food Processing | Quebec Foods');
        SEOMeta::setDescription('Invest in our Processing Plant scheme and earn up to 33% Cash Value Return. Our Investment Scheme is open to public and private institutions.');
        SEOMeta::setCanonical(route('static.plant'));

        OpenGraph::setTitle('Processing Plant - Quebec Food Processing | Quebec Foods');
        OpenGraph::setDescription('Invest in our Processing Plant scheme and earn up to 33% Cash Value Return. Our Investment Scheme is open to public and private institutions.');
        OpenGraph::setUrl(route('static.plant'));
        OpenGraph::addImage(asset(env('LOGO')));

        JsonLd::setTitle('Processing Plant - Quebec Food Processing | Quebec Foods');
        JsonLd::setDescription('Invest in our Processing Plant scheme and earn up to 33% Cash Value Return. Our Investment Scheme is open to public and private institutions.');
        JsonLd::addImage(asset(env('LOGO')));
        JsonLd::setUrl(route('static.plant'));

        return view('static.processing-plant');
    }

    public function terms(): View
    {
        return view('static.terms');
    }

    public function teams(): View
    {
        return view('static.team');
    }

    public function tractor(): View
    {
        SEOMeta::setTitle('Agric Tractor & Agro- haulage - Quebec Food Processing | Quebec Foods');
        SEOMeta::setDescription('Invest in our Agric Tractor & Agro- haulage Venture scheme and earn up to 12.5% Cash Value Return. Our Investment Scheme is open to public and private institutions.');
        SEOMeta::setCanonical(route('static.plant'));

        OpenGraph::setTitle('Agric Tractor & Agro- haulage - Quebec Food Processing | Quebec Foods');
        OpenGraph::setDescription('Invest in our Agric Tractor & Agro- haulage Venture scheme and earn up to 12.5% Cash Value Return. Our Investment Scheme is open to public and private institutions.');
        OpenGraph::setUrl(route('static.plant'));
        OpenGraph::addImage(asset(env('LOGO')));

        JsonLd::setTitle('Agric Tractor & Agro- haulage - Quebec Food Processing | Quebec Foods');
        JsonLd::setDescription('Invest in our Agric Tractor & Agro- haulage Venture scheme and earn up to 12.5% Cash Value Return. Our Investment Scheme is open to public and private institutions.');
        JsonLd::addImage(asset(env('LOGO')));
        JsonLd::setUrl(route('static.plant'));

        return view('static.tractor-investment');
    }

    public function disclaimer(): View
    {
        return view('static.disclaimer');
    }

    public function referal(): View
    {
        return view('static.referal');
    }
}
