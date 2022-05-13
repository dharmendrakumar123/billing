@extends('layouts.customer')

@section('content')
<style>
	div#receipt_datatable_filter {
    display: none;
}
</style>


<div class="top-stickybar">
  <div class="container-fluid">
    <div class="row d-flex justify-content-end align-items-center">
      <div class="col-4 pl-0">
        <h1>Customer / Vendor ListImport Customers</h1>
      </div>
      <div class="col-8 text-right">
        <a href="{{url('/sale-receipt/create')}}" class="btn btn-primary mr-2">Add</a>
        <div class="d-none" id="multiDelete">
          <a href="#" class="btn btn-danger  ml-2 mr-2 ">Delete Inoice</a>
          <a href="#" class="btn btn-primary ml-2 mr-2 ">Print</a>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid">
      <div class="homepage-cards mt-5">
        <div class="row">
         
          <div class="col-md-12">
            <div class="card" style="margin-top: 3%;border-radius: 10px;font-size: 13px;">
              <!--<div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5><i class="icon icon-list mr-2"></i> Customer / Vendor ListImport Customers</h5>
                  </div>
                  <div class="col text-right"><a href="{{url('/sale-receipt/create')}}" class="btn btn-primary mr-3"><i class="icon icon-plus"></i>
                      Add New</a></div>
                </div>
              </div>-->
			  <div class="search-header border-bottom py-4 px-3">
			  <div class="form-group row col-sm-6 mb-0">
				<label for="" class="col-sm-2 col-form-label">Search</label>
				<div class="col-sm-10">
				  <div class="controls">
					<input type="text" id="searchbox" maxlength="150" class="form-control" placeholder="Search Product" aria-required="true">
				  </div>
				</div>
			  </div>
			</div>
			<div class="total-widget py-4">
			  <div class="row mx-0">
				<div class="col-sm-12">
				  <div class="">
					  <h5><i class="fa fa-info-circle"></i> <span>Total Amount</span></h5>
					  <div class="total-counter border-right"><i>Amount</i><br><b> 
						{{$totalsalereceipt}}
					</b></div>
					</div>
				</div>
			  </div>
			</div>
              <div class="card-block">
                <div class="table-responsive">
                <form id="customer-records" action="javascript:;" method="post">
                @csrf
                  <table class="table table-hover" id="receipt_datatable" data-footable="" data-toggle-column="last" style="display: table;">
                    <thead>
                      <tr class="footable-header">
                        <th class="chkbox footable-first-visible">  
                          <input type="checkbox" class="select-all" onclick="selectall();" name="del">
                        </th>
                        <th><a href="#">Receipt No</a></th>
                        <th>Company Name</th>
                        <th><a href="#">Payment Date</a></th>
                        <th><a href="#">Payment Note</a></th>
                        <th><a href="#">Amount</a></th>
                        <th>
                          <a href="javascript:;">Edit</a>
                        </th>
                        <th class="footable-last-visible">
                          Print
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                     @if(count($salereceipt)>0)
                      @foreach($salereceipt as $receipt)
                        <tr>
                          <td class="footable-first-visible">
                              <input type="checkbox" class="single-select" name="id[]" value="{{$receipt->id}}">
                            </td>
                          <td>{{$receipt->receipt_no}}</td>
                          <td>{{$receipt->name}}</td>
                          <td>{{change_date_format($receipt->payment_date,'d M,Y')}}</td>
                          <td>{{ $receipt->payment_note}}</td>
                          <td>{{ $receipt->amount}}</td>
                          <td>
                            <a href="{{url('/sale-receipt/'.$receipt->id.'/edit')}}" class="btn btn-warning">Edit</a>
                          </td>
                          <td class="footable-last-visible">
                          <p><a href="{{url('print-inward')}}?id={{$receipt->id}}" class="btn btn-info print-btn" target="_blank" data-link="{{url('print-inward')}}?id={{$receipt->id}}" data-id="{{$receipt->id}}" >Print</a></p>
                            <!--p><a href="javascript:;" class="btn btn-info">Print</a></p-->
                            <a href="javascript:;" class="btn btn-info" >Share</a><br>
                          </td>
                        </tr>
                      @endforeach
                     @endif
                    </tbody><!-- /tbody -->
                  </table>
                </div>
              </div>
              <div class="card-footer bg-primary">
                <div class="row">
                  <div class="col">
                    <a href="javascript:;" class="btn btn-danger ml-5" id="multiDelete"><i class="icon icon-minus"></i>
                      Delete</a>
                  </div>
                  <div class="col text-right"><a href="{{url('/sale-receipt/create')}}" class="btn btn-light mr-3"><i class="icon icon-plus"></i>
                      Add New</a>
                   </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <script>
		 var product_datatable = $('#receipt_datatable').DataTable();
	
		 $("#searchbox").keyup(function() {
			  filterGlobal();
		  }); 

		  function filterGlobal () {
			  product_datatable.search(
				  $('#searchbox').val(),
			  ).draw();
		  }
	
        $("#receipt_datatable").DataTable();
      
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
                url:base_url+'/salereceipt/multidelete',
                method:'POST',
                data:$('#customer-records').serialize(),
                success:function(data){
                    if (data == '1') {
                        swal.fire({
                            'title': 'Receipt Deleted successfully',
                            'icon': 'success'
                        }).then(function() {
                            document.location.href = base_url+'/sale-receipt';
                        });
                    } else {
                        swal.fire(data);
                    }
                }
            });
        });
        
    </script>
@endsection