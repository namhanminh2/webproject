<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" style="margin-left: 30px" href="#">Admin System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" style="padding-left: 50px" href="{{ url('list-pc') }}">PC </a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link active" style="padding-left: 50px" href="{{ url('list-category') }}">Category </a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" style="padding-left: 50px" href="{{ url('list-producer') }}">Producer </a>
              </li>

              @if (Session::has('adminName'))
                  <li class="nav-item d_none">
                      <a class="nav-link" style="padding-left: 50px" >Welcome: {{ Session::get('adminName') }}</a>
                  </li>
                  <li class="nav-item d_none">
                      <a class="nav-link" style="padding-left: 50px"  href="{{ URL::asset('/logout') }}">Logout</a>
                  </li>
              @endif
          </ul>
         </div>
      </nav>     
    <div class="container" style="margin-top:20px">
        <div class ="row">
            <div class="col-md-12">
                <h2> Update Category </h2>
                @if(Session::has('success'))
                <div class = "alert alert-success" role = "alert"> 
                    {{Session::get('success')}}
                </div>
                @endif
                <form method="post" action="{{url('update-category')}}">
                    @csrf
                    <div class="md -3">
                        <label class="form-lebel">Category ID</label>
                        <input type="text" class="form-control" name="id" placeholder="Enter PC ID" value="{{$data->categoryID}}" readonly>
                    </div>
                    @error('id')
                        <div class = "alert alert-danger" role = "alert"> 
                            {{$message}}
                        </div>
                    @enderror 
                    <div class="md -3">
                        <label class="form-lebel">Category Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter PC Name" value="{{$data->categoryName}}">
                    </div> 
                    @error('name')
                        <div class = "alert alert-danger" role = "alert"> 
                            {{$message}}
                        </div>
                    @enderror  
                    <div class="md -3">
                        <label class="form-lebel">Category Info</label>
                        <input type="text" class="form-control" name="info1" placeholder="Enter Category Info" value="{{$data->categoryInfo}}">
                    </div> 
                    @error('info')
                        <div class = "alert alert-danger" role = "alert"> 
                            {{$message}}
                        </div>
                    @enderror                                                                                                              
                    <button type="submit" class = "btn btn-primary"> Submit </button>    
                    <a href="{{url('list-category')}}" class="btn btn-danger" > Back </a>                  
                </form>
            </div>
        </div>
    </div>
  </body>
</html>