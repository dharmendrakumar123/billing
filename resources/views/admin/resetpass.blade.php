@extends('layouts.adminauth')

@section('content')
<main role="main" class="no-sidebar">
    <div class="container-fluid mt-5">
      <div class="row justify-content-center">
        <div class="col-4">
          <div class="card">
            <div class="card-header text-center">
              <h4>{{ __('Reset Password') }}</h4>
            </div>
            <div class="card-body">

              <form method="POST" action="{{ url('resetpass') }}" id="change-email-form">
              @csrf
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="" class="">Enter otp  </label>
                      <div class="controls">
                      <input type="hidden" name="id" value="{{ $user->id }}">
                      <input type="text" name="otp"  class="form-control @error('otp') is-invalid @enderror"  value="{{ old('otp') }}">
                        @error('otp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="">Enter new password  </label>
                      <div class="controls">
                      <input type="text" name="password"  class="form-control @error('password') is-invalid @enderror"  value="{{ old('password') }}">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 form-controls my-3 text-right">
                    <button type="submit" class="btn btn-primary btn-block"><i class="far fa-user"></i> Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>

@endsection
