@extends('layouts.customer')



@section('content')

<style>
.dataTables_filter{
  display: none;
}
</style>

<div class="top-stickybar">
  <div class="container-fluid">
    <div class="row d-flex justify-content-end align-items-center">
      <div class="col-4 pl-0">
        <h1>Products</h1>
      </div>
      <div class="col-8 text-right">
        <a href="#" class="btn btn-primary mr-2" data-toggle="modal" data-target="#addProductModal">Add New Product</a>
        <a href="javascript:;" id="multiDelete" class="btn btn-danger mr-2 d-none">Remove</a>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid main-container">
  <div class="main-form-container">
    <div class="search-header border-bottom py-4 px-3">
      <div class="form-group row col-sm-6 mb-0">
        <label for="" class="col-sm-2 col-form-label">Search</label>
        <div class="col-sm-10">
          <div class="controls">
            <input type="text" id="searchbox"  maxlength="150" class="form-control" placeholder="Search Product"
             aria-required="true">
          </div>
        </div>
      </div>
    </div>
    <div class="total-widget py-4">
      <div class="row mx-0">
        <div class="col-sm-3">
          <div class="">
            <div class="">
              <h5><i class="fa fa-info-circle"></i> <span>Total Products added</span></h5>
              <div class="total-counter"><i>Till Date</i><br><b>{{$product_count}} Products</b></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="record-table custom-data-table">
      <!-- <div class="record-table custom-data-table"> -->
        <form id="frm-example" action="javascript:;" method="POST">
          @csrf
          <table class="table table-hover" data-footable="" id="product-datatable" data-toggle-column="last"
            style="display: table;">
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
                <th><a href="#">PRODUCT IMAGE</a></th>

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
				
				  <td><img src="{{asset('/images')}}/{{$product->product_image}}" width="30%" height="40%"></td>

                <td class="td-actions">

                  <input data-id="{{$product->id}}" class="toggle-class btn btn-outline-success" type="checkbox"
                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                    data-off="InActive" {{ $product->status=='active' ? 'checked' : '' }}>



                </td>

                <td class="td-actions footable-last-visible">

                  <a href="javascript:;" onclick="get_product_by_id('{{$product->id}}')" class="btn btn-outline-primary"><i
                      class="icon icon-pencil"></i>Edit</a>

                </td>

              </tr>

              @endforeach

              @endif

            </tbody><!-- /tbody -->

          </table>

        </form>

      <!-- </div> -->
    </div>
  </div>

