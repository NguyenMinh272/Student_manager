@extends('layouts/master')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Update Mark</h3>
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
                            {!! Form::text('name', $student_subject->name, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('subject', 'Subject', []) !!}<br>
                            {!! Form::select('subject_id', $student_subject->subjects->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
                            <div class="form-group">
                                {!! Form::label('Mark', 'Mark', []) !!}
                                {!! Form::text('mark', isset($mark) ? $mark: '', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                @if(!isset($student))
                    {!! Form::submit('Create', ['class' => 'btn btn-success mt-2'])!!}
                @else
                    {!! Form::submit('Update',['class'=> 'btn btn-success mt-2']) !!}
                @endif
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
