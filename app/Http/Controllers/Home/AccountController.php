<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
class AccountController extends Controller {
	public function login() {
		return view('home.account.login');
	}
	public function check(Request $request) {
       $validator = Validator::make($request->all(), [
           'username' => 'required|min:2|max:20',
           'password' => 'required|min:6',
           'code' => 'required|size:5|captcha',
       ]);
       if ($validator->fails()){
           //print_r($validator);
           $errors = $validator->errors();
           if ($errors->has('code')){
               $message = '验证码错误';
           }else{
               $message = '用户名或密码格式错误';
           }
           return response()->json(['code'=>0,'message'=>$message]);
       }

        $data = $request->only(['username', 'password']);
        $data['status'] = 2;
        $result = Auth::guard('member')->attempt($data);
        $arr=[];
        if ($result) {
            $message = '登陆成功';
            $code = 1;
        } else {
            $message = '登录失败';
            $code = 0;
        }
        $arr = ['message'=>$message,'code'=>$code];
        if ($request->has('redirect_url')){
            $arr['redirect_url'] = $request->get('redirect_url');
        }
        return response()->json($arr);
	}

    public function logout() {
        Auth::guard('member')->logout();
        return redirect(url('/'));
    }

	public function register() {
		return view('home.account.register');
	}
	public function doRegister(Request $request) {
		# code...
	}

	public function vertify() {
		return view('home.account.vertify');
	}

	public function set() {
		return view('home.account.set');
	}

	public function complete() {
		return view('home.account.complete');
	}
}
