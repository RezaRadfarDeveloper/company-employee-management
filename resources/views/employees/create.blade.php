@extends('layouts.app')
@section('title','Company Show')
@section('content')
    <form action="{{route('employees.store')}}" method="post">
        @csrf
        <div class="form-row">
            <label for="first_name">First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name">
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group w-25 mt-2">
            <label for="category_id">Company</label>
            <select name="company_id" class="form-control form-control">
                @foreach($companies as $company)
                    <option value="{{$company->id}}" {{ $company->id == $selectedCompany->id ? 'selected' : '' }}>{{$company->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3 mx-auto">Submit</button>
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


