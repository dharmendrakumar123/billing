@extends('layouts.admindashboard')

@section('content')

    <div class="container-fluid">
      <div class="homepage-cards mt-5">
        <div class="row">
        
          <div class="col-md-12">
            <div class="card">
             
              <div class="card-block">
                <div class="table-responsive">
                  <table id = "users_datatable" class="table table-hover" data-footable="" data-toggle-column="last" style="display: table;">
                    <thead>
                      <tr class="footable-header">
                        <th class="chkbox footable-first-visible">
                          <input type="checkbox" onclick="selectall();" name="del">
                        </th>
                        <th><a href="#">User Name</a></th>
                        <th>Email</th>
                        <th><a href="#">Phone </a></th>
                        <th>
                          <a href="#">Change Status</a>
                        </th>
                         <!--th>
                          <a href="#">Change Password</a>
                        </th-->
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($data as $row)
                      <tr>
                        <td class="footable-first-visible">
                          <input type="checkbox" name="" value="">
                        </td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td class="td-actions">
                        <input data-id="{{$row->id}}" class="toggle-class" type="checkbox" 
                        data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                         data-on="Active" data-off="InActive" {{ $row->status=='active' ? 'checked' : '' }}>
                          <!--a href="#" class="btn btn-outline-success">{{ $row->status }}</a-->
                         
                        </td>

                        <!--td class="td-actions">
                          <a href="#" class="btn btn-outline-success">Change</a>
                        </td-->
                      </tr>
                      @endforeach
                    </tbody><!-- /tbody -->
                  </table>
                </div>
              </div>
              <!--div class="card-footer bg-primary">
                <div class="row">
                  <div class="col">
                    
                  </div>
                  <div class="col text-right"><a href="#" class="btn btn-light mr-3" data-toggle="modal" data-target="#exampleModal"><i class="icon icon-plus"></i>
                      Add New</a></div>
                </div>
              </div-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container -->
  <script>
      $("#users_datatable").DataTable();
  </script>
  <script>
  //CHANGE THE STATUS OF USER
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 'active' : 'inactive'; 
          //alert(status);
          var user_id = $(this).data('id'); 
         // alert(user_id);
          $.ajax({
              type: "GET",
              dataType: "json",
              //url: '/changeStatus',
              url: "/admin"+'/changeStatus/'+user_id,
              data: {'status': status, 'user_id': user_id},
              success: function(data){
              //  console.log(data);
                console.log(data.success)
              }
          });
      })
    })
  </script>

@endsection