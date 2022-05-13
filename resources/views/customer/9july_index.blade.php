@extends('layouts.customer')



@section('content')
<style>
.dataTables_filter{
  display: none;
}
</style>

<div class="top-stickybar">
  <div class="container-fluid">
    <div class="row d-flex justify-content-end align-items-center">
      <div class="col-4 pl-0">
        <h1>Customers</h1>
      </div>
      <div class="col-8 text-right">
        <a href="#" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal">Add New Customer</a>
        
      </div>
    </div>
  </div>
</div>

<div class="container-fluid main-container">
  <div class="main-form-container">
    <div class="search-header border-bottom py-4 px-3">
      <div class="form-group row col-sm-6 mb-0">
        <label for="" class="col-sm-2 col-form-label">Search</label>
        <div class="col-sm-10">
          <div class="controls">
            <input type="text" value="" name="" maxlength="150" class="form-control" id="searchbox" placeholder="Search Customer"
              required="" aria-required="true">
          </div>
        </div>
      </div>
    </div>
    <div class="total-widget py-4">
      <div class="row mx-0">
        <div class="col-sm-3">
          <div class="">
            <div class="">
              <h5><i class="fa fa-info-circle"></i> <span>Total Customers added</span></h5>
              <div class="total-counter"><i>Till Date</i><br><b>{{$total_customer}} Customers</b></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="record-table">
      <div class="table-responsive">

        <form id="customer-records" action="javascript:;" method="post">

          @csrf

          <table class="table table-hover" id="customer_datatable" data-footable="" data-toggle-column="last"
            style="display: table;">

            <thead>

              <tr class="footable-header">

                <th class="chkbox footable-first-visible">

                  <input type="checkbox" class="select-all" onclick="selectall();" name="del">

                </th>

                <th><a href="#">Customer/Vendor Name</a></th>

                <th>outstanding payment</th>

                <th><a href="#">Contact Number</a></th>

                <th><a href="#">Company Type</a></th>

                <th><a href="#">State</a></th>

                <th>

                  <a href="#">Status</a>

                </th>

                <th class="footable-last-visible">

                  Action

                </th>

              </tr>

            </thead>

            <tbody>

              @if(count($customers) > 0)

              @foreach($customers as $key => $customer)

              <tr>

                <td class="footable-first-visible">

                  <input type="checkbox" class="single-select" name="customer_id[]" value="{{$customer->id}}">

                </td>

                <td>{{$customer->name}}</td>

                <td>

                  <a href="#" class="company_total"> Get Total Balance </a>

                </td>

                <td>{{$customer->phone}}</td>

                <td>{{$customer->type}}</td>

                <td>{{$customer->state_name}}</td>

                <td class="td-actions">

                  <input data-id="{{$customer->id}}" class="toggle-class btn btn-outline-success" type="checkbox"
                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                    data-off="InActive" {{ $customer->status=='active' ? 'checked' : '' }}>



                  <!--a href="#" class="btn btn-outline-success">{{ $customer->status }}</a-->

                </td>

                <td class="td-actions footable-last-visible">

                  <a href="javascript:;" onclick="get_customer_by_id('{{$customer->id}}')" class="btn btn-outline-primary"><i
                      class="icon icon-pencil"></i>Edit</a>

                </td>

              </tr>

              @endforeach

              @endif

            </tbody><!-- /tbody -->

          </table>
  </form>

      </div>
    </div>
  </div>

