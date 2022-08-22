<script> 
function myFunction(imgs) {
  // Get the expanded image
  var expandImg = document.getElementById("expandedImg");
  // Get the image text
  var imgText = document.getElementById("imgtext");
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.alt;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
}
</script>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>cla</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css'); }}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ URL::asset('css/style.css'); }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ URL::asset('css/responsive.css'); }}">
      <!-- fevicon -->
      <link rel="icon" type="image/gif" href="{{ URL::asset('images/fevicon.png'); }}"/>
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ URL::asset('css/jquery.mCustomScrollbar.min.css'); }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      
   </head>
   <!-- body -->
   <body class="main-layout inner_posituong">
      <!-- loader  -->

      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="../images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="{{url('user-view-homepage')}}">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{url('user-view-about')}}">About</a>
                              </li>
                              <li class="nav-item active">
                                 <a class="nav-link" href="{{url('user-view-product')}}">Product</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{url('user-view-contactus')}}">Contact Us</a>
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Category
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                   @foreach($dataCategory as $row)                              
                                      <a class="dropdown-item" href="{{url('user-view-list-category/'.$row->categoryID)}}">{{$row->categoryName}}</a>              
                                   @endforeach
                                 </div>
                               </li>
                               <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Producer
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                   @foreach($dataProducer as $row)                              
                                      <a class="dropdown-item" href="{{url('user-view-list-producer/'.$row->producerID)}}">{{$row->producerName}}</a>              
                                   @endforeach
                                 </div>
                               </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                              </li>
                              @if (Session::has('userName'))
                              <li class="nav-item d_none">
                                 <a class="nav-link" href="{{ URL('infomation/' . Session::get('userName'))}}">Welcome: {{Session::get('userName')}}</a>
                              </li>
                              <li class="nav-item d_none">
                                 <a class="nav-link" href="{{ URL::asset('/logout'); }}">Logout</a>
                              </li>
                              @else
                              <li class="nav-item d_none">
                                 <a class="nav-link" href="{{url('user-view-login')}}">Login</a>
                              </li>
                              @endif
                           </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- products -->
      <div  class="products">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage col-md-12">
                     @foreach($data as $row)
                        <h1 class = "font-weight-bold">Details of PC : {{$row->PCName}}</h1>
                     @endforeach
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="our_products">
                     <div class="row">
                        @foreach($data as $row)
                        <div class="col-md-5 margin_bottom1">
                           <div class="product_box">
                              <div class="container col-md-12">
                                 <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                   <!-- Indicators -->
                                   <ol class="carousel-indicators">
                                     <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                     <li data-target="#myCarousel" data-slide-to="1"></li>
                                     <li data-target="#myCarousel" data-slide-to="2"></li>
                                   </ol>
                               
                                   <!-- Wrapper for slides -->
                                   <div class="carousel-inner">
                                     <div class="item active">
                                       <img src ="../images/{{$row->PCImage1}}" alt="Los Angeles" style="width:100%;">
                                     </div>
                               
                                     <div class="item">
                                       <img src ="../images/{{$row->PCImage2}}" alt="Chicago" style="width:100%;">
                                     </div>
                                   
                                     <div class="item">
                                       <img src ="../images/{{$row->PCImage3}}" alt="New york" style="width:100%;">
                                     </div>
                                   </div>
                               
                                   <!-- Left and right controls -->
                                   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                     <span class="glyphicon glyphicon-chevron-left"></span>
                                     <span class="sr-only">Previous</span>
                                   </a>
                                   <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                     <span class="glyphicon glyphicon-chevron-right"></span>
                                     <span class="sr-only">Next</span>
                                   </a>
                                 </div>
                               </div>
                           </div>
                        </div>
                        <div class="col-md-6 margin_bottom1"> 
                              <h1 class="col-md-12 h1"> Name : {{$row->PCName}} <h1>
                              <h1 class="col-md-12 h2"> Detail : {{$row->PCDetail}} <h1>
                              <h1 class="col-md-12 h2"> Price : {{$row->PCPrice}} <h1>              
                              <h1 class="col-md-12 h2"> Category : {{$row->categoryName}} <h1>
                              <h1 class="col-md-12 h2"> Producer : {{$row->producerName}} <h1>
                        </div>
                        @endforeach
                        <div class="col-md-12 margin_bottom1">
                           <a href="{{url('user-view-product')}}" class="read_more btn-danger" >Back </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end products -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <img class="logo1" src="images/logo1.png" alt="#"/>
                     <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <h3>About Us</h3>
                     <ul class="about_us">
                        <li>dolor sit amet, consectetur<br> magna aliqua. Ut enim ad <br>minim veniam, <br> quisdotempor incididunt r</li>
                     </ul>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <h3>Contact Us</h3>
                     <ul class="conta">
                        <li>dolor sit amet,<br> consectetur <br>magna aliqua.<br> quisdotempor <br>incididunt ut e </li>
                     </ul>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <form class="bottom_form">
                        <h3>Newsletter</h3>
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribe</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html Templates</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>

