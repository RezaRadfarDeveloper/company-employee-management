 @extends('layouts.app')
 @section('title','Company List')
 @section('content')
@foreach($companies as $company)
<div class="card">
    <div class="card-header">
        Featured
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$company->name}}</h5>
        <p class="card-text">{{$company->email}}</p>
        <img width="100px" height="100px" src="{{asset('/storage/'.$company->logo)}}" alt="">
        <div class="d-flex justify-content-around">
            <div class="w-100 mt-4">
                <a href="{{route('companies.show',['company' => $company->id])}}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
</div>
 @endforeach
 @endsection
