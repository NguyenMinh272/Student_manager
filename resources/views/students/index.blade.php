@extends('layouts/master')
@section('content')
    <div class="container">
        <div class="card">
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
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Avatar</td>
                        <td>Student name</td>
                        <td>Faculty</td>
                        <td>Email</td>
                        <td>Address</td>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($students))
                        @foreach ($students as $student)
                          <td> <img width = "auto" height = "50px" src="{{asset(''.$student->avatar)}}"></td>
                            <td>{{$student->full_name}}</td>
                            <td>{{$student->faculty->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->address}}</td>
                            <td class="center">
                                <form method="POST" action="{{route('student.destroy',$student->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </div>
                                </form>
                            <td class="center">
                                <form method="POST" action="{{route('student.edit',$student->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('GET') }}
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Edit">
                                    </div>
                                </form>
                            </td>
                            </tr>
                    </tbody>
                    @endforeach
                    @endif
                </table>
                {{$students->links("pagination::bootstrap-4")}}
            </div>
        </div>
@endsection
