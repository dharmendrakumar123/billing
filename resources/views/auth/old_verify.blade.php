@extends('layouts.auth')

@section('content')
<main role="main" class="no-sidebar">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-8 login-banner d-flex align-items-center justify-content-center min-vh-100 bg-dark flex-column">
          <div class="text-center text-white position-relative mt-auto">
            <a class=" text-white" href="#"><img src="{{ asset('images/logo-w.svg')}}"></a>
            <h5 class="my-3">A Powerful, Yet Free Invoicing Platform <br>
                For Your Business, Build with Trust.</h5>
            <a class=" text-white" href="#"><i class="fa fa-caret-left" aria-hidden="true"></i> Back to epiliam</a>
          </div>
         <label class="mt-auto position-relative text-white">Copyright © 2021 Bills. All rights reserved.</label>
        </div>
        <div class="col-4 bg-white d-flex align-items-center min-vh-100 px-5">
            <div class="verify-body">
             <a class="mb-4 d-block" href="{{ url('/login') }}"><i class="fa fa-caret-left" aria-hidden="true"></i> Back to login</a>
              <h4 class="mb-5">{{ __('Verify Reset Code') }}</h4>
              <form method="POST" action="{{ route('verify') }}">
              @csrf
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                    <label for="" class="">Enter the One time password (OTP) sent to email <b>"{{Auth::user()->email}}"</b> (<a href="{{url('/change-email')}}" class="change-email"> Change email</a>) </label>
                    </div>
                    <div class="form-group">
                      <div class="controls">
                      <input type="text" class="form-control" name="email" disabled value={{Auth::user()->email}} >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class="">Enter OTP</label>
                      <div class="controls">
                        <input type="text"  placeholder="Enter OTP" class="form-control @error('otp') is-invalid @enderror" id="otp" name="otp" value="{{ old('otp') }}">
                        @error('otp')
                            <div class="alert alert-danger" role="alert">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-12 form-controls my-3 text-right">
                    <button type="submit" class="btn btn-primary btn-block">Verify OTP</button>
                  </div>
                  <div class="timer text-center font-weight-bold col-12">
                    
                  </div>
                  <div class="resend-container col-12 text-center d-none">
                      <label>
                    OTP Not Receive? <a href="javascript:;" class="resend_otp">Resend OTP</a></label></div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </main>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<script>
//   setTimeout(function(){
//    $('.resend-container').removeClass('d-none');
//    $('.timer').addClass('d-none');
//    // or fade, css display however you'd like.
// }, 15000);

$('.resend_otp').on('click',function(){
  $.ajax({
        url:"{{url('/')}}"+'/resend_otp',
        method:'GET',
        success:function(data){
            if (data == '1') {
                swal.fire('Otp sent to email Successfully');
            } else {
              swal.fire('Something Went Wrong.Try Again Later');
            }
        }
    });
});

$(document).ready(function(){
 
  var timeLeft = 15;
    var elem = $('.timer');
    
    var timerId = setInterval(countdown, 1000);
    
    function countdown() {
      if (timeLeft == -1) {
        // console.log('12');
        clearTimeout(timerId);
        $('.resend-container').removeClass('d-none');
        $('.timer').addClass('d-none');
      } else {
        // console.log('123');
        elem.html(timeLeft + ' seconds to Resend OTP ');
        timeLeft--;
      }
    }

    var mobileInput = document.getElementById("otp")
    mobileInput.addEventListener("keydown", function(e) {
      if ([32].includes(e.keyCode)) {
        e.preventDefault();
      }
    });
  
});


</script>
@endsection
