@extends('layouts/master')
@section('faculties_list')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Faculty Management</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('faculties.create')}}" class="btn btn-primary float-end">New Faculty</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Faculty name</td>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($faculties))
                        @foreach ($faculties as $faculty)
                                <td>{{$faculty->id}}</td>
                                <td>{{$faculty->name}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('faculties.delete', $faculty->id) }}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('faculties.edit', $faculty->id) }}">Edit</a></td>
                            </tr>
                    </tbody>
                    @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
