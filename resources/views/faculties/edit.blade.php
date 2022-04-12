@extends('layouts/master')
@section('faculty_edit')
    <div class="container" style="width: 60%; ">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Edit faculty</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('faculties.index')}}" class="btn btn-primary float-end">Faculties List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('faculties.update', $faculty->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>ID</strong>
                                <input type="text" name="id" value="{{$faculty->id}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <strong>Faculty name</strong>
                                <input type="text" name="name" value="{{$faculty->name}}"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Update</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
