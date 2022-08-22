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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link active" style="padding-left: 50px" href="{{ url('list-pc') }}">PC </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" style="padding-left: 50px" href="{{ url('list-category') }}">Category </a>
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
                <h2> Update product </h2>
                @if(Session::has('success'))
                <div class = "alert alert-success" role = "alert"> 
                    {{Session::get('success')}}
                </div>
                @endif
                <form method="post" action="{{url('update-pc')}}">
                    @csrf
                    <div class="md -3">
                        <label class="form-lebel">PC ID</label>
                        <input type="text" class="form-control" name="id" placeholder="Enter PC ID" value="{{$data->PCID}}" readonly>
                    </div>
                    @error('id')
                        <div class = "alert alert-danger" role = "alert"> 
                            {{$message}}
                        </div>
                    @enderror 
                    <div class="md -3">
                        <label class="form-lebel">PC Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter PC Name" value="{{$data->PCName}}">
                    </div> 
                    @error('name')
                        <div class = "alert alert-danger" role = "alert"> 
                            {{$message}}
                        </div>
                    @enderror                              
                    <div class="md -3">
                        <label class="form-lebel">PC Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Enter PC Price" value="{{$data->PCPrice}}">
                    </div>
                    @error('price')
                        <div class = "alert alert-danger" role = "alert"> 
                            {{$message}}
                        </div>
                    @enderror                    
                    <div class="md -3">
                        <label class="form-lebel">PC Details</label>
                        <textarea class="form-control" name="detail" cols="50" rows="6" id="placeOfDeath">{{$data->PCDetail}}</textarea>
                        {{-- <input type="text" class="form-control" name="detail" placeholder="Enter PC Details" value="{{$data->PCDetail}}"> --}}
                    </div> 
                    @error('details')
                        <div class = "alert alert-danger" role = "alert"> 
                            {{$message}}
                        </div>
                    @enderror      
                    <div class="md -3">
                        <label class="form-lebel">Product Warranty</label>
                        <input type="text" class="form-control" name="warranty" placeholder="Enter PC Warranty" value="{{$data->PCWarranty}}">
                    </div> 
                    @error('warranty')
                        <div class = "alert alert-danger" role = "alert"> 
                            {{$message}}
                        </div>
                    @enderror                                       
                    <div class="md -3">
                        <label class="form-lebel">Product Image1</label>
                        <input type="file" class="form-control" name="image1" placeholder="Enter PC Image1" value="{{$data->PCImage1}}">
                    </div> 
                    @error('image1')
                        <div class = "alert alert-danger" role = "alert"> 
                            {{$message}}
                        </div>
                    @enderror       
                    <div class="md -3">
                        <label class="form-lebel">Product Image2</label>
                        <input type="file" class="form-control" name="image2" placeholder="Enter PC Image2" value="{{$data->PCImage2}}">
                    </div> 
                    @error('image2')
                        <div class = "alert alert-danger" role = "alert"> 
                            {{$message}}
                        </div>
                    @enderror  
                    <div class="md -3">
                        <label class="form-lebel">Product Image3</label>
                        <input type="file" class="form-control" name="image3" placeholder="Enter PC Image3" value="{{$data->PCImage3}}">
                    </div> 
                    @error('image3')
                        <div class = "alert alert-danger" role = "alert"> 
                            {{$message}}
                        </div>
                    @enderror                                       
                    <div class="md -3">
                        <label class="form-lebel">Category</label>
                        <select name="category" class="form-control">
                            @foreach($dataCategory as $row)
                                @if($row->categoryID==$data->categoryID)
                                {
                                    <option selected value="{{$row->categoryID}}"> {{$row->categoryName}}</option>
                                }
                                @else
                                {
                                    <option value="{{$row->categoryID}}"> {{$row->categoryName}}</option>
                                }
                                @endif
                            @endforeach
                        </select>  
                    </div>  
                    @error('category')
                    <div class = "alert alert-danger" role = "alert"> 
                        {{$message}}
                    </div>
                    @enderror    
                    <div class="md -3">
                        <label class="form-lebel">Producer</label>
                        <select name="producer" class="form-control">
                            @foreach($dataProducer as $row)
                                @if($row->producerID==$data->producerID)
                                {
                                    <option selected value="{{$row->producerID}}"> {{$row->producerName}}</option>
                                }
                                @else
                                {
                                    <option value="{{$row->producerID}}"> {{$row->producerName}}</option>
                                }
                                @endif
                            @endforeach
                        </select>  
                    </div>  
                    @error('producer')
                    <div class = "alert alert-danger" role = "alert"> 
                        {{$message}}
                    </div>
                    @enderror                                                                                                        
                    <button type="submit" class = "btn btn-primary"> Submit </button>    
                    <a href="{{url('list-pc')}}" class="btn btn-danger" > Back </a>                  
                </form>
            </div>
        </div>
    </div>
  </body>
</html>