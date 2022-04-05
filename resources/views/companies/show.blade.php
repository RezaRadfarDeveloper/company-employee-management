@extends('layouts.app')
@section('title','Company Show')
@section('content')
    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$company->name}}</h5>
            <p class="card-text">{{$company->email}}</p>
            <img width="100px" height="100px" src="{{asset('/storage/'.$company->logo)}}" alt="">
            <div class="d-flex justify-content-around">
                <div class="">
                    <form action="{{route('companies.destroy',['company'=> $company->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <div>
                    <a href="{{route('companies.edit',['company' => $company->id])}}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
