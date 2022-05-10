@extends('layouts/master')
@section('content')


    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Student Management</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{route('student.create')}}" class="btn btn-primary float-end">New Student</a>
                </div>
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
                    <th scope="col">Address</th>
                    <th scope="col">Phone number</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($students))
                    @foreach ($students as $key => $student)
                        <tr>
                            <th scope="row">{{$key+=1}}</th>
                            <td>{{$student->name}}</td>
                            <td><img src="{{asset('images/'.$student->image)}}" style="width:40px; height: 50px"></td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->address}}</td>
                            <td>{{$student->phone}}</td>
                            <td>
                                {!! Form::open(['method'=>'GET', 'route' => ['student.edit', $student->id]]) !!}
                                {!! Form::submit('Edit',['class'=>'btn btn-warning']) !!}
                                {!! Form::close() !!}
                                {!! Form::open(['method'=>'DELETE', 'route' => ['student.destroy', $student->id], 'onsubmit'=>'return confirm("Are you sure?")']) !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
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
