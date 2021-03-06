<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta content="utf-8" http-equiv="encoding">
	<style type="text/css">
		.print-action-bar {
			position: fixed;
			width: 100%;
			background: #fff;
			bottom: 0;
			height: 50px;
			padding: 10px;
			box-shadow: 0px 8px 15px 0px #000;
			text-align: center;
			z-index: 100000;
		}

		.print-icon,
		.download-icon {
			display: inline-block;
			margin: 0 10px;
			width: 200px;
			background: #ff9800;
			position: relative;
			line-height: 40px;
			color: #fff;
			padding: 5px 20px;
			font-size: 16px;
			text-transform: uppercase;
			font-weight: bold;
			border-radius: 5px;

		}

		.print-icon:hover,
		.download-icon:hover {
			cursor: pointer;
		}

		.ads-container {
			margin: 10px auto;
			text-align: center;
		}

		.print-icon svg,
		.download-icon svg {
			height: auto;
			width: 25px;
			display: inline-block;
			margin-right: 7px;
			vertical-align: middle;
		}

		html,
		body,
		div,
		span,
		applet,
		object,
		iframe,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		p,
		blockquote,
		pre,
		a,
		abbr,
		acronym,
		address,
		big,
		cite,
		code,
		del,
		dfn,
		em,
		img,
		ins,
		kbd,
		q,
		s,
		samp,
		small,
		strike,
		strong,
		sub,
		sup,
		tt,
		var,
		b,
		u,
		i,
		center,
		dl,
		dt,
		dd,
		ol,
		ul,
		li,
		fieldset,
		form,
		label,
		legend,
		table,
		caption,
		tbody,
		tfoot,
		thead,
		tr,
		th,
		td,
		article,
		aside,
		canvas,
		details,
		embed,
		figure,
		figcaption,
		footer,
		header,
		hgroup,
		menu,
		nav,
		output,
		ruby,
		section,
		summary,
		time,
		mark,
		audio,
		video {
			margin: 0;
			padding: 0;
			border: 0;
			font-size: 12px;
			font: inherit;
			vertical-align: baseline;
		}

		article,
		aside,
		details,
		figcaption,
		figure,
		footer,
		header,
		hgroup,
		menu,
		nav,
		section {
			display: block;
		}

		body {
			line-height: 1;
			word-break: break-word;
			letter-spacing: 0 !important;
		}

		ol,
		ul {
			list-style: none;
		}

		blockquote,
		q {
			quotes: none;
		}

		blockquote:before,
		blockquote:after,
		q:before,
		q:after {
			content: '';
			content: none;
		}

		table {
			border-collapse: collapse;
			border-spacing: 0;
		}

		body {
			font-family: 'Roboto';
		}

		b {
			font-weight: bold;
		}

		table {
			vertical-align: top;
			width: 100%;
			border-collapse: collapse;
		}

		tr {
			vertical-align: top;
		}

		td {
			vertical-align: middle;
			margin: 0;
			padding: 0;
		}

		.txt-tranport-sr-no {
			color: #fff;
			font-size: 0;
		}

		.txt-bold {
			font-weight: bold;
		}

		.txt-center {
			text-align: center;
		}

		.txt-left {
			text-align: left;
		}

		.txt-right {
			text-align: right;
		}

		.txt-bg {
			background-color: #E8F3FD;
		}

		.border-bottom-cell {
			border-bottom: 1px solid #0070C0;
		}

		.invoice .main-border {
			border: 1px solid #0070C0;
			padding: 0;
			margin: 0;
		}

		.invoice .header-row {
			vertical-align: middle;
			border-bottom: 1px solid #0070C0;
		}

		.invoice .header .invoice-title {
			text-align: center;
			font-size: 20px;
			color: #0070C0;
			padding: 3px 0;
			font-weight: bold;
		}

		.invoice .header .copyname {
			text-align: right;
			padding-right: 5px;
			font-size: 11px;
			font-weight: bold;
		}

		.invoice .header .gstin {
			padding-left: 5px;
		}

		.invoice .header .gstin span {
			font-weight: bold;
			text-align: left;
		}

		.billdetailsthead td {
			background-color: #E8F3FD;
			border: 1px solid #0070C0;
			border-collapse: collapse;
			text-align: center;
			font-weight: bold;
			padding: 5px 2px;
		}

		.billdetailstbody td {
			padding: 2px 2px 0px;
			font-size: 11px;
			vertical-align: top;
			line-height: 15px;
		}

		.billdetailstbody td.txt-center {
			text-align: center;
		}

		.billdetailstbody td.txt-left {
			text-align: left;
		}

		.billdetailstbody td.txt-right {
			text-align: right;
		}

		.billdetailstbody td.txt-bg {}

		.billdetailstbody .last-row td {}

		.invoicedataFooter td {
			font-size: 10px;
			background-color: #E8F3FD;
			padding: 5px 1px 5px 0px;
			border: 1px solid #0070C0;
		}

		.valign-top {
			vertical-align: top;
		}

		.valign-mid {
			vertical-align: middle;
		}

		.billdetailstbody td span {
			font-style: italic;
		}

		.billdetailstbody td {
			max-width: 1px;
		}

		.customerexportdata td {
			padding: 2px 5px 3px 5px;
			font-size: 11px;
			vertical-align: top;
			line-height: 13px;
		}

		.customerexportdata td.customerexportdata_item_label {
			font-weight: bold;
		}

		.customerdata td {
			padding: 2px 5px 3px 5px;
			font-size: 11px;
			vertical-align: top;
			line-height: 13px;
		}

		.invoicedata td {
			padding: 3px 5px 6px 5px;
			font-size: 11px;
			vertical-align: top;
			line-height: 13px;
		}

		.invoiceInfo td {
			padding: 3px 5px;
			font-size: 11px;
			line-height: 13px;
			font-weight: bold;
			border: 1px solid #0070C0;
			border-left: none;
			border-right: none;
		}

		.invoiceTotal,
		.invoiceInfo {
			border-collapse: collapse;
		}

		.invoiceTotal td {
			padding: 3px 5px;
			font-size: 10px;
			line-height: 13px;
			font-weight: bold;
			border: 1px solid #0070C0;
			border-right: none;
			border-left: none;
		}

		.invoiceTotal td.txt-bg {
			background-color: #E8F3FD;
		}

		.tableboxLine {
			border-right: 1px solid #0070C0;
			border-left: 1px solid #0070C0;
			border-collapse: collapse;
			height: 417px;
			top: 0;
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			z-index: -1;
		}

		.tableboxLinetable {
			position: absolute;
			top: 0;
			left: 0;
			z-index: -1;
		}

		.page-wrapper-table {
			width: 700px;
			margin: 0px auto;
			position: relative;
		}

		.page-wrapper {
			height: 1010px;
			width: 700px;
			margin: 0px auto;
			position: relative;
		}


		.page-wrapper .page-header {
			position: relative;
		}

		.page-wrapper .page-footer {}

		.page-wrapper .page-content {
			position: relative;
		}

		.page-wrapper-table,
		.page-wrapper-tr,
		.page-copy-container-wrapper {
			position: relative;
		}

		.page-copy-container-wrapper {
			margin: 30px 0 100px;
		}

		.page-wrapper {
			margin-top: 50px;
			padding-bottom: 50px;
		}



		.billtaxdetailsthead td {
			border: 1px solid #0070C0;
			border-collapse: collapse;
			text-align: center;
			font-weight: bold;
			border-right: none;
			padding: 2px 2px;
			font-size: 11px;

		}

		.billtaxdetailsthead tr:first-child td:first-child {
			border-left: none;
		}

		.billtaxdetailstbody td {
			padding: 2px 2px;
			font-size: 11px;
			vertical-align: top;
			line-height: 15px;
			border-left: 1px solid #0070C0;
			border-right: none;
		}

		.billtaxdetailstbody td:first-child {
			border-left: none;
		}

		.billtaxdetailstbody td.txt-center {
			text-align: center;
		}

		.billtaxdetailstbody td.txt-left {
			text-align: left;
		}

		.billtaxdetailstbody td.txt-right {
			text-align: right;
		}

		.billtaxdetailstbody td.txt-bg {}

		.billtaxdetailstbody .last-row td {}

		.invoicetaxdataFooter td {
			background-color: #E8F3FD;
			font-size: 10px;
			padding: 2px 1px 2px 0px;
			border: 1px solid #0070C0;
			border-right: none;
		}

		.invoicetaxdataFooter td:first-child {
			border-left: none;
		}

		.no-pad td {
			padding-top: 0;
			padding-bottom: 0;
		}

		.billdetailstbody td span.taxrate-below {
			display: block;
		}

		.payment-account-row td.special span {
			font-size: 15px;
			font-style: normal;
		}

		.branding_image img {
			max-width: 100%;
			float: left;
		}

		@media print {

			.ads-container,
			.print-action-bar {
				display: none;
			}

			.page-copy-container-wrapper {
				margin: 0;
			}

			.submit_font_sizes {
				display: none;
			}

			.page-wrapper {
				margin-top: 0;
				padding-bottom: 0;
				border-bottom: none;
			}

			.branding_rt {
				opacity: 1;
				visibility: visible;
			}
		}

		.page-header img+br {
			display: none;
		}

		@media screen and (max-width:1200px) {}

		@media screen and (max-width:1000px) {}
	</style>
	<style>
		.org_orgname_logo {
			vertical-align: top;
			font-size: 22px;
			font-weight: bold;
			line-height: 30px;
			padding-left: 15px;
			padding-bottom: 5px;
		}

		.org_address_logo {
			vertical-align: top;
			font-size: 12px;
			font-weight: normal;
			line-height: 15px;
			height: 43px;
			padding-left: 15px;
		}

		.org_orgname {
			vertical-align: top;
			font-size: 23px;
			font-weight: bold;
			line-height: 30px;
			padding-left: 0px;
			padding-bottom: 5px;
			padding-right: 0px;
		}

		.org_address {
			vertical-align: top;
			font-size: 12px;
			font-weight: normal;
			line-height: 15px;
			height: 43px;
			padding-left: 0px;
		}

		.contact_details {
			line-height: 17px;
			font-size: 12px;
		}

		.contact_details b {
			font-size: 11px;
		}


		.supplement {
			border-bottom: 1px solid #0070C0;
			text-align: center;
			font-weight: bold;
			font-size: 10px;
			line-height: 15px;
		}

		.customerdata td:not(.customerdata_label):not(.customerdata_item_label):not(.special) {
			font-size: 11px;
			line-height: 13px;
		}

		.customerdata td.customerdata_label {
			text-align: middle;
			font-weight: bold;
			border-bottom: 1px solid #0070C0;
			width: 100%;
			text-align: center;
			font-size: 10px;
		}

		.customerdata td.customerdata_item_label {
			font-weight: bold;
		}

		.billdetailsthead td {
			font-size: 9px;
		}

		.invoicedata td:not(.invoicedata_item_label):not(.special) {
			font-size: 11px;
			line-height: 13px;
		}

		.invoicedata td .invoicedata_item_label {
			font-weight: bold;
		}

		.invoicedata td.special {
			font-weight: bold;
			font-size: 12px;
		}

		.billdetailstbody td {
			font-size: 11px;
			line-height: 15px;
		}

		.billdetailstbody td b {
			font-weight: bold;
		}

		.invoicedataFooter td {}

		.invoiceInfo td {
			font-size: 11px;
			line-height: 13px;
			font-weight: normal;
		}

		.invoiceInfo td.section_header {
			font-weight: bold;
		}

		.invoiceInfo td.amount_in_words {
			width: 100%;
			text-align: center;
			font-size: 11px;
			line-height: 15px;
			height: 30px;
			vertical-align: middle;
			text-transform: capitalize;
		}

		.invoiceInfo td.terms_condition_box {
			min-height: 90px;
			width: 100%;
			overflow: hidden;
			font-size: 10px;
		}

		.invoiceTotal td:not(.special) {
			font-size: 10px;
			line-height: 13px;
			font-weight: bold;
		}

		.invoiceTotal td.special {
			font-size: 13px;
		}

		.invoiceTotal td.footer_seal_title {
			border-bottom: none;
			text-align: center;
			font-size: 8px;
		}

		.invoiceTotal td.footer_seal_name {
			border-top: none;
			border-bottom: none;
			text-align: center;
			font-size: 12px;
		}

		.invoiceTotal td.footer_seal_signature {
			border-bottom: none;
			text-align: center;
			font-size: 8px;
		}
		@media print{
    .print-action-bar{display:none;}
		}
	</style>
	 
</head>
<body>