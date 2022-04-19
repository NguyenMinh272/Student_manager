@extends('layouts/master')
@section('student_list')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Student Management</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('students.create')}}" class="btn btn-primary float-end">New Student</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Student name</td>
                        <td>Faculty </td>
                        <td>Email</td>
                        <td>Address</td>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($students))
                        @foreach ($students as $student)
                            <td>{{$student->full_name}}</td>
                            <td>{{$student->faculties->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->address}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('students.delete', $student->id) }}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('students.edit', $student->id) }}">Edit</a></td>
                            </tr>
                    </tbody>
                    @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
