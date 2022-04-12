@extends('layouts/master')
@section('student_create')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Add new student</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('students.index')}}" class="btn btn-primary float-end">Students List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('students.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>ID</strong>
                                <input type="text" name="id" class="form-control">
                            </div>
                            <div class="form-group">
                                <strong>Student name</strong>
                                <input type="text" name="full_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <strong>Faculty</strong>
                                <select class="form-control" name="faculty_id">
                                @foreach($faculties as $faculty)
                                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                @endforeach
                                </select >
                            </div>
                            <div class="form-group">
                                <strong>Address</strong>
                                <input type="text" name="address" class="form-control">
                            </div>

                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <strong>Birthday</strong>
                                <input type="date" name="birthday" class="form-control">
                            </div>

                            <div class="form-group">
                                <strong>Phone number</strong>
                                <input type="text" name="phone" class="form-control">
                            </div>

                            <div class="form-group">
                                <strong>Gender</strong>
                                <label class="radio-inline">
                                    <input name="gender" value="0" checked="" type="radio">Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="gender" value="1" type="radio">Nữ
                                </label>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Save</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
