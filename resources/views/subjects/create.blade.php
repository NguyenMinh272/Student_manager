@extends('layouts/master')
@section('subject_create')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Add new subject</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('subjects.index')}}" class="btn btn-primary float-end">Subjects List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ Form::open(array('route' => 'subjects.store','method' => 'post')) }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Subject name</strong>
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
