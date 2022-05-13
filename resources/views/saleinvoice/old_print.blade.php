@extends('layouts.print')

@section('content')
	<div class="print-action-bar">
		<div class="print-icon">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
				x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve"
				width="512px" height="512px">
				<g>
					<g>
						<path d="M4,12.5v3h8v-3v-2H4V12.5z M5,11.5h6v1H5V11.5z M5,13.5h6v1H5V13.5z" fill="#ffffff">
						</path>
						<polygon points="12,3.5 12,0.5 4,0.5 4,3.5 4,5.5 12,5.5   " fill="#ffffff"></polygon>
						<path
							d="M14,3.5h-1v2v1H3v-1v-2H2c-1,0-2,1-2,2v5c0,1,1,2,2,2h1v-2v-1h10v1v2h1c1,0,2-1,2-2v-5    C16,4.5,15,3.5,14,3.5z"
							fill="#ffffff"></path>
					</g>
				</g>
			</svg>
			Print
		</div>
		<div class="download-icon" data-filename="Invoice_42.pdf" data-baselink="">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
				x="0px" y="0px" viewBox="0 0 482.14 482.14" style="enable-background:new 0 0 482.14 482.14;"
				xml:space="preserve" width="512px" height="512px" class="">
				<g>
					<g>
						<path
							d="M142.024,310.194c0-8.007-5.556-12.782-15.359-12.782c-4.003,0-6.714,0.395-8.132,0.773v25.69   c1.679,0.378,3.743,0.504,6.588,0.504C135.57,324.379,142.024,319.1,142.024,310.194z"
							data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
						<path
							d="M202.709,297.681c-4.39,0-7.227,0.379-8.905,0.772v56.896c1.679,0.394,4.39,0.394,6.841,0.394   c17.809,0.126,29.424-9.677,29.424-30.449C230.195,307.231,219.611,297.681,202.709,297.681z"
							data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
						<path
							d="M315.458,0H121.811c-28.29,0-51.315,23.041-51.315,51.315v189.754h-5.012c-11.418,0-20.678,9.251-20.678,20.679v125.404   c0,11.427,9.259,20.677,20.678,20.677h5.012v22.995c0,28.305,23.025,51.315,51.315,51.315h264.223   c28.272,0,51.3-23.011,51.3-51.315V121.449L315.458,0z M99.053,284.379c6.06-1.024,14.578-1.796,26.579-1.796   c12.128,0,20.772,2.315,26.58,6.965c5.548,4.382,9.292,11.615,9.292,20.127c0,8.51-2.837,15.745-7.999,20.646   c-6.714,6.32-16.643,9.157-28.258,9.157c-2.585,0-4.902-0.128-6.714-0.379v31.096H99.053V284.379z M386.034,450.713H121.811   c-10.954,0-19.874-8.92-19.874-19.889v-22.995h246.31c11.42,0,20.679-9.25,20.679-20.677V261.748   c0-11.428-9.259-20.679-20.679-20.679h-246.31V51.315c0-10.938,8.921-19.858,19.874-19.858l181.89-0.19v67.233   c0,19.638,15.934,35.587,35.587,35.587l65.862-0.189l0.741,296.925C405.891,441.793,396.987,450.713,386.034,450.713z    M174.065,369.801v-85.422c7.225-1.15,16.642-1.796,26.58-1.796c16.516,0,27.226,2.963,35.618,9.282   c9.031,6.714,14.704,17.416,14.704,32.781c0,16.643-6.06,28.133-14.453,35.224c-9.157,7.612-23.096,11.222-40.125,11.222   C186.191,371.092,178.966,370.446,174.065,369.801z M314.892,319.226v15.996h-31.23v34.973h-19.74v-86.966h53.16v16.122h-33.42   v19.875H314.892z"
							data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
					</g>
				</g>
			</svg>
			Download
		</div>
	</div>
	@foreach($count_loops as $printStatementName)
 	<div class="page-copy-container-wrapper">
		<div class="page-wrapper-table">
			<div class="page-wrapper-tr" style="page-break-inside:avoid; page-break-after:auto;">
				<div>
					<div class="page-wrapper">
						<div class="page-header">

							<table cellspacing="0" cellpadding="0" class="branding" width="100%">
								<colgroup>
									<col style="width: 70%">
									<col style="width: 30%">
								</colgroup>
								<tbody>
									<tr>
										<td style="position:relative;vertical-align: top;">
											<table cellspacing="0" cellpadding="0" width="100%">
												<tbody>
													<tr>
														<td rowspan="2" style="vertical-align:middle;width:50px;">
															<img
																src="" alt="Logo Here">
														</td>
														<td class="org_orgname_logo" data-editor=".org_orgname_logo">
															Epiliam </td>
													</tr>
													<tr>
														<td class="org_address_logo" data-editor=".org_address_logo">
															#202, h-64<br>panchkula, Haryana - 134116 </td>
													</tr>
												</tbody>
											</table>
										</td>
										
										<td style="text-align:right;vertical-align:bottom;float:right;">
											<table cellspacing="0" cellpadding="0">

												<tbody>
													<tr>
														<td class="contact_details" data-editor=".contact_details">
														
															<b>Name</b> :{{$user_details->name}} </td>
													</tr>
													<tr>
														<td class="contact_details">
															<b data-editor=".contact_details b">Phone</b> :{{$user_details->phone}}
														</td>
													</tr>
													<tr>
														<td class="contact_details">
															<b>Email</b> : {{$user_details->email}} 
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							<br>

							<table cellspacing="0" cellpadding="0" class="invoice">
								<tbody>
									<tr>
										<td class="main-border" style="width: 100%;border-bottom:none;">
											<table cellspacing="0" border="0" cellpadding="0" class="header">
												<tbody>
													<tr>
														<td style="width: 100%;" class="header-row">
															<table cellspacing="0" cellpadding="0">
																<tbody>
																	<tr>
																		<td style="width: 35%;" class="gstin"
																			data-editor=".gstin"><span style="">PAN
																				:</span>{{$customer_details->gstin_pan}} </td>
																		<td style="width: 30%;" class="invoice-title">
																			TAX INVOICE</td>
																		<td style="width: 35%;" class="copyname">
																			{{$printStatementName}}</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table>
												<colgroup>
													<col style="width: 40%">
													<col style="width: 60%">
												</colgroup>
												<tbody>
													<tr>
														<td
															style="border-bottom:1px solid #0070C0;border-right: 1px solid #0070C0;vertical-align: top;">
															<table cellspacing="0" class="customerdata"
																style="table-layout: fixed;">
																<colgroup>
																	<col style="width: 22%">
																	<col style="width: 78%">
																</colgroup>
																<tbody>
																	<tr>
																		<td colspan="2" class="customerdata_label"
																			data-editor=".customerdata td.customerdata_label">
																			Customer Detail</td>
																	</tr>
																	<tr>
																		<td class="customerdata_item_label"
																			data-editor=".customerdata td.customerdata_item_label">
																			M/S</td>
																		<td class="special"
																			data-editor=".customerdata td.special"> {{$customer_details->customer_name}}</td>
																	</tr>
																	<tr>
																		<td class="customerdata_item_label">Address</td>
																		<td style="">
																			<div style="overflow: hidden;"> {{$customer_details->address}}
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td class="customerdata_item_label">PHONE</td>
																		<td style=""> {{$customer_details->phone}}</td>
																	</tr>
																	<tr>
																		<td class="customerdata_item_label">
																			GSTIN </td>
																		<td style="">{{$customer_details->customer_gstno}}</td>
																	</tr>
																	<tr>
																		<td class="customerdata_item_label">Place of
																			Supply</td>
																		<td style="">{{$customer_details->states_name}}({{$customer_details->scode}})</td>
																	</tr>
																</tbody>
															</table>
														</td>
														<td style="border-bottom:1px solid #0070C0;vertical-align:top;">
															<table cellspacing="0" class="invoicedata">
																<colgroup>
																	<col style="width: 27%">
																	<col style="width: 29%">
																	<col style="width: 25%">
																	<col style="width: 19%">
																</colgroup>
																<tbody>
																	<tr>
																		<td class="invoicedata_item_label"
																			data-editor=".invoicedata td.invoicedata_item_label">
																			Invoice No.</td>
																		<td class="special"
																			data-editor=".invoicedata td.special">{{$customer_details->invoice_number}}
																		</td>
																		<td class="invoicedata_item_label">Invoice Date
																		</td>
																		<td>{{$customer_details->bill_date}}</td>
																	</tr>
																	<tr>



																		<td class="invoicedata_item_label">Due Date</td>
																		<td> {{$customer_details->due_date}}</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>


																	<tr>
																		<td class="invoicedata_item_label">Transport
																		</td>
																		<td colspan="3">{{$customer_details->name}}</td>
																	</tr>

																	<tr>
																		<td class="invoicedata_item_label">Transport ID
																		</td>
																		<td>{{$customer_details->transport_id_label}}</td>
																		<td class="invoicedata_item_label">Vehicle
																			Number</td>
																		<td> {{$customer_details->vehicle_no}}</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<br>
										</td>
									</tr>
								</tbody>
							</table>
							<table class="billdetailsthead" cellspacing="0" border="0" cellpadding="0"
								data-editor=".billdetailsthead td">
								<colgroup>
									<col style="width:4%">
									<col style="width:27%">
									<col style="width:11%">
									<col style="width:10%">
									<col style="width:11%">
									<col style="width:11%">
									<col style="width:5%">
									<col style="width:10%">
									<col style="width:11%">
								</colgroup>
								<tbody>
									<tr>
										<td class="valign-mid" rowspan="2">Sr. No.</td>
										<td class="valign-mid" rowspan="2">Name of Product / Service</td>
										<td class="valign-mid" rowspan="2">HSN / SAC</td>
										<td class="valign-mid" rowspan="2">Qty</td>
										<td class="valign-mid" rowspan="2">Rate</td>
										<td class="valign-mid" rowspan="2">Taxable Value</td>
										<td class="valign-mid" colspan="2">IGST</td>
										<td class="valign-mid" rowspan="2">Total</td>
									</tr>
									<tr>

										<td style="border-left:none;">%</td>
										<td style="">Amount</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="page-content" style="height: 446px;">
							<table class="tableboxLinetable" cellspacing="0" cellpadding="0" border="0">

								<colgroup>
									<col style="width:4%">
									<col style="width:27%">
									<col style="width:11%">
									<col style="width:10%">
									<col style="width:11%">
									<col style="width:11%">
									<col style="width:5%">
									<col style="width:10%">
									<col style="width:11%">
								</colgroup>
								<tbody>
									<tr>
										<td class="tableboxLine linebox1"
											style="width: 4%; left: 0px; border-left: 1px solid rgb(0, 112, 192); height: 446px;">
										</td>
										<td class="tableboxLine linebox2" style="width: 27%; left: 4%; height: 446px;">
										</td>
										<td class="tableboxLine linebox3" style="width: 11%; left: 31%; height: 446px;">
										</td>
										<td class="tableboxLine linebox4" style="width: 10%; left: 42%; height: 446px;">
										</td>
										<td class="tableboxLine linebox5" style="width: 11%; left: 52%; height: 446px;">
										</td>
										<td class="tableboxLine linebox7"
											style="width: 11%; left: 63%; background-color: rgb(232, 243, 253); height: 446px;">
										</td>
										<td class="tableboxLine linebox8" style="width: 5%; left: 74%; height: 446px;">
										</td>
										<td class="tableboxLine linebox9" style="width: 10%; left: 79%; height: 446px;">
										</td>
										<td class="tableboxLine linebox12"
											style="width: 11%; left: 89%; background-color: rgb(232, 243, 253); height: 446px;">
										</td>
									</tr>
								</tbody>
							</table>
							<table class="billdetailstbody" id="billdetailstbody" cellspacing="0" border="0"
								cellpadding="0" data-editor=".billdetailstbody td">
								<colgroup>
									<col style="width:4%">
									<col style="width:27%">
									<col style="width:11%">
									<col style="width:10%">
									<col style="width:11%">
									<col style="width:11%">
									<col style="width:5%">
									<col style="width:10%">
									<col style="width:11%">
								</colgroup>
								<tbody>
								@foreach($product_details as $product_detail)
									<tr class="pageRow1">
										<td class="txt-center  ">1</td>
										<td class="txt-left" data-editor=".billdetailstbody td b">
										
											<b>{{$product_detail->hidden_item_product_name}}</b>
									
										</td>
										<td class="txt-center">{{$product_detail->hsncode}}</td>
										<td class="txt-center">
										{{$product_detail->quantity}} </td>
										<td class="txt-center">{{$product_detail->sgst_rate}}</td>
										<td class="txt-right">{{$product_detail->taxable_line_value}}</td>
										<td class="txt-right">{{$product_detail->igst}}</td>
										<td class="txt-right">{{$product_detail->price}}</td>
										<td class="txt-right " style="">{{$product_detail->price}}</td>

									</tr>
									@endforeach

								</tbody>
							</table>
						</div>
						<div class="page-footer">
							<table class="invoicedataFooter" cellspacing="0" style="width:100%;"
								data-editor=".invoicedataFooter td">
								<colgroup>
									<col style="width: 42%">
									<col style="width: 10%">
									<col style="width: 11%">
									<col style="width: 11%">
									<col style="width: 5%">
									<col style="width: 10%">
									<col style="width: 11%">
								</colgroup>
								<tbody>
									<tr>
										<td class="txt-bold txt-right" style="text-align:right;">Total</td>
										<td class="txt-bold txt-center">{{$product_detail->quantity}}</td>
										<td class="txt-bold txt-right"></td>
										<td class="txt-bold txt-right">{{$product_detail->taxable_line_value}}</td>
										<td class="txt-bold txt-right"></td>
										<td class="txt-bold txt-right">{{$product_detail->price}}</td>
										<td class="txt-bold txt-right" style="">{{$product_detail->price}}</td>
									</tr>
								</tbody>
							</table>
							<table cellspacing="0" cellpadding="0" class="invoice">
								<tbody>
									<tr>
										<td class="main-border" style="width: 100%;border-top:none;">
											<br>
											<table cellspacing="0" style="width: 100%;">
												<colgroup>
													<col style="width: 60%">
													<col style="width: 40%">
												</colgroup>
												<tbody>
													<tr>
														<td
															style="border-top:none;border-right:none;border-left:none;vertical-align:top;">
															<table cellspacing="0" style="width: 100%;"
																class="invoiceInfo">
																<colgroup>
																	<col style="width: 35%">
																	<col style="width: 65%">
																</colgroup>
																<tbody>
																	<tr>
																		<td colspan="2"
																			data-editor=".invoiceInfo td.section_header"
																			class="section_header"
																			style="width:100%;text-align:center;border-bottom:none;">
																			Total in words</td>
																	</tr>
																	<tr>
																		<td colspan="2" class="amount_in_words"
																			data-editor=".invoiceInfo td.amount_in_words">{{$customer_details->hidden_grandtotalwords}}
																			 </td>
																	</tr>
																	<tr>
																		<td colspan="2" class="section_header"
																			style="width:100%;text-align:center;border-bottom:none;">
																			Bank Details</td>
																	</tr>
																	<tr>
																		<td style="border-right:none;border-bottom:none; "
																			data-editor=".invoiceInfo td">Bank Name</td>
																		<td
																			style="border-left:none;border-bottom:none;">
																			{{$customer_details->bank_name}}</td>
																	</tr>
																	<tr>
																		<td
																			style="border-right:none;border-bottom:none; border-top:none;  ">
																			Branch Name</td>
																		<td
																			style="border-left:none;border-bottom:none; border-top:none; ">
																			{{$customer_details->bank_name}}</td>
																	</tr>
																	<tr>
																		<td
																			style="border-right:none;border-top:none;border-bottom:none;">
																			Bank Account Number</td>
																		<td
																			style="border-left:none;border-top:none;border-bottom:none;">
																			{{$customer_details->bank_account_number}}</td>
																	</tr>
																	<tr>
																		<td style="border-right:none;border-top:none;">
																			Bank Branch IFSC</td>
																		<td style="border-left:none;border-top:none;">{{$customer_details->bank_ifsc}}
																		</td>
																	</tr>
																	<tr>
																		<td colspan="2" class="section_header"
																			style="width:100%;text-align:center;border-bottom:none;">
																			Terms and Conditions</td>
																	</tr>
																	<tr>
																		<td colspan="2"
																			style="width:100%;border-bottom:none;"
																			data-editor=".invoiceInfo td .terms_condition_box">
																			<div class="terms_condition_box">{{$customer_details->bank_term_condition}}</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
														<td
															style="border-top:none;vertical-align:top;border-left:1px solid #0070C0;">
															<table cellspacing="0" style="width: 100%;"
																class="invoiceTotal">
																<colgroup>
																	<col style="width: 64%">
																	<col style="width: 36%">
																</colgroup>
																<tbody>
																	<tr>
																		<td class="txt-bg"
																			data-editor=".invoiceTotal td:not(.special)">
																			Taxable Amount</td>
																		<td class="txt-bg txt-right">{{$customer_details->total_taxable }}</td>
																	</tr>
																	<tr>
																		<td>Add : IGST</td>
																		<td class=" txt-right">{{$customer_details->total_igst_rate}}</td>
																	</tr>
																	<tr>
																		<td class="txt-bg">Total Tax</td>
																		<td class="txt-bg txt-right">{{$customer_details->total_tax}}</td>
																	</tr>
																	<tr>
																		<td class="txt-bg">Total Amount After Tax</td>
																		<td class="txt-bg txt-right special"
																			data-editor=".invoiceTotal td.special">{{$customer_details->grand_total}}</td>
																	</tr>
																	<tr>
																		<td colspan="2" class="txt-right">(E &amp; O.E.)
																		</td>
																	</tr>
																	<tr>
																		<td
																			style="margin:0;vertical-align:middle;border-right:1px solid #0070C0;">
																			GST Payable on Reverse Charge</td>
																		<td style="margin:0;vertical-align:middle;"
																			class="txt-bg txt-right">
																			N.A. </td>
																	</tr>
																	<tr>
																		<td colspan="2" class="footer_seal_title"
																			data-editor=".invoiceTotal td.footer_seal_title">
																			Certified that the particulars given above
																			are true and correct.</td>
																	</tr>
																	<tr>
																		<td colspan="2" class="footer_seal_name"
																			data-editor=".invoiceTotal td.footer_seal_name">
																			For Epiliam</td>
																	</tr>
																	<tr>
																		<td colspan="2"
																			style="border-bottom:none;height:60px;text-align:center;">
																		</td>
																	</tr>
																	<tr>
																		<td colspan="2" class="footer_seal_signature"
																			data-editor=".invoiceTotal td.footer_seal_signature">
																			Authorised Signatory</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							<table cellspacing="0" cellpadding="0" class="branding_table">
								<colgroup>
									<col style="width: 80%">
									<col style="width: 20%">
								</colgroup>
								<tbody>
									<tr class="branding_rt">
										<td
											style="padding: 5px 0 0;font-size: 12px;line-height: 15px;font-weight: normal;">
										</td>
										<td
											style="text-align:left;padding: 5px 0 0;font-weight: bold;color: #7A7A7A;font-size: 10px;line-height: 20px;text-transform: uppercase;vertical-align:top;">
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	

@endsection
	
