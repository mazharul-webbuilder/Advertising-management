<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Country;

if (!function_exists('is_admin'))
{
    function is_admin()
    {
        if (Auth::check() && Auth::user()->is_admin === 1) {
            return true;
        }
        return  false;
    }
}


if (!function_exists('auth_user_name'))
{
    function auth_user_name()
    {
        if (Auth::check()) {
            return Auth::user()->name;
        }
        return  null;
    }
}


if (!function_exists('countries'))
{
    function countries()
    {
        return Country::all();
    }
}
