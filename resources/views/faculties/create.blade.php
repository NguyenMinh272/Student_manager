@extends('layouts/master')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>New faculty</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('faculty.index')}}" class="btn btn-primary float-end">Faculties List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ Form::open(array('route' => 'faculty.store','method' => 'post')) }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Faculty name</strong>
                            {{Form::text('name','', array('class' => 'form-control'))}}
                        </div>
                    </div>
                </div>
                {{Form::submit('Submit', array('class' => 'btn btn-success mt-2'))}}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
