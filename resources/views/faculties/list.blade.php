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
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>Faculty name</td>
                    <td colspan="2">Action</td>
                </tr>
                </thead>
                <tbody>
                @if(!empty($faculties))
                    @foreach ($faculties as $faculty)

                        <td>{{$faculty->name}}</td>
                        <td class="center">
                            <form method="POST" action="{{route('faculty.destroy',$faculty->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </div>
                            </form>
                        </td>

                        <td class="center">
                            <form method="POST" action="{{route('faculty.edit',$faculty->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('GET') }}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Edit">
                                </div>
                            </form>
                            </tr>
                </tbody>
                @endforeach
                @endif
            </table>
            {{$faculties->links("pagination::bootstrap-4")}}
        </div>
    </div>
@endsection
