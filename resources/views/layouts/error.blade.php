<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="{{env("APP_URL")}}">
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="{{app()->getLocale()}}" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="@yield('title')" />
		<meta property="og:url" content="{{env('APP_URL')}}" />
		<meta property="og:site_name" content="{{env('APP_NAME')}}" />
		<link rel="canonical" href="{{env('APP_URL')}}" />
		<link rel="shortcut icon" href="{{ asset('assets/logo/Favicon.png') }}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="auth-bg">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Error 500 -->
			<div class="d-flex flex-column flex-column-fluid">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
					<!--begin::Logo-->
					<a href="{{ route('dashboard') }}" class="mb-10 pt-lg-10">
						<img alt="Logo" src="{{ asset('assets/logo/medium.png') }}" class="h-100px mb-5" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="pt-lg-10 mb-10">
						<!--begin::Logo-->
						<h1 class="fw-bolder fs-4qx text-black-800 mb-5">@yield('code')</h1>
						<h3 class="fw-bold fs-2qx text-black-600 mb-10">@yield('message')</h3>

						<!--end::Logo-->
						<!--begin::Message-->
						<div class="fw-bold fs-3 text-muted mb-15">@yield('description')
						<br/>Please try again later.</div>
						<!--end::Message-->
						<!--begin::Action-->
						<div class="text-center">
							<a href="{{ route('dashboard') }}" class="btn btn-lg btn-primary fw-bolder">Go to dashboard</a>
						</div>
						<!--end::Action-->
					</div>
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Error 500-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
