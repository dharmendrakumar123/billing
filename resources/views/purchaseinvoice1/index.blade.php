@extends('layouts.customer')

@section('content')
<div class="container-fluid">
      <div class="homepage-cards mt-5">
        <div class="row">
        <!-- -->
        <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5><i class="icon icon-magnifier mr-2"></i> Invoice Summary</h5>
                  </div>
                </div>
              </div>
              <div class="card-block">
                <form>
                  <div class="form-row align-items-end">
                    <div class="col-md-2 ">
                      <label class="" for="">Total Transaction</label>
                      <h5 class="total-transaction">{{$total->total_transaction}}</h3>
                    </div>
                    <div class="col-md-2 ">
                      <label class="" for="">Total CGST</label>
                      <h5 class="total-cgst">Rs. {{$total->total_cgst}}</h3>
                    </div>
                    <div class="col-md-2 ">
                      <label class="" for="">Total SGST</label>
                      <h5 class="total-sgst">Rs. {{$total->total_sgst}}</h3>
                    </div>
                    <div class="col-md-2 ">
                      <label class="" for="">Total IGST</label>
                      <h5 class="total-igst">Rs. {{$total->total_igst}}</h3>
                    </div>
                    <div class="col-md-2 ">
                      <label class="" for="">Total Taxable</label>
                      <h5 class="total-taxable">Rs. {{$total->total_taxable}}</h3>
                    </div>
                    <div class="col-md-2 ">
                      <label class="" for="">Total Value</label>
                      <h5 class="total-value">Rs. {{$total->total_value}}</h3>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Listing -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5><i class="icon icon-list mr-2"></i> Invoice List</h5>
                  </div>
                  <div class="col text-right"><a href="{{route('purchase-invoice.create')}}" class="btn btn-primary mr-3"><i class="icon icon-plus"></i>
                      Add New</a>
                </div>
              </div>
              <div class="card-block">
                <div class="table-responsive">
                <form id="frm-example" action="javascript:;" method="POST">
                @csrf
                  <table class="table table-border table-hover" data-footable="" id="purchase-invoice-datatable" data-toggle-column="last" style="display: table;">
                    <thead>
                      <tr class="footable-header">
                        <th class="chkbox footable-first-visible">
                          <input type="checkbox" class="select-all" onclick="selectall();" name="del">
                        </th>
                        <th>Invoice No.</th>
                        <th><a href="javascript:;">Company Name</a></th>
                        <th><a href="javascript:;">Date</a></th>
                        <th><a href="javascript:;">Total</a></th>
                        <th><a href="javascript:;">Remaining Amount</a></th>
                        <th><a href="javascript:;">Payment Type</a></th>
                        <th><a href="javascript:;">Edit</a></th>
                        <th>
                          <a href="javascript:;">Print</a>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($invoices) > 0)
                      @foreach($invoices as $key => $invoice)
                        <tr>
                        <td class="footable-first-visible">
                              <input type="checkbox" class="single-select" name="invoice_id[]" value="{{$invoice->id}}">
                            </td>
                          <td>{{$invoice->invoice_number}}</td>
                          <td>{{$invoice->customer_name}}</td>
                          <td>{{$invoice->bill_date}}</td>
                          <td>{{$invoice->grand_total}}</td>
                          <td>{{ number_format($invoice->grand_total - $invoice->payment_received, 2, '.','') }}</td>
                          <td>{{ $invoice->payment_type }}</td>
                          <td><a href="{{url('/purchase-invoice/'.$invoice->id.'/edit')}}" class="btn btn-outline-primary"><i class="icon icon-pencil"></i>Edit</a></td>
                          
                          <td>
                            <!--p><a href="javascript:;" class="btn btn-info">Print</a></p-->
                            <p><a href="{{url('print-invoice-purchase')}}?id={{$invoice->id}}" class="btn btn-info print-btn" target="_blank" data-link="{{url('print-invoice')}}?id={{$invoice->id}}" data-id="{{$invoice->id}}" >Print</a></p>
                            <a href="javascript:;" class="btn btn-info" >Share</a><br>
                          </td>
                        </tr>
                      @endforeach
                    @endif
                    </tbody><!-- /tbody -->
                  </table>
                </form>
                </div>
              </div>
              <div class="card-footer bg-primary">
                <div class="row">
                  <div class="col">
                    <a href="javascript:;" class="btn btn-danger ml-5" id="multiDelete"><i class="icon icon-minus"></i>
                      Delete</a>
                  </div>
                  <div class="col text-right"><a href="{{route('purchase-invoice.create')}}" class="btn btn-light mr-3"><i class="icon icon-plus"></i>
                      Add New</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <script>
    $('#purchase-invoice-datatable').DataTable();
    // function selectall(){
    //   $('.single-select').prop('checked', 'checked');
    // }
    function selectall(event){
        var ischecked = $('.select-all').is(':checked'); 
        if(ischecked == true){
            $('.single-select').prop('checked', 'checked');
        }else{
            $('.single-select').prop('checked', false);
        }
    }

    $('.single-select').on('click',function(){
        var totalCheckboxes = $('.single-select').length;
        var numberOfChecked = $('.single-select:checked').length;
        if(numberOfChecked < totalCheckboxes){
            $('.select-all').prop('checked',false);
        }else{
            $('.select-all').prop('checked',true);
        }
    });

        $('#multiDelete').on('click', function(e){
          $.ajax({
                url:base_url+'/saleinvoice/multidelete',
                method:'POST',
                data:$('#frm-example').serialize(),
                success:function(data){
                    if (data == '1') {
                        swal.fire({
                            'title': 'Invoice Deleted successfully',
                            'icon': 'success'
                        }).then(function() {
                            document.location.href = base_url+'/purchase-invoice';
                        });
                    } else {
                        swal.fire(data);
                    }
                }
            });
        });

    </script>
@endsection
