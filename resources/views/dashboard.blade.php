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
    {{--Datatable assets--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header py-2 card-header-bg text-white d-flex justify-content-between">
                            <div class="">Manage All Your Ads</div>
                            <div class="">
                                <button class="btn custom-button-bg text-white">Add New Ad</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="datatable-item">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Type Of Add</th>
                                    <th>Ad</th>
                                    <th>Target Audience</th>
                                    <th>Duration</th>
                                    <th>Total Days</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>

<script src="{{asset('asset/js/code.jquery.com_jquery-3.7.0.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.js')}}"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script src="{{asset('asset/js/main.js')}}"></script>

@include('ajax.user_ads_script')
</body>
</html>
