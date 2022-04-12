@extends('layouts/master')
@section('subject_list')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Subject Management</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('subjects.create')}}" class="btn btn-primary float-end">New subject</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Subject name</td>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($subjects))
                        @foreach ($subjects as $subject)
                            <td>{{$subject->id}}</td>
                            <td>{{$subject->name}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('subjects.delete', $subject->id) }}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('subjects.edit', $subject->id) }}">Edit</a></td>
                            </tr>
                    </tbody>
                    @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
