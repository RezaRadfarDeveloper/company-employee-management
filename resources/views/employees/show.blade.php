@extends('layouts.app')
@section('title','Company Show')
@section('content')
    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$employee->first_name}} {{$employee->last_name}}</h5>
            <p class="card-text">{{$employee->email}}</p>
            <p>{{$employee->phone}}</p>
            <p>{{$employee->company->name}}</p>
            <div class="d-flex w-25 justify-content-around">
                <form action="{{route('employees.destroy',['employee'=> $employee->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{route('employees.edit',['employee' => $employee->id])}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
@endsection
