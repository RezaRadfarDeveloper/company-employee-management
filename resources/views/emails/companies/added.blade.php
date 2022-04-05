<p>
   The company with  {{$company->name}}  has been added to the application.
</p>
<p>
    to find out more visit the link <a href="{{route('companies.show', ['company' => $company->id])}}">{{$company->name}}</a>
</p>


