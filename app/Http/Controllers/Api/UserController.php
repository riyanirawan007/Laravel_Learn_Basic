<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;

class UserController extends Controller
{

    public function index($id=null){
        if($id==null){
            $data=User::where('deleted_at',null)->get();
        }
        else{
            $data=User::where('deleted_at',null)
            ->where('id',$id)
            ->get();
        }
        echo json_encode(array('data'=>$data));
    }

    public function create(request $req)
    {
        $result=User::create($req->all());
        echo json_encode(array('message'=>'Create user '.($result!=null?'successful':'Failed').'!'));
    }

    public function update(request $req,$id)
    {
        $result=User::findorFail($id)->update($req->all());
        echo json_encode(array('message'=>'Update user '.($result?'successful':'Failed').'!'));
    }

    public function delete($id){
        $result=User::find($id)->delete();
        echo json_encode(array('message'=>'Delete user '.($result!=null?'successful':'Failed').'!'));
    }

}
