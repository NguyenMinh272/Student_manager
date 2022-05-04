@extends('layouts/master')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>New student</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('student.index')}}" class="btn btn-primary float-end">Students List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{Form::open(array('route'=>'student.store','method'=>'post','enctype'=>'multipart/form-data'))}}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Student name</strong>
                            {{Form::text('full_name','', array('class'=>'form-control'))}}
                        </div>

                        <div class="form-group">
                            <strong>Faculty</strong>
                            <select class="form-control" name="faculty_id">
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <strong>Address</strong>
                            {{Form::text('address','', array('class'=>'form-control'))}}
                        </div>

                        <div class="form-group">
                            <strong>Email</strong>
                            {{Form::email('email', '', array('class' => 'form-control'))}}
                        </div>

                        <div class="form-group">
                            <strong>Birthday</strong>
                            {{Form::date('birthday', '' , array('class'=>'form-control'))}}
                        </div>

                        <div class="form-group">
                            <strong>Phone number</strong>
                            {{Form::text('phone', '' , array('class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            <strong>Avatar</strong>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <strong>Gender</strong>
                            <label class="radio-inline">
                                {{Form::radio('gender', '0', true)}} Nam
                            </label>
                            <label class="radio-inline">
                                {{Form::radio('gender', '1', true)}} Nữ
                            </label>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Save</button>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
