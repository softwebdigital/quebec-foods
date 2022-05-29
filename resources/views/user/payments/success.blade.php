<!DOCTYPE html>
<html lang="en">
<head><base href="../../">
    <title>{{ env("APP_NAME") }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <link rel="shortcut icon" href="{{ asset('assets/logo/Favicon.png') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
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
                    <img alt="Logo" src="{{ asset('assets/logo/medium.png') }}" class="h-100px logo" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="pt-lg-10 mb-10">
                    @if ($type == "deposit")
                        <img src="{{ asset('assets/photos/pay_online.svg') }}" width="200px" class="img-fluid mb-10" alt="success">
                    @elseif ($type == "investment")
                        <img src="{{ asset('assets/photos/investment.svg') }}" width="200px" class="img-fluid mb-10" alt="success">
                    @endif
                    <h4 class="mb-5 fw-bolder text-black-800">{{ ucfirst($type) }} Payment Was Successful</h4>
                    <h6 class="text-muted mb-10 text-center">Your payment of {{ getCurrency() }} {{ number_format($payment['amount']) }} was successful</h6>
                    @if ($type == "deposit")
                        <a href="{{ route('wallet') }}" class="btn btn-primary">My Wallet</a>
                    @elseif($type == "investment")
                        <a href="{{ route('investments', ['type' => $package->type, 'filter' => 'all']) }}" class="btn btn-primary">My Investments</a>
                    @endif
                </div>
                <!--end::Wrapper-->
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
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--end::Javascript-->
</body>
</html>
