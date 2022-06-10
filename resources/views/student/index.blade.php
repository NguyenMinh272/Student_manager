@extends('layouts/master')
@section('content')


    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Student Management</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{route('students.create')}}" class="btn btn-success float-end">New Student</a>
                </div>
                {!! Form::open(array('route' => 'students.index','method' => 'get'))!!}
                <div class="row input-daterange">
                    <div class="col-md-2">
                        {!! Form::text('age_from',  '', ['class' => 'form-control','placeholder' =>'From age']) !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::text('age_to',  '', ['class' => 'form-control', 'placeholder'=>'To age']) !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::text('mark_from',  '', ['class' => 'form-control','placeholder' =>'From mark']) !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::text('mark_to',  '', ['class' => 'form-control', 'placeholder'=>'To mark']) !!}
                    </div>
                    <div class="col-md-2">
                        <select name="option" class="form-control">
                            <option value="">--Option--</option>
                            <option value="1">Learned all</option>
                            <option value="2">Don't learn</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        {!! Form::submit('Search', ['class' => 'btn btn-success '])!!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Birthday</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($students))
                    @foreach ($students as $key => $student)
                        <tr>
                            <th scope="row">{{$key+=1}}</th>
                            <td>{{$student->full_name}}</td>
                            <td><img src="{{asset('images/'.$student->image)}}" style="width:40px; height: 50px"></td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->birthday}}</td>
                            <td>
                                {!! Form::open(['route' => ['students.destroy', $student->id], 'method' => 'DELETE']) !!}
                                <a class="btn btn-info" href="{{ route('students.show', $student->id) }}"><i
                                        class="bi bi-eye-fill"></i></a>
                                {{--                                <a class="btn btn-warning" href="{{ route('students.edit', $student->id) }}"><i class="bi bi-pencil-square"></i></a>--}}
                                {!! Form::button('<i class="bi bi-pencil-square"></i>',['class'=>'btn btn-warning edit-btn','data-toggle'=>'modal','data-target'=>'#exampleModal-' . $student->id]) !!}
                                <a class="btn btn-success"
                                   href="{{route('students.subjects.createSubjects', $student->id)}}"><i
                                        class="bi bi-plus-circle-fill"></i></a>
                                {!! Form::button('<i class="bi bi-trash3-fill"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
            {{$students->links("pagination::bootstrap-4")}}
        </div>
    </div>

@endsection
