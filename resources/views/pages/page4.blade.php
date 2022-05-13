@extends('layouts.customer')



@section('content')
<form action="{{url('/sale-invoice')}}" method="post" id="add-saleinvoice-form">
    <div class="top-stickybar">
        <div class="container-fluid">
            <div class="row d-flex justify-content-end align-items-center">
                <div class="col-4 pl-0">
                    <h1>Business Details</h1>
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
                    <h5 class="form-heading mb-4">Your company details</h5>
                    <div class="custom-file mb-2">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Logo</label>
                            <div class="col-sm-9">
                                <div class="position-relative">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required="">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Business Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="" placeholder="Business Name here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Company Email ID</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="It will appear on Invoice">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">+91</div>
                                </div>
                                <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="Your company phone no./Mobile no.">
                              </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <textarea  class="form-control" id="" placeholder="Full address" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label required">Country</label>
                        <div class="col-sm-9">
                            <select class="custom-select">
                                <option selected="">India</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label required">State</label>
                        <div class="col-sm-9">
                            <select class="custom-select">
                                <option selected="">Select State</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label required">Pin code</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="Your postal pin code">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Company Type</label>
                        <div class="col-sm-9">
                            <select class="custom-select">
                                <option selected="">Partnership</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">PAN no.</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="PAN number of the business or personal if propietor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">GSTIN</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="Enter GSTIN (If available)">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="" class="col-sm-3 col-form-label">Website</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="Enter company website (if available)">
                        </div>
                    </div>
                </div>
                <div class="col-6 bg-grey py-3">
                    <h5 class="form-heading mb-4">Your company Bank details</h5>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Account Name</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="The name of account as per bank records">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Bank Name</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="Enter Bank name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Account number</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="Your company account number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Branch Name</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="Your Bank branch name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">IFSC Code</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="Bank branch IFSC Code">
                        </div>
                    </div>
                    <div class="form-group mt-3 row">
                        <label for="" class="col-sm-3 col-form-label">UPI ID</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="Your UPI ID (If any)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection