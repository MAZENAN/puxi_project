<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Auth;
use App\Model\Role;
use http\Env\Response;
use Illuminate\Http\Request;

class AuthController extends Controller {
	public function index() {
		$auths = Auth::from('auth as auth1')->select('auth1.*', 'auth2.auth_name as parent_name')->leftJoin('auth as auth2', 'auth1.pid', '=', 'auth2.id')->get();
		return view('admin.auth.index', compact('auths'));
	}

	public function add() {
		if (request()->method() == 'POST') {
			$result = Auth::create(request()->all());
			return $result ? 1 : 0;
		}
		$auths = Auth::select('id', 'auth_name')->where('pid', '=', 0)->get();
		return view('admin.auth.add', compact('auths'));
	}

	public function edit($id) {
	    $curAuth = Auth::find($id);
		$auths = Auth::select('id', 'auth_name')->where('pid', '=', 0)->get();
		return view('admin.auth.edit', compact('auths','curAuth'));
	}

	public function delete($id) {
	    $auth = Auth::where('pid',$id)->get();
	    if ($auth->count()){
	        return response()->json(['code'=>0,'message'=>'该权限下有子节点，不可删除']);
        }
       $authIds =  Role::get()->pluck('auth_ids');
       foreach ($authIds as $authId){
           $aidArr = preg_split('@,@',$authId);
           if (in_array($id,$aidArr)){
               return response()->json(['code'=>0,'message'=>'有角色在使用权限节点，不可删除']);
           }
       }
        $res = Auth::find($id)->delete();
       return $res ? response()->json(['code'=>1,'message'=>'删除成功']) :response()->json(['code'=>0,'message'=>'删除失败']);
    }
}
