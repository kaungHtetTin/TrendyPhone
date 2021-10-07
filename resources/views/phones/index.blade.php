@extends('navbar')

@section('content')


@if (Session::has('add_company'))
    <div class="alert alert-success">
        <em> {{ session('add_company')}} </em>
        <button type="button" class="close" data-dismiss='alert' aria-label="close">
            <span aria-hidden="true">&times</span>
        </button>
    </div>
@endif

<div>
<span class="h4 align-self-center">Phone Specifications</span>
<hr>
</div>
<div class="row">
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card">
            <div class="card-body">

                @include('common.errors')
               
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                              <th scope="col"></th>
                              <th scope="col">Name</th>
                              <th scope="col">Add Photo</th>
        
                            </tr>
                          </thead>
                        @foreach ($phones as $phone)
                        <tbody>
                            
                            <td>
                                <img src="{{asset('storage/app').'/'.$phone->image_url}}" style="width:auto; height:63px;">
                            </td>
                            <td>{{$phone->name}}</td>
                            <td>
                                <form action="{{route('addPhoto')}}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="file" name="myfile" required>
                                    <input type="hidden" value="{{$phone->id}}" name="id">
                                    <input type="submit" value="add" class="btn btn-primary">
                                </form>
                            </td>

                        </tbody>
                       
                        @endforeach
                    </table>
                </div>
              
               
            </div>
        </div>
    </div>
</div>
{{$phones->links()}}
@endsection