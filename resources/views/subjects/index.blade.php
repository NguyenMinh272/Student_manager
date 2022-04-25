@extends('layouts/master')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Subject Management</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('subject.create')}}" class="btn btn-primary float-end">New subject</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Subject name</td>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($subjects))
                        @foreach ($subjects as $subject)
                            <td>{{$subject->name}}</td>
                            <td class="center">
                                <form method="POST" action="{{route('subject.destroy',$subject->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </div>
                                </form>
                            </td>

                            <td class="center">
                                <form method="POST" action="{{route('subject.edit',$subject->id)}}">
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
            </div>
        </div>

@endsection