</div>
<div class="modal right" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
    <form method="post" action="{{url('/products/')}}" id="add-product-form" enctype="multipart/form-data">
              @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Product</h5>
        <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary"> Save</button>
      </div>

      <div class="modal-body">
			<div class="form-group row">
				<label for="" class="col-sm-3 col-form-label required">Type</label>
				<div class="col-sm-9">
					<div class="custom-control custom-radio custom-control-inline mr-5">
						<input type="radio" id="product_type" name="product_type" class="custom-control-input product_type" value="product" checked>
						<label class="custom-control-label" for="product_type">Product/Goods</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="product_type1" name="product_type" class="custom-control-input product_type" value="service">
						<label class="custom-control-label" for="product_type1">Services</label>
					</div>
				</div>
			</div>
        <div class="form-group row">
			<label for="" class="col-sm-3 col-form-label required">Name</label>
			<div class="col-sm-9">
				<div class="controls">
					<input type="text" name="name" id="name" maxlength="150" class="form-control name" placeholder="Product/item name" required="" aria-required="true">
				</div>
			</div>
        </div>
        <div class="form-group row mb-3">
          <label for="registration_type" class="col-sm-3 col-form-label">Measurment Unit</label>
          <div class="col-sm-9">
            <div class="controls">
              <select name="unit" id="unit" class="custom-select unit">
                <option value="">Select unit</option>
                @if(array(count($units)>0))
                  @foreach($units as $unit)
                    <option value="{{$unit->short_name}}">{{$unit->name}} </option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label">Category</label>
          <div class="col-sm-9">
            <div class="controls">
              <select name="category" id="category" class="custom-select category">
                <option value="taxable">Taxable</option>
                <option value="exempted">Exempted</option>
                <option value="non_gst">Non GST</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label required">Sell Price</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="text" class="form-control sell_price" name="sell_price" aria-label="Text input with dropdown button">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary dropdown-toggle sell-dropdown" type="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Including Tax</button>
                <div class="dropdown-menu sell-dropdown-option">
                <a class="dropdown-item" href="#">Including Tax</a>
                <a class="dropdown-item" href="#">Excluding Tax</a>
                </div>
              </div>
            </div>
            <input type="hidden" class="sell_price_tax" name="sell_price_tax" value="0">
            <!-- <p id="sell_price_tax_label" class="sell_price_tax_label" ></p> -->
            <input type="hidden" class="sell_price_original" name="sell_price_original" value="0">
            <!-- <p  class="sell_price_tax_label" ></p> -->
            <div class="sell_price_container ">
                <p class="d-none sell_price_label">Sell Price :<span> </span> </p>
                <p class="d-none sell_price_tax_label">Sell Price with tax :<span> </span> </p>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label">Purchase Price</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="text" name="purchase_price" class="form-control purchase_price" aria-label="Text input with dropdown button">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary dropdown-toggle purchase-dropdown" type="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Including Tax</button>
                <div class="dropdown-menu purchase-dropdown-option">
                  <a class="dropdown-item" href="#">Including Tax</a>
                  <a class="dropdown-item" href="#">Excluding Tax</a>
                </div>
              </div>

            </div>
            <input type="hidden" class="purchase_price_tax" name="purchase_price_tax" value="0">
            <!-- <p id="purchase_price_tax_label" class="purchase_price_tax_label" ></p> -->
            <input type="hidden" class="purchase_price_original" name="purchase_price_original" value="0">
            <!-- <p  class="sell_price_tax_label" ></p> -->
            <div class="purchase_price_container ">
                <p class="d-none purchase_price_label">Purchase Price :<span> </span> </p>
                <p class="d-none purchase_price_tax_label">Purchase Price with tax :<span> </span> </p>
            </div>
          </div>
        </div>
        <div class="form-group row mb-4">
          <label for="registration_type" class="col-sm-3 col-form-label">GST Rate</label>
          <div class="col-sm-9">
            <div class="controls">
              <select name="gst_rate" id="gst_rate" class="custom-select gst_rate">
                <option value="">Select applicable GST rate</option>
                @if(array(count($gstrate)>0))
                  @foreach($gstrate as $gst)
                    <option value="{{$gst->value}}">{{$gst->name}} </option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">HSN Code</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text" name="hsn_code" id="hsn_code" maxlength="150" class="form-control hsn_code"
                placeholder="HSN Code of an item" aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Item Code</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text" name="item_code" id="item_code"  maxlength="150" class="form-control item_code"
                placeholder="Item Code if you are using any"  aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Opening Stock</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text" name="stock" id="stock" maxlength="150" class="form-control stock"
                placeholder="Stock in numbers"  aria-required="true">
            </div>
          </div>
        </div>
		<div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Select product image</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="file" name="product_image" id="product_image" maxlength="150" class="form-control" aria-required="true">
            </div>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal right" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
    <form method="post" action="javascript:;" id="update-product-form" 
	="multipart/form-data">
              @csrf
              {{ method_field('PATCH') }}
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalTitle">Update Product</h5>
        <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary"> Update</button>
      </div>
      <input type="hidden" name="product_id" class="product_id">
      <div class="modal-body">
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Type</label>
          <div class="col-sm-9">
            <div class="custom-control custom-radio custom-control-inline mr-5">
              <input type="radio" id="edit_product_type" name="product_type" class="custom-control-input product_type" value="product" checked>
              <label class="custom-control-label" for="edit_product_type">Product/Goods</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="edit_product_type1" name="product_type" class="custom-control-input product_type" value="service"
                >
              <label class="custom-control-label" for="edit_product_type1">Services</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Name</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text" name="name"  maxlength="150" class="form-control name"
                placeholder="Product/item name" required="" aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="registration_type" class="col-sm-3 col-form-label">Measurment Unit</label>
          <div class="col-sm-9">
            <div class="controls">
              <select name="unit"  class="custom-select unit">
                <option value="">Select unit</option>
                @if(array(count($units)>0))
                  @foreach($units as $unit)
                    <option value="{{$unit->short_name}}">{{$unit->name}} </option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label">Category</label>
          <div class="col-sm-9">
            <div class="controls">
              <select name="category" class="custom-select category">
                <option value="taxable">Taxable</option>
                <option value="exempted">Exempted</option>
                <option value="non_gst">Non GST</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label required">Sell Price</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="text" class="form-control sell_price" name="sell_price" aria-label="Text input with dropdown button">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary dropdown-toggle sell-dropdown" type="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Excluding Tax</button>
                <div class="dropdown-menu sell-dropdown-option">
                <a class="dropdown-item" href="#">Including Tax</a>
                <a class="dropdown-item" href="#">Excluding Tax</a>
                </div>
              </div>
            </div>
            <input type="hidden" class="sell_price_tax" name="sell_price_tax" value="0">
            <input type="hidden" class="sell_price_original" name="sell_price_original" value="0">
            <!-- <p  class="sell_price_tax_label" ></p> -->
            <div class="sell_price_container ">
                <p class="d-none sell_price_label">Sell Price :<span> </span> </p>
                <p class="d-none sell_price_tax_label">Sell Price with tax :<span> </span> </p>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label">Purchase Price</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="text" name="purchase_price" class="form-control purchase_price" aria-label="Text input with dropdown button">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary dropdown-toggle purchase-dropdown" type="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Excluding Tax</button>
                <div class="dropdown-menu purchase-dropdown-option">
                  <a class="dropdown-item" href="#">Including Tax</a>
                  <a class="dropdown-item" href="#">Excluding Tax</a>
                </div>
              </div>

            </div>
            <input type="hidden" class="purchase_price_tax" name="purchase_price_tax" value="0">
            <!-- <p  class="purchase_price_tax_label" ></p> -->
            <input type="hidden" class="purchase_price_original" name="purchase_price_original" value="0">
            <!-- <p  class="sell_price_tax_label" ></p> -->
            <div class="purchase_price_container ">
                <p class="d-none purchase_price_label">Purchase Price :<span> </span> </p>
                <p class="d-none purchase_price_tax_label">Purchase Price with tax :<span> </span> </p>
            </div>

          </div>
        </div>
        <div class="form-group row mb-4">
          <label for="registration_type" class="col-sm-3 col-form-label">GST Rate</label>
          <div class="col-sm-9">
            <div class="controls">
              <select name="gst_rate"  class="custom-select gst_rate">
                <option value="">Select applicable GST rate</option>
                @if(array(count($gstrate)>0))
                  @foreach($gstrate as $gst)
                    <option value="{{$gst->value}}">{{$gst->name}} </option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">HSN Code</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text" name="hsn_code"  maxlength="150" class="form-control hsn_code"
                placeholder="HSN Code of an item" aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Item Code</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text" name="item_code"   maxlength="150" class="form-control item_code"
                placeholder="Item Code if you are using any"  aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Opening Stock</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text" name="stock"  maxlength="150" class="form-control stock"
                placeholder="Stock in numbers"  aria-required="true">
            </div>
          </div>
        </div>
		<div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Product image</label>
          <div class="col-sm-9">
            <div class="controls">
              <!--<input type="text" name="product_image_input" id="product_image_input"  maxlength="150" class="form-control product_image" aria-required="true">-->
			  <input type="file" name="product_image" id="product_image" maxlength="150" class="form-control" aria-required="true">
            </div>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script src="{{asset('js/general.js')}}"></script>

