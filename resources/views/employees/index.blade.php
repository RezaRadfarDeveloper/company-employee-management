@extends('layouts.app')
@section('title','Employees List')
@section('content')
    @foreach($employees as $employee)
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$employee->first_name}} {{$employee->last_name}}</h5>
                <p class="card-text">{{$employee->email}}</p>
                <p>{{$employee->phone}}</p>
                <p>{{$employee->company->name}}</p>
                <div class="d-flex justify-content-around">
                    <div>
                        <a href="{{route('employees.show',['employee' => $employee->id])}}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
