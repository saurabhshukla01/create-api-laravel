<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserApi;

class UserData extends Controller
{
    function userList(){
    	return UserApi::all();
    }
}