</div>
<div class="modal right" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
  
    <div class="modal-content">
    
     
    <form action="{{ url('/customers') }}" method="POST" id="add-customer-form">
      <div class="modal-header">
      
        <h5 class="modal-title" id="exampleModalLabel">Create New Customer</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary"> Save</button>
      </div>

      <div class="modal-body">
      @csrf
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label required">Type</label>
          <div class="col-sm-9">
            <div class="controls">
              <select class="form-control custom-select" id="companytype" name="type">
                <option value="customer" {{ old('type') =='customer'?'selected':''}}>Customer</option>
                <option value="vendor" {{ old('type') =='vendor'?'selected':''}}>Vendor</option>
                <option value="customer-vendor" {{ old('type') =='customer-vendor'?'selected':''}}>Customer/Vendor</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Name</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text"  name="name" id="name" maxlength="150" class="form-control"
                placeholder="Enter customer / vendor name" aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="" class="col-sm-3 col-form-label">Phone Number</label>
          <div class="col-sm-9">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">+91</div>
              </div>
              <input type="number" name="phone" id="phone" value="" class="form-control"
                placeholder="Your company phone no./Mobile no.">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Address</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="address1" id="address1" placeholder="Full address"
              rows="4"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Country</label>
          <div class="col-sm-9">
            <select class="custom-select" id="country">
              <option selected="">India</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">State</label>
          <div class="col-sm-9">
            <select class="form-control custom-select @error('state_id') is-invalid @enderror" id="state_id" name="state_id" >
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

        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Pin code</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="pincode" name="pincode" 
              placeholder="Your postal pin code">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Registration Type</label>
          <div class="col-sm-9">
            <select class=" form-group custom-select" id="type" name="registration_type">
              <option value="0">Your Company Type</option>
              <option value="1">Proprietorship</option>
              <option value="2">Partnership</option>
              <option value="3">Hindu Undivided Family</option>
              <option value="4" selected="">Private Limited Company</option>
              <option value="5">Public Limited Company</option>
              <option value="6">Society/ Club/ Trust/ AOP</option>
              <option value="7">Government Department</option>
              <option value="8">Public Sector Undertaking</option>
              <option value="9">Unlimited Company</option>
              <option value="10">Limited Liability Partnership</option>
              <option value="11">Local Authority</option>
              <option value="12">Statutory Body</option>
              <option value="13">Foreign Company</option>
              <option value="14">Foreign Limited Liability Partnership</option>
              <option value="15">Others</option>
            </select>

          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">PAN no.</label>
          <div class="col-sm-9">
            <input type="text" name="pan" id="pan_number" value="" class="form-control"
              placeholder="PAN number of the business or personal if propietor">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">GSTIN</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="gstin" name="gstin" 
              placeholder="Enter GSTIN (If available)">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Shipping Addr.</label>
          <div class="col-sm-9">
            <div class="controls mt-2">
              <label><input type="checkbox" name="same_shipping" value="1" checked="" id="is_same_shipping"> Use Same
                Shipping Address</label>
            </div>
          </div>
        </div>
        <div class="additional-info d-none">
          <h5 class="border-top border-bottom py-3 my-3 subheading">Additional Shipping Address</h5>
          <div class="form-group">
            <label for="SHIP. Name" class="control-label">SHIP. Name</label>
            <div class="controls">
              <input type="text" value="" name="shipping_name" id="shipping_name" class="form-control"
                placeholder="Enter shipping Name">
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. Phone" class="control-label">SHIP. Phone</label>
            <div class="controls">
              <input type="text" value="" name="shipping_phone" id="ship_phone" class="form-control"
                placeholder="Enter shipping phone No." maxlength="20">
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. Address" class="control-label">SHIP. Address</label>
            <div class="controls">
              <textarea name="shipping_address" id="shipping_address" class="form-control"
                placeholder="Enter shipping address"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. State" class="control-label">SHIP. State</label>
            <div class="controls">
              <select type="list" data-value="" name="shipping_state_id" class="form-control" id="listBox2">
                <option value="">Select State</option>
                @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->name}} ({{$state->state_code}})</option>
              @endforeach
              </select>
            </div>
          </div>
          <!-- <div class="form-group">
            <label for="ship_country" class="control-label">SHIP. Country</label>
            <div class="controls">
              <select data-value="India" type="list" name="shipping_country_code" class="form-control" id="listBoxCountry2">
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bhtan">Bhtan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cabo Verde">Cabo Verde</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Central African Republic (CAR)">Central African Republic (CAR)</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                <option value="Republic of the Congo">Republic of the Congo</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="DominicanRepublic">DominicanRepublic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Greece">Greece</option>
                <option value="Grenada">Grenada</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="uinea-Bissau">uinea-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Kosovo">Kosovo</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxemborg">Luxemborg</option>
                <option value="Macedonia (FYROM)">Macedonia (FYROM)</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia">Micronesia</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="North Korea">North Korea</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Vincentand the Grenadines">Saint Vincentand the Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Korea">South Korea</option>
                <option value="South Sudan">South Sudan</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-Leste">Timor-Leste</option>
                <option value="Togo">Togo</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidadad Tobago">Trinidadad Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates (UAE)">United Arab Emirates (UAE)</option>
                <option value="United Kingdom (UK)">United Kingdom (UK)</option>
                <option value="United States of America (USA)">United States of America (USA)</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City (Holy See)">Vatican City (Holy See)</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
              </select>
            </div>
          </div> -->
          <div class="form-group">
            <label for="PAN" class="control-label">SHIP PAN</label>
            <div class="controls">
              <input type="text" value="" name="shipping_pan" id="shipping_pan" class="form-control"
                placeholder="Enter shipping  PAN" maxlength="20">
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. GSTIN " class="control-label">SHIP. GSTIN</label>
            <div class="controls">
              <input type="text" value="" name="shipping_gstin" id="ship_gstno" class="form-control"
                placeholder="Enter shipping GSTIN " maxlength="20">
            </div>
          </div>
        </div>
    
      </div>
    </div>
    
    </form>
    
  </div>
