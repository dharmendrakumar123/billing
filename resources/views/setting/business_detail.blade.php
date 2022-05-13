@extends('layouts.customer')

@section('content')
<form method="post"  novalidate action="{{ url('/organisation-detail')}}" id="edit-organisation-form" enctype="multipart/form-data">
                    @csrf
    <div class="top-stickybar">
        <div class="container-fluid">
            <div class="row d-flex justify-content-end align-items-center">
                <div class="col-4 pl-0">
                    <h1>Business Details</h1>
                </div>
                <div class="col-8 text-right">
                    <a href="{{ url('/') }}" class="btn btn-light mr-2">Cancel</a>
                    <button type="submit" id="submit-data" class="btn btn-secondary disabled" disabled="true" >Save</button>
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
                                    <input type="file" name="logo_image" class="custom-file-input" id="validatedCustomFile" >
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Business Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" value="{{$organization->name}}" placeholder="Business Name here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Company Email ID</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" id="email" value="{{$organization->email}}" class="form-control"  placeholder="It will appear on Invoice">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">+91</div>
                                </div>
                                <input type="number" name="phone" id="phone" value="{{$organization->phone}}" class="form-control"  placeholder="Your company phone no./Mobile no.">
                              </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <textarea  class="form-control" name="address1" id="address1"   placeholder="Full address" rows="4">{{$organization->address1}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label required">Country</label>
                        <div class="col-sm-9">
                            <select class="custom-select" id="country">
                                <option selected>India</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label required">State</label>
                        <div class="col-sm-9">
                            <input type="text" name="state_name" id="state_name" disabled value="{{$organization->state_name}} ({{$organization->state_code}})" class="form-control"  placeholder="Your State">
                        </div>
                    </div>
                   
                    <input type="hidden" name="id" value="{{$organization->id}}">
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label required">Pin code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="pincode" name="pincode" value="{{$organization->pincode}}"  placeholder="Your postal pin code">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Company Type</label>
                        <div class="col-sm-9">
                                <select class=" form-group custom-select" id="type"  name="type" >
                                    <option value="0" >Your Company Type</option>
                                    <option value="1" {{ '1' == $organization->type ? 'selected':'' }}>Proprietorship</option>
                                    <option value="2" {{ '2' == $organization->type ? 'selected':'' }}>Partnership</option>
                                    <option value="3" {{ '3' == $organization->type ? 'selected':'' }}>Hindu Undivided Family</option>
                                    <option value="4" {{ '4' == $organization->type ? 'selected':'' }}>Private Limited Company</option>
                                    <option value="5" {{ '5' == $organization->type ? 'selected':'' }}>Public Limited Company</option>
                                    <option value="6" {{ '6' == $organization->type ? 'selected':'' }}>Society/ Club/ Trust/ AOP</option>
                                    <option value="7" {{ '7' == $organization->type ? 'selected':'' }}>Government Department</option>
                                    <option value="8" {{ '8' == $organization->type ? 'selected':'' }}>Public Sector Undertaking</option>
                                    <option value="9" {{ '9' == $organization->type ? 'selected':'' }}>Unlimited Company</option>
                                    <option value="10" {{ '10' == $organization->type ? 'selected':'' }}>Limited Liability Partnership</option>
                                    <option value="11" {{ '11' == $organization->type ? 'selected':'' }}>Local Authority</option>
                                    <option value="12" {{ '12' == $organization->type ? 'selected':'' }}>Statutory Body</option>
                                    <option value="13" {{ '13' == $organization->type ? 'selected':'' }}>Foreign Company</option>
                                    <option value="14" {{ '14' == $organization->type ? 'selected':'' }}>Foreign Limited Liability Partnership</option>
                                    <option value="15" {{ '15' == $organization->type ? 'selected':'' }}>Others</option>
                                    </select>
                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">PAN no.</label>
                        <div class="col-sm-9">
                            <input type="text" name="pan_number" id="pan_number" value="{{$organization->pan_number}}" class="form-control"  placeholder="PAN number of the business or personal if propietor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">GSTIN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="gstin" name="gstin" value="{{$organization->gstin}}" placeholder="Enter GSTIN (If available)">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="" class="col-sm-3 col-form-label">Website</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="website"  name="website" value="{{$organization->website}}" placeholder="Enter company website (if available)">
                        </div>
                    </div>
                </div>
                <div class="col-6 bg-grey py-3">
                    <h5 class="form-heading mb-4">Your company Bank details</h5>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Account Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="account_name" id="account_name" class="form-control"  aria-describedby="" value="{{ isset($banks[0]) ? $banks[0]->account_name : ''}}" placeholder="The name of account as per bank records">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Bank Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="bank_name" id="bank_name" class="form-control"  aria-describedby="" value="{{ isset($banks[0]) ? $banks[0]->bank_name : ''}}" placeholder="Enter Bank name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Account number</label>
                        <div class="col-sm-9">
                            <input type="text" name="account_no" id="account_no" class="form-control"  aria-describedby="" value="{{ isset($banks[0]) ? $banks[0]->account_no : ''}}" placeholder="Your company account number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Branch Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="branch_name" id="branch_name" class="form-control"  aria-describedby="" value="{{ isset($banks[0]) ? $banks[0]->branch_name : ''}}" placeholder="Your Bank branch name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">IFSC Code</label>
                        <div class="col-sm-9">
                            <input type="text" name="ifsc_code" id="ifsc_code" class="form-control"  aria-describedby="" value="{{isset($banks[0]) ? $banks[0]->ifsc_code : ''}}" placeholder="Bank branch IFSC Code">
                        </div>
                    </div>
                    <div class="form-group mt-3 row">
                        <label for="" class="col-sm-3 col-form-label">UPI ID</label>
                        <div class="col-sm-9">
                            <input type="text" name="bank_upi" id="bank_upi" class="form-control"  aria-describedby="" value="{{isset($banks[0]) ? $banks[0]->bank_upi : ''}}" placeholder="Your UPI ID (If any)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script>
      $('#edit-organisation-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
            },
            address1: {
              required:true,
            },
            pincode:{
              required:true,
            },
            city:{
              required:true,
            }
        },
        messages: {
        },
        highlight: function(element) {
            $(element).closest('.form-group input').addClass('has-error border-danger');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group input').removeClass('has-error border-danger');
        },
        success: function(element) {
            $(element).closest('.form-group input').removeClass('has-error border-danger');
            $(element).closest('.form-group').children('span.help-block').remove();
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest('.form-group .col-sm-9'));
        },
        submitHandler: function(form) {
          if(validateCurrentRows()){
            $('input,select').prop('disabled',false);
            $(form)[0].submit();
          }

        }
    });

    var button = $('#submit-data');
var orig = [];

$.fn.getType = function () {
    return this[0].tagName == "INPUT" ? $(this[0]).attr("type").toLowerCase() : this[0].tagName.toLowerCase();
}

$("form :input").each(function () {
    var type = $(this).getType();
    var tmp = {
        'type': type,
        'value': $(this).val()
    };
    if (type == 'radio') {
        tmp.checked = $(this).is(':checked');
    }
    orig[$(this).attr('id')] = tmp;
});

$('form').bind('change keyup', function () {

    var disable = true;
    $("form :input").each(function () {
        var type = $(this).getType();
        var id = $(this).attr('id');

        if (type == 'text' || type == 'select') {
            disable = (orig[id].value == $(this).val());
        } else if (type == 'radio') {
            disable = (orig[id].checked == $(this).is(':checked'));
        }

        if (!disable) {
            return false; // break out of loop
        }
    });

    if(disable == false){
        // console.log('123');
        button.addClass('btn-primary');
        button.removeClass('btn-secondary');
    }else{
        // console.log('456');
        button.removeClass('btn-primary');
        button.addClass('btn-secondary');
    }

    button.prop('disabled', disable);
});
</script>

@endsection