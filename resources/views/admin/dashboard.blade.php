@extends('layouts.admindashboard')

@section('content')
    <div class="container-fluid">
      <div class="homepage-cards mt-5">
        <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
              <div class="card-header">
                <h5>Account Summary</h5>
              </div>
              <div class="card-block">
                <div class="row d-flex align-items-center">
                  <div class="col-4 border-right">
                    <div class="row text-center justify-content-center">
                      <a class="" href="#">
                        <div class="col-12"><i class="fa fa-cubes h2"></i></div>
                        <div class="col-12 m-b-0">
                       
                          <h3 class="h1 font-weight-bold"> {{$data}}</h3>
                          <span>Total Users</span>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="row text-center justify-content-center">
                      <a class="" href="#">
                        <div class="col-12"><i class="fa fa-users h2"></i></div>
                        <div class="col-12 m-b-0">
                          <h3 class="h1 font-weight-bold">{{$states}}</h3>
                          <span>Total States</sapn>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="row text-center justify-content-center">
                      <a class="" href="#">
                        <div class="col-12"><i class="fa fa-users h2"></i></div>
                        <div class="col-12 m-b-0">
                          <h3 class="h1 font-weight-bold">{{$units}}</h3>
                          <span>Total Units</sapn>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
          <div class="col-md-12 col-xl-12">
            <div class="card">
              <!--div class="card-header">
                <h5>Invoice Amount Summary</h5>
              </div-->
              <div class="card-block">
              {!! $chart->html() !!}
               
              </div>
            </div>
          </div>
          
       
        </div>
      </div>
    </div>
  </main><!-- /.container -->
  {!! Charts::scripts() !!}
{!! $chart->script() !!}

@endsection