<script>
  var gst_rate;
  $('#add-product-form .category,#add-product-form .sell_price,#add-product-form .purchase_price, #add-product-form .gst_rate').on('keyup change blur',function(){
    var selector = "#add-product-form";
    product_calculation(selector);
  });

  $('#update-product-form .category,#update-product-form .sell_price,#update-product-form .purchase_price, #update-product-form .gst_rate').on('keyup change blur',function(){
    var selector = "#update-product-form";
    product_calculation(selector);
  });

  // $('#update-product-form .sell-dropdown').on('change click blur ',function(){
  //   console.log($(this).html());
  // });

  $('#update-product-form .sell-dropdown-option a').on('click', function(){
    
      $('#update-product-form .sell-dropdown').html($(this).html());
      var selector = "#update-product-form";
      product_calculation(selector);
  });

  $('#update-product-form .purchase-dropdown-option a').on('click', function(){
    
      $('#update-product-form .purchase-dropdown').html($(this).html());
      var selector = "#update-product-form";
      product_calculation(selector);
  });


  $('#add-product-form .sell-dropdown-option a').on('click', function(){
    console.log($(this).html());
      $('#add-product-form .sell-dropdown').html($(this).html());
      var selector = "#add-product-form";
      product_calculation(selector);
  });

  $('#add-product-form .purchase-dropdown-option a').on('click', function(){
    
      $('#add-product-form .purchase-dropdown').html($(this).html());
      var selector = "#add-product-form";
      product_calculation(selector);
  });



  var product_datatable = $('#product-datatable').DataTable();

  $("#searchbox").keyup(function() {
      filterGlobal();
  }); 

  function filterGlobal () {
      product_datatable.search(
          $('#searchbox').val(),
      ).draw();
  }

  function selectall(event) {
    var ischecked = $('.select-all').is(':checked');
    if (ischecked == true) {
      $('.single-select').prop('checked', 'checked');
      $('#multiDelete').removeClass('d-none');
    } else {
      $('.single-select').prop('checked', false);
      $('#multiDelete').addClass('d-none');
    }

  }



  $('.single-select').on('click', function () {
    var totalCheckboxes = $('.single-select').length;
    var numberOfChecked = $('.single-select:checked').length;
    if (numberOfChecked < totalCheckboxes) {
      $('.select-all').prop('checked', false);
    } else {
      $('.select-all').prop('checked', true);
    }

    if(numberOfChecked > 0){
      $('#multiDelete').removeClass('d-none');
    }else{
      $('#multiDelete').addClass('d-none');
    }
  });



  $('#multiDelete').on('click', function (e) {
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
                    url: base_url + '/product/multidelete',
                    method: 'POST',
                    data: $('#frm-example').serialize(),
                    success: function (data) {
                      if (data == '1') {
                        swal.fire({
                          'title': 'Product Deleted successfully',
                          'icon': 'success'
                        }).then(function () {
                          document.location.href = base_url + '/products';
                        });
                      } else {
                        swal.fire(data);
                      }
                    }
                  });
                }
            })  
  });



  //change the customer status

  $(function () {
    $('.toggle-class').change(function () {
      var status = $(this).prop('checked') == true ? 'active' : 'inactive';
      var p_id = $(this).data('id');
      $.ajax({
        type: "GET",
        dataType: "json",
        url: base_url + '/changeproductStatus/' + p_id,
        data: { 'status': status, 'id': p_id },
        success: function (data) {
          if(data.status == 1){
            toastr.success(data.message);
          }else{
            toastr.warning(data.message);
          }
        }
      });

    })

  })


  $('#add-product-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
            },
            sell_price:{
              required:true
            }
        },
        messages: {
          name: {
              required: 'Please enter name',
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
            error.appendTo(element.closest('.form-group .col-sm-9'));
        },
        submitHandler: function(form) {
           form.submit();
        }
    });

    //edit the product data


    function get_product_by_id(product_id){
      $.ajax({
        type: "GET",
        url: base_url+'/productlist',
        ContentType : 'application/json',
        dataType: 'json',
        data: {id:product_id},
        success: function(response){
            console.log(response);
            if(response.status == 1){
              var customer_data = response.data[0];
              var form_selector = '#update-product-form';
              $(form_selector + ' .category').val(customer_data.category);
              $(form_selector + ' .name').val(customer_data.name);
              $(form_selector + ' .unit').val(customer_data.unit);
              $(form_selector + ' .sell_price').val(customer_data.sell_price);
              $(form_selector + ' .sell_price_original').val(customer_data.sell_price);
              $(form_selector + ' .sell_price_tax').val(customer_data.sell_price_with_tax);
              $(form_selector + ' .sell_price_label').removeClass('d-none');
              $(form_selector + ' .sell_price_label').children('span').html(customer_data.sell_price);
              $(form_selector + ' .sell_price_tax_label').removeClass('d-none');
              $(form_selector + ' .sell_price_tax_label').children('span').html(customer_data.sell_price_with_tax);
              $(form_selector + ' .purchase_price').val(customer_data.purchase_price);
              $(form_selector + ' .purchase_price_original').val(customer_data.purchase_price);
              $(form_selector + ' .purchase_price_tax').val(customer_data.purchase_price_with_tax);
              $(form_selector + ' .purchase_price_label').removeClass('d-none');
              $(form_selector + ' .purchase_price_label').children('span').html(customer_data.purchase_price);
              $(form_selector + ' .purchase_price_tax_label').removeClass('d-none');
              $(form_selector + ' .purchase_price_tax_label').children('span').html(customer_data.purchase_price_with_tax);
              $(form_selector + ' .gst_rate').val(customer_data.gst_rate);
              $(form_selector + ' .hsn_code').val(customer_data.hsn_code);
              $(form_selector + ' .item_code').val(customer_data.item_code);
              $(form_selector + ' .stock').val(customer_data.stock);
              $(form_selector + ' .product_id').val(customer_data.id);
              
              // if(customer_data.)
              // $(form_selector + ' .product_type').val(customer_data.product_type);
              $(form_selector + " input[name='product_type'][value='" + customer_data.product_type + "']").prop('checked', true);

              $('#editProductModal').modal('show');
            }else{
              toastr.warning(response.message);
            }
        },
        error: function(data){
        },
        complete: function(data){
        }
      });
    }

    $('#update-product-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
            },
            sell_price:{
              required:true
            }
        },
        messages: {
          name: {
              required: 'Please enter name',
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
            error.appendTo(element.closest('.form-group .col-sm-9'));
        },
        submitHandler: function(form) {
		    var product_id = $('#update-product-form .product_id').val(); 
			
			//var file_data = $("#product_image").prop("files")[0];   
			//var formData = new FormData(this);
			var formData = new FormData($(form));
			//var formData = $('#update-product-form').serialize();
			//formData.append("file", file_data);
			//console.log(formData);
			//console.log();
			$.ajax({  
				type: "POST",  
				url: base_url+'/products/'+product_id,  
				ContentType : 'application/json',
				dataType: 'json',
				enctype: 'multipart/form-data',
				data: $('#update-product-form').serialize(),
				//data: formData,
				success: function(response){
					console.log(response);
				  if(response.status == 1){
					toastr.success(response.message);
					document.location.href = base_url + '/products';
				  }else{
					toastr.warning(response.message);
				  }  
				}
		    }); 
        },
    });

</script>

@endsection
