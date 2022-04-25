@extends('layouts/master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Edit faculty</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('faculty.index')}}" class="btn btn-primary float-end">Faculties List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{  Form::open(array('route' => array('faculty.update', $faculty->id), 'method'=>'put')) }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Faculty name</strong>
                            {{Form::text('name',$faculty->name, array('class' => 'form-control'))}}
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Update</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
