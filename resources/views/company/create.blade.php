@extends('navbar')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Add New Company</h1>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
       <div class="container-fluid">
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="../company">View All Companies</a>
             </li>
             <li class="nav-item active">
               <a class="nav-link" href="">Add New Company</a>
             </li>
           </ul>
         </div>
       </div>
</nav>

@if (Session::has('add_company'))
    <div class="alert alert-success">
        <em> {{ session('add_company')}} </em>
        <button type="button" class="close" data-dismiss='alert' aria-label="close">
            <span aria-hidden="true">&times</span>
        </button>
    </div>
@endif

<div class="panel-body">
     @include('common.errors')
    <form action="../company" method="POST" enctype="multipart/form-data" >
        @csrf
        <input type ="text" class="form-control" name="company"><br>
        <input type="file" name="myfile">
        <br><br>
        <input type="submit" class="secondary-cart-btn" value="Add">
    </form>

</div>



@endsection