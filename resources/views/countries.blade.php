<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Countries</title>
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
                            <a class="nav-link" href="#">Home</a>
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

    {{--Show Countries--}}
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header py-2 d-flex justify-content-between">
                        <h6>All Countries</h6>
                        <h6>
                            <button type="button" class="btn btn-primary custom-button-bg" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Set Min & Max Ad Per Day
                            </button>
                        </h6>
                    </div>
                    <div class="card-body">
                        <!-- Inside the card-body of "Show Countries" -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th>Code</th>
                                            <th>Total Users</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(countries() as $country)
                                            <tr>
                                                <td>{{$country->name}}</td>
                                                <td>{{$country->code}}</td>
                                                <td>{{$country->users()->count()}}</td>
                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" class="country-switch" value="{{$country->code}}" {{$country->status == 1 ? 'checked' : ''}}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
    {{--modal--}}
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-body">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Set How much <sapn class="badge bg-danger">ad</sapn> User Can Publish From Their Country</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" id="AdminCountryAddSetForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="country" class="form-label">Country</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="code" id="" class="form-control">
                                        <option value=""></option>
                                        @foreach(countries() as $country)
                                            <option value="{{$country->code}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error-message" id="email-error"></span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-3">
                                    <label for="country" class="form-label">Number Of Ad Per Day</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="per_day_ad_limit">
                                    <span class="error-message" id="email-error"></span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-9">
                                    <input type="submit" class="btn custom-button-bg" id="submitBtn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--end modal--}}

<script src="{{asset('asset/js/code.jquery.com_jquery-3.7.0.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.js')}}"></script>
<script src="{{asset('asset/js/main.js')}}"></script>
@include('ajax.countries')
</body>
</html>
