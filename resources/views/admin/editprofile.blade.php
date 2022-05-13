@extends('layouts.admindashboard')

@section('content')

    <div class="container-fluid">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Settings</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#!">Users</a></li>
                <li class="breadcrumb-item"><a href="#!">Edit Super User Profile</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5>Edit User Detail</h5>
            </div>
            <div class="card-body">

              <form  method="POST" action="{{url('admin/editprofile')}}" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                  <div class="col-md-2 mb-2">
                  @if($data->image!= '')
                  <img src="{{ URL::to($data->image) }}" alt="username" class="img-fluid" />
                  @else
                  <img src="https://www.pngkey.com/png/detail/114-1149878_setting-user-avatar-in-specific-size-without-breaking.png" alt="username" class="img-fluid">
                  @endif
                 
                  </div>
                  <div class="col-md-10">
                    <div class="form-group border-bottom pb-3">
                      <label for="exampleFormControlFile1">Upload File</label>
                      <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Pan Card" class="">Full Name</label>
                      <div class="controls">
                        <input type="text" value="{{$data->name}}" name="name" id="" class="form-control"
                          placeholder="Enter your Full Name" maxlength="50">
                           @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Phone*</label>
                      <div class="controls">
                        <input type="number" value="{{$data->phone}}" name="phone" id="" class="form-control"placeholder="Enter your Phone no" maxlength="50">
                         @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Email*</label>
                      <div class="controls">
                        <input type="email"   value="{{$data->email}}" name="email" id=""  class="form-control @error('email') is-invalid @enderror" 
                             placeholder="Enter your email" maxlength="50">
                          @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Change Password</label>
                      <div class="controls">
                        <input type="password" value="" name="password" id="" class="form-control @error('password') is-invalid @enderror"
                          placeholder="Enter your Password" maxlength="50">
                           @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Confirm Password</label>
                      <div class="controls">
                        <input type="password" value="" name="password_confirmation" id="" class="form-control"
                          placeholder="Reenter your Password" maxlength="50">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-12 form-controls my-3 text-right">
                    <button type="submit" class="btn mr-3">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container -->

@endsection