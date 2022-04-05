@extends('layouts.app')
@section('title','Company Show')
@section('content')
    <form action="{{route('companies.update',['company' =>$company->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$company->name}}" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$company->email}}" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" id="website" name="website" value="{{$company->website}}" placeholder="Website">
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file mt-3"  id="logo" name="logo">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
    @if($errors->any())
        <div>
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection


