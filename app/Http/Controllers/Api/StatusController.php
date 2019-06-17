<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function db_connection(){
        $users=DB::table('user')->get();
        echo json_encode(array('connected'=>($users!=null)));
    }
}
