@extends('layouts/master')
@section('subject_create')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Add new subject</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('subjects.index')}}" class="btn btn-primary float-end">Subjects List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('subjects.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>ID</strong>
                                <input type="text" name="id" class="form-control">
                            </div>
                            <div class="form-group">
                                <strong>Subject name</strong>
                                <input type="text" name="name" class="form-control">
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
