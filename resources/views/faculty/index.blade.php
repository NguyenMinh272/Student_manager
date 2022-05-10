@extends('layouts/master')
@section('content')


    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Faculty Management</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{route('faculty.create')}}" class="btn btn-primary float-end">New Faculty</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Faculty</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($faculties))
                    @foreach ($faculties as $key => $faculty)
                        <tr>
                            <th scope="row">{{$key+=1}}</th>
                            <td>{{$faculty->name}}</td>
                            <td>
                                {!! Form::open(['method'=>'GET', 'route' => ['faculty.edit', $faculty->id]]) !!}
                                {!! Form::submit('Edit',['class'=>'btn btn-warning']) !!}
                                {!! Form::close() !!}
                                {!! Form::open(['method'=>'DELETE', 'route' => ['faculty.destroy', $faculty->id], 'onsubmit'=>'return confirm("Are you sure?")']) !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
            {{$faculties->links("pagination::bootstrap-4")}}
        </div>
    </div>

@endsection
