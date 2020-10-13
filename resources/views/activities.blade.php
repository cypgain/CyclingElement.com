@extends('layouts.default')

@section('title') Activities @endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Distance</th>
                                <th scope="col">Time</th>
                                <th scope="col">Elevation</th>
                                <th scope="col">Speed</th>
                                <th scope="col">Power</th>
                                <th scope="col">Cadence</th>
                                <th scope="col">Heart Rate</th>
                                <th scope="col">Calories</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activities as $activity)
                                <tr>
                                    <td><a href="#">{{ $activity->name }}</a></td>
                                    <td>{{ $activity->type }}</td>
                                    <td>{{ round(($activity->distance) / 1000, 2) }} km</td>
                                    <td>{{ gmdate("H:i:s", $activity->moving_time) }}</td>
                                    <td>{{ $activity->elevation }} m</td>
                                    <td>{{ round(($activity->average_speed) * (3600/1000), 2) }} km/h</td>
                                    <td>{{ $activity->average_watts }} w</td>
                                    <td>{{ $activity->average_cadence }} rpm</td>
                                    <td>{{ $activity->average_heartrate }} bpm</td>
                                    <td>{{ $activity->calories }} kcal</td>
                                    <td>{{ \App\Http\Controllers\TrainingsController::dateToStr($activity->start_date) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
