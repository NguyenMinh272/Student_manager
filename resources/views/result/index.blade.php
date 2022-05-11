@extends('layouts/master')
@section('content')


    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Register Subject List</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{route('register.create')}}" class="btn btn-primary float-end">New register subject</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student</th>
                    <th scope="col">Subject</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($students))
                    @foreach ($students as $key => $student)
                        <tr>
                            <th scope="row">{{$key+=1}}</th>
                            <td>{{$student->name}}</td>
                            <td>
                                {!! Form::open(['method'=>'GET', 'route' => ['register.edit', $student->id]]) !!}
                                {!! Form::submit('Update Mark',['class'=>'btn btn-warning']) !!}
                                {!! Form::close() !!}
                                {!! Form::open(['method'=>'DELETE', 'route' => ['register.destroy', $student->id], 'onsubmit'=>'return confirm("Are you sure?")']) !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
    </div>

@endsection
