@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row">
         
          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="icofont-plus"></i> <br>
              <h5><p>Positif</p></h5>  
              <span data-toggle="counter-up">{{ $positif }}</span>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="icofont-heart-beat-alt"></i> <br>
              <h5><p>Sembuh</p></h5>
              <span data-toggle="counter-up">{{ $sembuh }}</span>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-skull-danger"></i> <br>
              <h5><p>Meninggal</p></h5>
              <span data-toggle="counter-up">{{ $meninggal }}</span>
            </div>
          </div>
         
          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-globe"></i> <br>
              <h5><p>Total Dunia</p></h5>
              <span data-toggle="counter-up"><?php echo $posglobal['value'] ?></span>
            </div>
          </div>
          
        </div><br><br>
        
        <div class="col text-center">
            <h6><p>Update terakhir : {{ $tanggal }}</p></h6>
        </div> 
      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
