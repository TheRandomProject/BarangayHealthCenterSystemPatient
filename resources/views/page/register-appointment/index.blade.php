@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Register Appointment</h1>
    <hr>
    {!! Form::open(['route' => 'register.appointment.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        <label>Type of Appointment</label>
        <select name="type_appointment" class="form-control @error('type_appointment') is-invalid @enderror" id="exampleFormControlSelect1">
            <option value="">Select Appointment</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        @error('type_appointment')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Date</label>
        <input type="date" name="date" id="" class="form-control @error('date') is-invalid @enderror">
    </div>
    @error('date')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
    {!! Form::close() !!}
</div>
@endsection
