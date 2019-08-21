<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Site;

class SystemController extends Controller
{
    public function index(){
       $site =  Site::where('id','=',1)->first();
        return view('admin.system.index',compact('site'));
    }
    public function add(Request $request){
        $res = Site::where('id','=',1)->update($request->except('_token'));
        if ($res)
        {
            return '1';
        }
            else{
            return '0';
        }
    }
}
