@extends('layouts.default')

@section('title') Heart Rate @endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card alert alert-primary" role="alert">
                <h5>Tip!</h5>
                <p>We advise you to take your heart rate after waking up, to have the same conditions.</p>
            </div>
        </div>
    </div>

    @if(Session::has('message'))
        <span class="valid-feedback d-block mb-3" role="alert">
            <strong>{{ Session::get('message') }}</strong>
        </span>
    @endif

    <div class="card">
        <div class="card-body pb-1">
            <div class="feature-products">
                <form method="POST" action="{{ route('heartrate.add') }}">
                    @csrf

                    @error('heart_rate')
                        <span class="invalid-feedback d-block ml-1 mb-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="form-group row w-100">
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="heart_rate" placeholder="Enter your current heart rate" />
                        </div>

                        <div class="col-md-2">
                            <input class="btn btn-primary w-100 h-50px" type="submit" value="Add" />
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {!! $chart->container() !!}
                        <script src="{{ $chart->cdn() }}"></script>
                    {{ $chart->script() }}
                </div>
            </div>
        </div>
    </div>
@endsection
