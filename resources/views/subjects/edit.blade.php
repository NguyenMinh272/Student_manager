@extends('layouts/master')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Edit subject</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('subject.index')}}" class="btn btn-primary float-end">Subjects List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{  Form::open(array('route' => array('subject.update', $subject->id), 'method'=>'put')) }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Subject name</strong>
                            {{Form::text('name',$subject->name, array('class' => 'form-control'))}}
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Update</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
