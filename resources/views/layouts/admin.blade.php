<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Quebec</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        @yield('style')
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body">
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
						<a href="../../demo15/dist/index.html">
							<img alt="Logo" src="/assets/media/logos/logo-1.svg" class="h-30px logo" />
						</a>
						<!--end::Logo-->
					</div>
					<!--end::Brand-->
					<!--begin::Aside user-->
					<div class="aside-user mb-5 mb-lg-10" id="kt_aside_user">
						<!--begin::User-->
						<div class="d-flex align-items-center flex-column">
							<!--begin::Symbol-->
							<div class="symbol symbol-75px mb-4">
								<img src="{{ asset('assets/media/svg/avatars/admin.png') }}" alt />
							</div>
							<!--end::Symbol-->
							<!--begin::Info-->
							<div class="text-center">
								<!--begin::Username-->
								<a href="{{ route('admin.profile') }}" class="text-gray-900 text-hover-primary fs-4 fw-boldest">{{ auth()->user()['name'] }}</a>
								<!--end::Username-->
								<!--begin::Description-->
								<span class="text-gray-600 fw-bold d-block fs-7 mb-1">{{ auth()->user()['email'] }}</span>
								<!--end::Description-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::User-->
					</div>
					<!--end::Aside user-->
					<!--begin::Aside menu-->
					<div class="aside-menu flex-column-fluid ps-3 ps-lg-5 pe-1 mb-9" id="kt_aside_menu">
						<!--begin::Aside Menu-->
						<div class="w-100 hover-scroll-overlay-y pe-2 me-2" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_user, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="0">
							<!--begin::Menu-->
							<div class="menu menu-column menu-rounded fw-bold" id="#kt_aside_menu" data-kt-menu="true">
                                <div class="menu-item @if(request()->routeIs(['admin.dashboard'])) here show @endif">
									<a class="menu-link" href="{{ route('admin.dashboard') }}">
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
                                @can('View Users')
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(request()->routeIs(['admin.users', 'admin.users.transactions', 'admin.users.investments', 'admin.users.referrals', 'admin.users.investment.show', 'admin.users.show', 'admin.users.wallet'])) here show @endif">
                                        <span class="menu-link">
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
                                            <span class="menu-title">Users</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion @if(request()->routeIs(['admin.users', 'admin.users.transactions', 'admin.users.investments', 'admin.users.referrals', 'admin.users.investment.show', 'admin.users.show', 'admin.users.wallet'])) show @endif">
                                            <div class="menu-item @if(request()->routeIs(['admin.users']) && request()->type == 'all') here @endif">
                                                <a class="menu-link" href="{{ route('admin.users', 'all') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">All</span>
                                                </a>
                                            </div>
                                            <div class="menu-item @if(request()->routeIs(['admin.users']) && request()->type == 'verified') here @endif">
                                                <a class="menu-link" href="{{ route('admin.users', 'verified') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Verified</span>
                                                </a>
                                            </div>
                                            <div class="menu-item @if(request()->routeIs(['admin.users']) && request()->type == 'unverified') here @endif">
                                                <a class="menu-link" href="{{ route('admin.users', 'unverified') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Unverified</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                @can('View Packages')
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(request()->routeIs(['admin.packages'])) here show @endif">
                                        <span class="menu-link">
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
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion @if(request()->routeIs(['admin.packages'])) show @endif">
                                            <div class="menu-item @if(request()->routeIs(['admin.packages']) && request()->type == 'plant') here @endif">
                                                <a class="menu-link" href="{{ route('admin.packages', 'plant') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Processing Plants</span>
                                                </a>
                                            </div>
                                            <div class="menu-item @if(request()->routeIs(['admin.packages']) && request()->type == 'farm') here @endif">
                                                <a class="menu-link" href="{{ route('admin.packages', 'farm') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Farms</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                @can('View Transactions')
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(request()->routeIs(['admin.transactions'])) here show @endif">
                                        <span class="menu-link">
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
                                            @php
                                                $pending = \App\Models\Transaction::where('status', 'pending')->count();
                                            @endphp

                                            <span class="menu-title">Transactions @if ($pending > 0)
                                                <span class="ms-3 badge badge-warning">{{ $pending }}</span>
                                            @endif</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion @if(request()->routeIs(['admin.transactions'])) show @endif">
                                            <div class="menu-item @if(request()->routeIs(['admin.transactions']) && request()->type == 'all') here @endif">
                                                <a class="menu-link" href="{{ route('admin.transactions', 'all') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">All</span>
                                                </a>
                                            </div>
                                            <div class="menu-item @if(request()->routeIs(['admin.transactions']) && request()->type == 'pending') here @endif">
                                                <a class="menu-link" href="{{ route('admin.transactions', 'pending') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Pending</span>
                                                </a>
                                            </div>
                                            <div class="menu-item @if(request()->routeIs(['admin.transactions']) && request()->type == 'withdrawal') here @endif">
                                                <a class="menu-link" href="{{ route('admin.transactions', 'withdrawal') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Withdrawal</span>
                                                </a>
                                            </div>
                                            <div class="menu-item @if(request()->routeIs(['admin.transactions']) && request()->type == 'deposit') here @endif">
                                                <a class="menu-link" href="{{ route('admin.transactions', 'deposit') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Deposits</span>
                                                </a>
                                            </div>
                                            <div class="menu-item @if(request()->routeIs(['admin.transactions']) && request()->type == 'investment') here @endif">
                                                <a class="menu-link" href="{{ route('admin.transactions', 'investment') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Investment</span>
                                                </a>
                                            </div>
                                            <div class="menu-item @if(request()->routeIs(['admin.transactions']) && request()->type == 'payout') here @endif">
                                                <a class="menu-link" href="{{ route('admin.transactions', 'payout') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Payout</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                @can('View Investments')
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion  @if(request()->routeIs(['admin.investments', 'admin.investments.show'])) here show @endif">
                                        <span class="menu-link">
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
                                            <span class="menu-title">Investments</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion  @if(request()->routeIs(['admin.investments', 'admin.investments.show']  && request()->type == 'plant')) show @endif">
                                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(request()->routeIs(['admin.investments', 'admin.investments.show']) && request()->type == 'plant') here show @endif">
                                                <span class="menu-link">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Processing Plants</span>
                                                    <span class="menu-arrow"></span>
                                                </span>
                                                 <div class="menu-sub menu-sub-accordion @if(request()->routeIs(['admin.investments']) && request()->type == 'plant') show @endif">
                                                    <div class="menu-item @if(request()->routeIs(['admin.investments']) && request()->type == 'plant' && request()->filter == 'all') here @endif">
                                                        <a class="menu-link" href="{{ route('admin.investments', ['type' => 'plant', 'filter' => 'all']) }}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                            <span class="menu-title">All</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item @if(request()->routeIs(['admin.investments']) && request()->type == 'plant' && request()->filter == 'active') here @endif">
                                                        <a class="menu-link" href="{{ route('admin.investments', ['type' => 'plant', 'filter' => 'active']) }}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                            <span class="menu-title">Active</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item @if(request()->routeIs(['admin.investments']) && request()->type == 'plant' && request()->filter == 'pending') here @endif">
                                                        <a class="menu-link" href="{{ route('admin.investments', ['type' => 'plant', 'filter' => 'pending']) }}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                            <span class="menu-title">Pending</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item @if(request()->routeIs([' admin.investments']) && request()->type == 'plant' && request()->filter == 'cancelled') here @endif">
                                                        <a class="menu-link" href="{{ route('admin.investments', ['type' => 'plant', 'filter' => 'cancelled']) }}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                            <span class="menu-title">Cancelled</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item @if(request()->routeIs(['admin.investments']) && request()->type == 'plant' && request()->filter == 'settled') here show @endif">
                                                        <a class="menu-link" href="{{ route('admin.investments', ['type' => 'plant', 'filter' => 'settled']) }}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                            <span class="menu-title">Settled</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(request()->routeIs(['admin.investments', 'admin.investments.show']) && request()->type == 'farm') here show @endif">
                                                <span class="menu-link">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Farm</span>
                                                    <span class="menu-arrow"></span>
                                                </span>
                                                <div class="menu-sub menu-sub-accordion @if(request()->routeIs(['admin.investments']) && request()->type == 'farm') show @endif">
                                                    <div class="menu-item @if(request()->routeIs(['admin.investments']) && request()->type == 'farm' && request()->filter == 'all') here @endif">
                                                        <a class="menu-link" href="{{ route('admin.investments', ['type' => 'farm', 'filter' => 'all']) }}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                            <span class="menu-title">All</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item @if(request()->routeIs(['admin.investments']) && request()->type == 'farm' && request()->filter == 'active') here @endif">
                                                        <a class="menu-link" href="{{ route('admin.investments', ['type' => 'farm', 'filter' => 'active']) }}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                            <span class="menu-title">Active</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item @if(request()->routeIs(['admin.investments']) && request()->type == 'farm' && request()->filter == 'pending') here @endif">
                                                        <a class="menu-link" href="{{ route('admin.investments', ['type' => 'farm', 'filter' => 'pending']) }}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                            <span class="menu-title">Pending</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item @if(request()->routeIs(['admin.investments']) && request()->type == 'farm' && request()->filter == 'cancelled') here @endif">
                                                        <a class="menu-link" href="{{ route('admin.investments', ['type' => 'farm', 'filter' => 'cancelled']) }}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                            <span class="menu-title">Cancelled</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item @if(request()->routeIs(['admin.investments']) && request()->type == 'farm' && request()->filter == 'settled') here @endif">
                                                        <a class="menu-link" href="{{ route('admin.investments', ['type' => 'farm', 'filter' => 'settled']) }}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                            <span class="menu-title">Settled</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                @can('View Payments')
                                    <div class="menu-item @if(request()->routeIs(['admin.onlinepayments'])) here show @endif">
                                        <a class="menu-link" href="{{ route('admin.onlinepayments') }}">
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
                                            <span class="menu-title">Online Payment</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('View Admins')
                                    <div class="menu-item @if(request()->routeIs(['admin.admins'])) here show @endif">
                                        <a class="menu-link" href="{{ route('admin.admins') }}">
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
                                            <span class="menu-title">Admins</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('View Roles')
                                    <div class="menu-item @if(request()->routeIs(['admin.roles'])) here show @endif">
                                        <a class="menu-link" href="{{ route('admin.roles') }}">
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
                                            <span class="menu-title">Roles &amp; Permissions</span>
                                        </a>
                                    </div>
                                @endcan
                                {{-- <div class="menu-item">
									<a class="menu-link" href="#">
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
										<span class="menu-title">Blog Management</span>
									</a>
								</div> --}}
                                @can('View FAQs')
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(request()->routeIs(['admin.faq', 'admin.faq.category'])) here show @endif">
                                        <span class="menu-link">
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
                                            <span class="menu-title">Faq Managements</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion @if(request()->routeIs(['admin.faq', 'admin.faq.category'])) show @endif">
                                            <div class="menu-item @if(request()->routeIs(['admin.faq.category'])) here @endif">
                                                <a class="menu-link" href="{{ route('admin.faq.category') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Categories</span>
                                                </a>
                                            </div>
                                            <div class="menu-item @if(request()->routeIs(['admin.faq'])) here @endif">
                                                <a class="menu-link" href="{{ route('admin.faq') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">FAQs</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                <div class="menu-item @if(request()->routeIs(['admin.profile'])) here show @endif">
									<a class="menu-link" href="{{ route('admin.profile')}}">
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
										<span class="menu-title">Profile</span>
									</a>
								</div>
                                @can('View Referrals')
                                    <div class="menu-item @if(request()->routeIs(['admin.referrals'])) here show @endif">
                                        <a class="menu-link" href="{{ route('admin.referrals')}}">
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
                                            <span class="menu-title">Referrals</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('View Settings')
                                    <div class="menu-item @if(request()->routeIs(['admin.settings'])) here show @endif">
                                        <a class="menu-link" href="{{ route('admin.settings') }}">
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
                                            <span class="menu-title">Settings</span>
                                        </a>
                                    </div>
                                @endcan
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
								<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
									@csrf
								</form>
								<!--end::Major-->
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
									<div class="menu-item px-5">
										<a href="{{ route('admin.profile') }}" class="menu-link px-5">
											<span class="menu-text">Profile</span>
										</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
                                    @can('View Transactions')
                                        <div class="menu-item px-5">
                                            <a href="{{ route('admin.transactions', 'all') }}" class="menu-link px-5">
                                                <span class="menu-text">Transaction</span>
                                            </a>
                                        </div>
                                    @endcan
									<!--end::Menu item-->
									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
                                    @can('View Settings')
                                        <div class="menu-item px-5 my-1">
                                            <a href="{{ route('admin.settings') }}" class="menu-link px-5">Settings</a>
                                        </div>
                                    @endcan
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-5">
										<a href="#" onclick="confirmFormSubmit(event, 'logout-form')" class="menu-link px-5">Log Out</a>
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
                                        <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
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
								<a href="../../demo15/dist/index.html" class="d-flex align-items-center">
									<img alt="Logo" src="assets/media/logos/logo-2.svg" class="h-30px" />
								</a>
								<!--end::Logo-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Topbar-->
							<div class="d-flex align-items-center flex-shrink-0">
								<!--begin::Sidebar Toggler-->
								<!--end::Sidebar Toggler-->
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
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row flex-stack">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-gray-400 fw-bold me-1">Copyright © {{ date('Y') }} <strong class="text-gray-600">Quebec</strong>. All rights reserved</span>
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
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
		<script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
		<script src="{{asset('assets/js/custom/widgets.js')}}"></script>
		<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
        <script>
            $(function() {
				$('table').on('click', 'tbody tr td a', function () {
					KTMenu.createInstances();
				});
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
