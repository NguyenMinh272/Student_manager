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
                        <a href="{{route('student.index')}}" class="btn btn-primary float-end">Students List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{Form::open(array('route'=> array('student.subject')))}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Student name</strong>
                            {{Form::text('full_name','', array('class'=>'form-control'))}}
                        </div>
                        <div class="form-check">
                            @foreach($subjects as $subject)
                                <input class="form-check-input" type="checkbox" value="{{ $subject->id }}">
                                <label class="form-check-label">{{ $subject->name }}</label><br>
                            @endforeach

                        </div>
                    </div>
                </div>
                <form method="POST" action="{{route('student.store)}}">
                    @csrf

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Register">
                    </div>
                </form>
                {{Form::close()}}
            </div>
        </div>
    </div>


@endsection
