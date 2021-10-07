@extends('navbar')

@section('content')

<span class="h4 align-self-center">Company Lists</span>
<hr>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
       <div class="container-fluid">
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="#">View All Companies</a>
             </li>
             <li class="nav-item active">
               <a class="nav-link" href="company/create">Add New Company</a>
             </li>
           </ul>
         </div>
       </div>
     </nav>
     
  
      
        <div class="row">
            @foreach($companies as $company)
           
            <div class="col-xl-6 col-md-6 mb-6">
                 <a href="{{route('getPhoneByCompany',$company->company_id)}}">
                <div class="card" style="margin:5px;">
                    <div class="card-body">
                        <img src="http://trendyphone.calamuseducation.com/storage/app/{{$company->logo}}" style="width:50px; height:50px; margin:5px;"> {{$company->company_name}} 
                    </div>
                </div>
                </a>
            </div>
            
            @endforeach
        </div>
     

@endsection