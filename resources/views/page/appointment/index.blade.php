@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Books List</h1>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.books.create')}}" class="btn btn-primary float-right">Create</a><br><br>
        </div>

        <form class="card-body" action="{{route('admin.books.search')}}" method="GET" role="search">
            <input type="text" class="form-control" placeholder="Search Book" name="query">
        </form>

        <div class="col-md-12">

            <table class="table table-bordered table-responsive-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Quantity</th>
                    <th>Genre</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($appointments) > 0)
                        @foreach($appointments as $appointment)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$appointment->type_appointment}}</td>
                            <td>{{$appointment->date_appointment}}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="7" class="text-center bg-danger text-white"> No Result </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
{{ $appointments->links() }}

</div>
@endsection