</div>

<!-- Edit Customer Modal -->
<div class="modal right" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModal" aria-hidden="true">
  <div class="modal-dialog modal-md">
  
    <div class="modal-content">
    
     
    <form action="javascript:;" method="POST" id="update-customer-form">
      @csrf
      {{ method_field('PATCH') }}
      <input type="hidden" name="customer_id" id="customer_id" >
      <input type="hidden" name="address_id" id="address_id" >
      <div class="modal-header">
      
        <h5 class="modal-title" id="editCustomerModallabel">Update Customer</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary"> Update</button>
      </div>

      <div class="modal-body">
      @csrf
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label required">Type</label>
          <div class="col-sm-9">
            <div class="controls">
              <select class="form-control custom-select" id="edit_companytype" name="type">
                <option value="customer" {{ old('type') =='customer'?'selected':''}}>Customer</option>
                <option value="vendor" {{ old('type') =='vendor'?'selected':''}}>Vendor</option>
                <option value="customer-vendor" {{ old('type') =='customer-vendor'?'selected':''}}>Customer/Vendor</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Name</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text"  name="name" id="edit_name" maxlength="150" class="form-control"
                placeholder="Enter customer / vendor name" aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="" class="col-sm-3 col-form-label">Phone Number</label>
          <div class="col-sm-9">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">+91</div>
              </div>
              <input type="number" name="phone" id="edit_phone" value="" class="form-control"
                placeholder="Your company phone no./Mobile no.">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Address</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="address1" id="edit_address1" placeholder="Full address"
              rows="4"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Country</label>
          <div class="col-sm-9">
            <select class="custom-select" id="edit_country">
              <option selected="">India</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">State</label>
          <div class="col-sm-9">
            <select class="form-control custom-select @error('state_id') is-invalid @enderror" id="edit_state_id" name="state_id" >
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

        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Pin code</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="edit_pincode" name="pincode" 
              placeholder="Your postal pin code">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Registration Type</label>
          <div class="col-sm-9">
            <select class=" form-group custom-select" id="edit_registration_type" name="registration_type">
              <option value="0">Your Company Type</option>
              <option value="1">Proprietorship</option>
              <option value="2">Partnership</option>
              <option value="3">Hindu Undivided Family</option>
              <option value="4" selected="">Private Limited Company</option>
              <option value="5">Public Limited Company</option>
              <option value="6">Society/ Club/ Trust/ AOP</option>
              <option value="7">Government Department</option>
              <option value="8">Public Sector Undertaking</option>
              <option value="9">Unlimited Company</option>
              <option value="10">Limited Liability Partnership</option>
              <option value="11">Local Authority</option>
              <option value="12">Statutory Body</option>
              <option value="13">Foreign Company</option>
              <option value="14">Foreign Limited Liability Partnership</option>
              <option value="15">Others</option>
            </select>

          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">PAN no.</label>
          <div class="col-sm-9">
            <input type="text" name="pan" id="edit_pan_number" value="" class="form-control"
              placeholder="PAN number of the business or personal if propietor">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">GSTIN</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="edit_gstin" name="gstin" 
              placeholder="Enter GSTIN (If available)">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Shipping Addr.</label>
          <div class="col-sm-9">
            <div class="controls mt-2">
              <label><input type="checkbox" name="same_shipping" value="1" checked="" id="edit_is_same_shipping"> Use Same
                Shipping Address</label>
            </div>
          </div>
        </div>
        <div class="edit_additional-info d-none">
          <h5 class="border-top border-bottom py-3 my-3 subheading">Additional Shipping Address</h5>
          <div class="form-group">
            <label for="SHIP. Name" class="control-label">SHIP. Name</label>
            <div class="controls">
              <input type="text" value="" name="shipping_name" id="edit_shipping_name" class="form-control"
                placeholder="Enter shipping Name">
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. Phone" class="control-label">SHIP. Phone</label>
            <div class="controls">
              <input type="text" value="" name="shipping_phone" id="edit_ship_phone" class="form-control"
                placeholder="Enter shipping phone No." maxlength="20">
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. Address" class="control-label">SHIP. Address</label>
            <div class="controls">
              <textarea name="shipping_address" id="edit_shipping_address" class="form-control"
                placeholder="Enter shipping address"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. State" class="control-label">SHIP. State</label>
            <div class="controls">
              <select type="list" data-value="" name="shipping_state_id" class="form-control" id="edit_ship_state">
                <option value="">Select State</option>
                @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->name}} ({{$state->state_code}})</option>
              @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="PAN" class="control-label">SHIP PAN</label>
            <div class="controls">
              <input type="text" value="" name="shipping_pan" id="edit_shipping_pan" class="form-control"
                placeholder="Enter shipping  PAN" maxlength="20">
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. GSTIN " class="control-label">SHIP. GSTIN</label>
            <div class="controls">
              <input type="text" value="" name="shipping_gstin" id="edit_ship_gstno" class="form-control"
                placeholder="Enter shipping GSTIN " maxlength="20">
            </div>
          </div>
        </div>
    
      </div>
    </div>
    
    </form>
    
  </div>
