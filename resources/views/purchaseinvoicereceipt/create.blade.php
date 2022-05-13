@extends('layouts.customer')

@section('content')
<div class="container-fluid">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Payment Receipt</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#!">Payment Receipt</a></li>
                <li class="breadcrumb-item"><a href="#!">Add Payment Receipt</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5>Add Payment Receipt</h5>
            </div>
            <div class="card-body">

              <form action="{{url('purchase-receipt')}}" method="post" id="add-receipt-form">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Receipt Number</label>
                      <input type="text" class="form-control" name="receipt_no" id="receiptno" aria-describedby=""
                        placeholder="Enter your receipt no">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Company Name</label>
                      <select class="form-control select2" id="customer_vendor_id" name="customer_vendor_id">
                        <option value="" selected disabled>Select Company Name</option>
                        @foreach($customers as $customer)
                          <option value="{{ $customer->id}}">{{ $customer->name}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Pan Card" class="">Address</label>
                      <div class="controls">
                        <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address"
                          maxlength="50">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="GST No" class="">GSTIN / PAN</label>
                      <div class="controls">
                        <input type="hidden" name="gstin_pan" id="txt" class="form-control"
                          placeholder="Enter GSTIN / PAN" maxlength="50">
                          <p class="gstin_pan_label">N/A</p>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="GST No" class="">Payment Date</label>
                      <div class="controls">
                        <input type="text" class="form-control mb-2 datepicker" name="payment_date">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <label for="" class="">Payment option</label>
                    <div class="form-group mt-2">
                      <div class="radio d-inline mr-4">
                        <input type="radio" name="payment_option" value="1" class="payment_option" id="radio-in-1" checked="">
                        <label for="radio-in-1" class="cr">On Account</label>
                      </div>
                      <div class="radio d-inline">
                        <input type="radio" name="payment_option" class="payment_option" id="radio-in-2" value="2">
                        <label for="radio-in-2" class="cr">On Invoice</label>
                      </div>
                    </div>
                  </div>               
                  <div class="col-md-12 invoice-move d-none">
                    <label>Choose Invoice No. <small class="text-muted">Note: (Inv No.) - Remaining Amount</small></label>
                    <div class="row">
                      <div class="subject-info-box-1 col-md-5">
                        <label>Deselect Invoice No.</label>
                        <select multiple class="form-control" id="lstBox1">
                          
                        </select>
                      </div>
              
                      <div class="subject-info-arrows text-center d-flex col-md-2 justify-content-center mt-2">
                        <input type='button' id='btnRight' value='>' class="btn btn-primary mb-2" />
                        <input type='button' id='btnLeft' value='<' class="btn btn-danger" />
                      </div>
              
                      <div class="subject-info-box-2 col-md-5">
                        <label>Select Invoice No.</label>
                        <select multiple class="form-control" name="invoice_no[]" id="lstBox2">
                        </select>
                      </div>
                      <!-- <input type="hidden" name="invoice_amount[]" class="invoice_amount"> -->
                      <div class="clearfix"></div>
                    </div>
                  </div>
                    <br>
                    <div class="clearfix"></div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="" class="">Payment Type</label>
                      <div class="controls">
                        <select name="payment_type" class="form-control" id="payment_type" required="" aria-required="true">
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                            <option value="online_transfer">Online/Transfer</option>
                            <option value="bank_transfer">Bank/Transfer</option>
                            <option value="cash-tds">TDS</option>
                            <option value="cash-bad-debts-kasar">Bad Debts / Kasar</option>
                            <option value="currency-exchange-loss">Currency Exchange Loss</option>
                        </select>
                      </div>
                    </div>

                  </div>
                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="" class="">Amount</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="amount" placeholder="Enter Amount"
                          maxlength="50" required="" aria-required="true">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="" class="">Payment Note</label>
                      <div class="controls">
                        <input type="text"  name="payment_note" id="" class="form-control" placeholder="Enter Payment Note "
                          maxlength="50">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 form-controls my-3 text-right">
                    <button type="button" class="btn mr-3">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.selectlistactions.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/invoice-receipt.js')}}"></script>
    
    <script>
        get_receipt_number();
        $(".select2").select2({
            width: 'resolve'
        });

        $('#customer_vendor_id').on('change',function(){
          var customer = $(this).val();
          var type =  "vendor";
          var invoiceType = 'purchase'
          get_customer_detail(customer,type);
          get_invoice_list(customer,invoiceType);
        });

        $('.payment_option').on('change',function(){ 
          var option =$(this).val();
          if(option == 2){
            $('.invoice-move').removeClass('d-none');
          }else{
            $('.invoice-move').addClass('d-none');
          } 
        });

      $('#add-receipt-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            customer_vendor_id: {
              required:true,
            },
            amount:{
              required:true,
              digits:true
            },
            payment_date:{
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
          var invoice_array = [];
            $('#lstBox2 option').each(function(key){
              var invoice_amount = $(this).data('amount'); 
              console.log(invoice_amount);
              $(form).append('<input type="hidden" name="invoice_amount[]" value="'+invoice_amount+'" />');
            });
            $('#lstBox2 option').attr('selected',true);
            $(form)[0].submit();
        }
    });
    </script>
@endsection
