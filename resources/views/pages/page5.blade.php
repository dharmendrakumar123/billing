@extends('layouts.customer')



@section('content')
<form action="{{url('/sale-invoice')}}" method="post" id="add-saleinvoice-form">
    <div class="top-stickybar">
        <div class="container-fluid">
            <div class="row d-flex justify-content-end align-items-center">
                <div class="col-4 pl-0">
                    <h1>Admin Details</h1>
                </div>
                <div class="col-8 text-right">
                    <a href="#" class="btn btn-light mr-2">Cancel</a>
                    <button id="" name="" value="" class="btn btn-secondary disabled" disabled>Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid main-container">
        <div class="main-form-container">
            <div class="row mx-0">
                <div class="col-6 py-3">
                    <p class="form-heading mb-4">Below Information will be used to access Epiliam.<br>Please remember or
                        Note and keep these details at some safe place.</p>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="" placeholder="Business Name here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Email ID</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="Your working Email ID">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+91</div>
                                </div>
                                <input type="number" class="form-control" id="inlineFormInputGroup"
                                    placeholder="You may receive OTP on this number">
                            </div>
                        </div>
                    </div>
                    <h5 class="form-heading my-4">Change Password</h5>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Current Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="" placeholder="Your current login password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="" placeholder="Enter new password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <div class="alert alert-warning mt-0" role="alert">
                                <div class="row">
                                    <span class="text-success col-6">Lower case letter</span>
                                    <span class="col-6">Upper case letter</span>
                                    <span class="col-6">Number</span>
                                    <span class="text-success col-6">Symbol allowed @#$%^&*()+</span>
                                    <span class="col-6">Minimum 6 charachers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="" placeholder="Exactly same as above">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection