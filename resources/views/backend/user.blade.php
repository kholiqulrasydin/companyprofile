@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Position
                        <a href="{{route('user.add')}}" class="btn btn-success text-light float-md-right">add User</a>
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
                                <th>ADDRESS</th>
                                <th>PHONE</th>
                                <th>POSITION</th>
                                <th>EMAIL</th>
                                <th>CREATED_AT</th>
{{--                                <th>ACTION</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->positionRelate->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{date('d F Y',strtotime($user->created_at))}}</td>
                                    <td><a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-danger">delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@endsection