</div>
<!-- End Customer Modal -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
    <script>

  $('#is_same_shipping').on('click',function(){
      var ischecked = $('#is_same_shipping').is(':checked'); 
      if(ischecked == false){
          $('.additional-info').removeClass('d-none');
      }else{
          $('.additional-info').addClass('d-none');
      }
    });

    $('#edit_is_same_shipping').on('click',function(){
      var ischecked = $('#edit_is_same_shipping').is(':checked'); 
      if(ischecked == false){
          $('.edit_additional-info').removeClass('d-none');
      }else{
          $('.edit_additional-info ').addClass('d-none');
      }
    });

    jQuery.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /^[a-z\s]+$/i.test(value);
    }, "Letters only please"); 

    jQuery.validator.addMethod(
      "regex",
      function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
      },
      "Please check your input."
    );

    jQuery.validator.addMethod("gstin", function(value, element) {
      var gstin = new RegExp('^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$');
      return this.optional(element) || pan.test(value) || gstin.test(value);
    }, "Invalid Gstin number"); 

    jQuery.validator.addMethod("custom_pan", function(value, element) {
      var pan = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
      return this.optional(element) || pan.test(value) ;
    }, "Invalid Pan number"); 

    jQuery.validator.addMethod("exactlength", function(value, element, param) {
    return this.optional(element) || value.length == param;
    }, $.validator.format("Please enter exactly {0} characters."));

      $('#add-customer-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
              lettersonly:true,
              maxlength:20,
              minlength:4
            },
            phone:{
              digits:true,
              exactlength:10
            },
            pincode:{
              required:true,
              digits:true,
              exactlength:6
            },
            state_id:{
              required:true
            },
            // pan:{
            //   custom_pan:true
            // }
        },
        messages: {
          name: {
              required: 'Please enter Customer/vendor',
              lettersonly:'Name should be only characters'
          },
          phone:{
            digits:'you can enter only digits'
          },
          pincode:{
            digits:'you can enter only digits'
          },
          state_id:{
            required:'Please select state'
          },
          pan:{
            pan:true
          }

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
           form.submit();
        }
    });


 var dataTable =  $("#customer_datatable").DataTable();

 $("#searchbox").keyup(function() {
    filterGlobal();
  }); 

  function filterGlobal () {
      $('#customer_datatable').DataTable().search(
          $('#searchbox').val(),
      ).draw();
  }


  function selectall(event) {

    var ischecked = $('.select-all').is(':checked');

    if (ischecked == true) {

      $('.single-select').prop('checked', 'checked');

    } else {

      $('.single-select').prop('checked', false);

    }

  }


 


  $('.single-select').on('click', function () {

    var totalCheckboxes = $('.single-select').length;

    var numberOfChecked = $('.single-select:checked').length;

    if (numberOfChecked < totalCheckboxes) {

      $('.select-all').prop('checked', false);

    } else {

      $('.select-all').prop('checked', true);

    }

  });



  $('#multiDelete').on('click', function (e) {

    $.ajax({

      url: base_url + '/customer/multidelete',

      method: 'POST',

      data: $('#customer-records').serialize(),

      success: function (data) {

        if (data == '1') {

          swal.fire({

            'title': 'Cutsomer Deleted successfully',

            'icon': 'success'

          }).then(function () {

            document.location.href = base_url + '/customers';

          });

        } else {

          swal.fire(data);

        }

      }

    });

  });



  //change the customer status

  $(function () {

    $('.toggle-class').change(function () {

      var status = $(this).prop('checked') == true ? 'active' : 'inactive';

      //alert(status);

      var c_id = $(this).data('id');

      // alert(user_id);

      $.ajax({

        type: "GET",

        dataType: "json",

        url: base_url + '/changecustomerStatus/' + c_id,

        data: { 'status': status, 'id': c_id },

        success: function (data) {

          //  console.log(data);
          if(data.status == 1){
            toastr.success(data.message);
          }else{
            toastr.warning(data.message);
          }

        }

      });

    })

  })

