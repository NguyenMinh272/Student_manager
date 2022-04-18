@extends('layouts/master')
@section('faculty_create')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Add new faculty</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('faculties.index')}}" class="btn btn-primary float-end">Faculties List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ Form::open(array('route' => 'faculties.store','method' => 'post')) }}
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
    </div>
@endsection
