@extends('layouts.admindashboard')

@section('content')

    <div class="container-fluid">
      <div class="homepage-cards mt-5">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5><i class="icon icon-list mr-2"></i> States</h5>
                  </div>
                  <div class="col text-right"><a href="#" class="btn btn-primary mr-3" data-toggle="modal" data-target="#exampleModal"><i class="icon icon-plus"></i>
                      Add New</a>
                </div>
              </div>
              <div class="card-block">
                <div class="table-responsive">
                  <table id ="state_datatable" class="table table-hover" data-footable="" data-toggle-column="last" style="display: table;">
                    <thead>
                      <tr class="footable-header">
                        <th class="chkbox footable-first-visible">
                          <input type="checkbox" onclick="selectall();" name="del">
                        </th>
                        <th>State Name</th>
                        
                        <th><a href="#">State code </a></th>
                        <th>
                          <a href="#">Change Status</a>
                        </th>
                        <th class="footable-last-visible">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $row)
                      <tr id="updatediv_{{ $row->id}}">
                        <td class="footable-first-visible">
                          <input type="checkbox" name="" value="">
                        </td>
                        <td class="row_name">{{ $row->name }}</td>
                        
                        <td class="row_scode">{{ $row->state_code }}</td>

                        <td class="td-actions">
                        <input data-id="{{$row->id}}" class="toggle-class" type="checkbox" 
                        data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                         data-on="Active" data-off="InActive" {{ $row->status=='active' ? 'checked' : '' }}>

                          <!--a href="#" class="btn btn-outline-success">{{ $row->status }}</a-->
                        </td>
                        <td class="td-actions footable-last-visible">
                          <a href="javascript:;"  data-id="{{ $row->id }}"class="btn btn-outline-primary btnEdit"><i class="icon icon-pencil"></i>Edit</a>
                          <a href="javascript:;" data-id="{{ $row->id }}"class="btn btn-outline-danger delete_user"><i class="icon icon-pencil"></i>Delete</a>
                        </td>
                      </tr>
                      @endforeach 
                    </tbody><!-- /tbody -->
                  </table>
                </div>
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add State</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method ="post"  action="{{ url('admin/storestate') }}" id="add-state-form">
        @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="control-label">State name*</label>
                  <div class="controls">
                    <input type="text" value="{{ old('name') }}" name="name" id="" maxlength="150" class="form-control"
                      placeholder="Enter State name" required="" aria-required="true">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="control-label ">State code*</label>
                  <div class="controls">
                    <input type="text" value="{{ old('state_code') }}" name="state_code" id="" maxlength="150" class="form-control"
                    placeholder="Enter State Code" required="" aria-required="true">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary"> Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
   <!-- /.edi div model -->
   <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit State</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="updatestate" name="updatestate" action="{{ url('admin/updatestate') }}" method="post">
        <input type="hidden" name="id" id="hdstateId"/>
        
        @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="control-label">Name *</label>
                  <div class="controls">
                    <input type="text" value="" name="name" id="name" maxlength="150" class="form-control"
                      placeholder="" required="" aria-required="true">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="control-label ">State Code</label>
                  <div class="controls">
                    <input type="text" value="" name="state_code" id="state_code" maxlength="150" class="form-control"
                    placeholder="Enter State code" required="" aria-required="true">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary"> Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

      <script>
        $("#state_datatable").DataTable();
    </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
  <script>
  jQuery.validator.addMethod("lettersonly", function(value, element) {
return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Letters only please");

      $('#add-state-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
              lettersonly:true
            },
            state_code:{
              digits:true
            },
       },
        messages: {
          name: {
              required: 'Please enter State name',
              lettersonly:'Name should be only characters'
          },
          state_code:{
            required: 'Please enter State Code',
            digits:'You can enter only numeric'
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
            error.appendTo(element.closest('.form-group'));
        },
        submitHandler: function(form) {
          $(form)[0].submit();
        }
    });
      //When click edit state
      $('body').on('click', '.btnEdit', function () {
      var state_id = $(this).attr('data-id');
      $.ajax({
                data: {'_token':csrf_token},
                url: '/admin'+'/getstate/'+ state_id,
                type: "POST",
                dataType: 'json',
                success: function (data) {
                  console.log(data);
                 
                    $('#updatestate #hdstateId').val(data.id); 
                    $('#updatestate #name').val(data.name);
                    $('#updatestate #state_code').val(data.state_code);
                    $('#exampleModal1').modal('show');
                },
                error: function (data) {
                }
                });
   });
    </Script>
     <script>
   $('#updatestate').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
              lettersonly:true
            },
            state_code:{
              digits:true
            },
       },
        messages: {
          name: {
              required: 'Please enter state name',
              lettersonly:'Name should be only characters'
          },
          state_code:{
            required: 'Please enter state code',
            digits:'You can enter only numeric'
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
            error.appendTo(element.closest('.form-group'));
        },
        submitHandler: function(form) {
         // $(form)[0].submit();
          var form_action = $("#updatestate").attr("action");
            $.ajax({

            data: $('#updatestate').serialize(),
            url: form_action,
            type: "POST",
            dataType: 'json',
            success: function (data) {
              $('#updatediv_'+data.data.id+' .row_name').html(data.data.name);
              $('#updatediv_'+data.data.id+' .row_scode').html(data.data.state_code);

               $('#exampleModal1').modal('hide');
               toastr.success(data.message);
      
            }
            });

        }
    });
    
    //When click delete state
    $('body').on('click', '.delete_user', function () {
     
     var st_id = $(this).data("id");
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
              type: "GET",
              
              url: "/admin"+'/destroystate/'+st_id,
              success: function (data) {
          
              $('tr#updatediv_'+st_id).remove();
              toastr.success(data.success);
                  //table.draw();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });

        }
})
 });
 </Script>
<script>
  //CHANGE THE STATUS OF state
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 'active' : 'inactive'; 
          //alert(status);
          var st_id = $(this).data('id'); 
         // alert(user_id);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: "/admin"+'/changestateStatus/'+st_id,
              data: {'status': status, 'id': st_id},
              success: function(data){
              //  console.log(data);
                console.log(data.success)
              }
          });
      })
    })
  </script>
@endsection