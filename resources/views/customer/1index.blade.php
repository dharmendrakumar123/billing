@extends('layouts.customer')

@section('content')

<div class="container-fluid">
      <div class="homepage-cards mt-5">
        <div class="row">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5><i class="icon icon-list mr-2"></i> Customer / Vendor ListImport Customers</h5>
                  </div>
                  <div class="col text-right"><a href="{{url('/customers/create')}}" class="btn btn-primary mr-3"><i class="icon icon-plus"></i>
                      Add New</a>
                    <a href="#" class="btn btn-outline-primary"><i class="icon icon-arrow-down-circle"></i>
                      Import Customers</a></div>
                </div>
              </div>
              <div class="card-block">
                <div class="table-responsive">
                <form id="customer-records" action="javascript:;" method="post">
                @csrf
                  <table class="table table-hover" id="customer_datatable" data-footable="" data-toggle-column="last" style="display: table;">
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
                        data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                         data-on="Active" data-off="InActive" {{ $customer->status=='active' ? 'checked' : '' }}>

                          <!--a href="#" class="btn btn-outline-success">{{ $customer->status }}</a-->
                        </td>
                            <td class="td-actions footable-last-visible">
                              <a href="{{url('/customers/'.$customer->id.'/edit')}}" class="btn btn-outline-primary"><i class="icon icon-pencil"></i>Edit</a>
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
                  <div class="col text-right"><a href="#" class="btn btn-light mr-3"><i class="icon icon-plus"></i>
                      Add New</a>
                    <a href="#" class="btn btn-outline-light"><i class="icon icon-arrow-down-circle"></i>
                      Import Customers</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
    $("#customer_datatable").DataTable();

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
                url:base_url+'/customer/multidelete',
                method:'POST',
                data:$('#customer-records').serialize(),
                success:function(data){
                    if (data == '1') {
                        swal.fire({
                            'title': 'Cutsomer Deleted successfully',
                            'icon': 'success'
                        }).then(function() {
                            document.location.href = base_url+'/customers';
                        });
                    } else {
                        swal.fire(data);
                    }
                }
            });
        });

    </script>
    <script>
  //change the customer status
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 'active' : 'inactive';
          //alert(status);
          var c_id = $(this).data('id');
         // alert(user_id);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: base_url+'/changecustomerStatus/'+c_id,
              data: {'status': status, 'id': c_id},
              success: function(data){
              //  console.log(data);
                console.log(data.success)
              }
          });
      })
    })
  </script>
@endsection
