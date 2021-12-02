@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Prenatal Appointment</h1>
    <hr>
    {!! Form::open(['route' => 'register.appointment.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        <label>Type of Appointment</label>
        <select name="type_appointment" class="form-control @error('type_appointment') is-invalid @enderror" id="exampleFormControlSelect1">
            <option value="">Select Appointment</option>
            <option value="Checkup">Checkup</option>
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
    <div class="float-right">
        {!! Form::submit('Create Appointment', ['class'=>'btn btn-primary btn-sm']) !!}
    </div>
    {!! Form::close() !!}
</div>
@include('sweetalert::alert')

@endsection
