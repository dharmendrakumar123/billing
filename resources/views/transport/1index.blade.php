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
                <h5><i class="icon icon-magnifier mr-2"></i> Search Transport</h5>
                </div>
            </div>
            </div>
            <div class="card-block">
            <form>
                <div class="form-row align-items-end">
                <div class="col-auto mr-3">
                    <label class="" for="">Search By Transport Name :</label>
                    <input type="text" class="form-control mb-2" id="" placeholder="Search By Transport Name">
                </div>
                <div class="col-auto mr-3">
                    <label class="" for="">Search By Transport ID :</label>
                    <input type="text" class="form-control mb-2" id="" placeholder="Search By Transport ID">
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
                <h5><i class="icon icon-list mr-2"></i> Transport ListImport Transports</h5>
                </div>
                <div class="col text-right"><a href="{{url('/transports/create/')}}" class="btn btn-primary mr-3"><i class="icon icon-plus"></i>
                    Add New</a>
                <a href="#" class="btn btn-outline-primary"><i class="icon icon-arrow-down-circle"></i>
                    Import Transports</a></div>
            </div>
            </div>
            <div class="card-block">
            <div class="table-responsive">
            <form method="post" id="transport-records">
            @csrf
                <table class="table table-hover" id="transport-datatable" data-footable="" data-toggle-column="last" style="display: table;">
                <thead>
                    <tr class="footable-header">
                    <th class="chkbox footable-first-visible">
                        <input type="checkbox" class="select-all" onclick="selectall(this);" name="del" >
                    </th>
                    <th><a href="#">TRANSPORT NAME</a></th>
                    <th><a href="#">TRANSPORT ID</a></th>
                    <th><a href="#">VEHICLE NO</a></th>
                    <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($transports) > 0)
                        @foreach($transports as $key => $transport)
                    <tr>
                    <td class="footable-first-visible"><input type="checkbox" name="transport_id[]" class="single-select" value="{{$transport->id}}"></td>
                    <td>{{$transport->name}}</td>
                    <td>{{$transport->transport_id}}</td>
                    <td>{{$transport->vehicle_no}}</td>
                    <td class="td-actions footable-last-visible">
                        <a href="{{url('/transports/'.$transport->id.'/edit')}}" class="btn btn-outline-primary"><i class="icon icon-pencil"></i>Edit</a>
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
                <a href="javascript:;" id="multiDelete" class="btn btn-danger ml-5"><i class="icon icon-minus"></i>
                    Delete</a>
                </div>
                <div class="col text-right"><a href="#" class="btn btn-light mr-3"><i class="icon icon-plus"></i>
                    Add New</a>
                <a href="#" class="btn btn-outline-light"><i class="icon icon-arrow-down-circle"></i>
                    Import Transports</a></div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<script>
     $('#transport-datatable').DataTable();
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
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:base_url+'/transport/multidelete',
                        method:'POST',
                        data:$('#transport-records').serialize(),
                        success:function(data){
                            if (data == '1') {
                                swal.fire({
                                    'title': 'Transport Deleted successfully',
                                    'icon': 'success'
                                }).then(function() {
                                    document.location.href = base_url+'/transports';
                                });
                            } else {
                                swal.fire(data);
                            }
                        }
                    });
                }
            })
         
        });
</script>
@endsection
