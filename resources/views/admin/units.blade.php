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
                    <h5><i class="icon icon-list mr-2"></i> Units</h5>
                  </div>
                  <div class="col text-right"><a href="#" class="btn btn-primary mr-3" data-toggle="modal" data-target="#exampleModal"><i class="icon icon-plus"></i>
                      Add New</a>

                </div>
              </div>
              <div class="card-block">
                <div class="table-responsive">
                  <table  id = "units_datatable" class="table table-hover studentTable" data-footable="" data-toggle-column="last" style="display: table;">
                    <thead>
                      <tr class="footable-header">
                        <th class="chkbox footable-first-visible">
                          <input type="checkbox" onclick="selectall();" name="del">
                        </th>
                        <th>Name</th>
                        <th><a href="#">Short Name</a></th>
                        
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
                          <td class="row_sname">{{ $row->short_name }}</td>
                          
                          <td class="td-actions footable-last-visible">
                         
                           <a href="javascript:;" data-id="{{ $row->id }}" class="btn btn-outline-primary btnEdit"><i class="icon icon-pencil"></i>Edit</a>
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
    </div>
  <!-- /.container -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Unit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method ="post"  action="{{ url('admin/storeunit') }}" id="add-unit-form">
        @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="control-label">Name *</label>
                  <div class="controls">
                    <input type="text" value="{{ old('name') }}" name="name" id="" maxlength="150" class="form-control"
                      placeholder="" required="" aria-required="true">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="control-label ">Short Name</label>
                  <div class="controls">
                    <input type="text" value="{{ old('short_name') }}" name="short_name" id="" maxlength="150" class="form-control"
                    placeholder="Enter Short name" required="" aria-required="true">
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
          <h5 class="modal-title" id="exampleModalLabel">Edit Unit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="updateunit" name="updateunit" action="{{ url('admin/updateunit') }}" method="post">
        <input type="hidden" name="id" id="hdunitId"/>
        
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
                  <label for="" class="control-label ">Short Name</label>
                  <div class="controls">
                    <input type="text" value="" name="short_name" id="short_name" maxlength="150" class="form-control"
                    placeholder="Enter Short name" required="" aria-required="true">
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
        $("#units_datatable").DataTable();
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
  <script>
  
   jQuery.validator.addMethod("lettersonly", function(value, element) {
return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Letters only please");

      $('#add-unit-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
              lettersonly:true
            },
            short_name:{
            lettersonly:true
            },
       },
        messages: {
          name: {
              required: 'Please enter Unit name',
              lettersonly:'Name should be only characters'
          },
          short_name:{
            required: 'Please enter Unit short name',
            lettersonly:'You can enter only characters'
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
    
    //When click edit unit
    $('body').on('click', '.btnEdit', function () {
      var unit_id = $(this).attr('data-id');
      $.ajax({
                data: {'_token':csrf_token},
                url: '/admin'+'/getunit/'+ unit_id,
                type: "POST",
                dataType: 'json',
                success: function (data) {
                  console.log(data);
                 
                    $('#updateunit #hdunitId').val(data.id); 
                    $('#updateunit #name').val(data.name);
                    $('#updateunit #short_name').val(data.short_name);
                    $('#exampleModal1').modal('show');
                },
                error: function (data) {
                }
                });
   });
  
  </script>
  <script>
   $('#updateunit').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
              lettersonly:true
            },
            short_name:{
            lettersonly:true
            },
       },
        messages: {
          name: {
              required: 'Please enter Unit name',
              lettersonly:'Name should be only characters'
          },
          short_name:{
            required: 'Please enter Unit short name',
            lettersonly:'You can enter only characters'
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
          var form_action = $("#updateunit").attr("action");
            $.ajax({

            data: $('#updateunit').serialize(),
            url: form_action,
            type: "POST",
            dataType: 'json',
            success: function (data) {
              $('#updatediv_'+data.data.id+' .row_name').html(data.data.name);
              $('#updatediv_'+data.data.id+' .row_sname').html(data.data.short_name);

               $('#exampleModal1').modal('hide');
               toastr.success(data.message);
      
            }
            });

        }
    });
    
    //When click delete unit
    $('body').on('click', '.delete_user', function () {
     
     var un_id = $(this).data("id");
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
              
              url: "/admin"+'/destroy/'+un_id,
              success: function (data) {
          
              $('tr#updatediv_'+un_id).remove();
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
@endsection