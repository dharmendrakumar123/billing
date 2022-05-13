@extends('layouts.customer')

@section('content')
<div class="container-fluid">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Transport Charges</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="icon icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#!">Transport Charges</a></li>
                <li class="breadcrumb-item"><a href="#!">Add Transport Charges</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5>Edit Transport Charges</h5>
            </div>
            <div class="card-body">

              <form method="post" action="{{url('/transportcharge/'.$transportcharge->id)}}">
              @csrf
              {{ method_field('PATCH') }}
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Name *</label>
                      <input type="text" placeholder="Enter Transport Name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $transportcharge->name}}" >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Product Note</label>
                      <textarea cols="2" class="form-control" name="product_note" 
                        placeholder="Enter Product Note"> {{ $transportcharge->product_note}}</textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="number" class="form-control" name="sell_price" id="" aria-describedby=""
                        placeholder="Enter Price" value="{{ $transportcharge->sell_price}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Address" class="">HSN/SAC Code</label>
                      <div class="controls">
                        <input type="text"  value="{{ $transportcharge->hsn}}" name="hsn" maxlength="100" id="" class="form-control"
                          placeholder="Enter HSN/SAC Code"  aria-required="true">
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Product Type *</label>
                      <select class="form-control" id="" name="type">
                        <option value="taxable" {{ $transportcharge->id == 'taxable' ? 'selected':'' }}>Taxable</option>
                        <option value="nill_rated" {{ $transportcharge->id =='nill_rated' ? 'selected':'' }}>Nil Rated</option>
                        <option value="exempted" {{ $transportcharge->id == 'exempted' ? 'selected':'' }}>Exempt</option>
                        <option value="non_gst" {{ $transportcharge->id == 'non_gst' ? 'selected':'' }}>Non-GST</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">No-ITC</label>
                      <div class="controls mt-2">
                        <label><input type="checkbox" name="no_itc" value="1" {{ $transportcharge->no_itc == 1 ?'checked':''}} id=""> Is Product ineligible for Input Credit?</label>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">CGST %</label>
                      <div class="controls">
                        <input type="text" id="" value="{{ $transportcharge->cgst}}" class="form-control" name="cgst"
                          placeholder="Enter CGST %" maxlength="50"  aria-required="true">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">SGST %</label>
                      <div class="controls">
                        <input type="text" id="" value="{{ $transportcharge->sgst}}" class="form-control" name="sgst"
                          placeholder="Enter SGST %" maxlength="50"  aria-required="true">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">IGST %</label>
                      <div class="controls">
                        <input type="text" id="" value="{{ $transportcharge->igst}}" class="form-control" name="igst"
                          placeholder="Enter IGST %" maxlength="50"  aria-required="true">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Tra. Charge Enable</label>
                      <div class="controls mt-2">
                        <label><input type="checkbox" name="is_visible_all" value="1" {{ $transportcharge->is_visible_all == 1 ?'checked':''}} id=""> Tranport Charge will be visiable on all document.</label>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-12 form-controls my-3 text-right">
                    <button type="button" class="btn mr-3">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection