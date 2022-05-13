@extends('layouts.customer')

@section('content')
 
     
      <form action="{{url('/sale-invoice')}}" method="post" id="add-saleinvoice-form">
      <div class="top-stickybar">
      <div class="container-fluid">
        <div class="row d-flex justify-content-end align-items-center">
          <div class="col-4 pl-0">
            <h1>Create New Invoice</h1>
          </div>
          <div class="col-8 text-right">
            <a href="{{url('/sale-invoice')}}" class="btn btn-light mr-2">Cancel</a>
            <button type="submit" id="" name="" class="btn btn-light mr-2">Save & New</button>
            <button id="" name="" value="" class="btn btn-primary">Save & Preview</button>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid main-container">
      @csrf
      <div class="main-form-container">
      <div class="row mx-0">
        <div class="col-5">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col">
                  <h5>Customer Information</h5>
                </div>
                <div class="col text-right">
                  <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i
                      class="icon icon-plus"></i>
                    Add New Customer</a>
                </div>
              </div>
            </div>
            <div class="card-body customer-information-invoice" >



                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label ">M/S.</label>
                      <div class="controls " id="companybilling" data-select2-id="companybilling">
                        <select id="customers" class="form-control" name="customer_vendor_id">
                          <option value="">Select Customer</option>
                          @foreach($customers as $customer)
                          <option value="{{ $customer->id}}">{{ $customer->name}}</option>
                          @endforeach
                        </select>
                        <input type="hidden" value="{{$organization->state_name}}" id="business_state" name="business_state">
                        <input type="hidden" value="{{$organization->gstin}}" id="business_gstno" name="business_gstno">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label">ADDRESS</label>
                      <div class="controls">
                        <textarea name="address" id="address" rows="2" cols="2" readonly="true" aria-invalid="false"
                          class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label ">PHONE NO</label>
                      <div class="controls ">
                        <input name="phone" disabled id="phone" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label ">Rev. Charge</label>
                      <div class="controls ">
                        <select id="reverse_Charge" class="form-control" name="reverse_charge" disabled="disabled">
                          <option value="0" >No</option>
                          <option value="1" >Yes</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">GSTIN / PAN</label>
                        <input name="customer_gstno" disabled id="customer-gst" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Shipping Address</label>
                      <div class="controls mt-2">
                        <label><input type="checkbox" name="is_same_shipping" value="1" checked id="is_same_shipping"> Use Same Shipping Address</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="shipping_detail_drawer" class="d-none">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="" class="control-label ">SHIP. NAME</label>
                        <div class="controls ">
                          <input type="text" value="" class="form-control" name="shippingName" id="shippingName"
                            placeholder="Enter Shipping Name" maxlength="100">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="shippingAddress" class="control-label">SHIP. ADD.</label>
                        <div class="controls ">
                          <textarea name="shippingAddress" id="shippingAddress" rows="3" cols="2"
                            placeholder="Enter Shipping Address" maxlength="500" class="form-control"></textarea>
                        </div>
                        <!--/address-->

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="" class="control-label ">SHIP. PHONE</label>
                        <div class="controls ">
                          <input type="text" value="" name="shippingPhone" id="shippingPhone"
                            placeholder="Enter Shipping Phone" maxlength="30" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="" class="control-label ">SHIP. State</label>
                        <div class="controls ">
                          <select type="list" data-value="" name="shippingState" class="form-control" id="shippingState">
                            <option value="">Select State</option>
                            @foreach($states as $state)
                              <option value="{{$state->id}}">{{$state->name}} ({{$state->state_code}})</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="" class="control-label ">SHIP. Country</label>
                        <div class="controls">
                        <input type="text" name="shippingCountry" id="shippingCountry" class="form-control" placeholder="Enter Country">

                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="" class="control-label ">SHIP. GSTIN</label>
                        <div class="controls ">
                          <input type="text" value="" name="shippingGSTIN" id="shippingGSTIN"
                            placeholder="Enter Shipping GSTIN" class="form-control" maxlength="30">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group PlaceofSupply">
                      <label for="" class="control-label ">Place of Supply</label>
                      <select class="form-control @error('state_id') is-invalid @enderror" id="PlaceofSupply" name="PlaceofSupply" required >
                          <option value="">Select State</option>
                          @foreach($states as $state)
                          <option value="{{$state->id}}">{{$state->name}} ({{$state->state_code}})</option>
                          @endforeach
                        </select>

                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>

        <!--Invoice Detail-->
        <div class="col-7">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col">
                  <h5>Invoice Detail</h5>
                </div>
                <div class="col text-right">
                  <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#transportModal"><i
                      class="icon icon-plus"></i>
                    Add New Transport</a>
                </div>
              </div>
            </div>
            <div class="card-body">

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="" class="control-label">Invoice Type</label>
                      <div class="controls ">
                        <select class="form-control" id="invoicetype" name="invoice_type">
                          <option value="TaxInvoice">Regular</option>
                          <option value="BillofSupply">Bill of Supply</option>
                          <option value="SEZInvoice">Sez Invoice (With IGST)</option>
                          <option value="SEZInvoiceWithoutIGST">Sez Invoice (Without IGST)</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label ">Invoice No.</label>
                      <div class="controls ">
                        <input id="invoiceNumber" name="invoice_number" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label ">DATE</label>
                      <div class="controls ">
                        <input  type="text" name="bill_date" id="datepicker_bill"  class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label ">Challan No</label>
                      <div class="controls ">
                        <input  id="" name="challan_no" type="text" class="form-control ">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label ">Challan Date</label>
                      <div class="controls ">
                        <input name="challan_date" type="text" id="" class="form-control datepicker">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label ">P.O. No.</label>
                      <div class="controls ">
                        <input name="order_no" type="text" id="" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label ">P.O. Date</label>
                      <div class="controls ">
                        <input name="order_no_date" type="text" id="" class="form-control datepicker">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label ">L.R. No.</label>
                      <div class="controls ">
                        <input name="lrno" id="" type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label ">E-Way No.</label>
                      <div class="controls ">
                        <input name="eway" id="" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="" class="control-label">DISPATCH THROUGH</label>
                      <div class="controls ">
                        <select class="select2 form-control" id="selecttransport" name="tranport_name">
                          <option></option>
                          @foreach($transports as $transport)
                          <option value="{{ $transport->id}}">{{ $transport->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="transport_transport_id">
                  <input type="hidden" name="transport_id">
                  <input type="hidden" name="transport_vehicle_no">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label ">TRANS. ID</label>
                      <div class="controls ">
                        <input name="transport_id_label" value="" disabled id="transport_id" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="control-label ">VEHICLE NO.</label>
                      <div class="controls ">
                        <input name="vehicle_no_label" value="" id="vehicle_no" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>

            </div>

          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col">
                  <h5>Product Items</h5>
                </div>
                <!-- <div class="col text-right">
                  <a href="#" class="btn btn-primary btn-sm mr-3" data-toggle="modal" data-target="#exampleModal"><i
                      class="icon icon-plus"></i> Add New Transport</a>
                  <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i
                      class="icon icon-plus"></i> Add New Transport/Packaging Charges</a>
                </div> -->
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12">

                    <table class="table table-striped table-bordered addinvoice-table table-responsive" id="document-item-list">
                      <thead>
                        <tr>
                          <th>
                            <center>SR.</center>
                          </th>
                          <th>
                            <center>Product / Other Charges</center>
                          </th>
                          <th>
                            <center>HSN/SAC Code</center>
                          </th>
                          <th>
                            <center>Qty.</center>
                          </th>
                          <th>
                            <center>Price (Rs)</center>
                          </th>
                          <th class="discount_field">
                            <center>Disc<br>(%)</center>
                          </th>
                          <th>
                            <center>CGST (%)</center>
                          </th>
                          <th>
                            <center>CGST (Rs)</center>
                          </th>
                          <th>
                            <center>SGST (%)</center>
                          </th>
                          <th>
                            <center>SGST (Rs)</center>
                          </th>
                          <th>
                            <center>IGST (%)</center>
                          </th>
                          <th>
                            <center>IGST (Rs)</center>
                          </th>
                          <th>
                            <center>CESS</center>
                          </th>
                          <th>
                            <center>Total</center>
                          </th>
                          <th>
                            <center></center>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="ui-sortable product-list-row">
                        <tr class="product-item-row">
                          <td>
                            <label class="product-item-row-number">1</label>
                          </td>
                          <td>
                            <span role="status" aria-live="polite" class=""></span>
                            <select name="product_id[]" id="" class="product_id form-control product-item select2" style="width:200px;">
                              <option value="">Select Product</option>
                              @foreach($products as $product)
                                <option value="{{ $product->id}}">{{ $product->name}}</option>
                              @endforeach
                              <option value=""></option>
                            </select>
                            <input class="hidden-item-product-id" name="hidden_item_product_id[]" type="hidden" >
                            <input class="hidden-item-product-name" name="hidden_item_product_name[]" type="hidden" value="Pens">
                            <input class="hidden-item-product-uom" name="hidden_item_product_uom[]" type="hidden" value="UNT">
                            <input class="hidden-item-product-is_transport" name="hidden_item_product_is_transport[]" type="hidden" value="0">
                            <input class="hidden-item-product-cgst" name="hidden_item_product_cgst[]" type="hidden" value="">
                            <input class="hidden-item-product-sgst" name="hidden_item_product_sgst[]" type="hidden" value="">
                            <input class="hidden-item-product-igst" name="hidden_item_product_igst[]" type="hidden" value="">
                            <input class="hidden-item-product-cess" name="hidden_item_product_cess[]" type="hidden" value="">
                            <input class="hidden-item-product-cess_amount" name="hidden_item_product_cess_amount[]" type="hidden">

                            <textarea class="form-control" placeholder="Item Note..." name="product_note[]"
                              maxlength="800"></textarea>
                          </td>
                          <td>
                            <input type="text" name="hsncode[]" class="form-control hsccode" placeholder="HSN/SAC" style="width:60px;"
                              maxlength="20">
                          </td>
                          <td>
                            <input type="text" name="quantity[]" class="form-control quantity" placeholder="Qty."
                              style="width:50px;" maxlength="10">
                            <label class="product-quantity-available"></label>
                          </td>
                          <td>
                            <center>
                              <input type="text" name="price[]" class="form-control rate" placeholder="Price" style="width:100px;"
                                maxlength="10">
                            </center>
                          </td>
                          <td class="discount_field">
                            <input type="text" name="discount[]" class="form-control disc" style="width:50px;" value="0"
                              maxlength="10">
                              <input type="hidden" name="taxable_line_value[]" class="taxable_line_value" value="0">
                          </td>
                          <td>
                            <input type="text" name="cgst[]" class="form-control cgst" placeholder="%" style="width:50px;"
                              maxlength="5" readonly="readonly">
                          </td>
                          <td>
                            <input type="text" name="cgst_rate[]" class="form-control cgst_rate" style="width:50px;" value="0" readonly="readonly">
                          </td>
                          <td>
                            <input type="text" name="sgst[]" class="form-control sgst" placeholder="%" style="width:50px;"
                              maxlength="5" readonly="readonly">
                          </td>
                          <td>
                            <input type="text" name="sgst_rate[]" class="form-control sgst_rate" style="width:50px;" value="0" readonly="readonly">
                          </td>
                          <td>
                            <input type="text" name="igst[]" class="form-control igst" placeholder="%" style="width:50px;"
                              maxlength="5" readonly="readonly">
                          </td>
                          <td>
                            <input type="text" name="igst_rate[]" class="form-control igst_rate" style="width:50px;" value="0" readonly="readonly">
                          </td>
                          <td>
                            <input type="text" name="cess[]" class="form-control cess" style="width:40px;" placeholder="%">
                            <input value="" type="hidden" name="cessrate[]" class="cessrate">
                            <center>+</center>
                            <input type="text" name="cess_amount[]" class="form-control cess_amount" placeholder="Rs" style="width:40px;">
                          </td>
                          <td style="width:90px;">
                            <center>
                              <input type="text" name="total[]" class="form-control line_total" placeholder="Total" style="width:80px;">
                            </center>
                          </td>
                          <td>
                            <center>
                              <button type="button" value="" class="btn btn-add-row btn-primary"><i class="fa fa-plus"></i></button>
                              <button type="button" value="" class="btn btn-remove-row btn-danger d-none"  ><i
                                  class="fa fa-minus"></i></button>
                            </center>
                          </td>
                        </tr>

                      </tbody>

                      <tfoot>
                        <tr class="all-row-totals">
                          <td colspan="3" style="text-align:right;">Total Inv. Val </td>
                          <td>
                            <input type="hidden" name="total_qty" id="total_qty" value="0">
                            <label type="text" name="" id="total_qty_label" class="">0</label>
                          </td>
                          <td>
                            <input type="hidden" name="total_price" id="total_price" value="0">
                            <label type="text" name="" id="total_price_lable" class="">0</label>
                          </td>
                          <td class="discount_field">
                            <input type="hidden" name="total_discount" id="total_discount" value="0">
                            <label type="text" name="" id="total_discount_label" class="">0</label>
                          </td>
                          <td></td>
                          <td>
                            <input type="hidden" name="total_cgst_rate" id="total_cgst_rate" value="0">
                            <label type="text" name="" id="total_cgst_rate_label" class="">0</label>
                          </td>
                          <td></td>
                          <td>
                            <input type="hidden" name="total_sgst_rate" id="total_sgst_rate" value="0">
                            <label type="text" name="" id="total_sgst_rate_label" class="">0</label>
                          </td>
                          <td></td>
                          <td>
                            <input type="hidden" name="total_igst_rate" id="total_igst_rate" value="0">
                            <label type="text" name="" id="total_igst_rate_label" class="">0</label>
                          </td>
                          <td>
                            <input type="hidden" name="total_cess_rate" id="total_cess_rate" value="0">
                            <label type="text" name="" id="total_cess_rate_label" class="">0</label>
                          </td>
                          <td>
                            <input type="hidden" name="item_total" id="item_total" value="0">
                            <label type="text" name="" id="item_total_label" class="">0</label>
                          </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td colspan="6" rowspan="8"></td>
                          <td colspan="7" style="text-align:right;">
                            Total Taxable :
                          </td>
                          <td colspan="2">
                            <div class="total-controls">
                              <input type="hidden" name="total_taxable" id="total_taxable" value="0">
                              <center><label type="text" name="total_taxable_label" id="total_taxable_label"
                                  class="total_taxable">0</label></center>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="7" style="text-align:right;">
                            <label class="reverse_charge_label_text">Total Tax :</label>
                          </td>
                          <td colspan="2">
                            <div class="total-controls">
                              <input type="hidden" name="total_tax" id="total_tax" value="0">
                              <center><label type="text" name="total_tax_lable" id="total_tax_lable" class="total_tax">0</label>
                              </center>
                            </div>
                          </td>
                        </tr>
                        <tr class="other-tax-amount-tr">
                          <td colspan="7" style="text-align:right;">
                            <label class="label-input mr-3">TCS:</label>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">

                              <label class="btn btn-light active">
                                <input type="radio" name="other_tax_type_minus"  class="other_tax_type_minus" value="0" checked> <i class="fa fa-plus"></i>
                              </label>
                              <label class="btn btn-light ">
                                <input type="radio" name="other_tax_type_minus"  class="other_tax_type_minus" autocomplete="off" value="1" ><i class="fa fa-minus"></i>
                              </label>
                            </div>

                            <div class="btn-group btn-group-toggle" data-toggle="buttons">

                              <label class="btn btn-light ">
                                <input type="radio" name="other_tax_in_rupee"  class="other_tax_in_rupee" value="1" > RS</i>
                              </label>
                              <label class="btn btn-light active">
                                <input type="radio" name="other_tax_in_rupee"  class="other_tax_in_rupee" autocomplete="off" value="0" checked>%</i>
                              </label>
                            </div>

                            <!-- <div class="btn-group btn-group-toggle btn-group-toggle-radio" data-toggle="buttons">
                              <div class="switch-field">
                                <input type="radio" class="other_tax_type_minus" name="other_tax_type_minus" value="0" checked="">
                                <label for="radio-one"><i class="fa fa-plus"></i></label>
                                <input type="radio" class="other_tax_type_minus" name="other_tax_type_minus" value="1">
                                <label for="radio-two"><i class="fa fa-minus"></i></label>
                              </div>
                            </div>
                            <div class="btn-group btn-group-toggle btn-group-toggle-radio" data-toggle="buttons">
                              <div class="switch-field">
                                <input type="radio" class="other_tax_in_rupee" name="other_tax_in_rupee" value="1" checked="">
                                <label for="rs">RS</label>
                                <input type="radio" class="other_tax_in_rupee" name="other_tax_in_rupee" value="0">
                                <label for="percentage">%</label>
                              </div>
                            </div> -->
                          </td>
                          <td colspan="2">
                            <div class="total-controls">
                              <input type="text" name="other_tax_value" id="other_tax_value" style="width: 92%;text-align:center;"
                                class="form-control" value="">
                                <input type="hidden" name="other_tax_amount" id="other_tax_amount" value="">
                              <label class="label-input " id="other_tax_amount_label" style="width: 92%;text-align:center;" >0</label>
                            </div>
                          </td>
                        </tr>
                        <tr class="other-amount-tr">
                          <td colspan="7" style="text-align:right;">
                            <label class="label-input">Discount:</label>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">

                              <label class="btn btn-light ">
                                <input type="radio" name="total_discount_type_minus"  class="total_discount_type_minus" value="0" > <i class="fa fa-plus"></i>
                              </label>
                              <label class="btn btn-light active">
                                <input type="radio" name="total_discount_type_minus"  class="total_discount_type_minus" autocomplete="off" value="1" checked><i class="fa fa-minus"></i>
                              </label>
                            </div>

                            <div class="btn-group btn-group-toggle" data-toggle="buttons">

                              <label class="btn btn-light active">
                                <input type="radio" name="total_discount_in_rupee"  class="total_discount_in_rupee" value="1" checked> RS</i>
                              </label>
                              <label class="btn btn-light ">
                                <input type="radio" name="total_discount_in_rupee"  class="total_discount_in_rupee" autocomplete="off" value="0" >%</i>
                              </label>
                            </div>


                          </td>
                          <td colspan="2">
                            <div class="total-controls">
                              <input type="text" name="total_discount_value" id="total_discount_value" style="width: 92%;text-align:center;" value=""
                                class="form-control">
                                <input type="hidden" name="total_discount_amount" id="total_discount_amount" value="0">
                              <label class="label-input " id="total_discount_amount_label" style="width: 92%;text-align:center;"></label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="7" style="text-align:right;">
                            Grand Total :
                          </td>
                          <td colspan="2">
                            <div class="total-controls">
                              <input type="hidden" name="grand_total" id="grand_total" value="0">
                              <center><label type="text"  id="grand_total_label"
                                  class="grand_total">0</label>
                              </center>
                            </div>
                          </td>
                        </tr>
                        <!-- <input type="hidden" name="subsidy_amount" id="subsidy_amount" value="">
                        <input type="hidden" name="cus_pay_grandtotal" id="cus_pay_grandtotal" value="0">
                        <input type="hidden" name="currency_cus_pay_grandtotal" id="currency_cus_pay_grandtotal"
                          value=""> -->
                      </tfoot>
                    </table>


                    <div class="col-12 px-0">
                      <ul class="list-group">
                        <li class="list-group-item" id="grandtotalwords">ZERO RUPEES ONLY</li>
                        <input type="hidden" name="hidden_round_off_value" id="hidden_round_off_value" value="">
                        <input type="hidden" name="hidden_grandtotalwords" id="hidden_grandtotalwords" value="">
                      </ul>
                    </div>
                    <div class="form-bottom mt-5">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="" class="control-label">Due Date</label>
                            <div class="controls ">
                              <input type="text" name="due_date" data-value="" data-main-default-due="15" data-default-due="15"  id="datepicker_lr" class="form-control datepicker">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="" class="control-label ">Document Note / Remarks <small class="text-muted">Not
                                Visible on Print</small></label>
                            <div class="controls ">
                              <input name="document_note" id="" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="" class="control-label ">Bank</label>
                            <div class="controls ">
                              <!-- <input name="bank" id="" class="form-control"> -->
                              <select id="bank" name="bank" class="form-control" >
                                <option value="">Select Bank</option>
                                @foreach($banks as $bank)
                                <option value="{{ $bank->id}}">{{ $bank->bank_name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="" class="control-label ">Payment Type</label>
                            <div class="controls ">
                              <!-- <input name="payment_type" id="" class="form-control"> -->
                              <select name="payment" id="payment" class="valid form-control" required="" aria-required="true" aria-invalid="false">
                                <option value="">Select Payment Type</option>
                                <option value="CREDIT" selected="">CREDIT</option>
                                <option value="CASH">CASH</option>
                                <option value="CHECK">CHEQUE</option>
                                <option value="ONLINE">ONLINE</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="" class="control-label ">Payment Note</label>
                            <div class="controls ">
                              <input name="payment_note" id="" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6" id="payment_received_row" style="display: none;">
                          <div class="form-group"  >
                            <label for="check" class="control-label">Payment Received</label>
                            <div class="controls">
                              <input id="payment_received" name="payment_received" class="valid form-control" maxlength="12" aria-invalid="false">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="" class="control-label ">Terms & Condition</label>
                            <div class="controls ">
                              <textarea name="bank_term_condition" id=""
                                class="form-control">Subject to our home Jurisdiction. Our Responsibility Ceases as soon as goods leaves our Premises. Goods once sold will not taken back. Delivery Ex-Premises.</textarea>
                            </div>
                          </div>
                        </div>
                        <!-- <div class="col-md-6 d-flex align-items-end justify-content-end">
                          <a href="#" class="btn btn-light  mr-2"><i class="fa fa-chevron-left"></i>Back</a>
                          <button type="submit" id="" name="" class="btn btn-primary mr-2"><i class="fa fa-save"></i> Save</button>
                          <button id="" name="" value="" class="btn btn-primary"><i class="fa fa-print"></i>Save & Print</button>
                        </div> -->
                      </div>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
</form>
    
    @include('partials.modal.customer')
    

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
    <script src="{{asset('/js/general.js')}}"></script>
    <script src="{{asset('/js/customer.js')}}"></script>
    <script src="{{asset('/js/create_customer.js')}}"></script>
    <script>
      var show_export_fields_for_all = false;
      var SaleInvoiceWithoutPriceChange = '';
      var price_from_last_invoice = false;
      var productAllowed = true;
      var document_item_allowed = 25;
      var default_product_note = "";
      var quantity_decimal_rounding = 100;
      var price_decimal_rounding = 100;
      var gst_decimal_rounding = 100;
      var gst_rate_decimal_rounding = 100;
      var taxable_decimal_rounding = 100;
      var gst_decimal_rounding_by = 2;
      var gst_rate_decimal_rounding_by = 2;
      var quantity_decimal_rounding_by = 2;
      var price_decimal_rounding_by = 2;
      var inventory_enable = true;
      var allow_oversell = false;
      var discount_in = 'percentage';
      var discount_per_item = 0;
      var enable_round_off = 1;

      $(document).ready(function(){



        get_invoice_number();
        $("#customers,#PlaceofSupply,#selecttransport,.select2").select2({
            width: 'resolve'
        });

        $('#customers').on('change',function(){
          var customer = $(this).val();
          var type =  "customer";
          updateAddressData(customer,type);
        });

        $('#selecttransport').on('change',function(){
          var transport = $(this).val();
          // console.log(transport);
          updateTransport(transport);
        })

        $('.btn-add-row').on('click',function(){
          if(validateCurrentRows()){
            clonerow(this);
          }
        });

        $('.btn-remove-row').on('click',function(){
          $(this).parent().closest('.product-item-row').remove();
          UpdateCalculations();
        });

        $(document).on("change", "#invoicetype", function(){
          SetIGTS();
        });

        $(document).on("change", "#reverse_Charge", function(){
          UpdateCalculations();
        });

        $(document).on("change", ".product_id", function(){
          // console.log('product_id');
          var product = $(this).val();
          var current = $(this);
          // console.log(product);
          if(product){
            get_product_by_id(product,current);
          }
        });

        if($("#datepicker_lr").val()=="" && $("#datepicker_lr").attr("data-default-due") !=""){
          var ddd = $("#datepicker_lr").attr("data-default-due");
          $("#datepicker_lr").datepicker("setDate", "+"+ddd);
        }


      });

      $('#add-saleinvoice-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            PlaceofSupply: {
              required:true,
            },
            customer_vendor_id: {
              required:true,
            },
            invoice_number:{
              required:true
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
            error.appendTo(element.closest('.form-group'));
        },
        submitHandler: function(form) {
          if(validateCurrentRows()){
            $('input,select').prop('disabled',false);
            $(form)[0].submit();
          }

        }
    });
    </script>
@endsection
