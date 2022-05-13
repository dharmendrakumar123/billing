@extends('layouts.customer')

@section('content')



<div class="top-stickybar">
  <div class="container-fluid">
    <div class="row d-flex justify-content-end align-items-center">
      <div class="col-12 pl-0">
        <h1>Analytics</h1>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid main-container homepage">
  <div class="homepage-cards">
    <div class="row mx-0">
      <div class="col-sm-8 monthly-salechart bg-white border-radius p-3">
        <h6>Monthly Sales/Purchase</h6>
		
        <div class="chart-container"></div>
		<div id="chartContainer" style="height: 300px; width: 100%;"></div>
      
	  </div>
      <div class="col-sm-4 pr-0">
        <div class="thismnthsale analytics-sm-block border-radius mb-3">
          <h6>This month sales</h6>
          <div class="analytics-calc">
            <div class="">
              <h5><i class="fa fa-rupee-sign"></i> <span>
			    <?php
				$amount=0;
				foreach($thismonthsale as $thismonthsales){
					$amount = $amount+$thismonthsales->grand_total;
				}
				echo $amount;
				?>
				</span></h5>
              <div class="total-counter">From {{$totalcount}} Items</div>
            </div>
          </div>
        </div>
        <div class="item-count analytics-sm-block border-radius mb-3">
          <h6>Items Count</h6>
          <div class="analytics-calc">
            <div class="stock-col">
              <h5><span>{{$total_item_instock}}</span></h5>
              <div class="total-counter">(In stock)</div>
            </div>
            <div class="stock-col analytics-calc-total">
              <h5><span>{{$total_item_products}}</span></h5>
              <div class="total-counter">(Total)</div>
            </div>
          </div>
        </div>
        <!--<div class="top-buyer analytics-sm-block border-radius mb-3">
          <h6>Top buyer</h6>
          <div class="analytics-calc">
            <div class="">
              <h5><span>Kunal enterprises</span></h5>
              <div class="total-counter">From 18 Items</div>
            </div>
          </div>
        </div>-->
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 my-3 pr-2">
        <div class="monthly-salechart bg-white border-radius p-3">
			<h6>New vs returning customers</h6>
			<span>(Past 30 Days)</span>
			<div id="charddtContainer" style="height: 300px; width: 100%;"></div>
        </div>
      </div>
      <div class="col-sm-6 my-3 pl-2">
        <div class="monthly-salechart bg-white border-radius p-3">
          <h6>Total Outstanding</h6>
          <span>(This month)</span>
          <div class="chart-container">
			<?php
				$totalsale = 0;
				foreach($saleinvoice as $saleinvoices){
						$totalsale = $totalsale+number_format($saleinvoices->grand_total - $saleinvoices->payment_received, 2, '.','');
				}
				echo "<p style='text-align:center;margin-top:5%;'>".$totalsale."</p>";
			?>
		  </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h5>Sales Invoice Due</h5>
            </div>
            <!--<div class="col text-right"><a href="#" class="btn btn-outline-primary"><i class="icon icon-list"></i>
                View All</a></div>-->
          </div>
        </div>
        <div class="card-block">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr class="footable-header">
                  <th> Invoice No. </th>
                  <th> Company Name</th>          
                  <th> Due Date</th>
                  <th> Remaining Payment</th>
                </tr>
              </thead><!-- /thead -->
              <tbody>
                @foreach($saleinvoice as $saleinvoices)
					<tr>
						<td>{{$saleinvoices->id}}</td>
						<td>{{$saleinvoices->customer_name}}</td>
						<td>{{$saleinvoices->bill_date}}</td>
						<td>{{ number_format($saleinvoices->grand_total - $saleinvoices->payment_received, 2, '.','') }}</td>
					</tr>
				@endforeach 
              </tbody><!-- /tbody -->
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h5>Purchase Invoice Due</h5>
            </div>
            <!--<div class="col text-right"><a href="#" class="btn btn-outline-primary"><i class="icon icon-list"></i>
                View All</a></div>-->
          </div>
        </div>
        <div class="card-block">
          <div class="table-responsive">
            <table class="table table-hover" data-footable="" data-toggle-column="last" style="display: table;">
              <thead>
                <tr class="footable-header">
                  <th> Purchase Invoice No. </th>
                  <th> Company Name</th>             
                  <th> Due Date</th>
                  <th> Remaining Payment</th>
                </tr>
              </thead><!-- /thead -->
              <tbody>
				
                @foreach($purchaseinvoice as $purchaseinvoicecs)
					<tr class="footable-empty">
						<td>{{$purchaseinvoicecs->id}}</td>
						<td>{{$purchaseinvoicecs->customer_name}}</td>
						<td>{{$purchaseinvoicecs->bill_date}}</td>
						<td>{{ number_format($purchaseinvoicecs->grand_total - $purchaseinvoicecs->payment_received, 2, '.','') }}</td>
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


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->
	@php($test=15)

	

<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
	
	window.onload = function () {
		var options = {
			data: [
				{
					type: "splineArea",
					dataPoints: [
						{ y: {{$janamount}}, label: "January"},
						{ y: {{$febamount}}, label: "February" },
						{ y: {{$marchamount}}, label: "March" },
						{ y: {{$aprilamount}}, label: "April" },
						{ y: {{$mayamount}}, label: "May" },
						{ y: {{$juneamount}}, label: "June" },
						{ y: {{$julyamount}}, label: "July" },
						{ y: {{$augustamount}}, label: "August" },
						{ y: {{$septamount}}, label: "September" },
						{ y: {{$octamount}}, label: "October" },
						{ y: {{$noveamount}}, label: "November" },
						{ y: {{$decemamount}}, label: "December" },
					]
				}
			]
		};
		$("#chartContainer").CanvasJSChart(options);
	}

	var chart = new CanvasJS.Chart("charddtContainer", {
		data: [{
			dataPoints: [
				{ y: {{$totaluser}}, indexLabel: "\u2605 New", label: "last 30 days"},
				{ y: {{$returningcustomer}}, indexLabel: "\u2691 Return", label: "last 30 days" },
				
			]
		}]
	});
	chart.render();

</script>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

@endsection