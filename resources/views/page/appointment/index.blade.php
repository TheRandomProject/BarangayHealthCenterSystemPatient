@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Appointments</h1>
    <hr>
    <div class="row">
        <div class="col-md-12">

            <table class="table table-bordered table-responsive-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Type of Appointment</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($appointments) > 0)
                        @foreach($appointments as $appointment)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$appointment->ailment}}</td>
                            <td>{{$appointment->date_sched}}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center bg-danger text-white"> No Result </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
{{ $appointments->links() }}

</div>
@endsection
