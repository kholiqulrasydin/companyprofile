@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Position
                        <a href="{{url('position')}}" class="btn btn-danger text-light float-md-right">Cancel</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('position.update',['id' => $data->id])}}" method="POST" name="updateposition">
{{--                            {{csrf_field()}}--}}
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Name</strong>
                                        <input type="text" name="name" class="form-control" value="{{$data->name}}" placeholder="Enter Name Of Position">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Salary</strong>
                                        <input type="number" name="salary" class="form-control" value="{{$data->salary}}" placeholder="Enter salary">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>description</strong>
                                        <input type="text" name="description" class="form-control" value="{{$data->description}}" placeholder="Enter Description">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer "><button type="submit"  class="btn btn-success float-md-right">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
