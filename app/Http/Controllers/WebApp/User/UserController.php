<?php

namespace App\Http\Controllers\WebApp\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\RynxHelper\ViewTemplate;

class UserController extends Controller
{
    public function index(){
        return ViewTemplate::view('pages.user');
    }
}
