@extends('layouts.app')
@section('title','Company Show')
@section('content')
    <form action="{{route('employees.update',['employee' =>$employee->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="first_name">First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$employee->first_name}}" placeholder="First name">
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$employee->last_name}}" placeholder="Last name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$employee->email}}" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}" placeholder="Phone">
        </div>
        <div class="form-group w-25 mt-2">
            <label for="category_id">Company</label>
            <select name="company_id" class="form-control form-control">
                @foreach($companies as $company)
                    <option value="{{$company->id}}" {{ $company->id == old($employee->company_id) ? 'selected' : '' }}>{{$company->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
    @if($errors->any())
        <div class="pt-3">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection


