@extends('layouts/master')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Register Subject</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('register.index')}}" class="btn btn-primary float-end">Student List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(!isset($student))
                    {!! Form::open(array('route' => 'register.store','method' => 'post')) !!}
                @else
                    {!! Form::open(array('route' => ['register.update',$student->id],'method' => 'put')) !!}
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('name', 'Student name', []) !!}
                            {!! Form::text('name', isset($student) ? $student->name : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('subject', 'Subject', []) !!}<br>
                            @foreach($subjects as $key => $subject)
                                {!! Form::checkbox('subject[]',$subject->id, isset( $students->subject_id) ? 'checked' : '') !!}
                                {!! Form::label('subject', $subject->name, []) !!}<br>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if(!isset($student))
                    {!! Form::submit('Update', ['class' => 'btn btn-success mt-2'])!!}
                @else
                    {!! Form::submit('Create',['class'=> 'btn btn-success mt-2']) !!}
                @endif
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
