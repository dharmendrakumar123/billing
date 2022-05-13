@extends('layouts.customer')

@section('content')
<div class="top-stickybar">
    <div class="container-fluid">
        <div class="row d-flex justify-content-end align-items-center">
            <div class="col-4 pl-0">
                <h1>Admin Details</h1>
            </div>
            <div class="col-8 text-right">
                <a href="#" class="btn btn-light mr-2">Edit</a>
                <a href="#" class="btn btn-light mr-2">Download PDF</a>
                <button id="" name="" value="" class="btn btn-primary">Print</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid main-container">
    <div class="inoice-page-container">
        <div class="container bootdey">
            <div class="row invoice row-printable">
                <div class="invoice-printing-opt">
                    <h5><i class="fa fa-print mr-2"></i> Invoice printing options</h5>
                    <div class="row">
                        <div class="col-lg-3 pl-5">
                            <div class="controls mt-2">
                                <label><input type="checkbox" name="is_same_shipping" value="1" checked=""
                                        id="is_same_shipping"> Original for Recipient</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="controls mt-2">
                                <label><input type="checkbox" name="is_same_shipping" value="1" id="is_same_shipping">
                                    Duplicate for Transporter</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="controls mt-2">
                                <label><input type="checkbox" name="is_same_shipping" value="1" id="is_same_shipping">
                                    Triplicate for Supplier</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-cont" style="font-size: 13px;">
                    <div class="col-md-12">
                        <!-- col-lg-12 start here -->
                        <div class="panel panel-default plain" id="dash_0">
                            <!-- Start .panel -->
                            <div class="panel-body p30">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="invoice-items">
                                            <div class="table-responsive" style="overflow: hidden; outline: none;"
                                                tabindex="0">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="invoice-logo"><img width="100"
                                                                        src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                                        alt="Invoice logo">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="invoice-from">
                                                                    <ul class="list-unstyled text-left">
                                                                        <li
                                                                            style="font-weight: bold;font-size: 20px; margin-bottom: 0;">
                                                                            Herbal
                                                                            Health</li>
                                                                        <li>2500 Ridgepoint Dr, Suite 105-C</li>
                                                                        <li>Ludhiana</li>
                                                                        <li>Punjab - 141001</li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <ul class="list-unstyled text-right">
                                                                    <li
                                                                        style="display: inline-block; min-width: 51%;width: auto;margin-bottom: 5px;">
                                                                        Original for receipient</li>
                                                                    <li
                                                                        style="display: inline-block; min-width: 51%;width: auto;border-bottom: 2px solid #000;margin-bottom: 10px;padding-bottom: 5px;">
                                                                        <b>Date:</b> 15-May-2021
                                                                    </li>
                                                                    <li
                                                                        style="display: inline-block; min-width: 51%;width: auto;margin-bottom: 0px;">
                                                                        <b>Phone:</b> +91- 000000000
                                                                    </li>
                                                                    <li
                                                                        style="display: inline-block; min-width: 51%;width: auto;margin-bottom: 5px;">
                                                                        <b style="font-size: 18px;">GSTIN:</b> +91-
                                                                        000000000
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table" style="border: 1px solid #000;margin-bottom:0;">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="6" style="text-align: left;"><b>TAX INVOICE</b>
                                                            </th>
                                                            <th colspan="6" style="text-align: right;"><b>Invoice no.
                                                                    <span>MR-0025</span></b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="6" style="width: 50%;">
                                                                <p><b
                                                                        style="display: inline-block;vertical-align: top;width:80px">Bill
                                                                        to</b> <span
                                                                        style="display: inline-block;vertical-align: top;">Amanvir</span>
                                                                </p>
                                                                <p><b
                                                                        style="display: inline-block;vertical-align: top;width:80px">Address</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;">2500
                                                                        Ridgepoint Dr, Suite
                                                                        105-C<br />Ludhiana <br />Punjab - 141001</span>
                                                                </p>
                                                                <p><b
                                                                        style="display: inline-block;vertical-align: top;width:80px">Phone</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;">+91-0000000000</span>
                                                                </p>
                                                                <p><b
                                                                        style="display: inline-block;vertical-align: top;width:80px">GSTIN</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;">07axk221111</span>
                                                                </p>
                                                            </td>
                                                            <td colspan="6"
                                                                style="width: 50%;border-left: 1px solid #000;">
                                                                <div style="width: 100%;float: left;">
                                                                    <div style="width:50%;float:left;"><b
                                                                            style="display: inline-block;vertical-align: top;width:105px">Challan
                                                                            Date:</b> <span
                                                                            style="display: inline-block;vertical-align: top;">15-May-2021</span>
                                                                    </div>
                                                                    <div style="width:50%;float:left;"><b
                                                                            style="display: inline-block;vertical-align: top;width:95px">P.O
                                                                            no.:</b> <span
                                                                            style="display: inline-block;vertical-align: top;">55578</span>
                                                                    </div>
                                                                    <div style="width:50%;float:left;"><b
                                                                            style="display: inline-block;vertical-align: top;width:105px">L.R
                                                                            no.:</b> <span
                                                                            style="display: inline-block;vertical-align: top;">555578</span>
                                                                    </div>
                                                                    <div style="width:50%;float:left;"><b
                                                                            style="display: inline-block;vertical-align: top;width:95px">E-Way
                                                                            no.:</b> <span
                                                                            style="display: inline-block;vertical-align: top;">HD521215521</span>
                                                                    </div>
                                                                </div>
                                                                <div style="width: 100%;float: left; margin-top: 10px;">
                                                                    <b
                                                                        style="display: inline-block;vertical-align: top;width:105px">Transport</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;">White
                                                                        leaf transport pvt ltd.</span>
                                                                </div>
                                                                <div style="width: 100%;float: left; margin-top: 10px;">
                                                                    <b
                                                                        style="display: inline-block;vertical-align: top;width:105px">Trans
                                                                        ID</b> <span
                                                                        style="display: inline-block;vertical-align: top;">07axk221111</span>
                                                                </div>
                                                                <div style="width: 100%;float: left; margin-top: 10px;">
                                                                    <b
                                                                        style="display: inline-block;vertical-align: top;width:105px">Vehicle
                                                                        no.</b> <span
                                                                        style="display: inline-block;vertical-align: top;">DL-3C-7652</span>
                                                                </div>
                                                                <div style="width: 100%;float: left; margin-top: 10px;">
                                                                    <b
                                                                        style="display: inline-block;vertical-align: top;width:105px">Place
                                                                        of supply</b> <span
                                                                        style="display: inline-block;vertical-align: top;">Punjab
                                                                        (03)</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table style="border: 1px solid #000000;">
                                                    <thead>
                                                        <th style="border:1px solid #000000; padding:5px">No.</th>
                                                        <th style="border:1px solid #000000; padding:5px">Product/Item
                                                        </th>
                                                        <th style="border:1px solid #000000; padding:5px">HSN Code</th>
                                                        <th style="border:1px solid #000000; padding:5px">Qty</th>
                                                        <th style="border:1px solid #000000; padding:5px">Price</th>
                                                        <th style="border:1px solid #000000; padding:5px">Discount</th>
                                                        <th style="border:1px solid #000000; padding:5px">GST</th>
                                                        <th style="border:1px solid #000000; padding:5px">Cess</th>
                                                        <th style="border:1px solid #000000; padding:5px">Amount</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="border:1px solid #000000; padding:5px">1</td>
                                                            <td style="border:1px solid #000000; padding:5px">Sunsilk
                                                                coconut water & Aloe vera Shampoo,
                                                                370 ml (2015 Packing)</td>
                                                            <td style="border:1px solid #000000; padding:5px">557992
                                                            </td>
                                                            <td style="border:1px solid #000000; padding:5px">8 pcs</td>
                                                            <td style="border:1px solid #000000; padding:5px">138.83
                                                            </td>
                                                            <td style="border:1px solid #000000; padding:5px">20</td>
                                                            <td style="border:1px solid #000000; padding:5px">196.56
                                                                (@18%)</td>
                                                            <td style="border:1px solid #000000; padding:5px">50</td>
                                                            <td style="border:1px solid #000000; padding:5px">1346.40
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border:1px solid #000000; padding:5px">2</td>
                                                            <td style="border:1px solid #000000; padding:5px">Sunsilk
                                                                coconut water & Aloe vera Shampoo,
                                                                370 ml (2015 Packing)</td>
                                                            <td style="border:1px solid #000000; padding:5px">557992
                                                            </td>
                                                            <td style="border:1px solid #000000; padding:5px">8 pcs</td>
                                                            <td style="border:1px solid #000000; padding:5px">138.83
                                                            </td>
                                                            <td style="border:1px solid #000000; padding:5px">20</td>
                                                            <td style="border:1px solid #000000; padding:5px">196.56
                                                                (@18%)</td>
                                                            <td style="border:1px solid #000000; padding:5px">50</td>
                                                            <td style="border:1px solid #000000; padding:5px">1346.40
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="6"
                                                                style="width: 50%;padding: 10px; vertical-align: top;"
                                                                rowspan="2">
                                                                <p style="font-size: 16px;font-weight: 700;">Our bank
                                                                    details</p>
                                                                <p style="margin-bottom:3px"><b
                                                                        style="display: inline-block;vertical-align: top;width:110px">Bank
                                                                        name</b> <span
                                                                        style="display: inline-block;vertical-align: top;">ICIC</span>
                                                                </p>
                                                                <p style="margin-bottom:3px"><b
                                                                        style="display: inline-block;vertical-align: top;width:110px">Account
                                                                        no.</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;">173101503615</span>
                                                                </p>
                                                                <p style="margin-bottom:3px"><b
                                                                        style="display: inline-block;vertical-align: top;width:110px">Branch
                                                                        & IFSC</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;">Feroza
                                                                        Gandhi Market, Ludhiana & ICI002233322</span>
                                                                </p>
                                                            </td>
                                                            <td colspan="6"
                                                                style="width: 50%;border-left: 1px solid #000;padding:10px">
                                                                <div style="width: 100%;float: left;">
                                                                    <div style="width:100%;float:left;"><span
                                                                            style="display: inline-block;vertical-align: top;text-align:left;">Total
                                                                            Taxable Amount</span> <span
                                                                            style="display: inline-block;text-align: right;float:right;">1454.00</span>
                                                                    </div>
                                                                    <div style="width:100%;float:left;"><span
                                                                            style="display: inline-block;vertical-align: top;text-align:left;">Total
                                                                            Tax</span> <span
                                                                            style="display: inline-block;text-align: right;float:right;">249.00</span>
                                                                    </div>
                                                                    <div style="width:100%;float:left;"><span
                                                                            style="display: inline-block;vertical-align: top;text-align:left;">Additional
                                                                            Charge</span> <span
                                                                            style="display: inline-block;text-align: right;float:right;">0.00</span>
                                                                    </div>
                                                                    <div style="width:100%;float:left;"><span
                                                                            style="display: inline-block;vertical-align: top;text-align:left;">Discount</span>
                                                                        <span
                                                                            style="display: inline-block;text-align: right;float:right;">436.00</span>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="6"
                                                                style="width: 50%;border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                <div style="width: 100%;float: left;">
                                                                    <div style="width:100%;float:left;"><b
                                                                            style="vertical-align: top;float:left">Total
                                                                            Amount (E. & O.E)</b> <span
                                                                            style="vertical-align: top;text-align:right;float:right;">Rs.
                                                                            1308.30</span>
                                                                    </div>
                                                                </div>
                                                                <p style="text-align:right">One thousand, three hundred
                                                                    eight & thirty paisa only.</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6"
                                                                style="width: 50%;border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                <p style="text-align:left;margin-bottom:0;">Due date:
                                                                    <span>25-May-2021</span>
                                                                </p>
                                                            </td>
                                                            <td colspan="6"
                                                                style="width: 50%;border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                <p style="margin-bottom:0;">Tax payable on Reverse
                                                                    Charge <span
                                                                        style="vertical-align: top;text-align:right;float:right;">N.A</span>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <table class="table" style="width: 100%;border:1px solid #000000;">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2" colspan="2"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                HSN Code</th>
                                                            <th rowspan="2"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Taxable value</th>
                                                            <th colspan="3"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                CGST</th>
                                                            <th colspan="2"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                SGST</th>
                                                            <th rowspan="2"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Cess</th>
                                                            <th rowspan="2"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Total</th>
                                                        </tr>
                                                        <tr style="border-bottom: 1px solid #000;">
                                                            <th colspan="1"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Rate</th>
                                                            <th colspan="2"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Amount</th>
                                                            <th colspan="1"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Rate</th>
                                                            <th colspan="1"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td colspan="2"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                55555</td>
                                                            <td
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                1098.00</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                9%</td>
                                                            <td colspan="2"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                198</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                9%</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                98</td>
                                                            <td
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                50</td>
                                                            <td
                                                                style="padding:5px 10px;border-top: 0;border-left: 1px solid #000;">
                                                                247</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                55555</td>
                                                            <td
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                1098.00</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                9%</td>
                                                            <td colspan="2"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                198</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                9%</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                98</td>
                                                            <td
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                50</td>
                                                            <td
                                                                style="padding:5px 10px;border-top: 0;border-left: 1px solid #000;">
                                                                247</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="2"
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                                Total</td>
                                                            <td
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                                1098.00</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                            </td>
                                                            <td colspan="2"
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                                198</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                            </td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                                98</td>
                                                            <td
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                                50</td>
                                                            <td
                                                                style="padding:5px 10px;font-weight: bold;border-left: 1px solid #000;">
                                                                247</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6" style="width: 50%;">
                                                                <p style="font-size: 16px;font-weight: 700;">Our bank
                                                                    details</p>
                                                                <ul>
                                                                    <li>Good once sold will not be taken back or
                                                                        returned</li>
                                                                    <li>Our responsibility Ceases as soon as goods
                                                                        leaves our Premises</li>
                                                                    <li>If payment is not mad ewithin 10 days, interest
                                                                        will be charged @2% P.M.</li>
                                                                </ul>
                                                            </td>
                                                            <td colspan="6"
                                                                style="width: 50%;border-left: 1px solid #000000;">
                                                                <p style="font-size: 16px;">For Herbal Health</p>
                                                                <p style="margin-top: 90px;text-align: right;">
                                                                    Authorised Signatory</p>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col-lg-12 end here -->
                                </div>
                                <!-- End .row -->
                            </div>
                        </div>
                        <!-- End .panel -->
                    </div>
                </div>
                <!-- col-lg-12 end here -->
            </div>
        </div>
    </div>
</div>
@endsection