<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
</head>
<body>
<div class="container">
    {{--Header--}}
    <div class="row">
        <div class="col-md-10 mx-auto">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <!-- Logo -->
                    <a class="navbar-brand" href="#">LOGO</a>

                    <!-- Demo Items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <!-- Add more demo items as needed -->
                    </ul>

                    <!-- User-related options -->
                    <li class="nav-item dropdown list-none-style " >
                        <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{auth_user_name()}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile Setting</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('usrLogoutForm').submit();">Logout</a></li>
                            <form action="{{route('logout')}}" id="usrLogoutForm" method="post">@csrf</form>
                        </ul>
                    </li>
                </div>
            </nav>
        </div>
    </div>
    {{--End Header--}}
    @if(is_admin())
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header text-center py-2">
                            Manage User Advertisements
                        </div>
                        <div class="card-body">
                            <div class="p-2 border-1">
                                <a href="{{route('admin.all.countries')}}" class="btn custom-button-bg text-white">Countries</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h1>Ad User Dashboard</h1>
    @endif

</div>

<script src="{{asset('asset/js/code.jquery.com_jquery-3.7.0.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.js')}}"></script>
<script src="{{asset('asset/js/main.js')}}"></script>
</body>
</html>
