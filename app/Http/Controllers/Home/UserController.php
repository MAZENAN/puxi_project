<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Member;
use Auth;
class UserController extends Controller {
	public function collection() {
       $papers =  Member::find(Auth::guard('member')->id())->papers()->select('title','code','authors','abstract')->paginate(10);
		return view('home.usercenter.collection',compact('papers'));
	}
}
