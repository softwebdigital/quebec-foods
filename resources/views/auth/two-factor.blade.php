@extends('layouts.auth')

@section('pageTitle', 'Two-Factor')

@section('content')
<!--begin::Wrapper-->
<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form class="form w-100 mb-10" method="POST" action="{{ route('verify.store') }}">
        @csrf
        <!--begin::Icon-->
        <div class="text-center mb-10">
            <img alt="Logo" class="mh-125px" src="/assets/media/svg/misc/smartphone.svg" />
        </div>
        <!--end::Icon-->
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Two Step Verification</h1>
            <!--end::Title-->
            <!--begin::Sub-title-->
            <div class="text-muted fw-bold fs-5 mb-5">Enter the verification code we sent to</div>
            <!--end::Sub-title-->
            <!--begin::Mobile no-->
            <div class="fw-bolder text-success fs-3">{{ substr(auth()->user()['email'], 0, 5) }}******{{ substr(auth()->user()['email'], -12) }}</div>
            <!--end::Mobile no-->
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
        </div>
        <!--end::Heading-->
        <!--begin::Section-->
        <div class="mb-10 px-md-10">
            <!--begin::Label-->
            <div class="fw-bolder text-start text-dark fs-6 mb-1 ms-1">Type your 6 digit security code</div>
            <!--end::Label-->
            <!--begin::Input group-->
            <div class="d-flex flex-wrap flex-stack">
                <input type="text" name="input1" data-inputmask="'mask': '9', 'placeholder': ''" min="0" max="9" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" id="otc-1" value="{{ old('input1') }}" />
                <input type="text" name="input2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" id="otc-2" value="{{ old('input2') }}" />
                <input type="text" name="input3" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" id="otc-3" value="{{ old('input3') }}" />
                <input type="text" name="input4" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" id="otc-4" value="{{ old('input4') }}" />
                <input type="text" name="input5" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" id="otc-5" value="{{ old('input5') }}" />
                <input type="text" name="input6" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" id="otc-6" value="{{ old('input6') }}" />
            </div>
            <!--begin::Input group-->
        </div>
        <!--end::Section-->
        <!--begin::Submit-->
        <div class="d-flex flex-center">
            <button type="submit" id="kt_sing_in_two_steps_submit" class="btn btn-lg btn-primary fw-bolder">
                <span class="indicator-label">Verify</span>
                <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <div class="text-center mt-3">
            <a class="link-primary fw-bolder" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Use a different account</a>
        </div>
        <!--end::Submit-->
    </form>
    <!--end::Form-->
    <!--begin::Notice-->
    <div class="text-center fw-bold fs-5">
        <span class="text-muted me-1">Didn’t get the code ?</span>
        <a href="{{ route('verify.resend') }}" class="link-primary fw-bolder fs-5 me-1">Resend</a>
    </div>
    <!--end::Notice-->
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
<!--end::Wrapper-->
{{-- <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form class="form w-100" method="POST" action="{{ route('verify.store') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-3">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Two-Factor Verification</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">You have received an email which contains two factor login code.
                If you haven't received it, press <a class="link-primary fw-bolder" href="{{ route('verify.resend') }}">here</a>.</div>
            <!--end::Link-->
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
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <label class="form-label fw-bolder text-dark fs-6">Code</label>
            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="two_factor_code" value="{{ old('two_factor_code') }}" required/>
            @error('two_factor_code')
                <span class="text-danger small">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Verify</span>
            </button>
            <!--end::Submit button-->
        </div>
        <div class="text-center">
            <a class="link-primary fw-bolder" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Use a different account</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div> --}}
@endsection