// Edit Customer data 

function get_customer_by_id(customer_id){

  $.ajax({  
    type: "GET",  
    url: base_url+'/customerlist',  
    ContentType : 'application/json',
    dataType: 'json',
    data: {id:customer_id},
    success: function(response){
      // console.log(response)
      if(response.status == 1){
        var customer_data = response.data[0];
        
        $('#customer_id').val(customer_data.id);
        $('#address_id').val(customer_data.address_id);
        $('#edit_companytype').val(customer_data.type);
        $('#edit_name').val(customer_data.name);
        $('#edit_phone').val(customer_data.phone);
        $('#edit_address1').val(customer_data.address1);
        $('#edit_country').val('india');
        $('#edit_state_id').val(customer_data.state_id);
        $('#edit_pincode').val(customer_data.pincode);
        $('#edit_registration_type').val(customer_data.registration_type);
        $('#edit_pan_number').val(customer_data.pan);
        $('#edit_gstin').val(customer_data.gstin);
        if(customer_data.same_shipping == 'on'){
          $('#edit_is_same_shipping').prop('checked',true);
          
        }else{
          $('#edit_is_same_shipping').prop('checked',false);
          $('.edit_additional-info').removeClass('d-none');
        }
        $('#edit_shipping_name').val(customer_data.shipping_name);
        $('#edit_ship_phone').val(customer_data.shipping_phone);
        $('#edit_shipping_address').val(customer_data.shipping_address);
        $('#edit_ship_state').val(customer_data.shipping_state_id);
        $('#edit_shipping_pan').val(customer_data.shipping_pan);
        $('#edit_ship_gstno').val(customer_data.shipping_gstin);
        $('#editCustomerModal').modal('show');
      }else{
        toastr.warning(data.message);
      }
    },
    error: function(data){
    },
    complete: function(data){
    }
  })
}

$('#update-customer-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
              lettersonly:true,
              maxlength:20,
              minlength:4
            },
            phone:{
              digits:true,
              exactlength:10
            },
            pincode:{
              required:true,
              digits:true,
              exactlength:6
            },
            state_id:{
              required:true
            }
        },
        messages: {
          name: {
              required: 'Please enter Customer/vendor',
              lettersonly:'Name should be only characters'
          },
          phone:{
            digits:'you can enter only digits'
          },
          pincode:{
            digits:'you can enter only digits'
          },
          state_id:{
            required:'Please select state'
          },
          pan:{
            pan:true
          }

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
           var customer_id = $('#customer_id').val(); 
          $.ajax({  
            type: "POST",  
            url: base_url+'/customers/'+customer_id,  
            ContentType : 'application/json',
            dataType: 'json',
            data: $('#update-customer-form').serialize(),
            success: function(response){
              // console.log(response);
              if(response.status == 1){
                toastr.success(response.message);
                document.location.href = base_url + '/customers';
              }else{
                toastr.warning(response.message);
              }
            }
          });
        }
          //  form.submit();
         
        
    });
</script>

@endsection