<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<!--begin::Head-->
	<head><base href="{{env("APP_URL")}}">
		<title>Quebec - @yield('pageTitle')</title>
		<meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="{{ app()->getLocale() }}" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Quebec - @yield('pageTitle')" />
		<meta property="og:url" content="{{env("APP_URL")}}" />
		<meta property="og:site_name" content="{{env("APP_NAME")}}" />
		<link rel="canonical" href="{{env('APP_URL')}}" />
		<link rel="shortcut icon" href="{{ asset('assets/logo/Favicon.png') }}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
        @yield('style')
        <style>
            #gatewayPaystack.active {
                background: #50cd89;
                padding: 6px;
            }
            #gatewayFlw.active {
                background: #50cd89;
                padding: 6px;
            }
            #farmGatewayPaystack.active {
                background: #50cd89;
                padding: 6px;
            }
            #farmGatewayFlw.active {
                background: #50cd89;
                padding: 6px;
            }
            #plantGatewayPaystack.active {
                background: #50cd89;
                padding: 6px;
            }
            #plantGatewayFlw.active {
                background: #50cd89;
                padding: 6px;
            }
            #gatewayPaystack {
                background: #ffffff;
                padding: 6px;
            }
            #gatewayFlw {
                background: #ffffff;
                padding: 6px;
            }
            #farmGatewayPaystack {
                background: #ffffff;
                padding: 6px;
            }
            #farmGatewayFlw {
                background: #ffffff;
                padding: 6px;
            }
            #plantGatewayPaystack {
                background: #ffffff;
                padding: 6px;
            }
            #plantGatewayFlw {
                background: #ffffff;
                padding: 6px;
            }
        </style>
		<!--end::Global Stylesheets Bundle-->
        <!-- Google tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-240602613-1">
        </script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-240602613-1');
        </script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="dark-mode">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside pt-7 pb-4 pb-lg-7 pt-lg-17" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto px-9 mb-9 mb-lg-17 mx-auto" id="kt_aside_logo">
						<!--begin::Logo-->
						<a href="{{ route('dashboard') }}">
							<img alt="Logo" src="{{ asset('assets/logo/medium.png') }}" class="h-100px logo" />
						</a>
						<!--end::Logo-->
					</div>
					<!--end::Brand-->
					<!--end::Aside user-->
					<!--begin::Aside menu-->
					<div class="aside-menu flex-column-fluid ps-3 ps-lg-5 pe-1 mb-9" id="kt_aside_menu">
						<!--begin::Aside Menu-->
						<div class="w-100 hover-scroll-overlay-y pe-2 me-2" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_user, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="0">
							<!--begin::Menu-->
							<div class="menu menu-column menu-rounded fw-bold" id="#kt_aside_menu" data-kt-menu="true">
								<div class="menu-item @if(request()->routeIs(['dashboard'])) here show @endif">
									<a class="menu-link" href="{{ route('dashboard') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
													<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Dashboard</span>
									</a>
								</div>
                                <div class="menu-item @if(request()->routeIs(['packages'])) here show @endif">
									<a class="menu-link" href="{{ route('packages') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
													<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Packages</span>
									</a>
								</div>
                                <div class="menu-item @if(request()->routeIs(['investments']) && request()->type == 'plant') here show @endif">
									<a class="menu-link" href="{{ route('investments', 'plant') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
													<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Plant Investments</span>
									</a>
								</div>
                                <div class="menu-item @if(request()->routeIs(['investments']) && request()->type == 'tractor') here show @endif">
									<a class="menu-link" href="{{ route('investments', 'tractor') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
													<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Tractor Investments</span>
									</a>
								</div>
                                <div class="menu-item @if(request()->routeIs(['investments']) && request()->type == 'farm') here show @endif">
									<a class="menu-link" href="{{ route('investments', 'farm') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
													<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Farm Investments</span>
									</a>
								</div>
								<div class="menu-item @if(request()->routeIs(['transactions'])) here show @endif">
									<a class="menu-link" href="{{ route('transactions') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
													<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Transactions</span>
									</a>
								</div>
								<div class="menu-item @if(request()->routeIs(['wallet'])) here show @endif">
									<a class="menu-link" href="{{ route('wallet') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
													<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Wallet</span>
									</a>
								</div>
                                <div class="menu-item @if(request()->routeIs(['account.overview'])) here show @endif">
									<a class="menu-link" href="{{ route('account.overview') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
													<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Account Overview</span>
									</a>
								</div>
							</div>
							<!--end::Menu-->
						</div>
						<!--end::Aside Menu-->
					</div>
					<!--end::Aside menu-->
					<!--begin::Footer-->
					<div class="aside-footer flex-column-auto px-6 px-lg-9" id="kt_aside_footer">
						<!--begin::User panel-->
						<div class="d-flex flex-stack ms-7">
							<!--begin::Link-->
							<a href="#" onclick="confirmFormSubmit(event, 'logout-form')" class="btn btn-sm btn-icon btn-active-color-primary btn-icon-gray-600 btn-text-gray-600">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->
								<span class="svg-icon svg-icon-1 me-2">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(-1 0 0 1 15.5 11)" fill="black" />
										<path d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z" fill="black" />
										<path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="#C4C4C4" />
									</svg>
								</span>
								<!--end::Svg Icon-->
								<!--begin::Major-->
								<span class="d-flex flex-shrink-0 fw-bolder">Log Out</span>
								<!--end::Major-->
                                <form id="logout-form" class="d-inline" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
							</a>
							<!--end::Link-->
							<!--begin::User menu-->
							<div class="ms-1">
								<div class="btn btn-sm btn-icon btn-icon-gray-600 btn-active-color-primary position-relative me-n1" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start">
									<!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
									<span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black" />
											<path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
								<!--begin::User account menu-->
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">

									<!--begin::Menu item-->
									<div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
										<a href="#" class="menu-link px-5">
											<span class="menu-title">My Account</span>
											<span class="menu-arrow"></span>
										</a>
										<!--begin::Menu sub-->
										<div class="menu-sub menu-sub-dropdown w-175px py-4">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="{{ route('profile') }}" class="menu-link px-5">Profile</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="{{ route('account.overview') }}" class="menu-link px-5" style="white-space: nowrap">Account Overview</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu sub-->
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-5">
										<a href="{{ route('transactions', 'all') }}" class="menu-link px-5">
											<span class="menu-text">My Transactions</span>
										</a>
									</div>
									<!--end::Menu item-->
                                    <!--begin::Menu item-->
									<div class="menu-item px-5">
										<a href="{{ route('faq') }}" class="menu-link px-5">
											<span class="menu-text">FAQs</span>
										</a>
									</div>
									<!--end::Menu item-->
                                    <!--begin::Menu item-->
									<div class="menu-item px-5">
										<a href="{{ route('referrals') }}" class="menu-link px-5">
											<span class="menu-text">Refferals</span>
										</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
									<div class="menu-item px-5">
										<a href='#' onclick="confirmFormSubmit(event, 'logout-form')" class="menu-link px-5">Log Out</a>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::User account menu-->
							</div>
							<!--end::User menu-->
						</div>
						<!--end::User panel-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-center flex-wrap justify-content-between" id="kt_header_container">
							<!--begin::Page title-->
							<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 pb-5 pb-lg-0 pt-7 pt-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
								<!--begin::Heading-->
								<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">@yield('pageTitle')</h1>
								<!--end::Heading-->
								<!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="{{ route('dashboard') }}" class="@if (request()->routeIs(['dashboard'])) text-dark @else text-muted @endif">Home</a>
                                    </li>
                                    @yield('breadCrumbs')
                                </ul>
								<!--end::Breadcrumb-->
							</div>
							<!--end::Page title=-->
							<!--begin::Wrapper-->
							<div class="d-flex d-lg-none align-items-center ms-n3 me-2">
								<!--begin::Aside mobile toggle-->
								<div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
									<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
									<span class="svg-icon svg-icon-1 mt-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
								<!--end::Aside mobile toggle-->
								<!--begin::Logo-->
								<a href="{{ route('dashboard') }}" class="d-flex align-items-center">
									<img alt="Logo" src="{{ asset('assets/logo/medium.png') }}" class="h-30px" />
								</a>
								<!--end::Logo-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Topbar-->
							<div class="d-flex align-items-center flex-shrink-0">
								<!--begin::Activities-->
								<div class="d-flex align-items-center ms-3 ms-lg-4">
									<!--begin::Drawer toggle-->
                                    <a href="{{ route('notifications') }}">
                                        <div class="btn btn-icon position-relative @if(count(auth()->user()->unreadNotifications) > 0) btn-color-primary @else btn-color-gray-700 @endif btn-active-color-primary btn-outline btn-outline-secondary w-40px h-40px">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen007.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z" fill="black" />
                                                    <path d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z" fill="black" />
                                                </svg>
                                            </span>
                                            @if(count(auth()->user()->unreadNotifications) > 0)
                                            <span class="position-absolute top-0 start-100 translate-middle  badge badge-circle badge-primary">{{ count(auth()->user()->unreadNotifications) }}</span>
                                            @endif
                                            <!--end::Svg Icon-->
                                        </div>
                                    </a>
									<!--end::Drawer toggle-->
								</div>
								<!--end::Activities-->
							</div>
							<!--end::Topbar-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-fluid" id="kt_content_container">
                            <!-- begin::Alerts -->
                            @if (session('error'))
                                <div class="d-flex align-items-center bg-danger rounded p-5 mb-7">
                                    <span class="svg-icon svg-icon-success me-3">
                                        <i class="fas fa-exclamation-circle text-light" style="width: 18px"></i>
                                    </span>
                                    <div class="flex-grow-1 me-2">
                                        <span class="fw-bolder text-light text-hover-primary fs-6">{{ session('error') }}</span>
                                    </div>
                                </div>
                            @elseif(session('success'))
                                <div class="d-flex align-items-center bg-success rounded p-5 mb-7">
                                    <span class="svg-icon svg-icon-success me-3">
                                        <i class="fas fa-check-circle text-light" style="width: 18px"></i>
                                    </span>
                                    <div class="flex-grow-1 me-2">
                                        <span class="fw-bolder text-light text-hover-primary fs-6">{{ session('success') }}</span>
                                    </div>
                                </div>
                            @elseif(session('info'))
                                <div class="d-flex align-items-center bg-warning rounded p-4 mb-7">
                                    <span class="svg-icon svg-icon-success me-3">
                                        <i class="fas fa-exclamation-triangle text-light" style="width: 18px"></i>
                                    </span>
                                    <div class="flex-grow-1 me-2">
                                        <span class="fw-bolder text-light text-hover-primary fs-6">{{ session('info') }}</span>
                                    </div>
                                </div>
                            @endif
                            <!-- end::Alerts -->
                            @yield('content')
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer mt-10 py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row flex-stack">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-gray-400 fw-bold me-1">Copyright © {{ date('Y') }} <strong class="text-gray-600">Quebec Foods Processing</strong>. All rights reserved</span>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
								<li class="menu-item">
									<a href="https://softwebdigital.com/" target="_blank" class="menu-link text-gray-400 px-2">Powered by <span class="text-gray-600 ms-1">Soft-Web Digital</span></a>
								</li>
							</ul>
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--begin::Modals-->
        @php
            $setting = \App\Models\Setting::all()->first();
            $international = \App\Models\InternationalBank::all()->first();
            $plantPackages = \App\Models\Package::latest()->where('type', 'plant')->where('status', 'open')->get();
            $tractorPackages = \App\Models\Package::latest()->where('type', 'tractor')->where('status', 'open')->get();
            $farmPackages = \App\Models\Package::latest()->where('type', 'farm')->where('status', 'open')->get();
        @endphp
        <div class="modal fade" id="createPlantInvestment" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_create_api_key_header">
                        <!--begin::Modal title-->
                        <h2><span id="modeType"></span> Investment</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" id="createPlantInvestment_cancel" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Form-->
                    <form class="form mb-3" method="post" action="{{ route('invest.store') }}" id="createPlantInvestForm" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y py-5">
                            <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Input-->
                            <label class="required fs-5 fw-bold mb-2" for="plantPackage">Select package</label>
                            <select name="package" aria-label="Select the package" data-placeholder="Select the package" data-control="select2" class="form-select form-select-solid text-dark" id="plantPackage">
                                <option value="">Select Package</option>
                                @foreach($plantPackages as $package)
                                    <option @if((old('package') == $package['name']) || (request('package') == $package['name'])) selected @endif value="{{ $package['name'] }}" data-rollover="{{ $package['rollover'] }}" data-price="{{ $package['price'] }}" data-roi="{{ $package['roi'] }}" data-duration="{{ $package['duration'] }}" data-milestones="{{ $package['milestones'] }}" data-duration-mode="{{ $package['duration_mode'] }}">{{ $package['name'] }}</option>
                                @endforeach
                                @foreach($tractorPackages as $package)
                                    <option @if((old('package') == $package['name']) || (request('package') == $package['name'])) selected @endif value="{{ $package['name'] }}" data-rollover="{{ $package['rollover'] }}" data-price="{{ $package['price'] }}" data-roi="{{ $package['roi'] }}" data-duration="{{ $package['duration'] }}" data-milestones="{{ $package['milestones'] }}" data-duration-mode="{{ $package['duration_mode'] }}">{{ $package['name'] }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="plantPrice">
                            <input type="hidden" id="plantRoi">
                            <input type="hidden" id="plantDuration">
                            <input type="hidden" id="plantDurationMode">
                            <input type="hidden" id="plantMilestones">
                            @error('package')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="plantSlots">No of Slots</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" placeholder="No of slots" value="{{ old("slots")}}" class="form-control form-control-solid" name="slots" id="plantSlots">
                            <div id="planSlotsError"></div>
                            @error('slots')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="plantAmount">Amount to Invest</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" value="{{ getCurrency() }} 0.00" class="form-control form-control-solid bg-secondary" name="amount" id="plantAmount" disabled>
                            <div class="d-flex justify-content-end">
                                <span class="text-sm text-primary" id="plantAmountInNGN"></span>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="plantReturns">Expected Returns <span style="display: none" id="plantReturnInfo"></span></label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" value="{{ getCurrency() }} 0.00" disabled class="form-control form-control-solid" name="returns" id="plantReturns">
                            <div class="d-flex justify-content-end">
                                <span class="text-sm text-primary" id="plantReturnsInNGN"></span>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Row-->
                        <label class="required fs-5 fw-bold mb-2" for="payment">Pay Via</label>
                        <div class="fv-row mb-7">
                            <!--begin::Radio group-->
                            <div class="btn-group w-100" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                <!--begin::Radio-->
                                <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success" for="plantCardPayment" data-kt-button="true">
                                <!--begin::Input-->
                                <input class="btn-check" type="radio" name="payment" id="plantCardPayment" value="card" />
                                <!--end::Input-->
                                Card</label>
                                <!--end::Radio-->
                                <!--begin::Radio-->
                                <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success" for="plantWalletPayment" data-kt-button="true">
                                <!--begin::Input-->
                                <input class="btn-check" type="radio" name="payment" id="plantWalletPayment" value="wallet" />
                                <!--end::Input-->
                                Wallet</label>
                                <!--end::Radio-->
                                <!--begin::Radio-->
                                <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success" for="plantDepositPayment" data-kt-button="true">
                                <!--begin::Input-->
                                <input class="btn-check" type="radio" name="payment" id="plantDepositPayment" value="deposit" />
                                <!--end::Input-->
                                Bank Transfer</label>
                                <!--end::Radio-->
                            </div>
                            <!--end::Radio group-->
                        </div>
                        <!--end::Row-->
                        <div id="plantSecuredByPaystack" style="display: none" class="mx-auto text-center">
                            <h6 class="mt-5 mb-4">Select Currency.</h6>
                            <input type="radio" name="currency" class="form-check-input" id="ngn" value="NGN" checked>
                            <label for="ngn" class="form-check-label" style="margin-left: 6px;">NGN (₦)</label>
                            <label for="usd" class="form-check-label" style="margin-right: 6px;">USD ($)</label>
                            <input type="radio" name="currency" class="form-check-input" id="usd" value="USD">

                            <h6 class="mt-5">Select Gateway.</h6>
{{--                        <h6 class="mt-5 mb-4">Card payments are diabled for now, try another payment method.</h6>--}}
                            <div class="d-flex justify-content-center">
                                <!-- <div id="plantGatewayFlw" class="mr-10 active">
                                    <img src="{{ asset('assets/photos/flutterwave.png') }}" class="img-fluid" width="150" alt="Secured-by-flutterwave" style="cursor: pointer">
                                </div> -->
                                <div id="plantGatewayPaystack" class="ml-10">
                                    <img src="{{ asset('assets/photos/paystack.png') }}" class="img-fluid mt-1" width="128" alt="Secured-by-paystack" style="cursor: pointer">
                                </div>
                            </div>
                            <input type="hidden" id="plantGatewayValue" name="gateway" value="flutterwave">
                            <div id="plantGatewayError"></div>
                        </div>
                        <div id="plantBankDetails" style="display: none" class="alert bg-secondary">
                            <table>
                                <tr>
                                    <h6>Local Bank Details</h6>
                                </tr>
                                <tr>
                                    <td>Bank Name:</td>
                                    <td><span class="ms-3">{{ $setting['bank_name'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Account Name:</td>
                                    <td><span class="ms-3">{{ $setting['account_name'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Account Number:</td>
                                    <td><span class="ms-3">{{ $setting['account_number'] }}</span></td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <div>
                                <div style="margin: 10px 0px 15px 0px">
                                    <h6>International Bank Details</h6>
                                </div>
                                <div style="display: flex;">
                                    <p style="width: 150px;">Bank Name:</p>
                                    <p>{{ $international['bank_name'] }}</p>
                                </div>
                                <div style="display: flex;">
                                    <p style="width: 150px;">Account Name:</p>
                                    <p>{{ $international['account_name'] }}</p>
                                </div>
                                <div style="display: flex;">
                                    <p style="width: 150px;">Account Number:</p>
                                    <p>{{ $international['account_number'] }}</p>
                                </div>
                                <div>
                                    <p>Added Information:</p>
                                    <p>{!! $international['added_information'] !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-check mt-7 mb-10 form-check-flat form-check-primary">
                            <label class="form-check-label">
                                I hereby agree to the <a href="{{ route('static.terms') }}" target="_blank">terms and conditions</a>
                                <input required type="checkbox" id="plantAgreed" class="form-check-input">
                            </label>
                        </div>
                        </div>
                        <!--end::Modal body-->
                        <!--begin::Modal footer-->
                        <div class="modal-footer flex-center">
                            <!--begin::Button-->
                            <button type="reset" id="createPlantInvestment_cancel" onclick="closeModal(event, 'createPlantInvestment')" class="btn btn-light me-3">Discard</button>
                            <!--end::Button-->
                            <!--begin::Submit-->
                            @if ($setting['invest'] == 1)
                            <button type="button" disabled onclick="confirmFormSubmit(event, 'createPlantInvestForm')" id="plantSubmitButton" class="btn btn-primary">
                                <!--begin::Indicator-->
                                <span class="indicator-label">Invest</span>
                                <!--end::Indicator-->
                            </button>
                            <!--end::Submit-->
                            @else
                                <!--begin::Submit-->
                                <button type="button" disabled class="btn btn-primary w-100">
                                    <!--begin::Indicator-->
                                    <span class="indicator-label">Unavailabe</span>
                                    <!--end::Indicator-->
                                </button>
                                <!--end::Submit-->
                            @endif
                        </div>
                        <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>

        <div class="modal fade" id="createFarmInvestment" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_create_api_key_header">
                        <!--begin::Modal title-->
                        <h2>Farm Investment</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" id="createFarmInvestment_cancel" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Form-->
                    <form class="form mb-3" method="post" action="{{ route('invest.store') }}" id="createFarmInvestForm" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y py-5">
                            <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Input-->
                            <label class="required fs-5 fw-bold mb-2" for="package">Select package</label>
                            <select name="package" aria-label="Select the package" data-placeholder="Select the package" data-control="select2" class="form-select form-select-solid text-dark" id="package">
                                <option value="">Select Package</option>
                                @foreach($farmPackages as $package)
                                    <option @if((old('package') == $package['name']) || (request('package') == $package['name'])) selected @endif value="{{ $package['name'] }}" data-rollover="{{ $package['rollover'] }}" data-price="{{ $package['price'] }}" data-roi="{{ $package['roi'] }}" data-duration="{{ $package['duration'] }}" data-duration-mode="{{ $package['duration_mode'] }}">{{ $package['name'] }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="price">
                            <input type="hidden" id="roi">
                            <input type="hidden" id="duration">
                            <input type="hidden" id="durationMode">
                            @error('package')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="slots">No of Slots</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" placeholder="No of slots" value="{{ old("slots")}}" class="form-control form-control-solid" name="slots" id="slots">
                            <div id="slotError"></div>

                            @error('slots')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="amount">Amount to Invest</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" value="{{ getCurrency() }} 0.00" class="form-control form-control-solid bg-secondary" name="amount" id="amount" disabled>
                            <div class="d-flex justify-content-end">
                                <span class="text-sm text-primary" id="amountInNGN"></span>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="returns">Expected Returns <span id="returnInfo"></span></label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" value="{{ getCurrency() }} 0.00" disabled class="form-control form-control-solid" name="returns" id="returns">
                            <div class="d-flex justify-content-end">
                                <span class="text-sm text-primary" id="returnsInNGN"></span>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Row-->
                        <label class="required fs-5 fw-bold mb-2" for="payment">Pay Via</label>
                        <div class="fv-row mb-7">
                            <!--begin::Radio group-->
                            <div class="btn-group w-100" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                <!--begin::Radio-->
                                <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success" for="farmCardPayment" data-kt-button="true">
                                <!--begin::Input-->
                                <input class="btn-check" type="radio" name="payment" id="farmCardPayment" value="card" />
                                <!--end::Input-->
                                Card</label>
                                <!--end::Radio-->
                                <!--begin::Radio-->
                                <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success" for="farmWalletPayment" data-kt-button="true">
                                <!--begin::Input-->
                                <input class="btn-check" type="radio" name="payment" id="farmWalletPayment" value="wallet" />
                                <!--end::Input-->
                                Wallet</label>
                                <!--end::Radio-->
                                <!--begin::Radio-->
                                <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success" for="farmDepositPayment" data-kt-button="true">
                                <!--begin::Input-->
                                <input class="btn-check" type="radio" name="payment" id="farmDepositPayment" value="deposit" />
                                <!--end::Input-->
                                Bank Transfer</label>
                                <!--end::Radio-->
                            </div>
                            <!--end::Radio group-->
                        </div>
                        <!--end::Row-->
                        <div id="farmSecuredByPaystack" style="display: none" class="mx-auto text-center">
                            <h6 class="mt-5 mb-4">Select Currency.</h6>
                            <input type="radio" name="currency" class="form-check-input" id="ngn" value="NGN" checked>
                            <label for="ngn" class="form-check-label" style="margin-left: 6px;">NGN (₦)</label>
                            <label for="usd" class="form-check-label" style="margin-right: 6px;">USD ($)</label>
                            <input type="radio" name="currency" class="form-check-input" id="usd" value="USD">

                            <h6 class="mt-5">Select Gateway.</h6>
{{--                        <h6 class="mt-5 mb-4">Card payments are diabled for now, try another payment method.</h6>--}}
                            <div class="d-flex justify-content-center">
                                <!-- <div id="farmGatewayFlw" class="mr-10">
                                    <img src="{{ asset('assets/photos/flutterwave.png') }}" class="img-fluid" width="150" alt="Secured-by-flutterwave" style="cursor: pointer">
                                </div> -->
                                <div id="farmGatewayPaystack" class="ml-10 active">
                                    <img src="{{ asset('assets/photos/paystack.png') }}" class="img-fluid mt-1" width="128" alt="Secured-by-paystack" style="cursor: pointer">
                                </div>
                            </div>
                            <input type="hidden" id="farmGatewayValue" name="gateway" value="paystack">
                            <div id="farmGatewayError"></div>
                        </div>
                        <div id="farmBankDetails" style="display: none" class="alert bg-secondary">
                            <table>
                                <tr>
                                    <h6>Local Bank Details</h6>
                                </tr>
                                <tr>
                                    <td>Bank Name:</td>
                                    <td><span class="ms-3">{{ $setting['bank_name'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Account Name:</td>
                                    <td><span class="ms-3">{{ $setting['account_name'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Account Number:</td>
                                    <td><span class="ms-3">{{ $setting['account_number'] }}</span></td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <div>
                                <div style="margin: 10px 0px 15px 0px">
                                    <h6>International Bank Details</h6>
                                </div>
                                <div style="display: flex;">
                                    <p style="width: 150px;">Bank Name:</p>
                                    <p>{{ $international['bank_name'] }}</p>
                                </div>
                                <div style="display: flex;">
                                    <p style="width: 150px;">Account Name:</p>
                                    <p>{{ $international['account_name'] }}</p>
                                </div>
                                <div style="display: flex;">
                                    <p style="width: 150px;">Account Number:</p>
                                    <p>{{ $international['account_number'] }}</p>
                                </div>
                                <div>
                                    <p>Added Information:</p>
                                    <p>{!! $international['added_information'] !!}</p>
                                </div>
                            </div>
                        </div>
                        <div id="rolloverInvestment" class="form-check form-switch form-check-custom form-check-solid me-10">
                            <input required class="form-check-input h-30px w-50px" type="checkbox" value="yes" id="rollover" name="rollover"/>
                            <label class="form-check-label" for="rollover">
                                Rollover Investment
                            </label>
                        </div>
                        <div class="form-check mt-7 mb-10 form-check-flat form-check-primary">
                            <label class="form-check-label">
                                I hereby agree to the <a href="{{ route('static.terms') }}" target="_blank">terms and conditions</a>
                                <input required type="checkbox" id="agreed" class="form-check-input">
                            </label>
                        </div>
                        </div>
                        <!--end::Modal body-->
                        <!--begin::Modal footer-->
                        <div class="modal-footer flex-center">
                            <!--begin::Button-->
                            <button type="reset" id="createFarmInvestment_cancel" onclick="closeModal(event, 'createFarmInvestment')" class="btn btn-light me-3">Discard</button>
                            <!--end::Button-->
                            <!--begin::Submit-->
                            @if ($setting['invest'] == 1)
                            <button type="button" disabled onclick="confirmFormSubmit(event, 'createFarmInvestForm')" id="submitButton" class="btn btn-primary">
                                <!--begin::Indicator-->
                                <span class="indicator-label">Invest</span>
                                <!--end::Indicator-->
                            </button>
                            <!--end::Submit-->
                            @else
                                <!--begin::Submit-->
                                <button type="button" disabled class="btn btn-primary w-100">
                                    <!--begin::Indicator-->
                                    <span class="indicator-label">Unavailabe</span>
                                    <!--end::Indicator-->
                                </button>
                                <!--end::Submit-->
                            @endif
                        </div>
                        <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
		<!--end::Modals-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		{{-- <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
		<script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script> --}}
        <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
		{{-- <script src="{{asset('assets/js/custom/widgets.js')}}"></script> --}}
		<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/6304e16a54f06e12d89047c6/1gb5h12rt';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
        <!-- Meta Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '658171588636182');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658171588636182&ev=PageView&noscript=1">
        </noscript>
        <!-- End Meta Pixel Code -->
        <script>
            $(function() {
                closeModal = function(e, modalId) {
                    e.preventDefault();
                    Swal.fire({
                        text: "Are you sure you would like to proceed?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Yes, proceed!",
                        cancelButtonText: "No, return",
                        customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
                    }).then(((result) => {
                        if (result.value) {
                            $('#'+modalId).modal('hide');
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "The action was cancelled!.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {confirmButton: "btn btn-primary"}
                            });
                        }
                    }))
                }
                confirmFormSubmit = function(e, form) {
                    e.preventDefault();
                    Swal.fire({
                        text: "Are you sure you would like to proceed?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Yes, proceed!",
                        cancelButtonText: "No, return",
                        customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
                    }).then(((result) => {
                        if (result.value) {
                            $('#'+form).submit();
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "The action was cancelled!.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {confirmButton: "btn btn-primary"}
                            });
                        }
                    }))
                }
            });
        </script>
        <script>
        let mode;
        function populateInvestModal(type, name = '') {
            if (type !== "farm") {
                mode = type;
                $('#modeType').text(mode === 'plant' ? 'Plant' : 'Tractor')
            }
            $(`#${type !== "farm" ? 'plantPackage' : 'package'}`).val(name).trigger('change');
        }
        $(document).ready(function (){
            let packageName = $('#package');
            let slots = $('#slots');
            let slotInfo = $('#slotInfo');
            let price = $('#price');
            let roi = $('#roi');
            let duration = $('#duration');
            let durationMode = $('#durationMode');
            let amount = $('#amount');
            let amountInNGN = $('#amountInNGN');
            let returns = $('#returns');
            let returnsInNGN = $('#returnsInNGN');
            let returnInfo = $('#returnInfo');
            let depositPayment = $('#farmDepositPayment');
            let cardPayment = $('#farmCardPayment');
            let walletPayment = $('#farmWalletPayment');
            let bankDetails = $('#farmBankDetails');
            let securedByPaystack = $('#farmSecuredByPaystack');
            let paystackGateway = $('#farmGatewayPaystack');
            let flwGateway = $('#farmGatewayFlw');
            let farmGatewayVal = $('#farmGatewayValue');
            let submitButton = $('#submitButton');
            let agreed = $('#agreed');
            let nairaWalletBalance = parseFloat({{ auth()->user()['wallet']['balance'] }});
            let rolloverInvestment = $('#rolloverInvestment');
            agreed.on('change', checkIfFormCanSubmit);

            paystackGateway.on('click', function () {
                farmGatewayVal.val('paystack')
                flwGateway.removeClass('active')
                paystackGateway.addClass('active')
                checkIfFormCanSubmit();
            });

            flwGateway.on('click', function () {
                farmGatewayVal.val('flutterwave')
                paystackGateway.removeClass('active')
                flwGateway.addClass('active')
                checkIfFormCanSubmit();
            });

            cardPayment.on('click', function () {
                bankDetails.hide(500);
                securedByPaystack.show(500);
                checkIfFormCanSubmit();
            });
            depositPayment.on('click', function () {
                bankDetails.show(500);
                securedByPaystack.hide(500);
                farmGatewayVal.val('');
                flwGateway.removeClass('active')
                paystackGateway.removeClass('active')
                checkIfFormCanSubmit();
            });
            walletPayment.on('click', function () {
                bankDetails.hide(500);
                securedByPaystack.hide(500);
                farmGatewayVal.val('');
                flwGateway.removeClass('active')
                paystackGateway.removeClass('active')
                checkIfFormCanSubmit();
            });
            setFieldsForInvestment();
            packageName.on('change', setFieldsForInvestment);
            function setFieldsForInvestment()
            {
                rolloverInvestment.hide();
                $("#package option").each(function(){
                    if($(this).val() === packageName.val()){
                        price.val($(this).attr('data-price'));
                        roi.val($(this).attr('data-roi'));
                        duration.val($(this).attr('data-duration'));
                        durationMode.val($(this).attr('data-duration-mode'));
                        if (packageName.val() && ($(this).attr('data-rollover') == 1)) {
                            rolloverInvestment.show();
                        }
                    }
                });
                computeAmount();
            }

            slots.on('input', computeAmount);
            function computeAmount(){
                if (packageName.val()){
                    returnInfo.html('after <b>'+ duration.val() +' ' + durationMode.val() + '(s)</b>');
                    slotInfo.text('{{ getCurrency() }}' + price.val() + '/slot' );
                }else{
                    returnInfo.html('');
                    slotInfo.text('');
                }
                if (packageName.val() && slots.val() && (slots.val() > 0)){
                    amount.val('{{ getCurrency() }}' + numberFormat((slots.val() * price.val()).toFixed(2)));
                    amountInNGN.html('₦' + numberFormat(getAmountInNaira(slots.val() * price.val()).toFixed(2)));
                    returns.val('{{ getCurrency() }}' + numberFormat((slots.val() * price.val() * ((parseInt(roi.val()) + 100) / 100)).toFixed(2)));
                    returnsInNGN.html('₦' + numberFormat(getAmountInNaira(slots.val() * price.val() * ((parseInt(roi.val()) + 100) / 100)).toFixed(2)));
                }
                if (slots.val() === "") {
                    amount.val('{{ getCurrency() }}' + numberFormat((0).toFixed(2)));
                    amountInNGN.html('');
                    returns.val('{{ getCurrency() }}' + numberFormat((0).toFixed(2)));
                    returnsInNGN.html('');
                }
                checkIfFormCanSubmit();
            }
            function checkIfFormCanSubmit(){
                if (packageName.val() && slots.val() && (slots.val() > 0) &&
                    (walletPayment.prop('checked') || cardPayment.prop('checked') || depositPayment.prop('checked')) &&
                    agreed.prop('checked')) {
                    if ($("input[id='farmWalletPayment']").prop('checked')){
                        if ((slots.val() * price.val()) <= nairaWalletBalance ){
                            submitButton.removeAttr('disabled');
                            slots.css('borderColor', '#10B759');
                            $('#slotError').html('');
                        }else{
                            submitButton.prop('disabled', true);
                            slots.css('borderColor', 'red');
                            $('#slotError').html('<span style="color: red;">Insufficient wallet balance</span>');
                            // slots.after('<span style="color: red;">Insufficient wallet balance</span>');
                        }
                    }
                    else if ($("input[id='farmCardPayment']").prop('checked')) {
                        if (farmGatewayVal.val()){
                            submitButton.removeAttr('disabled');
                            $('#farmGatewayError').html('');
                        }else{
                            submitButton.prop('disabled', true);
                            $('#farmGatewayError').html('<span style="color: red;">Select a payment gateway</span>');
                        }
                    }
                    else
                    {
                        submitButton.removeAttr('disabled');
                        slots.css('borderColor', '#10B759');
                        $('#slotError').html('');
                    }
                }else{
                    submitButton.prop('disabled', true);
                }
            }
        });

        $("#createPlantInvestment").on('shown.bs.modal', function(){
            const plantPackages = {!! $plantPackages !!};
            const tractorPackages = {!! $tractorPackages !!};
            const selected = $(`#plantPackage`).val();
            const pckgs = mode === 'plant' ? plantPackages : tractorPackages;
            let html = `<option value="">Select Package</option>`;
            pckgs.forEach(package => {
                html += `<option value="${package.name}" data-rollover="${package.rollover}" data-price="${package.price}" data-roi="${package.roi}" data-duration="${package.duration}" data-milestones="${package.milestones}" data-duration-mode="${package.duration_mode}">${package.name}</option>`;
            });
            $(`#plantPackage`).html(html);
            $(`#plantPackage`).val(selected).trigger('change');
        });

        $("#createPlantInvestment").on('hidden.bs.modal', function(){
            const plantPackages = {!! $plantPackages !!};
            const tractorPackages = {!! $tractorPackages !!};
            const pckgs = [...plantPackages, ...tractorPackages];
            let html = `<option value="">Select Package</option>`;
            pckgs.forEach(package => {
                html += `<option value="${package.name}" data-rollover="${package.rollover}" data-price="${package.price}" data-roi="${package.roi}" data-duration="${package.duration}" data-milestones="${package.milestones}" data-duration-mode="${package.duration_mode}">${package.name}</option>`;
            });
            $(`#plantPackage`).html(html);
        });

        $(document).ready(function (){
            let plantPackageName = $('#plantPackage');
            let plantSlots = $('#plantSlots');
            let plantSlotInfo = $('#plantSlotInfo');
            let plantPrice = $('#plantPrice');
            let plantRoi = $('#plantRoi');
            let plantDuration = $('#plantDuration');
            let plantDurationMode = $('#plantDurationMode');
            let plantAmount = $('#plantAmount');
            let plantAmountInNGN = $('#plantAmountInNGN');
            let plantReturns = $('#plantReturns');
            let plantReturnsInNGN = $('#plantReturnsInNGN');
            let plantReturnInfo = $('#plantReturnInfo');
            let plantDepositPayment = $('#plantDepositPayment');
            let plantCardPayment = $('#plantCardPayment');
            let plantWalletPayment = $('#plantWalletPayment');
            let plantBankDetails = $('#plantBankDetails');
            let plantSecuredByPaystack = $('#plantSecuredByPaystack');
            let plantPaystackGateway = $('#plantGatewayPaystack');
            let plantFlwGateway = $('#plantGatewayFlw');
            let plantGatewayVal = $('#plantGatewayValue');
            let plantSubmitButton = $('#plantSubmitButton');
            let plantMilestones = $('#plantMilestones');
            let plantAgreed = $('#plantAgreed');
            let walletBalance = parseFloat({{ auth()->user()['wallet']['balance'] }});

            plantPaystackGateway.on('click', function () {
                plantGatewayVal.val('paystack')
                plantFlwGateway.removeClass('active')
                plantPaystackGateway.addClass('active')
                checkIfFormCanSubmit();
            });

            plantFlwGateway.on('click', function () {
                plantGatewayVal.val('flutterwave')
                plantPaystackGateway.removeClass('active')
                plantFlwGateway.addClass('active')
                checkIfFormCanSubmit();
            });

            plantAgreed.on('change', checkIfFormCanSubmit);
            plantCardPayment.on('click', function () {
                plantBankDetails.hide(500);
                plantSecuredByPaystack.show(500);
                checkIfFormCanSubmit();
            });
            plantDepositPayment.on('click', function () {
                plantBankDetails.show(500);
                plantSecuredByPaystack.hide(500);
                plantGatewayVal.val('')
                plantFlwGateway.removeClass('active')
                plantPaystackGateway.removeClass('active')
                checkIfFormCanSubmit();
            });
            plantWalletPayment.on('click', function () {
                plantBankDetails.hide(500);
                plantSecuredByPaystack.hide(500);
                plantGatewayVal.val('')
                plantFlwGateway.removeClass('active')
                plantPaystackGateway.removeClass('active')
                checkIfFormCanSubmit();
            });
            setFieldsForInvestment();
            plantPackageName.on('change', setFieldsForInvestment);
            function setFieldsForInvestment()
            {
                $("#plantPackage option").each(function(){
                    if($(this).val() === plantPackageName.val()){
                        plantPrice.val($(this).attr('data-price'));
                        plantRoi.val($(this).attr('data-roi'));
                        plantDuration.val($(this).attr('data-duration'));
                        plantDurationMode.val($(this).attr('data-duration-mode'));
                        plantMilestones.val($(this).attr('data-milestones'));
                    }
                });
                computeAmount();
            }
            plantSlots.on('input', computeAmount);
            function computeAmount(){
                if (plantPackageName.val()){
                    plantReturnInfo.html('after <b>'+ plantDuration.val() +' ' + plantDurationMode.val() + '(s)</b>');
                    plantSlotInfo.text('{{ getCurrency() }}' + plantPrice.val() + '/slot' );
                }else{
                    plantReturnInfo.html('');
                    plantSlotInfo.text('');
                }
                if (plantPackageName.val() && plantSlots.val() && (plantSlots.val() >= 0)){
                    plantAmount.val('{{ getCurrency() }}' + numberFormat((plantSlots.val() * plantPrice.val()).toFixed(2)));
                    plantAmountInNGN.html('₦' + numberFormat(getAmountInNaira(plantSlots.val() * plantPrice.val()).toFixed(2)));
                    plantReturns.val('{{ getCurrency() }}' + numberFormat((plantSlots.val() * plantPrice.val() * ((parseInt(plantRoi.val() * plantMilestones.val()) + 100) / 100)).toFixed(2)));
                    plantReturnsInNGN.html('₦' + numberFormat(getAmountInNaira(plantSlots.val() * plantPrice.val() * ((parseInt(plantRoi.val() * plantMilestones.val()) + 100) / 100)).toFixed(2)));
                }
                if (plantSlots.val() === "") {
                    plantAmount.val('{{ getCurrency() }}' + numberFormat((0).toFixed(2)));
                    plantAmountInNGN.html('');
                    plantReturns.val('{{ getCurrency() }}' + numberFormat((0).toFixed(2)));
                    plantReturnsInNGN.html('');
                }
                checkIfFormCanSubmit();
            }
            function checkIfFormCanSubmit(){
                if (plantPackageName.val() && plantSlots.val() && (plantSlots.val() > 0) &&
                    (plantWalletPayment.prop('checked') || plantCardPayment.prop('checked') || plantDepositPayment.prop('checked')) &&
                    plantAgreed.prop('checked')){
                    if ($("input[id='plantWalletPayment']").prop('checked')){
                        if ((plantSlots.val() * plantPrice.val()) <= walletBalance ){
                            plantSubmitButton.removeAttr('disabled');
                            plantSlots.css('borderColor', '#10B759');
                            $('#planSlotsError').html('');
                        }else{
                            plantSubmitButton.prop('disabled', true);
                            plantSlots.css('borderColor', 'red');
                            $('#planSlotsError').html('<span style="color: red;">Insufficient wallet balance</span>');
                        }
                    }
                    else if ($("input[id='plantCardPayment']").prop('checked')) {
                        if (plantGatewayVal.val()){
                            plantSubmitButton.removeAttr('disabled');
                            $('#plantGatewayError').html('');
                        }else{
                            plantSubmitButton.prop('disabled', true);
                            $('#plantGatewayError').html('<span style="color: red;">Select a payment gateway</span>');
                        }
                    }
                    else{
                        plantSubmitButton.removeAttr('disabled');
                        plantSlots.css('borderColor', '#10B759');
                        $('#planSlotsError').html('');
                    }
                }else{
                    plantSubmitButton.prop('disabled', true);
                }
            }
        });

        function getAmountInNaira(amount) {
            return amount * {{ \App\Models\Setting::first()['usd_to_ngn'] + \App\Models\Setting::first()['rate_plus'] }}
        }

        function numberFormat(amount, decimal = ".", thousands = ",") {
            try {
                amount = Number.parseFloat(amount);
                let decimalCount = Number.isInteger(amount) ? 0 : amount.toString().split('.')[1].length;
                const negativeSign = amount < 0 ? "-" : "";
                let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
                let j = (i.length > 3) ? i.length % 3 : 0;
                return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
            } catch (e) {
                console.log(e)
            }
        }
        </script>
        @yield('script')
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
