<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Customer / Vendor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
        <form action="javascript:;" method="post" id="create-customer-form">
              @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Customer / Vendor Name *</label>
                      <input type="text" class="form-control text-capitalize @error('name') is-invalid @enderror" id="" name="name"
                        placeholder="Enter Customer / Vendor Name *" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Contact Person</label>
                      <input type="text" class="form-control text-capitalize"   placeholder="Enter Contact Person" name="person_name" value="{{old('person_name')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Contact No</label>
                      <input type="number" class="form-control phone" placeholder="Enter Contact No" name="phone" value="{{old('phone')}}"  maxlength="10">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Address" class="">Address Line 1*</label>
                      <div class="controls">
                        <input type="text"  name="address1" maxlength="100" id="txtaddress" class="form-control"
                          placeholder="Enter address line 1" required value="{{old('address1')}}" aria-required="true">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Address" class="">Address Line 2</label>
                      <div class="controls">
                        <input type="text" name="address2" maxlength="100" id="txtaddress2"
                          class="form-control" placeholder="Enter address line 2" value="{{old('address2')}}">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="PinCode" class="">PinCode*</label>
                      <div class="controls">
                        <input type="number"  name="pincode" class="form-control pincode @error('pincode') is-invalid @enderror"
                          placeholder="Enter your pincode" maxlength="20" required="" aria-required="true" value="{{old('pincode')}}">
                          @error('pincode')
                            <span class="invalid-feedback">
                              <strong>{{$message}}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">State</label>
                      <select class="form-control @error('state_id') is-invalid @enderror" id="" name="state_id" >
                        <option value="">Select State</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}} ({{$state->state_code}})</option>
                        @endforeach
                      </select>
                       @error('state_id')
                       <span class="invalid-feedback">
                          <strong>{{$message}}</strong>
                       </span>
                       @enderror 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">CIty*</label>
                      <div class="controls">
                        <input type="text" id=""  class="form-control" name="city"
                          placeholder="Enter your " maxlength="50" required value="{{old('city')}}" aria-required="true">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Company Type</label>
                      <select class="form-control" id="companytype" name="type">
                        <option value="customer" {{ old('type') =='customer'?'selected':''}}>Customer</option>
                        <option value="vendor" {{ old('type') =='vendor'?'selected':''}}>Vendor</option>
                        <option value="customer-vendor" {{ old('type') =='customer-vendor'?'selected':''}}>Customer/Vendor</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-6 vendordetail {{ old('type') !='customer'?'':'d-none'}}">
                    <div class="form-group">
                      <label for="" class="">Bank Name</label>
                      <div class="controls">
                        <input type="text"  name="bank_name" class="form-control"
                          placeholder="Enter bank name" value="{{old('bank_name')}}" >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 vendordetail {{ old('type') !='customer'?'':'d-none'}}">
                    <div class="form-group">
                      <label for="" class="">Bank IFSC</label>
                      <div class="controls">
                        <input type="text"  name="bank_ifsc" id="bank_ifsc" class="form-control @error('bank_ifsc') is-invalid @enderror"
                          placeholder="Enter IFSC Code"  value="{{old('bank_ifsc')}}">
                          @error('bank_ifsc')
                            <span class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 vendordetail {{ old('type') !='customer'?'':'d-none'}}">
                    <div class="form-group">
                      <label for="" class="">Bank Account Number</label>
                      <div class="controls">
                        <input type="number"  name="bank_account_number" id="" class="form-control @error('bank_account_number') is-invalid @enderror"
                          placeholder="Enter account Number"  value="{{old('bank_account_number')}}">
                          @error('bank_account_number')
                            <span class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Fax No</label>
                      <div class="controls">
                        <input type="number"  name="fax" id="" class="form-control"
                          placeholder="Enter your Fax No" maxlength="50" value="{{old('fax')}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Website</label>
                      <div class="controls">
                        <input type="text" value="" name="website" id="txt" class="form-control"
                          placeholder="Enter  URL" maxlength="50" value="{{old('website')}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Email <small class="text-muted">(Note : Use comma(,) as address separator to enter Multiple Email.)</small></label>
                      <div class="controls">
                        <input type="email" value="" name="email" id="txt" class="form-control"
                          placeholder="Enter Email Address" maxlength="50" value="{{old('email')}}">                          
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Registration Type *</label>
                      <select class="form-control" id="" name="registration_type">
                        <option value="Regular" selected="">Regular</option>							
													<option value="Regular-UIN">Regular-Embassy/UN Body</option>							
													<option value="Regular-SEZ">Regular-SEZ</option>							
													<option value="Composition">Composition</option>							
													<option value="Consumer">Consumer</option>							
													<option value="Unregistered">Unregistered</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">GSTIN / PAN</label>
                      <div class="controls">
                        <input type="text" name="gstin_pan" id="" class="form-control @error('gstin_pan') is-invalid @enderror" 
                          placeholder="Enter GSTIN / PAN"  value="{{ old('gstin_pan') }}" maxlength="50">
                          @error('gstin_pan')
                            <span class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>

                  </div>
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Update GSTIN ?</label>
                      <div class="controls">
                        <label><input type="checkbox" name="" value="1" id=""> Update above GST
                          number on
                          all
                          previous invoices.</label>
                      </div>
                    </div>

                  </div> -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Distance for e-way bill (in km)</label>
                      <div class="controls">
                        <input type="number" value="" name="eway_distance" id="" class="form-control"
                          placeholder="Enter Distance for e-way bill (in km)" maxlength="50" value="{{old('eway_distance')}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">License No.</label>
                      <div class="controls">
                        <input type="text" name="license_no" id="" class="form-control @error('license_no') is-invalid @enderror"
                          placeholder="Enter License No." value="{{old('license_no')}}" maxlength="50">
                          @error('license_no')
                          <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Due Days <small class="text-muted">(Note : Use "" to use Default due date from settings, Set numeric value for Days from invoice date.)</small></label>
                      <div class="controls">
                        <input type="number" value="" name="due_days" id="" class="form-control"
                          placeholder="Enter Due Days" maxlength="50" value="{{old('due_days')}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-12"><h5 class="border-top border-bottom py-3 my-3">Additional Shipping Address</h5></div>
                  <hr>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">SHIP. Contact Person</label>
                      <input type="text" class="form-control" name="shipping_name" id="" aria-describedby="" placeholder="Enter SHIP. Contact Person" value="{{old('shipping_name')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">SHIP. Contact No</label>
                      <input type="number" class="form-control phone" name="shipping_phone" id="" aria-describedby=""
                        placeholder="Enter SHIP. Contact No" value="{{old('shipping_phone')}}" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Address" class="">SHIP. Address</label>
                      <div class="controls">
                        <input type="text"  name="shipping_address" maxlength="100" id="txtaddress" class="form-control"
                          placeholder="Enter address line 1" aria-required="true" value="{{old('shipping_address')}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">SHIP. State</label>
                      <select class="form-control" id="" name="shipping_state_id">
                        <option value="">Select State</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}} ({{$state->state_code}})</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">SHIP. Country</label>
                      <input type="text" name="shipping_country" maxlength="100" id="txtaddress" class="form-control"
                          placeholder="Enter address line 1"  aria-required="true" value="{{old('shipping_country')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">SHIP. GSTIN / PAN</label>
                      <div class="controls">
                        <input type="text" id=""   class="form-control" name="shipping_gstin_pan"
                          placeholder="Enter SHIP. GSTIN / PAN" maxlength="50"  value="{{old('shipping_gstin_pan')}}" >
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Company Enable</label>
                      <div class="controls mt-2">
                        <label><input type="checkbox" name="visible_all" value="1" id=""> Company will be visiable on all document.</label>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-12 form-controls my-3 text-right">
                    <a  href="{{url('/customers')}}" type="button" data-dismiss="modal" class="btn mr-3">Cancel</a>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                  </div>
                </div>
              </form>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"> changes</button> -->
          </div>
        </div>
      </div>
    </div>
</div>
  

<div class="modal fade" id="transportModal" tabindex="-1" aria-labelledby="transportModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="transportModalLabel">Add Transport</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <form action="javascript:;" method="post" id="create-transport-form">
              @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Transport Name</label>
                      <input type="text" class="form-control text-capitalize"  name="trans_name"
                        placeholder="Transport Name">
                        
                    </div>
                  </div>
                  <div class="col-md-12">
                  <div class="form-group">
                      <label for="">Transport ID</label>
                      <input type="text" class="form-control text-capitalize"  name="trans_transport_id"
                        placeholder="Transport ID">
                        
                    </div>
                  </div>
                  <div class="col-md-12">
                  <div class="form-group">
                      <label for="">Vehicle No</label>
                      <input type="text" class="form-control text-capitalize"  name="trans_vehicle_no"
                        placeholder="Vehicle No">
                        
                    </div>
                  </div>
                  
                  <div class="col-md-12 form-controls my-3 text-right">
                    <a  type="button" data-dismiss="modal" class="btn mr-3">Cancel</a>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                  </div>
                </div>
              </form>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"> changes</button> -->
          </div>
        </div>
      </div>
    </div>
    </div>


    
    
    