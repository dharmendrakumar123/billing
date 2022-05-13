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
                    <h5><i class="icon icon-magnifier mr-2"></i>Search Transport Charges</h5>
                  </div>
                </div>
              </div>
              <div class="card-block">
                <form>
                  <div class="form-row align-items-end">
                    <div class="col-6 pr-3">
                      <label class="" for="">Search By Transport Charges Name :</label>
                      <input type="text" class="form-control mb-2" id="" placeholder="Search By Transport Charges Name">
                    </div>
                    <div class="col-6">
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
                    <h5><i class="icon icon-list mr-2"></i> Transport Charges List</h5>
                  </div>
                  <div class="col text-right"><a href="{{url('/transportcharge/create')}}" class="btn btn-primary mr-3"><i class="icon icon-plus"></i>
                      Add New</a>
                </div>
              </div>
              <div class="card-block">
                <div class="table-responsive">
                <form method="POST" id="frm-example" action="javascript:;">
                @csrf
                  <table class="table table-hover" id="transportcharge-datatable" data-footable="" data-toggle-column="last" style="display: table;">
                    <thead>
                      <tr class="footable-header">
                        <th class="chkbox footable-first-visible">
                          <input type="checkbox" class="select-all" onclick="selectall();" name="del">
                        </th>
                        <th><a href="#">NAME</a></th>
                        <th><a href="#">HSN CODE</a></th>
                        <th><a href="#">PRICE</a></th>
                        <th><a href="#">STATUS</a></th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($transportcharges) > 0)
                        @foreach($transportcharges as $key => $transportcharge)
                      <tr>
                        <td class="footable-first-visible"><input type="checkbox" name="transportcharge_id[]" class="single-select" value="{{$transportcharge->id}}"></td></td>
                        <td>{{$transportcharge->name}}</td>
                        <td>{{$transportcharge->hsn}}</td>
                        <td>{{$transportcharge->sell_price}}</td>
                        <td class="td-actions"><a class="btn btn-outline-success" href="">Active</a></td>
                        <td class="td-actions footable-last-visible">
                          <a href="{{url('/transportcharge/'.$transportcharge->id.'/edit')}}" class="btn btn-outline-primary"><i class="icon icon-pencil"></i>Edit</a>
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
                  <div class="col text-right"><a href="{{url('/transportcharge/create')}}" class="btn btn-light"><i class="icon icon-plus"></i>
                      Add New</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
         $('#transportcharge-datatable').DataTable();
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
                url:base_url+'/transportcharge/multidelete',
                method:'POST',
                data:$('#frm-example').serialize(),
                success:function(data){
                    if (data == '1') {
                        swal.fire({
                            'title': 'Deleted successfully',
                            'icon': 'success'
                        }).then(function() {
                            document.location.href = base_url+'/transportcharge';
                        });
                    } else {
                        swal.fire(data);
                    }
                }
            });
        });
    </script>
@endsection
