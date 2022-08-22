<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>User list</title>
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
                  <a class="nav-link" style="padding-left: 50px" href="{{ url('list-category') }}">Category </a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link active" style="padding-left: 50px" href="{{ url('list-producer') }}">Producer </a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link active" style="padding-left: 50px" href="{{ url('list-user') }}">Users </a>
              </li>
              @if (Session::has('adminName'))
                  <li class="nav-item d_none">
                      <a class="nav-link" style="padding-left: 50px" >Welcome: {{ Session::get('adminName') }}</a>
                  </li>
                  <li class="nav-item d_none">
                      <a class="nav-link" style="padding-left: 50px"  href="{{ URL::asset('/logoutadmin') }}">Logout</a>
                  </li>
              @endif
          </ul>
         </div>
      </nav>  
    <div class = "container" style="margin-top: 20px;">
        <div class = "row"> 
            <div class = "col-md-12">
                <h1 class="align-middle"> Users list </h1>
                @if(Session::has('success'))
                <div class = "alert alert-success" role = "alert"> 
                    {{Session::get('success')}}
                </div>
                @endif              
                <table class = "table table-hover" style="justify-content: space-between">
                    <thead> <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="align-middle" >Action</th>
                    </tr> </thead> 
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td width = "10%" class = "midText">{{$row->userID}}</td>
                            <td width = "20%" class = "midText">{{$row->userFullname}}</td>
                            <td width = "20%" class = "midText">{{$row->userPhoneNumber}}</td>
                            <td width = "30%" class = "midText">{{$row->userAddress}}</td>
                            <td>
                                <a href="{{url('delete-user/'.$row->userID)}}" class ="btn btn-danger" 
                                    onclick="return confirm('Are you sure about that?')" >Delete</a></td>
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</html>