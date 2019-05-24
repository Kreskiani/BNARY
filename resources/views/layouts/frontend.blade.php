@php
  if(isset($menu))
    $menu = $menu;
  else
    $menu = "";
  
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>B-NARY | {{(isset($title)) ? $title : '-'}}</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('frontend/css/mdb.min.css') }}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('frontend/css/style.min.css') }}" rel="stylesheet">
  <!-- tinymce -->
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=faql5ec8jbok3zrmm2eylqqfwetbimrgohdk7i1n2cyjyuth"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }
    .checked {
        color: orange;
      }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="/" >
        <strong class="blue-text">B-NARY</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item {{ ($menu == 'Home') ? 'active' : '' }}">
            <a class="nav-link waves-effect" href="/">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item {{ ($menu == 'Products') ? 'active' : '' }}">
            <a class="nav-link waves-effect" href="{{route('products')}}" >Products</a>
          </li>
          @if(Auth::check())
            <li class="nav-item {{ ($menu == 'My Products') ? 'active' : '' }}">
              <a class="nav-link waves-effect" href="{{route('admin.products.index')}}" >My Products</a>
            </li>
            <li class="nav-item {{ ($menu == 'My Order List') ? 'active' : '' }}">
              <a class="nav-link waves-effect" href="{{route('admin.orders.index')}}" >My Order List</a>
            </li>
          @endif
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item" style="{{(isset(Auth::user()->name)) ? 'padding-right: 1%' : ''}}">
            <a href="{{route('cart')}}" class="nav-link waves-effect">
              <span class="badge red z-depth-1 mr-1"> {{ (null != (session('cart'))) ? count(session('cart')) : 0}} </span>
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block"> Cart </span>
            </a>
          </li>
          <li class="nav-item">
            @if(isset(Auth::user()->name))
              <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link border border-light rounded waves-effect"
                >
                <i class="fa fa-user mr-2"></i>Logout
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </a>
            @else
              <a href="{{route('login')}}" class="nav-link border border-light rounded waves-effect"
                >
                <i class="fa fa-user mr-2"></i>Login / Register
              </a>
            @endif
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  
  @yield('content')

  <script type="text/javascript">
    function user_sort(request) {
        $.ajax({
            type: "GET",
            data: {order_by : request}, 
            url: "{{route('ajax.products.user.sort')}}",
            success: function(html) {
                $("#sort_by").html(html);
            }
        });
    }
</script>


   <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Call to action-->
   <!--  <div class="pt-4">
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" 
        role="button">Download MDB
        <i class="fas fa-download ml-2"></i>
      </a>
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/education/bootstrap/"  role="button">Start
        free tutorial
        <i class="fas fa-graduation-cap ml-2"></i>
      </a>
    </div> -->
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <!-- <div class="pb-4">
      <a href="https://www.facebook.com" >
        <i class="fab fa-facebook-f mr-3"></i>
      </a>

      <a href="https://twitter.com" >
        <i class="fab fa-twitter mr-3"></i>
      </a>

      <a href="https://www.youtube.com" >
        <i class="fab fa-youtube mr-3"></i>
      </a>

      <a href="https://plus.google.com" >
        <i class="fab fa-google-plus-g mr-3"></i>
      </a>

      <a href="https://dribbble.com" >
        <i class="fab fa-dribbble mr-3"></i>
      </a>

      <a href="https://pinterest.com" >
        <i class="fab fa-pinterest mr-3"></i>
      </a>

      <a href="https://github.com" >
        <i class="fab fa-github mr-3"></i>
      </a>

      <a href="http://codepen.io" >
        <i class="fab fa-codepen mr-3"></i>
      </a>
    </div> -->
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2019 Copyright:
      <a href="#" > BINARY </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{ asset('frontend/js/jquery-3.4.0.min.js') }}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('frontend/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('frontend/js/mdb.min.js') }}"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
  <!-- tinymce -->
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=faql5ec8jbok3zrmm2eylqqfwetbimrgohdk7i1n2cyjyuth"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</body>

</html>
