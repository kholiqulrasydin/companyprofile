@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Position
                        <a href="{{url('/position/add')}}" class="btn btn-success text-light float-md-right">add Position</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>NAME</th>
                                <th>SALARY</th>
                                <th>DESCRIPTION</th>
                                <th>CREATED AT</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($positions as $position)
                                <tr>
                                    <td>{{$position->name}}</td>
                                    <td>{{$position->salary}}</td>
                                    <td>{{$position->description}}</td>
                                    <td>{{date('d F Y',strtotime($position->created_at))}}</td>
                                    <td><a href="{{ route('position.edit',['id' => $position->id]) }}" class="btn btn-warning ">edit</a>
                                        <a href="{{ route('position.delete', ['id' => $position->id]) }}" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
