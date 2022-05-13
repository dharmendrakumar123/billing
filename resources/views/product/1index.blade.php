@extends('layouts.customer')

@section('content')
<div class="container-fluid">
      <div class="homepage-cards mt-5">
        <div class="row">
          <!-- <div class="col-md-12">
            <div class="card badge-light">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5><i class="icon icon-magnifier mr-2"></i> Search Product</h5>
                  </div>
                </div>
              </div>
              <div class="card-block">
                <form>
                  <div class="form-row align-items-end">
                    <div class="col-auto mr-3">
                      <label class="" for="">Search By Product Name :</label>
                      <input type="text" class="form-control mb-2" id="" placeholder="Product Name ">
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary mb-2"><i class="icon icon-magnifier"></i>
                        Search</button>
                      <strong class="mx-3">or</strong>
                      <a href="#" class="btn btn-primary mb-2"><i class="icon icon-list"></i> Show all Data</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div> -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5><i class="icon icon-list mr-2"></i> Product List</h5>
                  </div>
                  <div class="col text-right"><a href="{{url('/products/create')}}" class="btn btn-primary mr-3"><i class="icon icon-plus"></i>
                      Add New</a>
                    <a href="#" class="btn btn-outline-primary"><i class="icon icon-arrow-down-circle"></i>
                      Bulk Edit Products</a></div>
                  <a href="#" class="btn btn-outline-primary"><i class="icon icon-arrow-down-circle"></i>
                    Import Customers</a>
                </div>
              </div>
              <div class="card-block">
                <div class="table-responsive">
                <form id="frm-example" action="javascript:;" method="POST">
                @csrf
                  <table class="table table-hover" data-footable="" id="product-datatable" data-toggle-column="last" style="display: table;">
                    <thead>
                      <tr class="footable-header">
                        <th class="chkbox footable-first-visible">
                          <input type="checkbox" class="select-all" onclick="selectall();" name="del">
                        </th>
                        <th></th>
                        <th><a href="#">NAME</a></th>
                        <th><a href="#">SELLPRICE</a></th>
                        <th><a href="#">HSN CODE</a></th>
                        <th><a href="#">UOM</a></th>
                        <th><a href="#">CURRENT STOCK</a></th>
                        <th><a href="#">LAST UPDATED</a></th>
                        <th>
                          <a href="#">Status</a>
                        </th>
                        <th class="footable-last-visible">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($products) > 0)
                        @foreach($products as $key => $product)
                        <tr>
                        <td class="footable-first-visible">
                          <input type="checkbox" class="single-select" name="product_id[]" value="{{$product->id}}">
                        </td>
                        <td></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->sell_price}}</td>
                        <td>{{$product->hsn_code}}</td>
                        <td>{{$product->unit}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->updated_at->format('j F, Y')}}</td>
                        <td class="td-actions">
                        <input data-id="{{$product->id}}" class="toggle-class btn btn-outline-success" type="checkbox" 
                        data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                         data-on="Active" data-off="InActive" {{ $product->status=='active' ? 'checked' : '' }}>

                        </td>
                        <td class="td-actions footable-last-visible">
                          <a href="{{url('/products/'.$product->id.'/edit')}}" class="btn btn-outline-primary"><i class="icon icon-pencil"></i>Edit</a>
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
                  <div class="col text-right"><a href="{{url('/products/create')}}" class="btn btn-light mr-3"><i class="icon icon-plus"></i>
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
    </div>
    <script>
    $('#product-datatable').DataTable();
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
                url:base_url+'/product/multidelete',
                method:'POST',
                data:$('#frm-example').serialize(),
                success:function(data){
                    if (data == '1') {
                        swal.fire({
                            'title': 'Product Deleted successfully',
                            'icon': 'success'
                        }).then(function() {
                            document.location.href = base_url+'/products';
                        });
                    } else {
                        swal.fire(data);
                    }
                }
            });
        });

  //     var table = $('#product-datatable').DataTable({
  //       'columnDefs': [
  //        {
  //           'targets': 0,
  //           'checkboxes': {
  //              'selectRow': true
  //           }
  //        }
  //     ],
  //     'select': {
  //        'style': 'multi'
  //     }, order: [[ 1, 'asc' ]]
  //     });

  //     $('#multiDelete').on('click', function(e){
  //     var form = this;
      
  //     var rows_selected = table.column(0).checkboxes.selected();

  //     // Iterate over all selected checkboxes
  //     $.each(rows_selected, function(index, rowId){
  //        // Create a hidden element 
  //        console.log(index,rowId);
  //       //  $(form).append(
  //       //      $('<input>')
  //       //         .attr('type', 'hidden')
  //       //         .attr('name', 'id[]')
  //       //         .val(rowId)
  //       //  );
  //     });

  //     // FOR DEMONSTRATION ONLY
  //     // The code below is not needed in production
      
  //     // Output form data to a console     
      
  //  }); 
    </script>
    <script>
  //change the customer status
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 'active' : 'inactive'; 
          //alert(status);
          var p_id = $(this).data('id'); 
         // alert(user_id);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: base_url+'/changeproductStatus/'+p_id,
              data: {'status': status, 'id': p_id},
              success: function(data){
              //  console.log(data);
                console.log(data.success)
              }
          });
      })
    })
  </script>
@endsection