@section('script')
<script>
        let i = 0, token = '', input1 = document.getElementById('otc-1'),
            inputs = document.querySelectorAll('input[type="text"]'),
            splitNumber = function(e) {
                let data = e.target.value; // Chrome doesn't get the e.data, it's always empty, fallback to value then.
                if ( ! data ) return; // Shouldn't happen, just in case.
                if ( data.length === 1 ) return; // Here is a normal behavior, not a paste action.

                popupNext(e.target, data);
                for (i = 0; i < data.length; i++ ) { inputs[i].value = data[i]; }
            },
            popupNext = function(element, data) {
                element.value = data[0]; // Apply first item to first input
                data = data.substring(1); // remove the first char.
                if ( element.nextElementSibling && data.length ) {
                    // Do the same with the next element and next data
                    popupNext(element.nextElementSibling, data);
                }
                // getToken();
            },
            getToken = function () {
                 if (inputs[inputs.length - 1].value !== '') {
                     setTimeout(() => {
                         inputs.forEach(input => {
                             if (token.length < 6)
                                 token += input.value;
                             if (token.length === 6)
                                 inputs.forEach(input => {
                                     input.setAttribute('disabled', 'disabled');
                                 });
                         })
                         if (token.length === 6 && i === 0) {
                             i++
                             $.ajax({
                                 type: 'POST',
                                 headers: { "X-CSRF-TOKEN": '{{ csrf_token() }}' },
                                 url: '{{ route('verify.store') }}',
                                 data: { token },
                                 beforeSend() {
                                     $('#invalid').addClass('d-none')
                                     $('#expired').addClass('d-none')
                                     $('#spinner').show()
                                     $('#resend').hide()
                                 },
                                 success() {
                                     $('#spinner').hide()
                                     $('#success').removeClass('d-none')
                                     setTimeout(() => {
                                         window.location = '{{ route('dashboard') }}'
                                     }, 2000)
                                 },
                                 error(error) {
                                     i = 0;
                                     inputs.forEach(input => {
                                         input.removeAttribute('disabled');
                                     });
                                     $('#spinner').hide()
                                     $('#resend').show()
                                     if (error.status === 400)
                                         $('#invalid').removeClass('d-none');
                                     if (error.status === 422)
                                         $('#expired').removeClass('d-none');
                                 }
                             });
                         }
                     }, 1000);
                 }
            }

        inputs.forEach(function(input) {
            /**
             * Control on keyup to catch what the user intent to do.
             * I could have check for numeric key only here, but I didn't.
             */
            input.addEventListener('keyup', function(e){
                // Break if Shift, Tab, CMD, Option, Control.
                if (e.keyCode === 16 || e.keyCode === 9 || e.keyCode === 224 || e.keyCode === 18 || e.keyCode === 17) {
                    return;
                }

                // On Backspace or left arrow, go to the previous field.
                if ( (e.keyCode === 8 || e.keyCode === 37) && this.previousElementSibling && this.previousElementSibling.tagName === "INPUT" ) {
                    this.previousElementSibling.select();
                } else if (e.keyCode !== 8 && this.nextElementSibling) {
                    this.nextElementSibling.select();
                }

                // If the target is populated to quickly, value length can be > 1
                if ( e.target.value.length > 1 ) {
                    splitNumber(e);
                }
            });

            /**
             * Better control on Focus
             * - don't allow focus on other field if the first one is empty
             * - don't allow focus on field if the previous one if empty (debatable)
             * - get the focus on the first empty field
             */
            input.addEventListener('focus', function(e) {
                // If the focus element is the first one, do nothing
                if ( this === input1 ) return;

                // If value of input 1 is empty, focus it.
                if ( input1.value === '' ) {
                    input1.focus();
                }

                // If value of a previous input is empty, focus it.
                // To remove if you don't wanna force user respecting the fields order.
                if ( this.previousElementSibling.value === '' ) {
                    this.previousElementSibling.focus();
                }
            });
        });

        /**
         * Handle copy/paste of a big number.
         * It catches the value pasted on the first field and spread it into the inputs.
         */
        input1.addEventListener('input', splitNumber);
        // input1.addEventListener('input', getToken);
        // inputs[inputs.length - 1].addEventListener('input', getToken);
    </script>
@endsection
