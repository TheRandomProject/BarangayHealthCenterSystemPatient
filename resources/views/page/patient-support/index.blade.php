@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <p style="font-size: 2rem">
                Patient Support
            </p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="alert alert-primary" role="alert">
                        <a href="/register/dental">
                            Set An Appointment
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-primary" role="alert">
                        <a href="/register/prenatal">
                            Contact
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-primary" role="alert">
                        <a href="/register/outreach-programs">
                            Description
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-primary" role="alert">
                        <a href="/register/counseling">
                            Management
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-primary" role="alert">
                        <a href="/register/counseling">
                            Offers
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-primary" role="alert">
                        <a href="/register/counseling">
                            Tips and Advice
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-primary" role="alert">
                        <a href="/register/counseling">
                            Updates
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-primary" role="alert">
                        <a href="/register/counseling">
                            Security
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="card">
        <div class="card-header">
            <p style="font-size: 2rem">
                Recreational Activity
            </p>
        </div>
        <div class="card-body">
            <div class="row text-center">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="alert alert-primary" role="alert">
                        <a href="#">
                            Start
                        </a>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</div>

@endsection
