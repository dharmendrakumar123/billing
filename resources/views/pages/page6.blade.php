@extends('layouts.customer')



@section('content')
<form action="{{url('/sale-invoice')}}" method="post" id="add-saleinvoice-form">
    <div class="top-stickybar">
        <div class="container-fluid">
            <div class="row d-flex justify-content-end align-items-center">
                <div class="col-4 pl-0">
                    <h1>General Settings</h1>
                </div>
                <div class="col-8 text-right">
                    <a href="#" class="btn btn-light mr-2">Cancel</a>
                    <button id="" name="" value="" class="btn btn-secondary disabled" disabled>Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid main-container">
        <div class="main-form-container">
            <div class="row mx-0">
                <div class="col-8 py-3">
                    <h5 class="form-heading mb-4">Invoice</h5>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Enable rounding</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="customRadioInline"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline1">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="customRadioInline"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Due Date</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline3" name="customRadioInline1"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline3">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline4" name="customRadioInline1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline4">Hide</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Challan Date & no.</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline6" name="customRadioInline2"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline5">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline6" name="customRadioInline2"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline6">Hide</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">E-Way no.</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline7" name="customRadioInline3"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline7">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline8" name="customRadioInline3"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline8">Hide</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Transport</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline9" name="customRadioInline4"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline9">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline10" name="customRadioInline4"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline10">Hide</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="" class="col-sm-3 col-form-label">Discount box</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline11" name="customRadioInline5"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline11">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline12" name="customRadioInline5"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline12">Hide</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">PAN no.</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline13" name="customRadioInline6"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline13">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline14" name="customRadioInline6"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline14">Hide</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="" class="col-sm-3 col-form-label">Price from last Invoice</label>
                        <div class="col-sm-3">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline13" name="customRadioInline6"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline13">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline14" name="customRadioInline6"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline14">Hide</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="alert alert-warning mt-0" role="alert">
                                Show product price from last invoice of same customer.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="" class="col-sm-3 col-form-label">Allow oversell</label>
                        <div class="col-sm-3">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline13" name="customRadioInline6"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline13">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline14" name="customRadioInline6"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline14">Hide</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="alert alert-warning mt-0" role="alert">
                                Selecting "No" will not allow to generate invoice if product goes out of stock.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="" class="col-sm-3 col-form-label">Default first page</label>
                        <div class="col-sm-3">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline13" name="customRadioInline6"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline13">New Invoice</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline14" name="customRadioInline6"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline14">Analytics</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="alert alert-warning mt-0" role="alert">
                                Select what page you want to open each time after login.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <hr />
            <div class="setting-tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item ml-3" role="presentation">
                        <a class="nav-link active" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab"
                            aria-controls="invoice" aria-selected="true">Invoice</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dc-tab" data-toggle="tab" href="#dc" role="tab" aria-controls="dc"
                            aria-selected="false">Delivery challan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="quotation-tab" data-toggle="tab" href="#quotation" role="tab"
                            aria-controls="quotation" aria-selected="false">Quotation</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pi-tab" data-toggle="tab" href="#pi" role="tab" aria-controls="pi"
                            aria-selected="false">Proforma Invoice</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="po-tab" data-toggle="tab" href="#po" role="tab" aria-controls="po"
                            aria-selected="false">Purchase Order</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dn-tab" data-toggle="tab" href="#dn" role="tab" aria-controls="dn"
                            aria-selected="false">Debit Note</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="cn-tab" data-toggle="tab" href="#cn" role="tab" aria-controls="cn"
                            aria-selected="false">Credit Note</a>
                    </li>
                </ul>
                <div class="tab-content bg-grey" id="myTabContent">
                    <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                        <div class="row mx-0">
                            <div class="col-11 py-3">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">P.O no.</label>
                                    <div class="col-sm-9">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline20" name="customRadioInline11"
                                                class="custom-control-input" checked>
                                            <label class="custom-control-label" for="customRadioInline20">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline21" name="customRadioInline11"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline21">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">L.R no.</label>
                                    <div class="col-sm-9">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline20" name="customRadioInline11"
                                                class="custom-control-input" checked>
                                            <label class="custom-control-label" for="customRadioInline20">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline21" name="customRadioInline11"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline21">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Invoice no. Prefix</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="" placeholder="Enter Prefix">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="alert alert-warning mt-0" role="alert">
                                            It will show <b>before</b> Invoice no. Example: <b>GK</b>-0001.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Invoice no. Postfix</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="" placeholder="Enter Postfix">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="alert alert-warning mt-0" role="alert">
                                            It will show <b>after</b> Invoice no. Example: 0001-<b>GK</b>.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">T & C title</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id=""
                                            placeholder="Terms and Conditions">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Terms and Conditions</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" rows="4"
                                            placeholder="Enter text here"></textarea>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="alert alert-warning mt-0" role="alert">
                                            Maximum xxx characters
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dc" role="tabpanel" aria-labelledby="dc-tab">...</div>
                    <div class="tab-pane fade" id="quotation" role="tabpanel" aria-labelledby="quotation-tab">...</div>
                    <div class="tab-pane fade" id="pi" role="tabpanel" aria-labelledby="pi-tab">...</div>
                    <div class="tab-pane fade" id="po" role="tabpanel" aria-labelledby="po-tab">...</div>
                    <div class="tab-pane fade" id="dn" role="tabpanel" aria-labelledby="dn-tab">...</div>
                    <div class="tab-pane fade" id="cn" role="tabpanel" aria-labelledby="cn-tab">...</div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection